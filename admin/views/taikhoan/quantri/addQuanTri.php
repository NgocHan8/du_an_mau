<section>
    <?php require_once './views/Home.php' ?>

    <div class="col mt-5 container">
        <div class="container">
            <h1>Thêm tài khoản quản trị</h1>

            <form action="<?= BASE_URL_ADMIN . '?act=them-tai-khoan-quan-tri' ?>" method="POST" enctype="multipart/form-data">
                <div class="mb-3">
                    <label class="form-label">Họ và tên</label>
                    <input type="text" class="form-control" name="ho_ten" id="ho_ten">
                    <?php if (isset($errors['ho_ten'])) { ?>
                        <p class="text-danger"><?= $errors['ho_ten'] ?></p>
                    <?php } ?>
                </div>
                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="text" class="form-control" name="email" id="email">
                    <?php if (isset($errors['email'])) { ?>
                        <p class="text-danger"><?= $errors['email'] ?></p>
                    <?php } ?>
                </div>
                <div class="mb-3">
                    <label class="form-label">Số điện thoại</label>
                    <input type="text" class="form-control" name="sdt" id="sdt">
                    <?php if (isset($errors['sdt'])) { ?>
                        <p class="text-danger"><?= $errors['sdt'] ?></p>
                    <?php } ?>
                </div>
                <div class="mb-3">
                    <label class="form-label">Mật khẩu</label>
                    <input type="text" class="form-control" name="mat_khau" id="mat_khau">
                    <?php if (isset($errors['mat_khau'])) { ?>
                        <p class="text-danger"><?= $errors['mat_khau'] ?></p>
                    <?php } ?>
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