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
            <div class="row mt-3">
            <div class="col-sm-10">
                <h1>Quản lý sản phẩm</h1>
            </div>
            <div class="col-sm-1">
                <a href="<?= BASE_URL_ADMIN . '?act=san-pham' ?>" class="btn btn-secondary">Back</a>
            </div>
            <div class="row">
                <div class="col-12 col-sm-6">
                    <h3 class="d-inline-block d-sm-none"></h3>
                    <div class="col-12">
                        <img style="width: 500px;height: 500px;" src="<?= BASE_URL . $sanPham['img'] ?>" class="product-image" alt="Product Image">
                    </div>
                    <!-- <div class="col-12 product-image-thumbs">
              <?php foreach ($listAnhSanPham as $key => $anhSP) : ?>
                <div class="product-image-thumb <?= $anhSP[$key] == 0 ? 'active' : '' ?>"><img src="<?= BASE_URL . $anhSP['link_hinh_anh'] ?>" alt="Product Image"></div>
              <?php endforeach ?>
            </div> -->
                </div>
                <div class="col-12 col-sm-6">
                    <h3 class="my-3">Tên sản phẩm: <?= $sanPham['ten_san_pham'] ?></h3>
                    <hr>
                    <h4 class="mt-3">Giá tiền: <small><?= $sanPham['price'] ?> đ</small></h4>
                    <h4 class="mt-3">Số lượng: <small><?= $sanPham['quantity'] ?></small></h4>
                    <h4 class="mt-3">Ngày nhập: <small><?= $sanPham['ngay_nhap'] ?></small></h4>
                    <h4 class="mt-3">Danh mục: <small><?= $sanPham['ten_danh_muc'] ?></small></h4>
                    <h4 class="mt-3">Mô tả: <small><?= $sanPham['mo_ta'] ?></small></h4>
                </div>
            </div>
            </div>  
        </div>
    </div>
    </div>
</section>