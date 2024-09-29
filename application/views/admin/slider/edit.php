<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="m-0 text-dark">Cập nhật slider</h1>
				</div><!-- /.col -->
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="<?= site_url('admin') ?>">Trang quản trị</a></li>
						<li class="breadcrumb-item"><a href="<?= site_url('admin/category') ?>">Slider</a></li>
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
			<?php $this->load->view('admin/message', $this->data); ?>
			<form action="" method="Post">
				<div class="row">
					<div class="col-md-5">
						<div class="form-group">
							<label>Tiêu đề</label>
							<input type="name" class="form-control" name="title" placeholder="Nhập tiêu đề"
								   value="<?= $slider->title ?>">
						</div>

						<div class="form-group">
							<label>Mô tả ngắn</label>
							<textarea type="name" class="form-control" name="description"
									  placeholder="Nhập tên mô tả ngắn"
									  cols="5"><?= $slider->description ?></textarea>
						</div>

						<div class="form-group">
							<label>Link</label>
							<textarea type="name" class="form-control" name="link"
									  placeholder="Nhập liên kết"
									  cols="5"><?= $slider->link ?></textarea>
						</div>

						<div class="form-group">
							<label>Trạng thái hiển thị <i>(Tích để hiển thị)</i>&nbsp;&nbsp;</label>
							<input type="checkbox" name="status" <?php if ($slider->status == 1) echo 'checked'; ?>>
						</div>
					</div>
					<div class="col-md-5">
						<div class="form-group">
							<label>Ảnh</label>
							<img src="<?= base_url('uploads/sliders/' . $slider->thumbnail) ?>">
						</div>
						<div class="form-group">
							<input type="file" class="form-control" name="thumbnail" placeholder="Nhập tên danh mục">
						</div>
					</div>
				</div>
				<div class="col-md-12">
					<button type="submit" class="btn btn-primary ">Cập nhật</button>
				</div>
			</form>

			<!-- /.row -->
		</div><!-- /.container-fluid -->
	</div>
	<!-- /.content -->
</div>
