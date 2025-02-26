<section>
    <?php
    require_once './views/Home.php';
    ?>
<div class="col">
            <nav class="navbar bg-body-tertiary ">
                <div class="">
                    <a class="navbar-brand text-dark" href="<?= BASE_URL ?>">Website</a>
                </div>
                <div class="icon me-5">
                    <a href="<?= BASE_URL_ADMIN . '?act=logout-admin' ?>" onclick="return confirm('Bạn muốn đăng xuất?')">
                        <img width="25" height="25" src="https://img.icons8.com/pixels/32/exit.png" alt="exit" />
                    </a>
                </div>
            </nav>
            <h1>Danh sách đơn hàng</h1>
            <?php
            if (isset($_SESSION['message'])): ?>
                <div class="alert alert-success">
                    <?= $_SESSION['message'] ?>
                </div>
                <?php unset($_SESSION['message']); ?>
            <?php endif ?>
            <table class=" table table-bordered border-secondary-subtle table-hover mt-3">
                <thead>
                    <th>STT</th>
                    <th>Mã Đơn Hàng</th>
                    <th>Tên khách hàng</th>
                    <th>Số điện thoại</th>
                    <th>Ngày đặt</th>
                    <th>Tổng tiền</th>
                    <th>Trạng thái</th>
                    <th>THAO TÁC</th>
                </thead>
                <tbody class="table-group-divider">
                    <?php if (!empty($listDonHang)): ?>
                        <?php foreach ($listDonHang as $key => $donHang) : ?>
                            <tr>
                                <td><?= $key + 1 ?></td>
                                <td><?= $donHang['ma_don_hang'] ?></td>
                                <td><?= $donHang['ten_nguoi_nhan'] ?></td>
                                <td><?= $donHang['sdt_nguoi_nhan'] ?></td>
                                <td><?= $donHang['ngay_dat'] ?></td>
                                <td><?= $donHang['tong_tien'] ?></td>
                                <td><?= $donHang['ten_trang_thai'] ?></td>
                                <td>
                                    <a href="<?= BASE_URL_ADMIN . '?act=xem-don-hang&id_don_hang=' . $donHang['id'] ?>">
                                        <button class="btn btn-success">Xem</button></a>
                                    <a href="<?= BASE_URL_ADMIN . '?act=form-sua-don-hang&id_don_hang=' . $donHang['id'] ?>">
                                        <button class="btn btn-warning">Sửa</button></a>


                                </td>
                            </tr>
                        <?php endforeach ?>
                    <?php endif ?>
                </tbody>
            </table>
        </div>
    </div>
</section>