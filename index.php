<?php
session_start();
require_once './configs/env.php';
require_once './configs/function.php';
// require_once './configs/helper.php';
require_once './controllers/HomeController.php';

require_once './models/SanPham.php';
require_once './models/TaiKhoan.php';
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
};