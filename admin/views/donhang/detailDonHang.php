<section>
    <?php require_once './views/Home.php'; ?>

    <div class="col mt-5">
        <div class="container">
        <?php if ($donHang): ?>
            <h3 class="mb-4 text-xl font-bold">Quản lý danh sách đơn hàng - ĐƠN HÀNG: <span class="text-primary"><?= $donHang['ma_don_hang'] ?></span></h3>

            <?php
            $colorAlert = match (true) {
                $donHang['trang_thai_id'] == 1 => 'warning',
                $donHang['trang_thai_id'] >= 2 && $donHang['trang_thai_id'] <= 4 => 'primary',
                $donHang['trang_thai_id'] == 5 => 'success',
                default => 'danger'
            };
            ?>

            <div class="alert alert-<?= $colorAlert ?>" role="alert">
                Trạng thái: <?= $donHang['ten_trang_thai'] ?>
            </div>

            <div class="row g-4">
                <!-- Thông tin người đặt -->
                <div class="col-md-4">
                    <div class="card shadow-sm p-3">
                        <h5 class="card-title">Thông tin người đặt</h5>
                        <p class="mb-1"><strong><?= $donHang['ho_ten'] ?></strong></p>
                        <p class="mb-1">Email: <?= $donHang['email'] ?></p>
                        <p class="mb-1">Số điện thoại: <?= $donHang['sdt'] ?></p>
                        <p class="mb-0">Địa chỉ: <?= $donHang['dia_chi'] ?></p>

                    </div>
                </div>

                <!-- Thông tin người nhận -->
                <div class="col-md-4">
                    <div class="card shadow-sm p-3">
                        <h5 class="card-title">Người nhận</h5>
                        <p class="mb-1"><strong><?= $donHang['ten_nguoi_nhan'] ?></strong></p>
                        <p class="mb-1">Email: <?= $donHang['email_nguoi_nhan'] ?></p>
                        <p class="mb-1">Số điện thoại: <?= $donHang['sdt_nguoi_nhan'] ?></p>
                        <p class="mb-0">Địa chỉ: <?= $donHang['dia_chi_nguoi_nhan'] ?></p>
                    </div>
                </div>

                <!-- Thông tin đơn hàng -->
                <div class="col-md-4">
                    <div class="card shadow-sm p-3">
                        <h5 class="card-title">Chi tiết đơn hàng</h5>
                        <p class="mb-1">Mã đơn hàng: <?= $donHang['ma_don_hang'] ?></p>
                        <p class="mb-1">Tổng tiền: <?= number_format($donHang['tong_tien'], 0, ',', '.') ?> đ</p>
                        <p class="mb-0">Phương thức thanh toán: <?= $donHang['ten_phuong_thuc'] ?></p>
                    </div>
                </div>
                <div class="row mt-5">
                <div class="col-12">
                    <div class="table-responsive shadow-sm">
                        <table class="table table-bordered">
                            <thead class="table-light">
                                <tr>
                                    <th>Tên sản phẩm</th>
                                    <th>Đơn giá</th>
                                    <th>Số lượng</th>
                                    <th>Thành tiền</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $tong_tien = 0; ?>
                                <?php foreach ($sanPhamDonHang as $sanPham): ?>
                                    <tr>
                                        <td><?= $sanPham['ten_san_pham'] ?></td>
                                        <td><?= number_format($sanPham['don_gia'], 0, ',', '.') ?> đ</td>
                                        <td><?= $sanPham['so_luong'] ?></td>
                                        <td><?= number_format($sanPham['thanh_tien'], 0, ',', '.') ?> đ</td>
                                    </tr>
                                    <?php $tong_tien += $sanPham['thanh_tien']; ?>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- Tổng kết đơn hàng -->
            <div class="row mt-4">
                <div class="col-md-6 offset-md-6">
                    <div class="card shadow-sm p-3">
                        <h5 class="card-title">Tổng kết</h5>
                        <table class="table">
                            <tr>
                                <th>Thành tiền:</th>
                                <td><?= number_format($tong_tien, 0, ',', '.') ?> đ</td>
                            </tr>
                            <tr>
                                <th>Phí vận chuyển:</th>
                                <td>30.000 đ</td>
                            </tr>
                            <tr>
                                <th><strong>Tổng tiền:</strong></th>
                                <td><strong><?= number_format($tong_tien + 30000, 0, ',', '.') ?> đ</strong></td>
                            </tr>
                        </table>
                        <p class="text-muted">Ngày đặt hàng: <?= date('d/m/Y', strtotime($donHang['ngay_dat'])) ?></p>
                    </div>
                </div>
            </div>
            </div>
            
            </div>

            <!-- Danh sách sản phẩm -->
            
        <?php else: ?>
            <div class="alert alert-danger mt-5" role="alert">
                Đơn hàng không tồn tại hoặc đã bị xóa.
            </div>
        <?php endif; ?>
    </div>
    </div>
</section>
