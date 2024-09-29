<section class="latest-product spad">
	<div class="container">
		<div class="row">
			<div class="col-lg-4 col-md-6">
				<div class="latest-product__text">
					<h4>Sản phẩm mới nhất</h4>
					<div class="latest-product__slider owl-carousel">
						<?php foreach ($latest_products as $key=>$product){
						?>
						<?php if($key % 3 == 0){?>
						<div class="latest-prdouct__slider__item">
							<?php } ?>
							<a href="<?php echo base_url('/'.$product->id.'-'.$product->slug.'.html')?>" class="latest-product__item">
								<div class="latest-product__item__pic">
									<img src="<?php echo base_url('uploads/products/'.$product->image)?>" alt="" style="width: 110px;">
								</div>
								<div class="latest-product__item__text">
									<h6><?= $product->name ?></h6>
									<span><?php echo number_format($product->price) ?> đ</span>
								</div>
							</a>

							<?php if($key % 3 == 2){?>
						</div>
					<?php } }?>


					</div>
				</div>
			</div>
			<div class="col-lg-4 col-md-6">
				<div class="latest-product__text">
					<h4>Sản phẩm mua nhiều</h4>
					<div class="latest-product__slider owl-carousel">
						<?php foreach ($buyed_products as $key=>$product){
							?>
							<?php if($key % 3 == 0){?>
								<div class="latest-prdouct__slider__item">
							<?php } ?>
							<a href="<?php echo base_url('/'.$product->id.'-'.$product->slug.'.html')?>" class="latest-product__item">
								<div class="latest-product__item__pic">
									<img src="<?php echo base_url('uploads/products/'.$product->image)?>" class="latest-product-image" alt="" style="width: 110px;">
								</div>
								<div class="latest-product__item__text">
									<h6><?= $product->name ?></h6>
									<span><?php echo number_format($product->price) ?> đ</span>
								</div>
							</a>

							<?php if($key % 3 == 2){?>
								</div>
							<?php } }?>


					</div>
				</div>
			</div>
			<div class="col-lg-4 col-md-6">
				<div class="latest-product__text">
					<h4>Sản phảm xem nhiều</h4>
					<div class="latest-product__slider owl-carousel">
						<?php foreach ($views_products as $key=>$product){
							?>
							<?php if($key % 3 == 0){?>
								<div class="latest-prdouct__slider__item">
							<?php } ?>
							<a href="<?php echo base_url('/'.$product->id.'-'.$product->slug.'.html')?>" class="latest-product__item">
								<div class="latest-product__item__pic">
									<img src="<?php echo base_url('uploads/products/'.$product->image)?>" class="latest-product-image" alt="" style="width: 110px;">
								</div>
								<div class="latest-product__item__text">
									<h6><?= $product->name ?></h6>
									<span><?php echo number_format($product->price) ?> đ</span>
								</div>
							</a>

							<?php if($key % 3 == 2){?>
								</div>
							<?php } }?>


					</div>
				</div>
			</div>
		</div>
	</div>
</section>
