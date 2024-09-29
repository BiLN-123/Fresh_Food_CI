<!-- Breadcrumb Section Begin -->
<?php $this->load->view('site/partials/banner') ?>
<!-- Breadcrumb Section End -->

<?php if($product == ''):?>
	<div class="container" style="padding-top: 100px; padding-bottom: 100px">
		<h2>Sản phẩm không tồn tại hoặc đã bị xoá.</h2>
	</div>
<?php else: ?>
<!-- Product Details Section Begin -->
<section class="product-details spad">
	<div class="container">
		<div class="row">
			<div class="col-lg-6 col-md-6">
				<div class="product__details__pic">
					<div class="product__details__pic__item">
						<img class="product__details__pic__item--large"
							 src="<?php echo base_url('uploads/products/'.$product->image) ?>" alt="">
					</div>
				</div>
			</div>
			<div class="col-lg-6 col-md-6">
				<div class="product__details__text">
					<h3><?= $product->name ?></h3>
					<div class="product__details__price"><?= number_format($product->price) ?> đ</div>
					<p><?= $product->description ?></p>
					<div class="product__details__quantity">
						<div class="quantity">
							<div class="pro-qty">
								<input type="text" value="1" id="quantity">
							</div>
						</div>
					</div>
					<a href="" data-url="<?php echo base_url('cart/add/'.$product->id.'/1') ?> " class="primary-btn add_to_cart">Thêm vào giỏ hàng</a>
				</div>
			</div>
			<div class="col-lg-12">
				<div class="product__details__tab">
					<ul class="nav nav-tabs" role="tablist">
						<li class="nav-item">
							<a class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab"
							   aria-selected="true">Thông tin sản phẩm</a>
						</li>
<!--						<li class="nav-item">-->
<!--							<a class="nav-link" data-toggle="tab" href="#tabs-2" role="tab"-->
<!--							   aria-selected="false"></a>-->
<!--						</li>-->
						<li class="nav-item">
							<a class="nav-link" data-toggle="tab" href="#tabs-3" role="tab"
							   aria-selected="false">Nhận xét <span>(1)</span></a>
						</li>
					</ul>
					<div class="tab-content">
						<div class="tab-pane active" id="tabs-1" role="tabpanel">
							<div class="product__details__tab__desc">
								<h6>Chi tiết thông tin sản phẩm</h6>
								<p><?= $product->content ?></p>
							</div>
						</div>
						<div class="tab-pane" id="tabs-3" role="tabpanel">
							<div class="product__details__tab__desc">
								<h6>Đánh giá sản phẩm</h6>
								<p>Sản phẩm chất lượng</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- Product Details Section End -->

<!-- Related Product Section Begin -->
<section class="related-product">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="section-title related__product__title">
					<h2>Sản phẩm liên quan</h2>
				</div>
			</div>
		</div>
		<div class="row">
			<?php foreach ($four_recent_products as $product): ?>
			<div class="col-lg-3 col-md-4 col-sm-6">
				<div class="product__item">
					<div class="product__item__pic set-bg" data-setbg="<?php echo base_url('uploads/products/'.$product->image)?>">
						<ul class="product__item__pic__hover">
<!--							<li><a href="#"><i class="fa fa-heart"></i></a></li>-->
<!--							<li><a href="#"><i class="fa fa-retweet"></i></a></li>-->
							<li><a href="" data-url="<?php echo base_url('cart/add/'.$product->id.'/1') ?> " class=" add_to_cart"><i class="fa fa-shopping-cart"></i></a></li>
						</ul>
					</div>
					<div class="product__item__text">
						<h6><a href="<?php echo base_url('/'.$product->id.'-'.$product->slug.'.html')?>"><?= $product->name ?></a></h6>
						<h5><?php echo number_format($product->price) ?> VNĐ</h5>
					</div>
				</div>
			</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>
<!-- Related Product Section End -->
<?php endif; ?>
