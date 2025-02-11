<div class="card card-outline card-primary">
      <div class="card-header text-center">
        <a href="#" class="h1">BÁN TRANG SỨC</a>
      </div>
      <div class="card-body">

        <?php if (!empty($_SESSION['error'])) { ?>
          <p class="text-danger login-box-msg"><?= $_SESSION['error']?></p>
        <?php  } else { ?>
          <p class="login-box-msg">vui lòng đăng nhập</p>
        <?php } ?>
        <form action="<?= BASE_URL_ADMIN . '?act=check-login-admin'?>" method="post">
          <div class="input-group mb-3">
            <input type="email" class="form-control" placeholder="Email" name="email">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Password" name="mat_khau">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>

          <!-- /.col -->
          <div class="col-12">
            <button type="submit" class="btn btn-primary btn-block">Đăng nhập</button>
          </div>
          <!-- /.col -->
      </div>
      </form>


      <!-- /.social-auth-links -->

      <p class="mb-1">
        <a href="#">quên mật khẩu</a>
      </p>

    </div>