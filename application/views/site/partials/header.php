<header class="header">
	<div class="header__top">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 col-md-6">
					<div class="header__top__left">
						<ul>
							<?php if(isset($email)){ ?>
								<li><i class="fa fa-envelope"></i>  <?= $email; ?> </li>
							<?php } ?>
						</ul>
					</div>
				</div>
				<div class="col-lg-6 col-md-6">
					<div class="header__top__right">
						<div class="header__top__right__social">
							<?php if(isset($facebook)){ ?>
								<a href="<?= $facebook;?>" target="_blank"><i class="fa fa-facebook"></i></a>
							<?php } ?>

							<?php if(isset($twitter)){ ?>
								<a href="<?= $twitter;?>" target="_blank"><i class="fa fa-twitter"></i></a>
							<?php } ?>

							<?php if(isset($linkedin)){ ?>
								<a href="<?= $linkedin;?>" target="_blank"><i class="fa fa-linkedin"></i></a>
							<?php } ?>

						</div>

						<div class="header__top__right__auth">
							<?php $this->load->view('site/partials/account') ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="container">
		<div class="row">
			<div class="col-lg-3">
				<div class="header__logo">
					<a href="<?php echo base_url('home'); ?>"><img src="img/logo.png" alt=""></a>
				</div>
			</div>
			<div class="col-lg-6">
				<nav class="header__menu">
					<ul>
						<li><a href="<?php echo base_url('home'); ?>">Trang chủ</a></li>
						<li><a >Danh mục</a>
							<ul class="header__menu__dropdown">
								<?php foreach ($cate_list as $cate): ?>
								<li><a href="<?php echo base_url('category/'.$cate->id.'-'.$cate->slug.'.html')?>"><?= $cate->name ?></a></li>
								<?php endforeach; ?>
							</ul>
						</li>
						<li><a href="<?php echo base_url('blog') ?>">Bài viết</a></li>
						<li><a href="<?php echo base_url('contact')?> ">Liên hệ</a></li>
					</ul>
				</nav>
			</div>
			<div class="col-lg-3">
				<div class="header__cart">
					<ul>
						<li><a href="<?php echo base_url('cart')?>"><i class="fa fa-shopping-cart"></i> <span id="count_cart"><?php if($user_id_login):?> <?php echo $count_cart; else: echo '0'; endif;?></span></a></li>
					</ul>
				</div>
			</div>
		</div>
		<div class="humberger__open">
			<i class="fa fa-bars"></i>
		</div>
	</div>
</header>
<!-- Hero Section Begin -->
<section class="hero <?php if(isset($hero_normal)) echo 'hero-normal'?>">
	<div class="container">
		<div class="row">
			<div class="col-lg-3">
				<div class="hero__categories">
					<div class="hero__categories__all">
						<i class="fa fa-bars"></i>
						<span>Danh mục</span>
					</div>
					<ul>
						<?php foreach ($cate_list as $cate): ?>
							<li><a href="<?php echo base_url('category/'.$cate->id.'-'.$cate->slug.'.html')?>"><?= $cate->name?></a></li>
						<?php endforeach; ?>

					</ul>
				</div>
			</div>
			<div class="col-lg-9">
				<div class="hero__search">
					<div class="hero__search__form">
						<form action="<?php echo base_url('/search')?>" method="GET">
							<input type="text" placeholder="Bạn đang cần mua?" name="keyword">
							<button type="submit" class="site-btn">Tìm kiếm</button>
						</form>
					</div>
					<div class="hero__search__phone">
						<div class="hero__search__phone__icon">
							<i class="fa fa-phone"></i>
						</div>
						<div class="hero__search__phone__text">
							<?php if(isset($phone)): ?>
								<h5><?= $phone;?></h5>
							<?php endif; ?>
							<span>Hỗ trợ 24/7</span>
						</div>
					</div>
				</div>
				<!--				<div class="hero__item set-bg" data-setbg="img/hero/banner.jpg">-->
				<!--					<div class="hero__text">-->
				<!--						<span>FRUIT FRESH</span>-->
				<!--						<h2>Vegetable <br />100% Organic</h2>-->
				<!--						<p>Free Pickup and Delivery Available</p>-->
				<!--						<a href="#" class="primary-btn">SHOP NOW</a>-->
				<!--					</div>-->
				<!--				</div>-->
				<?php if(isset($sliders)) $this->load->view('site/partials/slider'); ?>
			</div>
		</div>
	</div>
</section>
<!-- Hero Section End -->

<!-- Categories Section Begin -->
<section class="categories" <?php if(isset($hero_normal)) echo 'hidden'?>>
	<div class="container">
		<div class="row">
			<div class="categories__slider owl-carousel">
				<div class="col-lg-3">
					<div class="categories__item set-bg" data-setbg="img/categories/cat-1.jpg">
						<h5><a href="#">Fresh Fruit</a></h5>
					</div>
				</div>
				<div class="col-lg-3">
					<div class="categories__item set-bg" data-setbg="img/categories/cat-2.jpg">
						<h5><a href="#">Dried Fruit</a></h5>
					</div>
				</div>
				<div class="col-lg-3">
					<div class="categories__item set-bg" data-setbg="img/categories/cat-3.jpg">
						<h5><a href="#">Vegetables</a></h5>
					</div>
				</div>
				<div class="col-lg-3">
					<div class="categories__item set-bg" data-setbg="img/categories/cat-4.jpg">
						<h5><a href="#">drink fruits</a></h5>
					</div>
				</div>
				<div class="col-lg-3">
					<div class="categories__item set-bg" data-setbg="img/categories/cat-5.jpg">
						<h5><a href="#">drink fruits</a></h5>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- Categories Section End -->
