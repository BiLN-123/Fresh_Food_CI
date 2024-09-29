<?php
Class Order extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('cart_model');
		$this->load->model('user_model');
		$this->load->model('product_model');
		$this->load->model('order_model');
		$this->load->model('orderdetails_model');
	}

	function index(){
		$this->load->library('form_validation');
		$this->load->helper('form');
		if ($this->session->userdata('user_id_login')) {
			//lấy thông tin user
			$user = $this->user_model->get_info($this->session->userdata('user_id_login'));
			$this->data['user'] = $user;

			//lấy thông tin giỏ hàng
			$this->db->select('* , (carts.quantity * products.price) AS total');
			$this->db->from('carts');
			$this->db->join('products', 'carts.product_id = products.id');
			$this->db->where('carts.user_id', $this->session->userdata('user_id_login'));
			$this->db->where('status', 1);
			$query = $this->db->get();
			$this->data['cart_products'] = $query->result();

			$order_total = 0;

			foreach ($query->result() as $row) {
				$order_total += $row->total;
			}
			$this->data['order_total'] = $order_total;
		}

		$this->data['hero_normal'] = 'hero_normal';
		$this->data['page_title'] = 'Đặt hàng';
		$this->data['temp'] = 'site/order/index';
		$this->load->view('site/layout_site', $this->data);
	}
	function checkout()
	{
		if(!$this->session->userdata('user_id_login'))
		{
			redirect('login');
		}
		//kiểm tra login
		if($this->session->userdata('user_id_login'))
		{
			$user = $this->user_model->get_info($this->session->userdata('user_id_login'));
		}
		$this->data['user']  = $user;
		$this->db->select('* , (carts.quantity * products.price) AS total');
		$this->db->from('carts');
		$this->db->join('products', 'carts.product_id = products.id');
		$this->db->where('carts.user_id', $this->session->userdata('user_id_login'));
		$this->db->where('products.status', 1);
		$query = $this->db->get();
		$this->data['cart_products'] = $query->result();

		$order_total = 0;

		foreach ($query->result() as $row) {
			$order_total += $row->total;
			if($row->quantity > $row->amount){
				$this->session->set_flashdata('message', 'Đặt hàng thất bại. '. $row->name.' chỉ còn '.$row->amount . ' sản phẩm');
				redirect (base_url('cart'));
			}

		}
		$this->data['order_total'] = $order_total;

		$this->load->library('form_validation');
		$this->load->helper('form');

		//neu ma co du lieu post len thi kiem tra
		if($this->input->post())
		{
			$this->form_validation->set_rules('name', 'Tên', 'required|min_length[8]');
			$this->form_validation->set_rules('phone', 'Số điện thoại', 'required');
			$this->form_validation->set_rules('note', 'Ghi chú');
			$this->form_validation->set_rules('address', 'Địa chỉ', 'required');

			//nhập liệu chính xác
			if($this->form_validation->run())
			{
				//them vao csdl
				$data = array(
					'status'   => 0, //trang thai chua thanh toan
					'user_id'  => $this->session->userdata('user_id_login'), //id thanh vien mua hang neu da dang nhap
					'name'     => $this->input->post('name'),
					'phone'    => $this->input->post('phone'),
					'address'    => $this->input->post('address'),
					'note'       => $this->input->post('note'), //ghi chú khi mua hàng
					'payment'        => $order_total,//tong so tien can thanh toan
					'created_at'       => date('Y-m-d H:i:s'),
				);

				//them du lieu vao bang order
				$this->order_model->create($data);

				$transaction_id = $this->db->insert_id();  //lấy ra id của giao dịch vừa thêm vào

				//them vao bảng order_details (chi tiết đơn hàng)
				foreach ( $query->result() as $row)
				{
					$data = array(
						'order_id' => $transaction_id,
						'product_id'     => $row->product_id,
						'quantity'            => $row->quantity,
						'name'            => $row->name,
						'image'            => $row->image,
						'price'         => $row->price,
					);
					$this->orderdetails_model->create($data);

					$product_buyed = $this->product_model->get_info($row->product_id);
					$databuyed = array(
						'buyed'      => $product_buyed->buyed + 1,
						'amount'	=> $product_buyed->amount - $row->quantity
					);
					$this->product_model->update($row->product_id, $databuyed);
				}
				//xóa toàn bô giỏ hang
				$this->cart_model->del_rule(array('user_id'=>$this->session->userdata('user_id_login')));
				//tạo ra nội dung thông báo
				$this->session->set_flashdata('message', 'Đặt hàng thành công.');

				//chuyen tới trang danh sách quản trị viên
				redirect('cart');
			}
		}


		//hiển thị ra view
		$this->data['hero_normal'] = 'hero_normal';
		$this->data['page_title'] = 'Đặt hàng';
		$this->data['temp'] = 'site/order/index';
		$this->load->view('site/layout_site', $this->data);
	}

	function purchase(){
	if($this->session->userdata('user_id_login')){

		$user_id = $this->session->userdata('user_id_login');
		$user = $this->user_model->get_info($user_id);
		if(!$user)
		{
			redirect();
		}
		$this->data['user']  = $user;

		//lấy tất cả order
		$input = array();
		$input['order'] = array('created_at', 'DESC');
		$input['where']=array('user_id'=>$this->session->userdata('user_id_login'));
		$list_orders = $this->order_model->get_list($input);
		$this->data['list_orders'] = $list_orders;

		//lấy order chờ xác nhận
		$input = array();
		$input['order'] = array('created_at', 'DESC');
		$input['where']=array('user_id'=>$this->session->userdata('user_id_login'), 'status'=>0);
		$list_orders_confirm = $this->order_model->get_list($input);
		$this->data['list_orders_confirm'] = $list_orders_confirm;

		//Chờ lấy hàng
		$input = array();
		$input['order'] = array('created_at', 'DESC');
		$input['where']=array('user_id'=>$this->session->userdata('user_id_login'), 'status'=>1);
		$list_orders_order = $this->order_model->get_list($input);
		$this->data['list_orders_order'] = $list_orders_order;

		//Đang giao
		$input = array();
		$input['order'] = array('created_at', 'DESC');
		$input['where']=array('user_id'=>$this->session->userdata('user_id_login'), 'status'=>2);
		$list_orders_delivery = $this->order_model->get_list($input);
		$this->data['list_orders_delivery'] = $list_orders_delivery;

		//Đã giao
		$input = array();
		$input['order'] = array('created_at', 'DESC');
		$input['where']=array('user_id'=>$this->session->userdata('user_id_login'), 'status'=>3);
		$list_orders_delivered = $this->order_model->get_list($input);
		$this->data['list_orders_delivered'] = $list_orders_delivered;

		//Huỷ
		$input = array();
		$input['order'] = array('created_at', 'DESC');
		$input['where']=array('user_id'=>$this->session->userdata('user_id_login'), 'status'=>4);
		$list_orders_delete = $this->order_model->get_list($input);
		$this->data['list_orders_delete'] = $list_orders_delete;


		//hiển thị ra view
		$this->data['hero_normal']= 'hero_normal';
		$this->data['page_title'] = 'Lịch sử mua hàng';
		$this->data['temp'] = 'site/user/purchase';
		$this->load->view('site/layout_site', $this->data);

	}
	else{
		redirect('login');
	}
}

	function delete($id){
		if(!$this->session->userdata('user_id_login')){
			redirect('login');
		}
		$order = $this->order_model->get_info($id);
		if(!$order || $order->user_id != $this->session->userdata('user_id_login')){
			redirect('/');
		}

		$data = array(
			'status'      => 4
		);
		//them moi vao csdl
		if($this->order_model->update($id, $data))
		{
			//tạo ra nội dung thông báo
			$this->session->set_flashdata('message', 'Cập nhật dữ liệu thành công');
		}else{
			$this->session->set_flashdata('message', 'Không thêm được');
		}
		redirect('user/purchase');
	}


	function show($id){
		if(!$this->session->userdata('user_id_login')){
			redirect('login');
		}
		$order = $this->order_model->get_info($id);
		if(!$order || $order->user_id != $this->session->userdata('user_id_login')){
			redirect('/');
		}
		$this->data['order'] = $order;

		//hiển thị ra view
		$this->data['hero_normal'] = 'hero_normal';
		$this->data['page_title'] = 'Chi tiết đơn hàng';
		$this->data['temp'] = 'site/user/order_show';
		$this->load->view('site/layout_site', $this->data);
	}
}
