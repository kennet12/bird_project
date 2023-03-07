<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ho_tro_khach_hang extends CI_Controller {
	var $_breadcrumb = array();

	function __construct()
	{
		parent::__construct();

		$this->_breadcrumb = array_merge($this->_breadcrumb, array("Hỗ trợ khách hàng" => site_url($this->util->slug($this->router->fetch_class()))));
	}
	public function index($category=null, $id=null) {
		if (!isset($_GET['page']) || (($_GET['page']) < 1)) {
			$page = 1;
		}
		else {
			$page = $_GET['page'];
		}
		$offset   = ($page - 1) * ROW_PER_PAGE;

		$info = new stdClass();
		$info->type = 'ho-tro-khach-hang';
		$categories = $this->m_posts_categories->items($info,1,null,null,'created_date','ASC');
		if (!empty($category)) {
			$cate = $this->m_posts_categories->load($category);
			$this->_breadcrumb = array_merge($this->_breadcrumb, array("{$this->m_posts_categories->load($category)->name}" => site_url("{$this->util->slug($this->router->fetch_class())}/{$category}")));
			if (!empty($id)) {
				$item = $this->m_posts->load($id);
				$this->m_posts->view($id);
				$this->_breadcrumb = array_merge($this->_breadcrumb, array("{$item->title}" => site_url("{$this->util->slug($this->router->fetch_class())}/{$category}/{$item->alias}")));
				$info->category_id = $cate->id;
				$relative_items=$this->m_posts->relative_items($info,array($item->id),1,ROW_PER_PAGE);

				$view_data = array();
				$view_data["breadcrumb"] 		= $this->_breadcrumb;
				$view_data["item"] 				= $item;
				$view_data["relative_items"] 	= $relative_items;

				$tmpl_content = array();
				$tmpl_content["content"]   = $this->load->view("posts/detail", $view_data, TRUE);
				$this->load->view("layout/main", $tmpl_content);
			} else {
				$info->category_id = $cate->id;
				$new_items = $this->m_posts->items($info,1,3);
				$relative_id = array();
				foreach ($new_items as $new_item) {
					array_push($relative_id, $new_item->id);
				}
				$total = $this->m_posts->count_relative_items($info,$relative_id,1);
				$items = $this->m_posts->relative_items($info,$relative_id,1,ROW_PER_PAGE,$offset);
				$pagination = $this->util->pagination(site_url("{$this->util->slug($this->router->fetch_class())}"), $total, ROW_PER_PAGE);
				$view_items = $this->m_posts->items($info,1,ROW_PER_PAGE,null,'view_num','DESC');

				$view_data = array();
				$view_data["category"] 				= $category;
				$view_data["items"] 				= $items;
				$view_data["pagination"] 			= $pagination;
				$view_data["breadcrumb"] 			= $this->_breadcrumb;
				$view_data["categories"] 			= $categories;
				$view_data["new_items"] 			= $new_items;
				$view_data["view_items"] 			= $view_items;

				$tmpl_content = array();
				$tmpl_content["content"]   = $this->load->view("posts/index", $view_data, TRUE);
				$this->load->view("layout/main", $tmpl_content);
			}
		} else {

			$new_items = $this->m_posts->items($info,1,3);
			$relative_id = array();
			foreach ($new_items as $new_item) {
				array_push($relative_id, $new_item->id);
			}
			$total = $this->m_posts->count_relative_items($info,$relative_id,1);
			$items = $this->m_posts->relative_items($info,$relative_id,1,ROW_PER_PAGE,$offset);
			$pagination = $this->util->pagination(site_url("{$this->util->slug($this->router->fetch_class())}"), $total, ROW_PER_PAGE);
			$view_items = $this->m_posts->items($info,1,ROW_PER_PAGE,null,'view_num','DESC');

			$view_data = array();
			$view_data["category"] 				= $category;
			$view_data["items"] 				= $items;
			$view_data["pagination"] 			= $pagination;
			$view_data["breadcrumb"] 			= $this->_breadcrumb;
			$view_data["categories"] 			= $categories;
			$view_data["new_items"] 			= $new_items;
			$view_data["view_items"] 			= $view_items;

			$tmpl_content = array();
			$tmpl_content["content"]   = $this->load->view("posts/index", $view_data, TRUE);
			$this->load->view("layout/main", $tmpl_content);
		}
	}
}
?>