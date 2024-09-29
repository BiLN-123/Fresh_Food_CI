<?php
class Shop_details extends MY_Controller{
	function index($id){
		$this->load->model('product_model');
		//Tăng view san phẩm lên 1
		$product_details = $this->product_model->get_info($id);
		$views = $product_details->views;
		$data = array(
			'views'      => $views + 1
		);
		$this->product_model->update($id, $data);

		//lấy thông tin sản phẩm
		$product = $this->product_model->get_info($id);
		if($product->status == 1)
		{
			$this->data['product'] = $product;
			$this->data['page_title'] = $product->name;

		}
		else{
			$this->data['product'] = '';
			$this->data['page_title'] = 'Không tìm thấy sản phẩm';

		}

		//4 sản phẩm liên quan
		$input =array();
		$input['order'] = array('created_at', 'DESC');
		$input['limit'] = array(4, 0);
		$input['where'] = array('category_id'=>$product->category_id, 'id !='=> $id, 'status'=>1);
		$four_recent_products = $this->product_model->get_list($input);
		$this->data['four_recent_products'] = $four_recent_products;


		$this->data['hero_normal']= 'hero_normal';
		$this->data['temp'] = 'site/shop-details/index';
		$this->load->view('site/layout_site', $this->data);
	}

}
