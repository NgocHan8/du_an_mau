<?php
session_start();
require_once './configs/env.php';
require_once './configs/function.php';
// require_once './configs/helper.php';
require_once './controllers/HomeController.php';

require_once './models/SanPham.php';
require_once './models/TaiKhoan.php';
require_once './models/GioHang.php';
require_once './models/DonHang.php';
// Điều hướng

$act = $_GET['act'] ?? '/';
match ($act)
{
    '/' => (new HomeController)->home(),
    // 'list-danh-muc' => (new AdminDanhMucController)->list(),
    // 'form-them-danh-muc' => (new AdminDanhMucController)->formAdd(),
    // 'them-danh-muc'=>(new AdminDanhMucController)->postAddDanhMuc(),

    // login logout
    'login' =>(new HomeController())->formLogin(),
    'check-login' =>(new HomeController())->Login(),
    'logout'=>(new HomeController())->Logout(),
    'my-acount'=>(new HomeController())->myAcount(),
    'register'=>(new HomeController())->formRegister(),
    'check-register' =>(new HomeController())->Register(),
    'forget-pass'=>(new HomeController())->formQuenPass(),
    'reset-pass'=>(new HomeController())->checkMail(),
    'form-pass'=>(new HomeController())->formPass(),
    'post-reset-pass'=>(new HomeController())->postRessPass(),

    'search'=>(new HomeController())->search(),
    'gioi-thieu'=>(new HomeController())->gioiThieu(),
    'lien-he'=>(new HomeController())->LienHe(),

    // sanr phẩm
    'list-san-pham'=>(new HomeController())->listSanPham(),
    'chi-tiet-san-pham'=>(new HomeController())->detailSanPham(),

    'gio-hang'=>(new HomeController())->gioHang(),
    'them-gio-hang'=>(new HomeController())->addGioHang(),
    'xoa-san-pham'=>(new HomeController())->xoaSanPham(),
    'cap-nhat-so-luong'=>(new HomeController())->capNhatSoLuong(),

    'thanh-toan'=>(new HomeController())->thanhToan(),
    'xu-ly-thanh-toan'=>(new HomeController())->postThanhToan(),
    'lich-su-mua-hang'=>(new HomeController())->lichSuMuaHang(),
    'chi-tiet-don-hang'=>(new HomeController())->chiTietDonHang(),
    'huy-don-hang'=>(new HomeController())->huyDonHang(),
    'form-danh-gia'=>(new HomeController())->danhGia()


    




    
};