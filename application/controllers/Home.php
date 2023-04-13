<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index()
	{
		$products = $this->m_product->items(null,1);

		foreach($products as $product) {
			$info = new stdClass();
			$info->product_id = $product->id;	
			$gallery = $this->m_product_gallery->items($info,null,null,'stt','ASC');
			$product->image = !empty($gallery[0]->thumbnail) ? BASE_URL.$gallery[0]->thumbnail : null;
		}
	

		$info = new stdClass();
		$info->category_id = 12;
		$products_category_12 = $this->m_product->items($info,1);
		foreach($products_category_12 as $product) {
			$info = new stdClass();
			$info->product_id = $product->id;	
			$gallery = $this->m_product_gallery->items($info,null,null,'stt','ASC');
			$product->image = !empty($gallery[0]->thumbnail) ? BASE_URL.$gallery[0]->thumbnail : null;
		}
		

		$info = new stdClass();
		$info->category_id_3_6 = 1;
		$products_category_3_6 = $this->m_product->items($info,1);
		foreach($products_category_3_6 as $product) {
			$info = new stdClass();
			$info->product_id = $product->id;	
			$gallery = $this->m_product_gallery->items($info,null,null,'stt','ASC');
			$product->image = !empty($gallery[0]->thumbnail) ? BASE_URL.$gallery[0]->thumbnail : null;
		}

		$view_data = array();
		$view_data['products']				= $products;
		$view_data['products_category_12']	= $products_category_12;
		$view_data['products_category_3_6']	= $products_category_3_6;

		$tmpl_content = array();
		$tmpl_content["content"]   = $this->load->view("home", $view_data, TRUE);
		$this->load->view("layout/main", $tmpl_content);
	}
}
?>