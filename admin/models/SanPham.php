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
    public function insertSanPham($ten_san_pham, $price, $img, $quantity, $danh_muc_id, $mo_ta)
    {
        $sql = 'INSERT INTO sanpham(ten_san_pham,price,img,quantity,danh_muc_id,mo_ta) 
        VALUES(:ten_san_pham,:price,:img,:quantity,:danh_muc_id,:mo_ta)';
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            ':ten_san_pham' => $ten_san_pham,
            ':price' => $price,
            ':img' => $img,
            ':quantity' => $quantity,
            ':danh_muc_id' => $danh_muc_id,
            ':mo_ta' => $mo_ta,
        ]);
        return $this->conn->lastInsertId();
    }
    
    public function getDetailSanPham($id)
    {
        $sql = 'SELECT sanpham.*, danhmuc.ten_danh_muc FROM sanpham
        INNER JOIN danhmuc ON sanpham.danh_muc_id = danhmuc.id WHERE sanpham.id = :id';
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([':id' => $id]);
        return $stmt->fetch();
    }

    public function updateSanPham($san_pham_id,$ten_san_pham, $price, $img, $quantity, $danh_muc_id, $mo_ta)
    {
        $sql = 'UPDATE sanpham SET ten_san_pham = :ten_san_pham, price = :price, img = :img, 
        quantity = :quantity, danh_muc_id = :danh_muc_id, mo_ta = :mo_ta
        WHERE id = :id';
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            ':ten_san_pham' => $ten_san_pham,
            ':price' => $price,
            ':img' => $img,
            ':quantity' => $quantity,
            ':danh_muc_id' => $danh_muc_id,
            ':mo_ta' => $mo_ta,
            ':id' => $san_pham_id,
        ]);
        return true;
    }
    // public function getDetailAnhSanPham($id)
    // {
    //     $sql = 'SELECT * FROM hinh_anh_san_pham WHERE san_pham_id=:id';
    //     $stmt = $this->conn->prepare($sql);
    //     $stmt->execute([':id' => $id]);
    //     return $stmt->fetch();
    // }
    // public function updateAnhSanPham($id,$newFile)
    // {
    //     $sql = 'UPDATE hinh_anh_san_pham SET link_anh = :newFile
    //     WHERE id = :id';
    //     $stmt = $this->conn->prepare($sql);
    //     $stmt->execute([
    //         ':link_anh'=>$newFile,
    //         ':id' => $id]);
    //     return true;
    // }
    // public function destroyAnhSanPham($id)
    // {
    //     $sql = 'DELETE FROM hinh_anh_san_pham WHERE id = :id';
    //     $stmt = $this->conn->prepare($sql);
    //     $stmt->execute([':id' => $id]);
    //     return true;
    // }
    public function destroySanPham($id)
    {
        $sql = 'DELETE FROM sanpham WHERE id = :id';
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([':id' => $id]);
        return true;
    }

    
}
