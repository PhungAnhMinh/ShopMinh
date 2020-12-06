<?php ob_start(); ?>
<div class="content-wrapper" style="min-height: 454px;">
    <form action="/ShopMinh/slider/update/<?php echo $data['row']['id']; ?>" enctype="multipart/form-data" method="post" accept-charset="utf-8">
        <section class="content-header">
            <h1><i class="glyphicon glyphicon-picture"></i> Sửa Sliders</h1>
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
                           <div class="col-md-9">
                                <!--ND-->
                            <div class="form-group">
                                <label>Tên sliders<span class = "maudo">(*)</span></label>
                                <input type="text" name="name" placeholder="Tên sliders" class="form-control" value="<?php echo $data['row']['name']; ?>">
                                
                            </div>
                            <div class="form-group">
                                <label>Liên kết <span class = "maudo">(*)</span></label>
                                <input  type="text" name="link" class="form-control" placeholder="http://link.com" value="<?php echo $data['row']['link']; ?>">
                            </div>

                            <!--/.ND-->
                           </div>
                           <div class="col-md-3">
                               <div class="form-group">
                                <label>Hình ảnh <span class = "maudo">(*)</span></label>
                                <img class="img-responsive"  src="/ShopMinh/public/images/banners/<?php echo $data['row']['img']; ?>">
                                <input type="file" name="img" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Trạng thái</label>
                                <select name="status" class="form-control">
                                    <option value="1" <?php if($data['row']['status']==1){echo "selected";} ?> >Hoạt động</option>
                                    <option value="0" <?php if($data['row']['status']==0){echo "selected";} ?>>Ngừng hoạt động</option>
                                </select>
                            </div>
                           </div>
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