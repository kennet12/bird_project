<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Account extends CI_Controller {
	var $_breadcrumb = array();

	function __construct()
	{
		parent::__construct();

		$this->_breadcrumb = array_merge($this->_breadcrumb, array("Trang chủ" => site_url('')));
		
	}
	public function index() {
		
		if(!empty($_POST))
		{
			$email			= $_POST['username'];
			$pass	 		= $_POST['password'];
			
			if($this->m_user->login($email,$pass) == FALSE)
			{
				$this->session->set_flashdata("error", "Email hoặc password sai.");
				redirect(site_url("account/index"), "back");
			}
			else
			{
				redirect(site_url("home"), "back");
			}
		}
		
		$view_data=array();

		$tmpl_content = array();
		$tmpl_content["content"]   = $this->load->view("account/index", $view_data, TRUE);
		$this->load->view("layout/view", $tmpl_content);
	}

	public function info()
	{

		if(!empty($_POST))
		{
			$view_data=array();
			$view_data['fullname']	 			= $_POST['fullname'];
			$view_data['gender']	 			= $_POST['gender'];
			$view_data['birthday']	 			= $_POST['birthday'];
			$view_data['phone']	 				= $_POST['phone'];
			$view_data['address']	 			= $_POST['address'];

			$user_session= $this->session->userdata("user");

			if($this->m_user->update($view_data,['id'=>$user_session->id]) == TRUE)
			{
				redirect(site_url("account/logout"), "back");
			}
			$this->session->set_flashdata("success", "Thêm thành công");
			

		}
		

		$user_session= $this->session->userdata("user");

		$view_data=array();
		$view_data['infos']	 			= $user_session;

		$tmpl_content = array();
		$tmpl_content["content"]   = $this->load->view("account/info", $view_data, TRUE);
		$this->load->view("layout/view", $tmpl_content);
	}

	public function logout()
	{
		$this->m_user->logout();
		redirect(site_url("home"), "back");
	}

	public function change_pass()
	{
		$view_data=array();

		$tmpl_content = array();
		$tmpl_content["content"]   = $this->load->view("account/change", $view_data, TRUE);
		$this->load->view("layout/view", $tmpl_content);
	}

}
?>	