<?php
class DonHang
{

    public $conn;
    public function __construct()
    {
        $this->conn = connectDB();
    }
    public function addDonHang($tai_khoan_id, $ten_nguoi_nhan, $email_nguoi_nhan, $sdt_nguoi_nhan, $dia_chi_nguoi_nhan, $ghi_chu, $tong_tien, $phuong_thuc_thanh_toan_id, $ngay_dat, $ma_don_hang, $trang_thai_id)
    {
        
            $sql = 'INSERT INTO don_hang (tai_khoan_id,ten_nguoi_nhan, email_nguoi_nhan, sdt_nguoi_nhan, dia_chi_nguoi_nhan, ghi_chu, tong_tien, phuong_thuc_thanh_toan_id, ngay_dat,ma_don_hang, trang_thai_id) 
                VALUES (:tai_khoan_id,:ten_nguoi_nhan, :email_nguoi_nhan, :sdt_nguoi_nhan, :dia_chi_nguoi_nhan, :ghi_chu, :tong_tien, :phuong_thuc_thanh_toan_id, :ngay_dat,:ma_don_hang,  :trang_thai_id)
                ';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                'tai_khoan_id' => $tai_khoan_id,
                'ten_nguoi_nhan' => $ten_nguoi_nhan,
                'email_nguoi_nhan' => $email_nguoi_nhan,
                'sdt_nguoi_nhan' => $sdt_nguoi_nhan,
                'dia_chi_nguoi_nhan' => $dia_chi_nguoi_nhan,
                'ghi_chu' => $ghi_chu,
                'tong_tien' => $tong_tien,
                'phuong_thuc_thanh_toan_id' => $phuong_thuc_thanh_toan_id,
                'ngay_dat' => $ngay_dat,
                'ma_don_hang' => $ma_don_hang,
                'trang_thai_id' => $trang_thai_id

            ]);
            return $this->conn->lastInsertId();
        
    }

    public function addChiTietDonHang($donHangId, $sanPhamId, $donGia, $soLuong, $thanhTien)
    {
        $sql = 'INSERT INTO chi_tiet_don_hang (don_hang_id, san_pham_id, don_gia, so_luong, thanh_tien) 
                VALUES (:don_hang_id, :san_pham_id, :don_gia, :so_luong, :thanh_tien)
                ';
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            'don_hang_id' => $donHangId,
            'san_pham_id' => $sanPhamId,
            'don_gia' => $donGia,
            'so_luong' => $soLuong,
            'thanh_tien' => $thanhTien,
        ]);
        return true;
    }

    public function getDonHangFromUser($taiKhoanId)
    {
        $sql = 'SELECT * FROM don_hang WHERE tai_khoan_id = :tai_khoan_id';
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            'tai_khoan_id' => $taiKhoanId,
        ]);
        return $stmt->fetchAll();
    }

    public function getTrangThaiDonHang()
    {
        $sql = 'SELECT * FROM trang_thai_don_hang ';
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }
    public function getPhuongThucThanhToan()
    {
        $sql = 'SELECT * FROM phuong_thuc_thanh_toan';
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }
    
    public function getDonHangById($donHangId)
    {
        $sql = 'SELECT * FROM don_hang WHERE id = :id';
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([':id'=>$donHangId]);
        return $stmt->fetch();
    }

    public function updateTrangThaiDonHang($donHangId, $trangThaiId)
    {
        $sql = 'UPDATE don_hang SET trang_thai_id = :trang_thai_id WHERE id = :id';
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            ':trang_thai_id'=>$trangThaiId,
            ':id'=>$donHangId,
        ]);
        return true;
    }
    public function getChiTietDonHangById($donHangId)
    {
        $sql = 'SELECT chi_tiet_don_hang.*, sanpham.ten_san_pham, sanpham.img
         FROM chi_tiet_don_hang
         JOIN sanpham ON chi_tiet_don_hang.san_pham_id = sanpham.id WHERE chi_tiet_don_hang.don_hang_id = :don_hang_id';
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([':don_hang_id'=>$donHangId]);
        return $stmt->fetchAll();
    }
    public function danhGia($san_pham_id,$tai_khoan_id,$img,$noi_dung)
    {
        $sql = "INSERT INTO danh_gia (san_pham_id,tai_khoan_id,img, noi_dung, trang_thai) 
                    VALUES ( :san_pham_id,:tai_khoan_id,:img, :noi_dung,  :trang_thai)";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':san_pham_id' => $san_pham_id,
                ':tai_khoan_id' => $tai_khoan_id,
                ':noi_dung' => $noi_dung,
                ':img' => $img,
                ':trang_thai'=>1
            ]);
    }
    public function getDetail($id)
    {
        $sql = "SELECT sp.id, sp.ten_san_pham, sp.img
        FROM chi_tiet_don_hang ctdh
        JOIN sanpham sp ON ctdh.san_pham_id = sp.id
        WHERE ctdh.don_hang_id = :id";

        $stmt = $this->conn->prepare($sql);
        $stmt->execute([':id' => $id]);
        return $stmt->fetchAll();
    }
}
