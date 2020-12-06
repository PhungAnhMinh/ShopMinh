<?php ob_start(); ?>
<section id="product-detail">
	<div class="container">
		<div class="products-wrap">
			<form action="" method="post" id="ProductDetailsForm">
				
					<div class="breadcrumbs">
						<ul>
							<li class="home">
								<a href="trang-chu" title="Go to Home Page">Trang chủ</a>
								<i class="fa fa-angle-right"></i>
							</li>
							<li class="category3">
								<a href="#/san-pham/catid" title="">catid</a>
								<i class="fa fa-angle-right"></i>
							</li>
							<li class="product">name</li>
						</ul>
					</div>
					<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 listimg-desc-product">
						<?php include('./application/views/frontend/modules/jcarousel.php'); ?>
					</div>
					<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
						<div class="product-view-content">
							<div class="product-view-name">
								<h1>name</h1>
							</div>
							<div class="product-view-price">
								<div class="pull-left">
									<span class="price-label">Giá bán:</span>
									<span class="price">545₫</span>
								</div>
								
									<div class="product-view-price-old">
										<span class="price">515₫</span>
										<span class="sale-flag">-54%</span>
									</div>
								
							</div>
							<div class="product-status">
								<p style=" float: left;margin-right: 10px;">Thương hiệu: catid</p>
								<p>| Tình trạng: Con hang</p>
							</div>
							<div class="product-view-desc">
								<h4>Mô tả:</h4>
								<p>sortdesc</p>
							</div>
							<div class="actions-qty">
								<h2 style="color:red;">Ngừng kinh doanh</h2>
								<div class="actions-qty__button">
									<button class="button btn-cart add_to_cart_detail detail-button" title="Mua ngay" type="button" aria-label="Mua ngay" class="fa fa-shopping-cart" onclick="onAddCart('id')"> Mua ngay</button>
								</div>
							</div>

							<div class="fk-boxs" id="km-all" data-comt="False">
								<div id="km-detail">
									<p class="fk-tit">Khuyến mại đặc biệt (SL có hạn)</p>
									<div class="fk-main">
										<div class="fk-sales">
											</ul>
											<ul>
												<li>Tặng PMH Phụ Kiện 2,000,000đ (khi phiếu mua hàng trên 100,000,000 đ)</li>
											</ul>
											<ul>
												<li>Tặng Flip Cover chính hãng Samsung (Áp dụng đến 26/05) <a href="#" target="_blank">Xem chi tiết</a>
												</li>
											</ul>
											<ul>
												<li>Giảm thêm 900,000đ khi mua combo sức khỏe - thời trang (Điện thoại + Samsung Watch + Samsung Buds) <a href="#" target="_blank">Xem chi tiết</a>
												</li>
											</ul>
										</div>
									</div>
								</div>
							</div>
							<div style="margin-top: 20px;">
								<b>Tình trạng</b>
								<br>
								<span>Nguyên hộp. Đầy đủ phụ kiện từ nhà sản xuất, gồm: Sạc, cáp, tai nghe, que lấy SIM, sách hướng dẫn</span>
							</div>
							<div style="margin-top: 20px;">
								<b>Bảo hành</b>
								<br>
								<span>Bảo hành 12 tháng tại trung tâm bảo hành Chính hãng. 1 đổi 1 trong 30 ngày nếu có lỗi nhà sản xuất.</span><a href="#" style="color:red"> (Chi tiết)</a>
							</div>
						</div>
					</div>
					<div class="product-v-desc col-md-10 col-12 col-xs-12">
						<h3>Đặc điểm nổi bật</h3>
						detail
					</div>
					<div class="product-comment product-v-desc">
						<h3>Bình luận</h3>
						<div class="col-sm-12 col-xs-12 col-md-12 col-lg-12">

							<div class="fb-comments" data-href="alias" data-numposts="5"></div>
						</div>
					</div>
					<div class="product-comment product-v-desc product">
						<h3>Sản phẩm liên quan</h3>
						
							<div class="product-container">
								<div class="owl-carousel-product owl-carousel owl-theme">
									
										<div class="item">
											<div class="product-lt">
												<div class="lt-product-group-image">
													<a href="alias" title="name" >
														<img class="img-p"src="public/images/products/avatar" alt="">
													</a>

													
														<div class="giam-percent">
															<span class="text-giam-percent">Giảm 54%</span>
														</div>
													
												</div>

												<div class="lt-product-group-info">
													<a href="alias" title="name" style="text-align: left;">
														<h3>name</h3>
													</a>
													<div class="price-box">
														sale

															<p class="old-price">
																<span class="price">45₫</span>
															</p>
															<p class="special-price">
																<span class="price">45₫</span>
															</p>
															
																<p class="old-price">
																	<span class="price" style="color: #fff">545₫</span>
																</p>
																<p class="special-price">
																	<span class="price">545₫</span>
																</p>
															
														</div>
														<div class="clear"></div>
													</div>
												</div>
											</div>
										
									</div>
									
										<h4>Chưa có sản phẩm cùng loại</h4>
									
								</div>
							
						</form>

					</div>
				</div>
			</section>
			<script>

				function onAddCart(id){
					var strurl="<?php echo base_url();?>"+'/sanpham/addcart';
					jQuery.ajax({
						url: strurl,
						type: 'POST',
						dataType: 'json',
						data: {id: id},
						success: function(data) {
							document.location.reload(true);
							alert('Thêm sản phẩm vào giỏ hàng thành công !');
						}
					});
				}
			</script>
<?php 
	$content = ob_get_clean();
	include('./application/views/frontend/layout.php');
?>