<section>
    <?php require_once './views/Home.php' ?>

    <div class="col mt-5 container">
        <div class="container">
            <h1>Sửa tài khoản quản trị</h1>

            <form action="<?= BASE_URL_ADMIN . '?act=sua-tai-khoan-quan-tri' ?>" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="quan_tri_id" value="<?= $quanTri['id'] ?>">
                <div class="mb-3">
                    <label class="form-label">Họ và tên</label>
                    <input type="text" class="form-control" name="ho_ten" id="ho_ten" value="<?= $quanTri['ho_ten'] ?>">
                    <?php if (isset($errors['ho_ten'])) { ?>
                        <p class="text-danger"><?= $errors['ho_ten'] ?></p>
                    <?php } ?>
                </div>
                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="text" class="form-control" name="email" id="email" value="<?= $quanTri['email'] ?>">
                    <?php if (isset($errors['email'])) { ?>
                        <p class="text-danger"><?= $errors['email'] ?></p>
                    <?php } ?>
                </div>
                <div class="mb-3">
                    <label class="form-label">Số điện thoại</label>
                    <input type="text" class="form-control" name="sdt" id="sdt" value="<?= $quanTri['sdt'] ?>">
                    <?php if (isset($errors['sdt'])) { ?>
                        <p class="text-danger"><?= $errors['sdt'] ?></p>
                    <?php } ?>
                </div>
                <div class="mb-3">
                    <label class="form-label">Trạng thái</label>
                    <select name="trang_thai" id="trang_thai">
                    <option <?= $quanTri['trang_thai']==1 ? 'selected' : '' ?> value="1">Active</option>
                    <option <?= $quanTri['trang_thai']==2 ? 'selected' : '' ?> value="2">Inactive</option>
                </select>
                </div>
                <div class="row">
                    <div class="col">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>

                    <div class="col-sm-1">
                        <a href="<?= BASE_URL_ADMIN . '?act=list-tai-khoan-quan-tri' ?>" class="btn btn-secondary">Back</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>