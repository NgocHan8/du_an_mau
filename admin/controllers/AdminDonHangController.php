<?php
class AdminDonHangController
{
    public $modelDonHang;
    public function __construct()
    {
        $this->modelDonHang = new DonHang();
    }
    public function listDonHang()
    {
        $listDonHang = $this->modelDonHang->getAllDonHang();
        require_once './views/donhang/listDonHang.php';
    }
    public function getDetailDonHang()
    {
        $don_hang_id = $_GET['id_don_hang'];
        $donHang = $this->modelDonHang->getDetailDonHang($don_hang_id);
        // var_dump($donHang);
        // die();
        $sanPhamDonHang = $this->modelDonHang->getListSP($don_hang_id);
        $listTrangThai = $this->modelDonHang->getAllTrangThaiDonHang();
        require_once './views/donhang/detailDonHang.php';
    }
    public function formEditDonHang()
    {
        $id = $_GET['id_don_hang'];
        $donHang = $this->modelDonHang->getDetailDonHang($id);
        $listTrangThaiDonHang = $this->modelDonHang->getAllTrangThaiDonHang();
        if ($donHang) {
            require_once './views/donhang/editDonHang.php';
            deleteSessionError();
        } else {
            header('location: ' . BASE_URL_ADMIN . '?act=don-hang');
            exit();
        }
    }
    public function postEditDonHang()
    {
        if($_SERVER['REQUEST_METHOD']== 'POST')
        {
            $don_hang_id = $_POST['don_hang_id']?? '';

            $ten_nguoi_nhan = $_POST['ten_nguoi_nhan']?? '';
            $email_nguoi_nhan = $_POST['email_nguoi_nhan']?? '';
            $sdt_nguoi_nhan = $_POST['sdt_nguoi_nhan']?? '';
            $dia_chi_nguoi_nhan = $_POST['dia_chi_nguoi_nhan']?? '';
            $ghi_chu = $_POST['ghi_chu']?? '';
            $trang_thai_id = $_POST['trang_thai_id']?? '';
            
            //tạo 1 mảng trống để chứa dữ liệu
            $errors = [];
            if(empty($ten_nguoi_nhan)){
                $errors['ten_nguoi_nhan'] = 'tên người nhân không được để trống';
            }
            if(empty($email_nguoi_nhan)){
                $errors['email_nguoi_nhan'] = 'email không được để trống';
            }
            if(empty($sdt_nguoi_nhan)){
                $errors['sdt_nguoi_nhan'] = 'số điện thoại không được để trống';
            }
            if(empty($dia_chi_nguoi_nhan)){
                $errors['dia_chi_nguoi_nhan'] = 'địa chỉ không được để trống';
            }
   
            if(empty($trang_thai_id)){
                $errors['trang_thai_id'] = 'trạng thía đơn hàng phải chọn';
            }            
            $_SESSION['error'] =$errors; 
            if(empty($errors)){
                $this->modelDonHang->updateDonHang($don_hang_id,$ten_nguoi_nhan,$email_nguoi_nhan,$sdt_nguoi_nhan,$dia_chi_nguoi_nhan,$ghi_chu,$trang_thai_id);
                header('location:'.BASE_URL_ADMIN.'?act=don-hang');
                exit();
            }else{
                $_SESSION['flash'] = true;
                header('location:'.BASE_URL_ADMIN.'?act=form-sua-don-hang&id_don_hang='.$don_hang_id);
                exit();
            }
        }
    }
}
