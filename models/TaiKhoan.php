<?php

class TaiKhoan
{
    public $conn;
    public function __construct()
    {
        $this->conn = connectDB();
    }
    public function checkLogin($email,$mat_khau)
    {
        $sql = 'SELECT * FROM tai_khoan WHERE email = :email';
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([':email'=>$email]);
        $user = $stmt->fetch();
        if($user && password_verify($mat_khau,$user['mat_khau']))
        {
            if($user['chuc_vu_id']==2){
                if($user['trang_thai']==1){
                    return $user['email'];
                }else{
                    return 'tài khoản của bạn đã bị cấm';
                }
            }else{
                return 'Tài khoản của bạn không có quyền đăng nhập';
            }
        }
        elseif(($user && $user['mat_khau'] === $mat_khau))
        {
            if($user['chuc_vu_id']==2){
                if($user['trang_thai']==1){
                    return $user['email'];
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
    public function getDetailTaiKhoanKhachHang($email)
    {
        $sql = 'SELECT * FROM tai_khoan WHERE email = :email';
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([':email'=>$email]);
        return $stmt->fetch();
    }
    public function checkRegister($ho_ten,$ngay_sinh,$email,$sdt,$gioi_tinh,$mat_khau)
    {
        $sql = 'INSERT INTO tai_khoan (ho_ten,ngay_sinh,email,sdt,gioi_tinh,mat_khau,chuc_vu_id)
        VALUES (:ho_ten,:ngay_sinh,:email,:sdt,:gioi_tinh,:mat_khau,:chuc_vu_id)';
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            ':ho_ten'=>$ho_ten,
            ':ngay_sinh'=>$ngay_sinh,
            ':email'=>$email,
            ':sdt'=>$sdt,
            ':gioi_tinh'=>$gioi_tinh,
            ':mat_khau'=>$mat_khau,
            ':chuc_vu_id'=>2
        ]);
        return true;
    }
    public function checkEmailExists($email)
    {
        $sql = 'SELECT COUNT(*) FROM tai_khoan WHERE email=:email';
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([':email'=>$email]);
        $count = $stmt->fetchColumn();
        return $count > 0; // nếu slg >0 email tồn tại
    }
    public function getTaiKhoanFromEmail($email)
    {
        $sql = 'SELECT * FROM tai_khoan WHERE email = :email';
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([':email'=>$email]);
        return $stmt->fetch();
    }
    public function checkEmailPhone($email,$sdt)
    {
        $sql = 'SELECT * FROM tai_khoan WHERE email =:email AND sdt = :sdt';
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([':email'=>$email, 'sdt'=>$sdt]);
        return $stmt->fetch();
    }
    public function updatePass($email,$new_password)
    {
        $mat_khau = password_hash($new_password, PASSWORD_DEFAULT);
        // echo "Mật khẩu đã hash: " . $mat_khau; 
        $sql = 'UPDATE tai_khoan SET mat_khau = :mat_khau WHERE email = :email';
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([':email'=>$email, 'mat_khau'=>$mat_khau]);
        return true;
    }
}