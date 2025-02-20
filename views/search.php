<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kết quả tìm kiếm - Blue Peach</title>
    <link rel="stylesheet" href="./assets/client/style.css">
    <link rel="stylesheet" href="./assets/client/search.css">

</head>

<body>
    <?php require_once 'layout/Header.php'; ?>

    <main class="container mt-4">
        <div class="search-results">
            <h2 class="mb-4">Kết quả tìm kiếm cho "<?= htmlspecialchars($keyword) ?>"</h2>
            <?php if (empty($searchResults)): ?>
                <div class="alert alert-info">
                    Không tìm thấy sản phẩm nào phù hợp với từ khóa "<?= htmlspecialchars($keyword) ?>"
                </div>
            <?php else: ?>
                <p>Tìm thấy <?= count($searchResults) ?> sản phẩm</p>

                <div class="product-grid">
                    <?php foreach ($searchResults as $sanPham): ?>
                        <div class="product-item">
                            <a href="<?= BASE_URL ?>?act=detail&id=<?= $sanPham['id'] ?>">
                                <img src="<?= BASE_URL . $sanPham['img'] ?>"
                                    alt="<?= htmlspecialchars($sanPham['ten_san_pham']) ?>"
                                    class="product-image">
                                <h4><?= htmlspecialchars($sanPham['ten_san_pham']) ?></h4>
                                <p class="product-price">
                                    <span class="new-price"><?= number_format($sanPham['price'], 0, ',', '.') ?> đ</span>
                                </p>
                                <button class="product-button">Thêm vào giỏ hàng</button>
                            </a>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
    </main>

    <?php require_once 'layout/Footer.php'; ?>
</body>

</html>