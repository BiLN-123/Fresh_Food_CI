<section class="from-blog spad">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="section-title from-blog__title">
					<h2>Bài viết</h2>
				</div>
			</div>
		</div>
		<div class="row">
			<?php foreach ($news as $new){?>
			<div class="col-lg-4 col-md-4 col-sm-6">
				<div class="blog__item">
					<div class="blog__item__pic">
						<a href="<?php echo base_url('blog/'. $new->id .'-'. $new->slug.'.html')?>"><img src="<?php echo base_url('uploads/news/'.$new->image)?>" alt=""></a>
					</div>
					<div class="blog__item__text">
						<ul>
							<li><i class="fa fa-calendar-o"></i> <?= $new->created_at?> </li>
<!--							<li><i class="fa fa-comment-o"></i> 5</li>-->
						</ul>
						<h5><a href="<?php echo base_url('blog/'. $new->id .'-'. $new->slug.'.html')?>"><?= $new->title?></a></h5>
						<p><?= $new->description?></p>
					</div>
				</div>
			</div>
			<?php } ?>
		</div>
	</div>
</section>
