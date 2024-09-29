<?php


class Slider extends MY_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('slider_model');
	}

	function index()
	{
		$input['where'] = array('status'=>'1');
		$list = $this->slider_model->get_list($input);
		$this->data['list'] = $list;

		//lay nội dung của biến message
		$message = $this->session->flashdata('message');
		$this->data['message'] = $message;

		//load view
		$this->data['page_title'] = 'Slider';
		$this->data['temp'] = 'admin/slider/index';
		$this->load->view('admin/layout_admin', $this->data);

	}

	function trash()
	{
		$input['where'] = array('status'=>'0');
		$list = $this->slider_model->get_list($input);
		$this->data['list'] = $list;

		//lay nội dung của biến message
		$message = $this->session->flashdata('message');
		$this->data['message'] = $message;

		//load view
		$this->data['page_title'] = 'Thùng rác slider';
		$this->data['temp'] = 'admin/slider/trash';
		$this->load->view('admin/layout_admin', $this->data);

	}
	function add()
	{

		//neu ma co du lieu post len thi kiem tra
		if ($this->input->post()) {
			//load thư viện validate dữ liệu
			$this->load->library('form_validation');
			$this->load->helper('form');

			$this->form_validation->set_rules('title', 'Tiêu đề', 'required');
			$this->form_validation->set_rules('description', 'Mô tả', 'required');
			$this->form_validation->set_rules('thumbnail', 'Ảnh', 'required');
			$this->form_validation->set_rules('link', 'Đường dẫn', 'required');

			//nhập liệu chính xác
			if ($this->form_validation->run()) {

				$status = $this->input->post('status') ? 1 : 0;
				//lay ten file anh minh hoa duoc update len
				$this->load->library('upload_library');
				$upload_path = './uploads/sliders';
				$upload_data = $this->upload_library->upload($upload_path, 'image');
				$thumbnail = '';
				if (isset($upload_data['file_name'])) {
					$thumbnail = $upload_data['file_name'];
				}

				//luu du lieu can them
				$data = array(
					'title' => $this->input->post('title'),
					'thumbnail' => $this->input->post('thumbnail'),
					'description' => $this->input->post('description'),
					'link' => $this->input->post('link'),
					'status' => $status,
				);
				//them moi vao csdl
				//lay nội dung của biến message
				$message = $this->session->flashdata('message');
				$this->data['message'] = $message;

				if ($this->slider_model->create($data)) {
					//tạo ra nội dung thông báo
					$this->session->set_flashdata('message', 'Thêm mới dữ liệu thành công');
					redirect(admin_url('slider'));
				} else {
					$this->session->set_flashdata('message', 'Không thêm được');
					redirect(admin_url('slider/add'));
				}

				//chuyen tới trang danh sách
				//redirect(admin_url('slider'));
			}
		}

		$this->data['page_title'] = 'Thêm slider';
		$this->data['temp'] = 'admin/slider/add';
		$this->load->view('admin/layout_admin', $this->data);
	}

	function edit($id)
	{
		$slider = $this->slider_model->get_info($id);
		if (!$slider) {
			//tạo ra nội dung thông báo
			$this->session->set_flashdata('message', 'Không tồn tại slide này');
			redirect(admin_url('slider'));
		}
		$this->data['slider'] = $slider;


		//neu ma co du lieu post len thi kiem tra
		if ($this->input->post()) {

			//load thư viện validate dữ liệu
			$this->load->library('form_validation');
			$this->load->helper('form');

			$this->form_validation->set_rules('title', 'Tiêu đề', 'required');
			$this->form_validation->set_rules('description', 'Mô tả', 'required');
			$this->form_validation->set_rules('link', 'Đường dẫn', 'required');

			//nhập liệu chính xác
			if ($this->form_validation->run()) {

				$status = ($this->input->post('status')) ? 1 : 0;

				if ($this->input->post('thumbnail')) {
					//lay ten file anh minh hoa duoc update len
					$this->load->library('upload_library');
					$upload_path = './uploads/sliders';
					$upload_data = $this->upload_library->upload($upload_path, 'image');
					$thumbnail = '';
					if (isset($upload_data['file_name'])) {
						$thumbnail = $upload_data['file_name'];
					}

					//luu du lieu can them
					$data = array(
						'title' => $this->input->post('title'),
						'thumbnail' => $this->input->post('thumbnail'),
						'description' => $this->input->post('description'),
						'link' => $this->input->post('link'),
						'status' => $status
					);

				} else {
					$data = array(
						'title' => $this->input->post('title'),
						'description' => $this->input->post('description'),
						'link' => $this->input->post('link'),
						'status' => $status
					);
				}

				//them moi vao csdl
				if ($this->slider_model->update($slider->id, $data)) {
					//tạo ra nội dung thông báo
					$this->session->set_flashdata('message', 'Cập nhật dữ liệu thành công');
				} else {
					$this->session->set_flashdata('message', 'Không cập nhật được');
				}
				//chuyen tới trang danh sách
				redirect(admin_url('slider'));
			}
		}

		//load view
		$this->data['page_title'] = 'Cập nhật slider';
		$this->data['temp'] = 'admin/slider/edit';
		$this->load->view('admin/layout_admin', $this->data);
	}


	function deleted_at($id){
		$slider = $this->slider_model->get_info($id);
		if (!$slider) {
			//tạo ra nội dung thông báo
			$this->session->set_flashdata('message', 'Không tồn tại slide này');
			redirect(admin_url('slider'));
		}
		if($slider->status == 0){
			$data = array(
				'status' => 1
			);
		}
		else{
			$data = array(
				'status' => 0
			);
		}

		if ($this->slider_model->update($slider->id, $data)) {
			$this->session->set_flashdata('message', 'Xoá thành công');
		} else {
			$this->session->set_flashdata('message', 'Xoá không thành công');
		}
		redirect(admin_url('slider'));
	}


	function delete($id)
	{

		$this->_del($id);

		//tạo ra nội dung thông báo
		$this->session->set_flashdata('message', 'Xóa dữ liệu thành công');
		redirect(admin_url('slider'));
	}

	private function _del($id, $rediect = true)
	{
		$info = $this->slider_model->get_info($id);
		if (!$info) {
			//tạo ra nội dung thông báo
			$this->session->set_flashdata('message', 'không tồn tại danh mục này');
			if ($rediect) {
				redirect(admin_url('slider'));
			} else {
				return false;
			}
		}

		//kiem tra xem danh muc nay co san pham khong
		$this->load->model('product_model');
		$product = $this->product_model->get_info_rule(array('id' => $id), 'id');
		if ($product) {
			//tạo ra nội dung thông báo
			$this->session->set_flashdata('message', 'Danh mục ' . $info->name . ' có chứa sản phẩm,bạn cần xóa các sản phẩm trước khi xóa danh mục');
			if ($rediect) {
				redirect(admin_url('slider'));
			} else {
				return false;
			}
		}

		//xoa du lieu
		$this->slider_model->delete($id);

	}

}
