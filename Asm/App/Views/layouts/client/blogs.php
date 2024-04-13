
<?php use App\Controllers\ProductController; ?>
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <div class="section-title">
                <h3 class="title">Tin tức</h3>
            </div>
            <?php foreach ($data as $item) : ?>
            <a href="?url=ClientHomeController/ClientBlogDetailPage/<?= $item['id']  ?>">
                <div class="col-md-4 col-xs-6" style="margin-bottom: 2rem;">
                    <div class="blog">
                        <div class="blog-img">
                            <img src="<?= PUBLIC_URL . $item['thumbnail'] ?>" style="height: 300px;" width="100%">
                        </div>
                        <div class="blog-body">
                            <h3 class="blog-title"><a href="#"><?= $item['title'] ?></a></h3>
                            <p><? ?></p>
                        </div>
                    </div>
                </div>
            </a>
            <?php endforeach;?>
         

        </div>
        <div class="store-filter clearfix">

            <ul class="store-pagination">
                <li class="active">1</li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">4</a></li>
                <li><a href="#"><i class="fa fa-angle-right"></i></a></li>
            </ul>
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /SECTION -->

<!-- FOOTER -->
