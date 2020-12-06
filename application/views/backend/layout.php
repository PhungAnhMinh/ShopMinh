<?php 
  if(!isset($_SESSION['is_Login']) && $_SESSION['is_Login'] != true){
        header("location:/ShopMinh/user/login");
    }
?>
<!DOCTYPE html>
<html>
<head>
  <base href="#"></base>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Phung Anh Minh</title>
  <link rel="icon" type="image/x-icon" href="public/images/iconu.png">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="http://localhost:8080/ShopMinh/public/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="http://localhost:8080/ShopMinh/public/css/font-awesome.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="http://localhost:8080/ShopMinh/public/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="http://localhost:8080/ShopMinh/public/css/AdminLTE.css">
  <link rel="stylesheet" href="http://localhost:8080/ShopMinh/public/css/ionicons.min.css">
  <meta property="fb:app_id" content="659513967881060">
  
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="http://localhost:8080/ShopMinh/public/css/_all-skins.min.css">

  
   <script src="http://localhost:8080/ShopMinh/public/js/loader.js"></script>
   <script src="http://localhost:8080/ShopMinh/public/ckeditor/ckeditor.js"></script>
   <style>
    .content-header h1, th, label{
      color: #333;
    }
    label{font-weight: 600 !important;}
    .maudo{color: red}
    .mauxanh18{color: green;}
  </style>
</head>
<body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper">
    <!-- Vung Header -->
    <?php include('./application/views/backend/modules/header.php'); ?>


    <!-- ./Vung Header -->
    <?php include('./application/views/backend/modules/menu.php'); ?>
    <?php 
    // if(isset($com, $view))
    // {
    //   $this->load->view('backend/components/'.$com.'/'.$view);
    // }
      echo $content;
    ?>

  </div><!-- ./wrapper -->
  <!-- jQuery 2.2.3 -->
  <script src="http://localhost:8080/ShopMinh/public/js/jquery-2.2.3.min.js"></script>
  <!-- Bootstrap 3.3.6 -->
  <script src="http://localhost:8080/ShopMinh/public/js/bootstrap.js"></script>
  <!-- AdminLTE App -->
  <script src="http://localhost:8080/ShopMinh/public/js/app.min.js"></script>
</body>
</html>
