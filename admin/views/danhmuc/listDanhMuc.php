<section>
    <?php require_once  './views/Home.php' ?>
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
            <h1>Danh sách danh mục sản phẩm</h1>
            <a href="<?= BASE_URL_ADMIN . '?act=form-them-danh-muc' ?>"><button class="btn btn-success">Thêm danh mục</button></a>
            <?php
            if (isset($_SESSION['message'])): ?>
                <div class="alert alert-success">
                    <?= $_SESSION['message'] ?>
                </div>
                <?php unset($_SESSION['message']); ?>
            <?php endif ?>
            <table class=" table table-bordered border-secondary-subtle table-hover mt-3">
                <thead>
                    <th>ID</th>
                    <th>NAME</th>
                    <th>MÔ TẢ</th>
                    <th>THAO TÁC</th>
                </thead>
                <tbody class="table-group-divider">
                    <?php foreach ($listDanhMuc as $key => $danhMuc) : ?>
                        <tr>
                            <td><?= $key + 1 ?></td>
                            <td><?= $danhMuc['ten_danh_muc'] ?></td>
                            <td><?= $danhMuc['mo_ta'] ?></td>
                            <td>
                                <a href="<?= BASE_URL_ADMIN . '?act=form-sua-danh-muc&id_danh_muc=' . $danhMuc['id'] ?>">
                                    <button class="btn btn-warning">Sửa</button></a>
                                <a href="<?= BASE_URL_ADMIN . '?act=xoa-danh-muc&id_danh_muc=' . $danhMuc['id'] ?>" onclick=" return confirm('Bạn chắc chắn muốn xóa danh mục sản phẩm')">
                                    <button class="btn btn-danger">Xóa</button></a>

                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
            </div>
    </div>
</section>