<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tim_kiem extends CI_Controller {
	var $_breadcrumbs = array();
	function __construct()
	{
		parent::__construct();
	
		$this->_breadcrumbs = array_merge($this->_breadcrumbs, array("Trang chủ" => site_url()));
	}
	public function index($category_alias=null)
	{
		$search_text = !empty($_GET['search_text']) ? trim($_GET['search_text']," ") : '';
		
	}
}

?>