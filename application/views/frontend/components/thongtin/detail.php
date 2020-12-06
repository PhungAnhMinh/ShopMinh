<?php ob_start(); ?>
<div class="container order-page">
	<div class="general__title">
		<h2>Chi tiết đơn hàng</h2>
	</div>
	<div class="table-responsive">
		<fieldset>
			<table class="table table-bordered tb-detail-or">
				<thead>
					<tr class="">
						<th>Sản phẩm</th>
						<th>Giá</th>
						<th>Số lượng</th>
						<th>Thành tiền</th>
					</tr>
				</thead>
				<tbody>
					
						<tr>
							<td><a href="alias">name</a></td>
							<td>74435 VNĐ</td>
							<td>count</td>
							<td>5y47574 VNĐ</td>
						</tr>
					
				</tbody>
			</table>
		</fieldset>
	</div>
	<div class="or-detail-c">
		<div class="col-sm-8">
			<div class="general__title">
				<h3>Thông tin thanh toán</h3>
			</div>
			<div class="content-order">
				<p> Mã Đơn hàng: orderCode</p>
				<p> Khách hàng: fullname</p>
				<p> Số điện thoại: phone</p>
				<p> Thời gian đặt hàng: orderdate</p>
				<p> Địa chỉ giao hàng: address, district, province</p>
			</div>
		</div>
		<div class="col-sm-4">
			<div class="general__title">
				<h3>Tổng tiền hóa đơn</h3>
			</div>
			<div class="content-order">
				<table class="table">
					<tbody>
						<tr>
							
							<td> Tổng tiền đơn hàng </td>
							<td class="text-right"><span>3746574VNĐ</span></td>
						</tr>
						
						<tr>
							<td>Phí giao hàng:</td>
							<td class="text-right">4756347VNĐ</span></td>
						</tr>
						<tr>
							<td>Voucher :</td>
							<td class="text-right">58764 VNĐ</span></td>
						</tr>
						}

						?>
						<tr>
							<td> Tổng thanh toán:</td>
							<td class="text-right"><span style="color: red; font-size: 23px;">5674 VNĐ</span></td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
		<div class="col-xs-12">
			<button class="btn"><a href="javascript:;" onclick="window.history.go(-1);" class="viewMore pull-left" style="font-size: 15px;"><i class="fa fa-angle-left" aria-hidden="true"></i> Trở về trang trước</a></button>
		</div>
	</div>
</div>
<?php 
	$content = ob_get_clean();
	include('./application/views/frontend/layout.php');
?>