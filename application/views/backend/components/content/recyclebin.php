<?php ob_start(); ?>
<div class="content-wrapper">
	<section class="content-header">
		<h1><i class="glyphicon glyphicon-text-background"></i> Thùng rác bài viết</h1>
		<div class="breadcrumb">
			<a class="btn btn-primary btn-sm" href="/ShopMinh/content/index" role="button">
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
								<div class="row">
									<div class="alert alert-success">
										<?php echo $_COOKIE['msg']; ?>
										<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
									</div>
								</div>
							<?php } ?>
							<div class="row" style='padding:0px; margin:0px;'>
								<!--ND-->
								<div class="table-responsive">
									<table class="table table-hover table-bordered">
										<thead>
											<tr>
												<th class="text-center">ID</th>
												<th class="text-center" style="width: 150px;">Hình</th>
												<th class="text-center">Tên bài viết</th>
												<th class="text-center">Ngày đăng</th>
												<th class="text-center">Người đăng</th>
												<th class="text-center" colspan="2">Thao tác</th>
											</tr>
										</thead>
										<tbody>
											<?php foreach ($data['content'] as $content) {?>
												<tr>
													<td class="text-center"><?php echo $content['id']; ?></td>
													<td>
														<img src="/ShopMinh/public/images/posts/<?php echo $content['thumbnail']; ?>" alt="title" class="img-responsive">
													</td>
													<td><?php echo $content['title']; ?></td>
													<td><?php echo $content['created']; ?></td>
													<td><?php echo $content['created_by']; ?></td>
													<td class="text-center">
														<a class="btn btn-success btn-xs" href="/ShopMinh/content/restore/<?php echo $content['id']; ?>" role = "button">
															<span class="glyphicon glyphicon-edit"></span>Khôi phục
														</a>
													</td>
													
														<td class="text-center">
														<a class="btn btn-danger btn-xs" href="/ShopMinh/content/delete/<?php echo $content['id']; ?>" onclick="return confirm('Xác nhận xóa bài này ?')" role = "button">
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