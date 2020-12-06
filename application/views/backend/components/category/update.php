<?php ob_start(); ?>

<div class="content-wrapper">
	<form action="/ShopMinh/category/update/<?php echo $data['category']['id']; ?>" enctype="multipart/form-data" method="POST" accept-charset="utf-8">
		<section class="content-header">
			<h1><i class="glyphicon glyphicon-cd"></i> Cập nhật loại sản phẩm</h1>
			<div class="breadcrumb">
				<button type = "submit" name="submit" class="btn btn-primary btn-sm">
					<span class="glyphicon glyphicon-floppy-save"></span>
					Lưu[Cập nhật]
				</button>
				<a class="btn btn-primary btn-sm" href="/ShopMinh/category/index" role="button">
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
							<div class="col-md-7">
								<?php

									$option_parent_id="";
									$option_orders="";
									foreach ($data['row'] as $row) {
										if($row['id']==$data['category']['parent_id']){
											$option_parent_id.="<option selected value='".$row['id']."'>".$row['name']."</option>";
										}else{
											$option_parent_id.="<option value='".$row['id']."' >".$row['name']."</option>";
										}
										if($row['orders']==($data['category']['orders']-1)){
											$option_orders.="<option selected value='".($row['orders']+1)."'>Sau - ".$row['name']."</option>";
										}
										$option_orders.="<option value='".($row['orders']+1)."'>Sau - ".$row['name']."</option>";
									}
								?>
								<div class="form-group">
									<label>Tên loại sản phẩm <span class = "maudo">(*)</span></label>
									<input type="text" class="form-control" name="name" style="width:300px;" placeholder="Tên loại sản phẩm" value="<?php echo $data['category']['name']; ?>">
								</div>
								<div class="form-group">
									<label>Chủ đề cha</label>
									<select name="parent_id" class="form-control" style="width:300px">
										<option value = "0">[--Chọn chủ đề cha--]</option>
										<?php echo $option_parent_id; ?>
									</select>
								</div>
								<div class="form-group">
									<label>Sắp xếp</label>
									<select name="orders" class="form-control" style="width:300px">
										<option value = "0">Đứng đầu</option>
											<?php echo $option_orders; ?>
									</select>
								</div>

							</div>
							<div class="col-md-5">
								<div class="form-group">
									<label>Trạng thái</label>
									<select name="status" class="form-control" style="width:300px">
										<option value = "">[--Chọn trạng thái--]</option>
										<option value="1" <?php if($data['category']['status'] ==1 ) {echo 'selected';} ?>  >Đang kinh doanh
										</option>
										<option value="0" <?php if($data['category']['status'] ==0 ) {echo 'selected';} ?> >Ngưng kinh doanh
										</option>
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