<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class San_pham extends CI_Controller {
	var $_breadcrumb = array();

	function __construct()
	{
		parent::__construct();

		$this->_breadcrumb = array_merge($this->_breadcrumb, array("Trang chủ" => site_url('')));
		
	}
	public function index($category=null, $id=null) {	
		$this->_breadcrumb = array_merge($this->_breadcrumb, array("Sản Phẩm" => site_url($this->util->slug($this->router->fetch_class()))));	
		if(!empty($category))
		{	
			if (!empty($id)) {

				$item = $this->m_product->load($id);
				$product_category = $this->m_product_categories->load($item->category_id);
				$product_gallery = $this->m_product_gallery->items($item->id);

				// $related_product = ""

				$view_data = array();
				$view_data["breadcrumb"] 			= $this->_breadcrumb;
				$view_data['item'] = $item;
				$view_data['product_category'] = $product_category;
				$view_data['product_gallery'] = $product_gallery;

				$tmpl_content = array();
				$tmpl_content["content"]   = $this->load->view("product/detail", $view_data, TRUE);
				$this->load->view("layout/view", $tmpl_content);

			} else {
				$this->_breadcrumb = array_merge($this->_breadcrumb,array( $this->m_product_categories->load($category)->name => site_url($this->util->slug($this->router->fetch_class()).'/'.$category.'/'.$id)));
			
				$order_by = null;
				$sort_by = null;
				// var_dump($_GET ["sap-xep"]);
				if(!empty($_GET))
				{
					if($_GET ["sap-xep"] == "tang-dan")
					{
						$order_by = 'price';
						$sort_by = 'ASC';
					
					}
					else if($_GET['sap-xep'] == "giam-dan")
					{
						$order_by = 'price';
						$sort_by = 'DESC';
					}
				}


				$product_categories = $this->m_product_categories->items(null,1);
				
				$check_id_category = $this->m_product_categories->load($category);

				$info = new stdClass();
				$info->category_id = $check_id_category->id;
				$total = count($this->m_product->items($info,1));

				$page_num		= isset($_GET["page_num"]) ? $_GET["page_num"] : ROW_PER_PAGE;
				if (!isset($_GET['page']) || (($_GET['page']) < 1) ) {
					$page = 1;
				}
				else {
					$page = $_GET['page'];
				}
				$offset = ($page - 1) * $page_num;

				$url = "//{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}";
				$url = str_replace("?page={$page}", '', $url);
				$url = str_replace("&page={$page}", '', $url);
				$pagination = $this->util->pagination(
					$url,
					$total,
					$page_num
				);

				// lay tat san pham
				$info = new stdClass();
				$info->category_id = $check_id_category->id;
				
				$products = $this->m_product->items($info,1, $page_num,$offset,$order_by,$sort_by);
				
				foreach($products as $product) {
					$info = new stdClass();
					$info->product_id = $product->id;
					$gallery = $this->m_product_gallery->items($info,null,null,'stt','ASC');
					$product->image = !empty($gallery[0]->thumbnail) ? BASE_URL.$gallery[0]->thumbnail : null;
				}

				$view_data = array();
				$view_data["breadcrumb"] 			= $this->_breadcrumb;
				$view_data['result_revice_category']=$product_categories;
				$view_data["pagination"]			= $pagination;
				$view_data['result_products']		=$products;
				
				$tmpl_content = array();
				$tmpl_content["content"]   = $this->load->view("product/index", $view_data, TRUE);
				$this->load->view("layout/view", $tmpl_content);
			}
			
		} else {
			$order_by = null;
			$sort_by = null;
			// var_dump($_GET ["sap-xep"]);
			if(!empty($_GET["sap-xep"]))
			{
				if($_GET["sap-xep"] == "tang-dan")
				{
					$order_by = 'price';
					$sort_by = 'ASC';
				
				}
				else if($_GET['sap-xep'] == "giam-dan")
				{
					$order_by = 'price';
					$sort_by = 'DESC';
				}
			}

			$page_num		= isset($_GET["page_num"]) ? $_GET["page_num"] : ROW_PER_PAGE;
			if (!isset($_GET['page']) || (($_GET['page']) < 1) ) {
				$page = 1;
			}
			else {
				$page = $_GET['page'];
			}
			$offset = ($page - 1) * $page_num;

			$total = count($this->m_product->items(null,1));

			$url = "//{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}";
			$url = str_replace("?page={$page}", '', $url);
			$url = str_replace("&page={$page}", '', $url);
			$pagination = $this->util->pagination(
				$url,
				$total,
				$page_num
			);

			// lấy ra danh mục sản phẩm
			$product_categories = $this->m_product_categories->items(null,1);
		

			// lay tat san pham
			$products = $this->m_product->items(null,1, $page_num,$offset,$order_by,$sort_by);
			
			foreach($products as $product) {
				$info = new stdClass();
				$info->product_id = $product->id;
				$gallery = $this->m_product_gallery->items($info,null,null,'stt','ASC');
				$product->image = !empty($gallery[0]->thumbnail) ? BASE_URL.$gallery[0]->thumbnail : null;
			}

			$view_data = array();
			$view_data["breadcrumb"] = $this->_breadcrumb;
			$view_data["offset"]		= $offset;
			$view_data["pagination"]	= $pagination;
			$view_data['result_revice_category']=$product_categories;
			$view_data['result_products']=$products;
			
			
			$tmpl_content = array();
			$tmpl_content["content"]   = $this->load->view("product/index", $view_data, TRUE);
			$this->load->view("layout/view", $tmpl_content);
		}
	}

}
?>	