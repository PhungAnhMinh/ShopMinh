<?php ob_start(); ?>
<div class="content-wrapper">
	<form action="/ShopMinh/product/insert" enctype="multipart/form-data" method="POST" accept-charset="utf-8">
		<section class="content-header">
			<h1><i class="glyphicon glyphicon-cd"></i> Thêm sản phẩm mới</h1>
			<div class="breadcrumb">
				<button type = "submit" name="submit" class="btn btn-primary btn-sm">
					<span class="glyphicon glyphicon-floppy-save"></span>
					Lưu[Thêm]
				</button>
				<a class="btn btn-primary btn-sm" href="/ShopMinh/product/index" role="button">
					<span class="glyphicon glyphicon-remove do_nos"></span> Thoát
				</a>
			</div>
		</section>
		<!-- Main content -->
		<section class="content">
			<div class="row">
				<div class="col-md-12">
					<div class="box" id="view">
						<div class="box-body">
							<?php if(isset($_COOKIE['msg'])){ ?>
							<div class="alert alert-success">
								<?php echo $_COOKIE['msg']; ?>
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
							</div>
						<?php } ?>	
							<div class="col-md-9">
							<?php
								$option_category_id="";
								$option_producer_id="";
								$row_cate = $this->model_cate->select_category_status(1);

								foreach ($row_cate['category'] as $row) {
									$option_category_id.="<option value='".$row['id']."'>".$row['name']."</option>";
								}
								$row_producer = $this->model_pr->select_producer_status(1);
								foreach ($row_producer['producer'] as $row) {
									$option_producer_id.="<option value='".$row['id']."'>".$row['name']."</option>";
								}
									
							?>
								<div class="form-group">
									<label>Tên sản phẩm <span class = "maudo">(*)</span></label>
									<input required="" type="text" class="form-control" name="name" style="width:100%" placeholder="Tên sản phẩm">
								</div>
								<div class="row">
									<div class="col-md-12">
										<div class="col-md-6" style="padding-left: 0px;">
										<div class="form-group">
									<label>Loại sản phẩm<span class = "maudo">(*)</span></label>
									<select required="" name="category_id" class="form-control">
										<option value = "">[--Chọn loại sản phẩm--]</option>
										<?php echo $option_category_id;  ?>
											
									</select>
								</div>
									</div>
									<div class="col-md-6" style="padding-right: 0px;">
								<div class="form-group">
									<label>Nhà cung cấp <span class = "maudo">(*)</span></label>
									<select required="" name="producer_id" class="form-control">
										<option value = "">[--Chọn nhà cung cấp--]</option>
											<?php echo $option_producer_id; ?>
									</select>
								</div>
							</div>
								</div>
									</div>
								<div class="form-group">
									<label>Mô tả ngắn</label>
									<textarea required="" name="description" class="form-control" ></textarea>
								</div>
								<div class="form-group">
									<label>Chi tiết sản phẩm</label>
									<textarea required="" name="detail" id="detail" class="form-control" ></textarea>
      								<script>CKEDITOR.replace('detail');</script>
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
									<label>Giá gốc</label>
									<input required="" name="price" class="form-control" type="number" value="0" min="0" step="1" max="1000000000">
								</div>
								<div class="form-group">
									<label>Khuyến mãi (%)</label>
									<input name="sale" class="form-control" type="number">
								</div>
								<!-- <div class="form-group">
									<label>Giá bán</label>
									<input name="price_sale" class="form-control" type="number" value="0" min="0" step="1" max="1000000000">
									
								</div> -->
								<div class="form-group">
									<label>Số lượng</label>
									<input required="" name="number" class="form-control" type="number" value="1" min="1" step="1" max="1000">
								</div>
								<div class="form-group">
                                    <label>Hình đại diện</label>
                                    <input type="file"  id="image_list" name="thumbnail" required style="width: 100%">
                                </div>
								<div class="form-group">
									<label>Hình ảnh sản phẩm</label>
									<input type="file"  id="image_list" name="img[]" multiple required>
								</div>
								<div class="form-group">
									<label>Trạng thái</label>
									<select name="status" class="form-control">
										<option value="1">Kinh doanh</option>
										<option value="0">Chưa Kinh doanh</option>
									</select>
								</div>
							</div>
						</div>
					</div><!-- /.box -->
				</div>
			<!-- /.col -->
		  </div>
		  <!-- /.row -->
		</section>
	</form>
<!-- /.content -->
</div><!-- /.content-wrapper -->
<?php 
  $content = ob_get_clean();
  include('./application/views/backend/layout.php');
?>