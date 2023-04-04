<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index()
	{
		// $about = $this->m_post->load(1);
		// $news = $this->m_contents->items(null,1,4);

		$view_data = array();
		// $view_data["about"] 		= $about;
		// $view_data["products"] 		= $products;
		// $view_data["news"] 			= $news;

		$tmpl_content = array();
		$tmpl_content["content"]   = $this->load->view("home", $view_data, TRUE);
		$this->load->view("layout/main", $tmpl_content);
	}
}
?>