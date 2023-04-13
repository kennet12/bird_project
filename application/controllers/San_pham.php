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
			$category = $this->m_product_categories->load($category);

			$this->_breadcrumb = array_merge($this->_breadcrumb, [$category->name => site_url("{$this->util->slug($this->router->fetch_class())}/{$category->alias}")]);

			if (!empty($id)) {
				$item = $this->m_product->load($id);
				$this->_breadcrumb = array_merge($this->_breadcrumb, [$item->title => site_url("{$this->util->slug($this->router->fetch_class())}/{$category->alias}/{$item->alias}")]);

				$info = new stdClass();
				$info->product_id = $item->id;
				$product_galleries = $this->m_product_gallery->items($info, null,null, 'stt','ASC');

				$info = new stdClass();
				$info->category_id = $category->id;
				$related_product = $this->m_product->relative_items($info, [$item->id]);

				foreach($related_product as $related) {
					$info = new stdClass();
					$info->product_id = $related->id;
					$gallery = $this->m_product_gallery->items($info, null,null, 'stt','ASC');

					$related->image = !empty($gallery[0]->thumbnail)?$gallery[0]->thumbnail:'';
				}

				$view_data = array();
				$view_data["breadcrumb"] 			= $this->_breadcrumb;
				$view_data['item'] = $item;
				$view_data['category'] 		= $category;
				$view_data['product_galleries'] = $product_galleries;
				$view_data['related_product'] = $related_product;	

				$tmpl_content = array();
				$tmpl_content["content"]   = $this->load->view("product/detail", $view_data, TRUE);
				$this->load->view("layout/view", $tmpl_content);

			} else {
			
				$order_by = null;
				$sort_by = null;

				if(!empty($_GET["sap-xep"]))
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

				$page_num	= isset($_GET["page_num"]) ? $_GET["page_num"] : ROW_PER_PAGE;
				if (!isset($_GET['page']) || (($_GET['page']) < 1) ) {
					$page = 1;
				}
				else {
					$page = $_GET['page'];
				}
				$offset = ($page - 1) * $page_num;

				$info = new stdClass();
				$info->category_id = $category->id;
				$total = count($this->m_product->items($info,1));

				$url = "//{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}";
				$url = str_replace("?page={$page}", '', $url);
				$url = str_replace("&page={$page}", '', $url);
				$pagination = $this->util->pagination(
					$url,
					$total,
					$page_num
					
				);
				
				// lay tat san pham
				$check = ceil(($total /6));
				$products = $this->m_product->items($info,1, $page_num,$offset,$order_by,$sort_by);
				
				foreach($products as $product) {
					$info = new stdClass();
					$info->product_id = $product->id;
					$gallery = $this->m_product_gallery->items($info,null,null,'stt','ASC');
					$product->image = !empty($gallery[0]->thumbnail) ? BASE_URL.$gallery[0]->thumbnail : null;
				}

				$view_data = array();
				$view_data["breadcrumb"] 			 = $this->_breadcrumb;
				$view_data['category'] 				 = $category;
				$view_data['product_categories'] 	 = $this->m_product_categories->items(null,1);
				$view_data["pagination"]			 = $pagination;
				$view_data['page']					 = $page;
				$view_data['total']				 	 = $total;
				$view_data['page_num']				 =$check;
				$view_data['result_products']		 = $products;
				
				$tmpl_content = array();
				$tmpl_content["content"]   = $this->load->view("product/index", $view_data, TRUE);
				$this->load->view("layout/view", $tmpl_content);
			}
			
		} else {
			$order_by = null;
			$sort_by = null;
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

			$pagination = $this->util->pagination($url, $total, 6, 'Sản phẩm');
			
			$check =ceil(($total /6));

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
			$view_data["breadcrumb"] 			 = $this->_breadcrumb;
			$view_data["offset"]				 = $offset;
			$view_data["pagination"]			 = $pagination;
			$view_data['total']				 	 = $total;
			$view_data['page_num']				 =$check;
			$view_data['page']				 	 = $page;
			$view_data['product_categories'] 	 = $this->m_product_categories->items(null,1);
			$view_data['result_products']		 =$products;
			
			$tmpl_content = array();
			$tmpl_content["content"]   = $this->load->view("product/index", $view_data, TRUE);
			$this->load->view("layout/view", $tmpl_content);
		}
	}

}
?>	