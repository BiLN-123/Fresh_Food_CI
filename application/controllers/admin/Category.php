<?php
Class Category extends MY_Controller{
	function __construct()
	{
		parent::__construct();
		$this->load->model('category_model');
	}

	function index(){
		$input = array();
		$list = $this->category_model->get_list($input);
		$this->data['list'] = $list;

		//lay nội dung của biến message
		$message = $this->session->flashdata('message');
		$this->data['message'] = $message;

		//load view
		$this->data['page_title'] = 'Danh mục';
		$this->data['temp'] = 'admin/category/index';
		$this->load->view('admin/layout_admin', $this->data);

	}
	function add(){

		//neu ma co du lieu post len thi kiem tra
		if($this->input->post())
		{
			$this->load->helper('slug');
			//load thư viện validate dữ liệu
			$this->load->library('form_validation');
			$this->load->helper('form');

			$this->form_validation->set_rules('name', 'Tên', 'required');

			//nhập liệu chính xác
			if($this->form_validation->run())
			{
				//them vao csdl
				$name = $this->input->post('name');
				
				//luu du lieu can them
				$data = array(
					'name'      => $name,
					'slug'		=> create_slug($name),
					'created_at'=> date('Y-m-d H:i:s')
				);
				//them moi vao csdl
				if($this->category_model->create($data))
				{
					//tạo ra nội dung thông báo
					$this->session->set_flashdata('message', 'Thêm mới dữ liệu thành công');
				}else{
					$this->session->set_flashdata('message', 'Không thêm được');
				}
				//chuyen tới trang danh sách
				redirect(admin_url('category'));
			}
		}

		$this->data['page_title'] = 'Thêm mới danh mục';
		$this->data['temp'] = 'admin/category/add';
		$this->load->view('admin/layout_admin', $this->data);
	}

	function edit($id){
		$category = $this->category_model->get_info($id);
		if(!$category)
		{
			$this->session->set_flashdata('message', 'Danh mục này không tồn tại');
			redirect(admin_url('category'));
		}
		$this->data['category'] = $category;

		//neu ma co du lieu post len thi kiem tra
		if($this->input->post())
		{
			$this->load->helper('slug');
			//load thư viện validate dữ liệu
			$this->load->library('form_validation');
			$this->load->helper('form');

			$this->form_validation->set_rules('name', 'Tên', 'required');

			//nhập liệu chính xác
			if($this->form_validation->run())
			{
				//them vao csdl
				$name = $this->input->post('name');

				//luu du lieu can them
				$data = array(
					'name'      => $name,
					'slug'		=> create_slug($name),

				);

				//them moi vao csdl
				if($this->category_model->update($id, $data))
				{
					//tạo ra nội dung thông báo
					$this->session->set_flashdata('message', 'Cập nhật dữ liệu thành công');
				}else{
					$this->session->set_flashdata('message', 'Không thêm được');
				}
				//chuyen tới trang danh sách
				redirect(admin_url('category'));
			}
		}

		$this->data['page_title'] = 'Cập nhật danh mục';
		$this->data['temp'] = 'admin/category/edit';
		$this->load->view('admin/layout_admin', $this->data);
	}


	function delete($id){

		$this->_del($id);

		//tạo ra nội dung thông báo
		$this->session->set_flashdata('message', 'Xóa dữ liệu thành công');
		redirect(admin_url('category'));
	}
	private function _del($id, $rediect = true)
	{
		$info = $this->category_model->get_info($id);
		if(!$info)
		{
			//tạo ra nội dung thông báo
			$this->session->set_flashdata('message', 'không tồn tại danh mục này');
			if($rediect)
			{
				redirect(admin_url('category'));
			}else{
				return false;
			}
		}

		//kiem tra xem danh muc nay co san pham khong
		$this->load->model('product_model');
		$product = $this->product_model->get_info_rule(array('category_id' => $id), 'id');
		if($product)
		{
			//tạo ra nội dung thông báo
			$this->session->set_flashdata('message', 'Danh mục '.$info->name.' có chứa sản phẩm,bạn cần xóa các sản phẩm trước khi xóa danh mục');
			if($rediect)
			{
				redirect(admin_url('category'));
			}else{
				return false;
			}
		}

		//xoa du lieu
		$this->category_model->delete($id);

	}
}
