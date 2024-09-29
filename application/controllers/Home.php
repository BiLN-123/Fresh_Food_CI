<?php
class Home extends MY_Controller{

	function index(){
		$this->load->model('news_model');
		$input['order'] = array('created_at', 'DESC');
		$input['limit'] = array(3, 0);
		$input['where'] = array('status'=>1);
		$news = $this->news_model->get_list($input);
		$this->data['news'] = $news;

		$input =array();
		$this->load->model('slider_model');
		$input['where'] = array('status'=>1);
		$sliders = $this->slider_model->get_list($input);
		$this->data['sliders'] = $sliders;

		$input =array();
		$this->load->model('product_model');
		$input['order'] = array('created_at', 'DESC');
		$input['limit'] = array(6, 0);
		$input['where'] = array('status'=>1);
		$latest_products = $this->product_model->get_list($input);
		$this->data['latest_products'] = $latest_products;

		$input =array();
		$input['order'] = array('buyed', 'DESC');
		$input['limit'] = array(6, 0);
		$input['where'] = array('status'=>1);
		$buyed_products = $this->product_model->get_list($input);
		$this->data['buyed_products'] = $buyed_products;

		$input =array();
		$input['order'] = array('views', 'DESC');
		$input['limit'] = array(6, 0);
		$input['where'] = array('status'=>1);
		$views_products = $this->product_model->get_list($input);
		$this->data['views_products'] = $views_products;




		$this->data['page_title'] = 'Cửa hàng thực phẩm Fresh Food';
		$this->data['temp'] = 'site/home/index';
		$this->load->view('site/layout_site', $this->data);
	}
}
