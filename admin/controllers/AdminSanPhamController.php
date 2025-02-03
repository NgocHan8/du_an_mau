<?php
class AdminSanPhamController 
{
    public $modelSanPham;
    public $modelDanhMuc;
    public function __construct()
    {
        $this->modelSanPham = new SanPham();
        $this->modelDanhMuc = new DanhMuc();
    }
    public function listSanPham()
    {
        $listSanPham = $this->modelSanPham->getAllSanPham();
        if (empty($listSanPham)) {
            $_SESSION['message'] = 'Không có sản phẩm nào trong danh sách.';
        }
        require_once './views/sanpham/listSanPham.php';
    }
    public function formAddSanPham()
    {
        $listDanhMuc = $this->modelDanhMuc->getAllDanhMuc();
        require_once './views/sanpham/addSanPham.php';
        deleteSessionError();
    }
    public function postAddSanPham()
    {
        if($_SERVER['REQUEST_METHOD']=='POST')
        {
            $ten_san_pham = $_POST['ten_san_pham'] ?? '';
            $price = $_POST['price'] ?? '';
            $img = $_FILES['img'] ?? null;
            $quantity = $_POST['quantity']??'';
            $danh_muc_id = $_POST['danh_muc_id']??'';
            $description = $_POST['description']??'';

            $file_thumb = uploadFile($img,'./assets/uploads/');
            $errors = [];
            if(empty($ten_san_pham))
            {
                $errors['ten_san_pham'] = 'Tên sản phẩm không được dderr trống';
            }
            if(empty($price))
            {
                $errors['price'] = 'Giá sản phẩm không được dderr trống';
            }
            if(empty($img)!==0)
            {
                $errors['img'] = 'Vui lòng chọn ảnh';
            }
            if(empty($quantity))
            {
                $errors['quantity'] = 'Số lượng sản phẩm không được dderr trống';
            }
            if(empty($danh_muc_id))
            {
                $errors['danh_muc_id'] = 'Vui lòng chọn danh mục sản phẩm';
            }
            if(empty($description))
            {
                $errors['description'] = 'Mô tả sản phẩm không được dderr trống';
            }
            $_SESSION['errors'] = $errors;
            if(empty($errors))
            {
                $this->modelSanPham->insertSanPham($ten_san_pham,$price,$file_thumb,$quantity,$danh_muc_id,$description);
                header('location:'.BASE_URL_ADMIN.'?act=san-pham');
                exit();
            }else{
                $_SESSION['flash'] = true;
                header('location:'.BASE_URL_ADMIN.'?act=form-them-san-pham');
                exit();
            }
            
        }
    }
}