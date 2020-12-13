<?php ob_start(); ?>
<div class="content-wrapper">
	<section class="content-header">
		<h1><i class="glyphicon glyphicon-text-background"></i> Thùng rác nhà cung cấp</h1>
		<div class="breadcrumb">
			<a class="btn btn-primary btn-sm" href="/ShopMinh/producer/index" role="button">
				<span class="glyphicon glyphicon-remove do_nos"></span> Thoát
			</a>
		</div>
	</section>
	<!-- Main content -->
	<section class="content">
		<div class="row">
			<div class="col-md-12">
				<div class="box" id="view">
					<div class="box-header with-border">
					<!-- /.box-header -->
					<div class="box-body">
						
	                        <?php if(isset($_COOKIE['msg'])){ ?>
								<div class="alert alert-success">
									<?php echo $_COOKIE['msg']; ?>
									<button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
								</div>
							<?php } ?>
						<div class="row" style='padding:0px; margin:0px;'>
							<!--ND-->
							<div class="table-responsive">
								<table class="table table-hover table-bordered">
									<thead>
										<tr>
											<th class="text-center">ID</th>
											<th>Tên nhà cung cấp</th>
											<th>Ngày đăng</th>
											<th>Người đăng</th>
											<th class="text-center">Khôi phục</th>
											<th class="text-center">Xóa VV</th>
										</tr>
									</thead>
									<tbody>
										<?php foreach ($data['producer'] as $row) {?>
										<tr>
											<td class="text-center"><?php echo $row['id']; ?></td>
											<td>
												<a href="/ShopMinh/producer/update/<?php echo $row['id']; ?>"><?php echo $row['name']; ?></a>	
											</td>
											<td><?php echo $row['created_at']; ?></td>
											<td><?php echo $row['created_by']; ?></td>
											<td class="text-center">
												<a class="btn btn-success btn-xs" href="/ShopMinh/producer/restore/<?php echo $row['id']; ?>" role = "button">
													<span class="glyphicon glyphicon-edit"></span>Khôi phục
												</a>
											</td>
											
														<td class="text-center">
															<a class="btn btn-danger btn-xs" href="/ShopMinh/producer/delete/<?php echo $row['id']; ?>" onclick="return confirm('Xác nhận xóa Nhà cung cấp này ?')" role = "button">
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
<!-- /.content -->
</div><!-- /.content-wrapper -->
<?php 
  $content = ob_get_clean();
  include('./application/views/backend/layout.php');
?>