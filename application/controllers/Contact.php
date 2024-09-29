<?php
class Contact extends MY_Controller{

	function index(){
		if($this->input->post())
		{
			$this->load->model('contact_model');
			//load thư viện validate dữ liệu
			$this->load->library('form_validation');
			$this->load->helper('form');

			$this->form_validation->set_rules('name', 'Tên', 'required');
			$this->form_validation->set_rules('email', 'Email', 'required');
			$this->form_validation->set_rules('message', 'Message', 'required');

			//nhập liệu chính xác
			if($this->form_validation->run())
			{
				//them vao csdl
				$name = $this->input->post('name');
				$email = $this->input->post('email');
				$message = $this->input->post('message');

				//luu du lieu can them
				$data = array(
					'name'      => $name,
					'email'      => $email,
					'message'      => $message,
					'created_at' =>  date('Y-m-d H:i:s')
				);
				//them moi vao csdl
				if($this->contact_model->create($data))
				{
					//tạo ra nội dung thông báo
					$this->session->set_flashdata('message', 'Gửi phản hồi thành công');
				}else{
					$this->session->set_flashdata('message', 'Gửi phản hồi không thành công');
				}
			}
		}

		$message = $this->session->flashdata('message');
		$this->data['message'] = $message;

		$this->data['hero_normal']= 'hero_normal';
		
		$this->data['page_title'] = 'Liên hệ';
		$this->data['temp'] = 'site/contact/index';
		$this->load->view('site/layout_site', $this->data);
	}
}
