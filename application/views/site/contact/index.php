
<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-section set-bg" data-setbg="img/breadcrumb.jpg">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 text-center">
				<div class="breadcrumb__text">
					<h2>Liên hệ</h2>
					<div class="breadcrumb__option">
						<a href="<?php echo base_url('home')?>">Trang chủ</a>
						<span>Liên hệ</span>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- Breadcrumb Section End -->

<?php $this->load->view('admin/message', $this->data);?>

<!-- Contact Section Begin -->
<section class="contact spad">
	<div class="container">
		<div class="row">
			<div class="col-lg-3 col-md-3 col-sm-6 text-center">
				<div class="contact__widget">
					<span class="icon_phone"></span>
					<h4>Điện thoại</h4>
					<p><?= $phone ?></p>
				</div>
			</div>
			<div class="col-lg-3 col-md-3 col-sm-6 text-center">
				<div class="contact__widget">
					<span class="icon_pin_alt"></span>
					<h4>Địa chỉ</h4>
					<p><?= $address ?></p>
				</div>
			</div>
			<div class="col-lg-3 col-md-3 col-sm-6 text-center">
				<div class="contact__widget">
					<span class="icon_clock_alt"></span>
					<h4>Thời gian mở cửa</h4>
					<p>10:00 am to 23:00 pm</p>
				</div>
			</div>
			<div class="col-lg-3 col-md-3 col-sm-6 text-center">
				<div class="contact__widget">
					<span class="icon_mail_alt"></span>
					<h4>Email</h4>
					<p><?= $email ?></p>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- Contact Section End -->

<!-- Map Begin -->
<?php $this->load->view('site/contact/components/map') ?>
<!-- Map End -->

<!-- Contact Form Begin -->
<?php $this->load->view('site/contact/components/contact') ?>
<!-- Contact Form End -->
<?php if(isset($message) && $message):?>
<script>
	alert($message);
</script>
<?php endif;?>
