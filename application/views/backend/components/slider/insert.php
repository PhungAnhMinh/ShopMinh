<?php ob_start(); ?>
<div class="content-wrapper" style="min-height: 454px;">
    <form action="/ShopMinh/slider/insert" enctype="multipart/form-data" method="post" accept-charset="utf-8">
        <section class="content-header">
            <h1><i class="glyphicon glyphicon-picture"></i> Thêm Sliders</h1>
            <div class="breadcrumb">
                <button name="submit" type="submit" class="btn btn-primary btn-sm">
                    <span class="glyphicon glyphicon-floppy-save"></span> Lưu[Thêm]
                </button>
                <a class="btn btn-primary btn-sm" href="/ShopMinh/slider/index" role="button">
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
                        <?php if(isset($_COOKIE['msg'])){ ?>
                                    <div class="alert alert-success">
                                        <?php echo $_COOKIE['msg']; ?>
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                                    </div>
                                <?php } ?>
                        <div class="col-md-9">
                            <!--ND-->
                            <div class="form-group">
                                <label>Tên sliders<span class = "maudo">(*)</span></label>
                                <input required type="text" name="name" placeholder="Tên sliders" class="form-control">
                                 
                            </div>
                            <!--/.ND-->
                        </div>
                        <div class="col-md-3">
                                
                            <div class="form-group">
                                <label>Hình ảnh <span class = "maudo">(*)</span></label>
                                <input type="file" name="img" class="form-control" required="">
                            </div>
                            <div class="form-group">
                                <label>Trạng thái </label>
                                <select required name="status" class="form-control">
                                    <option value="1">Hoạt động</option>
                                    <option value="0">Ngừng hoạt động</option>
                                </select>
                            </div>
                            </div>
                    </div>
                </div><!-- /.box -->
            </div><!-- /.row -->
        </section><!-- /.content -->
    </form>         
</div>

<?php 
  $content = ob_get_clean();
  include('./application/views/backend/layout.php');
?>