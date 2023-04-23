<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tai_khoan extends CI_Controller {
	var $_breadcrumb = array();
	var $user_online = array();

	function __construct()
	{
		parent::__construct();

		$this->_breadcrumb = array_merge($this->_breadcrumb, array("Trang chủ" => site_url()));
		$this->user_online = $this->session->userdata("user");
		
	}
	public function index() {
		$this->_breadcrumb = array_merge($this->_breadcrumb, ["Đăng nhập" => '']);
		if(!empty($_POST))
		{
			$email			= $_POST['username'];
			$pass	 		= $_POST['password'];
			
			if($this->m_user->login($email,$pass) == FALSE)
			{
				$this->session->set_flashdata("error", "Email hoặc password sai.");
				redirect(site_url("tai-khoan/index"), "back");
			}
			else
			{
				redirect(site_url('tai-khoan/lich-su-don-hang'), "back");
			}
		}
		
		$view_data=array();
		$view_data['breadcrumb']	 		= $this->_breadcrumb;

		$tmpl_content = array();
		$tmpl_content["content"]   = $this->load->view("account/index", $view_data, TRUE);
		$this->load->view("layout/view", $tmpl_content);
	}

	public function info()
	{
		$this->_breadcrumb = array_merge($this->_breadcrumb, ["Thông tin tài khoản" => '']);
		if (empty($this->user_online)) {
			redirect(site_url('tai-khoan'), "back");
		}

		if(!empty($_POST))
		{
			$data=array();
			$data['fullname']	 			= $_POST['fullname'];
			$data['gender']	 				= $_POST['gender'];
			$data['birthday']	 			= $_POST['birthday'];
			$data['phone']	 				= $_POST['phone'];
			$data['address']	 			= $_POST['address'];

			$user_session= $this->session->userdata("user");

			if($this->m_user->update($data,['id'=>$user_session->id]))
			{
				redirect(site_url("tai-khoan/info"), "back");
			}
			$this->session->set_flashdata("success", "Thêm thành công");
			

		}
		

		$user_session= $this->session->userdata("user");

		$view_data=array();
		$view_data['infos']	 			= $this->m_user->load($user_session->id);
		$view_data['breadcrumb']	 		= $this->_breadcrumb;

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
		$this->_breadcrumb = array_merge($this->_breadcrumb, ["Đổi mật khẩu" => '']);
		if (empty($this->user_online)) {
			redirect(site_url('tai-khoan'), "back");
		}
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
		$view_data['breadcrumb']	 		= $this->_breadcrumb;
		

		$tmpl_content = array();
		$tmpl_content["content"]   = $this->load->view("account/change", $view_data, TRUE);
		$this->load->view("layout/view", $tmpl_content);
	}

	public function register()
	{
		$task = $this->input->post("task");
		if (!empty($task)) {

			$new_fullname			= $this->input->post("new_fullname");
			$new_email				= $this->input->post("new_email");
			$new_phone				= $this->input->post("new_phone");
			$new_password			= $this->input->post("new_password");
			$confirm_new_password	= $this->input->post("confirm_new_password");
			
			$data = array(
				"fullname"			=> $new_fullname,
				"email"				=> $new_email,
				"password"			=> md5($new_password),
				"password_text"		=> $new_password,
				"phone"				=> $new_phone
			);
			if($this->m_user->add($data)) {
				$this->session->set_flashdata("success", "Đăng ký thành công, vui lòng đăng nhập lại");
				// redirect(site_url("tai-khoan"), "back");
			}
		}

		$this->_breadcrumb = array_merge($this->_breadcrumb, ["Đăng ký" => '']);
		$view_data=array();
		$view_data['breadcrumb']	 		= $this->_breadcrumb;

		$tmpl_content = array();
		$tmpl_content["content"]   = $this->load->view("account/register", $view_data, TRUE);
		$this->load->view("layout/view", $tmpl_content);
	}

	public function lich_su_don_hang()
	{
		if (empty($this->user_online)) {
			redirect(site_url('tai-khoan'), "back");
		}
		$info = new stdClass();
		$info->user_id = $this->user_online->id;

		$orders = $this->m_order->items($info);
		foreach($orders as $order) {
			$info = new stdClass();
			$info->order_id = $order->id;
			$order->order_details = $this->m_order_detail->items($info);
		}

		$this->_breadcrumb = array_merge($this->_breadcrumb, ["Lich sử đơn hàng" => '']);
		$view_data=array();
		$view_data['breadcrumb']	 	= $this->_breadcrumb;
		$view_data['orders']	 		= $orders;

		$tmpl_content = array();
		$tmpl_content["content"]   = $this->load->view("account/checkout", $view_data, TRUE);
		$this->load->view("layout/view", $tmpl_content);
	}

}
?>	