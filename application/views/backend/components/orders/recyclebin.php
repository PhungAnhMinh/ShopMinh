<?php ob_start(); ?>
<div class="content-wrapper">
	<section class="content-header">
		<h1><i class="glyphicon glyphicon-list-alt"></i> Thùng rác đơn hàng</h1>
		<div class="breadcrumb">
			<a class="btn btn-primary btn-sm" href="admin/orders" role="button">
				<span class="glyphicon glyphicon-remove do_nos"></span> Thoát
			</a>
		</div>
	</section>
	<section class="content">
		<div class="row">
			<div class="col-md-12">
				<div class="box" id="view">
					<div class="box-header with-border">
						
						<!-- /.box-header -->
						<div class="box-body">
							
								<div class="row">
									<div class="alert alert-success">
										
										<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
									</div>
								</div>
							
								<div class="row">
									<div class="alert alert-error">
										
										<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
									</div>
								</div>
							
							<div class="row" style='padding:0px; margin:0px;'>
								<!--ND-->
								<div class="table-responsive">
									<table class="table table-hover table-bordered" style="font-size: 0.9em;">
										<thead>
											<tr>
												<th class="text-center" style="width:20px">Code</th>
												<th>Khách hàng</th>
												<th>Điện thoại</th>
												<th>Tổng tiền</th>
												<th>Ngày tạo hóa đơn</th>
												<th style="text-align: center;">Chi tiết</th>
												<th class="text-center" colspan="2">Thao tác</th>
											</tr>
										</thead>
										<tbody>
											
												<tr>
													<td class="text-center">order code</td>
													<td>full name</td>
													<td>phone</td>
													<td>476547₫</td>
													<td>order code</td>
													<td style="text-align: center;">
														Đang chờ duyệt
															 <br>
															 dang giao hang
															<br>
															da giao
															<br>
															khach da huy
															<br>
															Nhan vien da huy
													</td>
													<td class="text-center">
														<a class="btn btn-info btn-xs" href="admin/orders/view/id" role = "button">
															<span class="glyphicon glyphicon-eye-open"></span> Xem 
														</a>
														<a class="btn btn-success btn-xs" href="admin/orders/restore/id" role = "button">
															<span class="glyphicon glyphicon-edit"></span>Khôi phục
														</a>
													</td>
												</tr>
											
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
	</div>
<?php 
  $content = ob_get_clean();
  include('./application/views/backend/layout.php');
?>