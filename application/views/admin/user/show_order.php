<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="m-0 text-dark">Chi tiết đơn hàng</h1>
				</div><!-- /.col -->
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="<?= admin_url('home') ?>">Trang quản trị</a></li>
						<li class="breadcrumb-item"><a href="<?= admin_url('order/list/all') ?>">Đơn hàng</a></li>
						<li class="breadcrumb-item active">Chi tiết đơn hàng</li>
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
				<div class="col-md-12" style="padding-top: 20px; background-color: white; margin-top: 30px">
					<div class="row">
						<div class="col-md-6">
							<span>Mã đơn hàng: <?= $order->id ?></span>
						</div>
						<div class="col-md-6">
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
						</div>
					</div>
					<hr>
					<div class="col-md-12">
						<h4>Địa chỉ nhận hàng</h4>
						<h5 style="padding-top: 20px"><?= $order->name ?></h5>
						<p style="padding-top: 20px"><span><?= $order->phone ?></span></p>
						<p><span><?= $order->address ?></span></p>
						<p><span>(Ghi chú: <?= $order->note ?>)</span></p>
					</div>
					<hr>
					<div class="col-md-12">
						<h4>Chi tiết đơn hàng</h4>
						<div class="row">
							<?php
							$this->db->select('*, (order_details.quantity * order_details.price) AS total');
							$this->db->from('order_details');
							$this->db->where('order_details.order_id', $order->id);
							$query_oder = $this->db->get();
							foreach ($query_oder->result() as $product): ?>
								<div class="col-md-12" style="padding-bottom: 25px; padding-top: 20px">
									<div class="row">
										<div class="col-md-8">
											<a href="<?php echo base_url('/' . $product->product_id . '-' . $product->name . '.html') ?>"
											   class="btn">
												<div class="row">
													<div class="col-md-3">
														<img
																src="<?php echo base_url('uploads/products/' . $product->image) ?>"
																style="width: 100%">
													</div>
													<div class="col-md-9">
														<div class="col-md-12">
															<span><?= $product->name ?></span>
														</div>
														<div class="col-md-12">
															<span>x <?= $product->quantity ?></span>
														</div>
													</div>
												</div>
											</a>
										</div>
										<div class="col-md-4">
											<span class="float-right"><?php echo number_format($product->total) ?></span>
										</div>
									</div>
								</div>
							<?php endforeach; ?>
							<div class="col-md-12" style="color: orangered; font-size: 20px">
							<span
									class="float-right">Tổng số tiền: <?php echo number_format($order->payment) ?> đ</span>
							</div>
							<hr>
						</div>
					</div>
				</div>
			</div>
			<!-- /.row -->
		</div><!-- /.container-fluid -->
	</div>
	<!-- /.content -->
</div>




