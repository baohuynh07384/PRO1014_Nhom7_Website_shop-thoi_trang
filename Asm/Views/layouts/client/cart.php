<?php include "header.php" ?>




<!-- SECTION -->
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <h3 class="section-title">Giỏ hàng của bạn</h3>
        <div class="table-responsive">
            <table class="table text-center">
                <thead>
                    <tr class="">
                        <th scope="col" colspan="2" class="text-center">Sản phẩm</th>
                        <th scope="col" class="text-center">Tên sản phẩm</th>
                        <th scope="col" class="text-center">Giá tiền</th>
                        <th scope="col" class="text-center">Số lượng</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="">
                        <td scope="row"><i class="fa-solid fa-trash"></i></td>
                        <td>
                            <img src="https://product.hstatic.net/1000357687/product/kemartboard-1_ff86809a8edf4115b55fbfe378f65311_1024x1024.png" alt="" width="100" height="100">
                        </td>
                        <td>Áo thun trơn Fresh tee // Chocolate martini</td>
                        <td><ins>169.000đ</ins></td>
                        <td>
                            <div class="input-number">
                                <input type="number" value="1" style="width:7rem; margin-right:0">
                                <span class="qty-up">+</span>
                                <span class="qty-down">-</span>
                            </div>
                        </td>
                    </tr>

                </tbody>
            </table>
        </div>
        <div class="input-group" style="margin-top: 2rem;">
            <input type="text" class="form-control" placeholder="Nhập mã giảm giá" aria-describedby="basic-addon2">
            <span class="input-group-addon" id="basic-addon2">Xác nhận</span>
        </div>
        <div class="text-right" style="margin-top: 2rem;">
        <button type="button" class="btn btn-danger"><a href="?url=ClientHomeController/ClientCheckoutPage">Thanh toán</a></button>
        </div>

        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /SECTION -->



<?php include "footer.php" ?>