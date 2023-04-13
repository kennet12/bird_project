<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Hoi_dap extends CI_Controller {
	var $_breadcrumb = array();

	function __construct()
	{
		parent::__construct();

		$this->_breadcrumb = array_merge($this->_breadcrumb, array("Hỏi - đáp" => site_url($this->util->slug($this->router->fetch_class()))));
	}
	public function index($category=null, $id=null) {

		if(!empty($category)){

				$item = $this->m_faq_categories->load($category);
				$info = new stdClass();
				$info->catagory_id = $item ->id;

				$faq_kq = $this->m_faq->items($info,1);

				$view_data = array();
				$view_data['item'] = $item;
				$view_data['faq_kq'] = $faq_kq;
		
				$tmpl_faq = [];
				$tmpl_faq['content'] = $this->load->view("faq/detail",$view_data,true);
				$this->load->view("layout/view",$tmpl_faq);

		}
		else
		{

			$faqs = $this->m_faq->items(null,1);
			$faq_categories = $this->m_faq_categories->items(null,1);

			$view_data = array();
			$view_data['faqs'] = $faqs;
			$view_data['faq_categories'] = $faq_categories;
			$view_data['title'] = 'Hỏi & Đáp';

			$tmpl_faq = [];
			$tmpl_faq['content'] = $this->load->view("faq/index",$view_data,true);
			$this->load->view("layout/view",$tmpl_faq);
		}
	}
}
?>