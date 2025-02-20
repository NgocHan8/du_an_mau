<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .login-register-wrapper {
            min-height: 100vh;
            display: flex;
            align-items: center;
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            padding: 40px 0;
        }

        .login-reg-form-wrap {
            background: white;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }

        .login-reg-form-wrap h5 {
            color: #333;
            font-size: 24px;
            margin-bottom: 30px;
            font-weight: 600;
        }

        .form-control {
            padding: 12px;
            border-radius: 8px;
            border: 1px solid #dee2e6;
            margin-bottom: 5px;
        }

        .form-control:focus {
            box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
            border-color: #80bdff;
        }

        .form-label {
            font-weight: 500;
            color: #495057;
            margin-bottom: 8px;
        }

        .login-box-msg {
            color: #6c757d;
            margin-bottom: 25px;
        }

        .text-danger {
            margin-bottom: 20px;
        }

        .forget-pwd {
            color: #007bff;
            text-decoration: none;
            font-size: 14px;
            transition: color 0.3s;
        }

        .forget-pwd:hover {
            color: #0056b3;
            text-decoration: underline;
        }

        .btn-sqr {
            background: #007bff;
            color: white;
            padding: 12px 30px;
            border-radius: 8px;
            border: none;
            width: 100%;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-top: 20px;
            transition: all 0.3s ease;
        }

        .btn-sqr:hover {
            background: #0056b3;
            transform: translateY(-1px);
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
        }

        .single-input-item {
            margin: 15px 0;
        }

        .login-reg-form-meta {
            margin-top: 15px;
        }

        @media (max-width: 768px) {
            .container {
                max-width: 90vw !important;
            }

            .login-reg-form-wrap {
                padding: 20px;
            }
        }
    </style>
</head>

<body>
    <div class="login-register-wrapper section-padding">
        <div class="container" style="max-width: 40vw">
            <div class="member-area-from-wrap">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="login-reg-form-wrap">
                            <h5 class="text-center">Đăng ký</h5>
                            <!-- <?php if (isset($_SESSION['error'])) { ?>
                                <p class="text-danger login-box-msg text-center"><?= $_SESSION['error'] ?></p>
                            <?php  } else { ?>
                                <p class="login-box-msg text-center">Vui lòng đăng nhập</p>
                            <?php } ?> -->
                            <?php if (isset($_SESSION['error'])) { ?>
                                <p class="text-danger login-box-msg text-center">
                                    <?= is_array($_SESSION['error']) ? implode('<br>', $_SESSION['error']) : $_SESSION['error']; ?>
                                </p>
                            <?php } ?>

                            <form action="<?= BASE_URL . '?act=check-register' ?>" method="post">
                                <div class="mb-3">
                                    <label for="ho_ten" class="form-label">Họ tên</label>
                                    <input type="text" class="form-control" id="ho_ten" name="ho_ten">
                                    <?php if (isset($_SESSION['error']['ho_ten'])) { ?>
                                        <p class="text-danger"><?= $_SESSION['error']['ho_ten'] ?></p>
                                    <?php } ?>
                                </div>

                                <div class="mb-3">
                                    <label for="ngay_sinh" class="form-label">Ngày sinh</label>
                                    <input type="date" class="form-control" id="ngay_sinh" name="ngay_sinh">
                                    <?php if (isset($_SESSION['error']['ngay_sinh'])) { ?>
                                        <p class="text-danger"><?= $_SESSION['error']['ngay_sinh'] ?></p>
                                    <?php } ?>
                                </div>

                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="email" name="email">
                                    <?php if (isset($_SESSION['error']['email'])) { ?>
                                        <p class="text-danger"><?= $_SESSION['error']['email'] ?></p>
                                    <?php } ?>
                                </div>
                                <div class="mb-3">
                                    <label for="sdt" class="form-label">Số điện thoại</label>
                                    <input type="text" class="form-control" id="sdt" name="sdt">
                                    <?php if (isset($_SESSION['error']['sdt'])) { ?>
                                        <p class="text-danger"><?= $_SESSION['error']['sdt'] ?></p>
                                    <?php } ?>
                                </div>

                                <div class="mb-3">
                                    <label for="gioi_tinh" class="form-label">Giới tính</label>
                                    <label>
                                        <input type="radio" name="gioi_tinh" value="Nam"> Nam
                                    </label>
                                    <label>
                                        <input type="radio" name="gioi_tinh" value="Nữ"> Nữ
                                    </label>
                                    <?php if (isset($_SESSION['error']['gioi_tinh'])) { ?>
                                        <p class="text-danger"><?= $_SESSION['error']['gioi_tinh'] ?></p>
                                    <?php } ?>
                                </div>

                                <div class="mb-3">
                                    <label for="mat_khau" class="form-label">Mật khẩu</label>
                                    <input type="text" class="form-control" id="mat_khau" name="mat_khau">
                                    <?php if (isset($_SESSION['error']['mat_khau'])) { ?>
                                        <p class="text-danger"><?= $_SESSION['error']['mat_khau'] ?></p>
                                    <?php } ?>
                                </div>

                                <div class="single-input-item">
                                    <button class="btn btn-sqr">Đăng ký</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>