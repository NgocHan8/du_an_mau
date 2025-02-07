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
        INNER JOIN trang_thai_don_hang ON don_hang.trang_thai_id = trang_thai_don_hang.id';
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
}