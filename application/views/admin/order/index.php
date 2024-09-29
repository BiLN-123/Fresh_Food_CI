<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="m-0 text-dark">Quản lý đơn hàng</h1>
				</div><!-- /.col -->
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="<?= admin_url('home') ?>">Trang quản trị</a></li>
						<li class="breadcrumb-item active">Đơn hàng</li>
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
							<a class="nav-link <?php if ($segment == 'all') {
								echo 'active';
							} ?>" href="<?php echo admin_url('order/list/all') ?>">Tất cả</a>
						</li>
						<li class="nav-item">
							<a class="nav-link <?php if ($segment == 'unpaid') {
								echo 'active';
							} ?>" href="<?php echo admin_url('order/list/unpaid') ?>">Chờ xác nhận</a>
						</li>
						<li class="nav-item">
							<a class="nav-link <?php if ($segment == 'shipment') {
								echo 'active';
							} ?>" href="<?php echo admin_url('order/list/shipment') ?>">Chờ lấy hàng</a>
						</li>
						<li class="nav-item">
							<a class="nav-link <?php if ($segment == 'shipping') {
								echo 'active';
							} ?>" href="<?= admin_url('order/list/shipping') ?>">Đang giao</a>
						</li>
						<li class="nav-item">
							<a class="nav-link <?php if ($segment == 'completed') {
								echo 'active';
							} ?>" href="<?= admin_url('order/list/completed') ?>">Đã giao</a>
						</li>
						<li class="nav-item">
							<a class="nav-link <?php if ($segment == 'cancelled') {
								echo 'active';
							} ?>" href="<?= admin_url('order/list/cancelled') ?>">Đã huỷ</a>
						</li>
					</ul>

				</div>
				<!-- /.col-md-6 -->
				<?php $this->load->view('admin/message', $this->data); ?>
				<div class="col-md-12">
					<div class="tab-pane fade show active" id="pills-all" role="tabpanel"
						 aria-labelledby="pills-all-tab">
						<div class="account-body">
							<div class="row">
								<?php
								$this->load->model('orderdetails_model');
								foreach ($list_orders as $order): ?>
									<div class="col-md-12" style="padding-top: 20px; background-color: white;margin-top: 30px">
										<div class="col-md-12 order">
											<div class="row">
												<div class="col-md-4">
													<span style="color: orange">Mã đơn hàng: <?= $order->id ?></span>
												</div>
												<div class="col-md-4">
													<span>Ngày đặt: <?= $order->created_at ?></span>
												</div>
												<div class="col-md-4">
													<span class='float-right' style='color: orangered; padding-top: 8px; padding-left: 20px'>Tình trạng:
														<?php if ($order->status == 0): ?>
															Chờ xác nhận
														<?php elseif ($order->status == 1): ?>
															Chờ lấy hàng
														<?php elseif ($order->status == 2): ?>
															Đang giao
														<?php elseif ($order->status == 3): ?>
															Đã giao
														<?php elseif ($order->status == 4): ?>
															Đã huỷ
														<?php endif; ?>
													</span>
													<?php if($order->status == 0 || $order->status == 1 || $order->status == 2):?>
													<div class="dropdown float-right">
														<button class="btn btn-success dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
														<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
															<a class="dropdown-item" href="<?php echo admin_url('order/order_update/'.$order->id.'/0')?>">Chờ xác nhận</a>
															<a class="dropdown-item" href="<?php echo admin_url('order/order_update/'.$order->id.'/1')?>">Chờ lấy hàng</a>
															<a class="dropdown-item" href="<?php echo admin_url('order/order_update/'.$order->id.'/2')?>">Đang giao</a>
															<a class="dropdown-item" href="<?php echo admin_url('order/order_update/'.$order->id.'/3')?>" onclick="return confirm('Bạn có chắc chắn đơn hàng đã giao thành công?');">Đã giao</a>
															<a class="dropdown-item" href="<?php echo admin_url('order/order_update/'.$order->id.'/4')?>" onclick="return confirm('Bạn có chắc chắn huỷ đơn hàng này không?');">Đã huỷ</a>
														</div>
													</div>
													<?php endif; ?>
												</div>
											</div>
										</div>
										<!--											<hr>-->
										<div class="col-md-12 order-detail" style="padding-top: 20px">
											<div class="row">
												<?php
												$this->db->select('*, (order_details.quantity * order_details.price) AS total');
												$this->db->from('order_details');
												$this->db->where('order_details.order_id', $order->id);
												$query_oder = $this->db->get();
												foreach ($query_oder->result() as $product): ?>
													<div class="col-md-12" style="padding-bottom: 25px">
														<div class="row">
															<div class="col-md-8">
																<div class="row">
																	<div class="col-md-2">
																		<img
																			src="<?php echo base_url('uploads/products/' . $product->image) ?>"
																			style="width: 100%">
																	</div>
																	<div class="col-md-10">
																		<div class="col-md-12">
																			<span><?= $product->name ?></span>
																		</div>
																		<div class="col-md-12">
																			<span>x <?= $product->quantity ?></span>
																		</div>
																	</div>
																</div>
															</div>
															<div class="col-md-4">
																<span
																	class="float-right"><?php echo number_format($product->total) ?></span>
															</div>
														</div>
													</div>
												<?php endforeach; ?>
												<div class="col-md-12" style="font-size: 20px">
													<a href="<?php echo admin_url('order/show/' . $order->id) ?>"
													   class="btn btn-default" style="font-size: 15px">Xem chi tiết đơn
														hàng</a>
													<a href="<?php echo admin_url('order/print_order/' . $order->id) ?>"
													   class="btn btn-default" style="font-size: 15px">In đơn
														hàng</a>
													<span
														class="float-right">Tổng số tiền: <?php echo number_format($order->payment) ?> đ</span>
												</div>
												<hr>
											</div>
										</div>
										<hr>
									</div>
									<hr>
								<?php endforeach; ?>
							</div>
						</div>
					</div>
				</div>
				<!-- /.col-md-6 -->
			</div>
			<!-- /.row -->
		</div><!-- /.container-fluid -->
	</div>
	<!-- /.content -->
</div>

