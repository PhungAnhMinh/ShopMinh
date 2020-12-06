<?php ob_start(); ?>
<div class="content-wrapper">
	<form action="/ShopMinh/producer/update/<?php echo $data['row']['id']; ?>" enctype="multipart/form-data" method="POST" accept-charset="utf-8">
		<section class="content-header">
			<h1><i class="glyphicon glyphicon-text-background"></i> Cập nhật nhà cung cấp</h1>
			<div class="breadcrumb">
				<button type = "submit" name="submit" class="btn btn-primary btn-sm">
					<span class="glyphicon glyphicon-floppy-save"></span>
					Lưu[Cập nhật]
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
							<div class="col-md-9">
							
								<div class="box-body">
									<div class="col-md-9">
										<div class="form-group">
											<label>Tên nhà cung cấp</label>
											<input type="text" class="form-control" name="name" placeholder="Tên nhà cung cấp" value="<?php echo $data['row']['name']; ?>">
										</div>
										<div class="form-group">
											<label>Mã code <span class = "maudo">(*)</span></label>
											<input type="text" class="form-control" name="code" placeholder="Mã code" disabled value="<?php echo $data['row']['code']; ?>">
										</div>
										<div class="form-group">
											<label>Từ khóa <span class = "maudo">(*)</span></label>
											<input type="text" class="form-control" name="keyword" placeholder="Từ khóa" value="<?php echo $data['row']['keyword']; ?>">
											<span style="font-style: italic; line-height: 32px;">Chú ý: Mỗi từ khóa phân cách bởi một dấu ",". Ví dụ: dienthoai, laptop</span>
										</div>
										<div class="form-group">
											<label>Trạng thái</label>
											<select name="status" class="form-control">
												<option value="1" <?php if($data['row']['status']==1){echo 'selected';} ?> >Đang hoạt động</option>
												<option value="0" <?php if($data['row']['status']==0){echo 'selected';} ?> >Ngừng họat động</option>
											</select>
										</div>
									</div>
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