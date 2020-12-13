<?php ob_start(); ?>
<div class="content-wrapper">
	<form action="/ShopMinh/configuration/update/<?php echo $data['row']['id']; ?>" enctype="multipart/form-data" method="POST" accept-charset="utf-8">
		<section class="content-header">
			<h1><i class="glyphicon glyphicon-text-background"></i> Hệ Thống</h1>
			<div class="breadcrumb">
				<button type = "submit" name="submit" class="btn btn-primary btn-sm">
					<span class="glyphicon glyphicon-floppy-save"></span>
					Lưu
					</button>
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
										<label> Mail smtp <span class = "maudo">(*)</span></label>
										<input type="email" class="form-control" name="mail_smtp" style="width:100%" placeholder="Mail cấu hình" value="<?php echo$data['row']['mail_smtp']; ?>">
									</div>
									<div class="form-group">
										<label>Password Mail smtp</label>
										<input type="password" class="form-control" name="mail_smtp_password" style="width:100%" placeholder=" Password Mail cấu hình" value="<?php echo$data['row']['mail_smtp_password']; ?>">
									</div>
									<div class="form-group">
										<label>Mail admin</label>
										<input type="text" class="form-control" name="mail_noreply" style="width:100%" placeholder="Mail nhận thông tin đơn hàng" value="<?php echo$data['row']['mail_noreply']; ?>">
									</div>
									<div class="form-group">
										<label> PriceShip <span class = "maudo">(*)</span></label>
										<input type="number" class="form-control" name="price_ship" style="width:100%" placeholder=" priceShip" value="<?php echo$data['row']['price_ship']; ?>">

									</div>
									<div class="form-group">
										<label> Title <span class = "maudo">(*)</span></label>
										<input type="text" class="form-control" name="title" style="width:100%" placeholder=" title" value="<?php echo$data['row']['title']; ?>">

									</div>
									<div class="form-group">
										<label> Description <span class = "maudo">(*)</span></label>
										<input type="text" class="form-control" name="description" style="width:100%" placeholder=" description" value="<?php echo$data['row']['description']; ?>">
									</div>
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
<?php  $content = ob_get_clean();
  include('./application/views/backend/layout.php');
?>