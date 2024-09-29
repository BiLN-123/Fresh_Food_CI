<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="m-0 text-dark">Quản lý khách hàng</h1>
				</div><!-- /.col -->
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="<?= admin_url('home') ?>">Trang quản trị</a></li>
						<li class="breadcrumb-item active">Khách hàng</li>
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
				<div class="col-md-12">
					<ul class="nav nav-tabs">
						<?php $segment = $this->uri->segment(4); ?>
						<li class="nav-item">
							<a class="nav-link <?php if($segment == 'all'){echo 'active';} ?>" href="<?php echo admin_url('user/list/all') ?>">Tất cả</a>
						</li>
						<li class="nav-item">
							<a class="nav-link <?php if($segment == 'active'){echo 'active';} ?>" href="<?php echo admin_url('user/list/active') ?>">Hoạt động</a>
						</li>
						<li class="nav-item">
							<a class="nav-link <?php if($segment == 'hidden'){echo 'active';} ?>" href="<?php echo admin_url('user/list/hidden') ?>">Đã khoá</a>
						</li>
					</ul>
					<a href="<?= admin_url('category/add') ?>" class="btn btn-success float-right">Thêm mới</a>
				</div>
				<!-- /.col-md-6 -->
				<?php $this->load->view('admin/message', $this->data); ?>
				<div class="col-md-12">
					<table id="example" class="table table-bordered" style="width:100%">
						<thead>
						<tr>
							<th scope="col">ID</th>
							<th scope="col">Họ và tên</th>
							<th scope="col">Email</th>
							<th scope="col">Điện thoại</th>
							<th scope="col">Ngày tạo</th>
							<th scope="col">Thao tác</th>
						</tr>
						</thead>
						<tbody>

						<?php foreach ($list_users as $user): ?>
							<tr>
								<th scope="row"><?= $user->id ?></th>
								<th scope="row"><?= $user->name ?></th>
								<th scope="row"><?= $user->email ?></th>
								<th scope="row"><?= $user->phone ?></th>
								<th scope="row"><?= $user->created_at ?></th>
								<td>
									<a href="<?= admin_url('user/edit/' . $user->id) ?>"
									   class=" ">Sửa</a> -|-
									<?php if($user->active == 1): ?>
									<a href="<?= admin_url('user/update_status/' . $user->id) ?>"
									   onclick="return confirm('Bạn có chắc chắn muốn khoá tài khoản này');" id="show_at">
										Khoá</a> -|-
									<?php else: ?>
										<a href="<?= admin_url('user/update_status/' . $user->id) ?>"
										   onclick="return confirm('Bạn có chắc chắn muốn mở khoá tài khoản này');" id="show_at">
											Mở khoá</a> -|-
									<?php endif; ?>
									<a href="<?= admin_url('user/purchase/' . $user->id) ?>" id="deleted_at"> Xem đơn hàng</a>
								</td>
							</tr>
						<?php endforeach; ?>
						</tbody>
					</table>
				</div>
				<!-- /.col-md-6 -->
			</div>
			<!-- /.row -->
		</div><!-- /.container-fluid -->
	</div>
	<!-- /.content -->
</div>
