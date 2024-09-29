<?php

class User extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('user_model');
	}


	function index()
	{
		$segment = $this->uri->segment(4);
		$input = array();

		if ($segment == 'active') {
			$input['where'] = array('level' => 0, 'active' => 1);
		} elseif ($segment == 'hidden') {
			$input['where'] = array('level' => 0, 'active' => 0);
		} else {
			$input['where'] = array('level' => 0);
		}
		$input['order'] = array('created_at', 'DESC');
		$list_users = $this->user_model->get_list($input);
		$this->data['list_users'] = $list_users;

		//load view
		$this->data['page_title'] = 'Quản lý khách hàng';
		$this->data['temp'] = 'admin/user/index';
		$this->load->view('admin/layout_admin', $this->data);
	}

	function update_status($id)
	{
		$user = $this->user_model->get_info($id);
		if (!$user) {
			$this->session->set_flashdata('message', 'Lỗi!. Khách hàng này không tồn tại.');
			redirect(admin_url('user/list/all'));
		}
		$this->load->model('order_model');
		$input = array();
		$input['where'] = array('user_id' => $id);
		$orders = $this->order_model->get_list($input);
		foreach ($orders as $order) {
			if ($order->status == 0 || $order->status == 1 || $order->status == 2) {
				$this->session->set_flashdata('message', 'Lỗi!. Khách hàng này còn đơn hàng chưa hoàn thành.');
				redirect(admin_url('user/list/all'));
			}
		}

		if ($user->active == 1) {
			$data = array(
				'active' => 0
			);
		} else {
			$data = array(
				'active' => 1
			);
		}

		if ($this->user_model->update($id, $data)) {
			//tạo ra nội dung thông báo
			$this->session->set_flashdata('message', 'Cập nhật tài khoản thành công');
		} else {
			$this->session->set_flashdata('message', 'Cập nhật tài khoản thất bại');
		}
		redirect(admin_url('user/list/all'));
	}

	function edit($id)
	{
		$user = $this->user_model->get_info($id);
		if (!$user) {
			$this->session->set_flashdata('message', 'Lỗi!. Khách hàng này không tồn tại.');
			redirect(admin_url('user/list/all'));
		}
		$this->data['user'] = $user;

		$this->load->library('form_validation');
		$this->load->helper('form');

		//neu ma co du lieu post len thi kiem tra
		if ($this->input->post()) {

			$password = $this->input->post('password');

			$this->form_validation->set_rules('name', 'Tên', 'required|min_length[8]');
			if ($password) {
				$this->form_validation->set_rules('password', 'Mật khẩu', 'required|min_length[6]');
				$this->form_validation->set_rules('re_password', 'Nhập lại mật khẩu', 'matches[password]');
			}

			$this->form_validation->set_rules('phone', 'Số điện thoại', 'required');
			$this->form_validation->set_rules('address', 'Địa chỉ', 'required');

			//nhập liệu chính xác
			if ($this->form_validation->run()) {
				//them vao csdl
				$data = array(
					'name' => $this->input->post('name'),
					'phone' => $this->input->post('phone'),
					'address' => $this->input->post('address'),
				);
				if ($password) {
					$data['password'] = md5($password);
				}
				if ($this->user_model->update($id, $data)) {
					//tạo ra nội dung thông báo
					$this->session->set_flashdata('message', 'Chỉnh sửa thông tin thành công');
				} else {
					$this->session->set_flashdata('message', 'Không thành công');
				}
				//chuyen tới trang danh sách quản trị viên
				redirect(admin_url('user/list/all'));
			}
		}

		//load view
		$this->data['page_title'] = 'Cập nhật thông tin khách hàng';
		$this->data['temp'] = 'admin/user/edit';
		$this->load->view('admin/layout_admin', $this->data);
	}

	function purchase($id)
	{
		$this->load->model('order_model');

		$user = $this->user_model->get_info($id);
		if (!$user) {
			$this->session->set_flashdata('message', 'Chỉnh sửa thông tin thành công');
			redirect(admin_url('user/list/all'));
		}
		$this->data['user'] = $user;

		//lấy tất cả order
		$input = array();
		$input['order'] = array('created_at', 'DESC');
		$input['where'] = array('user_id' => $id);
		$list_orders = $this->order_model->get_list($input);
		$this->data['list_orders'] = $list_orders;

		//lấy order chờ xác nhận
		$input = array();
		$input['order'] = array('created_at', 'DESC');
		$input['where'] = array('user_id' => $id, 'status' => 0);
		$list_orders_confirm = $this->order_model->get_list($input);
		$this->data['list_orders_confirm'] = $list_orders_confirm;

		//Chờ lấy hàng
		$input = array();
		$input['order'] = array('created_at', 'DESC');
		$input['where'] = array('user_id' => $id, 'status' => 1);
		$list_orders_order = $this->order_model->get_list($input);
		$this->data['list_orders_order'] = $list_orders_order;

		//Đang giao
		$input = array();
		$input['order'] = array('created_at', 'DESC');
		$input['where'] = array('user_id' => $id, 'status' => 2);
		$list_orders_delivery = $this->order_model->get_list($input);
		$this->data['list_orders_delivery'] = $list_orders_delivery;

		//Đã giao
		$input = array();
		$input['order'] = array('created_at', 'DESC');
		$input['where'] = array('user_id' => $id, 'status' => 3);
		$list_orders_delivered = $this->order_model->get_list($input);
		$this->data['list_orders_delivered'] = $list_orders_delivered;

		//Huỷ
		$input = array();
		$input['order'] = array('created_at', 'DESC');
		$input['where'] = array('user_id' => $id, 'status' => 4);
		$list_orders_delete = $this->order_model->get_list($input);
		$this->data['list_orders_delete'] = $list_orders_delete;


		//load view
		$this->data['page_title'] = 'Lịch sử mua hàng của khách hàng';
		$this->data['temp'] = 'admin/user/purchase';
		$this->load->view('admin/layout_admin', $this->data);

	}

	function show_order($user_id, $order_id){
		$this->load->model('order_model');

		$input = array();
		$order = $this->order_model->get_info($order_id);

		if(!$order){
			redirect(admin_url('user/purchase/'.$user_id));
		}

		$this->data['order'] = $order;

		//load view
		$this->data['page_title'] = 'Chi tiết đơn hàng';
		$this->data['temp'] = 'admin/user/show_order';
		$this->load->view('admin/layout_admin', $this->data);
	}
}
