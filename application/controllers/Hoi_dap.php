<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Hoi_dap extends CI_Controller {
	var $_breadcrumb = array();

	function __construct()
	{
		parent::__construct();

		$this->_breadcrumb = array_merge($this->_breadcrumb, array("Hỏi - đáp" => site_url($this->util->slug($this->router->fetch_class()))));
	}
	public function index($category=null, $id=null) {
		if (!isset($_GET['page']) || (($_GET['page']) < 1)) {
			$page = 1;
		}
		else {
			$page = $_GET['page'];
		}
		$offset   = ($page - 1) * ROW_PER_PAGE;
		if (!empty($category)) {
			$faq_category = $this->m_faq_categories->load($category);
			$info = new stdClass();
			$info->category_id = $faq_category->id;
			$this->_breadcrumb = array_merge($this->_breadcrumb, array("{$this->m_faq_categories->load($category)->name}" => site_url("{$this->util->slug($this->router->fetch_class())}/{$category}")));
			if (!empty($id)) {
				$item = $this->m_faq->load($id);
				$this->m_faq->view($item->id);
				$relative_items=$this->m_faq->relative_items($info,array($item->id),1,ROW_PER_PAGE);
				$this->_breadcrumb = array_merge($this->_breadcrumb, array("{$item->question}" => site_url("{$this->util->slug($this->router->fetch_class())}/{$category}/{$item->alias_question}")));

				$view_data = array();
				$view_data['item'] 				= $item;
				$view_data['relative_items'] 	= $relative_items;
				$view_data['breadcrumb'] 		= $this->_breadcrumb;

				$tmpl_content = array();
				$tmpl_content["content"]   = $this->load->view("faq/detail", $view_data, TRUE);
				$this->load->view("layout/main", $tmpl_content);
			} else {
				$total = $this->m_faq->count_items($info,1);
				$items = $this->m_faq->items($info,1,ROW_PER_PAGE,$offset);
				$pagination = $this->util->pagination(site_url("{$this->util->slug($this->router->fetch_class())}/{$category}"), $total, ROW_PER_PAGE);
				$view_items = $this->m_faq->items($info,1,ROW_PER_PAGE,null,'view_num','DESC');

				$view_data = array();
				$view_data['items'] 		= $items;
				$view_data['view_items'] 	= $view_items;
				$view_data['breadcrumb'] 	= $this->_breadcrumb;
				$view_data['pagination'] 	= $pagination;


				$tmpl_content = array();
				$tmpl_content["content"]   = $this->load->view("faq/index", $view_data, TRUE);
				$this->load->view("layout/main", $tmpl_content);
			}
		} else {
			$total = $this->m_faq->count_items(null,1);
			$items = $this->m_faq->items(null,1,ROW_PER_PAGE,$offset);
			$pagination = $this->util->pagination(site_url("{$this->util->slug($this->router->fetch_class())}"), $total, ROW_PER_PAGE);
			$view_items = $this->m_faq->items(null,1,ROW_PER_PAGE,null,'view_num','DESC');

			$view_data = array();
			$view_data['items'] 		= $items;
			$view_data['view_items'] 	= $view_items;
			$view_data['breadcrumb'] 	= $this->_breadcrumb;
			$view_data['pagination'] 	= $pagination;


			$tmpl_content = array();
			$tmpl_content["content"]   = $this->load->view("faq/index", $view_data, TRUE);
			$this->load->view("layout/main", $tmpl_content);
		}
	}
}
?>