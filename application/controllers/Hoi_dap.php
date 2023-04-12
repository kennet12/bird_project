<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Hoi_dap extends CI_Controller {
	var $_breadcrumb = array();

	function __construct()
	{
		parent::__construct();

		$this->_breadcrumb = array_merge($this->_breadcrumb, array("Hỏi - đáp" => site_url($this->util->slug($this->router->fetch_class()))));
	}
	public function index($category=null, $id=null) {
		if (!empty($category)) {

		} else {
			
		}
	}
}
?>