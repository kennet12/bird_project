<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Bieu_mau_tai_lieu extends CI_Controller {
	var $_breadcrumb = array();

	function __construct()
	{
		parent::__construct();

		$this->_breadcrumb = array_merge($this->_breadcrumb, array("Biểu mẫu - tài liệu" => site_url($this->util->slug($this->router->fetch_class()))));
	}
	public function index() {
		if (!isset($_GET['page']) || (($_GET['page']) < 1)) {
			$page = 1;
		}
		else {
			$page = $_GET['page'];
		}
		$offset   = ($page - 1) * ROW_PER_PAGE;

		$info = new stdClass();
		$info->type = PRODUCTS_SERVICES;
		$service_cates = $this->m_content_categories->items($info,1);

		$info = new stdClass();
		$info->type = NEWS_EVENTS;
		$new_cates = $this->m_content_categories->items($info,1);

		$total = $this->m_document->count_items(null,1);
		$items = $this->m_document->items(null,1,ROW_PER_PAGE,$offset);

		$pagination = $this->util->pagination(site_url("{$this->util->slug($this->router->fetch_class())}"), $total, ROW_PER_PAGE);
		
		$view_data = array();
		$view_data['breadcrumb'] 	= $this->_breadcrumb;
		$view_data['service_cates'] = $service_cates;
		$view_data['new_cates'] 	= $new_cates;
		$view_data['items'] 		= $items;
		$view_data['pagination'] 	= $pagination;

		$tmpl_content = array();
		$tmpl_content["content"]   = $this->load->view("document/index", $view_data, TRUE);
		$this->load->view("layout/main", $tmpl_content);
	}
	public function tai_van_ban(){
		$file_path = $this->input->post('file_path');
		$file_name = $this->input->post('file_name');
		$this->util->download_file($file_name,$file_path);
	}
}
?>