<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="m-0 text-dark">Quản lý sản phẩm</h1>
				</div><!-- /.col -->
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="<?= admin_url('home') ?>">Trang quản trị</a></li>
						<li class="breadcrumb-item active">Sản phẩm</li>
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
					<ul class="nav nav-tabs">
						<?php $segment = $this->uri->segment(4); ?>
						<li class="nav-item">
							<a class="nav-link <?php if($segment == 'all'){echo 'active';} ?>" href="<?php echo admin_url('product/list/all') ?>">Tất cả</a>
						</li>
						<li class="nav-item">
							<a class="nav-link <?php if($segment == 'active'){echo 'active';} ?>" href="<?php echo admin_url('product/list/active') ?>">Còn hàng</a>
						</li>
						<li class="nav-item">
							<a class="nav-link <?php if($segment == 'soldout'){echo 'active';} ?>" href="<?php echo admin_url('product/list/soldout') ?>">Hết hàng</a>
						</li>
						<li class="nav-item">
							<a class="nav-link <?php if($segment == 'unlisted'){echo 'active';} ?>" href="<?= admin_url('product/list/unlisted') ?>">Đã ẩn</a>
						</li>
					</ul>
					<a href="<?= admin_url('product/add') ?>" class="btn btn-success float-right"><i
								class="fa fa-plus"></i> Thêm mới</a>
				</div>
				<!-- /.col-md-6 -->
				<?php $this->load->view('admin/message', $this->data); ?>
				<div class="col-md-12">
					<table id="example" class="table table-bordered" style="width:100%">
						<thead>
						<tr>
							<th scope="col">ID</th>
							<th scope="col" style="width: 45%">Sản phẩm</th>
							<th scope="col">Danh mục</th>
							<th scope="col">Giá</th>
							<th scope="col">Kho hàng</th>
							<th scope="col">Đã bán</th>
							<th scope="col">Action</th>
						</tr>
						</thead>
						<tbody>

						<?php foreach ($list as $product): ?>
							<tr>
								<th scope="row"><?= $product->product_id ?></th>
								<td>
									<div class="col-md-12">
										<div class="row">
											<div class="col-md-2">
												<img src="<?= base_url('uploads/products/') . $product->image ?>"
													 style="width: 100%">
											</div>
											<div class="col-md-7" style="padding-left: 20px">
												<div class="row">
													<div class="col-md-12" style="padding-top: 10px">
														<h5 style="color: #000000"><?= $product->product_name ?></h5>
													</div>
													<div class="col-md-12">
														<span>Xem: <?= $product->views ?></span>
													</div>
												</div>
											</div>
										</div>
									</div>
								</td>
								<td><?= $product->category_name ?></td>
								<td><span style="color: red"><?php echo number_format($product->price) ?> đ</span></td>
								<td><?= $product->amount ?></td>
								<td><?= $product->buyed ?></td>
								<td>
									<a href="<?= admin_url('product/edit/' . $product->product_id) ?>"
									   class=" ">Sửa</a> -|-
									<?php if ($product->status == 0):?>
										<a href="<?= admin_url('product/deleted_at/' . $product->product_id) ?>" onclick="return confirm('Bạn có chắc chắn muốn hiện sản phẩm?');" id="show_at"> Hiện</a>
									<?php else: ?>
										<a href="<?= admin_url('product/deleted_at/' . $product->product_id) ?>" onclick="return confirm('Bạn có chắc chắn muốn ẩn sản phẩm?');" id="deleted_at"> Ẩn</a>
									<?php endif; ?>
								</td>
							</tr>
						<?php endforeach; ?>
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

