<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="m-0 text-dark">Cập nhật danh mục</h1>
				</div><!-- /.col -->
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="{{URL::to('admin/home')}}">Trang quản trị</a></li>
						<li class="breadcrumb-item"><a href="{{Route('categories.index')}}">Danh mục</a></li>
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
							<label>Tên danh mục</label>
							<input type="text" class="form-control" id="name" name="name" placeholder="Nhập tên danh mục" value="<?= $category->name ?>">
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
