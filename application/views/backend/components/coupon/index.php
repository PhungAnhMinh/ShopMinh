<?php ob_start(); ?>
<div class="content-wrapper">
	<section class="content-header">
		<h1><i class="glyphicon glyphicon-text-background"></i> Danh sách mã giảm giá</h1>
		<div class="breadcrumb">
			
			<a class="btn btn-primary btn-sm" href="/ShopMinh/coupon/insert" role="button">
				<span class="glyphicon glyphicon-plus"></span> Thêm mới
			</a>
			<a class="btn btn-primary btn-sm" href="/ShopMinh/coupon/recyclebin" role="button">
				<span class="glyphicon glyphicon-trash"></span> Thùng rác(<?php echo $data['num']; ?>)
			</a>
		</div>
	</section>
	<!-- Main coupon -->
	<section class="content">
		<div class="row">
			<div class="col-md-12">
				<div class="box" id="view">
					<div class="box-header with-border">
					<!-- /.box-header -->
						<?php if(isset($_COOKIE['msg'])){ ?>
								<div class="alert alert-success">
									<?php echo $_COOKIE['msg']; ?>
									<button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
								</div>
							<?php } ?>
					<div class="box-body">
						<div class="row" style='padding:0px; margin:0px;'>
							<!--ND-->
							<div class="table-responsive">
								<table class="table table-hover table-bordered">
									<thead>
										<tr>
											<th class="text-center">ID</th>
											<th class="text-center">Mã giảm giá</th>
											<th class="text-center">Số tiền giảm</th>
											<th class="text-center">Số tiền đơn hàng áp dụng tối thiểu</th>
											<th class="text-center">Số lần giới hạn nhập</th>
											<th class="text-center">Hạn nhập</th>
											<th class="text-center">Trạng thái</th>
											<th class="text-center" colspan="2">Thao tác</th>
										</tr>
									</thead>
									<tbody>
									<?php foreach ($data['coupon'] as $row) {?>
										<tr>
											<td class="text-center"><?php echo $row['id']; ?></td>
											<td><?php echo $row['code']; ?></td>
											<td><?php echo $row['discount']; ?></td>
											<td><?php echo $row['payment_limit']; ?></td>
											<td><?php echo $row['limit_number']; ?></td>
											<td><?php echo $row['expiration_date']; ?></td>
											<td class="text-center">
												<a href="/ShopMinh/coupon/index/<?php echo $row['id']; ?>">
													<?php if($row['status']==1){ ?>
														<span class="glyphicon glyphicon-ok-circle mauxanh18"></span>
													<?php }else{ ?>
														<span class="glyphicon glyphicon-remove-circle maudo"></span>
													<?php } ?>
												</a>
											</td>
											<td class="text-center">
												<a class="btn btn-success btn-xs" href="/ShopMinh/coupon/update/<?php echo $row['id']; ?>" role = "button">
													<span class="glyphicon glyphicon-edit"></span>Sửa
												</a>
											</td>
											<td class="text-center">
												<a class="btn btn-danger btn-xs" href="/ShopMinh/coupon/trash/<?php echo $row['id']; ?>"  onclick="return confirm('Xác nhận Xóa Mã giảm giá này ?')" role = "button">
													<span class="glyphicon glyphicon-trash"></span>Xóa
												</a>
											</td>
										</tr>
									<?php } ?>
									</tbody>
								</table>
							</div>
							<div class="row">
								<div class="col-md-12 text-center">
									<ul class="pagination">
										phan trang
									</ul>
								</div>
							</div>
							<!-- /.ND -->
						</div>
					</div><!-- ./box-body -->
				</div><!-- /.box -->
		</div>
		<!-- /.col -->
	  </div>
	  <!-- /.row -->
	</section>
<!-- /.coupon -->
</div><!-- /.coupon-wrapper -->
<?php 
  $content = ob_get_clean();
  include('./application/views/backend/layout.php');
?>