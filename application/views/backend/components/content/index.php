<?php ob_start(); ?>
<div class="content-wrapper">
	<section class="content-header">
		<h1><i class="glyphicon glyphicon-text-background"></i> Danh sách bài viết</h1>
		<div class="breadcrumb">
			<a class="btn btn-primary btn-sm" href="/ShopMinh/content/insert" role="button">
				<span class="glyphicon glyphicon-plus"></span> Thêm mới
			</a>
			<a class="btn btn-primary btn-sm" href="/ShopMinh/content/recyclebin" role="button">
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
											<th class="text-center">ID</th>
											<th class="text-center"  style="width:100px;">Hình</th>
											<th class="text-center">Tiêu đề bài viết</th>
											<th class="text-center">Trạng thái</th>
											<th class="text-center" colspan="2">Thao tác</th>
										</tr>
									</thead>
									<tbody>
									<?php foreach($data['content'] as $row){ ?>
										<tr>
											<td class="text-center"><?php echo $row['id']; ?></td>
											<td>
												<img src="/ShopMinh/public/images/posts/<?php echo $row['thumbnail']; ?>" alt="title" class="img-responsive">
											</td>
											<td><?php echo $row['title']; ?></td>
											<td class="text-center">
												<a href="/ShopMinh/content/index/<?php echo $row['id']; ?>">
													<?php if($row['status']==1):?>
															<span class="glyphicon glyphicon-ok-circle mauxanh18"></span>
													<?php else: ?>  
															<span class="glyphicon glyphicon-remove-circle maudo"></span>
													<?php endif;?>
														
												</a>
											</td>
											<td class="text-center">
												<a class="btn btn-success btn-xs" href="/ShopMinh/content/update/<?php echo $row['id']; ?>" role = "button">
													<span class="glyphicon glyphicon-edit"></span>Sửa
												</a>
											</td>
											<td class="text-center">
												<a class="btn btn-danger btn-xs" href="/ShopMinh/content/trash/<?php echo $row['id']; ?>" onclick="return confirm('Xác nhận xóa bài này ?')" role = "button">
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