<?php ob_start(); ?>
<div class="content-wrapper">
	<section class="content-header">
		<h1><i class="glyphicon glyphicon-user"></i> Danh sách khách hàng</h1>
		<div class="breadcrumb">
			<a class="btn btn-primary btn-sm" href="/ShopMinh/customer/recyclebin" role="button">
				<span class="glyphicon glyphicon-trash"></span> Thùng rác (<?php echo $data['num']; ?>)
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
	                        <div class="row">
						<div class="row" style='padding:0px; margin:0px;'>
							<!--ND-->
							<div class="table-responsive">
								<table class="table table-hover table-bordered">
									<thead>
										<tr>
											<th class="text-center">ID</th>
											<th>Tên khách hàng</th>
											<th>Email</th>
											<th>Điện thoại</th>
											<th class="text-center" colspan="2">Thao tác</th>
										</tr>
									</thead>
									<tbody>
									<?php foreach ($data['customer'] as $row) {?>
										<tr>
											<td class="text-center"><?php echo $row['id']; ?></td>
											<td><?php echo $row['fullname']; ?></td>
											<td><?php echo $row['email']; ?></td>
											<td><?php echo $row['phone']; ?></td>
											<td class="text-center">
												<a class="btn btn-info btn-xs" href="/ShopMinh/customer/detail/<?php echo $row['id']; ?>" role = "button">
													<span class="glyphicon glyphicon-edit"></span>Xem
												</a>
											</td>
											<td class="text-center">
												<a class="btn btn-danger btn-xs" href="/ShopMinh/customer/trash/<?php echo $row['id']; ?>" onclick="return confirm('Xác nhận xóa thông tin khách hàng này ?')" role = "button">
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