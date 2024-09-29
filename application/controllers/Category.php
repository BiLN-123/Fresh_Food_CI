<?php
class Category extends MY_Controller{
	function index($id){
		$this->load->model('category_model');
		$category = $this->category_model->get_info($id);
		$this->load->model('product_model');

		//lấy toàn bộ sản phẩm lọc theo ngày
		$input =array();
		$input['order'] = array('created_at', 'DESC');
		$input['where'] = array('category_id'=>$id, 'status'=>1);
		$products = $this->product_model->get_list($input);
		$this->data['products'] = $products;

		//Lấy 5 sản phẩm bán chạy nhất lọc theo buyed
		$input =array();
		$input['order'] = array('buyed', 'DESC');
		$input['where'] = array('category_id'=>$id, 'status'=>1);
		$input['limit'] = array(5, 0);
		$buyed_products = $this->product_model->get_list($input);
		$this->data['buyed_products'] = $buyed_products;

		//Lấy 5 sản phẩm xem nhiều nhất
		$input =array();
		$input['order'] = array('views', 'DESC');
		$input['where'] = array('category_id'=>$id, 'status'=>1);
		$input['limit'] = array(5, 0);
		$views_products = $this->product_model->get_list($input);
		$this->data['views_products'] = $views_products;

		$this->data['hero_normal']= 'hero_normal';
		$this->data['page_title'] = $category->name;
		$this->data['temp'] = 'site/category/index';
		$this->load->view('site/layout_site', $this->data);
	}
}
