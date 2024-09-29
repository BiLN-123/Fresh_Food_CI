<?php
class Blog extends MY_Controller{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('news_model');
		$this->views_news();
	}

	function views_news(){
		$input =array();
		$input['order'] = array('views', 'DESC');
		$input['limit'] = array(5, 0);
		$input['where'] = array('status'=>1);
		$views_news = $this->news_model->get_list($input);
		$this->data['views_news'] = $views_news;
	}

	function recent_news(){
		$input =array();
		$input['order'] = array('created_at', 'DESC');
		$input['limit'] = array(5, 0);
		$input['where'] = array('status'=>1);
		$recent_news = $this->news_model->get_list($input);
		$this->data['recent_news'] = $recent_news;
	}

	function index(){
		$input =array();
		$input['order'] = array('views', 'DESC');
		$input['where'] = array('status'=>1);
		$list_news = $this->news_model->get_list($input);
		$this->data['list_news'] = $list_news;

		$this->data['hero_normal']= 'hero_normal';
		$this->data['page_title'] = 'Bài viết';
		$this->data['temp'] = 'site/blog/index';
		$this->load->view('site/layout_site', $this->data);
	}

	function blog_details($id){
		//tăng view thêm 1
		$blog_details = $this->news_model->get_info($id);
		$views = $blog_details->views;
		$data = array(
			'views'      => $views + 1
		);
		$this->news_model->update($id, $data);

		//lấy thông tin bài viết
		$blog_detail = $this->news_model->get_info($id);
		$this->data['blog_details'] = $blog_detail;

		//lấy 5 bài viết gàn đây nhất
		$this->recent_news();

		$this->data['hero_normal']= 'hero_normal';
		$this->data['page_title'] = $blog_detail->title;
		$this->data['temp'] = 'site/blog/blog-details';
		$this->load->view('site/layout_site', $this->data);
	}

	function blog_search(){
		$keyword = $this->input->post('keyword');
		$input =array();
		$input['like'] = array('title', $keyword);
		$search_news= $this->news_model->get_list($input);
		$this->data['search_news'] = $search_news;
		$this->recent_news();
		$this->data['keyword'] = $keyword;
		$this->data['hero_normal']= 'hero_normal';
		$this->data['page_title'] = 'Tìm kiếm bài viết';
		$this->data['temp'] = 'site/blog/blog-search';
		$this->load->view('site/layout_site', $this->data);
	}
}
