<div class="container">

<div class="row">
        

        <h3>Đổi mật khẩu</h3>
        <!-- <?php if(isset($_SESSION['success'])){?>
            <div class="alert alert-info alert-dismissable">
            <a href="panel-close close" data-dismiss="alert"></a>
            <i class="fa fa-coffee"></i>
           <?= $_SESSION['success']; ?>
            </div>
       <?php }?> -->
        <form action="<?= BASE_URL_ADMIN . '?act=sua-mat-khau-ca-nhan-quan-tri' ?>" method="post">
            <div class="form-group">
                <label class="col-md-3 control-label">Họ tên</label>
                <div class="col-md-12">
                    <input class="form-control" type="text" name="old_pass" value="">
                    <?php if(isset($_SESSION['error']['old_pass'])){?>
                        <p class="text-danger"><?= $_SESSION['error']['old_pass']?></p>
                    <?php }?>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-3 control-label">Email</label>
                <div class="col-md-12">
                    <input class="form-control" type="text" name="new_pass" value="">
                    <?php if(isset($_SESSION['error']['new_pass'])){?>
                        <p class="text-danger"><?= $_SESSION['error']['new_pass']?></p>
                    <?php }?>
                </div>
            </div>
            
            <div class="form-group">
                <label class="col-md-3 control-label"></label>
                <div class="col-md-12">
                    <input type="submit" class="btn btn-primary" value="Submit">

                </div>
            </div>
        </form>
    </div>
</div>
</div>