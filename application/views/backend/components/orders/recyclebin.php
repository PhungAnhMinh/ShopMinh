<?php ob_start(); ?>
<div class="content-wrapper">
	<section class="content-header">
		<h1><i class="glyphicon glyphicon-list-alt"></i> Thùng rác đơn hàng</h1>
		<div class="breadcrumb">
			<a class="btn btn-primary btn-sm" href="/ShopMinh/orders/index" role="button">
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
									<?php if(isset($_COOKIE['msg'])){ ?>
									<div class="alert alert-success">
										<?php echo $_COOKIE['msg']; ?>
										<button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
									</div>
								<?php } ?>
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
											<?php foreach ($data['orders'] as $row) {?>
												<tr>
													<td class="text-center"><?php echo $row['orderCode']; ?></td>
													<td><?php echo $row['fullname']; ?></td>
													<td><?php echo $row['phone']; ?></td>
													<td><?php echo $row['money']; ?></td>
													<td><?php echo $row['orderDate']; ?></td>
													<td style="text-align: center;">
														<?php  
															switch ($row['status']) {
																case '0':
																	echo "Đang chờ duyệt";
																	break;
																case '1':
																	echo "Đang giao hàng";
																	break;
																case '2':
																	echo "Đã giao";
																	break;
																case '3':
																	echo "Khách đã hủy";
																	break;
																case '4':
																	echo "Nhân viên đã hủy";
																	break;
															}
														?>
													</td>
													<td class="text-center">
														<a class="btn btn-info btn-xs" href="/ShopMinh/orders/view/<?php echo $row['id']; ?>" role = "button">
															<span class="glyphicon glyphicon-eye-open"></span> Xem 
														</a>
														<a class="btn btn-success btn-xs" href="/ShopMinh/orders/restore/<?php echo $row['id']; ?>" role = "button">
															<span class="glyphicon glyphicon-edit"></span>Khôi phục
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
											<?php echo $data['phantrang']; ?>
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