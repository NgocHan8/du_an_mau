<section>
    <?php
    require_once './views/Home.php';
    ?>
    <div class="col mt-5">
        <div class="container">
            <h1>Danh sách sản phẩm</h1>
            <a href="<?= BASE_URL_ADMIN . '?act=form-them-san-pham' ?>"><button class="btn btn-success">Thêm sản phẩm</button></a>
            <?php
            if (isset($_SESSION['message'])): ?>
                <div class="alert alert-success">
                    <?= $_SESSION['message'] ?> Xóa thành công
                </div>
                <?php unset($_SESSION['message']); ?>
            <?php endif ?>
            <table class=" table table-bordered border-secondary-subtle table-hover mt-3">
                <thead>
                    <th>ID</th>
                    <th>NAME</th>
                    <th>PRICE</th>
                    <th>IMAGE</th>
                    <th>QUANTITY</th>
                    <th>DANH MỤC</th>
                    <th>THAO TÁC</th>
                </thead>
                <tbody class="table-group-divider">
                    <?php if (!empty($listSanPham)): ?>
                        <?php foreach ($listSanPham as $key => $sanPham) : ?>
                            <tr>
                                <td><?= $key + 1 ?></td>
                                <td><?= $sanPham['ten_san_pham'] ?></td>
                                <td><?= $sanPham['price'] ?></td>
                                <td>
                                    <img src="<?= BASE_URL . $sanPham['img'] ?>" alt="" width="100px"
                                        onerror="this.onerror = null; this.src='../assets/uploads/dc1.jpeg'">
                                    </td>
                                <td><?= $sanPham['quantity'] ?></td>
                                <td><?= $sanPham['ten_danh_muc'] ?></td>
                                <td>
                                    <a href="<?= BASE_URL_ADMIN . '?act=xem-san-pham&id_san_pham=' . $sanPham['id'] ?>">
                                        <button class="btn btn-success">Xem</button></a>
                                        <a href="<?= BASE_URL_ADMIN . '?act=form-sua-san-pham&id_san_pham=' . $sanPham['id'] ?>">
                                        <button class="btn btn-warning">Sửa</button></a>
                                    <a href="<?= BASE_URL_ADMIN . '?act=xoa-san-pham&id_san_pham=' . $sanPham['id'] ?>" onclick=" return confirm('Bạn chắc chắn muốn xóa danh mục sản phẩm')">
                                        <button class="btn btn-danger">Xóa</button></a>

                                </td>
                            </tr>
                        <?php endforeach ?>
                    <?php endif ?>
                </tbody>
            </table>
        </div>
    </div>
</section>