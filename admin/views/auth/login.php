<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bán Trang Sức - Đăng Nhập</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .login-container {
            min-height: 100vh;
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            padding: 20px;
        }
        
        .login-card {
            max-width: 450px;
            margin: 40px auto;
            border-radius: 15px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            background: white;
        }
        
        .login-header {
            background:#B2E6F0;
            padding: 20px;
            border-radius: 15px 15px 0 0;
            margin-bottom: 30px;
        }
        
        .login-header a {
            color: white;
            text-decoration: none;
            font-size: 24px;
            font-weight: bold;
        }
        
        .login-body {
            padding: 20px 40px 40px;
        }
        
        .form-control {
            padding: 12px;
            border-radius: 8px;
            border: 1px solid #dee2e6;
            margin-bottom: 15px;
        }
        
        .form-control:focus {
            box-shadow: 0 0 0 0.2rem rgba(78, 115, 223, 0.25);
            border-color:#B2E6F0;
        }
        
        .btn-primary {
            background-color:#B2E6F0;
            border: none;
            padding: 12px;
            border-radius: 8px;
            width: 100%;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
        }
        
        .btn-primary:hover {
            background-color: #2e59d9;
            transform: translateY(-1px);
            transition: all 0.3s;
        }
        
        .login-box-msg {
            text-align: center;
            margin-bottom: 25px;
            color: #6c757d;
        }
        
        .text-danger {
            text-align: center;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="login-card">
            <div class="login-header text-center">
                <a href="#" class="h1">Blue Peach</a>
            </div>
            <div class="login-body">
                <?php if (!empty($_SESSION['error'])) { ?>
                    <p class="text-danger"><?= $_SESSION['error'] ?></p>
                <?php } else { ?>
                    <p class="login-box-msg">Vui lòng đăng nhập</p>
                <?php } ?>
                
                <form action="<?= BASE_URL_ADMIN . '?act=check-login-admin' ?>" method="post">
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="text" class="form-control" id="email" name="email">
                    </div>
                    
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="mat_khau">
                    </div>
                    
                    <div class="mt-4">
                        <button type="submit" class="btn btn-primary">Đăng nhập</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>