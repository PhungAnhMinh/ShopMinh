<?php ob_start(); ?>
<div class="content-wrapper">
    <form action="/ShopMinh/customer/detail" method="post" accept-charset="utf-8">
        <section class="content-header">
            <h1><i class="fa fa-user-plus"></i> Thông tin khách hàng</h1>
            <div class="breadcrumb">
                <a class="btn btn-primary btn-sm" href="/ShopMinh/customer/index" role="button">
                    <span class="glyphicon glyphicon-remove"></span> Thoát
                </a>
            </div>
        </section>    
        <section class="content">
          <!-- Info boxes -->
            <div class="row">
                <div class="col-md-12">
                                    <div class="box">
                        <div class="box-body">
                            <!--ND-->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Họ và tên <span class="maudo">(*)</span></label>
                                    <output type="text" name="fullname" class="form-control"><?php echo $data['row']['fullname']; ?></output>
                                </div>
                                <div class="form-group">
                                    <label>Điện thoại <span class="maudo">(*)</span></label>
                                    <output type="text" name="phone" class="form-control"><?php echo $data['row']['phone']; ?></output>
                                </div>
                                <div class="form-group">
                                    <label>Email <span class="maudo">(*)</span></label>
                                    <output type="email" name="email" class="form-control"><?php echo $data['row']['email']; ?></output>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Trạng thái</label>
                                    <select name="status" class="form-control" style="width:300px">
                                        <option value="1" <?php if($data['row']['status']==1){echo"selected";} ?> >Đang hoạt động</option>
                                        <option value="0" <?php if($data['row']['status']==0){echo"selected";} ?>>Ngừng hoạt động</option>
                                    </select>
                                </div>
                            </div>
                            <!--/.ND-->
                        </div>
                    </div><!-- /.box -->
                </div><!-- /.col -->
            </div><!-- /.row -->
        </section><!-- /.content -->
    </form>        
</div>
<?php 
  $content = ob_get_clean();
  include('./application/views/backend/layout.php');
?>