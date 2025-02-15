<?php

class SanPham
{
    public $conn;
    public function __construct()
    {
        $this->conn = connectDB();
    }
    public function getAllSanPham()
    {
        $sql = 'SELECT sanpham.*, danhmuc.ten_danh_muc
        FROM sanpham
        INNER JOIN danhmuc ON sanpham.danh_muc_id = danhmuc.id';
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }
    public function getDetailSanPham($id)
    {
        $sql = 'SELECT sanpham.*, danhmuc.ten_danh_muc
        FROM sanpham
        INNER JOIN danhmuc ON sanpham.danh_muc_id = danhmuc.id
        WHERE sanpham.id = :id';
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([':id'=>$id]);
        return $stmt->fetch();
    }
    public function getListSanPhamDanhMuc($danh_muc_id)
    {
        $sql = 'SELECT sanpham.*, danh_muc.ten_danh_muc
        FROM sanpham
        INNER JOIN danhmuc ON sanpham.danh_muc_id = danh_muc.id
        WHERE sanpham.danh_muc_id = '.$danh_muc_id;
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }
}