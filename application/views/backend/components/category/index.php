<?php ob_start(); ?>
<div class="content-wrapper">
	<section class="content-header">
		<h1><i class="glyphicon glyphicon-cd"></i> Danh mục loại sản phẩm</h1>
		<div class="breadcrumb">
			<a class="btn btn-primary btn-sm" href="/ShopMinh/category/insert" role="button">
				<span class="glyphicon glyphicon-plus"></span> Thêm mới
				</a>
			
			<a class="btn btn-primary btn-sm" href="/ShopMinh/category/recyclebin" role="button">
				<span class="glyphicon glyphicon-trash"></span> Thùng rác (<?php echo $data['num']; ?>)
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
											<th class="text-center">ID</th>
											<th>Tên loại sản phẩm</th>
											<th>Danh mục cha</th>
											<th>Ngày tạo</th>
											<th class="text-center">Trạng thái</th>
											<th class="text-center" colspan="2">Thao tác</th>
										</tr>
									</thead>
									<tbody>
										<?php foreach ($data['category'] as $row){?>
											<tr>
												<td class="text-center"><?php echo $row['id']; ?></td>
												<td>
													<a href="/ShopMinh/category/update/<?php echo $row['id']; ?>"><?php echo $row['name']; ?>
													(<?php echo $this->model->select_sl_sp($row['id']);?>)
													</a>	
												</td>
											<td>
												<?php 
													$name = $this->model->select_category_where_id($row['parent_id']);
													if($row['parent_id']==0){
														echo "Không";
													}else{
														echo $name[	'name'];
													} 
												?>
											</td>
											<td class="text-center">
												<?php echo $row['created_at']; ?>
											</td>
											<td class="text-center">
												<a href="/ShopMinh/category/status/<?php echo $row['id']; ?>">
													<?php if($row['status']==1){ ?>
														<span class="glyphicon glyphicon-ok-circle mauxanh18"></span>
													<?php }else{ ?>
															<span class="glyphicon glyphicon-remove-circle maudo"></span>
													<?php } ?>	
													</a>
												</td>
												<td class="text-center">
													<a class="btn btn-success btn-xs" href="/ShopMinh/category/update/<?php echo $row['id']; ?>" role = "button">
													<span class="glyphicon glyphicon-edit"></span>Sửa
													</a>
													</td>
												
												
												<td class="text-center">
													<a class="btn btn-danger btn-xs" href="/ShopMinh/category/trash/<?php echo $row['id']; ?>" onclick="return confirm('Xác nhận xóa loại sản phẩm này ?')" role = "button">
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