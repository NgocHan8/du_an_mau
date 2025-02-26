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
    public function updateKhachHang($id,$ho_ten,$ngay_sinh,$email,$sdt,$gioi_tinh,$dia_chi,$trang_thai)
    {
        $sql = 'UPDATE tai_khoan SET
        ho_ten = :ho_ten,
        ngay_sinh = :ngay_sinh,
        email = :email,
        sdt = :sdt,
        gioi_tinh = :gioi_tinh,
        dia_chi = :dia_chi,
        trang_thai = :trang_thai
        where id = :id';
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            ':ho_ten' => $ho_ten,
            ':ngay_sinh' => $ngay_sinh,
            ':email' => $email,
            ':sdt' => $sdt,
            ':gioi_tinh' => $gioi_tinh,
            ':dia_chi' => $dia_chi,
            ':trang_thai' => $trang_thai,
            ':id' => $id 
        ]);
        return true;
    }

    public function checkLogin($email,$mat_khau)
    {
        $sql = 'SELECT * FROM tai_khoan WHERE email = :email';
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([':email'=>$email]);
        $user = $stmt->fetch();
        if($user && password_verify($mat_khau,$user['mat_khau']))
        {
            if($user['chuc_vu_id']==1){
                if($user['trang_thai']==1){
                    return true;
                }else{
                    return 'tài khoản của bạn đã bị cấm';
                }
            }else{
                return 'Tài khoản của bạn không có quyền đăng nhập';
            }
        }elseif(($user && $user['mat_khau'] === $mat_khau))
        {
            if($user['chuc_vu_id']==1){
                if($user['trang_thai']==1){
                    return true;
                }else{
                    return 'tài khoản của bạn đã bị cấm';
                }
            }else{
                return 'Tài khoản của bạn không có quyền đăng nhập';
            }
        }
        else{
            return 'Sai email hoặc mật khẩu. Vui lòng kiểm tra lại.';
        }
    }
    public function getTaiKhoanFromEmail($email)
    {
        $sql = 'SELECT * FROM tai_khoan WHERE email = :email';
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([':email'=>$email]);
        return $stmt->fetch();
    }
}