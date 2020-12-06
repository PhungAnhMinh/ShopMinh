<?php ob_start(); ?>
<section id="content">
	<div class="container account">
        <aside class="col-right sidebar col-md-3 col-xs-12">
            <div class="block block-account">
                <div class="general__title">
                    <h2><span>Thông tin tài khoản</span></h2>
                </div>
                <div class="block-content">
                    <p>Tài khoản: <strong>username</strong></p>
                    <p>Họ và tên: <strong>fullname</strong></p>
                    <p>Email: <strong>email</strong></p>
                    <p>Số điện thoại: <strong>phone</strong></p>
                </div>
                <button class="btn"><a href="reset_password">Đổi mật khẩu</a></button>
            </div>
        </aside>
        <div class="col-main col-md-9 col-sm-12">
            <div class="my-account">

                    <div class="general__title">
                        <h2><span>Danh sách đơn hàng chưa duyệt</span></h2>
                    </div>
                    <table style="padding-right: 10px; width: 100%;">
                        <thead style="border: 1px solid silver;">
                            <tr>
                                <th class="text-left" style="width: 85px; padding:5px 10px">Đơn hàng</th>
                                <th style="width: 110px; padding:5px 10px">Ngày</th>
                                <th style="width: 150px;text-align: center; padding:5px 10px">
                                    Giá trị đơn hàng 
                                </th>
                                <th style="width: 150px; text-align: center;">Trạng thái đơn hàng</th>
                                <th style="text-align: center;" colspan="2">Thao tác</th>
                            </tr>
                        </thead>
                        <tbody style="border: 1px solid silver;">
                            
                                <tr style="border-bottom: 1px solid silver;">
                                    <td style="padding:5px 10px;">ordercode</td>
                                    <td style="padding:5px 10px;">orderdate</td>
                                    <td style="text-align: center; padding:5px 10px;"><span class="price-2">545 VNĐ</span></td>
                                    <td style="padding:5px 10px; text-align: center;">
                                       Đang đợi duyệt
                                </td>
                                <td width="70">
                                    <span> <a style="color: #0f9ed8;" href="account/orders/id">Xem chi tiết</a></span>
                                </td>
                                <td width="70">
                                    <a style="color: red;" href="thongtin/update/id" onclick="return confirm('Xác nhận hủy đơn hàng này ?')">Hủy đơn hàng</a>
                                </td>
                            </tr>
                       
                    </tbody>
                </table>
               
            
            <div class="general__title">
                <h2><span>Danh sách đơn hàng</span></h2>
            </div>
            <div class="table-order">
                <table style="padding-right: 10px; width: 100%;">
                    <thead style="border: 1px solid silver;">
                        <tr>
                            <th class="text-left" style="width: 85px; padding:5px 10px">Đơn hàng</th>
                            <th style="width: 110px; padding:5px 10px">Ngày</th>
                            <th style="width: 150px;text-align: center; padding:5px 10px">
                                Giá trị đơn hàng 
                            </th>
                            <th style="width: 150px; text-align: center;">Trạng thái đơn hàng</th>
                            <th>Thao tác</th>
                        </tr>
                    </thead>
                    <tbody style="border: 1px solid silver;">
                       
                            <tr style="border-bottom: 1px solid silver;">
                                <td style="padding:5px 10px;">ordercode</td>
                                <td style="padding:5px 10px;">orderdate</td>
                                <td style="text-align: center; padding:5px 10px;"><span class="price-2">5515 VNĐ</span></td>
                                <td style="padding:5px 10px; text-align: center;">
                                   
                                    dang doi duyet
                            </td>
                            <td width="70">
                                <span> <a style="color: #0f9ed8;" href="account/orders/id">Xem chi tiết</a></span>
                            </td>
                        </tr>
                   
                </tbody>
            </table>


        </div>
    </div>
</div>
</section>
<?php 
    $content = ob_get_clean();
    include('./application/views/frontend/layout.php');
?>