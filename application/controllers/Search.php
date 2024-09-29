<?php
class Search extends MY_Controller{
	function index(){
		$keyword = $this->input->GET('keyword', TRUE);
		$this->load->model('product_model');

		//lấy toàn bộ sản phẩm lọc theo từ khoá
		$input =array();
		$input['like'] = array('name', $keyword);
		$input['order'] = array('created_at', 'DESC');
		$input['where'] = array('status'=>1);
		$products = $this->product_model->get_list($input);
		$this->data['products'] = $products;

		//Lấy 5 sản phẩm bán chạy nhất lọc theo buyed
		$input =array();
		$input['order'] = array('buyed', 'DESC');
		$input['where'] = array('status'=>1);
		$input['limit'] = array(5, 0);
		$buyed_products = $this->product_model->get_list($input);
		$this->data['buyed_products'] = $buyed_products;

		//Lấy 5 sản phẩm xem nhiều nhất
		$input =array();
		$input['order'] = array('views', 'DESC');
		$input['where'] = array('status'=>1);
		$input['limit'] = array(5, 0);
		$views_products = $this->product_model->get_list($input);
		$this->data['views_products'] = $views_products;

		$this->data['keyword'] = $keyword;
		$this->data['hero_normal']= 'hero_normal';
		$this->data['page_title'] = 'Tìm kiếm sản phẩm';
		$this->data['temp'] = 'site/search-product/index';
		$this->load->view('site/layout_site', $this->data);
	}
}
