<section>
    <?php require_once './views/Home.php'; ?>
    <div class="col mt-5">
        <div class="container">
            <h3>Sửa thông tin đơn hàng <?= $donHang['ma_don_hang']; ?> </h3>
        </div>
        <form action="<?= BASE_URL_ADMIN . '?act=sua-don-hang' ?>" method="post">
            <input type="text" value="<?= $donHang['id'] ?>" name="don_hang_id" hidden readonly>
            <div class="mb-3">
                <label class="form-label">Tên người nhận</label>
                <input type="text" class="form-control" name="ten_nguoi_nhan" value="<?= $donHang['ten_nguoi_nhan'] ?>" readonly>
                <?php if (isset($errors['ten_nguoi_nhan'])) { ?>
                    <p class="text-danger"><?= $errors['ten_nguoi_nhan'] ?></p>
                <?php  } ?>
            </div>
            <div class="mb-3">
                <label class="form-label">Số điện thoại</label>
                <input type="text" class="form-control" name="sdt_nguoi_nhan" value="<?= $donHang['sdt_nguoi_nhan'] ?>" readonly>
                <?php if (isset($errors['sdt_nguoi_nhan'])) { ?>
                    <p class="text-danger"><?= $errors['sdt_nguoi_nhan'] ?></p>
                <?php  } ?>
            </div>
            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="text" class="form-control" name="email_nguoi_nhan" value="<?= $donHang['email_nguoi_nhan'] ?>" readonly>
                <?php if (isset($errors['email_nguoi_nhan'])) { ?>
                    <p class="text-danger"><?= $errors['email_nguoi_nhan'] ?></p>
                <?php  } ?>
            </div>
            <div class="mb-3">
                <label class="form-label">Địa chỉ</label>
                <input type="text" class="form-control" name="dia_chi_nguoi_nhan" value="<?= $donHang['dia_chi_nguoi_nhan'] ?>" readonly>
                <?php if (isset($errors['dia_chi_nguoi_nhan'])) { ?>
                    <p class="text-danger"><?= $errors['dia_chi_nguoi_nhan'] ?></p>
                <?php  } ?>
            </div>

            <div class="mb-3">
                <label class="form-label">Ghi chú</label>
                <textarea name="ghi_chu" id="" class="form-control" readonly><?= $donHang['ghi_chu'] ?></textarea>
            </div>
            <hr>
            <div class="mb-3">
                <label for="trang_thai_id">Trạng thái đơn hàng</label>
                <select id="trang_thai_id" name="trang_thai_id" class="form-control custom-select">
                    <?php foreach ($listTrangThaiDonHang as $trangThai) : ?>
                        <option <?php
                                if (
                                    $donHang['trang_thai_id'] > $trangThai['id']
                                    || $donHang['trang_thai_id'] == 9
                                    || $donHang['trang_thai_id'] == 10
                                    || $donHang['trang_thai_id'] == 11
                                ) {
                                    echo 'disabled';
                                }
                                ?> <?= $trangThai['id'] == $donHang['trang_thai_id'] ? 'selected' : '' ?> value="<?= $trangThai['id'] ?>"><?= $trangThai['ten_trang_thai'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        <button type="submit" class="btn btn-primary">Submit</button>

    </div>

</section>