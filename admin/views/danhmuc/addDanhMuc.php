<section>
    <?php require_once './views/Home.php' ?>

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
            <h1>Thêm danh mục sản phẩm</h1>

            <form action="<?= BASE_URL_ADMIN . '?act=them-danh-muc' ?>" method="POST" enctype="multipart/form-data">
                <div class="mb-3">
                    <label class="form-label">Tên danh mục</label>
                    <input type="text" class="form-control" name="ten_danh_muc" id="ten_danh_muc">
                    <?php if (isset($errors['ten_danh_muc'])) { ?>
                        <p class="text-danger"><?= $errors['ten_danh_muc'] ?></p>
                    <?php } ?>
                </div>
                <div class="mb-3">
                    <label class="form-label">Mô tả</label>
                    <textarea name="mo_ta" id="mo_ta" cols="100" rows="10" class="form-control"></textarea>
                </div>
                <div class="row">
                    <div class="col">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>

                    <div class="col-sm-1">
                        <a href="<?= BASE_URL_ADMIN . '?act=danh-muc' ?>" class="btn btn-secondary">Back</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>