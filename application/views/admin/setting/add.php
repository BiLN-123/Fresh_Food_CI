<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="m-0 text-dark">Thêm mới cài đặt</h1>
				</div><!-- /.col -->
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="<?= site_url('admin')?>">Trang quản trị</a></li>
						<li class="breadcrumb-item"><a href="<?= site_url('admin/setting')?>">Cài đặt</a></li>
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
							<label>Tên cài đặt</label>
							<input type="text" class="form-control" id="setting_key" name="setting_key" placeholder="Nhập tên cài đặt">
						</div>
						<?php
						if(uri_string() == 'admin/setting/add/text'){?>
						<input type="hidden" name="type" value="text">
						<div class="form-group">
							<label>Giá trị cài đặt</label>
							<input type="text" class="form-control" id="setting_value" name="setting_value" placeholder="Nhập giá trị">
						</div>
						<?php }
						elseif (uri_string() == 'admin/setting/add/textarea'){
						?>
						<input type="hidden" name="type" value="textarea">
						<div class="form-group">
							<label>Giá trị cài đặt</label>
							<textarea class="form-control" id="setting_value" name="setting_value" placeholder="Nhập giá trị" rows="5"></textarea>
						</div>
						<?php }
						elseif (uri_string() == 'admin/setting/add/ckeditor'){
						?>
						<input type="hidden" name="type" value="ckeditor">
						<div class="form-group">
							<label>Giá trị cài đặt</label>
							<textarea class="form-control" id="setting_value" name="setting_value" placeholder="Nhập giá trị" cols="80" rows="10"></textarea>
						</div>
							<script>
								CKEDITOR.replace('setting_value');
							</script>
						<?php } ?>
						<button type="submit" class="btn btn-primary">Thêm mới</button>
					</form>
				</div>
			</div>
			<!-- /.row -->
		</div><!-- /.container-fluid -->
	</div>
	<!-- /.content -->
</div>
