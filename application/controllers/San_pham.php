<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class San_pham extends CI_Controller {
	var $_breadcrumb = array();

	function __construct()
	{
		parent::__construct();

		$this->_breadcrumb = array_merge($this->_breadcrumb, array("Trang chủ" => site_url('')));
	}
	public function index($category=null, $id=null) {
		$this->_breadcrumb = array_merge($this->_breadcrumb, array("Sản phẩm" => site_url($this->util->slug($this->router->fetch_class()))));
		// lay tat san pham
		$view_data = array();
		$view_data["breadcrumb"] = $this->_breadcrumb;

		$tmpl_content = array();
		$tmpl_content["content"]   = $this->load->view("product/index", $view_data, TRUE);
		$this->load->view("layout/view", $tmpl_content);
		
	}
}
?>