<!DOCTYPE html>
<html lang="en">
<?php
include "App/Views/layouts/client/stylesheet.php";
?>

<body>
	<!-- HEADER -->
	<header>
		<!-- MAIN HEADER -->
		<div id="header">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<!-- LOGO -->
					<div class="col-md-3">
						<div class="header-logo">
							<a href="#" class="logo">
								<img src="./img/logo.png" alt="">
							</a>
						</div>
					</div>
					<!-- /LOGO -->

					<!-- SEARCH BAR -->
					<div class="col-md-6">
						<div class="header-search">
							<form action="?url=ClientHomeController/ClientCategoriesPage" method="GET" id="formSearch">
								<select class="input-select">
									<option value="0">Sản phẩm</option>
									<option value="1">Áo</option>
									<option value="1">Nón</option>
									<option value="1">Quần</option>
								</select>
								<input class="input" placeholder="Nhập vào tìm kiếm..." name="keyword" type="text">
								<button class="search-btn" type="submit">Tìm</button>
							</form>
						
						</div>
					</div>
					<!-- /SEARCH BAR -->

					<!-- ACCOUNT -->
					<div class="col-md-3 clearfix">
						<div class="header-ctn">
							<!-- Wishlist -->
							<?php
							if (isset($_SESSION['user']['role']) && $_SESSION['user']['role'] == 0) :
							?>
								<div class="dropdown">
									<a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
										<i class="fa fa-user-o"></i>
										<span>Tài khoản</span>
									</a>
									<div class="cart-dropdown" style="width: auto;">
										<div class="cart-btns">
											<a href="?url=ClientHomeController/showAccount" style="display: block; width: 200px; text-decoration: none;">Tài khoản</a>
											<a href="?url=LoginController/Logout" style="display: block; width: 200px; text-decoration: none;">
												Đăng xuất <i class="fa fa-arrow-circle-right" style="margin-left: 5px;"></i>
											</a>
										</div>
									</div>

								</div>
								<div class="dropdown">
									<a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
										<i class="fa fa-shopping-cart"></i>
										<span>Giỏ hàng</span>
										<div class="qty"><?= $data['count'] ?></div>
									</a>
									<div class="cart-dropdown">
										<!-- <div class="cart-list">
											<div class="product-widget">
												<div class="product-img">
													<img src="https://product.hstatic.net/1000357687/product/raglangartboard-13_076e1be1e0e047ad94232fa3eaacadf0_1024x1024.png" alt="">
												</div>
												<div class="product-body">
													<h3 class="product-name"><a href="#">product name goes here</a></h3>
													<h4 class="product-price"><span class="qty">1x</span>150.000đ</h4>
												</div>
												<button class="delete"><i class="fa fa-close"></i></button>
											</div>

											<div class="product-widget">
												<div class="product-img">
													<img src="https://product.hstatic.net/1000357687/product/raglangartboard-13_076e1be1e0e047ad94232fa3eaacadf0_1024x1024.png" alt="">
												</div>
												<div class="product-body">
													<h3 class="product-name"><a href="#">product name goes here</a></h3>
													<h4 class="product-price"><span class="qty">3x</span>150.000đ</h4>
												</div>
												<button class="delete"><i class="fa fa-close"></i></button>
											</div>
										</div>
										<div class="cart-summary">
											<small>3 sản phẩm</small>
											<h5>TỔNG: 300.000đ</h5>
										</div> -->
										<div class="cart-btns">
											<a href="?url=ClientHomeController/ClientCartPage">Giỏ hàng</a>
											<a href="?url=ClientHomeController/ClientCheckoutPage">Thanh toán<i class="fa fa-arrow-circle-right"></i></a>
										</div>
									</div>
								</div>
							<?php else : ?>
								<div>
									<a href="?url=LoginController/LoginPage">
										<i class="fa fa-user-o"></i>
										<span>Đăng nhập</span>
									</a>
								</div>
								<div class="dropdown">
									<a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
										<i class="fa fa-shopping-cart"></i>
										<span>Giỏ hàng</span>
									</a>
								</div>
							<?php endif; ?>
							<!-- Menu Toogle -->
							<div class="menu-toggle">
								<a href="#">
									<i class="fa fa-bars"></i>
									<span>Menu</span>
								</a>
							</div>
							<!-- /Menu Toogle -->
						</div>
					</div>
					<!-- /ACCOUNT -->
				</div>
				<!-- row -->
			</div>
			<!-- container -->
		</div>
		<!-- /MAIN HEADER -->
	</header>
	<nav id="navigation">
		<!-- container -->
		<div class="container">
			<!-- responsive-nav -->
			<div id="responsive-nav">
				<!-- NAV -->
				<ul class="main-nav nav navbar-nav">
					<li><a href="?url=ClientHomeController/ClientHomePage">Trang chủ</a></li>
					<!-- <li><a href="?url=ClientHomeController/ClientCategoriesPage">Sản phẩm</a></li> -->
					<li><a href="?url=ClientHomeController/ClientAllProductPage">Sản phẩm</a></li>
					<!-- <li><a href="?url=ClientHomeController/ClientBlogsPage">Tin tức</a></li>
					<li><a href="#">Giới thiệu</a></li>
					<li><a href="?url=ClientHomeController/ClientContactPage">Liên hệ</a></li> -->

				</ul>
				<!-- /NAV -->
			</div>
			<!-- /responsive-nav -->
		</div>
		<!-- /container -->
	</nav>
	<!-- /HEADER -->