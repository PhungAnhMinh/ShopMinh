<?php ob_start(); ?>
<div class="content-wrapper" style="min-height: 564px;">
	<section class="content-header">
		<h1><i class="glyphicon glyphicon-shopping-cart"></i> Chi tiết đơn hàng</h1>
		<div class="breadcrumb">
			<a class="btn btn-primary btn-sm" href="/ShopMinh/orders/index" role="button">
				<span class="glyphicon glyphicon-trash"></span> Thoát
			</a>
		</div>
	</section>
	<section class="content">
		<!-- Info boxes -->
		<div class="row">
			<div class="col-md-12">
				<div class="box">
					<div class="box-body">
						<!--ND-->
						<div id="view">
							<form action="/ShopMinh/orders/detail/<?php echo $data['row']['id']; ?>" enctype="multipart/form-data" method="post" accept-charset="utf-8">
								
								<h1 class="text-center" style="color: red;">CHI TIẾT ĐƠN HÀNG</h1>
								<h4>Tên khách hàng: <b><?php echo $data['row']['fullname']; ?></b></h4>
								<h4>Điện thoại: <i><?php echo $data['row']['phone']; ?></i></h4>
								<h4>Thời gian đặt hàng: <i><?php echo $data['row']['orderDate']; ?></i></h4>
								<h4>Địa chỉ: <i><?php echo $data['row']['address']; ?></i></h4>
								<h4>Mã đơn hàng: <b><?php echo $data['row']['orderCode']; ?></b></h4>
								<br />
								<div class="table-responsive">
									<table class="table table-hover table-bordered">
										<thead>
											<tr>
												<th class="text-center">STT</th>
												<th>Tên sản phẩm</th>
												<th class="text-center" style="width:100px">Số lượng</th>
												<th style="width:120px">Giá bán</th>
												<th class="text-right" style="width:120px">Thành tiền</th>
											</tr>
										</thead>
										<tbody>
											<?php $stt =0; ?>
											<?php foreach ($data['order'] as $row) {?>
												<tr>
													<td class="text-center"><?php echo $stt +=1; ?></td>
													<td><?php echo $row['name']; ?></td>
													<td class="text-center"><?php echo $row['count']; ?></td>
													<td><?php echo $row['price']; ?> ₫</td>
													<td class="text-right">
														<?php echo $row['count'] * $row['price']; ?>₫
													</td>
												</tr>
											<?php } ?>
											<tr>
												<td colspan="6" class="text-right" style="border: none; font-size: 1.1em;">Tổng cộng: <?php echo $data['row']['money'] - $row['price_ship'] + $row['coupon']; ?>₫</td>
											</tr>
											<tr>
												<td colspan="6" class="text-right" style="border: none; font-size: 1.1em;">Voucher giảm giá : <?php echo $data['row']['coupon']; ?>₫</td>
											</tr>
											
											<tr>
												<td colspan="6" class="text-right" style="border: none; font-size: 0.9em;"><i>Phí vận chuyển: </i>
													<?php echo $data['row']['price_ship']; ?>₫
												</td>
											</tr>
											<tr>
												<td colspan="6" class="text-right" style="border: none; color: red; font-size: 1.3em;">Thành tiền: <?php echo $data['row']['money']; ?>₫</td>
											</tr>
											
											<tr>
												<td class="text-right" colspan="6">
													<a class="btn btn-primary btn-md" role="button" onclick="window.print()">
														<span class="glyphicon glyphicon-print"></span> In đơn hàng
													</a>
												</td>
											</tr>
										</tbody>
									</table>
								</div>
								<div class="row">
									<div class="col-md-12 text-right">
										<ul class="pagination">

										</ul>
									</div>
								</div>
							</form>                    
						</div>
						<!--/.ND-->
					</div>
				</div><!-- /.box -->
			</div><!-- /.col -->
		</div><!-- /.row -->
	</section><!-- /.content -->	      	
</div>
<?php 
  $content = ob_get_clean();
  include('./application/views/backend/layout.php');
?>