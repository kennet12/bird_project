<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index()
	{
		// $about = $this->m_post->load(1);
		// $news = $this->m_contents->items(null,1,4);
		$info = new stdClass();
		$info->category_id = 12;
		$products_categories = $this->m_product_categories->items($info,1);	
		$products = $this->m_product->items();

		$view_data = array();
		// $view_data["about"] 		= $about;
		// $view_data["products"] 		= $products;
		// $view_data["news"] 			= $news;
		$view_data['product_categories'] = $products_categories;
		$view_data['products']			= $products;

		$tmpl_content = array();
		$tmpl_content["content"]   = $this->load->view("home", $view_data, TRUE);
		$this->load->view("layout/main", $tmpl_content);
	}
}
?>