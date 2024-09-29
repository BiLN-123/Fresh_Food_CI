<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="m-0 text-dark">Cập nhật bài viết</h1>
				</div><!-- /.col -->
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="<?= site_url('admin') ?>">Trang quản trị</a></li>
						<li class="breadcrumb-item"><a href="<?= site_url('admin/news') ?>">Bài viết</a></li>
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
							<input type="text" class="form-control" name="title" placeholder="Nhập tiêu đề"
								   value="<?= $news->title ?>">
						</div>

						<div class="form-group">
							<label>Mô tả ngắn</label>
							<textarea class="form-control" name="description" placeholder="Nhập tên mô tả ngắn"
									  rows="5"><?= $news->description ?></textarea>
						</div>

						<div class="form-group">
							<label>Ảnh</label>
							<img src="<?= base_url('uploads/news/' . $news->image) ?>"style="width: 100%">

							<input type="file" class="form-control" name="image">
						</div>

						<div class="form-group">
							<label>Trạng thái hiển thị <i>(Tích để hiển thị)</i>&nbsp;&nbsp;</label>
							<input type="checkbox" name="status" <?php if ($news->status == 1) echo 'checked'; ?>>

						</div>
						<button type="submit" class="btn btn-primary">Cập nhật</button>

					</div>

					<div class="col-md-6">
						<div class="form-group">
							<label>Nội dung</label>
							<textarea id="content" name="content" cols="80" rows="10">
								<?= $news->content ?>
       							</textarea>
						</div>
					</div>
				</div>
				<script>
					CKEDITOR.replace('content');
				</script>
			</form>

			<!-- /.row -->
		</div><!-- /.container-fluid -->
	</div>
	<!-- /.content -->
</div>
