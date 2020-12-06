<?php ob_start(); ?>
<div class="collection-filter" id = "list-product">
	<div class="category-products clearfix">
		<div class="products-grid clearfix">
            
                <p>Không có sản phẩm !</p>
                
                        <div class="col-md-3 col-lg-3 col-xs-6 col-6">
                            <div class="product-lt">
                                <div class="lt-product-group-image">
                                    <a href="alias" title="name" >
                                        <img class="img-p"src="public/images/products/avatar" alt="">
                                    </a>

                                    
                                        <div class="giam-percent">
                                            <span class="text-giam-percent">Giảm 6 %</span>
                                        </div>
                                    
                                    <div class="tra-gop-0">
                                        <span class="text-tra-gop-0">Trả góp 0%</span>
                                    </div>
                                </div>

                                <div class="lt-product-group-info">
                                    <a href="alias" title="name">
                                        <h3>name</h3>
                                    </a>
                                    <div class="price-box">
                                        

                                            <p class="old-price">
                                                <span class="price">65₫</span>
                                            </p>
                                            <p class="special-price">
                                                <span class="price">76₫</span>
                                            </p>
                                            
                                             <p class="old-price">
                                                <span class="price" style="color: #fff">65₫</span>
                                            </p>
                                            <p class="special-price">
                                                <span class="price">67₫</span>
                                            </p>
                                        
                                    </div>
                                    <div class="clear"></div>
                                </div>
                            </div>
                        </div>
                    
                </div>
                <div class = "text-center pull-right">
                    <ul class ="pagination">
                        phan trang
                    </ul>
                </div>
            
        </div>
    </div>
<?php 
    $content = ob_get_clean();
    include('./application/views/frontend/layout.php');
?>