<div class="col-lg-4 col-md-5">
	<div class="col-md-12">
		<div class="blog__sidebar">
			<div class="blog__sidebar__item">
				<h4>Sản phẩm bán chạy</h4>
				<div class="blog__sidebar__recent">
					<?php foreach ($buyed_products as $product): ?>
						<a href="<?php echo base_url('/'. $product->id .'-'. $product->slug.'.html')?>" class="blog__sidebar__recent__item">
							<div class="blog__sidebar__recent__item__pic">
								<img src="<?php echo base_url('uploads/products/'.$product->image)?>" alt="" style="width: 120px">
							</div>
							<div class="blog__sidebar__recent__item__text">
								<h6><?= $product->name ?></h6>
								<span>Mua: <?= $product->buyed ?></span>
							</div>
						</a>
					<?php endforeach; ?>
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-12">
		<div class="blog__sidebar">
			<div class="blog__sidebar__item">
				<h4>Sản phẩm xem nhiều</h4>
				<div class="blog__sidebar__recent">
					<?php foreach ($views_products as $product): ?>
						<a href="<?php echo base_url('/'. $product->id .'-'. $product->slug.'.html')?>" class="blog__sidebar__recent__item">
							<div class="blog__sidebar__recent__item__pic">
								<img src="<?php echo base_url('uploads/products/'.$product->image)?>" alt="" style="width: 120px">
							</div>
							<div class="blog__sidebar__recent__item__text">
								<h6><?= $product->name ?></h6>
								<span><i class="fa fa-eye"></i> <?= $product->views ?></span>
							</div>
						</a>
					<?php endforeach; ?>
				</div>
			</div>
		</div>
	</div>

</div>
