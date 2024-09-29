<div class="blog__sidebar">

	<div class="blog__sidebar__item">
		<h4>Bài đăng gần đây</h4>
		<div class="blog__sidebar__recent">
			<?php foreach ($recent_news as $news): ?>
				<a href="<?php echo base_url('blog/'. $news->id .'-'. $news->slug.'.html')?>" class="blog__sidebar__recent__item">
					<div class="blog__sidebar__recent__item__pic">
						<img src="<?php echo base_url('uploads/news/'.$news->image)?>" alt="" style="width: 120px">
					</div>
					<div class="blog__sidebar__recent__item__text">
						<h6><?= $news->title ?></h6>
						<span><i class="fa fa-eye"></i> <?= $news->views ?></span>
					</div>
				</a>
			<?php endforeach; ?>
		</div>
	</div>
</div>
