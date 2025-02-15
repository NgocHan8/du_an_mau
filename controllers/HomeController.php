<?php
class HomeController
{
    public $modelSanPham;
    public $modelTaiKhoan;
    public $modelGioHang;
    public $modelDonHang;
    public function __construct()
    {
        $this->modelSanPham = new SanPham();
        $this->modelTaiKhoan = new TaiKhoan();
    }
    public function home()
    {
        $listSanPham = $this->modelSanPham->getAllSanPham();
        require_once 'views/Home.php';

    }
    public function formLogin()
    {
        require_once './views/auth/formLogin.php';
        deleteSessionError();
    }
    public function postLogin()
    {
        if($_SERVER['REQUEST_METHOD']=='POST')
        {
            $email = $_POST['email'];
            $password = $_POST['mat_khau'];
            // Xử lý và kiểm tra thông tin đăng nhập
            $user = $this->modelTaiKhoan->checkLogin($email,$password);
            if($user==$email)
            {
                // Nếu đăng nhập thành công, lưu thông tin vào session
                $_SESSION['user_client'] = $user;
                header('location'.BASE_URL);
                exit();
            }else
            {
                // Nếu đăng nhập thất bại, lưu lỗi vào session
                $_SESSION['error'] = $user;
                $_SESSION['flash'] = true;
                header('location'.BASE_URL.'?act=login');
                exit();
            }
        }
    }
}