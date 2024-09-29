<?php

class Home extends MY_Controller
{
	function index(){
		//đếm lấy đơn hàng mới
		$input = array();
		$this->load->model('order_model');
		$input['where'] = array('status'=>0);
		$count_new_order = $this->order_model->get_list($input);
		$this->data['count_new_order'] = count($count_new_order);

		//đếm số lượng user
		$input = array();
		$this->load->model('user_model');
		$count_users = $this->user_model->get_list($input);
		$this->data['count_users'] = count($count_users);

		//đếm sô lượng sản phẩm
		$input = array();
		$this->load->model('product_model');
		$count_products = $this->product_model->get_list($input);
		$this->data['count_products'] = count($count_products);

		//đếm sô lượng sản phẩm hết hàng
		$input = array();
		$this->load->model('product_model');
		$input['where'] = array('amount <=' => 10);
		$count_soldout_products = $this->product_model->get_list($input);
		$this->data['count_soldout_products'] = count($count_soldout_products);

		$this->data['page_title'] = 'Trang quản trị';
		$this->data['temp'] = 'admin/home';
		$this->load->view('admin/layout_admin', $this->data);
	}
}
