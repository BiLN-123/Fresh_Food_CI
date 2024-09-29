
<?php $this->load->view('site/partials/banner')?>


<!-- Blog Section Begin -->
<section class="blog spad">
	<div class="container">
		<div class="row">
			<div class="col-lg-8 col-md-7">
				<div class="row">
					<?php foreach ($list_news as $news): ?>
					<div class="col-lg-6 col-md-6 col-sm-6">
						<div class="blog__item">
							<div class="blog__item__pic">
								<a href="<?php echo base_url('blog/'. $news->id .'-'. $news->slug.'.html')?>"><img src="<?php echo base_url('uploads/news/'.$news->image) ?>" alt=""></a>
							</div>
							<div class="blog__item__text">
								<ul>
									<li><i class="fa fa-calendar-o"></i> <?= $news->created_at ?></li>
									<li><i class="fa fa-eye"></i> <?= $news->views ?></li>
								</ul>
								<h5><a href="<?php echo base_url('blog/'. $news->id .'-'. $news->slug.'.html')?>"><?= $news->title ?></a></h5>
								<p><?= $news->description ?> </p>
								<a href="<?php echo base_url('blog/'. $news->id .'-'. $news->slug.'.html')?>" class="blog__btn">Xem chi tiết<span class="arrow_right"></span></a>
							</div>
						</div>
					</div>
					<?php endforeach; ?>

					<div class="col-lg-12">
						<div class="product__pagination blog__pagination">
							<a href="#">1</a>
							<a href="#">2</a>
							<a href="#">3</a>
							<a href="#"><i class="fa fa-long-arrow-right"></i></a>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-4 col-md-5">
				<?php $this->load->view('site/blog/partials/right') ?>
			</div>

		</div>
	</div>
</section>
<!-- Blog Section End -->

