
<html lang="">
	<head>
        <base href="#"></base>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Hệ thống quản lý cơ sở dữ liệu</title>
        <link rel="shortcut icon" href="http://localhost:8080/ShopMinh/public/images/templates/favicon.png" />
		<link rel="stylesheet" href="http://localhost:8080/ShopMinh/public/css/bootstrap.css">
		<link rel="stylesheet" href="http://localhost:8080/ShopMinh/public/css/login.css">
		<link rel="stylesheet" href="http://localhost:8080/ShopMinh/public/css/font-awesome.min.css">
    </head>
    <body style="background-color: #d5e5f9">
        <div class="container khung">
            <div class="title">
                <h2 class="text-center" style="color:#337ab7">ShopMinh</h2>
            </div>
            <hr>
            <div class="myform">
                <form name="form1" action="check_user" method="post" role="form">
                    <div class="row form-row">
                        <div class="input-group">
                           <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
                           <input type="text" name="username" class="form-control" placeholder="Tên đăng nhập">
                          
                        </div>
                        <div class="error" id="password_error">username</div>
                    </div>
                    <div class="row form-row">
                        <div class="input-group">
                           <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
                           <input type="password" name="pass" class="form-control" placeholder="Mật khẩu">
                          
                        </div>
                        <div class="error" id="password_error">pass</div>
                    </div>
                    <div class="row form-row" style="width:100%; margin-top: 15px;">
                        <input type="submit" name="submit" value="Đăng nhập" class="form-control btn btn-primary btn-login">
                    </div>
                    <?php if(isset($_COOKIE['msg'])) {?>
                             <div class="alert alert-warning">
                              <strong>Thông báo:</strong> <?=$_COOKIE['msg'] ?>
                            </div>
                    <?php } ?>
                    
                </form>
            </div>
            <hr>
        </div>
        <nav class="navbar navbar-fixed-bottom" role="navigation">
            <div class="container">
               <h5 class="text-center">Copyright © 2020 <a href="#" style="color:red">ShopMinh</a>. All rights reserved.</h5>
            </div>
        </nav>
        <!-- jQuery -->
        <script src="http://localhost:8080/ShopMinh/public/js/jquery-2.2.3.min.js"></script>
		<script src="http://localhost:8080/ShopMinh/public/js/bootstrap.js"></script>
    
	</body>
</html>