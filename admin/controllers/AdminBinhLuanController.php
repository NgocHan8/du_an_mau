<?php
class AdminBinhLuanController
{
    public $modelBinhLuan;
    public function __construct()
    {
        $this->modelBinhLuan = new BinhLuan();
    }
    public function listBinhLuan()
    {
        $listBinhLuan = $this->modelBinhLuan->getAllBinhLuan();
        
        require './views/binhLuan.php';
    }
    public function updateTrangThaiBinhLuan()
    {
        $id_binh_luan = $_POST['id_binh_luan'];
        $name_view = $_POST['name_view'];

        $binhLuan = $this->modelBinhLuan->getDetailBinhLuan($id_binh_luan);
        if($binhLuan)
        {
            $trang_thai_update = '';
            if($binhLuan['trang_thai']==1){
                $trang_thai_update = 2;
            }else{
                $trang_thai_update = 1;
            }
            $status = $this->modelBinhLuan->updateTrangThaiBinhLuan($id_binh_luan,$trang_thai_update);
            if($status)
            {
                if($name_view=='detail_khach'){
                    header('location:'.BASE_URL_ADMIN.'?act=chi-tiet-tai-khoan-khach-hang&id_khach_hang=' .$binhLuan['tai_khoan_id']);
                }else{
                    header('location:'.BASE_URL_ADMIN.'?act=xem-san-pham&id_san_pham=' .$binhLuan['tai_khoan_id']);
                }
            }
        }
    }
}
