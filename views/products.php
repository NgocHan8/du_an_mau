<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi Tiết Sản Phẩm</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/client/style.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700&display=swap" rel="stylesheet">
</head>
<?php require_once 'layout/Header.php' ?>

<!-- Breadcrumb -->
<div class="bg-white py-2 border-bottom">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 small">
                    <li class="breadcrumb-item"><a href="<?= BASE_URL ?>" class="text-decoration-none text-muted">Trang Chủ</a></li>
                    <li class="breadcrumb-item"><a href="<?= BASE_URL . '?act=list-san-pham' ?>" class="text-decoration-none text-muted">Sản Phẩm</a></li>
                </ol>
            </nav>
        </div>
    </div>
<section class="products">
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

</section>

<?php require_once 'layout/Footer.php' ?>