<?php
class Order extends MY_Controller{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('order_model');
	}

	function index(){
		//lấy tất cả order
		$segment = $this->uri->segment(4);

		$input = array();
		$input['order'] = array('created_at', 'DESC');
		if($segment == 'unpaid'){
			$input['where'] = array('status'=>0);
		}
		elseif ($segment == 'shipment'){
			$input['where'] = array('status'=>1);
		}
		elseif ($segment == 'shipping'){
			$input['where'] = array('status'=>2);

		}
		elseif ($segment == 'completed'){
			$input['where'] = array('status'=>3);

		}
		elseif ($segment == 'cancelled'){
			$input['where'] = array('status'=>4);

		}
		$list_orders = $this->order_model->get_list($input);
		$this->data['list_orders'] = $list_orders;


		//load view
		$this->data['page_title'] = 'Đơn hàng';
		$this->data['temp'] = 'admin/order/index';
		$this->load->view('admin/layout_admin', $this->data);
	}

	function show($id){

		$order = $this->order_model->get_info($id);
		$this->data['order'] = $order;

		//hiển thị ra view
		$this->data['page_title'] = 'Chi tiết đơn hàng';
		$this->data['temp'] = 'admin/order/order_show';
		$this->load->view('admin/layout_admin', $this->data);
	}

	function order_update($id, $a){
		$order = $this->order_model->get_info($id);
		if(!$order || $order->status == 3 || $order->status == 4 ){
			redirect(admin_url('order/list/all'));
		}

		$data = array(
			'status'      => $a
		);
		//them moi vao csdl
		if($this->order_model->update($id, $data))
		{
			//tạo ra nội dung thông báo
			$this->session->set_flashdata('message', 'Cập nhật dữ liệu thành công');
		}else{
			$this->session->set_flashdata('message', 'Không thêm được');
		}
		redirect(admin_url('order/list/all'));
	}

	function print_order(){
		$this->load->library('pdf');
	}
}
