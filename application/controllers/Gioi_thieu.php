<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Gioi_thieu extends CI_Controller {
	var $_breadcrumb = array();

	function __construct()
	{
		parent::__construct();

		$this->_breadcrumb = array_merge($this->_breadcrumb, array("Giới thiệu" => site_url($this->util->slug($this->router->fetch_class()))));
	}
	public function index() {
		$item = $this->m_post->load(1);
		$view_data = array();
		$view_data['item'] 			= $item;
		$view_data['breadcrumb'] 	= $this->_breadcrumb;

		$tmpl_content = array();
		$tmpl_content["content"]   = $this->load->view("post/index", $view_data, TRUE);
		$this->load->view("layout/main", $tmpl_content);
	}
}
?>