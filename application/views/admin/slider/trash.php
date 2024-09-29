<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="m-0 text-dark">Thùng rác slider</h1>
				</div><!-- /.col -->
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="<?= admin_url('home')?>">Trang quản trị</a></li>
						<li class="breadcrumb-item"><a href="<?= admin_url('slider')?>">Slider</a></li>
						<li class="breadcrumb-item active">Thùng rác</li>
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
					<a href="<?= admin_url('slider')?>" class="btn btn-success float-right"> Slider</a>
					<a href="<?= admin_url('slider/add')?>" class="btn btn-success float-right"><i class="fa fa-plus"></i> Thêm mới</a>
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
							<th scope="col">Mô tả</th>
							<th scope="col">Link</th>
							<th scope="col">Action</th>
						</tr>
						</thead>
						<tbody>

						<?php foreach($list as $slider): ?>
							<tr>
								<th scope="row"><?= $slider->id ?></th>
								<td><img src="<?= base_url('uploads/sliders/'). $slider->thumbnail ?>" style="height: 100px"></td>
								<td><?= $slider->title ?></td>
								<td><?= $slider->description ?></td>
								<td><?= $slider->link ?></td>
								<td>
									<a href="<?= admin_url('slider/edit/'.$slider->id)?>" class="btn btn-warning"><i class="fa fa-edit"></i> Sửa</a>
									<a href="<?= admin_url('slider/deleted_at/'.$slider->id)?>" class="btn btn-success" onclick="return confirm('Bạn có muốn khôi phục không?');"><i class="fa fa-plus"></i> Khôi phục</a>
									<a href="<?= admin_url('slider/delete/'.$slider->id)?>" class="btn btn-danger" onclick="return confirm('Bạn có muốn xoá không?');"><i class="fa fa-trash"></i> Xoá vĩnh viễn</a>
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
