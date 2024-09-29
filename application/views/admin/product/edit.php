<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="m-0 text-dark">Cập nhật sản phẩm</h1>
				</div><!-- /.col -->
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="<?= site_url('admin') ?>">Trang quản trị</a></li>
						<li class="breadcrumb-item"><a href="<?= site_url('admin/product') ?>">Sản phẩm</a></li>
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
					<div class="col-md-8">
						<div class="form-group">
							<label>Tên sản phẩm</label>
							<input type="text" class="form-control" name="name" placeholder="Nhập tên sản phẩm" value="<?= $product->name?>">
						</div>

						<div class="form-group">
							<label>Giá</label>
							<input type="number" class="form-control" name="price" placeholder="Nhập giá sản phẩm" value="<?= $product->price?>">
						</div>

						<div class="form-group">
							<label>Số lượng</label>
							<input type="number" class="form-control" name="amount" placeholder="Nhập số lượng" value="<?= $product->amount?>">
						</div>

						<div class="form-group">
							<label>Danh mục</label>
							<select name="category_id" class="form-control">
								<?php foreach ($categories as $cate){?>
									<option value="<?= $cate->id?>" <?php if($product->category_id == $cate->id) echo 'selected'?>><?=$cate->name?></option>
								<?php } ?>
							</select>
						</div>

						<?php if($product->status == 0){ ?>
							<div class="form-group">
								<label>Trạng thái hiển thị <i>(Tích để hiển thị)</i>&nbsp;&nbsp;</label>
								<input type="checkbox" name="status" <?php if ($product->status == 1) echo 'checked'; ?>>
							</div>
						<?php } ?>

						<div class="form-group">
							<label>Mô tả ngắn</label>
							<textarea class="form-control" name="discription" rows="5"><?= $product->description ?></textarea>
						</div>

						<div class="form-group">
							<label>Nội dung</label>
							<textarea id="content" name="content" cols="80" rows="10">
								<?= $product->content?>
       							</textarea>
						</div>

						<button type="submit" class="btn btn-primary">Cập nhật</button>

					</div>

					<div class="col-md-4">
						<div class="form-group">
							<label>Ảnh</label>
							<img src="<?= base_url('uploads/products/' . $product->image) ?>"style="width: 100%">
							<input type="file" class="form-control" name="image" >
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
