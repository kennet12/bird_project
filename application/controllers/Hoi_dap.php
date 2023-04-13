<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Hoi_dap extends CI_Controller {
	var $_breadcrumb = array();

	function __construct()
	{
		parent::__construct();

		$this->_breadcrumb = array_merge($this->_breadcrumb, array("Hỏi - đáp" => site_url($this->util->slug($this->router->fetch_class()))));
	}
	public function index($category=null, $id=null) {

		if(!empty($category)){

				$category = $this->m_faq_categories->load($category);
				$info = new stdClass();
				$info->category = $category ->id;

				$items = $this->m_faq->items($info,1);

				$view_data = array();
				$view_data['category'] = $category;
				$view_data['categories'] = $this->m_faq_categories->items(null,1);
				$view_data['items'] = $items;
		
				$tmpl_faq = [];
				$tmpl_faq['content'] = $this->load->view("faq/index",$view_data,true);
				$this->load->view("layout/view",$tmpl_faq);

		}
		else
		{
			$view_data = array();
			$view_data['items'] = $this->m_faq->items(null,1);
			$view_data['categories'] = $this->m_faq_categories->items(null,1);

			$tmpl_faq = [];
			$tmpl_faq['content'] = $this->load->view("faq/index",$view_data,true);
			$this->load->view("layout/view",$tmpl_faq);
		}
	}
}
?>