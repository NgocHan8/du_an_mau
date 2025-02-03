<section>
    <?php require_once './views/Home.php' ?>

    <div class="col mt-5 container">
        <div class="container">
        <h1>Thêm danh mục sản phẩm</h1>
        <form action="<?= BASE_URL_ADMIN .'?act=them-danh-muc' ?>" method="POST" enctype="multipart/form-data">
        <div class="mb-3">
                <label class="form-label">Tên danh mục</label>
                <input type="text" class="form-control" name="ten_danh_muc" id="ten_danh_muc">
                <?php if(isset($errors['ten_danh_muc'])){?>
                    <p class="text-danger"><?=$errors['ten_danh_muc']?></p>
                <?php }?>
            </div>
            <div class="mb-3">
                <label class="form-label">Mô tả</label>
                <textarea name="mo_ta" id="mo_ta" cols="100" rows="10" class="form-control"></textarea>
            </div>
            
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    </div>
</section>