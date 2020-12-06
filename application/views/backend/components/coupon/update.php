<?php ob_start(); ?>
<div class="content-wrapper">
	<form action="/ShopMinh/coupon/update/<?php echo $data['row']['id']; ?>" enctype="multipart/form-data" method="POST" accept-charset="utf-8">
		<section class="content-header">
			<h1><i class="glyphicon glyphicon-text-background"></i> Cập nhật mã giảm giá</h1>
			<div class="breadcrumb">
				<button type = "submit" name="submit" class="btn btn-primary btn-sm">
					<span class="glyphicon glyphicon-floppy-save"></span>
					Lưu[Cập nhật]
				</button>
				<a class="btn btn-primary btn-sm" href="/ShopMinh/coupon/index" role="button">
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
							<div class="col-md-6">
								<div class="form-group">
									<label>Mã giảm giá</label>
									<input type="text" class="form-control" name="code" style="width:100%" placeholder="Mã giảm giá" value="<?php echo $data['row']['code']; ?>">
								<?php if(isset($_COOKIE['error_code'])){ ?>
									<div class="error" style="color: red" id="password_error"><?php echo $_COOKIE['error_code'];?></div>
								<?php } ?>
								</div>
								<div class="form-group">
									<label>Số tiền giảm giá</label>
									<input type="number" class="form-control" name="discount" style="width:100%" placeholder="Số tiền giảm giá" value="<?php echo $data['row']['discount']; ?>">
								</div>
								<div class="form-group">
									<label>Tổng số lần nhập</label>
									<input type="number" class="form-control" name="limit_number" style="width:100%" placeholder="Số lần giới hạn nhập" value="<?php echo $data['row']['limit_number']; ?>">
								</div>
								<div class="form-group">
									<label>Số lần đã nhập</label>
									<input type="number" class="form-control" name="number_used" style="width:100%" value="<?php echo $data['row']['number_used']; ?>" disabled>
								</div>
								<div class="form-group">
									
									<label>Số lần còn lại</label>
									<input type="text" class="form-control" style="width:100%" placeholder="Số lần giới hạn nhập" value="<?php echo $data['row']['discount']-$data['row']['number_used']; ?>" disabled>
								</div>
								
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>Số tiền đơn hàng tối thiểu được áp dụng</label>
									<input type="number" class="form-control" name="payment_limit" style="width:100%" placeholder="Số tiền đơn hàng tối thiểu được áp dụng" value="<?php echo $data['row']['payment_limit']; ?>">
								</div>
								<div class="form-group">
									<label>Ngày giới hạn nhập</label>
									<input type="text" class="form-control" name="expiration_date" style="width:100%" placeholder="Số lần giới hạn nhập" value="<?php echo $data['row']['expiration_date']; ?>">
								</div>
								<div class="form-group">
									<label>Mô tả ngắn</label>
									<textarea name="description" class="form-control" value=""><?php echo $data['row']['description']; ?></textarea>
								</div>
								<div class="form-group">
									<label>Trạng thái</label>
									<select name="status" class="form-control">
										<option value="1" <?php if($data['row']['status']==1){echo "selected";} ?> >Có hiệu lực</option>
										<option value="0" <?php if($data['row']['status']==0){echo "selected";} ?> >Hết hiệu lục</option>
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
	<!-- /.coupon -->
</div><!-- /.coupon-wrapper -->
<?php 
  $content = ob_get_clean();
  include('./application/views/backend/layout.php');
?>