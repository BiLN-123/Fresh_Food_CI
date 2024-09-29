<div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
	<ol class="carousel-indicators">
		<?php
		$i=0;
		foreach ($sliders as $sl):?>
		<li data-target="#carouselExampleCaptions" data-slide-to="<?= $i; ?>" <?php if($i == 0):?>class="active"<?php endif; ?>></li>
		<?php $i++; endforeach; ?>
	</ol>
	<div class="carousel-inner">
		<?php foreach ($sliders as $index_slider => $slider): ?>
			<div class="carousel-item <?php if($index_slider == 0){echo 'active';}else{echo '';} ?>">
				<a href="<?= $slider->link ?>"  target="_blank"><img src="<?php echo base_url('uploads/sliders/'.$slider->thumbnail) ?>"
					 class="d-block w-100" alt="..."></a>
				<div class="carousel-caption d-none d-md-block">
					<h5 style="color: white"><?= $slider->title ?></h5>
					<p style="color: white"><?= $slider->description ?></p>
				</div>
			</div>
		<?php endforeach; ?>
	</div>
	<a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
		<span class="carousel-control-prev-icon" aria-hidden="true"></span>
		<span class="sr-only">Previous</span>
	</a>
	<a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
		<span class="carousel-control-next-icon" aria-hidden="true"></span>
		<span class="sr-only">Next</span>
	</a>
</div>
