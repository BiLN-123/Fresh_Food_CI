<?php $this->load->view('site/partials/banner') ?>

<?php if ($this->session->userdata('user_id_login')): ?>
	<div class="section" style="margin-top: 50px">
		<div class="container">
			<div class="row">
				<div class="col-lg-3 account-left">
					<div class="info-account" style="text-align: center">
						<div class="name-account">
							<p><?= $user->name ?></p>
						</div>
						<hr>
						<div class="created_at">
							<p>Tham gia từ <br><?= $user->created_at ?></p>
						</div>
					</div>
					<hr>
					<div class="list-action">
						<ul>
							<li class="item-action"><a class="btn" href="<?php echo base_url('user') ?>"
													   class="active-item">Tài khoản của tôi</a></li>
							<li class="item-action"><a class="btn" href="<?php echo base_url('user/purchase') ?>"
								>Đơn mua</a></li>
							<li class="item-action"><a class="btn" href="<?php echo base_url('logout') ?>">Đăng xuất</a>
							</li>
						</ul>
					</div>
				</div>
				<div class="col-lg-9 account-right">
					<div class="col-md-12" style="padding-top: 20px">
						<div class="row">
							<div class="col-md-6">
								<span>Mã đơn hàng: <?= $order->id ?></span>
							</div>
							<div class="col-md-6">
							<span class='float-right' style='color: orangered'>Tình trạng:
												<?php if ($order->status == 0): ?>
													Chờ xác nhận <a
														href='<?php echo base_url('user/purchase/delete/' . $order->id) ?>'
														class='btn btn-warning'>Huỷ</a>
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
											<a href="<?php echo base_url('/' . $product->product_id . '-' . $product->name . '.html') ?>" class="btn">
												<div class="row">
													<div class="col-md-3">
														<img
															src="<?php echo base_url('uploads/products/' . $product->image) ?>">
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
								<span class="float-right">Tổng số tiền: <?php echo number_format($order->payment) ?> VNĐ</span>
							</div>
							<hr>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php else: ?>
	<div class="container" style="margin-top: 50px">
		<h3 style="color: red"><i>Bạn chưa đăng nhập</i></h3>
	</div>
<?php endif; ?>
