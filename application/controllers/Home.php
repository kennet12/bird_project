<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index()
	{
		$products = $this->m_product->items(null,1);

		$info = new stdClass();
		$info->category_id = 12;
		$products_category_12 = $this->m_product->items($info,1);

		$info = new stdClass();
		$info->category_id_3_6 = 1;
		$products_category_3_6 = $this->m_product->items($info,1);

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