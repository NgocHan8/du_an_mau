<?php
class AdminTaiKhoanController
{
    public $modelTaiKhoan;
    public $modelDonHang;
    public $modelSanPham;
    public function __construct()
    {
        $this->modelTaiKhoan = new TaiKhoan();
        $this->modelDonHang = new DonHang();
        $this->modelSanPham = new SanPham();
    }
    public function listQuanTri()
    {
        $listQuanTri = $this->modelTaiKhoan->getAllTaiKhoan(1);
        require_once './views/taikhoan/quantri/listQuanTri.php';
    }
    public function formAddQuanTri()
    {
        require_once './views/taikhoan/quantri/addQuanTri.php';
        deleteSessionError();
    }
    public function postAddQuanTri()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $ho_ten = $_POST['ho_ten'];
            $email = $_POST['email'];
            $sdt = $_POST['sdt'];
            $mat_khau = $_POST['mat_khau'];

            $errors = [];
            if (empty($ho_ten)) {
                $errors['ho_ten'] = 'Họ tên không để trống';
            }
            if (empty($email)) {
                $errors['email'] = 'Email không để trống';
            }
            $_SESSION['error'] = $errors;
            if (empty($errors)) {
                $chuc_vu_id = 1;
                $this->modelTaiKhoan->insertTaiKhoan($ho_ten, $email, $sdt, $mat_khau, $chuc_vu_id);
                header('location:' . BASE_URL_ADMIN . '?act=list-tai-khoan-quan-tri');
                exit();
            } else {
                $_SESSION['flash'] = true;
                header('location:' . BASE_URL_ADMIN . '?act=form-them-tai-khoan-quan-tri');
                exit();
            }
        }
    }
    public function formEditQuanTri()
    {
        $id_quan_tri = $_GET['id_quan_tri'];
        $quanTri = $this->modelTaiKhoan->getDetailTaiKhoan($id_quan_tri);
        require_once './views/taikhoan/quantri/editQuanTri.php';
        deleteSessionError();
    }
    public function postEditQuanTri()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $quan_tri_id = $_POST['quan_tri_id'] ?? '';
            $ho_ten = $_POST['ho_ten'] ?? '';
            $email = $_POST['email'] ?? '';
            $sdt = $_POST['sdt'] ?? '';
            $trang_thai = $_POST['trang_thai'] ?? '';

            $errors = [];
            if (empty($ho_ten)) {
                $errors['ho_ten'] = 'Họ tên không để trống';
            }
            if (empty($email)) {
                $errors['email'] = 'Email không để trống';
            }
            if (empty($sdt)) {
                $errors['sdt'] = 'Số điện thoại không để trống';
            }
            if (empty($trang_thai)) {
                $errors['trang_thai'] = 'CHọn trạng thái';
            }
            $_SESSION['error'] = $errors;
            if (empty($errors)) {
                $suss = $this->modelTaiKhoan->updateTaiKhoan($quan_tri_id, $ho_ten, $email, $sdt, $trang_thai);

                header('location:' . BASE_URL_ADMIN . '?act=list-tai-khoan-quan-tri');
                exit();
            } else {
                $_SESSION['flash'] = true;
                header('location:' . BASE_URL_ADMIN . '?act=form-sua-tai-khoan-quan-tri&id_quan_tri=' . $quan_tri_id);
                exit();
            }
        }
    }
    public function resetPass()
    {
        $tai_khoan_id = $_GET['id_quan_tri'];
        $tai_khoan = $this->modelTaiKhoan->getDetailTaiKhoan($tai_khoan_id);
        // đặt pass mặc định
        $pass = password_hash('12345', PASSWORD_BCRYPT);
        $status = $this->modelTaiKhoan->resetPassword($tai_khoan_id, $pass);
        if ($status && $tai_khoan['chuc_vu_id'] == 1) {
            header('location:' . BASE_URL_ADMIN . '?act=list-tai-khoan-quan-tri');
            exit();
        } elseif ($status && $tai_khoan['chuc_vu_id'] == 2) {
            header('location:' . BASE_URL_ADMIN . '?act=list-tai-khoan-khach-hang');
            exit();
        } else {
            var_dump('Chưa reset được mật khẩu');
            die();
        }
    }
    public function listKhachHang()
    {
        $listKhachHang = $this->modelTaiKhoan->getAllTaiKhoan(2);
        require_once './views/taikhoan/khachhang/listKhachHang.php';
    }
    public function formEditKhachHang()
    {
        $id_khach_hang = $_GET['id_khach_hang'];
        $khachHang = $this->modelTaiKhoan->getDetailTaiKhoan($id_khach_hang);
        require_once './views/taikhoan/khachhang/editKhachHang.php';
        deleteSessionError();
    }
    public function postEditKhachHang()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $khach_hang_id = $_POST['khach_hang_id'] ?? '';
            $ho_ten = $_POST['ho_ten'] ?? '';
            $ngay_sinh = $_POST['ngay_sinh'] ?? '';
            $email = $_POST['email'] ?? '';
            $sdt = $_POST['sdt'] ?? '';
            $gioi_tinh = $_POST['gioi_tinh'] ?? '';
            $dia_chi = $_POST['dia_chi'] ?? '';
            $trang_thai = $_POST['trang_thai'] ?? '';
            $errors = [];
            if (empty($ho_ten)) {
                $errors['ho_ten'] = 'Tên không được để trống';
            }
            if (empty($ngay_sinh)) {
                $errors['ngay_sinh'] = 'Ngày sinh không được để trống';
            }
            if (empty($email)) {
                $errors['email'] = 'Email không được để trống';
            }

            if (empty($sdt)) {
                $errors['sdt'] = 'Số điện thoại không được để trống';
            }

            if (empty($dia_chi)) {
                $errors['dia_chi'] = 'Vui lòng điền địa chỉ';
            }
            $_SESSION['error'] = $errors;
            if (empty($errors)) {
                $this->modelTaiKhoan->updateKhachHang($khach_hang_id, $ho_ten, $ngay_sinh, $email, $sdt, $gioi_tinh, $dia_chi,$trang_thai);
                header('location:' . BASE_URL_ADMIN . '?act=list-tai-khoan-khach-hang');
                exit();
            } else {
                $_SESSION['flash'] = true;
                header('location:' . BASE_URL_ADMIN . '?act=form-sua-tai-khoan-khach-hang&id_khach_hang=' . $khach_hang_id);
                exit();
            }
        }
    }
    public function detailKhachHang()
    {
        $id_khach_hang = $_GET['id_khach_hang'];
        $khachHang = $this->modelTaiKhoan->getDetailTaiKhoan($id_khach_hang);
        $listDonHang = $this->modelDonHang->getDonHangFromKhachHang($id_khach_hang);
        require_once './views/taikhoan/khachhang/detailKhachHang.php';
        exit();
    }
    public function formLogin()
    {
        require_once './views/auth/login.php';
        deleteSessionError();
    }
    public function Login()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Lấy email và password từ form
            $email = $_POST['email'];
            $password = $_POST['mat_khau'];
            // var_dump($email,$password);
            // die;
            // // Xử lý kiểm tra thông tin đăng nhập
            $user = $this->modelTaiKhoan->checkLogin($email, $password);
            // var_dump($user);die;
            if ($user == 1) { // nếu thành công
                // lưu thông tin
                $_SESSION['user_admin'] = $user;

                header('Location: ' . BASE_URL_ADMIN);
                exit();
            } else {
                // Nếu đăng nhập thất bại, lưu lỗi vào session
                $_SESSION['error'] = $user;

                $_SESSION['flash'] = true;
                header('Location: ' . BASE_URL_ADMIN . '?act=login-admin');
                exit();
            }
        }
    }
    public function logout()
    {
        if (isset($_SESSION['user_admin'])) {
            unset($_SESSION['user_admin']);
            header("location: " . BASE_URL_ADMIN . '?act=login-admin');
            exit();
        }
    }
    public function formEditCaNhanQuanTri()
    {
        $email = $_SESSION['user_admin'];
        $thongTin = $this->modelTaiKhoan->getTaiKhoanFromEmail($email);
        require_once './views/taikhoan/canhan/edit.php';
        deleteSessionError();
    }
}
