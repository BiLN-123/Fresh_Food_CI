<?php $this->load->view('site/partials/banner') ?>

<!-- Checkout Section Begin -->
<section class="checkout spad">
	<div class="container">
		<?php if ($this->session->userdata('user_id_login')):
			if (!$cart_products): ?>
				<div class="row">
					<h3>Giỏ hàng của bạn đang trống. <a href="<?php echo base_url('home') ?>" class="btn btn-success">Tiếp tục mua
							sắm</a>
					</h3>
				</div>
			<?php else: ?>
				<div class="checkout__form">
					<h4>Chi tiết đơn hàng</h4>
					<form action="<?php echo base_url('order/checkout')?>" method="POST">
						<div class="row">
							<div class="col-lg-7 col-md-6">
								<div class="checkout__input">
									<p>Họ và tên người nhận<span>*</span></p>
									<input type="text" value="<?= $user->name ?>" name="name" required>
									<div class="error" id="name"><?php echo form_error('name')?></div>
								</div>
								<div class="checkout__input">
									<p>Địa chỉ người nhận<span>*</span></p>
									<input type="text" value="<?= $user->address ?>" name="address">
									<div class="error" id="address"><?php echo form_error('address')?></div>
								</div>
								<div class="checkout__input">
									<p>Số điện thoại<span>*</span></p>
									<input type="text" name="phone" value="<?= $user->phone ?>">
									<div class="error" id="phone"><?php echo form_error('phone')?></div>
								</div>
								<div class="checkout__input">
									<p>Ghi chú</p>
									<textarea  name="note" rows="5" style="width: 100%"></textarea>
								</div>
							</div>
							<div class="col-lg-5 col-md-6">
								<div class="checkout__order">
									<h4>Đơn hàng của bạn</h4>
									<div class="checkout__order__products">Sản phẩm <span>Tổng tiền</span></div>
									<ul>
										<?php foreach ($cart_products as $product): ?>
											<li><?= $product->name ?><span><?php echo number_format($product->price) ?></span></li>
										<?php endforeach; ?>
									</ul>
									<div class="checkout__order__total">Thành tiền <span><?php echo number_format($order_total) ?> VNĐ</span></div>
									<button type="submit" class="site-btn">Xác nhận đặt hàng</button>
								</div>
							</div>
						</div>
					</form>
				</div>
			<?php endif;
		else: ?>
			<div class="row">
				<h3>Bạn cần <a href="<?php echo base_url('login') ?>" class="btn btn-success">đăng nhập</a> để mua hàng</h3>
			</div>
		<?php endif; ?>
	</div>
</section>
<!-- Checkout Section End -->
