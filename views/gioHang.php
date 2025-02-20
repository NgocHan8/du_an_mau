<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giỏ Hàng</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/js/all.min.js"></script>
    <style>
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
        }

        .cart-container {
            max-width: 900px;
            margin: 50px auto;
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .cart-header {
            font-size: 24px;
            font-weight: bold;
            border-bottom: 2px solid #ddd;
            padding-bottom: 10px;
            margin-bottom: 20px;
        }

        .cart-item {
            border-bottom: 1px solid #ddd;
            padding: 15px 0;
        }

        .cart-item-inner {
            display: flex;
            align-items: center;
        }

        .cart-item-image {
            width: 80px;
            height: 80px;
            flex-shrink: 0;
        }

        .cart-item-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 8px;
        }

        .cart-item-details {
            flex-grow: 1;
            padding: 0 15px;
            min-width: 0;
            /* Prevents content from overflowing */
        }

        .cart-item-details h5 {
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            margin-bottom: 5px;
        }

        .cart-item-details p {
            margin-bottom: 0;
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

        .remove-item {
            color: red;
            cursor: pointer;
            border: none;
            background: none;
            padding: 0;
        }

        .checkout-btn {
            background-color: #31708f;
            color: white;
            padding: 10px;
            border-radius: 5px;
            text-align: center;
            font-size: 18px;
            cursor: pointer;
            margin-top: 20px;
            transition: background-color 0.3s;
        }

        .checkout-btn:hover {
            background-color: #245269;
        }

        .cart-summary {
            margin-top: 20px;
            border-top: 2px solid #ddd;
            padding-top: 20px;
        }

        .cart-summary-row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 10px;
        }

        .cart-total {
            font-size: 20px;
            font-weight: bold;
            color: #31708f;
        }

        /* For mobile view */
        @media (max-width: 767px) {
            .cart-item-actions {
                flex-direction: column;
                align-items: flex-end;
            }

            .quantity-control {
                margin-bottom: 10px;
                margin-right: 0;
            }
        }
    </style>
</head>

<body>
    <?php require_once 'layout/Header.php'; ?>

    <div class="cart-container">
        <div class="cart-header">Giỏ Hàng</div>
        <?php if (!empty($chiTietGioHang)) {
            $tongTien = 0;
        ?>
            <?php foreach ($chiTietGioHang as $key => $sanPham):
                $thanhTien = $sanPham['price'] * $sanPham['so_luong'];
                $tongTien += $thanhTien;
            ?>
                <div class="cart-item">
                    <div class="row align-items-center">
                        <div class="col-md-8">
                            <div class="cart-item-inner">
                                <div class="cart-item-image">
                                    <img src="<?= BASE_URL . $sanPham['img'] ?>" alt="Sản phẩm">
                                </div>
                                <div class="cart-item-details">
                                    <h5 class="text-truncate" title="<?= $sanPham['ten_san_pham'] ?>"><?= $sanPham['ten_san_pham'] ?></h5>
                                    <p class="text-muted"><?= number_format($sanPham['price'], 0, ',', '.') ?> đ</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">

                            <div class="cart-item-actions">
                                <div class="quantity-control">
                                    <form method="POST" action="<?= BASE_URL .'?act=cap-nhat-so-luong'?>" style="display: inline;">
                                        <input type="hidden" name="san_pham_id" value="<?= $sanPham['san_pham_id'] ?>">
                                        <input type="hidden" name="so_luong" value="<?= $sanPham['so_luong'] - 1 ?>">
                                        <button type="submit" <?= $sanPham['so_luong'] <= 1 ? 'disabled' : '' ?>><i class="fas fa-minus"></i></button>
                                    </form>

                                    <input type="text" value="<?= $sanPham['so_luong'] ?>" readonly class="quantity-input">

                                    <form method="POST" action="<?= BASE_URL ?>?act=cap-nhat-so-luong" style="display: inline;">
                                        <input type="hidden" name="san_pham_id" value="<?= $sanPham['san_pham_id'] ?>">
                                        <input type="hidden" name="so_luong" value="<?= $sanPham['so_luong'] + 1 ?>">
                                        <button type="submit"><i class="fas fa-plus"></i></button>
                                    </form>
                                    <form action="<?= BASE_URL . '?act=xoa-san-pham' ?>" method="post" style="display:inline;">
                                    <input type="hidden" name="san_pham_id" value="<?= $sanPham['san_pham_id'] ?>">
                                    <button type="submit" class="remove-item">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col text-end">
                            <p>Thành tiền: <strong><?= number_format($thanhTien, 0, ',', '.') ?> đ</strong></p>
                        </div>
                    </div>
                </div>
            <?php endforeach ?>

            <div class="cart-summary">
                <div class="cart-summary-row">
                    <span>Tổng số sản phẩm:</span>
                    <span><?= count($chiTietGioHang) ?></span>
                </div>

                <div class="cart-summary-row cart-total">
                    <span>Tổng thanh toán:</span>
                    <span><?= number_format($tongTien, 0, ',', '.') ?> đ</span>
                </div>
            </div>

            <a href="<?= BASE_URL . '?act=thanh-toan' ?>" class="checkout-btn text-decoration-none text-white">Tiến hành thanh toán</a>
        <?php } else { ?>
            <div class="text-center py-5">
                <i class="fas fa-shopping-cart fa-4x text-muted mb-3"></i>
                <p class="text-center text-muted">Giỏ hàng của bạn đang trống</p>
                <a href="<?= BASE_URL ?>" class="btn btn-primary mt-3">Tiếp tục mua sắm</a>
            </div>
        <?php } ?>
    </div>

    <script>
        function increaseQuantity(button, productId) {
            let input = button.previousElementSibling;
            input.value = parseInt(input.value) + 1;
            // Gọi form submit để cập nhật số lượng
            submitUpdateForm(productId, parseInt(input.value));
        }

        function decreaseQuantity(button, productId) {
            let input = button.nextElementSibling;
            if (parseInt(input.value) > 1) {
                input.value = parseInt(input.value) - 1;
                // Gọi form submit để cập nhật số lượng
                submitUpdateForm(productId, parseInt(input.value));
            }
        }

        function submitUpdateForm(productId, quantity) {
            // Tạo form ẩn để submit
            let form = document.createElement('form');
            form.method = 'POST';
            form.action = '<?= BASE_URL ?>?act=cap-nhat-so-luong';

            // Thêm input sản phẩm ID
            let inputId = document.createElement('input');
            inputId.type = 'hidden';
            inputId.name = 'san_pham_id';
            inputId.value = productId;
            form.appendChild(inputId);

            // Thêm input số lượng
            let inputQuantity = document.createElement('input');
            inputQuantity.type = 'hidden';
            inputQuantity.name = 'so_luong';
            inputQuantity.value = quantity;
            form.appendChild(inputQuantity);

            // Thêm form vào document và submit
            document.body.appendChild(form);
            form.submit();
        }
    </script>





    <?php require_once 'layout/Footer.php'; ?>

</body>

</html>