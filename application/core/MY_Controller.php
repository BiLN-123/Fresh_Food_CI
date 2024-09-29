<?php


class MY_Controller extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
		$controller = $this->uri->segment(1);
		switch ($controller){
			case 'admin':
			{
				$this->_check_login();
				$this->load->helper('admin');
				break;
			}
			default:
			{
				//lấy danh sách danh mục
				$this->load->model('category_model');
				$cate_list = $this->category_model->get_list();
				$this->data['cate_list'] = $cate_list;

				//lấy thông tin setting
				$this->load->model('setting_model');

				$setting_name = $this->setting_model->get_info_rule(array('setting_key'=>'name'),'setting_value');
//				$this->data['name'] = $setting_name->setting_value;

				$setting_address = $this->setting_model->get_info_rule(array('setting_key'=>'address'),'setting_value');
				$setting_phone = $this->setting_model->get_info_rule(array('setting_key'=>'phone'),'setting_value');
				$setting_map = $this->setting_model->get_info_rule(array('setting_key'=>'map'),'setting_value');
				$setting_email = $this->setting_model->get_info_rule(array('setting_key'=>'email'),'setting_value');
				$setting_facebook = $this->setting_model->get_info_rule(array('setting_key'=>'facebook'),'setting_value');
				$setting_twitter = $this->setting_model->get_info_rule(array('setting_key'=>'twitter'),'setting_value');
				$setting_linkedin = $this->setting_model->get_info_rule(array('setting_key'=>'linkedin'),'setting_value');
				$this->data['name'] = $setting_name->setting_value;
				$this->data['address'] = $setting_address->setting_value;
				$this->data['phone'] = $setting_phone->setting_value;
				$this->data['map'] = $setting_map->setting_value;
				$this->data['email'] = $setting_email->setting_value;
				$this->data['facebook'] = $setting_facebook->setting_value;
				$this->data['twitter'] = $setting_twitter->setting_value;
				$this->data['linkedin'] = $setting_linkedin->setting_value;

				//kiem tra xem thanh vien da dang nhap hay chua
				$user_id_login = $this->session->userdata('user_id_login');
				$this->data['user_id_login'] = $user_id_login;
				//neu da dang nhap thi lay thong tin cua thanh vien
				if($user_id_login)
				{
					$this->load->model('user_model');
					$user = $this->user_model->get_info($user_id_login);
					$this->data['user'] = $user;

					// $input =array();
					// $this->load->model('cart_model');
					// $input['where'] = array('user_id'=>$user_id_login);
					// $cart_product = $this->cart_model->get_list($input);
					// $this->data['count_cart'] = count($cart_product);

					$this->db->select('* , carts.id AS cart_id, (carts.quantity * products.price) AS total');
					$this->db->from('carts');
					$this->db->join('products', 'carts.product_id = products.id');
					$this->db->where('carts.user_id', $this->session->userdata('user_id_login'));
					$this->db->where('products.status', 1);
					$query = $this->db->get();
					// $this->data['cart_products'] = $query->result();
					$this->data['count_cart'] = count($query->result());
				}
			}
		}
	}
	/*
	* Kiem tra trang thai dang nhap cua admin
	*/
	private function _check_login()
	{
		$controller = $this->uri->rsegment('1');
		$controller = strtolower($controller);

		$level_login = $this->session->userdata('user_level_login');
		//neu ma chua dang nhap,ma truy cap 1 controller khac login
		if(!$level_login && $level_login != 1)
		{
			redirect('home');
		}
	}
}
