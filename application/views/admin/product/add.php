<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="m-0 text-dark">Thêm mới sản phẩm</h1>
				</div><!-- /.col -->
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="<?= site_url('admin') ?>">Trang quản trị</a></li>
						<li class="breadcrumb-item"><a href="<?= site_url('admin/product') ?>">Sản phẩm</a></li>
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
			<?php $this->load->view('admin/message', $this->data); ?>
			<form action="" method="Post">

				<div class="row">
					<div class="col-md-5">
						<div class="form-group">
							<label>Tên sản phẩm</label>
							<input type="text" class="form-control" name="name" placeholder="Nhập tên sản phẩm">
						</div>

						<div class="form-group">
							<label>Giá tiền</label>
							<input type="number" class="form-control" name="price" placeholder="Nhập giá sản phẩm">
						</div>

						<div class="form-group">
							<label>Số lượng</label>
							<input type="number" class="form-control" name="amount" placeholder="Nhập số lượng">
						</div>

						<div class="form-group">
							<label>Danh mục</label>
							<select name="category_id" class="form-control">
								<?php foreach ($categories as $cate){?>
									<option value="<?= $cate->id?>"><?=$cate->name?></option>
								<?php } ?>
							</select>
						</div>

						<div class="form-group">
							<label>Ảnh</label>
							<input type="file" class="form-control" name="image" >
						</div>

						<div class="form-group">
							<label>Trạng thái hiển thị <i>(Tích để hiển thị)</i>&nbsp;&nbsp;</label>
							<input type="checkbox" name="status" checked>
						</div>
						<button type="submit" class="btn btn-primary">Thêm mới</button>

					</div>

					<div class="col-md-6">
						<div class="form-group">
							<label>Mô tả ngắn</label>
							<textarea class="form-control" name="description" ></textarea>
						</div>

						<div class="form-group">
							<label>Nội dung</label>
							<textarea id="content" name="content" cols="80" rows="10">

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
