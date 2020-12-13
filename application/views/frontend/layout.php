<!DOCTYPE html>
<html lang="en">
  <head>
    <base href="#"></base>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>
        
        ShopMinh - Điện thoại, Laptop, Phụ kiện
       
    </title>
    <link rel="icon" type="image/x-icon" href="public/images/cart2.png">
    <link href="public/css/bootstrap.css" rel="stylesheet">
    <link href="public/css/font-awesome.css" rel="stylesheet">
    <link href="public/css/lte.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <link href="public/css/owl.carousel.min.css" rel="stylesheet">
    <link href="public/css/AdminLTE.css" rel="stylesheet">
    <link rel="stylesheet" href="public/css/style-jc.css">
    <link href="public/css/menu-tab.css" rel="stylesheet">
    <link href="public/css/style.css" rel="stylesheet">
    <link href="public/css/jquery.bxslider.css" rel="stylesheet">
    <link href="public/css/flexslider.css" rel="stylesheet">

    
    
        <script src="public/js/jquery-2.2.3.min.js"></script>
    </head>
    <body>
        <div class='thetop'></div>
        <div id="fb-root"></div>
        <script>(function(d, s, id) {
          var js, fjs = d.getElementsByTagName(s)[0];
          if (d.getElementById(id)) return;
          js = d.createElement(s); js.id = id;
          js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.8";
          fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));</script>
        <!-- TOPBAR -->
            <?php 
                require_once"./application/views/frontend/modules/topbar.php";
            ?>
        <!-- HEADER LOGO + SEARCH -->
            <?php 
                require_once"./application/views/frontend/modules/logo-search.php";
            ?>
        <section id="menu-slider">
            <?php 
                require_once"./application/views/frontend/modules/category.php";
            ?>
        </section>
           <!--  <?php 
                require_once"./application/views/frontend/modules/panel-left.php";
            ?> -->
        
        <!--CONTENT-->
        
            <?php 
                // if(isset($com,$view)){
                //     $this->load->view('frontend/components/'.$com.'/'.$view);
                // }
                // else
                //     $this->load->view('frontend/components/Error404/index');
            echo $content;
        ?>
        
        <!--FOOTER-->
            <?php 
                require_once"./application/views/frontend/modules/footer.php";
            ?>
        <script src="public/js/bootstrap.js"></script>
        <script src="public/js/app.min.js"></script>
        <script src="public/js/owl.carousel.js"></script>
        <script src="public/js/jquery.jcarousel.js"></script>
        <script src="public/js/jcarousel.connected-carousels.js"></script>
        <script src="public/js/scroll.js"></script>
        <script src="public/js/search-quick.js"></script>
        <script src="public/js/custom-owl.js"></script>
        <script src="public/js/jquery.flexslider.js"></script>
        <div class='scrolltop'>
        <div class='scroll icon'><i class="fa fa-4x fa-angle-up"></i></div>
        </div>
    </body>
</html>
