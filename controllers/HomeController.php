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
        $this->modelGioHang = new GioHang();
        $this->modelDonHang = new DonHang();
    }
    public function home()
    {
        $listSanPham = $this->modelSanPham->getAllSanPham(); // Lấy toàn bộ sản phẩm

        require_once './views/Home.php';
    }
    public function listSanPham()
    {
        $listSanPham = $this->modelSanPham->getAllSanPham(); // Lấy toàn bộ sản phẩm

        require_once './views/products.php';
    }
    public function formLogin()
    {
        require_once './views/auth/formLogin.php';
        deleteSessionError();
    }
    public function Login()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $email = $_POST['email'];
            $password = $_POST['mat_khau'];
            // Xử lý và kiểm tra thông tin đăng nhập
            $user = $this->modelTaiKhoan->checkLogin($email, $password);
            if ($user == $email) {
                // Nếu đăng nhập thành công, lưu thông tin vào session
                $_SESSION['user_client'] = $user;
                header('location:' . BASE_URL);
                exit();
            } else {
                // Nếu đăng nhập thất bại, lưu lỗi vào session
                $_SESSION['error'] = is_array($user) ? implode(' ', $user) : $user;
                $_SESSION['flash'] = true;
                header('location:' . BASE_URL . '?act=login');
                exit();
            }
        }
    }
    public function myAcount()
    {
        $email = $_SESSION['user_client'];
        $user = $this->modelTaiKhoan->getDetailTaiKhoanKhachHang($email);

        if ($user) {
            require_once './views/myAcount.php';  // Fixed view name

        } else {
            header('Location: ' . BASE_URL);
            exit();
        }
    }
    public function Logout()
    {
        if (isset($_SESSION['user_client'])) {
            unset($_SESSION['user_client']);
            header('location:' . BASE_URL);
            exit();
        }
    }
    public function search()
    {
        $keyword = isset($_GET['query']) ? trim(($_GET['query'])) : '';
        if (empty($keyword)) {
            header('location:' . BASE_URL);
            exit;
        }
        $searchResults = $this->modelSanPham->searchSanPham($keyword);
        require_once './views/search.php';
    }
    public function formRegister()
    {
        require_once './views/auth/formRegister.php';
        deleteSessionError();
    }
    public function Register()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $ho_ten = $_POST['ho_ten'];
            $ngay_sinh = $_POST['ngay_sinh'];
            $email = $_POST['email'];
            $sdt = $_POST['sdt'];
            $gioi_tinh = $_POST['gioi_tinh'];
            $mat_khau = $_POST['mat_khau'];
            $errors = [];
            // Kiểm tra các điều kiện
            if (empty($ho_ten)) {
                $errors['ho_ten'] = 'Tên không được để trống';
            }
            if (empty($ngay_sinh)) {
                $errors['ngay_sinh'] = 'Vui lòng nhập ngày sinh';
            }
            if (empty($email)) {
                $errors['email'] = 'Email không được để trống';
            } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $errors['email'] = 'Email không hợp lệ';
            } elseif ($this->modelTaiKhoan->checkEmailExists($email)) {
                $errors['email'] = 'Email này đã được đăng ký';
            }
            if (empty($sdt)) {
                $errors['sdt'] = 'Vui lòng nhập điện thoại';
            }
            if (empty($gioi_tinh)) {
                $errors['gioi_tinh'] = 'Vui lòng chọn giới tính';
            } else {
                $gioi_tinh = ($gioi_tinh == 'Nữ') ? 2 : 1;
            }

            if (empty($mat_khau)) {
                $errors['mat_khau'] = 'Password không được để trống';
            } elseif (strlen($mat_khau) < 6) {
                $errors['mat_khau'] = 'Password phải có ít nhất 6 ký tự';
            }
            $_SESSION['error'] = $errors;
            if (empty($errors)) {
                $isRegister =  $this->modelTaiKhoan->checkRegister($ho_ten, $ngay_sinh, $email, $sdt, $gioi_tinh, $mat_khau);
                if ($isRegister) {
                    unset($_SESSION['error']);
                    $_SESSION['success'] = 'Đăng ký thành công. vùi lòng đăng nhập';
                    header('location: ' . BASE_URL . '?act=login');
                    exit;
                }
            } else {
                $_SESSION['flash'] = true;
                header('location: ' . BASE_URL . '?act=register');
                exit;
            }
        }
    }
    public function detailSanPham()
    {
        $id = $_GET['id_san_pham'];
        $sanPham = $this->modelSanPham->getDetailSanPham($id);
        $danhMuc = $this->modelSanPham->getDanhMucById($sanPham['danh_muc_id']);
        $listBinhLuan = $this->modelSanPham->getBinhLuanFromSanPham($id);
        $listSanPhamCungDanhMuc = $this->modelSanPham->getListSanPhamDanhMuc($sanPham['danh_muc_id']);
        if ($sanPham) {
            require_once './views/detailSanPham.php';
        } else {
            header('location:' . BASE_URL . '?act=chi-tiet-san-pham');
            exit;
        }
    }
    // public function addGioHang()
    // {
    //     if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    //         if (isset($_SESSION['user_client'])) {
    //             $mail = $this->modelTaiKhoan->getTaiKhoanFromEmail($_SESSION['user_client']);
    //             // lấy dữ liệu giỏ hàng của người dùng
    //             $gioHang = $this->modelGioHang->getGioHangFromUser($mail['id']);
    //             if (!$gioHang) {
    //                 $gioHangId = $this->modelGioHang->addGioHang($mail['id']);
    //                 $gioHang = ['id' => $gioHangId];
    //                 $chiTietGioHang = $this->modelGioHang->getDetailGioHang($gioHang['id']);
    //             } else {
    //                 $chiTietGioHang = $this->modelGioHang->getDetailGioHang($gioHang['id']);
    //             }
    //             $san_pham_id = $_POST['san_pham_id'];
    //             $so_luong = $_POST['so_luong'];

    //             $checkSanPham = false;
    //             foreach ($chiTietGioHang as $deteil) {
    //                 if ($deteil['san_pham_id'] == $san_pham_id) {
    //                     $newSoLuong = $deteil['so_luong'] + $so_luong;
    //                     $this->modelGioHang->updateSoLuong($gioHang['id'], $san_pham_id, $newSoLuong);
    //                     $checkSanPham = true;
    //                     break;
    //                 }
    //             }
    //             if (!$checkSanPham) {
    //                 $this->modelGioHang->addDetailGioHang($gioHang['id'], $san_pham_id, $so_luong);
    //             }
    //             header('location: ' . BASE_URL . '?act=gio-hang');
    //         } else {
    //             header('Location: ' . BASE_URL . '?act=login');
    //         }
    //     }
    // }
    public function addGioHang()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (isset($_SESSION['user_client'])) {
                $mail = $this->modelTaiKhoan->getTaiKhoanFromEmail($_SESSION['user_client']);
                $gioHang = $this->modelGioHang->getGioHangFromUser($mail['id']);

                if (!$gioHang) {
                    $gioHangId = $this->modelGioHang->addGioHang($mail['id']);
                    $gioHang = ['id' => $gioHangId];
                }

                $chiTietGioHang = $this->modelGioHang->getDetailGioHang($gioHang['id']);
                $san_pham_id = $_POST['san_pham_id'];
                $so_luong = $_POST['so_luong'];

                $checkSanPham = false;
                foreach ($chiTietGioHang as $deteil) {
                    if ($deteil['san_pham_id'] == $san_pham_id) {
                        $newSoLuong = $deteil['so_luong'] + $so_luong;
                        $this->modelGioHang->updateSoLuong($gioHang['id'], $san_pham_id, $newSoLuong);
                        $checkSanPham = true;
                        break;
                    }
                }

                if (!$checkSanPham) {
                    $this->modelGioHang->addDetailGioHang($gioHang['id'], $san_pham_id, $so_luong);
                }

                header('location: ' . BASE_URL . '?act=gio-hang');
            } else {
                header('Location: ' . BASE_URL . '?act=login');
            }
        }
    }
    public function gioHang()
    {
        if (isset($_SESSION['user_client'])) {
            $mail = $this->modelTaiKhoan->getTaiKhoanFromEmail($_SESSION['user_client']);

            $gioHang = $this->modelGioHang->getGioHangFromUser($mail['id']);
            if (!$gioHang) {
                $gioHangId = $this->modelGioHang->addGioHang($mail['id']);
                $gioHang = ['id' => $gioHangId];
                $chiTietGioHang = $this->modelGioHang->getDetailGioHang($gioHang['id']);
            } else {
                $chiTietGioHang = $this->modelGioHang->getDetailGioHang($gioHang['id']);
            }

            require_once './views/gioHang.php';
        } else {
            header('location: ' . BASE_URL . '?act=login');
        }
    }
    public function thanhToan()
    {
        if (isset($_SESSION['user_client'])) {
            $user = $this->modelTaiKhoan->getTaiKhoanFromEmail($_SESSION['user_client']);

            $gioHang = $this->modelGioHang->getGioHangFromUser($user['id']);
            if (!$gioHang) {
                $gioHangId = $this->modelGioHang->addGioHang($user['id']);
                $gioHang = ['id' => $gioHangId];
                $chiTietGioHang = $this->modelGioHang->getDetailGioHang($gioHang['id']);
            } else {
                $chiTietGioHang = $this->modelGioHang->getDetailGioHang($gioHang['id']);
            }

            require_once './views/thanhToan.php';
        } else {
            var_dump('chua danh nhap');
            die;
        }
    }
    public function postThanhToan()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // var_dump($_POST);
            // die;
            $ten_nguoi_nhan = $_POST['ten_nguoi_nhan'];
            $email_nguoi_nhan = $_POST['email_nguoi_nhan'];
            $sdt_nguoi_nhan = $_POST['sdt_nguoi_nhan'];
            $dia_chi_nguoi_nhan = $_POST['dia_chi_nguoi_nhan'];
            $ghi_chu = $_POST['ghi_chu'];
            $tong_tien = $_POST['tong_tien'];
            $phuong_thuc_thanh_toan_id = $_POST['phuong_thuc_thanh_toan_id'];
            $ngay_dat = date('Y-m-d');
            $trang_thai_id = 1;

            $user = $this->modelTaiKhoan->getTaiKhoanFromEmail($_SESSION['user_client']);
            $tai_khoan_id = $user['id'];

            $ma_don_hang = 'DH-' . rand(1000, 9999);
            // them thong tin vao dd 
            $this->modelDonHang->addDonHang(
                $tai_khoan_id,
                $ten_nguoi_nhan,
                $email_nguoi_nhan,
                $sdt_nguoi_nhan,
                $dia_chi_nguoi_nhan,
                $ghi_chu,
                $tong_tien,
                $phuong_thuc_thanh_toan_id,
                $ngay_dat,
                $ma_don_hang,
                $trang_thai_id
            );
        }
        header('location: ' . BASE_URL);
    }
    public function xoaSanPham()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $san_pham_id = $_POST['san_pham_id'];
            if (isset($_SESSION['user_client'])) {
                $mail = $this->modelTaiKhoan->getTaiKhoanFromEmail($_SESSION['user_client']);
                $gioHang = $this->modelGioHang->getGioHangFromUser($mail['id']);
                if ($gioHang) {
                    $this->modelGioHang->removeDetailGioHang($gioHang['id'], $san_pham_id);
                }
                header('location: ' . BASE_URL . '?act=gio-hang');
                exit();
            } else {
                header('location: ' . BASE_URL . '?act=login');
                exit();
            }
        }
    }

    // Thêm phương thức này vào class HomeController

    public function capNhatSoLuong()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (isset($_SESSION['user_client'])) {
                $san_pham_id = $_POST['san_pham_id'];
                $so_luong = $_POST['so_luong'];

                $mail = $this->modelTaiKhoan->getTaiKhoanFromEmail($_SESSION['user_client']);
                $gioHang = $this->modelGioHang->getGioHangFromUser($mail['id']);

                if ($gioHang) {
                    $this->modelGioHang->updateSoLuong($gioHang['id'], $san_pham_id, $so_luong);
                    // Chuyển hướng về trang giỏ hàng để hiển thị cập nhật
                    header('location: ' . BASE_URL . '?act=gio-hang');
                    exit();
                }
            }
            // Nếu có lỗi, vẫn chuyển về trang giỏ hàng
            header('location: ' . BASE_URL . '?act=gio-hang');
            exit();
        }
    }
    // public function postThanhToan()
    // {
    //     if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    //         $ten_nguoi_nhan = $_POST['ten_nguoi_nhan'];
    //         $email_nguoi_nhan = $_POST['email_nguoi_nhan'];
    //         $sdt_nguoi_nhan = $_POST['sdt_nguoi_nhan'];
    //         $dia_chi_nguoi_nhan = $_POST['dia_chi_nguoi_nhan'];
    //         $ghi_chu = $_POST['ghi_chu'];
    //         $tong_tien = $_POST['tong_tien'];
    //         $phuong_thuc_thanh_toan_id = $_POST['phuong_thuc_thanh_toan_id'];

    //         $ngay_dat = date('Y-m-d');
    //         $trang_thai_id = 1;

    //         $user = $this->modelTaiKhoan->getTaiKhoanFromEmail($_SESSION['user_client']);
    //         $tai_khoan_id = $user['id'];
    //         $ma_don_hang = 'DH-' . rand(10000, 99999) . date('dmy');

    //         // Thêm thông tin vào đơn hàng
    //         $donHangId = $this->modelDonHang->addDonHang(
    //             $tai_khoan_id,
    //             $ten_nguoi_nhan,
    //             $email_nguoi_nhan,
    //             $sdt_nguoi_nhan,
    //             $dia_chi_nguoi_nhan,
    //             $ghi_chu,
    //             $tong_tien,
    //             $phuong_thuc_thanh_toan_id,
    //             $ngay_dat,
    //             $ma_don_hang,
    //             $trang_thai_id
    //         );

    //         if ($donHangId) {
    //             // Lấy thông tin giỏ hàng hiện tại của người dùng
    //             $gioHang = $this->modelGioHang->getGioHangFromUser($tai_khoan_id);
    //             if ($gioHang) {
    //                 $chiTietGioHang = $this->modelGioHang->getDetailGioHang($gioHang['id']);

    //                 // Thêm chi tiết đơn hàng
    //                 foreach ($chiTietGioHang as $item) {
    //                     $this->modelDonHang->addChiTietDonHang(
    //                         $donHangId,
    //                         $item['san_pham_id'],
    //                         $item['so_luong'],
    //                         $item['price']
    //                     );
    //                 }

    //                 // Xóa giỏ hàng sau khi đặt hàng thành công
    //                 // $this->modelGioHang->clearGioHang($gioHang['id']);

    //                 // Lưu thông báo thành công vào session
    //                 $_SESSION['order_success'] = true;
    //                 $_SESSION['order_code'] = $ma_don_hang;
    //             }
    //         }

    //         // Chuyển hướng đến trang cảm
    //     }
    // }
    public function lichSuMuaHang()
    {
        if (isset($_SESSION['user_client'])) {
            $user = $this->modelTaiKhoan->getTaiKhoanFromEmail($_SESSION['user_client']);
            $tai_khoan_id = $user['id'];
            // Lấy ra danh sách trạng thái đơn hàng
            $arrayTrangThaiDonHang = $this->modelDonHang->getTrangThaiDonHang();
            $trangThaiDonHang = array_column($arrayTrangThaiDonHang,'ten_trang_thai','id');
            // var_dump($trangThaiDonHang);die();
            // Lấy ra danh sách trạng thái thanh toán
            $arrayPhuongThucThanhToan = $this->modelDonHang->getPhuongThucThanhToan();
            $phuongThucThanhToan = array_column($arrayPhuongThucThanhToan,'ten_phuong_thuc','id');

            // Lấy ra danh schs tất cả dơn hàng của tải khoản
            $donHang = $this->modelDonHang->getDonHangFromUser($tai_khoan_id);
            require_once './views/donHang.php';

        }

    }
    public function huyDonHang()
    {
        if (isset($_SESSION['user_client'])) {
            $user = $this->modelTaiKhoan->getTaiKhoanFromEmail($_SESSION['user_client']);
            $tai_khoan_id = $user['id'];
            // Lấy id đơn truyền từ url
            $donHangId = $_GET['id'];
            // Kiểm tra đơn hàng
            $donHang = $this->modelDonHang->getDonHangById($donHangId);

            if($donHang['tai_khoan_id'] != $tai_khoan_id){
                echo 'Bạn không có quyền hủy';
                exit;
            }
            if($donHang['trang_thai_id'] != 1){
                echo 'Đơn hàng của bạn đã xác nhận không thể hủy';
                exit;
            }
            // hủy dơn hàng
            $this->modelDonHang->updateTrangThaiDonHang($donHangId,1);
            header('location:'.BASE_URL.'?act=lich-su-mua-hang');
            exit;

        }else{
            header('location:'.BASE_URL.'?act=login');
            exit;
        }
    }
}
