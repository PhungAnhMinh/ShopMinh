<?php ob_start(); ?>
<div class="content-wrapper">
	<form action="/ShopMinh/content/update/<?php echo $data['content']['id'];  ?>" enctype="multipart/form-data" method="POST" accept-charset="utf-8">
		<section class="content-header">
			
			<h1><i class="glyphicon glyphicon-text-background"></i> Cập nhật bài viết</h1>
			<div class="breadcrumb">
				<button type = "submit" name="submit" class="btn btn-primary btn-sm">
					<span class="glyphicon glyphicon-floppy-save"></span>
					Lưu[Cập nhật]
				</button>
				<a class="btn btn-primary btn-sm" href="/ShopMinh/content/index" role="button">
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
									<label>Tiêu đề bài viết</label>
									<input type="text" class="form-control" name="title" style="width:100%" placeholder="Tiêu đề bài viết" value="<?php echo $data['content']['title']; ?>">
									
									
								</div>
								<div class="form-group">
									<label>Mô tả ngắn</label>
									<textarea name="description" class="form-control" ><?php echo $data['content']['description']; ?></textarea>
								</div>
								<div class="form-group">
									<label>Chi tiết bài viết<span class = "maudo">(*)</span></label>
									<textarea name="fullcontent" id="fulltext" class="form-control"><?php echo $data['content']['fullcontent']; ?></textarea>
      								<script>CKEDITOR.replace('fulltext');</script>
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
                                    <label>Hình đại diện</label>
                                    <img class="img-responsive"  src="/ShopMinh/public/images/posts/<?php echo $data['content']['thumbnail']; ?>">
                					<input type="file" class="form-control" id="image_list" placeholder="" name="thumbnail" value="">
                                  
                                </div>
								<div class="form-group">
									<label>Trạng thái</label>
									<select name="status" class="form-control">
										<option value="1" <?php if($data['content']['status'] == 1) {echo 'selected';}?> >Đăng</option>
										<option value="0" <?php if($data['content']['status'] == 0) {echo 'selected';}?>>Chưa đăng</option>
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