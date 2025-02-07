<section>
    <?php require_once './views/Home.php' ?>

    <div class="col mt-5 container">
        <div class="container row">
            <div class="col">
                <h1>Sửa sản phẩm</h1>
            </div>
            <div class="col-sm-1">
                <a href="<?= BASE_URL_ADMIN . '?act=san-pham' ?>" class="btn btn-secondary">Back</a>
            </div>
            <form action="<?= BASE_URL_ADMIN . '?act=sua-san-pham' ?>" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="san_pham_id" id="" value="<?= $sanPham['id'] ?>">
                <div class="form-group mb-3">
                    <label class="form-label">Tên sản phẩm</label>
                    <input type="text" class="form-control" name="ten_san_pham" id="ten_san_pham" value="<?= $sanPham['ten_san_pham'] ?>">
                    <?php if (isset($_SESSION['error']['ten_san_pham'])) { ?>
                        <p class="text-danger"><?= $_SESSION['error']['ten_san_pham'] ?></p>
                    <?php } ?>
                </div>

                <div class="form-group mb-3">
                    <label class="form-label">Giá sản phẩm</label>
                    <input type="text" class="form-control" name="price" id="price" value="<?= $sanPham['price'] ?>">
                    <?php if (isset($_SESSION['error']['price'])) { ?>
                        <p class="text-danger"><?= $_SESSION['error']['price'] ?></p>
                    <?php } ?>
                </div>
                <div class="form-group mb-3">
                    <label class="form-label">Ảnh sản phẩm</label>
                    <input type="file" id="inputStatus" class="form-control custom-select" name="img">

                </div>
                <!-- <div class="form-group mb-3">
                    <label class="form-label">Album ảnh sản phẩm</label>
                    <input type="file" class="form-control" name="img_array" id="img_array">
                    
                </div> -->
                <div class="form-group mb-3">
                    <label class="form-label">Số lượng sản phẩm</label>
                    <input type="text" class="form-control" name="quantity" id="quantity" value="<?= $sanPham['quantity'] ?>">
                    <?php if (isset($_SESSION['error']['quantity'])) { ?>
                        <p class="text-danger"><?= $_SESSION['error']['quantity'] ?></p>
                    <?php } ?>
                </div>

                <div class="form-group mb-3">
                    <label class="form-label">Danh mục sản phẩm</label>
                    <select name="danh_muc_id" id="">
                        <?php foreach ($listDanhMuc as $danhMuc): ?>
                            <option <?= $danhMuc['id'] == $sanPham['danh_muc_id'] ? 'selected' : '' ?> value="<?= $danhMuc['id'] ?>"><?= $danhMuc['ten_danh_muc'] ?></option>
                        <?php endforeach ?>
                    </select>
                </div>


                <div class="form-group mb-3">
                    <label class="form-label">Mô tả</label>
                    <textarea name="mo_ta" id="mo_ta" rows="5" class="form-control"><?= $sanPham['mo_ta'] ?></textarea>
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</section>