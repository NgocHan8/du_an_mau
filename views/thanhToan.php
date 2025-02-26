<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thanh Toán</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/js/all.min.js"></script>
    <style>
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
        }

        .checkout-container {
            max-width: 1200px;
            margin: 50px auto;
            background: white;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        .checkout-header {
            background-color: #31708f;
            color: white;
            padding: 20px;
            font-size: 24px;
            font-weight: bold;
        }

        .checkout-content {
            display: flex;
            flex-wrap: wrap;
        }

        .checkout-form {
            flex: 2;
            padding: 25px;
            border-right: 1px solid #eee;
        }

        .checkout-summary {
            flex: 1;
            padding: 25px;
            background-color: #f9f9f9;
        }

        .form-section {
            margin-bottom: 30px;
        }

        .form-section-title {
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 20px;
            padding-bottom: 10px;
            border-bottom: 1px solid #eee;
            color: #31708f;
        }

        .payment-methods {
            display: flex;
            flex-wrap: wrap;
            gap: 15px;
            margin-top: 15px;
        }

        .payment-method {
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 15px;
            flex: 1;
            min-width: 200px;
            cursor: pointer;
            transition: all 0.3s;
        }

        .payment-method:hover {
            border-color: #31708f;
            background-color: #f2f9ff;
        }

        .payment-method.selected {
            border-color: #31708f;
            background-color: #f2f9ff;
            box-shadow: 0 0 0 2px rgba(49, 112, 143, 0.2);
        }

        .payment-method-icon {
            font-size: 24px;
            margin-bottom: 10px;
            color: #31708f;
        }

        .product-list {
            margin-bottom: 25px;
        }

        .product-item {
            display: flex;
            margin-bottom: 15px;
            padding-bottom: 15px;
            border-bottom: 1px solid #eee;
        }

        .product-image {
            width: 50px;
            height: 50px;
            border-radius: 6px;
            overflow: hidden;
            margin-right: 15px;
        }

        .product-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .product-details {
            flex-grow: 1;
        }

        .product-name {
            font-weight: bold;
            margin-bottom: 5px;
        }

        .product-price {
            font-size: 14px;
            color: #666;
        }

        .product-quantity {
            font-size: 14px;
            color: #666;
            margin-top: 5px;
        }

        .price-row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 10px;
            font-size: 15px;
        }

        .total-row {
            display: flex;
            justify-content: space-between;
            margin-top: 15px;
            padding-top: 15px;
            border-top: 2px solid #ddd;
            font-size: 18px;
            font-weight: bold;
            color: #31708f;
        }

        .btn-checkout {
            background-color: #31708f;
            color: white;
            border: none;
            padding: 12px;
            font-size: 16px;
            border-radius: 6px;
            width: 100%;
            margin-top: 20px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .btn-checkout:hover {
            background-color: #245269;
        }

        @media (max-width: 991px) {
            .checkout-content {
                flex-direction: column;
            }
            .checkout-form {
                border-right: none;
                border-bottom: 1px solid #eee;
            }
        }
    </style>
</head>

<body>
    <?php require_once 'layout/Header.php'; ?>

    <div class="checkout-container">
        <div class="checkout-header">
            <div class="container">
                Thanh Toán Đơn Hàng
            </div>
        </div>
        <div class="checkout-content">
            <form class="checkout-form" method="POST" action="<?= BASE_URL . '?act=xu-ly-thanh-toan' ?>">
                <div class="form-section">
                    <div class="form-section-title">
                        <i class="fas fa-user-circle me-2"></i> Thông Tin Người Nhận
                    </div>
                    <div class="mb-3">
                        <label for="ten_nguoi_nhan" class="form-label">Họ tên người nhận *</label>
                        <input type="text" class="form-control" id="ten_nguoi_nhan" name="ten_nguoi_nhan" value="<?= $user['ho_ten'] ?>" required>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="email_nguoi_nhan" class="form-label">Email *</label>
                            <input type="email" class="form-control" id="email_nguoi_nhan" name="email_nguoi_nhan" value="<?= $user['email'] ?>" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="sdt_nguoi_nhan" class="form-label">Số điện thoại *</label>
                            <input type="tel" class="form-control" id="sdt_nguoi_nhan" name="sdt_nguoi_nhan" value="<?= $user['sdt'] ?>" required>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="dia_chi_nguoi_nhan" class="form-label">Địa chỉ giao hàng *</label>
                        <textarea class="form-control" id="dia_chi_nguoi_nhan" name="dia_chi_nguoi_nhan"  rows="3" required><?= $user['dia_chi'] ?></textarea>
                    </div>
                </div>

                <div class="form-section">
                <input type="hidden" id="phuong_thuc_thanh_toan_id" name="phuong_thuc_thanh_toan_id" value="1">
                    <div class="form-section-title">
                        <i class="fas fa-credit-card me-2"></i> Phương Thức Thanh Toán
                    </div>
                    <div class="payment-methods">
                        <div class="payment-method selected" data-payment-id="1">
                            
                            <div class="payment-method-name" > Thanh toán khi nhận hàng (COD)</div>
                        </div>
                        <div class="payment-method" data-payment-id="2">
                            
                            <div class="payment-method-name"> Chuyển khoản ngân hàng</div>
                        </div>
                    </div>
                </div>

                <div class="form-section">
                    <div class="form-section-title">
                        <i class="fas fa-sticky-note me-2"></i> Ghi Chú Đơn Hàng
                    </div>
                    <div class="mb-3">
                        <textarea class="form-control" id="ghi_chu" name="ghi_chu" rows="3" placeholder="Ghi chú về đơn hàng, ví dụ: thời gian hay địa điểm giao hàng chi tiết"></textarea>
                    </div>
                </div>

                <?php
                // Tính tổng tiền
                $tongTien = 0;
                foreach ($chiTietGioHang as $sanPham) {
                    $tongTien += $sanPham['price'] * $sanPham['so_luong'];
                }
                ?>
                <input type="hidden" name="tong_tien" value="<?= $tongTien + 30000?>">
                <button type="submit" class="btn-checkout">
                    <i class="fas fa-lock me-2"></i> Đặt Hàng Ngay
                </button>
            </form>
            <div class="checkout-summary">
                <div class="form-section-title">
                <input type="text" placeholder="MÃ GIẢM GIÁ" class="mb-3" class=""><br>
                    <i class="fas fa-shopping-cart me-2"></i> Đơn Hàng Của Bạn
                </div>

                <div class="product-list">
                    <?php foreach ($chiTietGioHang as $sanPham): ?>
                        <div class="product-item">
                            
                            <div class="product-details">
                                <div class="product-name text-truncate" title="<?= $sanPham['ten_san_pham'] ?>"><?= $sanPham['ten_san_pham'] ?></div>
                                <div class="product-price"><?= number_format($sanPham['price'], 0, ',', '.') ?> đ</div>
                                <div class="product-quantity">Số lượng: <?= $sanPham['so_luong'] ?></div>
                            </div>
                            <div class="product-subtotal fw-bold">
                                <?= number_format($sanPham['price'] * $sanPham['so_luong'], 0, ',', '.') ?> đ
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>

                <div class="price-row">
                    <span>Tạm tính:</span>
                    <span><?= number_format($tongTien, 0, ',', '.') ?> đ</span>
                </div>
                <div class="price-row">
                    <span>Phí vận chuyển:</span>
                    <span>30.000đ</span>
                </div>
                <div class="total-row">
                    <span>Tổng thanh toán:</span>
                    <input type="hidden" name="tong_tien" value="<?= $tongTien + 30000 ?>">
                    <span><?= number_format($tongTien + 30000, 0, ',', '.' ) ?> đ</span>
                </div>
            </div>
        </div>
    </div>

    <!-- <script>
        // Xử lý chọn phương thức thanh toán
        document.querySelectorAll('.payment-method').forEach(method => {
            method.addEventListener('click', function() {
                // Xóa class selected từ tất cả phương thức
                document.querySelectorAll('.payment-method').forEach(m => {
                    m.classList.remove('selected');
                });
                
                // Thêm class selected cho phương thức được chọn
                this.classList.add('selected');
                
                // Cập nhật giá trị input hidden
                const paymentId = this.getAttribute('data-payment-id');
                document.getElementById('phuong_thuc_thanh_toan_id').value = paymentId;
            });
        });
    </script> -->

    <?php require_once 'layout/Footer.php'; ?>
</body>

</html>