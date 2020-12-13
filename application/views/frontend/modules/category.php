
<div class="menu-pri">
    <div class="container">
        <div class="panel-left" style="background: #0f9ed8;">
            <!--MOBILE-->
            <nav class="navbar navbar-default hidden-md hidden-lg" role="navigation">
                <div class="container-fluid" style="background-color: #0f9ed8;">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                            <span class="icon-bar"></span>
                            <span class="icon-bar primary-color"></span>
                            <span class="icon-bar primary-color"></span>
                            <span class="icon-bar primary-color"></span>
                        </button>
                        <a class="navbar-brand" style="color: #fff;" href="#">Danh mục sản phẩm</a>
                    </div>
                    <div class="collapse navbar-collapse navbar-ex1-collapse hidden-md hidden-lg">

                        <ul class="nav navbar-nav">
                            <li class="dropdown">
                                <a href='san-pham/link' class='dropdown-toggle' data-toggle='dropdown'>";
                            <i class="fa fa-angle-right pull-right" aria-hidden="true">
                                
                            </i>
                           </a>
                           <ul class="dropdown-menu">
                                <li>
                                        <a href='san-pham/link'> </a>
                                </li>
                           </ul>
                            </li>
                        </ul>
                    </div><!-- /.navbar-collapse -->
                </div>
            </nav>
            <!--MD LG-->
        </div>
        <div class="col-md-12 col-lg-12 panel-right hidden-xs text-center" style="background: #0f9ed8;">
            <ul class="menu-right" style="display: inline-block;">
                <li class="pull-left"><a href="">Trang chủ</a></li>
                <li class="pull-left"><a href="san-pham">Sản phẩm</a></li>
                <?php $row_cate = $this->model_cate->select_category_level(1); ?>
                <?php foreach ($row_cate as $row) {?>
                    <li class="pull-left">
                        <a href='san-pham/link '><?php echo $row['name']; ?></a>
                    </li>
                <?php } ?>
                <li class="pull-left"><a href="tin-tuc/1">Tin tức</a></li>
                <li class="pull-left"><a href="gioi-thieu">Giới thiệu</a></li>
                <li class="pull-left"><a href="lien-he">Liên hệ</a></li>
            </ul>
        </div>
    </div>
</div>
