<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="m-0 text-dark">Cập nhật thông tin khách hàng</h1>
				</div><!-- /.col -->
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="<?= admin_url('home')?>">Trang quản trị</a></li>
						<li class="breadcrumb-item"><a href="<?= admin_url('user/list/all')?>">Khách hàng</a></li>
						<li class="breadcrumb-item active">Cập nhật</li>
					</ol>
				</div><!-- /.col -->
			</div><!-- /.row -->
		</div><!-- /.container-fluid -->
	</div>
	<!-- /.content-header -->
	<!-- Main content -->
	<div class="content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-6">
					<form action="" method="POST">
						<div class="form-group">
							<label>Họ và tên</label>
							<input type="text" class="form-control" name="name" placeholder="Nhập họ và tên" value="<?= $user->name ?>">
						</div>

						<div class="form-group">
							<label>Email</label>
							<input type="text" class="form-control" name="email" placeholder="Nhập email" value="<?= $user->email ?>" disabled>
						</div>

						<div class="form-group">
							<label>Địa chỉ</label>
							<input type="text" class="form-control" name="address" placeholder="Nhập địa chỉ" value="<?= $user->address ?>">
						</div>

						<div class="form-group">
							<label>Số điện thoại</label>
							<input type="text" class="form-control" name="phone" placeholder="Nhập số điện thoại" value="<?= $user->phone ?>">
						</div>

						<div class="form-group">
							<label>Mật khẩu</label>
							<input type="text" class="form-control" name="password">
						</div>

						<div class="form-group">
							<label>Xác nhận mật khẩu</label>
							<input type="password" class="form-control" name="re_password">
						</div>

						<button type="submit" class="btn btn-primary">Cập nhật</button>
					</form>
				</div>
			</div>
			<!-- /.row -->
		</div><!-- /.container-fluid -->
		<?php $this->load->view('admin/message', $this->data);?>

	</div>
	<!-- /.content -->
</div>
