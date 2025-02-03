<?php
class DanhMuc
{
    public $conn;
    public function __construct()
    {
        $this->conn = connectDB();
    }
    public function getAllDanhMuc()
    {
        $sql = 'SELECT * FROM danhmuc';
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }
    public function insertDanhMuc($ten_danh_muc,$mo_ta)
    {
        $sql = 'INSERT INTO danhmuc(ten_danh_muc,mo_ta) VALUES(:ten_danh_muc,:mo_ta)';
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            ':ten_danh_muc' => $ten_danh_muc,
            ':mo_ta' => $mo_ta,
        ]);
        return true;
    }
    public function getDetailDanhMuc($id)
    {
        $sql = 'SELECT * FROM danhmuc WHERE id = :id';
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['id'=>$id]);
        return $stmt->fetch();
    }
    public function updateDanhMuc($id,$ten_danh_muc,$mo_ta)
    {
        $sql = 'UPDATE danhmuc SET ten_danh_muc = :ten_danh_muc, mo_ta = :mo_ta WHERE id = :id';
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            ':ten_danh_muc'=>$ten_danh_muc,
            ':mo_ta'=>$mo_ta,
            ':id'=>$id
        ]);
        return true;
    }
    public function deleteDanhMuc($id)
    {
        $sql = 'DELETE FROM danhmuc WHERE id = :id';
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([':id'=>$id]);
        return true;
    }
}