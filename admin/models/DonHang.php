<?php
class DonHang
{
    public $conn;
    public function __construct()
    {
        $this->conn = connectDB();
    }
    public function getAllDonHang()
    {
        $sql = 'SELECT don_hang.*, trang_thai_don_hang.ten_trang_thai FROM don_hang
        INNER JOIN trang_thai_don_hang ON don_hang.trang_thai_id = trang_thai_don_hang.id
        ORDER BY don_hang.id DESC';
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }
    public function getDetailDonHang($id)
    {
        $sql = 'SELECT don_hang.*, trang_thai_don_hang.ten_trang_thai,
        tai_khoan.ho_ten,
        tai_khoan.email,
        tai_khoan.sdt,
        tai_khoan.dia_chi,
        phuong_thuc_thanh_toan.ten_phuong_thuc
        FROM don_hang
        INNER  JOIN trang_thai_don_hang ON don_hang.trang_thai_id = trang_thai_don_hang.id
        INNER  JOIN tai_khoan ON don_hang.tai_khoan_id = tai_khoan.id
        INNER  JOIN phuong_thuc_thanh_toan ON don_hang.phuong_thuc_thanh_toan_id = phuong_thuc_thanh_toan.id
        WHERE don_hang.id = :id';
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([':id'=>$id]);
        return $stmt->fetch();
    }
    public function getAllTrangThaiDonHang()
    {
        $sql = 'SELECT * FROM trang_thai_don_hang';
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }
    public function getListSP($id)
    {
        $sql = 'SELECT chi_tiet_don_hang.*, sanpham.ten_san_pham
        FROM chi_tiet_don_hang
        INNER JOIN sanpham ON chi_tiet_don_hang.san_pham_id = sanpham.id
        WHERE chi_tiet_don_hang.don_hang_id = :id';
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([':id'=>$id]);
        return $stmt->fetchAll();
    }
    public function updateDonHang($id,$ten_nguoi_nhan,$email_nguoi_nhan,$sdt_nguoi_nhan,$dia_chi_nguoi_nhan,$ghi_chu,$trang_thai_id)
    {
        $sql = 'UPDATE don_hang SET
        ten_nguoi_nhan = :ten_nguoi_nhan,
        email_nguoi_nhan = :email_nguoi_nhan,
        sdt_nguoi_nhan = :sdt_nguoi_nhan,
        dia_chi_nguoi_nhan = :dia_chi_nguoi_nhan,
        ghi_chu = :ghi_chu,
        trang_thai_id = :trang_thai_id
         WHERE id = :id';
         $stmt = $this->conn->prepare($sql);
         $stmt->execute([
            ':ten_nguoi_nhan' => $ten_nguoi_nhan,
            ':email_nguoi_nhan' => $email_nguoi_nhan,
            ':sdt_nguoi_nhan' => $sdt_nguoi_nhan,
            ':dia_chi_nguoi_nhan' => $dia_chi_nguoi_nhan,
            ':ghi_chu' => $ghi_chu,
            ':trang_thai_id' => $trang_thai_id,
            ':id' => $id
         ]);
         return true;
    }
    public function getDonHangFromKhachHang($id)
    {
        $sql = 'SELECT don_hang.*, trang_thai_don_hang.ten_trang_thai
        FROM don_hang
        INNER JOIN trang_thai_don_hang ON don_hang.trang_thai_id = trang_thai_don_hang.id
        WHERE don_hang.tai_khoan_id = :id';
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([':id'=>$id]);
        return $stmt->fetchAll();
    }
    public function getThongKeHomNay() {
        $sql = "SELECT COALESCE(SUM(tong_tien), 0) as doanh_thu FROM don_hang WHERE DATE(ngay_dat) = CURDATE()";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $donHang = $stmt->fetch();
    
        // Lấy tổng sản phẩm đã bán hôm nay
        $sql2 = "SELECT COALESCE(SUM(so_luong), 0) AS tong_san_pham
                 FROM chi_tiet_don_hang
                 INNER JOIN don_hang ON chi_tiet_don_hang.don_hang_id = don_hang.id
                 WHERE DATE(don_hang.ngay_dat) = CURDATE()";
        $stmt2 = $this->conn->prepare($sql2);
        $stmt2->execute();
        $sanPham = $stmt2->fetch();
    
        // Lấy tổng đơn hàng hôm nay
        $sql3 = "SELECT COUNT(id) AS tong_don_hang FROM don_hang WHERE DATE(ngay_dat) = CURDATE()";
        $stmt3 = $this->conn->prepare($sql3);
        $stmt3->execute();
        $donHangCount = $stmt3->fetch();
    
        return [
            'doanh_thu' => $donHang['doanh_thu'] ?? 0,
            'tong_don_hang' => $donHangCount['tong_don_hang'] ?? 0,
            'tong_san_pham' => $sanPham['tong_san_pham'] ?? 0
        ];
    }

    public function getThongKeThang() {
        $sql = "SELECT 
                    MONTH(ngay_dat) AS thang, 
                    YEAR(ngay_dat) AS nam, 
                    COALESCE(SUM(tong_tien),0) AS doanh_thu 
                FROM don_hang 
                WHERE ngay_dat >= DATE_SUB(CURDATE(),INTERVAL 6 MONTH) 
                GROUP BY nam , thang
                ORDER BY nam ASC, thang ASC";
    
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    
    
}