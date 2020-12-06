<?php 
  if(!isset($_SESSION['is_Login']) && $_SESSION['is_Login'] != true){
        header("location:/ShopMinh/user/login");
    }
?>
<header class="main-header">
    <a href="/ShopMinh/dashboard" class="logo">
        <span class="logo-lg">Quản trị hệ thống</span>
    </a>
    <nav class="navbar navbar-static-top" style="height: 52px">
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav" style="height: 52px;  padding: 1px">
                <li class="dropdown notifications-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                      <i class="fa fa-bell-o"></i>
                      <span class="label label-warning">
                          2
                      </span>
                  </a>
                  <ul class="dropdown-menu">
                      <li>
                        <ul class="menu">
                          <li>
                            <a href="#">
                              <i class="fa fa-users text-aqua"></i>
                              tieu de so lg don chua dat
                              Đơn hàng chưa duyệt
                          </a>
                      </li>
                  </ul>
              </li>
              <li>
                <ul class="menu">
                  <li>
                    <a href="#">
                      <i class="fa fa-users text-aqua"></i> 
                      tieu de slg don dat hang
                      Đơn hàng đang giao
                  </a>
              </li>
          </ul>
      </li>
      <li class="footer"><a href="admin/orders">Xem</a></li>
  </ul>
</li>
<li style="height: 52px">
    <a target="_blank" href="ShopMinh">
        <span class="glyphicon glyphicon-home"></span>
        <span>Website</span>
    </a>
</li>
<li class="dropdown user user-menu" style="height: 52px; padding: 0px">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
        <img src="/ShopMinh/public/images/admin/<?php echo $_SESSION['row']['thumbnail']; ?>" class="user-image" alt="User Image">
        <span class="hidden-xs"><?php echo $_SESSION['row']['fullname']; ?></span>
    </a>
    <ul class="dropdown-menu">
        <li class="user-header">
            <img src="/ShopMinh/public/images/admin/<?php echo $_SESSION['row']['thumbnail']; ?>" class="img-circle" alt="User Image">
            <p><?php echo $_SESSION['row']['fullname']; ?><small><?php echo $_SESSION['row']['phone']; ?></small></p>
        </li>
        <li class="user-footer">
            <div class="pull-left">
                <a href="admin/useradmin/update/id" class="btn btn-default btn-flat">Chi tiết</a>
            </div>
            <div class="pull-right">
                <a href="/ShopMinh/user/logout" class="btn btn-default btn-flat">Thoát</a>
            </div>
        </li>
    </ul>
</li>
</ul>
</div>
</nav>
</header>