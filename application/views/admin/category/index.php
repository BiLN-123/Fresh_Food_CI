<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="m-0 text-dark">Quản lý danh mục</h1>
				</div><!-- /.col -->
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="<?= admin_url('home')?>">Trang quản trị</a></li>
						<li class="breadcrumb-item active">Danh mục</li>
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
					<a href="<?= admin_url('category/add')?>" class="btn btn-success float-right">Thêm mới</a>
				</div>
				<!-- /.col-md-6 -->
				<?php $this->load->view('admin/message', $this->data);?>
				<div class="col-md-12">
					<table class="table">
						<thead>
						<tr>
							<th scope="col">ID</th>
							<th scope="col">Tên danh mục</th>
							<th scope="col">Action</th>
						</tr>
						</thead>
						<tbody>

						<?php foreach($list as $cate): ?>
						<tr>
							<th scope="row"><?= $cate->id ?></th>
							<td><?= $cate->name ?></td>
							<td>
								<a href="<?= admin_url('category/edit/'.$cate->id)?>" class="btn btn-success">Sửa</a>
								<a href="<?= admin_url('category/delete/'.$cate->id)?>" class="btn btn-danger" onclick="return confirm('Bạn có muốn xoá không?');">Xoá</a>
							</td>
						</tr>
						<?php endforeach;?>
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
