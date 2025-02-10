<?php
class TaiKhoan
{
    public $conn;
    public function __construct()
    {
        $this->conn = connectDB();
    }
    public function getAllTaiKhoan($chuc_vu_id)
    {
        $sql = 'SELECT * FROM tai_khoan WHERE chuc_vu_id = :chuc_vu_id';
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([':chuc_vu_id'=>$chuc_vu_id]);
        return $stmt->fetchAll();
    }
    public function insertTaiKhoan($ho_ten,$email,$sdt,$mat_khau,$chuc_vu_id)
    {
        $sql = 'INSERT INTO tai_khoan(ho_ten,email,sdt,mat_khau,chuc_vu_id) VALUES (:ho_ten,:email,:sdt,:mat_khau,:chuc_vu_id)';
        $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':ho_ten' => $ho_ten,
                ':email' => $email,
                ':sdt' => $sdt,
                ':mat_khau' => $mat_khau,
                ':chuc_vu_id' => $chuc_vu_id 
            ]);
            return true;
    }
    public function getDetailTaiKhoan($id)
    {
        $sql = 'SELECT * FROM tai_khoan WHERE id = :id';
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([':id'=>$id]);
        return $stmt->fetch();
    }
    public function updateTaiKhoan($id,$ho_ten,$email,$sdt,$trang_thai)
    {
        $sql = 'UPDATE tai_khoan SET 
        ho_ten = :ho_ten,
        email = :email,
        sdt = :sdt,
        trang_thai = :trang_thai
        WHERE id = :id';
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            ':ho_ten' => $ho_ten,
            ':email' => $email,
            ':sdt' => $sdt,
            ':trang_thai' => $trang_thai,
            ':id' => $id 
        ]);
        return true;
    }
    public function resetPassword($id,$mat_khau)
    {
        $sql = 'UPDATE tai_khoan SET mat_khau = :mat_khau
        WHERE id = :id';
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            ':mat_khau'=>$mat_khau,
            ':id'=>$id
        ]);
        return true;
    }
}