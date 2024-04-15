<div class="section" ng-app="myApp">

	<div class="container">

		<div class="row">

			<div class="col-md-7">

				<div class="billing-details">
					<div class="section-title">
						<h3 class="title">Thông tin đặt hàng</h3>
					</div>
					<div class="form-group">
						<input class="input" type="text" value="<?= $data['orders']['0']["name"] ?>" name="first-name" placeholder="Họ và Tên">
					</div>
					<div class="form-group">
						<input class="input" type="tel" value="0<?= $data['orders']['0']['phone'] ?>" name="tel" placeholder="Số điện thoại">
					</div>
					<div class="form-group">
						<input class="input" type="email" value="<?= $data['orders']['0']['email'] ?>" name="email" placeholder="Email">
					</div>

				</div>

				<div class="shiping-details">
					<div class="section-title">
						<h3 class="title">Ghi chú</h3>
					</div>
				</div>

				<div class="order-notes">
					<textarea class="input" name="address" placeholder="Order Notes">

					</textarea>
				</div>

			</div>

			<div class="col-md-5 order-details margin-top">
				<div class="section-title text-center">
					<h3 class="title">Đơn hàng</h3>
				</div>
				<div class="order-summary">
					<div class="order-col">
						<div><strong>Sản phẩm</strong></div>
						<div><strong>Giá tiền</strong></div>
					</div>
					<div class="order-products">

						<?php $cart = 0;
						foreach ($data['orderdetails'] as $items) :
							$total = $items['price'] * $items['quantity'] ?>
							<div class="order-col">
								<div><?= $items['name'] ?></div>
								<div><?= number_format($total) ?>đ</div>
							</div>

						<?php $cart += $total;
						endforeach; ?>
					</div>
					<div class="order-col">
						<div><strong>Tổng tiền</strong></div>
						<div><strong class="order-total"><?= number_format($cart) ?>đ</strong></div>
					</div>
				</div>

				<a href="#" class="primary-btn order-submit">Xác nhận</a>
			</div>

		</div>

	</div>

</div>