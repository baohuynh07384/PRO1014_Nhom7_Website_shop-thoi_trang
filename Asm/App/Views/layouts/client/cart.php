<!-- SECTION -->
<div class="section">
    <!-- container -->
    <div class="container">
        <form action="">
            <!-- row -->
            <h3 class="section-title">Giỏ hàng của bạn</h3>
            <div class="table-responsive">
                <table class="table text-center">
                    <thead>
                        <tr class="">
                            <th scope="col" colspan="2" class="text-center">Sản phẩm</th>
                            <th scope="col" class="text-center">Tên sản phẩm</th>
                            <th scope="col" class="text-center">Giá tiền</th>
                            <th scope="col" class="text-center">Size</th>
                            <th scope="col" class="text-center">Số lượng</th>
                            <th scope="col" class="text-center">Tổng tiền</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    $cart = 0;
                    foreach ($data['carts'] as $items):
                       foreach ($data['images'] as $image) {
                           if ($image['product_id'] == $items['id']) {
                               break;
                           }
                       }
                       $total = $items['quantity']*$items['price'];
                    ?>
                        <tr class="">
                            <td scope="row"><a href=""><i class="fa-solid fa-trash"></i></a></td>
                            <td>
                                <img src="<?= PUBLIC_URL . $image['path'] ?>"
                                    alt="" width="100" height="100">
                            </td>
                            <td><?= $items['name'] ?></td>
                            <td><?= number_format($items['price']) ?>đ</td>
                            <td>
                            <?php if($items['size'] == '1'){
                                echo '<select name="size" class="input-select">
                                <option value="1">M</option>
                                <option value="2">L</option>
                                <option value="3">XL</option>
                                <option value="4">XXL</option>
                                </select>';
                            }elseif($items['size'] == '2'){
                                echo '<select name="size" class="input-select">
                                <option value="2">L</option>
                                <option value="1">M</option>
                                <option value="3">XL</option>
                                <option value="4">XXL</option>
                                </select>';
                            }elseif($items['size'] == '3'){
                                echo '<select name="size" class="input-select">
                                <option value="3">XL</option>
                                <option value="1">M</option>
                                <option value="2">L</option>
                                <option value="4">XXL</option>
                                </select>';
                            }else{
                                echo '<select name="size" class="input-select">
                                <option value="4">XXL</option>
                                <option value="1">M</option>
                                <option value="2">L</option>
                                <option value="3">XL</option>
                                </select>';
                            }
                            ?>
                            </td>
                            <td>
                                <div class="input-number" style="width: 150px; margin-left: 70px;">
                                    <input name="qty" id="quantityInput" type="number" value="<?= $items['quantity'] ?>">
                                    <span id="increaseBtn" class="qty-up">+</span>
                                    <span id="decreaseBtn" class="qty-down">-</span>
                                </div>
                            </td>
                            <td><?= number_format($total) ?>đ</td>
                        </tr>
                        <input type="hidden" value="<?= $items['id']?>">
                        <?php
                         $cart += $total;
                    endforeach; ?>
                    </tbody>
                </table>
            </div>
            <hr style="height:2px;background-color:gray">
            <div class="row">
                <h3 class="col-sm-6">Tổng tiền của bạn:</h3>
                <input type="hidden" class="form-control" >
                <span class="col-sm-6 text-right" id="basic-addon2"><?= number_format($cart)?>đ</span>
            </div>
            <hr style="height:2px;background-color:gray; margin:0">
            <div class="" style="margin-top: 0.5rem; margin-left:62rem; position: absolute">
                <button type="button" class="btn btn-danger"><a href="?url=ClientHomeController/ClientCheckoutPage">Cập nhập</a></button>
            </div>
        </form>
        <form action="" style="position: relative; top: 0.5rem; margin-left:68.8rem" method="post">
            <input type="hidden" value="<?= $cart ?>" class="form-control">
            <button type="button" class="btn btn-danger col-1"><a href="?url=ClientHomeController/ClientCheckoutPage">Thanh toán</a></button>
        </form>
    </div>

    <!-- /row -->
</div>
<!-- /container -->
<style>

</style>
<!-- /SECTION -->