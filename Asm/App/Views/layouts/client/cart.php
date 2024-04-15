<!-- SECTION -->
<div class="section">
    <!-- container -->
    <div class="container">
        <form action="?url=ClientHomeController/Cart" method="post">
            <!-- row -->
            <h3 class="section-title">Giỏ hàng của bạn</h3>
            <div class="table-responsive">
                <table class="table text-center">
                    <thead>
                        <tr class="">
                            <th scope="col" class="text-center">Chọn</th>
                            <th scope="col" colspan="1" class="text-center">Sản phẩm</th>
                            <th scope="col" class="text-center"></th>
                            <th scope="col" class="text-center"></th>
                            <th scope="col" class="text-center">Size</th>
                            <th scope="col" class="text-center">Số lượng</th>
                            <th scope="col" class="text-center">Tổng tiền</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $cart = 0;
                        foreach ($data['carts'] as $items) :
                            foreach ($data['images'] as $image) {
                                if ($image['product_id'] == $items['idpro']) {
                                    break;
                                }
                            }
                            $total = $items['quantity'] * $items['price'];
                        ?>
                            <tr class="">
                                <td scope="row">
                                    <input type="checkbox" name="idupdate[]" value="<?= $items['id']; ?>">
                                    <input type="hidden" name="idcart[]" value="<?= $items['id']; ?>">
                                </td>
                                <td>
                                    <img src="<?= PUBLIC_URL . $image['path'] ?>" alt="" width="100" height="100">
                                </td>
                                <td><?= $items['name'] ?></td>
                                <td><?= number_format($items['price']) ?>đ</td>
                                <td>
                                    <select name="size[]" class="input-select">
                                        <?php
                                        $sizes = ['M', 'L', 'XL', 'XXL'];
                                        $selectedSize = $items['size'];
                                        foreach ($sizes as $size) {
                                            $value = array_search($size, $sizes) + 1;
                                            $selected = ($selectedSize == $value) ? 'selected' : '';
                                            echo "<option value=\"$value\" $selected>$size</option>";
                                        }
                                        ?>
                                    </select>
                                </td>
                                <td>
                                    <div class="input-number" style="width: 150px; margin-left: 70px;">
                                        <input name="qty[]" id="quantityInput" type="number" value="<?= $items['quantity'] ?>">
                                        <span id="increaseBtn" class="qty-up">+</span>
                                        <span id="decreaseBtn" class="qty-down">-</span>
                                    </div>
                                </td>
                                <td><?= number_format($total) ?>đ</td>
                                <td>
                                    <a href="?url=ClientHomeController/deleteCart/<?= $items['id']; ?>"><i class="fa-solid fa-trash"></i></a>
                                </td>
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
                <input type="hidden" name="total" value="<?=$cart ?>" class="form-control">
                <span class="col-sm-6 text-right" id="basic-addon2"><?= number_format($cart) ?>đ</span>
            </div>
            <hr style="height:2px;background-color:gray; margin:0">


            <div class="text text-right" style="margin-top: 2rem;">
                <button type="submit" name="update" class="btn btn-danger">Cập nhập</button>
                <button type="submit" name="pay" class="btn btn-danger">Thanh toán</button>
                <!-- <a href="?url=ClientHomeController/pay/" class="btn btn-danger">Thanh toán </a> -->
            </div>

        </form>

    </div>

    <!-- /row -->
</div>
<!-- /container -->

<!-- /SECTION -->