<?php ob_start(); ?>
	<section id="content">
		<div class="row wraper">
			<div class="banner-product">
				<div class="container">
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
						<img src="public/images/sp.png">
					</div>
				</div>
			</div>
		<div class="container">
			<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 list-menu pull-left">
					<?php include('./application/views/frontend/modules/category.php'); ?>
				</div>
				<?php include('./application/views/frontend/modules/news.php'); ?>
			</div>
			<div class = "col-xs-12 col-sm-12 col-md-9 col-lg-9 product-content" id="list-content">
				<div class="product-wrap" id="info-content">
					<div class="content-ct">
						<div class="fs-ne2-it clearfix" style="padding-top: 5px">
							<div class="fs-ne2-it clearfix">
								<div class="entry-title">
									<h3>title</h3>
								</div>
								<ul class="entry-meta clearfix">
									<li><i class="fa fa-calendar" style="margin-right: 5px"></i>created_at</li>
								</ul>
							</div>
							<div class="introtext">
								<p>introtext</p>
							</div>
							<div class="entry-content">
								<p>fulltext</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
<?php 
	$content = ob_get_clean();
	include('./application/views/frontend/layout.php');
?>