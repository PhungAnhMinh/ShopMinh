<?php ob_start(); ?>
<div class="content-wrapper">
	<section class="content-header">
		<h1><i class="glyphicon glyphicon-cd"></i> Thùng rác danh mục sản phẩm</h1>
		<div class="breadcrumb">
			<a class="btn btn-primary btn-sm" href="/ShopMinh/category/index" role="button">
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
											<th>Tên loại sản phẩm</th>
											<th>Đường dẫn</th>
											<th>Ngày đăng</th>
											<th>Người đăng</th>
											<th class="text-center" style="width:90px">Khôi phục</th>
											<th class="text-center" style="width:90px">Xóa VV</th>
										</tr>
									</thead>
									<tbody>
										<?php foreach ($data['category'] as $row){?>
										<tr>
											<td class="text-center"><?php echo $row['id']; ?></td>
											<td><?php echo $row['name']; ?>
											</td>
											<td><?php echo $row['link']; ?></td>
											<td><?php echo $row['created_at']; ?></td>
											<td><?php echo $row['created_by']; ?></td>
											<td class="text-center">
												<a class="btn btn-success btn-xs" href="/ShopMinh/category/restore/<?php echo $row['id']; ?>" role = "button">
													<span class="glyphicon glyphicon-edit"></span> Khôi phục
												</a>
											</td>
												<td class="text-center">
															<a class="btn btn-danger btn-xs" href="/ShopMinh/category/delete/<?php echo $row['id']; ?>" onclick="return confirm('Xác nhận xóa loại sản phẩm này ?')" role = "button">
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