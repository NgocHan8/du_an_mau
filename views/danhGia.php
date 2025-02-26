<?php require_once 'layout/Header.php'; ?>
<style>
    .container {
        max-width: 800px;
        margin: 0 auto;
        padding: 20px;
    }

    h2.page-title {
        text-align: center;
        font-size: 24px;
        font-weight: bold;
        margin-bottom: 20px;
    }

    .card-title {
        font-size: 18px;
        font-weight: bold;
        margin-bottom: 5px;
    }

    .card-text {
        font-size: 14px;
        color: #555;
    }


.row {
    display: flex;
    align-items: center;
    gap: 15px; /* Khoảng cách giữa ảnh và chữ */
}

.product-image {
    width: 80px; /* Điều chỉnh kích thước ảnh */
    height: auto;
    border-radius: 5px;
    display: block;
}


    form textarea {
        width: 100%;
        padding: 10px;
        border: 1px solid #ddd;
        border-radius: 5px;
        resize: none;
    }

    form input[type="file"] {
        border: none;
    }

    button.btn-primary {
        background-color: #007bff;
        color: white;
        padding: 10px 15px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        display: block;
        width: 100%;
    }

    button.btn-primary:hover {
        background-color: #0056b3;
    }
</style>
<div class="container mt-3">
    <h2 class="page-title">Đánh giá sản phẩm</h2>

    <!-- Duyệt qua từng sản phẩm trong đơn hàng -->
    <?php foreach ($san_pham_list as $san_pham) : ?>
        <div class="card mb-3 p-3">
            <div class="row align-items-center">
                <div class="col-auto">
                    <img src="<?= BASE_URL . $san_pham['img'] ?>" class="product-image" alt="Sản phẩm">
                </div>
                <div class="col">
                    <h5 class="card-title"><?= $san_pham['ten_san_pham'] ?></h5>
                </div>
            </div>
        </div>


        <!-- Form đánh giá từng sản phẩm -->
        <form action="<?= BASE_URL ?>?act=post-danh-gia" method="POST" enctype="multipart/form-data" class="mb-3">
            <input type="hidden" name="san_pham_id" value="<?= $san_pham['id'] ?>">

            <div class="mb-3">
                <label class="form-label">Nội dung đánh giá:</label>
                <textarea name="noi_dung" class="form-control" rows="4" required></textarea>
            </div>

            <div class="mb-3">
                <label class="form-label">Hình ảnh đánh giá (nếu có):</label>
                <input type="file" name="img" class="form-control">
            </div>

            <button type="submit" class="btn btn-primary">Gửi đánh giá</button>
        </form>
        <hr>
    <?php endforeach; ?>
</div>

<?php require_once 'layout/Footer.php'; ?>