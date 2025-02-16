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
        }elseif(($user && $user['mat_khau'] === $mat_khau))
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
}