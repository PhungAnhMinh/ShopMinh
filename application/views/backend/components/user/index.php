<?php ob_start(); ?>
<div class="content-wrapper">
	<section class="content-header">
		<h1><i class="glyphicon glyphicon-cd"></i> Danh sách tài khoản cửa hàng</h1>
		<div class="breadcrumb">
			
						<a class='btn btn-primary btn-sm' href="/ShopMinh/user/insert" role='button'>
							<span class='fa fa-user-plus'></span> Thêm mới
						</a>
			<a class="btn btn-primary btn-sm" href="/ShopMinh/user/recyclebin" role="button">
				<span class="glyphicon glyphicon-trash"></span> Thùng rác (<?php echo $data['num']; ?>)
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
											<th class="text-center">ID</th>
											<th>Hình ảnh</th>
											<th>Họ và tên</th>
											<th>Email</th>
											<th>Phone</th>
											<th>Địa chỉ</th>
											<th class="text-center">Trạng thái</th>
											<th class="text-center" colspan="2">Thao tác</th>
										</tr>
									</thead>
									<tbody>
									<?php foreach ($data['user'] as $row) {?>
										<tr>
											<td class="text-center"><?php echo $row['id']; ?></td>
											<td style="width:100px">
												<img src="/ShopMinh/public/images/admin/<?php echo $row['thumbnail']; ?>"class="img-responsive">
											</td>
											<td><?php echo $row['fullname']; ?></td>
											<td><?php echo $row['email']; ?></td>
											<td><?php echo $row['phone']; ?></td>
											<td><?php echo $row['address']; ?></td>
											<td class="text-center">
												<a href="/ShopMinh/user/status/<?php echo $row['id']; ?>">
													<?php if($row['status']==1){ ?>
														<span class="glyphicon glyphicon-ok-circle mauxanh18"></span>
													<?php }else{ ?>
														<span class="glyphicon glyphicon-remove-circle maudo"></span>
													<?php } ?>
												</a>
											</td>
											<td class="text-center">
												<a class="btn btn-success btn-xs" href="/ShopMinh/user/update/<?php echo $row['id']; ?>" role = "button">
													<span class="glyphicon glyphicon-edit"></span> Sửa
												</a>
											</td>
											<td class="text-center">
												<a class="btn btn-danger btn-xs" href="/ShopMinh/user/trash/<?php echo $row['id']; ?>" onclick="return confirm('Xác nhận xóa loại sản phẩm này ?')" role = "button">
													<span class="glyphicon glyphicon-trash"></span> Xóa
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