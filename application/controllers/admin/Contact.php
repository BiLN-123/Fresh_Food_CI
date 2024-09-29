<?php
class Contact extends MY_Controller{
	function index(){
		$this->load->model('contact_model');
		$input = array();
		$listContacts = $this->contact_model->get_list($input);
		$this->data['listContacts'] = $listContacts;

		$this->data['page_title'] = 'Phản hồi từ khách hàng';
		$this->data['temp'] = 'admin/contact/index';
		$this->load->view('admin/layout_admin', $this->data);
	}
}
