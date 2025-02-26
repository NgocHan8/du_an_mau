<?php require_once 'layout/Header.php'; ?>
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


<div class="bg-white py-2 border-bottom">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 small">
                    <li class="breadcrumb-item"><a href="<?= BASE_URL ?>" class="text-decoration-none text-muted">Trang Chủ</a></li>
                    <li class="breadcrumb-item"><a href="<?= BASE_URL . '?act=chi-tiet-don-hang' ?>" class="text-decoration-none text-muted">Chi tiết đơn hàng</a></li>
                </ol>
            </nav>
        </div>
    </div>
<div class="container mt-3">
    <div class="order-container">
        <h2 class="page-title">Chi Tiết Đơn Hàng</h2>

        <?php  ?>
        <table class="table table-bordered order-details">
            <tr>
                <th>Mã đơn hàng</th>
                <td><strong><?= $donHang['ma_don_hang'] ?></strong></td>
            </tr>
            <tr>
                <th>Ngày đặt</th>
                <td><?= $donHang['ngay_dat'] ?></td>
            </tr>
            <tr>
                <th>Trạng thái</th>
                <td><?= $trangThaiDonHang[$donHang['trang_thai_id']] ?></td>
            </tr>
            <tr>
                <th>Phương thức thanh toán</th>
                <td><?= $phuongThucThanhToan[$donHang['phuong_thuc_thanh_toan_id']] ?></td>
            </tr>
            <tr>
                <th>Khách hàng</th>
                <td><?= $donHang['ten_nguoi_nhan'] ?></td>
            </tr>
            <tr>
                <th>Số điện thoại</th>
                <td><?= $donHang['sdt_nguoi_nhan'] ?></td>
            </tr>
            <tr>
                <th>Email</th>
                <td><?= $donHang['email_nguoi_nhan'] ?></td>
            </tr>
            <tr>
                <th>Địa chỉ giao hàng</th>
                <td><?= $donHang['dia_chi_nguoi_nhan'] ?></td>
            </tr>
        </table>

        <div class="product-section">
            <h4 class="section-title">Danh sách sản phẩm</h4>
            <table class="table table-striped product-table">
                <thead>
                    <tr>
                        <th>Ảnh sản phẩm</th>
                        <th>Sản phẩm</th>
                        <th>Giá</th>
                        <th>Số lượng</th>
                        <th>Thành tiền</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($chiTietDonHang as $dh) { ?>
                        <tr>
                            <td class="product-name"><img src="<?= BASE_URL . $dh['img'] ?>" width="100px" alt=""></td>
                            <td class="product-name"><?= $dh['ten_san_pham'] ?></td>
                            <td class="product-price"><?= number_format($dh['don_gia'], 0, ',', '.') . 'đ'; ?></td>
                            <td class="product-quantity"><?= $dh['so_luong']; ?></td>
                            <td class="product-total"><?= number_format($dh['thanh_tien'], 0, ',', '.') . 'đ'; ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
            <div class="ship">
                <td>
                    <span>Phí vận chuyển:</span>
                    <span>30.000đ</span>
                </td>
            </div>
            <div class="total-section">
                <div class="total-amount">
                    <h3>
                        <span>Tổng thanh toán:</span>
                        <span><?= number_format($donHang['tong_tien'], 0, ',', '.') ?> đ</span>
                    </h3>
                </div>
            </div>


            <div class="action-buttons">
                <a href="<?= BASE_URL . '?act=lich-su-mua-hang' ?>" class="btn-back">
                    <i class="fas fa-arrow-left me-2"></i> Quay lại danh sách
                </a>

            </div>
        </div>
    </div>
</div>
<?php require_once 'layout/Footer.php'; ?>
