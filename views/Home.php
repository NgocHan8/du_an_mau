<?php require_once 'layout/Header.php' ?>
<?php require_once 'layout/Banner.php' ?>
<style>
    .product-section-title {
        background-color: rgb(29, 75, 99);
        color: white;
        width: 100%;
        padding: 10px 20px;
        display: block;
    }

    .product-button {
        background-color: #31708f;

    }
    .row{
        display: flex;
        flex-wrap: nowrap;
        margin-bottom: 20px;
        gap:20px;
    }
    
</style>
<section class="products">
    <div class="row">
        <div class="col-6">
            <img src="./assets/uploads/banner1.jpg" width="600px"  alt="">
        </div>
        <div class="col-6">
            <img src="./assets/uploads/banner2.jpeg" width="600px" alt="">
        </div>
    </div>
    <h2 class="product-section-title"> Sản phẩm bán chạy</h2>
    <?php
    if (!isset($listSanPham) || !is_array($listSanPham)) {
        $listSanPham = []; // Gán giá trị mặc định là mảng rỗng
    }
    if (!empty($listSanPham)): ?>
        <div class="product-grid">
            <?php foreach ($listSanPham as $sanPham): ?>
                <div class="product-item">
                    <a href="<?= BASE_URL . '?act=chi-tiet-san-pham&id_san_pham=' . $sanPham['id'] ?>">
                        <img src="<?= BASE_URL . $sanPham['img'] ?>" width="300px" height="300px" alt="Product" class="product-image" />
                    </a>
                    <h4><?= htmlspecialchars($sanPham['ten_san_pham']) ?></h4>
                    <p class="product-price">
                        <span class="new-price"><?= number_format($sanPham['price'], 0, ',', '.') ?> đ</span>
                    </p>
                    <button class="product-button">Thêm vào giỏ hàng</button>
                </div>
            <?php endforeach; ?>
        </div>
    <?php else: ?>
        <p>Không có sản phẩm nào để hiển thị.</p>
    <?php endif; ?>
    <br>
    <div class="product-section-title">
        <h3> SẢN PHẨM MỚI VỀ</h3>
    </div>
    <?php
    if (!isset($listSanPhamMoi) || !is_array($listSanPhamMoi)) {
        $listSanPhamMoi = []; // Gán giá trị mặc định là mảng rỗng
    }
    if (!empty($listSanPhamMoi)): ?>
        <div class="product-grid">
            <?php foreach ($listSanPhamMoi as $sanPhamMoi): ?>
                <div class="product-item">
                    <a href="<?= BASE_URL . '?act=chi-tiet-san-pham&id_san_pham=' . $sanPhamMoi['id'] ?>">
                        <img src="<?= BASE_URL . $sanPhamMoi['img'] ?>" width="300px" height="300px" alt="Product" class="product-image" />
                    </a>
                    <h4><?= htmlspecialchars($sanPhamMoi['ten_san_pham']) ?></h4>
                    <p class="product-price">
                        <span class="new-price"><?= number_format($sanPhamMoi['price'], 0, ',', '.') ?> đ</span>
                    </p>
                    <button class="product-button">Thêm vào giỏ hàng</button>
                </div>
            <?php endforeach; ?>
        </div>
    <?php else: ?>
        <p>Không có sản phẩm nào để hiển thị.</p>
    <?php endif; ?>
</section>

<?php require_once 'layout/Footer.php' ?>