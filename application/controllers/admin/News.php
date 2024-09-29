<?php

class News extends MY_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('news_model');
	}

	function index()
	{
//		$input['where'] = array('status'=>'1');
		$input = array();
		$list = $this->news_model->get_list($input);
		$this->data['list'] = $list;

		//lay nội dung của biến message
		$message = $this->session->flashdata('message');
		$this->data['message'] = $message;

		//load view
		$this->data['page_title'] = 'Bài viết';
		$this->data['temp'] = 'admin/news/index';
		$this->load->view('admin/layout_admin', $this->data);

	}

	function add()
	{
		//neu ma co du lieu post len thi kiem tra
		if ($this->input->post()) {
//			die(time());
			//load thư viện validate dữ liệu
			$this->load->library('form_validation');
			$this->load->helper('form');
			$this->load->helper('slug');

			$this->form_validation->set_rules('title', 'Tiêu đề', 'required');
			$this->form_validation->set_rules('description', 'Mô tả', 'required');
			$this->form_validation->set_rules('image', 'Ảnh', 'required');
			$this->form_validation->set_rules('content', 'Nội dung', 'required');

			//nhập liệu chính xác
			if ($this->form_validation->run()) {

				$status = $this->input->post('status') ? 1 : 0;
				//lay ten file anh minh hoa duoc update len
				$this->load->library('upload_library');
				$upload_path = './uploads/news';
				$upload_data = $this->upload_library->upload($upload_path, 'image');
				$image = '';
				if (isset($upload_data['file_name'])) {
					$image = $upload_data['file_name'];
				}

				//luu du lieu can them
				$data = array(
					'title' => $this->input->post('title'),
					'slug' => create_slug($this->input->post('title')),
					'image' => $this->input->post('image'),
					'description' => $this->input->post('description'),
					'content' => $this->input->post('content'),
					'created_at' =>  date('Y-m-d H:i:s'),
					'status' => $status,
				);
				//them moi vao csdl
				//lay nội dung của biến message
				$message = $this->session->flashdata('message');
				$this->data['message'] = $message;

				if ($this->news_model->create($data)) {
					//tạo ra nội dung thông báo
					$this->session->set_flashdata('message', 'Thêm mới dữ liệu thành công');
					redirect(admin_url('news'));
				} else {
					$this->session->set_flashdata('message', 'Không thêm được');
					redirect(admin_url('news/add'));
				}

				//chuyen tới trang danh sách
				//redirect(admin_url('news'));
			}
		}

		$this->data['page_title'] = 'Thêm bài viết';
		$this->data['temp'] = 'admin/news/add';
		$this->load->view('admin/layout_admin', $this->data);
	}

	/*
     * Chinh sua bài viết
     */
	function edit($id)
	{
		$news = $this->news_model->get_info($id);
		if (!$news) {
			//tạo ra nội dung thông báo
			$this->session->set_flashdata('message', 'Không tồn tại bài viết này');
			redirect(admin_url('news'));
		}
		$this->data['news'] = $news;


		//load thư viện validate dữ liệu
		$this->load->library('form_validation');
		$this->load->helper('form');
		$this->load->helper('slug');


		//neu ma co du lieu post len thi kiem tra
		if ($this->input->post()) {
			$this->form_validation->set_rules('title', 'Tiêu đề bài viết', 'required');
			$this->form_validation->set_rules('content', 'Nội dung bài viết', 'required');

			//nhập liệu chính xác
			if ($this->form_validation->run()) {
				$status = ($this->input->post('status')) ? 1 : 0;

				if ($this->input->post('image')) {
					//lay ten file anh minh hoa duoc update len
					$this->load->library('upload_library');
					$upload_path = './uploads/news';
					$upload_data = $this->upload_library->upload($upload_path, 'image');
					$image = '';
					if (isset($upload_data['file_name'])) {
						$image = $upload_data['file_name'];
					}

					//luu du lieu can them
					$data = array(
						'title' => $this->input->post('title'),
						'slug' => create_slug($this->input->post('title')),
						'image' => $this->input->post('image'),
						'description' => $this->input->post('description'),
						'content' => $this->input->post('content'),
						'status' => $status,
					);

				} else {
					$data = array(
						'title' => $this->input->post('title'),
						'slug' => create_slug($this->input->post('title')),
//					'image' => $this->input->post('image'),
						'description' => $this->input->post('description'),
						'content' => $this->input->post('content'),
						'status' => $status,
					);
				}


				//them moi vao csdl
				if ($this->news_model->update($news->id, $data)) {
					//tạo ra nội dung thông báo
					$this->session->set_flashdata('message', 'Cập nhật dữ liệu thành công');
				} else {
					$this->session->set_flashdata('message', 'Không cập nhật được');
				}
				//chuyen tới trang danh sách
				redirect(admin_url('news'));
			}
		}


		//load view
		$this->data['temp'] = 'admin/news/edit';
		$this->load->view('admin/layout_admin', $this->data);
	}

	function deleted_at($id)
	{
		$news = $this->news_model->get_info($id);
		if (!$news) {
			//tạo ra nội dung thông báo
			$this->session->set_flashdata('message', 'Không tồn tại bài viết này');
			redirect(admin_url('news'));
		}
		$data = array(
			'status' => 0
		);

		if ($this->news_model->update($news->id, $data)) {
			$this->session->set_flashdata('message', 'Xoá thành công');
		} else {
			$this->session->set_flashdata('message', 'Xoá không thành công');
		}
		redirect(admin_url('news'));
	}
}
