<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tam_nhin_chien_luoc extends CI_Controller {
	var $_breadcrumb = array();

	function __construct()
	{
		parent::__construct();

		$this->_breadcrumb = array_merge($this->_breadcrumb, array("Tầm nhìn chiến lược" => site_url($this->util->slug($this->router->fetch_class()))));
	}
	public function index() {
		$info = new stdClass();
		$info->type = PLAN;
		$item = $this->m_post->items($info,1,1)[0];
		$view_data = array();
		$view_data['item'] 			= $item;
		$view_data['breadcrumb'] 	= $this->_breadcrumb;

		$tmpl_content = array();
		$tmpl_content["content"]   = $this->load->view("post/index", $view_data, TRUE);
		$this->load->view("layout/main", $tmpl_content);
	}
}
?>