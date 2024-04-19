<!-- /BREADCRUMB -->
<?php use App\Core\Sessions; ?>
<!-- SECTION -->
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->

        <div class="row">
            <!-- Product main img -->
            <div class="col-md-5 col-md-push-2">
                <div id="product-main-img">

                    <?php foreach ($data['products'] as $item): ?>
                        <div class="product-preview">
                            <img src="<?= PUBLIC_URL . $item['path'] ?>" alt="">
                        </div>
                    <?php endforeach; ?>


                </div>
            </div>
            <!-- /Product main img -->

            <!-- Product thumb imgs -->
            <div class="col-md-2  col-md-pull-5">
                <div id="product-imgs">
                    <?php foreach ($data['products'] as $item): ?>
                        <div class="product-preview">
                            <img src="<?= PUBLIC_URL . $item['path'] ?>" alt="">
                        </div>
                    <?php endforeach; ?>

                </div>
            </div>
            <!-- /Product thumb imgs -->

            <!-- Product details -->
            <form class="col-md-5" method="post" enctype="multipart/form-data"
                action="?url=ClientHomeController/addCart">
                <input type="hidden" name="userid" value="<?= $_SESSION['user']['id'] ?>">
                <input type="hidden" name="status" value="1">
                <div class="product-details">
                    <input type="hidden" name="proid" value="<?= $data['products'][0]['id'] ?>">
                    <input type="hidden" name="name" value="<?= $data['products'][0]['proName'] ?>">
                    <h2 class="product-name"><?= $data['products'][0]['proName'] ?></h2>
                    <div>
                        <h3 class="product-price"><?= number_format($data['products'][0]['price']) ?>₫ </h3>
                        <input type="hidden" name="price" value="<?= $data['products'][0]['price'] ?>">
                        <?php if ($data['products'][0]['quantity'] != 0): ?>
                            <span class="product-available">Còn hàng</span>
                        <?php else: ?>
                            <span class="product-available">Hết hàng</span>
                        <?php endif; ?>
                    </div>
                    <?= $data['products'][0]['description'] ?>

                    <div class="product-options">
                        <label>
                            Kích thước
                            <select name="size" class="input-select">
                                <option value="1">M</option>
                                <option value="2">L</option>
                                <option value="3">XL</option>
                                <option value="4">XXL</option>
                            </select>
                        </label>

                    </div>

                    <div class="add-to-cart">
                        <div class="qty-label">
                            Qty
                            <div class="input-number">
                                <input name="qty" id="quantityInput" type="number" value="1">
                                <span id="increaseBtn" class="qty-up">+</span>
                                <span id="decreaseBtn" class="qty-down">-</span>
                            </div>
                        </div>
                        <button class="add-to-cart-btn" type="submit" name="submit">
                            <a>
                                <i class="fa fa-shopping-cart"></i>Thêm giỏ hàng
                            </a>
                        </button>
                    </div>



                    <ul class="product-links">
                        <li>Danh mục:</li>
                        <li><a href="#"><?= $data['products'][0]['cateName'] ?></a></li>
                    </ul>
                </div>
            </form>
            <!-- /Product details -->
            <!-- Product tab -->
            <div class="col-md-12">
                <div id="product-tab">
                    <!-- product tab nav -->
                    <ul class="tab-nav">
                        <li class="active"><a data-toggle="tab" href="#tab1">Đánh giá</a></li>
                        <li><a data-toggle="tab" href="#tab2">Chi tiết</a></li>
                        <li><a data-toggle="tab" href="#tab3">Mô tả</a></li>
                    </ul>
                    <!-- /product tab nav -->
                    <!-- product tab content -->
                    <div class="tab-content">
                        <!-- tab1  -->
                        <div id="tab1" class="tab-pane fade in active">
                            <div class="row">
                                <div class="col-md-12">
                                    <p><?= $data['products'][0]['description'] ?></p>
                                <!-- Rating -->

                                <!-- /Rating -->

                                <!-- Reviews -->
                                <div class="col-md-6">
                                    <div id="reviews">
                                        <ul class="reviews">
                                            <?php foreach ($data['comments'] as $items): ?>
                                                <li>
                                                    <div class="review-heading">
                                                        <h5 class="name"><?= $items['name'] ?></h5>
                                                        <p class="date"><?= $items['create_at'] ?></p>
                                                    </div>
                                                    <div class="review-body">
                                                        <p><?= $items['content'] ?></p>
                                                        <div class="review-btn">
                                                            <?php if ($_SESSION['user']['id'] === $items['user_id']): ?>
                                                                <div class="row">
                                                              
                                                               <form class=" review-btn-left"
                                                                    action="?url=ClientHomeController/deleteComment/<?= $items['id'] ?>"
                                                                    enctype="multipart/form-data" method="post" >
                                                                    <input type="hidden" name="proid"
                                                                        value="<?= $data['products'][0]['id'] ?>">
                                                                    <input type="hidden" name="delete"
                                                                        value="<?= $items['id'] ?>">
                                                                    <input type="submit"  name="submit" value="Xóa" >
                                                                </form>
                                                               
                                                                <form class=" review-btn-right"
                                                                    action="?url=ClientHomeController/updateComment/<?= $items['id'] ?>"
                                                                    enctype="multipart/form-data" method="post">
                                                                    <input type="hidden" name="proid"
                                                                        value="<?= $data['products'][0]['id'] ?>">
                                                                    <input type="hidden" name="iddupdate" value="">
                                                                    <input type="submit"  name="" value="Sửa">
                                                                </form>
                                                                </div>
                                                            <?php endif; ?>
                                                        </div>
                                                    </div>
                                                </li>
                                            <?php endforeach; ?>
                                        </ul>
                                    </div>
                                </div>
                                <!-- /Reviews -->
                                <!-- Review Form -->
                                <?php if (isset($data['updatecomments'])): ?>
                                    <?php if ($_SESSION['user']['id'] === $data['updatecomments']['user_id']): ?>
                                        <div class="col-md-3">
                                            <div id="review-form">
                                                <form class="review-form" method="post" enctype="multipart/form-data"
                                                    action="?url=ClientHomeController/editComment/<?= $data['updatecomments']['id'] ?>">
                                                    <input type="hidden" name="userid"
                                                        value="<?= $data['updatecomments']['user_id'] ?>">
                                                    <input type="hidden" name="proid" value="<?= $data['products'][0]['id'] ?>">
                                                    <textarea class="input" name="content"
                                                        placeholder="Nhập đánh giá"><?= $data['updatecomments']['content'] ?></textarea>
                                                    <?php if (isset($_SESSION['content'])): ?>
                                                        <p style="color: red;">
                                                            <?php echo Sessions::display_session('content'); ?>
                                                        </p>
                                                    <?php endif; ?>
                                                    <button name="submit" class="primary-btn">Cập nhập</button>
                                                </form>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                <?php else: ?>
                                    <div class="col-md-3">
                                        <div id="review-form">
                                            <form class="review-form" method="post" enctype="multipart/form-data"
                                                action="?url=ClientHomeController/addComment">
                                                <input type="hidden" name="userid" value="<?= $_SESSION['user']['id'] ?>">
                                                <input type="hidden" name="proid" value="<?= $data['products'][0]['id'] ?>">
                                                <textarea class="input" name="content"
                                                    placeholder="Nhập đánh giá"></textarea>
                                                <?php if (isset($_SESSION['content'])): ?>
                                                    <p style="color: red;">
                                                        <?php echo Sessions::display_session('content'); ?>
                                                    </p>
                                                <?php endif; ?>
                                                <button name="submit" class="primary-btn">Đánh giá</button>
                                            </form>
                                        </div>
                                    </div>
                                <?php endif; ?>
                                <!-- /Review Form -->
                            </div>
                        </div>

                        <!-- /tab1  -->

                        <!-- tab2  -->
                        <div id="tab2" class="tab-pane fade in">
                            <div class="row">
                                <div class="col-md-12">
                                    <p><?= $data['products'][0]['description'] ?>.</p>
                                </div>
                            </div>
                        </div>
                        <!-- /tab2  -->

                        <!-- tab3  -->
                        <div id="tab3" class="tab-pane fade in">
                            <div class="row">
                                <div class="col-md-12">
                                <p><?= $data['products'][0]['description'] ?>.</p>
                                </div>
                            </div>
                        </div>
                        <!-- /tab3  -->
                    </div>
                    <!-- /product tab content  -->
                </div>
            </div>
            <!-- /product tab -->
        </div>

        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /SECTION -->

