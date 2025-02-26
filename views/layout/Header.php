<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blue Peach - Trang sức</title>
    <link rel="stylesheet" href="./assets/client/style.css">

</head>

<body>
    <header class="header">
        <a href="#" class="logo">
            <img src="./assets/uploads/logo.png" width="100px" alt="Blue Peach Logo" />
        </a>
        <div class="search-container">
            <form method="GET" action="<?= BASE_URL ?>" class="search-container">
                <input type="hidden" name="act" value="search">
                <input type="text" name="query" class="search-box" placeholder="Bạn cần tìm gì?" aria-label="Search" required>
                <button type="submit" class="search-button">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <circle cx="11" cy="11" r="8"></circle>
                        <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                    </svg>
                </button>
            </form>
        </div>

        </div>
        <nav class="nav-menu">
            <a href="<?= BASE_URL ?>"><b>Home</b></a>
            <div class="dropdown">
                
                <a href="<?= BASE_URL .'?act=list-san-pham' ?>"><b>Sản Phẩm</b></a>
                <div class="dropdown-content">
                    <a href="<?= BASE_URL .'?act=day-chuyen' ?>">Dây chuyền</a>
                    <a href="<?= BASE_URL .'?act=lac-tay' ?>">Lắc tay</a>
                    <a href="<?= BASE_URL .'?act=lac-chan' ?>">Lắc chân</a>
                    <a href="<?= BASE_URL .'?act=bong-tai' ?>">Bông tai</a>
                    <a href="<?= BASE_URL .'?act=nhan' ?>">Nhẫn</a>
                </div>
            </div>
            <a href="<?= BASE_URL .'?act=gioi-thieu' ?>"><b>Giới thiệu</b></a>
            <a href="<?= BASE_URL .'?act=lien-he' ?>"><b>Liên hệ</b></a>
        </nav>
        <div class="user-actions">
            <?php if (isset($_SESSION['user_client'])): ?>
                <div class="dropdown">
                <a href="<?= BASE_URL . '?act=my-acount' ?>"><img width="20" height="20" src="https://img.icons8.com/pulsar-line/48/guest-male.png" alt="guest-male" /></a>
                <div class="dropdown-content">
                    <a href="<?= BASE_URL . '?act=my-acount' ?>">Tài khoản của tôi</a>
                    <a href="<?= BASE_URL . '?act=lich-su-mua-hang' ?>">Đơn hàng</a>
                    
                </div>
                </div>
                <a href="<?= BASE_URL . '?act=logout' ?>">Đăng xuất</a>
            <?php else: ?>
                <a href="<?= BASE_URL . '?act=register' ?>">Đăng kí</a>
                <a href="<?= BASE_URL . '?act=login' ?>">Đăng nhập</a>
            <?php endif ?>
            <a href="<?= BASE_URL.'?act=gio-hang' ?>" class="cart-link"><img width="24" height="24" src="https://img.icons8.com/material-rounded/24/shopping-cart.png" alt="shopping-cart" /></a>
        </div>

    </header>