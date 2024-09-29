<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="m-0 text-dark">Quản lý bài viết</h1>
				</div><!-- /.col -->
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="<?= admin_url('home')?>">Trang quản trị</a></li>
						<li class="breadcrumb-item active">Bài viết</li>
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
				<div class="col-md-12 ">
					<a href="<?= admin_url('news/trash')?>" class="btn btn-default float-right"><i class="fa fa-trash"></i> Thùng rác</a>
					<a href="<?= admin_url('news/add')?>" class="btn btn-success float-right"><i class="fa fa-plus"></i> Thêm mới</a>
				</div>
				<!-- /.col-md-6 -->
				<?php $this->load->view('admin/message', $this->data);?>
				<div class="col-md-12">
					<table class="table">
						<thead>
						<tr>
							<th scope="col">ID</th>
							<th scope="col">Ảnh</th>
							<th scope="col">Tiêu đề</th>
							<th scope="col">Trạng thái</th>
							<th scope="col">Action</th>
						</tr>
						</thead>
						<tbody>

						<?php foreach($list as $news): ?>
						<tr>
							<th scope="row"><?= $news->id ?></th>
							<td><img src="<?= base_url('uploads/news/'). $news->image ?>" style="height: 100px"></td>
							<td><?= $news->title ?></td>
							<td><input type="checkbox" <?php if($news->status == 1){echo 'checked';} ?> ></td>
							<td>
								<a href="<?= admin_url('news/edit/'.$news->id)?>" class="btn btn-warning"><i class="fa fa-edit"></i> Sửa</a>
								<a href="<?= admin_url('news/deleted_at/'.$news->id)?>" class="btn btn-danger <?php if($news->status == 0){echo 'disabled';} ?>" onclick="return confirm('Bạn có muốn xoá không?');" id="deleted_at" ><i class="fa fa-trash"></i> Xoá</a>
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
