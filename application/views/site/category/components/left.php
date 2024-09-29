<div class="col-lg-8 col-md-7 mt-5">
	<div class="row">
		<?php foreach ($products as $product): ?>
		<div class="col-lg-4 col-md-6 col-sm-6">
			<div class="product__item">
				<div class="product__item__pic set-bg" data-setbg="<?php echo base_url('uploads/products/' . $product->image) ?>">
					<ul class="product__item__pic__hover">
						<li><a href="" data-url="<?php echo base_url('cart/add/'.$product->id.'/1') ?> " class="add_to_cart"><i class="fa fa-shopping-cart" title="Thêm vào giỏ hàng"></i></a></li>
					</ul>
				</div>
				<div class="product__item__text">
					<h6><a href="<?php echo base_url('/' . $product->id . '-' . $product->slug . '.html') ?>"><?= $product->name?></a></h6>
					<h5><?php echo number_format($product->price) ?> VNĐ</h5>
				</div>
			</div>
		</div>
		<?php endforeach; ?>
	</div>
	<div class="product__pagination">
		<a href="#">1</a>
		<a href="#">2</a>
		<a href="#">3</a>
		<a href="#"><i class="fa fa-long-arrow-right"></i></a>
	</div>
</div>
