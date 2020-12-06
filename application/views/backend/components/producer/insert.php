<?php ob_start(); ?>
<div class="content-wrapper">
	<form action="/ShopMinh/producer/insert" enctype="multipart/form-data" method="POST" accept-charset="utf-8">
		<section class="content-header">
			<h1><i class="glyphicon glyphicon-text-background"></i> Thêm nhà cung cấp</h1>
			<div class="breadcrumb">
				<button type = "submit" name="submit" class="btn btn-primary btn-sm">
					<span class="glyphicon glyphicon-floppy-save"></span>
					Lưu[Thêm]
				</button>
				<a class="btn btn-primary btn-sm" href="/ShopMinh/producer/index" role="button">
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
							<div class="col-md-8">
								<div class="form-group">
									<label>Tên nhà cung cấp <span class = "maudo">(*)</span></label>
									<input required="" type="text" class="form-control" name="name" placeholder="Tên nhà cung cấp">
								</div>
								<div class="form-group">
									<label>Mã code <span class = "maudo">(*)</span></label>
									<input required="" type="text" class="form-control" name="code" placeholder="Mã code">
								</div>
								<div class="form-group">
									<label>Từ khóa <span class = "maudo">(*)</span></label>
									<input required="" type="text" class="form-control" name="keyword" placeholder="Từ khóa">
									<span style="font-style: italic; line-height: 32px;">Chú ý: Mỗi từ khóa phân cách bởi một dấu ",". Ví dụ: dienthoai, maytinhbang</span>
								</div>
								<div class="form-group">
									<label>Trạng thái</label>
									<select required="" name="status" class="form-control">
										<option value="1">Hoạt động</option>
										<option value="0">Ngừng hoạt động</option>
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