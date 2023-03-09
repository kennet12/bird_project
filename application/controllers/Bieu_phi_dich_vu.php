<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Bieu_phi_dich_vu extends CI_Controller {
	var $_breadcrumb = array();

	function __construct()
	{
		parent::__construct();

		$this->_breadcrumb = array_merge($this->_breadcrumb, array("Biểu phí dịch vụ" => site_url($this->util->slug($this->router->fetch_class()))));
	}
	public function index() {

		$info = new stdClass();
		$info->type = SERVICE_FEE;
		$item = $this->m_post->items($info,1,1)[0];
		$view_data = array();
		$view_data['item'] 			= $item;
		$view_data['breadcrumb'] 	= $this->_breadcrumb;

		$tmpl_content = array();
		$tmpl_content["content"]   = $this->load->view("post/index", $view_data, TRUE);
		$this->load->view("layout/main", $tmpl_content);
	}
	public function index1() {
		$info = new stdClass();
		$info->id = 40;
		$items = $this->m_product->getItems($info,1);

		// var_dump($kiet);
		// var_dump($bach);
		// $data = [];
		// $data['items'] = $items;
		// $data['title'] = 'Hello Nguyen thi bich tram';

		// $this->load->view("kiet/bachdit", $data);
	}
}
?>