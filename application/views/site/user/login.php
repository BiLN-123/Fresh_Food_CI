<?php $this->load->view('site/partials/banner') ?>

<div class="container mt-5" style="margin-bottom: 50px">
	<form action="" method="POST">
		<h3 style="color:red"><?php echo form_error('login')?></h3>
		<div class="form-group">
			<label for="exampleInputEmail1">Email</label>
			<input type="email" class="form-control" name="email" aria-describedby="emailHelp"
				   placeholder="Mời nhập email" required>
			<div class="error" id="email_error"><?php echo form_error('email')?></div>
		</div>
		<div class="form-group">
			<label for="exampleInputPassword1">Mật khẩu</label>
			<input type="password" class="form-control" name="password" placeholder="Mời nhập mật khẩu" required>
			<div class="error" id="password_error"><?php echo form_error('password')?></div>
		</div>

		<button type="submit" class="btn btn-primary">Đăng nhập</button>
	</form>
	<a class="btn float-right register" href="<?php echo base_url('register') ?>" style="color: blue">Chưa có tài khoản? Đăng ký.</a>

</div>
