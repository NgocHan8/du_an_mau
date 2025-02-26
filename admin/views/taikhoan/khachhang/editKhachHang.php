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
                <h1>Sửa tài khoản Khách Hàng: <?= $khachHang['ho_ten'] ?></h1>
            
            <form action="<?= BASE_URL_ADMIN . '?act=sua-tai-khoan-khach-hang' ?>" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="khach_hang_id" id="" value="<?= $khachHang['id'] ?>">
                <div class="form-group mb-3">
                    <label class="form-label">Họ và tên</label>
                    <input type="text" class="form-control" name="ho_ten" id="ho_ten" value="<?= $khachHang['ho_ten'] ?>">
                    <?php if (isset($_SESSION['error']['ho_ten'])) { ?>
                        <p class="text-danger"><?= $_SESSION['error']['ho_ten'] ?></p>
                    <?php } ?>
                </div>
                <div class="form-group mb-3">
                    <label class="form-label">Ngày sinh</label>
                    <input type="date" class="form-control" name="ngay_sinh" id="ngay_sinh" value="<?= $khachHang['ngay_sinh'] ?>">
                    <?php if (isset($_SESSION['error']['ngay_sinh'])) { ?>
                        <p class="text-danger"><?= $_SESSION['error']['ngay_sinh'] ?></p>
                    <?php } ?>
                </div>
                <div class="form-group mb-3">
                    <label class="form-label">Email</label>
                    <input type="text" class="form-control" name="email" id="email" value="<?= $khachHang['email'] ?>">
                    <?php if (isset($_SESSION['error']['email'])) { ?>
                        <p class="text-danger"><?= $_SESSION['error']['email'] ?></p>
                    <?php } ?>
                </div>
                
                
                <div class="form-group mb-3">
                    <label class="form-label">Số điện thoại</label>
                    <input type="text" class="form-control" name="sdt" id="sdt" value="<?= $khachHang['sdt'] ?>">
                    <?php if (isset($_SESSION['error']['sdt'])) { ?>
                        <p class="text-danger"><?= $_SESSION['error']['sdt'] ?></p>
                    <?php } ?>
                </div>

                <div class="form-group mb-3">
                    <label class="form-label">Giới tính</label>
                    <select name="gioi_tinh" id="gioi_tinh" class="form-control">
                        <option value="1" <?= $khachHang['gioi_tinh'] == 1 ? 'selected' : '' ?>> Nam</option>
                        <option value="2" <?= $khachHang['gioi_tinh'] == 2 ? 'selected' : '' ?>> Nữ</option>
                    </select>
                </div>
                
                <div class="form-group mb-3">
                    <label class="form-label">Địa chỉ</label>
                    <input type="text" class="form-control" name="dia_chi" id="dia_chi" value="<?= $khachHang['dia_chi'] ?>">
                    <?php if (isset($_SESSION['error']['dia_chi'])) { ?>
                        <p class="text-danger"><?= $_SESSION['error']['dia_chi'] ?></p>
                    <?php } ?>
                </div>
                <div class="form-group mb-3">
                  <label for="trang_thai_id">trạng thái tai khoan</label>
                  <select id="trang_thai_id" name="trang_thai" class="form-control custom-select">
                    <option <?= $khachHang['trang_thai'] == 1 ? 'selected' : '' ?> value="1">active</option>
                    <option <?= $khachHang['trang_thai'] !== 1 ? 'selected' : '' ?> value="2">inactive</option>
                  </select>
                </div>
                

                <div class="row">
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                <div class="col-sm-1">
                    <a href="<?= BASE_URL_ADMIN . '?act=list-tai-khoan-khach-hang' ?>" class="btn btn-secondary">Back</a>
                </div>
            </form>
        </div>
    </div>
</section>