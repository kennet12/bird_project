<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tin_tuc_su_kien extends CI_Controller {
	var $_breadcrumb = array();

	function __construct()
	{
		parent::__construct();

		$this->_breadcrumb = array_merge($this->_breadcrumb, array("Tin tức - sự kiện" => site_url($this->util->slug($this->router->fetch_class()))));
	}
	public function index($category=null, $id=null) {
		// if (!isset($_GET['page']) || (($_GET['page']) < 1)) {
		// 	$page = 1;
		// }
		// else {
		// 	$page = $_GET['page'];
		// }
		// $offset   = ($page - 1) * ROW_PER_PAGE;

		// $categories = $this->m_content_categories->items(null,1,null,null,'created_date','ASC');
		// if (!empty($category)) {
		// 	$cate = $this->m_content_categories->load($category);
		// 	$this->_breadcrumb = array_merge($this->_breadcrumb, array("{$this->m_content_categories->load($category)->name}" => site_url("{$this->util->slug($this->router->fetch_class())}/{$category}")));
		// 	if (!empty($id)) {
		// 		$item = $this->m_contents->load($id);
		// 		$this->m_contents->view($id);
		// 		$this->_breadcrumb = array_merge($this->_breadcrumb, array("{$item->title}" => site_url("{$this->util->slug($this->router->fetch_class())}/{$category}/{$item->alias}")));
		// 		$info = new stdClass();
		// 		$info->category_id = $cate->id;
		// 		$relative_items=$this->m_contents->relative_items($info,array($item->id),1,ROW_PER_PAGE);

		// 		$view_data = array();
		// 		$view_data["breadcrumb"] 		= $this->_breadcrumb;
		// 		$view_data["item"] 				= $item;
		// 		$view_data["relative_items"] 	= $relative_items;

		// 		$tmpl_content = array();
		// 		$tmpl_content["content"]   = $this->load->view("new_event/detail", $view_data, TRUE);
		// 		$this->load->view("layout/main", $tmpl_content);
		// 	} else {

		// 		$info = new stdClass();
		// 		$info->category_id = $cate->id;
				
		// 		$total = $this->m_contents->count_items($info,1);
		// 		$pagination = $this->util->pagination(site_url("{$this->util->slug($this->router->fetch_class())}"), $total, ROW_PER_PAGE);
		// 		$items = $this->m_contents->items($info,1,ROW_PER_PAGE,$offset);

		// 		$view_data = array();
		// 		$view_data["category"] 				= $category;
		// 		$view_data["items"] 				= $items;
		// 		$view_data["pagination"] 			= $pagination;
		// 		$view_data["breadcrumb"] 			= $this->_breadcrumb;
		// 		$view_data["categories"] 			= $categories;

		// 		$tmpl_content = array();
		// 		$tmpl_content["content"]   = $this->load->view("new_event/index", $view_data, TRUE);
		// 		$this->load->view("layout/main", $tmpl_content);
		// 	}
		// } else {
			
		// 	$total = $this->m_contents->count_items(null,1);
		// 	$pagination = $this->util->pagination(site_url("{$this->util->slug($this->router->fetch_class())}"), $total, ROW_PER_PAGE);
		// 	$items = $this->m_contents->items(null,1,ROW_PER_PAGE,$offset);

		// 	$view_data = array();
		// 	$view_data["category"] 				= $category;
		// 	$view_data["items"] 				= $items;
		// 	$view_data["pagination"] 			= $pagination;
		// 	$view_data["breadcrumb"] 			= $this->_breadcrumb;
		// 	$view_data["categories"] 			= $categories;

		// 	$tmpl_content = array();
		// 	$tmpl_content["content"]   = $this->load->view("new_event/index", $view_data, TRUE);
		// 	$this->load->view("layout/main", $tmpl_content);
		// }
		$view_data = array();
		// $view_data["category"] 				= $category;
		// $view_data["items"] 				= $items;
		// $view_data["pagination"] 			= $pagination;
		// $view_data["breadcrumb"] 			= $this->_breadcrumb;
		// $view_data["categories"] 			= $categories;

		$tmpl_content = array();
		$tmpl_content["content"]   = $this->load->view("new_event/index", $view_data, TRUE);
		$this->load->view("layout/main", $tmpl_content);
	}
}
?>