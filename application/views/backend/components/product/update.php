<?php ob_start(); ?>
 
<div class="content-wrapper">
	<form action="/ShopMinh/product/update/<?php echo $data['product']['id']; ?>" enctype="multipart/form-data" method="POST" accept-charset="utf-8">
		<section class="content-header">
			<h1><i class="glyphicon glyphicon-cd"></i> Cập nhật sản phẩm</h1>
			<div class="breadcrumb">
				<button type = "submit" name="submit" class="btn btn-primary btn-sm">
					<span class="glyphicon glyphicon-floppy-save"></span>
					Lưu[Cập nhật]
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
								<div class="form-group">
									<label>Tên sản phẩm <span class = "maudo">(*)</span></label>
									<input type="text" class="form-control" name="name" style="width:100%" placeholder="Tên sản phẩm" value="<?php echo $data['product']['name']; ?>">
								</div>
								<div class="row">
									<div class="col-md-12">
										<div class="col-md-6" style="padding-left: 0px;">
											<div class="form-group">
												<?php

														$row_cate = $this->model_cate->select_category_status(1);
														$row_pr = $this->model_pr->select_producer_status(1);
														$option_category_id=""; 
														$option_producer_id="";
														foreach ($row_cate['category'] as $row) {
															if($row['id']==$data['product']['category_id']){
																$option_category_id.="<option selected value='".$row['id']."'>".$row['name']."</option>";
															}else{
																$option_category_id.="<option value='".$row['id']."' >".$row['name']."</option>";
															}
														}
														foreach ($row_pr['producer'] as $row) {
															if($row['id']==$data['product']['producer_id']){
																$option_producer_id.="<option selected value='".$row['id']."'>".$row['name']."</option>";
															}else{
																$option_producer_id.="<option value='".$row['id']."' >".$row['name']."</option>";
															}
														}
													?>
												<label>Loại sản phẩm<span class = "maudo">(*)</span></label>
												<select name="category_id" class="form-control">
													
													<option value = "">[--Chọn loại sản phẩm--]</option>
													<?php echo $option_category_id; ?>
													
												</select>
												
											</div>
										</div>
										<div class="col-md-6" style="padding-right: 0px;">
											<div class="form-group">
												<label>Nhà cung cấp<span class = "maudo">(*)</span></label>
												<select name="producer_id" class="form-control">
													<option value = "">[--Chọn nhà cung cấp--]</option>
													<?php echo $option_producer_id; ?>
												</select>
												
											</div>
										</div>
									</div>
								</div>
								<div class="form-group">
									<label>Mô tả ngắn</label>
									<textarea name="description" class="form-control" ><?php echo $data['product']['description']; ?></textarea>
								</div>
								<div class="form-group">
									<label>Chi tiết sản phẩm</label>
									<textarea name="detail" id="detail" class="form-control"><?php echo $data['product']['detail']; ?></textarea>
									<script>CKEDITOR.replace('detail');</script>
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
									<label>Giá gốc</label>
									<input name="price" class="form-control" type="number" value="<?php echo $data['product']['price']; ?>" min="0" step="10000" max="1000000000">
								</div>
								<div class="form-group">
									<label>Khuyến mãi (%)</label>
									<input name="sale" class="form-control" type="number" value="<?php echo $data['product']['sale']; ?>">
								</div>
								<div class="form-group">
									<label>Giá bán</label>
									<input name="price_sale" class="form-control" type="number" value="<?php echo $data['product']['price_sale']; ?>" min="0" step="10000" max="1000000000" disabled>
									
								</div>
								<div class="form-group">
									<label>Số lượng tồn kho</label>
									<input name="number" class="form-control" type="number" value="<?php echo $data['product']['number']-$data['product']['number_buy']; ?>" min="1" step="1" max="1000" disabled>
								</div>
								<div class="form-group">
									<label>Số lượng đã bán</label>
									<input name="number" class="form-control" type="number" value="<?php echo $data['product']['number_buy']; ?>" min="1" step="1" max="1000" disabled>
								</div>
								<div class="form-group">
                                    <label>Hình đại diện</label>
                                    <img width="15%"  src="/ShopMinh/public/images/products/<?php echo $data['product']['thumbnail']; ?>">
                					<input type="file" class="form-control" id="image_list" placeholder="" name="thumbnail" value="" >
                                </div>
                                <div class="form-group">
                                    <label>Hình sản phẩm</label>
                                    <?php foreach ($data['img'] as $key=>$value) {?>
                                   		<img width="15%" src="/ShopMinh/public/images/products/<?php echo $data['img'][$key]; ?>">
                                	<?php } ?>
                					<input type="file" class="form-control" id="image_list" placeholder="" name="img[]" multiple  >
                                  
                                </div>
                                <div class="form-group">
									<label>Trạng thái</label>
									<select name="status" class="form-control">
										<option value="1" <?php if($data['product']['status']==1){echo "selected";} ?>>Đang kinh doanh</option>
										<option value="0" <?php if($data['product']['status']==0){echo "selected";} ?>>Ngừng kinh doanh</option>
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