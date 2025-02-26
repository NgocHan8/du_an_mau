<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi Tiết Sản Phẩm</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./assets/client/style.css">
    <style>
        body {
            font-family: 'Playfair Display', serif;
            background-color: #fafafa;
        }

        .navbar-brand {
            font-weight: 700;
            letter-spacing: 1px;
        }

        .hero-section {
            background-color: #f8f4f1;
        }

        .product-rating .fas,
        .product-rating .far {
            color: #d4af37;
        }

        .color-option,
        .material-option {
            cursor: pointer;
            transition: all 0.3s;
        }

        .color-option:hover,
        .material-option:hover {
            transform: scale(1.1);
        }

        .active-option {
            border: 2px solid #d4af37 !important;
        }

        .product-image-thumbs img {
            cursor: pointer;
            transition: all 0.3s;
        }

        .product-image-thumbs img:hover {
            transform: scale(1.05);
        }

        .nav-pills .nav-link.active {
            background-color: #31708f;
        }

        .nav-pills .nav-link {
            color: #333;
        }

        .nav-pills .nav-link.active {
            color: white;
        }

        .product-feature {
            transition: all 0.3s;
        }

        .product-feature:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.05);
        }

        .btn-wishlist,
        .btn-compare {
            transition: all 0.3s;
        }

        .btn-wishlist:hover,
        .btn-compare:hover {
            transform: scale(1.05);
        }

        .related-product {
            transition: all 0.3s;
        }

        .related-product:hover {
            transform: translateY(-5px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
        }

        .btn-gold {
            background-color: #31708f;
            border-color: #31708f;
            color: white;
        }

        .btn-gold:hover {
            background-color: blue;
            border-color: blue;
            color: white;
        }

        .btn-outline-gold {
            border-color: #31708f;
            color: #31708f;
        }

        .btn-outline-gold:hover {
            background-color: #31708f;
            color: white;
        }

        .text-gold {
            color: red;
        }

        .bg-gold {
            background-color: #31708f;
        }

        .card {
            border-radius: 8px;
        }

        .rounded-custom {
            border-radius: 8px;
        }

        .cart-item-actions {
            display: flex;
            align-items: center;
            margin-left: auto;
        }

        .quantity-control {
            display: flex;
            align-items: center;
            margin-right: 15px;
        }

        .quantity-control button {
            border: none;
            background-color: #31708f;
            color: white;
            width: 30px;
            height: 30px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 5px;
            cursor: pointer;
        }

        .quantity-control input {
            width: 40px;
            text-align: center;
            border: 1px solid #ddd;
            font-size: 16px;
            margin: 0 5px;
            padding: 0 5px;
            border-radius: 3px;
        }
    </style>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700&display=swap" rel="stylesheet">
</head>

<body>
    <?php require_once 'layout/Header.php'; ?>

    <!-- Breadcrumb -->
    <div class="bg-white py-2 border-bottom">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 small">
                    <li class="breadcrumb-item"><a href="<?= BASE_URL ?>" class="text-decoration-none text-muted">Trang Chủ</a></li>
                    <li class="breadcrumb-item"><a href="<?= BASE_URL . '?act=list-danh-muc' ?>" class="text-decoration-none text-muted">Sản Phẩm</a></li>
                    <li class="breadcrumb-item"><a href="<?= BASE_URL . '?act=' . $danhMuc['ten_danh_muc'] ?>" class="text-decoration-none text-muted"><?= $danhMuc['ten_danh_muc'] ?></a></li>
                </ol>
            </nav>
        </div>
    </div>

    <!-- Product Detail -->
    <section class="container py-5">
        <div class="row g-4">
            <!-- Product Images -->
            <div class="col-lg-5">
                <div class="card border-0 shadow-sm">
                    <div class="card-body p-2 p-md-3">
                        <div id="productCarousel" class="carousel slide" data-bs-ride="false">
                            <div class="carousel-inner rounded-custom">
                                <img src="<?= $sanPham['img'] ?>" class="d-block w-100" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Product Info -->
            <div class="col-lg-7">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body d-flex flex-column p-4">
                        <h1 class="h2 mb-2"><?= $sanPham['ten_san_pham'] ?></h1>


                        <div class="mb-4">
                            <h3 class="h2 text-gold mb-0"><?= number_format($sanPham['price'], 0, ',', '.') ?> đ</h3>
                        </div>

                        <p class="mb-4"><?= $sanPham['ten_san_pham'] ?></p>

                        <!-- Quantity -->
                        <div class="mb-4">
                            <div class="d-flex align-items-center">
                                <span class="ms-3 text-muted">Còn <?= $sanPham['quantity'] ?> sản phẩm</span>
                            </div>
                        </div>

                        <!-- Action buttons -->
                        <div class="d-flex flex-wrap mb-4">
                            <form action="<?= BASE_URL . '?act=them-gio-hang' ?>" method="post">
                                <div class="row">
                                    <div class="col">
                                        <h5>Số lượng:</h5>
                                    </div>
                                    <div class="col mb-2">
                                        <div class="quantity">
                                            <input type="hidden" name="san_pham_id" value="<?= $sanPham['id']; ?>">
                                            <div class="cart-item-actions">
                                                <div class="quantity-control">
                                                    <button type="button" onclick="decreaseQuantity(this)" class="decrease-btn"><i class="fas fa-minus"></i></button>
                                                    <input type="text" value="1" name="so_luong" min="1" readonly class="quantity-input">
                                                    <button type="button" onclick="increaseQuantity(this)" class="increase-btn"><i class="fas fa-plus"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <button class="btn btn-gold btn-lg flex-grow-1 me-2 mb-2"><i class="fas fa-shopping-bag me-2"></i>Thêm vào giỏ hàng</button>
                            </form>
                        </div>

                        <div class="d-flex justify-content-between mb-4">
                            <button class="btn btn-outline-secondary btn-wishlist"><i class="far fa-heart me-1"></i> Yêu thích</button>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <script>
    // Hàm tăng số lượng
    function increaseQuantity(button) {
        let input = button.previousElementSibling;
        input.value = parseInt(input.value) + 1;
    }

    // Hàm giảm số lượng
    function decreaseQuantity(button) {
        let input = button.nextElementSibling;
        if (parseInt(input.value) > 1) {
            input.value = parseInt(input.value) - 1;
        }
    }

</script>
    <!-- Product Details Tab -->
    <section class="container py-5">
        <div class="card border-0 shadow-sm">
            <div class="card-body p-0">
                <ul class="nav nav-pills mb-3 border-bottom px-3 pt-3" id="pills-tab" role="tablist">

                    <li class="nav-item" role="presentation">

                        <button class="nav-link active" id="pills-desc-tab" data-bs-toggle="pill" data-bs-target="#pills-desc" type="button" role="tab">Mô Tả Sản Phẩm</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-review-tab" data-bs-toggle="pill" data-bs-target="#pills-review" type="button" role="tab">Đánh Giá <?= '(' . $countComment = count($listBinhLuan) . ')' ?></button>
                    </li>
                </ul>
                <div class="tab-content p-4" id="pills-tabContent">
                    <!-- Description Tab -->
                    <div class="tab-pane fade show active" id="pills-desc" role="tabpanel">
                        <?php echo formatProductDescription($sanPham['mo_ta']); ?>
                    </div>

                    <!-- Review Tab -->
                    <div class="tab-pane fade" id="pills-review" role="tabpanel">
                        <h4>Đánh Giá Sản Phẩm</h4>
                        <?php foreach ($listBinhLuan as $binhLuan): ?>
                            <div class="total-reviews">
                                <div class="rev-avatar">
                                    <img src="<?= $binhLuan['anh_dai_dien'] ?>" alt="">
                                </div>
                                <div class="review-box">
                                    <div class="post-author">
                                        <p><span><?= $binhLuan['ho_ten'] ?> -</span><?= $binhLuan['ngay_dang'] ?></p>
                                    </div>
                                    <p>Nội dung bình luận:
                                        <b><?= $binhLuan['noi_dung'] ?></b>
                                    </p>
                                    <?= $binhLuan['img'] ?>

                                    <p></p>
                                </div>
                            </div>
                        <?php endforeach ?>
                        <form action="#" class="review-form">
                            <div class="form-group row">
                                <div class="col">
                                    <label class="col-form-label"><span class="text-danger">*</span>
                                        Nội dung bình luận</label>
                                    <textarea class="form-control" required></textarea>
                                </div>
                            </div>
                            <div class="buttons">
                                <button class="btn btn-sqr" type="submit">Continue</button>
                            </div>
                        </form> <!-- end of review-form -->
                    </div>
                </div>

            </div>
        </div>
        <section class="products">
            <h4 class="mt-3">Sản phẩm cùng loại</h4>
            <?php
            if (!isset($listSanPhamCungDanhMuc) || !is_array($listSanPhamCungDanhMuc)) {
                $listSanPhamCungDanhMuc = []; // Gán giá trị mặc định là mảng rỗng
            }
            if (!empty($listSanPhamCungDanhMuc)): ?>
                <div class="product-grid mt-3">
                    <?php foreach ($listSanPhamCungDanhMuc as $sanPham): ?>
                        <div class="product-item">
                            <a href="<?= BASE_URL . '?act=chi-tiet-san-pham&id_san_pham=' . $sanPham['id'] ?>">
                                <img src="<?= BASE_URL . $sanPham['img'] ?>" width="200px" height="200px" alt="Product" class="product-image" />
                            </a>
                            <h6><?= htmlspecialchars($sanPham['ten_san_pham']) ?></h6>
                            <p class="product-price">
                                <span class="new-price"><?= number_format($sanPham['price'], 0, ',', '.') ?> đ</span>
                            </p>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php else: ?>
                <p>Không có sản phẩm nào để hiển thị.</p>
            <?php endif; ?>

        </section>
    </section>

    <?php require_once 'layout/Footer.php'; ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>

</body>