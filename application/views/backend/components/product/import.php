<?php ob_start(); ?>

<div class="content-wrapper">
	<form action="/ShopMinh/product/import/<?php echo $data['product']['id']; ?>" enctype="multipart/form-data" method="POST" accept-charset="utf-8">
		<section class="content-header">
			<h1><i class="glyphicon glyphicon-text-background"></i> Nhập hàng</h1>
			<div class="breadcrumb">
				<button type = "submit" name="submit" class="btn btn-primary btn-sm">
					<span class="glyphicon glyphicon-floppy-save"></span>
					Lưu[Cập nhật]
				</button>
				<a class="btn btn-primary btn-sm" href="/ShopMinh/product/index" role="button">
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
								<div class="form-group">
									<label>Tên sản phẩm </label>
									<input type="text" class="form-control" disabled name="name" style="width:100%" placeholder="Tên sản phẩm" value="<?php echo $data['product']['name']; ?>" >
								</div>
								<?php
									$row_cate = $this->model_cate->select_category_status(1);
									$option_parent_id="";
									foreach ($row_cate['category'] as $row) {
										if($row['id']==$data['product']['category_id']){
											$option_parent_id.="<option selected value='".$row['id']."'>".$row['name']."</option>";
										}else{
											$option_parent_id.="<option value='".$row['id']."' >".$row['name']."</option>";
										}
									}
								?>
								<div class="form-group">
									<label>Loại sản phẩm</label>
									<select name="catid" class="form-control" style="width:300px" disabled>
										<option value = "">[--Chọn loại sản phẩm--]</option>
										<?php echo $option_parent_id; ?>
											
									</select>
								</div>
								<div class="form-group">
									<div class="form-group">
									<label>Tổng số lượng đã nhập</label>
									<input type="number" class="form-control" name="number" placeholder="Số lượng" min="0" max="10000" value="<?php echo $data['product']['number']; ?>" disabled>
								</div>
								<div class="form-group">
									<div class="form-group">
									<label>Số lượng sản phẩm đã bán</label>
									<input type="number" class="form-control" name="number_buy" placeholder="Số lượng" min="0" max="10000" value="<?php echo $data['product']['number_buy']; ?>" disabled>
								</div>
								<div class="form-group">
									<div class="form-group">
									<label>Số lượng còn của cửa hàng</label>
									<input type="number" class="form-control" name="number" placeholder="Số lượng" min="0" max="10000" value="<?php echo $data['product']['number']-$data['product']['number_buy']; ?>" disabled>
								</div>
							
								<div class="form-group">
									<div class="form-group">
									<label>Nhập số lượng nhập thêm<span class = "maudo">(*)</span></label>
									<input type="number" class="form-control" name="number" style="width:100%" placeholder="Số lượng" min="0" max="10000">
								<?php if(isset($_COOKIE['error'])){ ?>
									<div class="error" id="password_error"><?php echo $_COOKIE['error'];?></div>
								<?php } ?>
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