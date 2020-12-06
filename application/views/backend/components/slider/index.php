<?php ob_start(); ?>
<div class="content-wrapper">
	<section class="content-header">
		<h1><i class="glyphicon glyphicon-picture"></i> Quản lý sliders</h1>
		<div class="breadcrumb">
			<a class="btn btn-primary btn-sm" href="/ShopMinh/slider/insert" role="button">
				<span class="glyphicon glyphicon-plus"></span> Thêm mới
			</a>
			<a class="btn btn-primary btn-sm" href="/ShopMinh/slider/recyclebin" role="button">
				<span class="glyphicon glyphicon-trash"></span> Thùng rác(<?php echo $data['num']; ?>)
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
	                    
						<div class="row">
							<!--ND-->
							<div class="table-responsive">
								<table class="table table-hover table-bordered">
									<thead>
										<tr>
											<th class="text-center">ID</th>
											<th>Hình</th>
											<th>Tên sliders</th>
											<th>Liên kết</th>
											<th class="text-center">Trạng thái</th>
											<th class="text-center" colspan="2">Thao tác</th>
										</tr>
									</thead>
									<tbody>
									<?php foreach ($data['slider'] as $row) {?>
										<tr>
											<td class="text-center"><?php echo $row['id']; ?></td>
											<td style="width:100px">
												<img src="/ShopMinh/public/images/banners/<?php echo $row['img']; ?>" class="img-responsive">
											</td>
											<td><a href="/ShopMinh/slider/update/"><?php echo $row['name']; ?></a>
											</td>
											<td><?php echo $row['link']; ?></td>
											<td class="text-center">
												<a href="/ShopMinh/slider/index/<?php echo $row['id']; ?>">
													<?php if($row['status']==1){ ?>
														<span class="glyphicon glyphicon-ok-circle mauxanh18"></span>
													<?php }else{ ?>
														<span class="glyphicon glyphicon-remove-circle maudo"></span>
													<?php } ?>
												</a>
											</td>
											<td class="text-center">
												<a class="btn btn-success btn-xs" href="/ShopMinh/slider/update/<?php echo $row['id']; ?>" role = "button">
													<span class="glyphicon glyphicon-edit"></span>Sửa
												</a>
											</td>
											
											<td class="text-center">
												<a class="btn btn-danger btn-xs" href="/ShopMinh/slider/trash/<?php echo $row['id']; ?>" onclick="return confirm('Xác nhận xóa slider này ?')" role = "button">
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
<!-- /.content -->
</div><!-- /.content-wrapper -->
<?php 
  $content = ob_get_clean();
  include('./application/views/backend/layout.php');
?>