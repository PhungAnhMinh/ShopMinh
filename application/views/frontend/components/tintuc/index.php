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
                <div class="product-wrap">
                  <div class="fs-newsboxs">
                        <div class="fs-ne2-it clearfix">
                            <div class="fs-ne2-if">
                                <a class="fs-ne2-img" href="tin-tuc/alias">
                                    <img  src="public/images/posts/img">
                                </a>
                                <div class="fs-n2-info">
                                    <h3><a class="fs-ne2-tit" href="tin-tuc/alias" title="">title</a></h3>
                                    <div class="fs-ne2-txt">introtext</div>
                                    <p class="fs-ne2-bot">
                                        <span class="fs-ne2-user">
                                            <img class="lazy"src="" style="">
                                        </span> 
                                        <span>created</span>
                                    </p>
                                </div>
                            </div>

                        </div>
                    

                </div>
                <div class = "row text-center">
                   <ul class ="pagination">
                     phan trang
                  </ul>
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