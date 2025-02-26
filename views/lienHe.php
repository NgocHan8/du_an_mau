<?php require_once 'layout/Header.php'; ?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi Tiết Sản Phẩm</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/client/style.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700&display=swap" rel="stylesheet">
</head>


<div class="bg-white py-2 border-bottom">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 small">
                <li class="breadcrumb-item"><a href="<?= BASE_URL ?>" class="text-decoration-none text-muted">Trang Chủ</a></li>
                <li class="breadcrumb-item"><a href="<?= BASE_URL . '?act=lien-he' ?>" class="text-decoration-none text-muted">Liên hệ</a></li>
            </ol>
        </nav>
    </div>
</div>
<div class="container mt-3">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3724.473194320336!2d105.8242838749155!3d21.01374418063189!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ab7f19defbc5%3A0x58a64cc44e21fd19!2zMTggUC4gVMOieSBTxqFuLCBRdWFuZyBUcnVuZywgxJDhu5FuZyDEkGEsIEjDoCBO4buZaSAxMDAwMCwgVmnhu4d0IE5hbQ!5e0!3m2!1svi!2s!4v1740151592749!5m2!1svi!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    <hr>
        <div class="row">
        <div class="col-md-6">
            <div class="contactDetail">
                <h1 class="titleContact">Thông tin liên hệ</h1>
                <ul>
                    <li>
                        <div id="input_line_0" ><span id="input_part_0" style="white-space:pre-wrap;">Visit us: </span></div>

                        <div id="input_line_1" ><span style="white-space:pre-wrap;">STORE 1: 20 Tây Sơn, Đống Đa </span></div>

                        <div id="input_line_2" ><span style="white-space:pre-wrap;">STORE 2: 47A Xuân Thủy, Cầu Giấy (Đối diện nhà sách Tiến Thọ) </span></div>
                    </li>
                    <li>
                        <div><span style="white-space:pre-wrap;">Online store:</span></div>

                        <div><span style="white-space:pre-wrap;">SHOPEE MALL: https://shp.ee/fipjqxm</span></div>

                        <div><span style="white-space:pre-wrap;">IG: Instagram.com/bluepeach.silver</span><br>
                            &nbsp;</div>
                    </li>
                    <li>
                        <div >Điện thoại:&nbsp;0975.696.925</div>
                    </li>
                </ul>
            </div>
        </div>
        <div class="col-md-6">
            <div class="formContact" style="margin: 0px auto;">
                <h1 class="titleContact">Liên hệ với chúng tôi </h1>
                <form id="fContact" action="" method="post">
                    <label class="form-group col-12">
                        <span>Họ và tên</span>
                        <input type="text" class="form-control" name="name" value="">
                    </label>
                    <label class="form-group col-12">
                        <span>Email</span>
                        <input type="text" class="form-control" name="email" value="">
                    </label>
                    <label class="form-group col-12">
                        <span>Điện thoại</span>
                        <input type="text" class="form-control" name="mobile" value="">
                    </label>
                    <label class="form-group col-12">
                        <span>Địa chỉ</span>
                        <input type="text" class="form-control" name="address" value="">
                    </label>
                    <label class="form-group col-12">
                        <span>Nội dung liên hệ</span>
                        <textarea name="content" class="form-control"></textarea>
                    </label>
                    <label class="form-group col-12" style="text-align: right">
                        <button type="submit" class="btn btn-primary">Gửi</button>
                    </label>
                </form>
            </div>
        </div>
    </div>

</div>
<?php require_once 'layout/Footer.php' ?>