<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Lien_he extends CI_Controller {
	var $_breadcrumb = array();

	function __construct()
	{
		parent::__construct();

		$this->_breadcrumb = array_merge($this->_breadcrumb, array("Liên hệ" => site_url($this->util->slug($this->router->fetch_class()))));
	}

	public function index ()
	{
		$view_data = array();
		$view_data['breadcrumb'] 	= $this->_breadcrumb;

		$tmpl_content = array();
		$tmpl_content["content"] = $this->load->view("contact/index", $view_data, TRUE);
		$this->load->view("layout/view", $tmpl_content);
	}
	public function ajax_contact () {
		$name 		= $this->input->post('name');
		$phone 		= $this->input->post('phone');
		$email 		= $this->input->post('email');
		$content 	= nl2br($this->input->post('content'));
		$recaptcha 	= $this->input->post('recaptcha');

		$result = FALSE;

		if (isset($recaptcha) && $recaptcha) {
			if((!is_null($name)) 
				&& (!is_null($phone))
				&& (!is_null($email))) {
				$data = array (
					'name'		 => $name,
					'phone'		 => $phone,
					'email'		 => $email,
					'content'	 => $content
					);
				$result = $this->m_contact->add($data);
			}
		}
		echo $result;
	}
}
?>