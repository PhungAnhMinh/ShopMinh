<?php ob_start(); ?>
<section id="checkout-cart">
    <div class="container">
        <div class="col-md-12">
            <div class="wrapper overflow-hidden">
                <div class="checkout-content">
                    <div class="tks-header">
                        <h3 class="fa fa-check-circle"> Thông tin đơn hàng đã được gửi đến 
                            
                            . Qúy khách hãy đăng nhập gmail để kiểm tra thông tin đơn hàng.
                        </h3>
                    </div>
                    <div class="tks-content" style="min-height: 1px;
                    overflow: hidden;">
                    <div class="col-xs-12 col-sm-12 col-md-7 col-login-checkout" style="margin-bottom: 20px">
                        <table class="table tks-tabele-info-cus">
                            <thead>
                                <tr>
                                    <th colspan="2">Thông tin thanh toán nhận hàng</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Khách hàng :</td>
                                    <td>fullname</td>
                                </tr>
                                <tr>
                                    <td>Số điện thoại :</td>
                                    <td>phone</td>
                                </tr>
                                <tr>
                                    <td>Địa chỉ thanh toán :</td>
                                    <td>address,district, province</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-5 products-detail">
                        <div class="no-margin-table" style="width: 95%; float: right;">
                            <table class="table" style="color: #333;">
                                <thead>
                                    <tr>
                                        <th colspan="3" style="font-weight: 600;">Thông tin đơn hàng</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr style="background: #fafafa; color: #333;" class="text-transform font-weight-600">
                                        <td>Sản phẩm</td>
                                        <td class="text-center">Số lượng</td>
                                        <td class="text-center">Giá</td>
                                        <td class="text-center">Tổng</td>
                                    </tr>
                                    
                                        <tr>
                                            <td>name</td>
                                            <td class="text-center">count</td>
                                            <td class="text-center">    
                                                price
                                            </td>
                                            <td>7436 VNĐ</td>
                                            
                                        </tr>
                                    
                                    <tr style="background: #fafafa">
                                        <td colspan="3">Tổng cộng :</td>
                                        <td class="text-center">
                                            746547 VNĐ
                                        </td>
                                    </tr>
                                    <tr style="background: #fafafa">
                                        <td colspan="3">Vận chuyển</td>
                                        <td class="text-center">47VND</td>
                                    </tr>
                                   <tr style="background: #fafafa">
                                        <td colspan="3">Voucher</td>
                                        <td class="text-center">756VNĐ</td>
                                        </tr>
                                    <tr style="background: #fafafa">
                                        <td colspan="3" class="font-weight-600">Thành tiền<br/><span style="font-style: italic;">(Tổng số tiền thanh toán)</span></td>
                                        <td class="text-center" style="font-weight: 600; font-size: 17px;color: red;">4754VND</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="btn-tks clearfix">
                    <button type="button" onclick="window.location.href='trang-chu'" class="btn-next-checkout pull-left">Tiếp tục mua hàng</button>
                    <button type="button" onclick="window.print()" class="btn-update-order pull-left">In</button>
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