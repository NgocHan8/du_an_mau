<?php require_once 'layout/Header.php' ?>
<section class="products">
    <h2 class="product-section-title">TOP SẢN PHẨM BÁN CHẠY</h2>
    <?php
    if (!isset($listSanPham) || !is_array($listSanPham)) {
        $listSanPham = []; // Gán giá trị mặc định là mảng rỗng
    }
    if (!empty($listSanPham)): ?>
        <div class="product-grid">
            <?php foreach ($listSanPham as $sanPham): ?>
                <div class="product-item">
                    <a href="<?= BASE_URL . '?act=chi-tiet-san-pham&id_san_pham=' . $sanPham['id'] ?>">
                        <img src="<?= BASE_URL . $sanPham['img'] ?>" width="400px" height="400px" alt="Product" class="product-image" />
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

</section>

<?php require_once 'layout/Footer.php' ?>