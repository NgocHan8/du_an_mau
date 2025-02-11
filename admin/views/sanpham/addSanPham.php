<section>
    <?php require_once './views/Home.php' ?>

    <div class="col mt-5">
        <div class="container ">
            <h1>Thêm sản phẩm</h1>

            <form action="<?= BASE_URL_ADMIN . '?act=them-san-pham' ?>" method="POST" enctype="multipart/form-data">
                <div class="mb-3">
                    <label class="form-label">Tên sản phẩm</label>
                    <input type="text" class="form-control" name="ten_san_pham" id="ten_san_pham">
                    <?php if (isset($_SESSION['error']['ten_san_pham'])) { ?>
                        <p class="text-danger"><?= $_SESSION['error']['ten_san_pham'] ?></p>
                    <?php } ?>
                </div>

                <div class="mb-3">
                    <label class="form-label">Giá sản phẩm</label>
                    <input type="text" class="form-control" name="price" id="price">
                    <?php if (isset($_SESSION['error']['price'])) { ?>
                        <p class="text-danger"><?= $_SESSION['error']['price'] ?></p>
                    <?php } ?>
                </div>
                <div class="mb-3">
                    <label class="form-label">Ảnh sản phẩm</label>
                    <input type="file" class="form-control" name="img" id="img">
                    <?php if (isset($_SESSION['error']['img'])) { ?>
                        <p class="text-danger"><?= $_SESSION['error']['img'] ?></p>
                    <?php } ?>
                </div>
                <!-- <div class="mb-3">
                    <label class="form-label">Album ảnh sản phẩm</label>
                    <input type="file" class="form-control" name="img_array" id="img_array">
                    
                </div> -->
                <div class="mb-3">
                    <label class="form-label">Số lượng sản phẩm</label>
                    <input type="text" class="form-control" name="quantity" id="quantity">
                    <?php if (isset($_SESSION['error']['quantity'])) { ?>
                        <p class="text-danger"><?= $_SESSION['error']['quantity'] ?></p>
                    <?php } ?>
                </div>

                <div class="mb-3">
                    <label class="form-label">Danh mục sản phẩm</label>
                    <select name="danh_muc_id" id="">
                        <?php foreach ($listDanhMuc as $danhMuc): ?>
                            <option value="<?= $danhMuc['id'] ?>"><?= $danhMuc['ten_danh_muc'] ?></option>
                        <?php endforeach ?>
                    </select>
                </div>


                <div class="mb-3">
                    <label class="form-label">Mô tả</label>
                    <textarea name="mo_ta" id="mo_ta" rows="5" class="form-control"></textarea>
                </div>

                <div class="row">
                    <div class="col">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                <div class="col-sm-1">
                    <a href="<?= BASE_URL_ADMIN . '?act=san-pham' ?>" class="btn btn-secondary">Back</a>
                </div>
            </form>
        </div>
    </div>
</section>