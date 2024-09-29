<?php
class Setting extends MY_Controller{
	function __construct()
	{
		parent::__construct();
		$this->load->model('setting_model');
	}

	function index(){
		$input['order'] = array('id','ASC');
		$setting = $this->setting_model->get_list($input);

		$this->data['setting'] = $setting;

		//lay nội dung của biến message
		$message = $this->session->flashdata('message');
		$this->data['message'] = $message;

		//load view
		$this->data['page_title'] = 'Cài đặt';
		$this->data['temp'] = 'admin/setting/index';
		$this->load->view('admin/layout_admin', $this->data);

	}
	function add(){

		//neu ma co du lieu post len thi kiem tra
		if($this->input->post())
		{
			//load thư viện validate dữ liệu
			$this->load->library('form_validation');
			$this->load->helper('form');

			$this->form_validation->set_rules('setting_key', 'Tên', 'required');
			$this->form_validation->set_rules('setting_value', 'Tên', 'required');
			$this->form_validation->set_rules('type', 'Loại', 'required');

			//nhập liệu chính xác
			if($this->form_validation->run())
			{
				//them vao csdl
				$setting_key = $this->input->post('setting_key');
				$setting_value = $this->input->post('setting_value');
				$type = $this->input->post('type');
				//luu du lieu can them
				$data = array(
					'setting_key'      => $setting_key,
					'setting_value' =>$setting_value,
					'type'=>$type
				);
				//them moi vao csdl
				if($this->setting_model->create($data))
				{
					//tạo ra nội dung thông báo
					$this->session->set_flashdata('message', 'Thêm mới dữ liệu thành công');
				}else{
					$this->session->set_flashdata('message', 'Không thêm được');
				}
				//chuyen tới trang danh sách
				redirect(admin_url('setting'));
			}
		}

		$this->data['page_title'] = 'Thêm mới cài đặt';
		$this->data['temp'] = 'admin/setting/add';
		$this->load->view('admin/layout_admin', $this->data);
	}
	function edit($id){
		$setting = $this->setting_model->get_info($id);
		if(!$setting)
		{
			$this->session->set_flashdata('message', 'Danh mục này không tồn tại');
			redirect(admin_url('setting'));
		}
		$this->data['setting'] = $setting;

		//neu ma co du lieu post len thi kiem tra
		if($this->input->post())
		{
			//load thư viện validate dữ liệu
			$this->load->library('form_validation');
			$this->load->helper('form');

			$this->form_validation->set_rules('setting_key', 'Tên', 'required');
			$this->form_validation->set_rules('setting_value', 'Tên', 'required');

			//nhập liệu chính xác
			if($this->form_validation->run())
			{
				//them vao csdl
				$setting_key = $this->input->post('setting_key');
				$setting_value = $this->input->post('setting_value');

				//luu du lieu can them
				$data = array(
					'setting_key'      => $setting_key,
					'setting_value'      => $setting_value,
				);

				//them moi vao csdl
				if($this->setting_model->update($id, $data))
				{
					//tạo ra nội dung thông báo
					$this->session->set_flashdata('message', 'Cập nhật dữ liệu thành công');
				}else{
					$this->session->set_flashdata('message', 'Không thêm được');
				}
				//chuyen tới trang danh sách
				redirect(admin_url('setting'));
			}
		}

		$this->data['page_title'] = 'Cập nhật cài đặt';
		$this->data['temp'] = 'admin/setting/edit';
		$this->load->view('admin/layout_admin', $this->data);
	}


}
