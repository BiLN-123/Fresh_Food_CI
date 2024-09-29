<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="m-0 text-dark">Thêm mới danh mục</h1>
				</div><!-- /.col -->
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="<?= site_url('admin')?>">Trang quản trị</a></li>
						<li class="breadcrumb-item"><a href="<?= site_url('admin/category')?>">Danh mục</a></li>
						<li class="breadcrumb-item active">Thêm mới</li>
					</ol>
				</div><!-- /.col -->
			</div><!-- /.row -->
		</div><!-- /.container-fluid -->
	</div>
	<!-- /.content-header -->

	<!-- Main content -->
	<div class="content">
		<div class="container-fluid">
			<?php $this->load->view('admin/message', $this->data);?>
			<div class="row">
				<div class="col-md-6">
					<form action="" method="Post">
						<div class="form-group">
							<label>Tên danh mục</label>
							<input type="text" class="form-control" id="name" name="name" placeholder="Nhập tên danh mục">
						</div>

						<button type="submit" class="btn btn-primary">Thêm</button>
					</form>
				</div>
			</div>
			<!-- /.row -->
		</div><!-- /.container-fluid -->
	</div>
	<!-- /.content -->
</div>
