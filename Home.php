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
            <input type="text" class="search-box" placeholder="Bạn cần tìm gì?" aria-label="Search">
            <button class="search-button" aria-label="Search">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <circle cx="11" cy="11" r="8"></circle>
                    <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                </svg>
            </button>
        </div>
        </div>
        <nav class="nav-menu">
            <div class="dropdown">
                <a href="#">SẢN PHẨM</a>
                <div class="dropdown-content">
                    <a href="#">Dây chuyền</a>
                    <a href="#">Lắc tay</a>
                    <a href="#">Lắc chân</a>
                    <a href="#">Khuyên tai</a>
                </div>
            </div>
            <a href="#">TIN TỨC</a>
            <a href="#">GIỚI THIỆU</a>
            <a href="#">LIÊN HỆ</a>
        </nav>
        <div class="user-actions">
            <a href="#">MY ACCOUNT</a>
            <a href="#" class="cart-link">CART</a>
        </div>
    </header>


    <div class="banner">
        <img src="./assets/uploads/banner.jpg" width="100%" alt="Hộp quà hoa hồng đỏ">
    </div>

    <section class="products">
        <h2 class="product-section-title">TOP SẢN PHẨM BÁN CHẠY</h2>
        <div class="product-grid">
            <!-- Repeated for multiple products -->
            <div class="product-item">
                <img src="/api/placeholder/200/200" alt="Product" class="product-image" />
                <h3>Lắc Tay Bạc</h3>
                <p class="product-price">
                    <span class="new-price">299,000₫</span>
                    <span class="old-price"><s>399,000₫</s></span>
                </p>
                <button class="product-button">Thêm vào giỏ hàng</button>
            </div>
            <!-- More product items would be repeated here -->
        </div>
    </section>

    <footer class="footer">
    <div class="footer-content">
        <div class="footer-section">
            <h3>THÔNG TIN LIÊN HỆ</h3>
            <div class="contact-info">
                <p>Hotline: 0975 89 69 25</p>
                <p>Email: bluepeach@gmail.com</p>
                <p>Cửa hàng 1: 47A Xuân Thủy, Cầu Giấy, Hà Nội</p>
                <p>Cửa hàng 2: 20 Tây Sơn, Đống Đa, Hà Nội</p>
            </div>
        </div>

        <div class="footer-section">
            <h3>THEO DÕI CHÚNG TÔI</h3>
            <div class="social-icons">
                <img src="facebook-icon.png" alt="Facebook">
                <img src="instagram-icon.png" alt="Instagram">
                <img src="tiktok-icon.png" alt="TikTok">
            </div>
        </div>

        <div class="footer-menu">
            <h3>CHÍNH SÁCH</h3>
            <ul>
                <li><a href="#">Tin tức, khuyến mãi</a></li>
                <li><a href="#">Khách hàng thân thiết</a></li>
                <li><a href="#">Chính sách đổi trả</a></li>
                <li><a href="#">Chính sách vận chuyển</a></li>
                <li><a href="#">Chính sách bảo mật</a></li>
                <li><a href="#">Chính sách thanh toán</a></li>
            </ul>
        </div>
    </div>
</footer>
</body>

</html>