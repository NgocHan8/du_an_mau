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

            <h3>Danh sách tài khoản Quản Trị Viên</h3>
            <a href="<?= BASE_URL_ADMIN . '?act=form-them-tai-khoan-quan-tri' ?>"><button class="btn btn-success">Thêm tài khoản</button></a>
            <div class="mb-3">
            <table id="" class="table table-bordered table-striped mt-3">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>họ tên</th>
                        <th>email</th>
                        <th>số điện thoại</th>
                        <th>trạng thái</th>
                        <th>thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($listQuanTri as $key => $quanTri) : ?>
                        <tr>

                            <td><?= $key + 1 ?></td>
                            <td><?= $quanTri['ho_ten'] ?></td>
                            <td><?= $quanTri['email'] ?></td>
                            <td><?= $quanTri['sdt'] ?></td>
                            <td><?= $quanTri['trang_thai'] == 1 ? 'Active' : 'Inactive' ?></td>
                            <td>
                                <a href="<?= BASE_URL_ADMIN . '?act=form-sua-tai-khoan-quan-tri&id_quan_tri=' . $quanTri['id'] ?>">
                                    <button class="btn btn-warning">Sửa</button>
                                </a>

                                <a href="<?= BASE_URL_ADMIN . '?act=reset-password&id_quan_tri=' . $quanTri['id'] ?>" onclick="return confirm('Bạn có muốn reset password của bạn không?')">
                                    <button class="btn btn-danger">Reset</button>
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