
<?php ob_start(); ?>
<div class="content-wrapper">
	<form action="/ShopMinh/category/insert" enctype="multipart/form-data" method="POST" accept-charset="utf-8">
		<section class="content-header">
			<h1><i class="glyphicon glyphicon-cd"></i> Thêm danh mục mới</h1>
			<div class="breadcrumb">
				<button type = "submit" name="submit" class="btn btn-primary btn-sm">
					<span class="glyphicon glyphicon-floppy-save"></span>
					Lưu[Thêm]
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
							<div class="form-group">
								<label>Tên danh mục <span class = "maudo">(*)</span></label>
								<input required="" type="text" class="form-control" name="name" style="width:50%" placeholder="Tên danh mục">
								<?php if(isset($_COOKIE['error_name'])){ ?>
									<div class="error" style="color: red" id="password_error"><?php echo $_COOKIE['error_name'];?></div>
								<?php } ?>
							</div>
							<?php
								$option_parent_id="";
								$option_orders="";
								foreach ($data['category'] as $row) {
									$option_parent_id.="<option value='".$row['id']."'>".$row['name']."</option>";
									$option_orders.="<option value='".($row['orders']+1)."'>Sau - ".$row['name']."</option>";
								}
							?>
							<div class="form-group">
								<label>Danh mục cha</label>
								<select name="parent_id" class="form-control" style="width:50%">
									<option value = "0">[--Chọn danh mục--]</option>
									danh muc
									<?php echo $option_parent_id; ?>
								</select>
							</div>
							<div class="form-group">
								<label>Sắp xếp</label>
								<select required="" name="orders" class="form-control" style="width:50%">
									<option value = "">[--Chọn vị trí--]</option>
									<option value="0">Đứng đầu</option>
									<?php echo $option_orders; ?>
								</select>
							</div>
							<div class="form-group">
								<label>Trạng thái</label>
								<select required="" name="status" class="form-control" style="width:50%">
									<option value = "">[--Chọn trạng thái--]</option>
									<option value="1">Đang kinh doanh</option>
									<option value="0">Ngưng kinh doanh</option>
								</select>
							</div>
						</div>
					</div><!-- /.box -->
				</div>
			</section>
		</form>
		<!-- /.content -->
</div><!-- /.content-wrapper -->
<?php 
  $content = ob_get_clean();
  include('./application/views/backend/layout.php');
?>