<!-- Section -->
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <div class="col-md-12">
                <div class="section-title text-center">
                    <h3 class="title">Sản phẩm liên quan</h3>
                </div>
            </div>
            <!-- product -->
            <div class="col-md-3 col-xs-6">
                <div class="product">
                    <div class="product-img">
                        <img src="https://product.hstatic.net/1000357687/product/kemartboard-1_ff86809a8edf4115b55fbfe378f65311_1024x1024.png"
                            alt="">
                        <div class="product-label">
                            <span class="sale">-30%</span>
                        </div>
                    </div>
                    <div class="product-body">
                        <p class="product-category">Áo thun</p>
                        <h3 class="product-name"><a href="#">Áo thun trơn Fresh tee // Chocolate martini</a></h3>
                        <h4 class="product-price">100.000đ <del class="product-old-price">150.000đ</del></h4>
                        <div class="product-rating">
                        </div>
                    </div>
                    <div class="add-to-cart">
                        <button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i>Thêm giỏ hàng</button>
                    </div>
                </div>
            </div>
            <!-- /product -->

            <!-- product -->
            <div class="col-md-3 col-xs-6">
                <div class="product">
                    <div class="product-img">
                        <img src="https://product.hstatic.net/1000357687/product/denartboard-1_33d3bed2228d4df6b6cc90a21448a9d8_1024x1024.png"
                            alt="">
                        <div class="product-label">
                            <span class="new">NEW</span>
                        </div>
                    </div>
                    <div class="product-body">
                        <p class="product-category">Áo thun</p>
                        <h3 class="product-name"><a href="#">Áo thun trơn Fresh tee // Black</a></h3>
                        <h4 class="product-price">100.000đ <del class="product-old-price">150.000đ</del></h4>
                        <div class="product-rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                        </div>
                    </div>
                    <div class="add-to-cart">
                        <button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i>Thêm giỏ hàng</button>
                    </div>
                </div>
            </div>
            <!-- /product -->

            <div class="clearfix visible-sm visible-xs"></div>

            <!-- product -->
            <div class="col-md-3 col-xs-6">
                <div class="product">
                    <div class="product-img">
                        <img src="https://product.hstatic.net/1000357687/product/model-ao-rongartboard-1_f47a6c91d78741e39e9964bd1390c9c9_1024x1024.png"
                            alt="">
                    </div>
                    <div class="product-body">
                        <p class="product-category">Áo thun</p>
                        <h3 class="product-name"><a href="#">12 con giáp // Áo thun Tổ Long</a></h3>
                        <h4 class="product-price">119.000đ<del class="product-old-price">169.000đ</del></h4>
                        <div class="product-rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star-o"></i>
                        </div>
                    </div>
                    <div class="add-to-cart">
                        <button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i>Thêm giỏ hàng</button>
                    </div>
                </div>
            </div>
            <!-- /product -->

            <!-- product -->
            <div class="col-md-3 col-xs-6">
                <div class="product">
                    <div class="product-img">
                        <img src="https://product.hstatic.net/1000357687/product/untitled-1artboard-1_85ce586041b44638b09cfb77a886d8d6_1024x1024.png"
                            alt="">
                    </div>
                    <div class="product-body">
                        <p class="product-category">Áo thun</p>
                        <h3 class="product-name"><a href="#">Áo thun Good Brand</a></h3>
                        <h4 class="product-price">188.000đ <del class="product-old-price">200.000đ</del></h4>
                        <div class="product-rating">
                        </div>
                    </div>
                    <div class="add-to-cart">
                        <button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i>Thêm giỏ hàng</button>
                    </div>
                </div>
            </div>
            <!-- /product -->

        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /Section -->
</div>
<!-- /NEWSLETTER -->