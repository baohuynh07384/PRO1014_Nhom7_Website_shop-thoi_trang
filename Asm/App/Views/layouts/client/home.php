<!-- Danh mục -->
<div class="section">

    <div class="container">

        <div class="row">
<?php 
    foreach ($data['categories'] as $item):
?>
            <a href="?url=ClientHomeController/ClientCategoriesPageID/<?=$item['id']  ?>">
                <div class="col-md-4 col-xs-6">
                    <div class="shop">
                        <div class="shop-img">
                            <img src="<?= PUBLIC_URL . $item['image'] ?>" style="height: 300px;">
                        </div>
                        <div class="shop-body">
                            <h3><?= $item['name'] ?></h3>
                            <a href="" class="cta-btn">Chi tiết <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                </div>
            </a>
          <?php endforeach;?>
        </div>
    </div>
</div>
<!-- List sản phẩm mới -->
<div class="section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-title">
                    <h3 class="title">Sản phẩm nổi bật</h3>
                </div>
            </div>
            <div class="col-md-12">
                <div class="row">
                    <div class="products-tabs">
                        <div id="tab1" class="tab-pane active">
                            <div class="products-slick" data-nav="#slick-nav-1">
                                <?php
                                foreach ($data['products'] as $items) :
                                    foreach ($data['images'] as $image) {

                                        if ($image['product_id'] == $items['id']) {

                                            break;
                                        }
                                    }
                                ?>
                                    <div class="product">
                                        <a href="?url=ClientHomeController/ClientProductPage/<?= $items['id'] ?>">
                                            <div class="product-img"> <img src="<?= PUBLIC_URL . $image['path'] ?>" alt="">
                                            </div>
                                            <div class="product-body">
                                                <p class="product-category"><?= $items['cateName'] ?></p>
                                                <h3 class="product-name"><a href="#"><?= $items['proName'] ?></a></h3>
                                                <h4 class="product-price"><?= number_format($items['price']) ?>đ</h4>
                                            </div>
                                            <div class="add-to-cart">
                                            <a href="?url=ClientHomeController/ClientProductPage/<?= $items['id'] ?>"><button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i>Xem chi tiết</button></a>
                                            </div>
                                        </a>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                            <div id="slick-nav-1" class="products-slick-nav"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- sản phẩm -->
<div class="section">
    <div class="container">

        <div class="row">
            <div class="section-title">
                <h3 class="title">Tất cả sản phẩm</h3>
            </div>
            <?php
            foreach ($data['products'] as $items) :
                foreach ($data['images'] as $image) {

                    if ($image['product_id'] == $items['id']) {

                        break;
                    }
                }
            ?>
                <a href="?url=ClientHomeController/ClientProductPage/<?= $items['id'] ?>">
                    <div class="col-md-4 col-xs-6" style="margin-top: 40px;">
                        <div class="product">
                            <div class="product-img">
                                <img src="<?= PUBLIC_URL . $image['path'] ?>" alt="">
                            </div>
                            <div class="product-body">
                                <p class="product-category"><?=$items['cateName'] ?></p>
                                <h3 class="product-name"><a href="#"><?=$items['proName'] ?></a></h3>
                                <h4 class="product-price"><?=number_format($items['price'] )?>đ</h4>
                            </div>
                            <div class="add-to-cart">
                            <a href="?url=ClientHomeController/ClientProductPage/<?= $items['id'] ?>"><button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i>Xem chi tiết</button></a>
                            </div>
                        </div>
                    </div>
                </a>
            <?php endforeach; ?>

            <div class="clearfix visible-lg visible-md"></div>
        </div>
        <div class="row">
            <a href="/?url=ClientHomeController/ClientCategoriesPage">
                <button type="submit" class="btn btn-warning" style="background-color:#D10024; margin-left: 555px; padding: 10px;">Xem Thêm</button>
            </a>
        </div>
    </div>
</div>