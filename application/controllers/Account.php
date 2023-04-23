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
		$user_session= $this->session->userdata("user");
		if(!empty($_POST))
		{
			
			$pass							= $_POST['password'];
			$new_password 					= $_POST['new_password'];
			$confirm_new_password			= $_POST['confirm_new_password'];

			if(empty($_POST['password'])){
				$this->session->set_Flashdata("error", "Vui Lòng Nhập mật khẩu");
				redirect(site_url("account/change-pass") , "back");
			}
			if(empty($_POST['new_password'])){
				$this->session->set_Flashdata("error", "Vui Lòng Nhập mật khẩu mới");
				redirect(site_url("account/change-pass") , "back");
			}
			if(empty($_POST['confirm_new_password'])){
				$this->session->set_Flashdata("error", "Vui Lòng xác nhận lại mật khẩu mới");
				redirect(site_url("account/change-pass") , "back");
			}
			if($new_password != $confirm_new_password)
			{
				$this->session->set_Flashdata("error", "Nhập lại mật khẩu không chính xác");
				redirect(site_url("account/change-pass") , "back");
			}
			if($new_password = $pass)
			{
				$this->session->set_Flashdata("error", "Mật khẩu mới không được trùng với mật khẩu củ");
				redirect(site_url("account/change-pass") , "back");
			}
			
			if($new_password == $confirm_new_password && !empty($pass))
			{
				if(md5($_POST['password']) == $user_session->password)
				{
					$checkpass = $_POST['new_password'];
					$data = [];
					
					$data['password'] 		=md5($checkpass);
					$data['password_text']  =$checkpass;
	
					$check=$this->m_user->update($data,['id' => $user_session->id]);
				
					if($check == true)
					{
						$this->m_user->logout();
						redirect(site_url("home"), "back");
						$this->session->set_Flashdata("Success", "Đổi mật khẩu thành công");
					}
				}
				
			}
			else
			{
				redirect(site_url("account/change-pass"), "back");
			}
		}

		$view_data=array();
		

		$tmpl_content = array();
		$tmpl_content["content"]   = $this->load->view("account/change", $view_data, TRUE);
		$this->load->view("layout/view", $tmpl_content);
	}

	public function register()
	{
		$view_data=array();

		$tmpl_content = array();
		$tmpl_content["content"]   = $this->load->view("account/register", $view_data, TRUE);
		$this->load->view("layout/view", $tmpl_content);
	}

}
?>	