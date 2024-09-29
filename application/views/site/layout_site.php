<!DOCTYPE html>
<html lang="vi">

<head>
	<?php $this->load->view('site/partials/head');?>
</head>

<body>
    <!-- Page Preloder -->
<!--    <div id="preloder">-->
<!--        <div class="loader"></div>-->
<!--    </div>-->

    <!-- Header Section Begin -->
    <?php $this->load->view('site/partials/header');?>
    <!-- Header Section End -->

	<!-- Content -->
	<?php  $this->load->view($temp, $this->data);?>
	<!-- End content -->

    <!-- Footer Section Begin -->
   <?php $this->load->view('site/partials/footer')?>
    <!-- Footer Section End -->
	<?php $this->load->view('site/partials/back_to_top');?>
    <!-- Js Plugins -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.nice-select.min.js"></script>
    <script src="js/jquery-ui.min.js"></script>
    <script src="js/jquery.slicknav.js"></script>
    <script src="js/mixitup.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/main.js"></script>

	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
	<script src="js/cart.js"></script>
	<!-- facebook -->
	<div id="fb-root"></div>
	<script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v6.0&appId=701066940668768&autoLogAppEvents=1"></script>

	<!-- zalo -->
	<div class="zalo-chat-widget" data-oaid="2874983549580581079" data-welcome-message="Katun Blog rất vui khi được hỗ trợ bạn!" data-autopopup="60" data-width="300" data-height="400" style="margin-right: 40px;margin-bottom: 100px"></div>
	<script src="https://sp.zalo.me/plugins/sdk.js"></script>
</body>

</html>
