<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class San_pham extends CI_Controller {
	var $_breadcrumb = array();

	function __construct()
	{
		parent::__construct();

		$this->_breadcrumb = array_merge($this->_breadcrumb, array("Trang chủ" => site_url('')));
	}
	public function index($category=null, $id=null) {

			
		if(!empty($category))
		{
			if(!empty($id))
			{
				
				$product_categories = $this->m_product_categories->items(null,1);
			
				// lay tat san pham
				$info = new stdClass();
				$info->category_id = $id;
				$products = $this->m_product->items($info,1);
				
				foreach($products as $product) {
					$info = new stdClass();
					$info->product_id = $product->id;
					$gallery = $this->m_product_gallery->items($info,null,null,'stt','ASC');
					$product->image = !empty($gallery[0]->thumbnail) ? BASE_URL.$gallery[0]->thumbnail : null;
				}

				$view_data = array();
				$view_data["breadcrumb"] = $this->_breadcrumb;
				$view_data['result_revice_category']=$product_categories;
				$view_data['result_products']=$products;
				
				
				
				$tmpl_content = array();
				$tmpl_content["content"]   = $this->load->view("product/index", $view_data, TRUE);
				$this->load->view("layout/view", $tmpl_content);
			}
		}
		else
		{
		$this->_breadcrumb = array_merge($this->_breadcrumb, array("Sản phẩm" => site_url($this->util->slug($this->router->fetch_class()))));

			// lấy ra danh mục sản phẩm
			$product_categories = $this->m_product_categories->items(null,1);
			
			// lay tat san pham
			$products = $this->m_product->items(null,1);
			
			foreach($products as $product) {
				$info = new stdClass();
				$info->product_id = $product->id;
				$gallery = $this->m_product_gallery->items($info,null,null,'stt','ASC');
				$product->image = !empty($gallery[0]->thumbnail) ? BASE_URL.$gallery[0]->thumbnail : null;
			}

			$view_data = array();
			$view_data["breadcrumb"] = $this->_breadcrumb;
			$view_data['result_revice_category']=$product_categories;
			$view_data['result_products']=$products;
			
			
			$tmpl_content = array();
			$tmpl_content["content"]   = $this->load->view("product/index", $view_data, TRUE);
			$this->load->view("layout/view", $tmpl_content);
		}
	}

}
?>	