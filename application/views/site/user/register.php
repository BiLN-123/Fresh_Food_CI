<?php $this->load->view('site/partials/banner') ?>

<div class="container mt-5">
	<form action="" method="POST">
		<div class="form-group">
			<label for="inputEmail4">Họ</label>
			<input type="text" class="form-control" name="name" placeholder="Họ" required>
			<div class="error" id="name_error"><?php echo form_error('name')?></div>
		</div>
		<div class="form-group">
			<label for="inputEmail4">Tên</label>
			<input type="text" class="form-control" name="name" placeholder="Tên" required>
			<div class="error" id="name_error"><?php echo form_error('name')?></div>
		</div>
		<div class="form-group">
			<label for="inputEmail4">Email</label>
			<input type="email" class="form-control" name="email" placeholder="Email" required>
			<div class="error" id="email_error"><?php echo form_error('email')?></div>
		</div>
		<div class="form-group">
			<label for="inputPassword4">Mật khẩu</label>
			<input type="password" class="form-control" name="password" placeholder="Mật khẩu" required>
			<div class="error" id="password_error"><?php echo form_error('password')?></div>
		</div>
		<div class="form-group">
			<label for="inputPassword4">Nhập lại mật khâu</label>
			<input type="password" class="form-control" name="re_password" placeholder="Nhập lại mật khẩu" required>
			<div class="error" id="re_password_error"><?php echo form_error('re_password')?></div>
		</div>
		<div class="form-group">
			<label for="inputAddress">Địa chỉ</label>
			<input type="text" class="form-control" name="address" placeholder="Nhập địa chỉ" required>
			<div class="error" id="address_error"><?php echo form_error('address')?></div>
		</div>

		<div class="form-group">
			<label for="inputAddress">Số điện thoại</label>
			<input type="number" class="form-control" name="phone" placeholder="Nhập số điện thoại" required>
			<div class="error" id="phone_error"><?php echo form_error('phone')?></div>
		</div>
		<div class="form-group">
			<label for="img">Tải Lên Hình Ảnh</label>
			<input type="file" class="form-control" name="myImage" accept="image/png, image/jpg, image/jpeg">
		</div>
		<div class="form-group">
			<label for="img">BirthDay</label>
			<input type="date" name="bday" class="form-control">
		</div>
		<button type="submit" class="btn btn-primary">Đăng ký</button>
	</form>
</div>
