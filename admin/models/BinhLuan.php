<?php

class BinhLuan
{
    public $conn;
    public function __construct()
    {
        $this->conn = connectDB();
    }
    public function getAllBinhLuan()
    {
        $sql = 'SELECT binh_luan.*, tai_khoan.ho_ten
        FROM binh_luan
        INNER JOIN tai_khoan ON binh_luan.tai_khoan_id = tai_khoan.id';
        $stmt= $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }
    public function getBinhLuanFromKhach($id)
    {
        $sql = 'SELECT binh_luan.*, sanpham.ten_san_pham
        FROM binh_luan
        INNER JOIN sanpham ON binh_luan.san_pham_id = sanpham.id
        where binh_luan.tai_khoan_id = :id';
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([':id' => $id]);
        return $stmt->fetchAll();
    }
    public function getDetailBinhLuan($id)
    {
        $sql = 'SELECT * FROM binh_luan WHERE id = :id';
        $stmt= $this->conn->prepare($sql);
        $stmt->execute([':id'=>$id]);
        return $stmt->fetch();
    }
    public function updateTrangThaiBinhLuan($id,$trang_thai)
    {
        $sql = 'UPDATE binh_luan SET trang_thai = :trang_thai
        WHERE id = :id';
        $stmt= $this->conn->prepare($sql);
        $stmt->execute([
            ':trang_thai'=>$trang_thai,
            ':id'=>$id,
        ]);
        return true;
    }
    public function getBinhLuanFromSanPham($id)
    {
        $sql = 'SELECT binh_luan.*, tai_khoan.ho_ten
        FROM binh_luan
        INNER JOIN tai_khoan ON binh_luan.tai_khoan_id = tai_khoan.id
        WHERE binh_luan.san_pham_id = :id';
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([':id' => $id]);
        return $stmt->fetchAll();
    }
}