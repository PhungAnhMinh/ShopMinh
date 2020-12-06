<?php ob_start(); ?>
<div class="content-wrapper">
	<section class="content-header">
		<h1><i class="glyphicon glyphicon-text-background"></i> Thùng rác Liên hệ</h1>
		<div class="breadcrumb">
			<a class="btn btn-primary btn-sm" href="/ShopMinh/contact/index" role="button">
				<span class="glyphicon glyphicon-remove do_nos"></span> Thoát
			</a>
		</div>
	</section>
	<!-- Main content -->
	<section class="content">
		<div class="row">
			<div class="col-md-12">
				<div class="box" id="view">
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
								<table class="table table-hover table-bordered">
									<thead>
										<tr>
											<th class="text-center" style="width:20px">ID</th>
											<th>Tên khách hàng</th>
											<th>Email</th>
											<th>Tiêu đề</th>
											<th>Nội dung</th>
											<th colspan="2" class="text-center" style="width:90px">Thao tác</th>
										</tr>
									</thead>
									<tbody>
									<?php foreach ($data['contact'] as $row) {?>	
											<tr>
												<td class="text-center"><?php echo $row['id']; ?></td>
												<td class="text-center"><?php echo $row['fullname']; ?></td>
												<td><?php echo $row['email']; ?></td>
												<td><?php echo $row['title']; ?></td>
												<td><?php echo $row['content']; ?></td>
												<td class="text-center">
													<a class="btn btn-success btn-xs" href="/ShopMinh/contact/restore/<?php echo $row['id']; ?>" role = "button">
														<span class="glyphicon glyphicon-edit"></span>Khôi phục
													</a>
												</td>
													<td class="text-center">
													<a class="btn btn-danger btn-xs" href="/ShopMinh/contact/delete/<?php echo $row['id']; ?>" onclick="return confirm('Xác nhận xóa liên hệ này ?')" role = "button">
													<span class="glyphicon glyphicon-trash"></span>Xóa VV
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
	<!-- /.content -->
</div><!-- /.content-wrapper -->
<?php 
  $content = ob_get_clean();
  include('./application/views/backend/layout.php');
?>