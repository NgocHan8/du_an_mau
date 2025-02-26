<?php require_once 'layout/Header.php' ?>

<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hồ Sơ Của Tôi</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- <style>
        .form-label {
            color: #666;
            font-weight: 500;
        }

        .change-link {
            color: #0d6efd;
            text-decoration: none;
            margin-left: 10px;
        }

        .profile-image-container {
            width: 150px;
            height: 150px;
            position: relative;
            margin: 0 auto 1rem;
        }

        .profile-image {
            width: 100%;
            height: 100%;
            border-radius: 50%;
            object-fit: cover;
            border: 2px solid #dee2e6;
        }

        .profile-image-placeholder {
            width: 100%;
            height: 100%;
            border-radius: 50%;
            background-color: #f8f9fa;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 50px;
            color: #dee2e6;
        }

        .image-upload-label {
            cursor: pointer;
            margin-bottom: 1rem;
        }

        .image-upload-input {
            display: none;
        }

        .upload-info {
            font-size: 0.875rem;
            color: #6c757d;
            text-align: center;
        }

        .invalid-feedback {
            display: none;
            text-align: center;
            margin-top: 0.5rem;
        }
    </style> -->
</head>

<body>
    <div class="bg-white py-2 border-bottom">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 small">
                    <li class="breadcrumb-item"><a href="<?= BASE_URL ?>" class="text-decoration-none text-muted">Trang Chủ</a></li>
                    <li class="breadcrumb-item"><a href="#" class="text-decoration-none text-muted">Đơn hàng</a></li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="container mt-3">
        <h3 class="mb-4">Đơn hàng của tôi</h3>

        <?php if (empty($donHang)): ?>
            <div class="text-center py-5 bg-light rounded">
                <i class="bi bi-bag-x" style="font-size: 3rem; color: #ccc;"></i>
                <p class="mt-3 text-muted">Bạn chưa có đơn hàng nào</p>
                <a href="<?= BASE_URL ?>" class="btn btn-outline-primary mt-2">Tiếp tục mua sắm</a>
            </div>
        <?php else: ?>
            <div class="table-responsive">
                <table class="table table-hover border">
                    <thead class="table-light">
                        <tr>
                            <th>Mã đơn hàng</th>
                            <th>Ngày đặt</th>
                            <th>Tổng tiền</th>
                            <th>Trạng thái</th>
                            <th>Thanh toán</th>
                            <th>Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($donHang as $dh): ?>
                            <tr>
                                <td><?= $dh['ma_don_hang'] ?></td>
                                <td><?= $dh['ngay_dat'] ?></td>
                                <td><?= number_format($dh['tong_tien'], 0, ',', '.') ?> đ</td>
                                <td>
                                    <?= $trangThaiDonHang[$dh['trang_thai_id']] ?>
                                </td>
                                <td>
                                    <?= $phuongThucThanhToan[$dh['phuong_thuc_thanh_toan_id']] ?>
                                </td>
                                <td>
                                    <button class="btn btn-success">
                                        <a href="<?= BASE_URL ?>?act=chi-tiet-don-hang&id=<?= $dh['id'] ?>" class="text-decoration-none text-light">Chi tiết</a></button>
                                    <?php if ($dh['trang_thai_id'] == 1): ?>
                                        <a href="<?= BASE_URL . '?act=huy-don-hang&id=' . $dh['id'] ?>" class="btn btn-danger"
                                            onclick="return confirm('Bạn muốn hủy đơn hàng?')">Hủy</a>
                                    <?php elseif ($dh['trang_thai_id'] == 5): ?>
                                        <a href="<?= BASE_URL . '?act=form-danh-gia&id=' . $dh['id'] ?>" class="btn btn-primary"
                                            >Đánh giá</a>
                                    <?php endif; ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        <?php endif; ?>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
<?php require_once 'layout/Footer.php' ?>