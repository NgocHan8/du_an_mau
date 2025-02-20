<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.rtl.min.css" integrity="sha384-dpuaG1suU0eT09tx5plTaGMLBsfDLzUCCUXOY2j/LSvXYuG6Bqs43ALlhIqAJVRb" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/admin/style.css">
</head>

<body>

    <div class="row ">
        <div class="col-2">
            <nav class="navbar">
                <a class="navbar-brand" href="#">ADMIN</a>
            </nav>
            <ul class="header">
                <li><a href="<?= BASE_URL_ADMIN?>">Dashboard</a></li>
                <li><a href="?act=danh-muc">Quản lý danh mục</a></li>
                <li><a href="?act=san-pham">Quản lý sản phẩm</a></li>
                <li><a href="?act=binh-luan">Quản lý bình luận</a></li>
                <li><a href="?act=don-hang">Quản lý đơn hàng</a></li>
                <li>
                    <a href="#submenu-khach-hang" data-bs-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Quản lý tài khoản</a>
                    <ul class="collapse list-unstyle" id="submenu-khach-hang">
                        <li><a class=" text-light" href="?act=list-tai-khoan-quan-tri">Tài khoản quản trị</a></li>
                        <li><a class=" text-light" href="?act=list-tai-khoan-khach-hang">Tài khoản khách hàng</a></li>
                        <li><a class=" text-light" href="?act=list-tai-khoan-ca-nhan">Tài khoản cá nhân</a></li>
                    </ul>
                </li>

                <li>
                    <a class="btn btn-light" href="<?= BASE_URL_ADMIN . '?act=logout-admin' ?>" onclick="return confirm('Đăng xuất tài khoản')">
                        Đăng xuất
                    </a>
                </li>
            </ul>


        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>