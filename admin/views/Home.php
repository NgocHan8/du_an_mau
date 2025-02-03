<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.rtl.min.css" integrity="sha384-dpuaG1suU0eT09tx5plTaGMLBsfDLzUCCUXOY2j/LSvXYuG6Bqs43ALlhIqAJVRb" crossorigin="anonymous">
    <link rel="stylesheet" href="<?= BASE_URL ?>/assets/admin/style.css">
</head>

<body>
    
    <div class="row ">
        <div class="col-2 ">
            <nav class="navbar">
                    <a class="navbar-brand" href="#">ADMIN</a>
            </nav>
            <ul class="header">
               <li><a href="/">Dashboard</a></li>
               <li><a href="?act=danh-muc">Quản lý danh mục</a></li>
               <li><a href="?act=san-pham">Quản lý sản phẩm</a></li>
               <li><a href="?act=don-hang">Quản lý đơn hàng</a></li>
               <li><a href="?act=khach-hang">Quản lý khách hàng</a></li>
            </ul>
        </div>
        <!-- <div class="col">

        </div>
    </div> -->
</body>

</html>