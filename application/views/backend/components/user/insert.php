<?php ob_start(); ?>
<div class="content-wrapper">
    <form action="/ShopMinh/user/insert" enctype="multipart/form-data" method="POST" accept-charset="utf-8">
        <section class="content-header">
            <h1><i class="fa fa-user-plus"></i> Thêm thành viên</h1>
            <div class="breadcrumb">
                <button type = "submit" name="submit" class="btn btn-primary btn-sm">
                    <span class="glyphicon glyphicon-floppy-save"></span>
                    Lưu[Thêm]
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
                                    <input required  type="text" class="form-control" name="fullname" >
                                </div>
                                <div class="form-group">
                                    <label>Email <span class = "maudo">(*)</span></label>
                                    <input required  type="email" class="form-control" name="email" >
                                <?php if(isset($_COOKIE['error_email'])){ ?>
                                    <div class="error" style="color: red" id="password_error"><?php echo $_COOKIE['error_email'];?>
                                    </div>
                                <?php } ?>
                                </div>
                                <div class="form-group">
                                    <label>Tên đăng nhập <span class = "maudo">(*)</span></label>
                                    <input required  type="text" class="form-control" name="username" >
                                <?php if(isset($_COOKIE['error_username'])){ ?>
                                    <div class="error" style="color: red" id="password_error"><?php echo $_COOKIE['error_username'];?>
                                    </div>
                                <?php } ?>
                                </div>
                                <div class="form-group">
                                    <label>Mật khẩu <span class = "maudo">(*)</span></label>
                                    <input required  type="password" class="form-control" name="password" >
                                    
                                </div>
                                <div class="form-group">
                                    <label>Nhập lại mật khẩu <span class = "maudo">(*)</span></label>
                                    <input required  type="password" class="form-control" name="repassword" >
                                <?php if(isset($_COOKIE['error_pass'])){ ?>
                                    <div class="error" style="color: red" id="password_error"><?php echo $_COOKIE['error_pass'];?>
                                    </div>
                                <?php } ?>
                                </div>
                                <div class="form-group">
                                    <label>Số điện thoại <span class = "maudo">(*)</span></label>
                                    <input required  type="number" class="form-control" name="phone" >
                                    
                                </div>
                                <div class="form-group">
                                    <label>Địa chỉ <span class = "maudo">(*)</span></label>
                                    <input  required type="text" class="form-control" name="address" >
                                    
                                </div>
                                
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Giới tính</label>
                                    <select name="gender" class="form-control">
                                        <option value="1">Nam</option>
                                        <option value="0">Nữ</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    
                                    <label>Quyền<span class = "maudo">(*)</span></label>
                                    <select required name="role" class="form-control">
                                        <option value = "">[--Chọn danh mục--]</option>
                                        <?php  
                                        foreach ($data['user'] as $row) {
                                            echo "<option value='".$row['id_gr']."'>".$row['name_gr']."</option>";
                                    }?>
                                         
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Ảnh đại diện</label>
                                    <input  required type="file"  id="image_list" name="thumbnail">
                                </div>
                                <div class="form-group">
                                    <label>Trạng thái</label>
                                    <select required  name="status" class="form-control">
                                        <option value = "1">Kích hoạt</option>
                                        <option value = "0">Chưa kích hoạt</option>
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