
<?php $this->load->view('site/partials/banner')?>
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v8.0&appId=701066940668768&autoLogAppEvents=1" nonce="DJB3lgHp"></script>

<!-- Blog Section Begin -->
<section class="blog spad">
	<div class="container">
		<div class="row">
			<div class="col-lg-8 col-md-7">
				<div class="blog__details__text">
					<img src="<?php echo base_url('uploads/blogs/'.$blog_details->image)?>" alt="">
					<p><?= $blog_details->content ?></p>
				</div>
				<div class="blog__details__content">
					<div class="row">
						<div class="col-lg-6">
							<div class="blog__details__author">
								<div class="blog__details__author__pic">
									<img src="img/blog/details/details-author.jpg" alt="">
								</div>
								<div class="blog__details__author__text">
									<h6>Lê Tấn Ngọc</h6>
									<span>Admin</span>
								</div>
							</div>
						</div>
						<div class="col-lg-6">
							<div class="blog__details__widget">
								<ul>
									<li>Ngày tạo: <?= $blog_details->created_at ?></li>
								</ul>
								<div class="blog__details__social">
									<a href="#"><i class="fa fa-facebook"></i></a>
									<a href="#"><i class="fa fa-twitter"></i></a>
									<a href="#"><i class="fa fa-google-plus"></i></a>
									<a href="#"><i class="fa fa-linkedin"></i></a>
									<a href="#"><i class="fa fa-envelope"></i></a>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="blog__details__comment">
					<div class="fb-comments" data-href="https://developers.facebook.com/docs/plugins/comments#configurator" data-numposts="5" data-width=""></div>
				</div>
			</div>
			<div class="col-lg-4 col-md-5">
				<div class="col-md-12">
					<?php $this->load->view('site/blog/partials/right') ?>
				</div>
				<div class="col-md-12">
					<?php $this->load->view('site/blog/components/recent_news') ?>
				</div>
			</div>

		</div>
	</div>
</section>
<!-- Blog Section End -->

