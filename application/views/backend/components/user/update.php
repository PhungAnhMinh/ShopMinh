<?php ob_start(); ?>
<div class="content-wrapper">
    <form action="/ShopMinh/user/update/<?php echo $data['row']['id']; ?>" enctype="multipart/form-data" method="POST" accept-charset="utf-8">
        <section class="content-header">
            <h1><i class="fa fa-user-plus"></i> Sửa thành viên</h1>
            <div class="breadcrumb">
                <button type = "submit" name="submit" class="btn btn-primary btn-sm">
                    <span class="glyphicon glyphicon-floppy-save"></span>
                    Lưu[Sửa]
                </button>
                <a class="btn btn-primary btn-sm" href="/ShopMinh/user/index" role="button">
                    <span class="glyphicon glyphicon-remove do_nos"></span> Thoát
                </a>
            </div>
        </section>
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="box" id="view">
                        <div class="box-body">
                             <?php if(isset($_COOKIE['msg'])){ ?>
                                    <div class="alert alert-success">
                                        <?php echo $_COOKIE['msg']; ?>
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                                    </div>
                                <?php } ?>
                            <div class="col-md-9">
                                <div class="form-group">
                                    <label>Họ và tên <span class = "maudo">(*)</span></label>
                                    <input type="text" class="form-control" name="fullname" value="<?php echo $data['row']['fullname']; ?>" >
                                </div>
                                <div class="form-group">
                                    <label>Email <span class = "maudo">(*)</span></label>
                                    <input type="email" class="form-control" name="email" value="<?php echo $data['row']['email']; ?>" disabled>
                                </div>
                                <div class="form-group">
                                    <label>Tên đăng nhập <span class = "maudo">(*)</span></label>
                                    <input type="text" class="form-control" name="username" value="<?php echo $data['row']['username']; ?>" disabled>
                                </div>
                                <div class="form-group">
                                    <label>Mật khẩu mới <span class = "maudo">(*)</span></label>
                                    <input type="password"  class="form-control" name="password">
                                </div>
                                <div class="form-group">
                                    <label>Nhập lại mật khẩu <span class = "maudo">(*)</span></label>
                                    <input type="password" class="form-control" name="repassword">
                                    <?php if(isset($_COOKIE['error_pass'])){ ?>
                                    <div class="error" style="color: red" id="password_error"><?php echo $_COOKIE['error_pass'];?></div>
                                <?php } ?>
                                </div>
                                <div class="form-group">
                                    <label>Điện thoại <span class = "maudo">(*)</span></label>
                                    <input type="text" class="form-control" name="phone" value="<?php echo $data['row']['phone']; ?>" >

                                </div>
                                <div class="form-group">
                                    <label>Địa chỉ <span class = "maudo">(*)</span></label>
                                    <input type="text" class="form-control" name="address" value="<?php echo $data['row']['address']; ?>" >
                                </div>
                                
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Giới tính</label>
                                    <select name="gender" class="form-control">
                                        <option value="1" <?php if($data['row']['gender']==1){echo"selected";}?>  >Nam</option>
                                        <option value="0" <?php if($data['row']['gender']==0){echo"selected";}?>>Nữ</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Ảnh đại diện</label>
                                    <img class="img-responsive"  src="/ShopMinh/public/images/admin/<?php echo $data['row']['thumbnail']; ?>">
                                    <input type="file"  id="image_list" name="thumbnail" style="width: 100%">
                                </div>
                                <div class="form-group">
                                    <label>Trạng thái</label>
                                    <select name="status" class="form-control">
                                        <option value="1" <?php if($data['row']['status']==1){echo"selected";} ?>  >Kích hoạt</option>
                                        <option value="0" <?php if($data['row']['status']==0){echo"selected";} ?>>Chưa kích hoạt</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div><!-- /.box -->
                </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </section>
    </form>
<!-- /.content -->
</div><!-- /.content-wrapper -->
<?php 
  $content = ob_get_clean();
  include('./application/views/backend/layout.php');
?>