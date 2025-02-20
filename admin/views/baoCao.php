<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.rtl.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/admin/style.css">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .sidebar {
            height: 100vh;
            background-color: #343a40;
            color: white;
            padding: 20px;
        }

        .sidebar a {
            color: white;
            text-decoration: none;
        }

        .sidebar a:hover {
            color: #f8f9fa;
        }

        .main-content {
            padding: 20px;
        }

        .card {
            margin-bottom: 20px;
        }

        .card-header {
            background-color: #007bff;
            color: white;
        }

        .table-responsive {
            margin-top: 20px;
        }
    </style>
</head>

<body>
<section>
    <?php
    require_once './views/Home.php';
    ?>
    <div class="col mt-5">
            <!-- Main Content -->
            <div class="col-10 main-content">
                <h1 class="mb-4">Báo Cáo Doanh Thu & Đơn Hàng</h1>

                <!-- Thống kê doanh thu -->
                <div class="row">
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header">
                                Doanh Thu Hôm Nay
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">10,000,000 VNĐ</h5>
                                <p class="card-text">Tăng 5% so với hôm qua</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header">
                                Tổng Đơn Hàng
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">50 đơn</h5>
                                <p class="card-text">Đã hoàn thành: 45 đơn</p>
                            </div>
                        </div>
                    </div>
                    
                                    <!-- Bảng đơn hàng gần đây -->
                <div class="card">
                    <div class="card-header">
                        Đơn Hàng Gần Đây
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Mã Đơn Hàng</th>
                                        <th>Ngày Đặt</th>
                                        <th>Khách Hàng</th>
                                        <th>Tổng Tiền</th>
                                        <th>Trạng Thái</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php if (!empty($listDonHang)): ?>
                                    <?php foreach($listDonHang as $donHang): ?>
                                        <tr>
                                        <td><?= $donHang['ma_don_hang'] ?></td>
                                        <td><?= $donHang['ngay_dat'] ?></td>
                                        <td><?= $donHang['ten_nguoi_nhan'] ?></td>
                                        <td><?= $donHang['tong_tien'] ?></td>
                                        <td><?= $donHang['ten_trang_thai'] ?></td>
                                        </tr>
                                    <?php endforeach ;
                                    
                                    endif?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                </div>



                <!-- Biểu đồ doanh thu -->
                <div class="card">
                    <div class="card-header">
                        Biểu Đồ Doanh Thu
                    </div>
                    <div class="card-body">
                        <canvas id="revenueChart" width="400" height="200"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // Biểu đồ doanh thu
        const ctx = document.getElementById('revenueChart').getContext('2d');
        const revenueChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['Tháng 1', 'Tháng 2', 'Tháng 3', 'Tháng 4', 'Tháng 5', 'Tháng 6'],
                datasets: [{
                    label: 'Doanh Thu',
                    data: [12000000, 15000000, 18000000, 14000000, 20000000, 22000000],
                    backgroundColor: 'rgba(0, 123, 255, 0.2)',
                    borderColor: 'rgba(0, 123, 255, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
</section>
</body>
</html>
