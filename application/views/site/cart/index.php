<?php $this->load->view('site/partials/banner') ?>

<!-- Shoping Cart Section Begin -->
<section class="shoping-cart spad">
	<div class="container">
		<?php if ($this->session->flashdata('message')): ?>
			<div class="nNote nInformation hideit">
				<h3><strong>Thông báo: </strong><?php echo $this->session->flashdata('message') ?></h3>
			</div>
		<?php endif; ?>
		<br>
		<?php if ($user_id_login):
			if (!$cart_products): ?>
				<div class="row">
					<h4>Giỏ hàng của bạn đang trống. <a href="<?php echo base_url('home') ?>" class="btn btn-success">Tiếp
							tục mua
							sắm</a>
					</h4>
				</div>
			<?php else: ?>
				<div class="row">
					<div class="col-lg-12">
						<div class="shoping__cart__table">
							<table>
								<thead>
								<tr>
									<th class="shoping__product">Sản phẩm</th>
									<th>Giá tiền</th>
									<th>Số lượng</th>
									<th>Tổng tiền</th>
									<th></th>
								</tr>
								</thead>
								<tbody>
								<?php foreach ($cart_products as $key => $product): ?>
									<tr>
										<td class="shoping__cart__item">
											<a href="<?php echo base_url('/' . $product->id . '-' . $product->slug . '.html') ?>"
											   title="<?= $product->name ?>">
												<img src="<?php echo base_url('uploads/products/' . $product->image) ?>"
													 alt=""
													 style="height: 100px">
												<h5><?= $product->name ?></h5>
											</a>
										</td>
										<td class="shoping__cart__price price_product">
											<span id="price_product"><?php echo number_format($product->price) ?></span>
											đ
										</td>
										<td class="shoping__cart__quantity quantity_product">
											<div class="quantity">
												<form action="<?php echo base_url('cart/update') ?>"
													  method="post">
													<input type="hidden" value="<?= $product->cart_id ?>" name="cart_id" >
													<div class="pro-qty">
														<input type="number" value="<?= $product->quantity ?>" min="1"
															   class="number-quantity" name="quantity">
													</div>
													<br>
													<button type="submit" class="btn btn-success">Cập nhật</button>
												</form>
											</div>
										</td>
										<td class="shoping__cart__total">
											<?php echo number_format($product->total) ?> đ
										</td>
										<td class="shoping__cart__item__close">
											<a href=""
											   data-url="<?php echo base_url('cart/delete/' . $product->cart_id) ?>"
											   class="btn btn-default cart_delete"><span class="icon_close"></span></a>

										</td>
									</tr>
								<?php endforeach; ?>

								</tbody>
							</table>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-12">
						<div class="shoping__cart__btns">
							<a href="<?php echo base_url('home') ?> " class="primary-btn cart-btn">Tiếp tục mua hàng</a>
<!--							<a href="--><?php //echo base_url('cart/update') ?><!-- "-->
<!--							   class="btn btn-primary primary-btn cart-btn cart-btn-right"><span-->
<!--										class="icon_loading"></span>-->
<!--								Cập nhật giỏ hàng</a>-->
						</div>
					</div>
					<div class="col-lg-6">
					</div>
					<div class="col-lg-6">
						<div class="shoping__checkout">
							<h5>Thành tiền</h5>
							<ul>
								<li>Total <span><?= $order_total ?> đ</span></li>
							</ul>
							<a href="<?php echo base_url('order') ?>" class="primary-btn">Đặt hàng</a>
						</div>
					</div>
				</div>
			<?php endif; ?>
		<?php else: ?>
			<div class="row">
				<h3>Bạn cần <a href="<?php echo base_url('login') ?>" class="btn btn-success">đăng nhập</a> để xem giỏ
					hàng</h3>
			</div>
		<?php endif; ?>
	</div>
</section>

