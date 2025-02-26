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
        <div class=" row mt-3">
            <div class="col-sm-10">
                <h1>Quản lý tài khoản khách hàng</h1>
            </div>
            <div class="col-sm-1">
                <a href="<?= BASE_URL_ADMIN . '?act=list-tai-khoan-khach-hang' ?>" class="btn btn-secondary">Back</a>
            </div>
            <div class="row">
                <div class="col-12 col-sm-6">
                    <h3 class="d-inline-block d-sm-none"></h3>
                    <div class="col-12">
                        <img style="width: 350px;height: 350px;" src="<?= BASE_URL . $khachHang['anh_dai_dien'] ?>" 
                        onerror="this.onerror = null; this.src = '../assets/uploads/anh_dai_dien.png'" class="product-image" alt="Product Image">
                    </div>
                    
                </div>
                <div class="col-12 col-sm-6">
                    <h3 class="my-3">Họ và tên: <?= $khachHang['ho_ten'] ?></h3>
                    <hr>
                    <h4 class="mt-3">Ngày sinh: <small><?= $khachHang['ngay_sinh'] ?></small></h4>
                    <h4 class="mt-3">Email: <small><?= $khachHang['email'] ?></small></h4>
                    <h4 class="mt-3">Số điện thoại: <small><?= $khachHang['sdt']?></small></h4>
                    <h4 class="mt-3">Giới tính: <small><?= $khachHang['gioi_tinh']==1 ?'Nam' :'Nữ' ?></small></h4>
                    <h4 class="mt-3">Địa chỉ: <small><?= $khachHang['dia_chi'] ?></small></h4>
                    <h4 class="mt-3">Trạng thái: <small><?= $khachHang['trang_thai'] ==1 ?'Active': 'Inactive' ?></small></h4>
                </div>
                <div class="col-12">
          <hr>
          <h2>Lịch sử mua hàng</h2>
          <div class="">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>STT</th>
                  <th>Mã đơn hàng</th>
                  <th>Tên người nhận</th>
                  <th>Số điện thoại</th>
                  <th>Ngày đặt</th>
                  <th>Tổng tiền</th>
                  <th>Trạng thái</th>
                  <th>Thao tác</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($listDonHang as $key => $donHang) : ?>
                  <tr>

                    <td><?= $key + 1 ?></td>
                    <td><?= $donHang['ma_don_hang'] ?></td>
                    <td><?= $donHang['ten_nguoi_nhan'] ?></td>
                    <td><?= $donHang['sdt_nguoi_nhan'] ?></td>
                    <td><?= $donHang['ngay_dat'] ?></td>
                    <td><?= $donHang['tong_tien'] ?></td>
                    <td><?= $donHang['ten_trang_thai'] ?></td>
                    <td>
                      <div class="btn-group">

                        <a href="<?= BASE_URL_ADMIN . '?act=chi-tiet-don-hang&id_don_hang=' . $donHang['id'] ?>">
                          <button class="btn btn-primary">Xem</button>
                        </a>
                        <a href="<?= BASE_URL_ADMIN . '?act=form-sua-don-hang&id_don_hang=' . $donHang['id'] ?>">
                          <button class="btn btn-warning">Sửa</button>
                        </a>
                      </div>
                    </td>
                  </tr>
                <?php endforeach ?>
              </tbody>

            </table>
          </div>
        </div>
            </div>
            
        </div>
    </div>
    </div>
</section>