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
    public function showSanPham()
    {
        $id = $_GET['id_san_pham'];
        $sanPham = $this->modelSanPham->getDetailSanPham($id);
        // $listAnh = $this->modelSanPham->getDetailAnhSanPham($id);
        if ($sanPham) {
            require_once './views/sanpham/detail.php';
        } else {
            header('location:' . BASE_URL_ADMIN . '?act=san-pham');
            exit();
        }
    }
    public function formAddSanPham()
    {
        $listDanhMuc = $this->modelDanhMuc->getAllDanhMuc();

        require_once './views/sanpham/addSanPham.php';
        deleteSessionError();
    }

    public function postAddSanPham()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $ten_san_pham = $_POST['ten_san_pham'] ?? '';
            $price = $_POST['price'] ?? '';
            $quantity = $_POST['quantity'] ?? '';
            $danh_muc_id = $_POST['danh_muc_id'] ?? '';
            $mo_ta = $_POST['mo_ta'] ?? '';
            $img = $_FILES['img'] ?? null;

            //mang hinh anh

            $img_array = $_FILES['img_array'];


            $errors = [];
            if (empty($ten_san_pham)) {
                $errors['ten_san_pham'] = 'Tên sản phẩm không để trống';
            }
            if (empty($price)) {
                $errors['price'] = 'Giá sản phẩm không để trống';
            }
            if (empty($quantity)) {
                $errors['quantity'] = 'Số lượng sản phẩm không để trống';
            }

            if (empty($danh_muc_id)) {
                $errors['danh_muc_id'] = 'Chọn danh mục sản phẩm';
            }

            if ($img['error'] !== 0) {
                $errors['img'] = ' Phải chọn  ảnh sản phẩm';
            }
            $_SESSION['error'] = $errors;


            if (empty($errors)) {
                $file_thumb = uploadFile($img, './assets/uploads/');

                $san_pham_id = $this->modelSanPham->insertSanPham($ten_san_pham, $price, $file_thumb, $quantity, $danh_muc_id, $mo_ta);
                // xu lis them alum anh img_array
                if (!empty($img_array['name'])) {
                    foreach ($img_array['name'] as $key => $value) {
                        $file = [
                            'name' => $img_array['name'][$key],
                            'type' => $img_array['type'][$key],
                            'tmp_name' => $img_array['tmp_name'][$key],
                            'error' => $img_array['error'][$key],
                            'size' => $img_array['size'][$key]
                        ];
                        $link_hinh_anh = uploadFile($file, '../assets/upload/');
                        $this->modelSanPham->insertAlbumAnhSanPham($san_pham_id, $link_hinh_anh);
                    }
                }
                header('location: ' . BASE_URL_ADMIN . '?act=san-pham');
                exit;
            } else {
                // dat chi thi cua sesion sau khi hien thi form 
                $_SESSION['flash'] = true;
                header('location: ' . BASE_URL_ADMIN . '?act=form-them-san-pham');
                exit();
            }
        }
    }
    public function formEditSanPham()
    {
        $id = $_GET['id_san_pham'];
        $sanPham = $this->modelSanPham->getDetailSanPham($id);
        $listAnh = $this->modelSanPham->getListAnhSanPham($id);
        $listDanhMuc = $this->modelDanhMuc->getAllDanhMuc();
        if ($sanPham) {
            require_once './views/sanpham/editSanPham.php';
            deleteSessionError();
        } else {
            header('location:' . BASE_URL_ADMIN . '?act=san-pham');
            exit();
        }
    }
    public function postEditSanPham()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // lấy ra dl
            $san_pham_id = $_POST['san_pham_id'];
            // truy vấn
            $sanPhamOld = $this->modelSanPham->getDetailSanPham($san_pham_id);
            $oldFile = $sanPhamOld['img'];
            $ten_san_pham = $_POST['ten_san_pham'];
            $price = $_POST['price'] ?? '';
            $img = $_FILES['img'] ?? null;
            $quantity = $_POST['quantity'] ?? '';
            $danh_muc_id = $_POST['danh_muc_id'] ?? '';
            $mo_ta = $_POST['mo_ta'] ?? '';

            // $img_array = $_FILES['img_array'];
            $errors = [];

            if (empty($ten_san_pham)) {
                $errors['ten_san_pham'] = 'Tên sản phẩm không được dderr trống';
            }
            if (empty($price)) {
                $errors['price'] = 'Giá sản phẩm không được dderr trống';
            }
            // if ($img['error'] !== 0) {
            //     $errors['img'] = 'Vui lòng chọn ảnh sản phẩm';
            // }

            if (empty($quantity)) {
                $errors['quantity'] = 'Số lượng sản phẩm không được dderr trống';
            }
            if (empty($danh_muc_id)) {
                $errors['danh_muc_id'] = 'Vui lòng chọn danh mục sản phẩm';
            }
            $_SESSION['error'] = $errors;

            // logic sửa ảnh
            if (isset($img) && $img['error'] == UPLOAD_ERR_OK) {
                $newFile = uploadFile($img, './assets/uploads/');
                // var_dump($newFile);
                // die();
                if (!empty($oldFile)) {
                    deleteFile($oldFile);
                }
            } else {
                $newFile = $oldFile;
            }
            if (empty($errors)) {
                $san_pham_id = $this->modelSanPham->updateSanPham($san_pham_id, $ten_san_pham, $price, $newFile, $quantity, $danh_muc_id, $mo_ta);

                header('location:' . BASE_URL_ADMIN . '?act=san-pham');
                exit();
            } else {
                $_SESSION['flash'] = true;
                header('location:' . BASE_URL_ADMIN . '?act=form-sua-san-pham');
                exit();
            }
        }
    }
    // public function postEditAnhSanPham()
    // {
    //     if($_SERVER['REQUEST_METHOD'] == 'POST')
    //     {
    //         $san_pham_id = $_POST['san_pham_id'];
    //         // lấy ds ảnh hiện ttaij
    //         $listAnhSanPhamCurrent = $this->modelSanPham->getListAnhSanpham($san_pham_id);
    //         // xử lý ảnh được gửi từ form
    //         $img_array = $_FILES['img_array'];
    //         $img_delete = isset($_POST['img_delete']) ? explode(',',$_POST['img_delete']) : [];
    //         $current_img_ids = $_POST['current_img_ids'];

    //         // khai báo mảng để lưu ảnh thêm ảnh mới thay thế ảnh cũ
    //         $uploads_file = [];
    //         // upload ảnh mới
    //         foreach($img_array['name'] as $key=>$value)
    //         {
    //             if($img_array['error'][$key] == UPLOAD_ERR_OK)
    //             {
    //                 $newFile = uploadFileAlbum($img_array,'../assets/uploads/',$key);
    //                 if($newFile)
    //                 {
    //                     $uploads_file[] = [
    //                         'id'=>$current_img_ids[$key] ?? null,
    //                         'fie'=>$newFile
    //                     ];
    //                 }
    //             }
    //         }
    //         // lưu ảnh mới vào db và xóa ảnh cũ
    //         foreach($uploads_file as $file_info)
    //         {
    //             if($file_info['id'])
    //             {
    //                 $oldFile = $this->modelSanPham->getDetailAnhSanPham($file_info['id'])['link_anh'];
    //                 // cập nhật ảnh cũ
    //                 $this->modelSanPham->updateAnhSanPham($file_info['id'],$file_info['file']);
    //                 // xáo ảnh cũ
    //                 deleteFile($oldFile);
    //             }else{
    //                 $this->modelSanPham->insertAlbumAnhSanPham($san_pham_id,$file_info['file']);
    //             }
    //         }
    //         // xử lý xóa ảnh
    //         foreach($listAnhSanPhamCurrent as $anhSP)
    //         {
    //             $anh_id = $anhSP['id'];
    //             if(in_array($anh_id,$img_delete))
    //             {
    //                 // xáo ảnh
    //                 $this->modelSanPham->destroyAnhSanPham($anh_id);
    //                 // xóa file
    //                 deleteFile($anhSP['link_anh']);
    //             }
    //         }
    //         header('location:' .BASE_URL_ADMIN .'?act=form-sua-san-pham&id_san_pham='.$san_pham_id);
    //         exit();

    //     }
    // }
    public function deleteSanPham()
    {
        $id = $_GET['id_san_pham'];
        $sanPham = $this->modelSanPham->getDetailSanPham($id);
        // $listAnh = $this->modelSanPham->getDetailAnhSanPham($id);
        if ($sanPham) {
            deleteFile($sanPham['anh']);
            $this->modelSanPham->destroySanPham($id);
        }
        // if($listAnh)
        // {
        //     foreach($listAnh as $key => $anhSP)
        //     {
        //         deleteFile($anhSP['link_anh']);
        //         $this->modelSanPham->destroyAnhSanPham($anhSP['id']);
        //     }
        // }
        header('location:' . BASE_URL_ADMIN . '?act=san-pham');
        exit();
    }
}
