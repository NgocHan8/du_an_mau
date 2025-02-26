<?php

class GioHang
{
    public $conn;
    public function __construct()
    {
        $this->conn = connectDB();
    }
    public function getGioHangFromUser($id)
    {
        try {
            $sql = 'SELECT * From gio_hang WHERE tai_khoan_id=:tai_khoan_id';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute(['tai_khoan_id' => $id]);
            return $stmt->fetch();
        } catch (Exception $e) {
            echo "lỗi" . $e->getMessage();
        }
    }
    public function getDetailGioHang($id)
    {
        try {
            $sql = 'SELECT chi_tiet_gio_hang.*, sanpham.ten_san_pham , sanpham.img, sanpham.price, sanpham.quantity
            FROM chi_tiet_gio_hang
            INNER JOIN sanpham ON chi_tiet_gio_hang.san_pham_id =sanpham.id 
            where chi_tiet_gio_hang.gio_hang_id = :gio_hang_id';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute(['gio_hang_id' => $id]);
            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo "lỗi" . $e->getMessage();
        }
    }
    public function addGioHang($id)
    {
        try {
            $sql = 'INSERT INTO gio_hang (tai_khoan_id) VALUES (:id)';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute(['id' => $id]);
            return $this->conn->lastInsertId();
        } catch (Exception $e) {
            echo "lỗi" . $e->getMessage();
        }
    }
    public function updateSoLuong($gio_hang_id, $san_pham_id, $so_luong)
    {
        try {
            $sql = ' UPDATE chi_tiet_gio_hang
            SET so_luong=:so_luong
            WHERE gio_hang_id= :gio_hang_id AND san_pham_id= :san_pham_id ';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute(['gio_hang_id' => $gio_hang_id, 'san_pham_id' => $san_pham_id, 'so_luong' => $so_luong]);
            return true;
        } catch (Exception $e) {
            echo "lỗi" . $e->getMessage();
        }
    }
    public function addDetailGioHang($gio_hang_id, $san_pham_id, $so_luong)
    {
        try {
            $sql = ' INSERT INTO chi_tiet_gio_hang (gio_hang_id, san_pham_id, so_luong)
            VALUES (:gio_hang_id, :san_pham_id, :so_luong) ';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute(['gio_hang_id' => $gio_hang_id, 'san_pham_id' => $san_pham_id, 'so_luong' => $so_luong]);
            return true;
        } catch (Exception $e) {
            echo "lỗi" . $e->getMessage();
        }
    }
    public function clearDetailGioHang($gioHangId)
    {
        $sql = 'DELETE FROM chi_tiet_gio_hang WHERE gio_hang_id = :gio_hang_id';
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            ':gio_hang_id' => $gioHangId
        ]);
        return true;
    }
    public function clearGioHang($taiKhoanId)
    {
        $sql = 'DELETE FROM gio_hang WHERE tai_khoan_id = :tai_khoan_id';
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            ':tai_khoan_id' => $taiKhoanId
        ]);
        return true;
    }
    public function removeDetailGioHang($gio_hang_id, $san_pham_id)
    {
        try {
            $sql = 'DELETE FROM chi_tiet_gio_hang WHERE gio_hang_id = :gio_hang_id AND san_pham_id = :san_pham_id';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute(['gio_hang_id' => $gio_hang_id, 'san_pham_id' => $san_pham_id]);
            return true;
        } catch (Exception $e) {
            echo "Lỗi: " . $e->getMessage();
        }
    }
    // Thêm phương thức tính tổng tiền giỏ hàng
    // public function tinhTongTien($gio_hang_id)
    // {
    //     try {
    //         $sql = 'SELECT SUM(chi_tiet_gio_hang.so_luong * sanpham.price) as tong_tien
    //                 FROM chi_tiet_gio_hang
    //                 INNER JOIN sanpham ON chi_tiet_gio_hang.san_pham_id = sanpham.id
    //                 WHERE chi_tiet_gio_hang.gio_hang_id = :gio_hang_id';
    //         $stmt = $this->conn->prepare($sql);
    //         $stmt->execute(['gio_hang_id' => $gio_hang_id]);
    //         $result = $stmt->fetch();
    //         return $result['tong_tien'] ?? 0;
    //     } catch (Exception $e) {
    //         echo "Lỗi: " . $e->getMessage();
    //         return 0;
    //     }
    // }
}
