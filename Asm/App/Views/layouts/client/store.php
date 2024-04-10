<!-- /NAVIGATION -->

<!-- BREADCRUMB -->

<!-- /BREADCRUMB -->
<!-- SECTION -->
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

						<div class="input-checkbox">
							<input type="checkbox" id="category-1">
							<label for="category-1">
								<span></span>
								Áo thun
								<small>(120)</small>
							</label>
						</div>

						<div class="input-checkbox">
							<input type="checkbox" id="category-2">
							<label for="category-2">
								<span></span>
								Nón
								<small>(740)</small>
							</label>
						</div>

						<div class="input-checkbox">
							<input type="checkbox" id="category-3">
							<label for="category-3">
								<span></span>
								Quần
								<small>(1450)</small>
							</label>
						</div>

						<div class="input-checkbox">
							<input type="checkbox" id="category-4">
							<label for="category-4">
								<span></span>
								Phụ kiện
								<small>(578)</small>
							</label>
						</div>

						<div class="input-checkbox">
							<input type="checkbox" id="category-5">
							<label for="category-5">
								<span></span>
								Túi xách
								<small>(120)</small>
							</label>
						</div>
					</div>
				</div>
				<!-- /aside Widget -->

				<!-- aside Widget -->
				<div class="aside">
					<h3 class="aside-title">Thương hiệu</h3>
					<div class="checkbox-filter">
						<div class="input-checkbox">
							<input type="checkbox" id="brand-1">
							<label for="brand-1">
								<span></span>
								Áo việt
								<small>(578)</small>
							</label>
						</div>
						<div class="input-checkbox">
							<input type="checkbox" id="brand-2">
							<label for="brand-2">
								<span></span>
								Áo tây
								<small>(125)</small>
							</label>
						</div>
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
							<select class="input-select">
								<option value="0">Mới nhất</option>
								<option value="1">Cũ nhất</option>
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