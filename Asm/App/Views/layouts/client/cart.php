<!-- SECTION -->
<div class="section">
    <!-- container -->
    <div class="container">
        <form action="" style="postion: relative">
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
                        foreach ($data['orders'] as $items) :
                            foreach ($data['images'] as $image) {
                                if ($image['product_id'] == $items['id']) {
                                    break;
                                }
                            }
                            $total = $items['quantity'] * $items['price'];
                        ?>
                            <tr class="">
                                <td scope="row"><i class="fa-solid fa-trash"></i></td>
                                <td>
                                    <img src="<?= PUBLIC_URL . $image['path'] ?>" alt="" width="100" height="100">
                                </td>
                                <td><?= $items['name'] ?></td>
                                <td><?= number_format($items['price']) ?>đ</td>
                                <td>
                                    <?php if ($items['size'] == 'M') {
                                        echo '<select name="size" class="input-select">
                                <option value="M">M</option>
                                <option value="L">L</option>
                                <option value="XL">XL</option>
                                <option value="XXL">XXL</option>
                                </select>';
                                    } elseif ($items['size'] == 'L') {
                                        echo '<select name="size" class="input-select">
                                <option value="L">L</option>
                                <option value="M">M</option>
                                <option value="XL">XL</option>
                                <option value="XXL">XXL</option>
                                </select>';
                                    } elseif ($items['size'] == 'XL') {
                                        echo '<select name="size" class="input-select">
                                <option value="XL">XL</option>
                                <option value="M">M</option>
                                <option value="L">L</option>
                                <option value="XXL">XXL</option>
                                </select>';
                                    } else {
                                        echo '<select name="size" class="input-select">
                                <option value="XXL">XXL</option>
                                <option value="M">M</option>
                                <option value="L">L</option>
                                <option value="XL">XL</option>
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
                                <td><?= $total ?></td>
                            </tr>
                        <?php
                            $cart += $total;
                        endforeach; ?>
                    </tbody>
                </table>
            </div>
            <hr style="height:2px;background-color:gray">
            <div class="row">
                <h3 class="col-sm-6">Tổng tiền của bạn:</h3>
                <input type="hidden" class="form-control">
                <span class="col-sm-6 text-right" id="basic-addon2"><?= $cart ?></span>
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

<!-- /SECTION -->