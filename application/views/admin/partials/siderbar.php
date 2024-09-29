<aside class="main-sidebar sidebar-dark-primary elevation-4">
	<!-- Brand Logo -->
	<a href="index3.html" class="brand-link">
		<img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
			 style="opacity: .8">
		<span class="brand-text font-weight-light">AdminLTE 3</span>
	</a>

	<!-- Sidebar -->
	<div class="sidebar">
		<!-- Sidebar user panel (optional) -->
		<div class="user-panel mt-3 pb-3 mb-3 d-flex">
			<div class="image">
				<img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
			</div>
			<div class="info">
				<a href="<?= admin_url('home') ?>" class="d-block">Admin</a>
			</div>
		</div>

		<!-- Sidebar Menu -->
		<nav class="mt-2">


			<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
				<!-- Add icons to the links using the .nav-icon class
					 with font-awesome or any other icon font library -->
				<li class="nav-item">
					<a href="<?= admin_url('home') ?>" class="nav-link">
						<i class="nav-icon fas fa-tachometer-alt"></i>
						<p>
							Dashboard
						</p>
					</a>
				</li>

				<li class="nav-item ">
					<a href="#" class="nav-link">
						<i class="nav-icon fas fa-clipboard"></i>
						<p>
							Đơn Hàng
							<i class="right fas fa-angle-left"></i>
						</p>
					</a>
					<ul class="nav nav-treeview">
						<li class="nav-item">
							<a href="<?= admin_url('order/list/all') ?>" class="nav-link">
								<p>
									Tất cả
								</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?= admin_url('order/list/cancelled') ?>" class="nav-link">
								<p>
									Đã huỷ
								</p>
							</a>
						</li>
					</ul>
				</li>

				<li class="nav-item ">
					<a href="#" class="nav-link">
						<i class="nav-icon fas fa-shopping-bag"></i>
						<p>
							Sản Phẩm
							<i class="right fas fa-angle-left"></i>
						</p>
					</a>
					<ul class="nav nav-treeview">
						<li class="nav-item">
							<a href="<?= admin_url('product/list/all') ?>" class="nav-link">
								<p>
									Tất cả sản phẩm
								</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?= admin_url('product/add') ?>" class="nav-link">
								<p>
									Thêm sản phẩm
								</p>
							</a>
						</li>
					</ul>
				</li>
				<li class="nav-item ">
					<a href="#" class="nav-link">
						<i class="nav-icon fas fa-list"></i>
						<p>
							Danh Mục
							<i class="right fas fa-angle-left"></i>
						</p>
					</a>
					<ul class="nav nav-treeview">
						<li class="nav-item">
							<a href="<?= admin_url('category') ?>" class="nav-link">
								<p>
									Tất cả danh mục
								</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?= admin_url('category/add') ?>" class="nav-link">
								<p>
									Thêm danh mục
								</p>
							</a>
						</li>
					</ul>
				</li>

				<li class="nav-item ">
					<a href="#" class="nav-link">
						<i class="nav-icon fas fa-newspaper"></i>
						<p>
							Bài Viết
							<i class="right fas fa-angle-left"></i>
						</p>
					</a>
					<ul class="nav nav-treeview">
						<li class="nav-item">
							<a href="<?= admin_url('news') ?>" class="nav-link">
								<p>
									Tất cả bài viết
								</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?= admin_url('news/add') ?>" class="nav-link">
								<p>
									Thêm bài viết
								</p>
							</a>
						</li>
					</ul>
				</li>
				<li class="nav-item ">
					<a href="#" class="nav-link">
						<i class="nav-icon fas fa-sliders-h"></i>
						<p>
							Slider
							<i class="right fas fa-angle-left"></i>
						</p>
					</a>
					<ul class="nav nav-treeview">
						<li class="nav-item">
							<a href="<?= admin_url('slider') ?>" class="nav-link">
								<p>
									Tất cả
								</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?= admin_url('slider/add') ?>" class="nav-link">
								<p>
									Thêm slide
								</p>
							</a>
						</li>
					</ul>
				</li>

				<li class="nav-item ">
					<a href="#" class="nav-link">
						<i class="nav-icon fas fa-user"></i>
						<p>
							Khách Hàng
							<i class="right fas fa-angle-left"></i>
						</p>
					</a>
					<ul class="nav nav-treeview">
						<li class="nav-item">
							<a href="<?= admin_url('user/list/all') ?>" class="nav-link">
								<p>
									Tất cả
								</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?= admin_url('user/list/hidden') ?>" class="nav-link">
								<p>
									Đã khoá
								</p>
							</a>
						</li>
					</ul>
				</li>

				<li class="nav-item ">
					<a href="#" class="nav-link">
						<i class="nav-icon fas fa-mail-bulk"></i>
						<p>
							Phản hồi
							<i class="right fas fa-angle-left"></i>
						</p>
					</a>
					<ul class="nav nav-treeview">
						<li class="nav-item">
							<a href="<?= admin_url('contact') ?>" class="nav-link">
								<p>
									Tất cả
								</p>
							</a>
						</li>
					</ul>
				</li>

				<li class="nav-item has-treeview ">
					<a href="#" class="nav-link">
						<i class="nav-icon fas fa-cog"></i>
						<p>
							Cài đặt
							<i class="right fas fa-angle-left"></i>
						</p>
					</a>
					<ul class="nav nav-treeview">
						<li class="nav-item">
							<a href="<?= admin_url('setting') ?>" class="nav-link ">
								<p>Cài đặt chung</p>
							</a>
						</li>
					</ul>
				</li>

				<li class="nav-item">
					<a href="<?php echo base_url('logout') ?>" class="nav-link">
						<i class="nav-icon fas fa-sign-out-alt"></i>
						<p>
							Đăng xuất
						</p>
					</a>
				</li>
			</ul>
		</nav>
		<!-- /.sidebar-menu -->
	</div>
	<!-- /.sidebar -->
</aside>
