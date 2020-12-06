<?php ob_start(); ?>
<section id="product-all" class="collection">
	<div class="banner-product">
        <div class="container">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <img src="public/images/sp.png">
            </div>
        </div>
    </div>
	<div class="slider">
		<div class="container">
            <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 list-menu pull-left">
                    <?php include('./application/views/frontend/modules/category.php'); ?>
                </div>
                <?php include('./application/views/frontend/modules/product-sale.php'); ?>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9 product-content">
             <div class="product-wrap">
               <div class="collection__title">
                   <h3>Tìm được 343 kết quả với từ khóa : <span style="color: red;">fhdj</span></h3>
                    
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
                                                        <span class="text-giam-percent">Giảm 4%</span>
                                                    </div>
                                                
                                            </div>

                                            <div class="lt-product-group-info">
                                                <a href="alias" title="name">
                                                    <h3>name</h3>
                                                </a>
                                                <div class="price-box">
                                                    

                                                        <p class="old-price">
                                                            <span class="price">545₫</span>
                                                        </p>
                                                        <p class="special-price">
                                                            <span class="price">45₫</span>
                                                        </p>
                                                        
                                                         <p class="old-price">
                                                            <span class="price" style="color: #fff">545₫</span>
                                                        </p>
                                                        <p class="special-price">
                                                            <span class="price">55₫</span>
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
            </div>
        </div>
    </div>
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
    function sortby(option){
        var strurl="<?php echo base_url();?>"+'/sanpham/index';
        jQuery.ajax({
            url: strurl,
            type: 'POST',
            dataType: 'json',
            data: {'sapxep': option},
            success: function(data) {
                $('#list-product').html(data);
            }
        });
    }
</script>
<?php 
    $content = ob_get_clean();
    include('./application/views/frontend/layout.php');
?>