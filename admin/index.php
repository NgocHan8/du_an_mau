<?php
session_start();
require_once '../configs/env.php';
require_once '../configs/function.php';

require_once   './controllers/AdminDanhMucController.php';
require_once   './controllers/AdminSanPhamController.php';
require_once   './controllers/AdminDonHangController.php';
require_once   './controllers/AdminTaiKhoanController.php';
require_once  './models/SanPham.php';
require_once  './models/DanhMuc.php';
require_once  './models/DonHang.php';
require_once  './models/TaiKhoan.php';

$act = $_GET['act'] ?? '/';

match ($act)
{
    '/' => (new AdminDanhMucController)->list(),

    // Danh Mục
    'danh-muc' => (new AdminDanhMucController())->list(),
    'form-them-danh-muc' => (new AdminDanhMucController())->formAddDanhMuc(),
    'them-danh-muc'=>(new AdminDanhMucController())->postAddDanhMuc(),
    'form-sua-danh-muc' => (new AdminDanhMucController())->formEditDanhMuc(),
    'sua-danh-muc'=>(new AdminDanhMucController())->postEditDanhMuc(),
    'xoa-danh-muc'=>(new AdminDanhMucController())->destroyDanhMuc(),

    // Sản phẩm
    'san-pham' =>(new AdminSanPhamController())->listSanPham(),
    'xem-san-pham'=>(new AdminSanPhamController())->showSanPham(),
    'form-them-san-pham' => (new AdminSanPhamController())->formAddSanPham(),
    'them-san-pham'=>(new AdminSanPhamController())->postAddSanPham(),
    'form-sua-san-pham' => (new AdminSanPhamController())->formEditSanPham(),
    'sua-san-pham'=>(new AdminSanPhamController())->postEditSanPham(),
    'xoa-san-pham'=>(new AdminSanPhamController())->deleteSanPham(),
    // 'sua-album-anh-san-pham'=>(new AdminSanPhamController())->postEditAnhSanPham(),
    
    // Đơn hàng
    'don-hang' =>(new AdminDonHangController())->listDonHang(),
    'xem-don-hang' =>(new AdminDonHangController())->getDetailDonHang(),
    'form-sua-don-hang' =>(new AdminDonHangController())->formEditDonHang(),
    'sua-don-hang' =>(new AdminDonHangController())->postEditDonHang(),

    // Tài khoản quản trị
    'list-tai-khoan-quan-tri' =>(new AdminTaiKhoanController())->listQuanTri(),
    'form-them-tai-khoan-quan-tri' => (new AdminTaiKhoanController())->formAddQuanTri(),
    'them-tai-khoan-quan-tri'=>(new AdminTaiKhoanController())->postAddQuanTri(),
    'form-sua-tai-khoan-quan-tri' =>(new AdminTaiKhoanController())->formEditQuanTri(),
    'sua-tai-khoan-quan-tri' =>(new AdminTaiKhoanController())->postEditQuanTri(),
    'reset-password'=>(new AdminTaiKhoanController())->resetPass(),

    // Tài khoản khách hàng
    'list-tai-khoan-khach-hang' =>(new AdminTaiKhoanController())->listKhachHang(),
    'form-sua-tai-khoan-khach-hang' =>(new AdminTaiKhoanController())->formEditKhachHang(),
    'sua-tai-khoan-khach-hang' =>(new AdminTaiKhoanController())->postEditKhachHang(),
    'chi-tiet-tai-khoan-khach-hang'=>(new AdminTaiKhoanController())->detailKhachHang(),

    // login
    'login-admin' => (new AdminTaiKhoanController())->formLogin(),
    'check-login-admin' => (new AdminTaiKhoanController())->Login(),
    'logout-admin' => (new AdminTaiKhoanController())->logout(),

    // quản lí tài khoản cá nhân quản trị
    'form-sua-tai-khoan-ca-nhan' =>(new AdminTaiKhoanController())->formEditCaNhanQuanTri(),
};