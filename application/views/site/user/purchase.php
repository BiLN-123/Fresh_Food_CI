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
					<ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
						<li class="nav-item">
							<a class="nav-link active btn" id="pills-all-tab" data-toggle="pill" href="#pills-all"
							   role="tab" aria-controls="pills-all" aria-selected="true">Tất cả</a>
						</li>
						<li class="nav-item">
							<a class="nav-link btn" id="pills-confirm-tab" data-toggle="pill" href="#pills-confirm"
							   role="tab" aria-controls="pills-confirm" aria-selected="false">Chờ xác nhận</a>
						</li>
						<li class="nav-item">
							<a class="nav-link btn" id="pills-order-tab" data-toggle="pill" href="#pills-order"
							   role="tab"
							   aria-controls="pills-order" aria-selected="false">Chờ lấy hàng</a>
						</li>
						<li class="nav-item">
							<a class="nav-link btn" id="pills-delivery-tab" data-toggle="pill" href="#pills-delivery"
							   role="tab" aria-controls="pills-delivery" aria-selected="false">Đang giao</a>
						</li>
						<li class="nav-item">
							<a class="nav-link btn" id="pills-delivered-tab" data-toggle="pill" href="#pills-delivered"
							   role="tab" aria-controls="pills-delivered" aria-selected="false">Đã giao</a>
						</li>
						<li class="nav-item">
							<a class="nav-link btn" id="pills-delete-tab" data-toggle="pill" href="#pills-delete"
							   role="tab"
							   aria-controls="pills-delete" aria-selected="false">Đã huỷ</a>
						</li>
					</ul>
					<div class="tab-content" id="pills-tabContent">
						<div class="tab-pane fade show active" id="pills-all" role="tabpanel"
							 aria-labelledby="pills-all-tab">
							<div class="account-body">
								<div class="row">
									<?php
									$this->load->model('orderdetails_model');
									foreach ($list_orders as $order): ?>
										<div class="col-md-12" style="padding-bottom: 20px">
											<div class="col-md-12 order">
												<div class="row">
													<div class="col-md-4">
														<span style="color: orange">Mã đơn hàng: <?= $order->id ?></span>
													</div>
													<div class="col-md-4">
														<span>Ngày đặt: <?= $order->created_at ?></span>
													</div>
													<div class="col-md-4">
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
																		<div class="col-md-3">
																			<img src="<?php echo base_url('uploads/products/' . $product->image) ?>">
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
																</div>
																<div class="col-md-4">
																	<span class="float-right"><?php echo number_format($product->total) ?></span>
																</div>
															</div>
														</div>
													<?php endforeach; ?>
													<div class="col-md-12" style="font-size: 20px">
														<a href="<?php echo base_url('user/purchase/show/'.$order->id)?>" class="btn btn-default" style="font-size: 15px">Xem chi tiết đơn hàng</a>
														<span class="float-right" >Tổng số tiền: <?php echo number_format($order->payment) ?> VNĐ</span>
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
						<div class="tab-pane fade" id="pills-confirm" role="tabpanel"
							 aria-labelledby="pills-confirm-tab">
							<div class="account-body">
								<div class="row">
									<?php
									$this->load->model('orderdetails_model');
									foreach ($list_orders_confirm as $order): ?>
										<div class="col-md-12" style="padding-bottom: 20px">
											<div class="col-md-12 order">
												<div class="row">
													<div class="col-md-4">
														<span style="color: orange">Mã đơn hàng: <?= $order->id ?></span>
													</div>
													<div class="col-md-4">
														<span>Ngày đặt: <?= $order->created_at ?></span>
													</div>
													<div class="col-md-4">
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
											<div class="col-md-12 order-detail">
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
																		<div class="col-md-3">
																			<img src="<?php echo base_url('uploads/products/' . $product->image) ?>">
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
																</div>
																<div class="col-md-4">
																	<span class="float-right"><?php echo number_format($product->total) ?></span>
																</div>
															</div>
														</div>
													<?php endforeach; ?>
													<div class="col-md-12" style="font-size: 20px">
														<a href="<?php echo base_url('user/purchase/show/'.$order->id)?>" class="btn btn-default" style="font-size: 15px">Xem chi tiết đơn hàng</a>
														<span class="float-right">Tổng số tiền: <?php echo number_format($order->payment) ?> VNĐ</span>
													</div>
													<hr>
												</div>
											</div>
										</div>
										<hr>
									<?php endforeach; ?>
								</div>
							</div>
						</div>
						<div class="tab-pane fade" id="pills-order" role="tabpanel" aria-labelledby="pills-order-tab">
							<div class="account-body">
								<div class="row">
									<?php
									$this->load->model('orderdetails_model');
									foreach ($list_orders_order as $order): ?>
										<div class="col-md-12" style="padding-bottom: 20px">
											<div class="col-md-12 order">
												<div class="row">
													<div class="col-md-4">
														<span style="color: orange">Mã đơn hàng: <?= $order->id ?></span>
													</div>
													<div class="col-md-4">
														<span>Ngày đặt: <?= $order->created_at ?></span>
													</div>
													<div class="col-md-4">
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
											<div class="col-md-12 order-detail">
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
																		<div class="col-md-3">
																			<img src="<?php echo base_url('uploads/products/' . $product->image) ?>">
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
																</div>
																<div class="col-md-4">
																	<span class="float-right"><?php echo number_format($product->total) ?></span>
																</div>
															</div>
														</div>
													<?php endforeach; ?>
													<div class="col-md-12" style="color: orangered; font-size: 20px">
														<a href="<?php echo base_url('user/purchase/show/'.$order->id)?>" class="btn btn-default" style="font-size: 15px">Xem chi tiết đơn hàng</a>
														<span class="float-right">Tổng số tiền: <?php echo number_format($order->payment) ?> VNĐ</span>
													</div>
													<hr>
												</div>
											</div>
										</div>
										<hr>
									<?php endforeach; ?>
								</div>
							</div>
						</div>
						<div class="tab-pane fade" id="pills-delivery" role="tabpanel"
							 aria-labelledby="pills-delivery-tab">
							<div class="account-body">
								<div class="row">
									<?php
									$this->load->model('orderdetails_model');
									foreach ($list_orders_delivery as $order): ?>
										<div class="col-md-12" style="padding-bottom: 20px">
											<div class="col-md-12 order">
												<div class="row">
													<div class="col-md-4">
														<span style="color: orange">Mã đơn hàng: <?= $order->id ?></span>
													</div>
													<div class="col-md-4">
														<span>Ngày đặt: <?= $order->created_at ?></span>
													</div>
													<div class="col-md-4">
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
											<div class="col-md-12 order-detail">
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
																		<div class="col-md-3">
																			<img src="<?php echo base_url('uploads/products/' . $product->image) ?>">
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
																</div>
																<div class="col-md-4">
																	<span class="float-right"><?php echo number_format($product->total) ?></span>
																</div>
															</div>
														</div>
													<?php endforeach; ?>
													<div class="col-md-12" style=" font-size: 20px">
														<a href="<?php echo base_url('user/purchase/show/'.$order->id)?>" class="btn btn-default" style="font-size: 15px">Xem chi tiết đơn hàng</a>
														<span class="float-right">Tổng số tiền: <?php echo number_format($order->payment) ?> VNĐ</span>
													</div>
													<hr>
												</div>
											</div>
										</div>
										<hr>
									<?php endforeach; ?>
								</div>
							</div>
						</div>
						<div class="tab-pane fade" id="pills-delivered" role="tabpanel"
							 aria-labelledby="pills-delivered-tab">
							<div class="account-body">
								<div class="row">
									<?php
									$this->load->model('orderdetails_model');
									foreach ($list_orders_delivered as $order): ?>
										<div class="col-md-12" style="padding-bottom: 20px">
											<div class="col-md-12 order">
												<div class="row">
													<div class="col-md-4">
														<span style="color: orange">Mã đơn hàng: <?= $order->id ?></span>
													</div>
													<div class="col-md-4">
														<span>Ngày đặt: <?= $order->created_at ?></span>
													</div>
													<div class="col-md-4">
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
											<div class="col-md-12 order-detail">
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
																		<div class="col-md-3">
																			<img src="<?php echo base_url('uploads/products/' . $product->image) ?>">
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
																</div>
																<div class="col-md-4">
																	<span class="float-right"><?php echo number_format($product->total) ?></span>
																</div>
															</div>
														</div>
													<?php endforeach; ?>
													<div class="col-md-12" style="font-size: 20px">
														<a href="<?php echo base_url('user/purchase/show/'.$order->id)?>" class="btn btn-default" style="font-size: 15px">Xem chi tiết đơn hàng</a>
														<span class="float-right">Tổng số tiền: <?php echo number_format($order->payment) ?> VNĐ</span>
													</div>
													<hr>
												</div>
											</div>
										</div>
										<hr>
									<?php endforeach; ?>
								</div>
							</div>
						</div>
						<div class="tab-pane fade" id="pills-delete" role="tabpanel" aria-labelledby="pills-delete-tab">
							<div class="account-body">
								<div class="row">
									<?php
									$this->load->model('orderdetails_model');
									foreach ($list_orders_delete as $order): ?>
										<div class="col-md-12" style="padding-bottom: 20px">
											<div class="col-md-12 order">
												<div class="row">
													<div class="col-md-4">
														<span style="color: orange">Mã đơn hàng: <?= $order->id ?></span>
													</div>
													<div class="col-md-4">
														<span>Ngày đặt: <?= $order->created_at ?></span>
													</div>
													<div class="col-md-4">
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
											<div class="col-md-12 order-detail">
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
																		<div class="col-md-3">
																			<img src="<?php echo base_url('uploads/products/' . $product->image) ?>">
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
																</div>
																<div class="col-md-4">
																	<span class="float-right"><?php echo number_format($product->total) ?></span>
																</div>
															</div>
														</div>
													<?php endforeach; ?>
													<div class="col-md-12" style="font-size: 20px">
														<a href="<?php echo base_url('user/purchase/show/'.$order->id)?>" class="btn btn-default" style="font-size: 15px">Xem chi tiết đơn hàng</a>
														<span class="float-right">Tổng số tiền: <?php echo number_format($order->payment) ?> VNĐ</span>
													</div>
													<hr>
												</div>
											</div>
										</div>
										<hr>
									<?php endforeach; ?>
								</div>
							</div>
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

<script>
	<?php if ($this->session->flashdata('message')): ?>
	Swal.fire({
		position: 'top-end',
		icon: 'success',
		title: 'Huỷ đơn hàng thành công',
		showConfirmButton: false,
		timer: 1500
	})
	<?php endif; ?>
</script>
