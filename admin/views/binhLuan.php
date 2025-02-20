<section>
    <?php require_once './views/Home.php' ?>

    <div class="col mt-5 container">
        <div class="container row">
        <div class="col-12">
          <h2>Bình luận</h2>
          <div class="">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>STT</th>
                  <th>Người bình luận</th>
                  <th>Nội dung</th>
                  <th>Ngày bình luận</th>
                  <th>Trạng thái</th>
                  <th>Thao tác</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($listBinhLuan as $key => $binhLuan) : ?>
                  <tr>

                    <td><?= $key + 1 ?></td>
                    <td>
                    
                        <?= $binhLuan['ho_ten'] ?>
                      
                    </td>
                    <td><?= $binhLuan['noi_dung'] ?></td>
                    <td><?= $binhLuan['ngay_dang'] ?></td>
                    <td><?= $binhLuan['trang_thai'] == 1 ? 'Hiển thị' : 'Ẩn' ?></td>

                    <td>
                      <div class="btn-group">
                        <form action="<?= BASE_URL_ADMIN . '?act=update-trang-thai-binh-luan&id_binh_luan=' ?>" method="post">
                          <input type="hidden" name="id_binh_luan" value="<?= $binhLuan['id'] ?>">
                          <input type="hidden" name="name_view" value="detail_sanpham">
                          
                          <button onclick="return confirm('Bạn có muốn ẩn bình luận này ko?')" class="btn btn-warning">
                            <?= $binhLuan['trang_thai'] == 1 ? 'Ẩn' : 'Bỏ ẩn'?>
                          </button>

                        </form>
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
</section>