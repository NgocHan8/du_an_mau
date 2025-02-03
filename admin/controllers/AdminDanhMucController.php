<?php
class AdminDanhMucController
{
    public $modelDanhMuc;
    public function __construct()
    {
        $this->modelDanhMuc = new DanhMuc();
    }
    public function baocao() {}
    public function list()
    {
        $listDanhMuc = $this->modelDanhMuc->getAllDanhMuc();
        require_once './views/danhmuc/listDanhMuc.php';
    }
    public function formAddDanhMuc()
    {
        require_once  './views/danhmuc/addDanhMuc.php';
    }
    public function postAddDanhMuc()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $ten_danh_muc = $_POST['ten_danh_muc'];
            $mo_ta = $_POST['mo_ta'];

            $errors = [];
            if (empty($ten_danh_muc)) {
                $errors['ten_danh_muc'] = 'Tên danh mục không được để trống';
            }
    
    
            if (empty($errors)) {
                try {
                    $this->modelDanhMuc->insertDanhMuc($ten_danh_muc,$mo_ta);
                    header('location: ' . BASE_URL_ADMIN . '?act=danh-muc');
                    exit();
                } catch (Exception $e) {
                    $errors['insert'] = 'Failed to insert into the database: ' . $e->getMessage();
                }
            }
        }
        require_once './views/danhmuc/addDanhMuc.php';
    }
    public function formEditDanhMuc()
    {
        $id = $_GET['id_danh_muc'];
        $danhMuc = $this->modelDanhMuc->getDetailDanhMuc($id);
        if($danhMuc)
        {
            require_once './views/danhmuc/editDanhMuc.php';
        }
        else{
            header('location: '.BASE_URL_ADMIN.'?act=danh-muc');
            exit();
        }
    }
    public function postEditDanhMuc()
    {
        if($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            $id = $_POST['id'];
            $ten_danh_muc = $_POST['ten_danh_muc'];
            $mo_ta = $_POST['mo_ta'];
            $errors = [];
            if(empty($ten_danh_muc))
            {
                $errors['ten_danh_muc'] = 'Tên danh mục không được để trống';
            }

            if(empty($errors))
            {
                $this->modelDanhMuc->updateDanhMuc($id,$ten_danh_muc,$mo_ta);
                header('location:'.BASE_URL_ADMIN.'?act=danh-muc');
                exit();
            }
            else
            {
                require_once './views/danhmuc/editDanhMuc.php';
            }
        }
    }
    public function destroyDanhMuc()
    {
        $id = $_GET['id_danh_muc'];
        $danhMuc = $this->modelDanhMuc->getDetailDanhMuc($id);
        if($danhMuc)
        {
            $this->modelDanhMuc->deleteDanhMuc($id);
        }
        $_SESSION['message'] = 'Xóa danh mục sản phẩm thành công';
        header('location:' .BASE_URL_ADMIN.'?act=danh-muc');
        exit();
    }
}
