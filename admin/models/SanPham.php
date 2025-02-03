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
        $sql = 'SELECT sanpham.*, danhmuc.ten_danh_muc FROM sanpham
        INNER JOIN danhmuc ON sanpham.danh_muc_id = danhmuc.id';
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }
    public function insertSanPham($ten_san_pham,$price,$img,$quantity,$danh_muc_id,$description)
    {
        $sql = 'INSERT INTO sanpham(ten_san_pham,price,img,quantity,danh_muc_id,description) 
        VALUES(:ten_san_pham,:price,:img,:quantity,:danh_muc_id,:description)';
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            ':ten_san_pham'=>$ten_san_pham,
            ':price'=>$price,
            ':img'=>$img,
            ':quantity'=>$quantity,
            ':danh_muc_id'=>$danh_muc_id,
            ':description'=>$description,
        ]);
        return $this->conn->lastInsertId();
    }
}