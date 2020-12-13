<?php ob_start(); ?>
<div class="content-wrapper">
	<section class="content-header">
		<h1><i class="glyphicon glyphicon-text-background"></i> Danh sách Liên hệ khách hàng</h1>
		<div class="breadcrumb">
			
			<a class="btn btn-primary btn-sm" href="/ShopMinh/contact/recyclebin" role="button">
				<span class="glyphicon glyphicon-trash"></span> Thùng rác(<?php echo $data['num']; ?>)
			</a>
		</div>
	</section>
	<!-- Main content -->
	<section class="content">
		<div class="row">
			<div class="col-md-12">
				<div class="box" id="view">
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
											<th class="text-center" style="width:20px">ID</th>
											<th class="text-center">Tên</th>
											<th class="text-center">Ngày gửi</th>
											<th class="text-center">Địa chỉ mail</th>
											<th class="text-center">Tiêu đề</th>											
											<th class="text-center" style="width:90px">Trạng thái</th>
											
											<th class="text-center" colspan="2">Thao tác</th>
										</tr>
									</thead>
									<tbody>
									<?php foreach ($data['contact'] as $row) {?>
											<tr>
												<td class="text-center"><?php echo $row['id']; ?></td>
												<td class="text-center"><?php echo $row['fullname']; ?></td>
												<td class="text-center"><?php echo $row['created_at']; ?></td>
												<td class="text-center"><?php echo $row['email']; ?></td>
												<td class="text-center"><?php echo $row['title']; ?></td>

												<td class="text-center">
													<a href="/ShopMinh/contact/status/<?php echo $row['id']; ?>">
													<?php if($row['status']==0){ ?>
															<span class="glyphicon glyphicon-ok-circle mauxanh18" title="Chưa xem"></span>
													<?php }else{ ?>	
															<span class="glyphicon glyphicon-remove-circle maudo" title="Đã xem"></span>		
													<?php } ?>	
														</a>
													</td>
													<td class="text-center">
														<a class="btn btn-info btn-xs" href="/ShopMinh/contact/detail/<?php echo $row['id']; ?>" role = "button">
															<span class="glyphicon glyphicon-trash"></span>Xem
														</a>
													</td>
													<td class="text-center">
														<a class="btn btn-danger btn-xs" href="/ShopMinh/contact/trash/<?php echo $row['id']; ?>" onclick="return confirm('Xác nhận xóa liên hệ này ?')" role = "button">
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
		<!-- /.content -->
</div><!-- /.content-wrapper -->
<?php 
  $content = ob_get_clean();
  include('./application/views/backend/layout.php');
?>