<!-- /NAVIGATION -->

<!-- BREADCRUMB -->

<!-- /BREADCRUMB -->
<!-- SECTION -->
<?php

?>
<div class="section">
	<!-- container -->
	<div class="container">
		<!-- row -->
		<div class="row">
			<!-- ASIDE -->
			<div id="aside" class="col-md-3">
				<!-- aside Widget -->
				<div class="aside">
					<h3 class="aside-title">Danh mục</h3>
					<div class="checkbox-filter">
					<?php foreach($data['categories'] as $items): ?>
						<div class="input-checkbox">
							<input type="checkbox" id="category-1">
							<label for="category-1">
								<span></span>
								<?=$items['name']?>
							</label>
						</div>
						<?php endforeach; ?>
					</div>
				</div>
				<!-- /aside Widget -->

				<!-- aside Widget -->
				<div class="aside">
					<h3 class="aside-title">Top bán chạy</h3>
					<div class="product-widget">
						<div class="product-img">
							<img src="https://product.hstatic.net/1000357687/product/saigonese-modelartboard-1_c450dca60e714ee2b91fd959856b5914_1024x1024.png"
								alt="">
						</div>
						<div class="product-body">
							<p class="product-category">Category</p>
							<h3 class="product-name"><a href="#">product name goes here</a></h3>
							<h4 class="product-price">100.000đ<del class="product-old-price">150.000đ</del></h4>
						</div>
					</div>

					<div class="product-widget">
						<div class="product-img">
							<img src="https://product.hstatic.net/1000357687/product/ao-nauartboard-8_e0128448a4414fc99b7ae0a62ac0ae3f_1024x1024.png"
								alt="">
						</div>
						<div class="product-body">
							<p class="product-category">Category</p>
							<h3 class="product-name"><a href="#">product name goes here</a></h3>
							<h4 class="product-price">100.000đ<del class="product-old-price">140.000đ</del></h4>
						</div>
					</div>

					<div class="product-widget">
						<div class="product-img">
							<img src="https://product.hstatic.net/1000357687/product/ao-nauartboard-8_e0128448a4414fc99b7ae0a62ac0ae3f_1024x1024.png"
								alt="">
						</div>
						<div class="product-body">
							<p class="product-category">Category</p>
							<h3 class="product-name"><a href="#">product name goes here</a></h3>
							<h4 class="product-price">100.000đ <del class="product-old-price">140.000đ</del></h4>
						</div>
					</div>
				</div>
				<!-- /aside Widget -->
			</div>
			<!-- /ASIDE -->

			<!-- STORE -->
			<div id="store" class="col-md-9">
				<!-- store top filter -->
				<div class="store-filter clearfix">
					<div class="store-sort">
						<label>
							Sắp xếp theo:
							<select class="input-select" >
								<option value="0">Chọn phân loại</option>
								<option value="?keyword=new">Mới nhất</option>
								<option value="?keyword=old">Cũ nhất</option>
								<option value="?price=asc">Giá tăng dần</option>
								<option value="?price=desc">Giá giảm dần</option>
							</select>
						</label>
					</div>
					<ul class="store-grid">
						<li class="active"><i class="fa fa-th"></i></li>
						<li><a href="#"><i class="fa fa-th-list"></i></a></li>
					</ul>
				</div>
				<!-- /store top filter -->
				<!-- store products -->
				<div class="row">
					<!-- product -->
					<?php					
					 foreach ($data['products'] as $items): 
						foreach ($data['images'] as $image) {
							
							if ($image['product_id'] == $items['id']) {
								
								break;
							}
						}
					 ?>
						<a href="">
							<div class="col-md-4 col-xs-6">
								<div class="product">

										<div class="product-img">
											<img src="<?= PUBLIC_URL . $image['path'] ?>" alt="">
										</div>

									<div class="product-body">
										<p class="product-category"><?=$items['cateName'] ?></p>
										<h3 class="product-name"><a href="#"><?=$items['proName'] ?></a></h3>
										<h4 class="product-price"><?=number_format($items['price'] )?>đ
										</h4>
									</div>
									<div class="add-to-cart">
										<a href="?url=ClientHomeController/ClientProductPage/<?= $items['id'] ?>"><button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i>Xem chi tiết</button></a>
									</div>
								</div>
							</div>
						</a>

					<?php endforeach; ?>

					<div class="clearfix visible-sm visible-xs"></div>



					<div class="clearfix visible-lg visible-md visible-sm visible-xs"></div>

					<!-- product -->

					<!-- /product -->
				</div>
				<!-- /store products -->

				<!-- store bottom filter -->
				<div class="store-filter clearfix">

					<ul class="store-pagination">
						<li class="active">1</li>
						<li><a href="#">2</a></li>
						<li><a href="#">3</a></li>
						<li><a href="#">4</a></li>
						<li><a href="#"><i class="fa fa-angle-right"></i></a></li>
					</ul>
				</div>
				<!-- /store bottom filter -->
			</div>
			<!-- /STORE -->
		</div>
		<!-- /row -->
	</div>
	<!-- /container -->
</div>
<!-- /SECTION -->


<!-- FOOTER -->