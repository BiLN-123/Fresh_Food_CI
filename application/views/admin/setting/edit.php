<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="m-0 text-dark">Cập nhật cài đặt</h1>
				</div><!-- /.col -->
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="<?= site_url('admin') ?>">Trang quản trị</a></li>
						<li class="breadcrumb-item"><a href="<?= site_url('admin/setting') ?>">Cài đặt</a></li>
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
			<div class="row">
				<div class="col-md-6">
					<form action="" method="Post">
						<div class="form-group">
							<label>Tên cài đặt</label>
							<input type="text" class="form-control" id="setting_key" name="setting_key"
								   placeholder="Nhập tên cài đặt" value="<?= $setting->setting_key ?>">
						</div>
						<?php
						if ($setting->type == 'text') {
							?>
							<div class="form-group">
								<label>Giá trị cài đặt</label>
								<input type="text" class="form-control" id="setting_value" name="setting_value"
									   placeholder="Nhập giá trị" value="<?= $setting->setting_value ?>">
							</div>
						<?php }
						elseif ($setting->type == 'textarea'){
						?>
							<div class="form-group">
								<label>Giá trị cài đặt</label>
								<textarea class="form-control" id="setting_value" name="setting_value"
										  placeholder="Nhập giá trị" rows="5"><?= $setting->setting_value ?></textarea>
							</div>
						<?php }
						elseif ($setting->type == 'ckeditor'){
						?>
							<div class="form-group">
								<label>Giá trị cài đặt</label>
								<textarea class="form-control" id="setting_value" name="setting_value"
										  placeholder="Nhập giá trị" cols="80" rows="10"><?= $setting->setting_value ?></textarea>
							</div>
							<script>
								CKEDITOR.replace('setting_value');
							</script>
						<?php } ?>
						<button type="submit" class="btn btn-primary">Cập nhật</button>
					</form>
				</div>
			</div>
			<!-- /.row -->
		</div><!-- /.container-fluid -->
	</div>
	<!-- /.content -->
</div>
