<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="m-0 text-dark">Cài đặt cửa hàng</h1>
				</div><!-- /.col -->
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="<?= admin_url('home')?>">Trang quản trị</a></li>
						<li class="breadcrumb-item active">Cài đặt</li>
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
					<div class="btn-group float-right" >
						<button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							Thêm mới
						</button>
						<div class="dropdown-menu">
							<a class="dropdown-item" href="<?= admin_url('setting/add/text')?>">Text</a>
							<a class="dropdown-item" href="<?= admin_url('setting/add/textarea')?>">Textarea</a>
							<a class="dropdown-item" href="<?= admin_url('setting/add/ckeditor')?>">Ckeditor</a>
						</div>

					</div>
				</div>
				<!-- /.col-md-6 -->
				<?php $this->load->view('admin/message', $this->data);?>
				<div class="col-md-12">
					<table class="table">
						<thead>
						<tr>
							<th scope="col">ID</th>
							<th scope="col">Tên</th>
							<th scope="col">Giá trị</th>
							<th scope="col">Action</th>
						</tr>
						</thead>
						<tbody>

						<?php foreach($setting as $set): ?>
							<tr>
								<th scope="row"><?= $set->id ?></th>
								<td><?= $set->setting_key ?></td>
								<td><textarea rows="4" cols="50" disabled><?= $set->setting_value ?></textarea></td>
								<td>
									<a href="<?= admin_url('setting/edit/'.$set->id)?>" class="btn btn-success">Sửa</a>
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
