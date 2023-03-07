<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class San_pham extends CI_Controller {
	var $_breadcrumb = array();

	function __construct()
	{
		parent::__construct();

		$this->_breadcrumb = array_merge($this->_breadcrumb, array("Sản phẩm" => site_url($this->util->slug($this->router->fetch_class()))));
	}
	public function index($category=null, $id=null) {
		if (!isset($_GET['page']) || (($_GET['page']) < 1)) {
			$page = 1;
		}
		else {
			$page = $_GET['page'];
		}
		$offset   = ($page - 1) * 4;

		$categories = $this->m_product_categories->items(null,1,null,null,'created_date','ASC');
		if (!empty($category)) {
			$cate = $this->m_product_categories->load($category);
			$this->_breadcrumb = array_merge($this->_breadcrumb, array("{$this->m_product_categories->load($category)->name}" => site_url("{$this->util->slug($this->router->fetch_class())}/{$category}")));
			if (!empty($id)) {
				$item = $this->m_product->load($id);
				$this->m_product->view($id);
				$this->_breadcrumb = array_merge($this->_breadcrumb, array("{$item->title}" => site_url("{$this->util->slug($this->router->fetch_class())}/{$category}/{$item->alias}")));
				$info = new stdClass();
				$info->category_id = $cate->id;
				$relative_items=$this->m_product->relative_items($info,array($item->id),1,4);

				$view_data = array();
				$view_data["breadcrumb"] 		= $this->_breadcrumb;
				$view_data["item"] 				= $item;
				$view_data["relative_items"] 	= $relative_items;

				$tmpl_content = array();
				$tmpl_content["content"]   = $this->load->view("product/detail", $view_data, TRUE);
				$this->load->view("layout/main", $tmpl_content);
			} else {

				$info = new stdClass();
				$info->category_id = $cate->id;

				$total = $this->m_product->count_items($info,1);
				$items = $this->m_product->items($info,1,4,$offset);
				$pagination = $this->util->pagination(site_url("{$this->util->slug($this->router->fetch_class())}"), $total, 4);
				$view_items = $this->m_product->items($info,1,4,null,'view_num','DESC');

				$view_data = array();
				$view_data["category"] 				= $category;
				$view_data["items"] 				= $items;
				$view_data["pagination"] 			= $pagination;
				$view_data["breadcrumb"] 			= $this->_breadcrumb;
				$view_data["categories"] 			= $categories;
				$view_data["view_items"] 			= $view_items;

				$tmpl_content = array();
				$tmpl_content["content"]   = $this->load->view("product/index", $view_data, TRUE);
				$this->load->view("layout/main", $tmpl_content);
			}
		} else {
			$total = $this->m_product->count_items(null,1);
			$items = $this->m_product->items(null,1,4,$offset);
			$pagination = $this->util->pagination(site_url("{$this->util->slug($this->router->fetch_class())}"), $total, 4);
			$view_items = $this->m_product->items(null,1,4,null,'view_num','DESC');

			$view_data = array();
			$view_data["category"] 				= $category;
			$view_data["items"] 				= $items;
			$view_data["pagination"] 			= $pagination;
			$view_data["breadcrumb"] 			= $this->_breadcrumb;
			$view_data["categories"] 			= $categories;
			$view_data["view_items"] 			= $view_items;

			$tmpl_content = array();
			$tmpl_content["content"]   = $this->load->view("product/index", $view_data, TRUE);
			$this->load->view("layout/main", $tmpl_content);
		}
	}
}
?>