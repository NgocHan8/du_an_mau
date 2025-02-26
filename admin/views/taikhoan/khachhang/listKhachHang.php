<section>
    <?php require_once './views/Home.php'; ?>

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
        <h3>Danh sách tài khoản Khách Hàng</h3>
        <div class="mb-3">
            <table id="" class="table table-bordered table-striped mt-3">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Họ tên</th>
                        <th>Ảnh đại diện</th>
                        <th>Email</th>
                        <th>Số điện thoại</th>
                        <th>Trạng thái</th>
                        <th>Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($listKhachHang as $key => $khachHang) : ?>
                        <tr>

                            <td><?= $key + 1 ?></td>
                            <td><?= $khachHang['ho_ten'] ?></td>
                            <td><img src="<?= BASE_URL_ADMIN . $khachHang['anh_dai_dien'] ?>" width="100px"
                                    onerror="this.onerror = null; this.src = '../assets/uploads/anh_dai_dien.png'"></td>
                            <td><?= $khachHang['email'] ?></td>
                            <td><?= $khachHang['sdt'] ?></td>
                            <td><?= $khachHang['trang_thai'] == 1 ? 'Active' : 'Inactive' ?></td>
                            <td>
                                <a href="<?= BASE_URL_ADMIN . '?act=chi-tiet-tai-khoan-khach-hang&id_khach_hang=' . $khachHang['id'] ?>">
                                    <button class="btn btn-success">Xem</button>
                                </a>

                                <a href="<?= BASE_URL_ADMIN . '?act=form-sua-tai-khoan-khach-hang&id_khach_hang=' . $khachHang['id'] ?>">
                                    <button class="btn btn-warning">Sửa</button>
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>

                </tbody>

            </table>
        </div>
    </div>
    </div>
    </div>
</section>