<?php
// require_once './configs/env.php';
// require_once './configs/function.php';
// require_once './configs/helper.php';

// // Điều hướng
// $mode = $_GET['mode'] ?? 'client';

// if($mode == 'admin')
// {
//     // require đường dẫn của admin
//     require_once './routers/admin.php';
// }
// else
// {
//     // require đường dẫn của client
//     require_once './routers/client.php';
// }
// require_once PATH_CONTROLLER_ADMIN . 'AdminDanhMucController.php';
// require_once PATH_MODEL .'DanhMuc.php';

// $act = $_GET['act'] ?? '/';

// match ($act)
// {
//     '/' => (new AdminDanhMucController)->list(),
//     'list-danh-muc' => (new AdminDanhMucController)->list(),
//     'form-them-danh-muc' => (new AdminDanhMucController)->formAdd(),
//     'them-danh-muc'=>(new AdminDanhMucController)->postAddDanhMuc(),
// };