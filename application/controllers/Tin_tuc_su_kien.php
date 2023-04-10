<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tin_tuc_su_kien extends CI_Controller {
	var $_breadcrumb = array();

	function __construct()
	{
		parent::__construct();

		$this->_breadcrumb = array_merge($this->_breadcrumb, array("Tin tức - sự kiện" => site_url($this->util->slug($this->router->fetch_class()))));
	}
	public function index($category=null, $id=null) {
		
		$view_data = array();
		// $view_data["breadcrumb"] 			= $this->_breadcrumb;

		$tmpl_content = array();
		$tmpl_content["content"]   = $this->load->view("new_event/index", $view_data, TRUE);
		$this->load->view("layout/main", $tmpl_content);
	}
}
?>