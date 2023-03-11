<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Syslog extends CI_Controller {

	var $_breadcrumb = array();
	
	public function __construct()
	{
		parent::__construct();
		
		$method = $this->util->slug($this->router->fetch_method());
		
		if (!in_array($method, array("login", "logout"))) {
			$this->util->require_admin_login();
			$user = $this->session->userdata("admin");
			if (!$user->active) {
				$this->session->set_flashdata("error", "Tài khoản của bạn đang được xem xét.");
				redirect(ADMIN_URL);
			}
			else if ($user->deleted) {
				$this->session->set_flashdata("error", "Tài khoản của bạn không có hoặc đã xoá.");
				redirect(ADMIN_URL);
			}
		}
		
		$this->_breadcrumb = array_merge($this->_breadcrumb, array("Quản Lý" => site_url($this->util->slug($this->router->fetch_class()))));
	}
	
	public function index()
	{
		$view_data = array();
		$view_data["title"] = 'Dinh Quoc Kiet';
		
		$tmpl_content = array();
		$tmpl_content["content"] = $this->load->view("admin/index", $view_data, true);
		$this->load->view("layout/admin/main", $tmpl_content);
	}
	
	//------------------------------------------------------------------------------
	// Login
	//------------------------------------------------------------------------------
	
	public function login()
	{
		if (!empty($_POST))
		{
			$agent_id = trim($this->util->value($this->input->post("agent_id"), ""));
			$email = trim($this->util->value($this->input->post("email"), ""));
			$password = trim($this->util->value($this->input->post("password"), ""));
			
			if (strtoupper($agent_id) == ADMIN_AGENT_ID) {
				if ($this->m_user->login($email, $password, "admin") == false) {
					$this->session->set_flashdata("error", "Invalid email or password.");
					redirect(site_url("syslog/login"), "back");
				} else {
					redirect(site_url("syslog"));
				}
			} else {
				$this->session->set_flashdata("error", "Invalid Agent ID.");
				redirect(site_url("syslog/login"), "back");
			}
		}
		
		$this->_breadcrumb = array_merge($this->_breadcrumb, array("Login" => site_url("{$this->util->slug($this->router->fetch_class())}/{$this->util->slug($this->router->fetch_method())}")));
		
		$view_data = array();
		$view_data["breadcrumb"] = $this->_breadcrumb;
		
		$tmpl_content = array();
		$tmpl_content["content"] = $this->load->view("admin/login", $view_data, true);
		$this->load->view("layout/admin/login", $tmpl_content);
	}

	public function logout()
	{
		$this->m_user->logout();
		redirect(site_url("syslog"));
	}
	
	//------------------------------------------------------------------------------
	// Sitemap
	//------------------------------------------------------------------------------
	
	public function create_sitemap()
	{
		$sitename = strtolower(SITE_NAME);
		
		$url80 = array();
		$url64 = array();
		
		$xmlstr  = '<?xml version="1.0" encoding="UTF-8"?>';
		$xmlstr .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:image="http://www.google.com/schemas/sitemap-image/1.1" xmlns:video="http://www.google.com/schemas/sitemap-video/1.1">';
		
		$url80[] = BASE_URL;
		$url80[] = site_url("gioi-thieu");
		$url80[] = site_url("san-pham");
		$url80[] = site_url("tin-tuc-su-kien");
		$url80[] = site_url("hoi-dap");
		$url80[] = site_url("thong-tin-chung");
		$url80[] = site_url("lien-he");
		
		$product_categories = $this->m_product_categories->items(null,1);
		$services = $this->m_product->items(null,1);
		$post_categories = $this->m_posts_categories->items(null,1);
		$posts = $this->m_posts->items(null,1);
		$content_categories = $this->m_content_categories->items(null,1);
		$contents = $this->m_contents->items(null,1);
		$faq_categories = $this->m_faq_categories->items(null,1);
		$faqs = $this->m_faq->items(null,1);

		foreach ($product_categories as $product_categorie) {
			$url64[] =  site_url("san-pham/{$product_categorie->alias}");
		}
		foreach ($services as $service) {
			$url64[] =  site_url("san-pham/{$this->m_product_categories->load($service->category_id)->alias}/{$service->alias}");
		}
		foreach ($content_categories as $content_categorie) {
			$url64[] =  site_url("tin-tuc-su-kien/{$content_categorie->alias}");
		}
		foreach ($contents as $content) {
			$url64[] =  site_url("tin-tuc-su-kien/{$this->m_content_categories->load($content->category_id)->alias}/{$content->alias}");
		}
		foreach ($post_categories as $post_categorie) {
			$url64[] =  site_url("thong-tin-chung/{$post_categorie->alias}");
		}
		foreach ($posts as $posts) {
			$url64[] =  site_url("thong-tin-chung/{$this->m_posts_categories->load($posts->category_id)->alias}/{$posts->alias}");
		}
		foreach ($faq_categories as $faq_categorie) {
			$url64[] =  site_url("hoi-dap/{$faq_categorie->alias}");
		}
		foreach ($faqs as $faq) {
			$url64[] =  site_url("hoi-dap/{$this->m_faq_categories->load($faq->category_id)->alias}/{$faq->alias_question}");
		}
		
		foreach ($url80 as $url) {
			$xmlstr .= '<url>';
			$xmlstr .= '<loc>'.$url.'</loc>';
			$xmlstr .= '<changefreq>daily</changefreq>';
			$xmlstr .= '<priority>0.80</priority>';
			$xmlstr .= '</url>';
		}
		
		foreach ($url64 as $url) {
			$xmlstr .= '<url>';
			$xmlstr .= '<loc>'.$url.'</loc>';
			$xmlstr .= '<changefreq>daily</changefreq>';
			$xmlstr .= '<priority>0.64</priority>';
			$xmlstr .= '</url>';
		}
		$xmlstr .= '</urlset>';
		
		chmod('sitemap.xml', 0777);
		
		$fp = fopen('sitemap.xml', 'w');
		fwrite($fp, $xmlstr);
		fclose($fp);
		
		chmod('sitemap.xml', 0664);
	}
	
	//------------------------------------------------------------------------------
	// Users
	//------------------------------------------------------------------------------
	public function users()
	{
		$users = $this->m_user->users();
		$view_data = array();
		$view_data["users"] = $users;
		$view_data["title"] = 'Danh sách thành viên';
		
		$tmpl_content = array();
		$tmpl_content["content"] = $this->load->view("admin/account/index", $view_data, true);
		$this->load->view("layout/admin/main", $tmpl_content);
	}
	public function contents($action=null, $id=null){
		if (!empty($action)) {
			$categories = $this->m_content_categories->items(null,1);
			if (!empty($_POST)) {
				$data = [];
				$data['title'] 			= $_POST['title'];
				$data['alias'] 			= $_POST['alias'];
				$data['category_id'] 	= $_POST['category_id'];
				$data['description'] 	= $_POST['description'];
				$data['thumbnail'] 		= $_POST['thumbnail'];
				$data['active'] 		= $_POST['active'];
				$data['content'] 		= $_POST['content'];
				
				if ($action == 'add') {
					$this->session->set_flashdata("success", "Thêm thành công");
					$this->m_contents->add($data);
				} else if ($action == 'edit') {
					$this->session->set_flashdata("success", "Cập nhật thành công");
					$this->m_contents->update($data, ['id' => $id]);
				}
				
				redirect(site_url("syslog/contents"), "back");
			}
			
			if ($action == 'add') {

				$view_data = array();
				$view_data["categories"] = $categories;
				$view_data["title"] = 'Thêm bài viết';
	
				$tmpl_content = array();
				$tmpl_content["content"] = $this->load->view("admin/content/edit", $view_data, true);
				$this->load->view("layout/admin/main", $tmpl_content);

			} else if ($action == 'edit') {
				$item = $this->m_contents->load($id);

				$view_data = array();
				$view_data["item"] = $item;
				$view_data["categories"] = $categories;
				$view_data["title"] = 'Chỉnh sửa bài viết';
	
				$tmpl_content = array();
				$tmpl_content["content"] = $this->load->view("admin/content/edit", $view_data, true);
				$this->load->view("layout/admin/main", $tmpl_content);	
			} else if ($action == 'delete') {
				$this->m_contents->remove(['id' => $id]);
				$this->session->set_flashdata("success", "Xóa thành công");
				redirect(site_url("syslog/contents"), "back");
			}

		} else {
			$contents = $this->m_contents->items();
			$view_data = array();
			$view_data["contents"] = $contents;
			$view_data["title"] = 'Danh sách bài viết';

			$tmpl_content = array();
			$tmpl_content["content"] = $this->load->view("admin/content/index", $view_data, true);
			$this->load->view("layout/admin/main", $tmpl_content);
		}
	}
	public function partners(){
		$partners = $this->m_partner->items();
		$view_data = array();
		$view_data["partner"] = $partners;
		$view_data["title"] = 'Danh Sách Đối Tác';

		$tmpl_content = array();
		$tmpl_content["content"] = $this->load->view("admin/partner/index", $view_data, true);
		$this->load->view("layout/admin/main", $tmpl_content);

	}
	public function products(){
		$product = $this->m_product->items();
		$view_data =array();
		$view_data['products']=$product;
		$view_data['title'] = 'Danh Sách Sản Phẩm';

		$tmpl_product = array();
		$tmpl_product['content']=$this->load->view('admin/product/category/index',$view_data, true);
		$this->load->view('layout/admin/main',$tmpl_product);
	}

	public function sliders($action=null, $id=null){
		if(!empty($action))
		{
			if(!empty($_POST))
			{
				$receive_data=[];
				$receive_data['title'] 		 = $_POST['title'];
				$receive_data['link']		 = $_POST['link'];
				$receive_data['description'] = $_POST['description'];
				$receive_data['thumbnail']   = $_POST['thumbnail'];
				$receive_data['active'] 	 = $_POST['active'];
				if($action == 'add')
				{
					$this->session->set_flashdata("success", "Thêm thành công");
					$this->m_slide->add($receive_data);
					
				}
				else if($action =='edit')
				{
					$this->m_slide->update($receive_data,['id'=>$id]);
					$this->session->set_flashdata("success", "Cập nhật thành công");
					
				}
				redirect(site_url("syslog/sliders"), "back");

			}
			// load giao diện
			if($action == 'add')
			{
				$view_data = array();
				$view_data["title"] = 'Thêm mới Slider';
				
				$tmpl_slider = array();
				$tmpl_slider["content"] = $this->load->view("admin/slide/edit", $view_data, true);
				$this->load->view("layout/admin/main", $tmpl_slider);
			}
			else if($action == 'edit')
			{
				
				$kq_slider_item = $this->m_slide->load($id);
				$view_data = array();
				$view_data["slider_chuyen_item"] = $kq_slider_item;
				$view_data["title"] = 'Cập nhật Slider';
				
				$tmpl_slider = array();
				$tmpl_slider["content"] = $this->load->view("admin/slide/edit", $view_data, true);
				$this->load->view("layout/admin/main", $tmpl_slider);	
			}
			else if($action == 'delete')
			{
				$this->m_slide->remove(['id' => $id]);
				$this->session->set_flashdata("success", "Xóa thành công");
				redirect(site_url("syslog/sliders"), "back");
			}
		}
		else
		{
			$kq_slider = $this->m_slide->items();
			$view_data = array();
			$view_data["slider_chuyen"] = $kq_slider;
			$view_data["titles"] = 'Danh sách Slider';

			$tmpl_content = array();
				$tmpl_content["content"] = $this->load->view("admin/slide/index", $view_data, true);
				$this->load->view("layout/admin/main", $tmpl_content);
		}
	}

	public function contacts(){
		$kq_contact = $this->m_contact->items();
		$view_data = array();
		$view_data["contact_chuyen"] = $kq_contact;
		$view_data["title"] = 'Danh sách Contact';

		$tmpl_contact = array();
		$tmpl_contact["content"] = $this->load->view("admin/contact/index", $view_data, true);
		$this->load->view("layout/admin/main", $tmpl_contact);
	}

	public function users1($action=null, $id=null)
	{
		$config_row_page = ADMIN_ROW_PER_PAGE;
		$pagi		= (isset($_GET["pagi"]) ? $_GET["pagi"] : $config_row_page);
		if (!isset($_GET['page']) || (($_GET['page']) < 1) ) {
			$page = 1;
		}
		else {
			$page = $_GET['page'];
		}
		$offset = ($page - 1) * $pagi;
		$this->_breadcrumb = array_merge($this->_breadcrumb, array("Thành viên" => site_url("{$this->util->slug($this->router->fetch_class())}/{$this->util->slug($this->router->fetch_method())}")));
		$task = $this->util->value($this->input->post("task"), "");
		if (!empty($task)) {
			if ($task == "save") {
				$fullname		= $this->input->post("fullname");
				$email			= $this->input->post("email");
				$password_text	= $this->input->post("password_text");
				$user_type		= $this->input->post("user_type");
				$avatar			= $this->input->post("avatar");
				
				$data = array (
					"fullname"		=> $fullname,
					"email"			=> $email,
					"password_text"	=> $password_text,
					"password" 		=> md5($password_text),
					"user_type"		=> $user_type,
					"avatar"		=> $avatar
				);
				
				if ($action == "add") {
					$count_email = 0;
					if (empty($fullname)) {
						$this->session->set_flashdata("error", "Họ và Tên không được trống.");
						redirect(site_url("syslog/users/add"), "back");
					}
					else if (empty($email)) {
						$this->session->set_flashdata("error", "Email không được trống.");
						redirect(site_url("syslog/users/add"), "back");
					}
					else if (empty($password_text)) {
						$this->session->set_flashdata("error", "Password không được trống.");
						redirect(site_url("syslog/users/add"), "back");
					}
					else if ($count_email != 0)
					{
						$this->session->set_flashdata("error", "Email này không hợp lệ. Vui lòng nhập email khác.");
						redirect(site_url("syslog/users/add"), "back");
					}
					else if ($this->m_user->get_user_email($email)) {
						$this->session->set_flashdata("error", "Email này đã được đăng ký. Vui lòng nhập email khác.");
						redirect(site_url("syslog/users/add"), "back");
					}
					else if (strlen(trim($password_text)) < 6) {
						$this->session->set_flashdata("error", "Mật khẩu phải có ít nhất 6 ký tự.");
						redirect(site_url("syslog/users/add"), "back");
					} else {
						$this->m_user->add($data);
						$this->session->set_flashdata("success", "Đăng ký thành công");
					}
				}
				else if ($action == "edit") {
					$where = array("id" => $id);
					$this->m_user->update($data, $where);
					$this->session->set_flashdata("success", "Cập nhật thành công");
				}
				redirect(site_url("syslog/users"));
			}
			else if ($task == "cancel") {
				redirect(site_url("syslog/users"));
			}
			else if ($task == "publish") {
				$ids = $this->util->value($this->input->post("cid"), array());
				foreach ($ids as $id) {
					$data = array("active" => 1);
					$where = array("id" => $id);
					$this->m_user->update($data, $where);
				}
				redirect(site_url("syslog/users"));
			}
			else if ($task == "unpublish") {
				$ids = $this->util->value($this->input->post("cid"), array());
				foreach ($ids as $id) {
					$data = array("active" => 0);
					$where = array("id" => $id);
					$this->m_user->update($data, $where);
				}
				$user = $this->m_user->load($ids[0]);
			}
			else if ($task == "delete") {
				$ids = $this->util->value($this->input->post("cid"), array());
				foreach ($ids as $id) {
					$where = array("id" => $id);
					$this->m_user->delete($where);
				}
				$this->session->set_flashdata("success", "Xóa thành công");
				redirect(site_url("syslog/users"));
			}
		}
		
		if ($action == "add") {
			$this->_breadcrumb = array_merge($this->_breadcrumb, array("Tạo tài khoản" => site_url("{$this->util->slug($this->router->fetch_class())}/{$this->util->slug($this->router->fetch_method())}/add")));

			$view_data = array();
			$view_data["user"] = $this->m_user->instance();
			$view_data["breadcrumb"] 	= $this->_breadcrumb;
			
			$tmpl_content = array();
			$tmpl_content["content"] = $this->load->view("admin/account/edit", $view_data, true);
			$this->load->view("layout/admin/main", $tmpl_content);
		}
		else if ($action == "edit") {
			$this->_breadcrumb = array_merge($this->_breadcrumb, array("Chỉnh sửa tài khoản" => site_url("{$this->util->slug($this->router->fetch_class())}/{$this->util->slug($this->router->fetch_method())}/edit/{$id}")));

			$view_data = array();
			$view_data["user"] = $this->m_user->load($id);
			$view_data["breadcrumb"] 	= $this->_breadcrumb;
			$tmpl_content = array();
			$tmpl_content["content"] = $this->load->view("admin/account/edit", $view_data, true);
			$this->load->view("layout/admin/main", $tmpl_content);
		} else {
			$search_text = $this->util->value($this->input->post("search_text"), "");
			
			$info = new stdClass();
			if (!empty($search_text)) {
				$info->search_text = $search_text;
			}
			$total = count($this->m_user->users($info));
			$pagination = $this->util->pagination(site_url("{$this->util->slug($this->router->fetch_class())}/{$this->util->slug($this->router->fetch_method())}"). "?$_SERVER[QUERY_STRING]", $total, $pagi);
			
			$view_data = array();
			$view_data["breadcrumb"] 	= $this->_breadcrumb;
			$view_data["users"]			= $this->m_user->users($info, null, $pagi, $offset);
			$view_data["offset"]		= $offset;
			$view_data["pagination"]	= $pagination;
			
			$tmpl_content = array();
			$tmpl_content["content"] = $this->load->view("admin/account/index", $view_data, true);
			$this->load->view("layout/admin/main", $tmpl_content);
		}
	}
	//------------------------------------------------------------------------------
	// product
	//------------------------------------------------------------------------------
	public function product_categories ($action=null, $id=null){
		$config_row_page = ADMIN_ROW_PER_PAGE;
		$pagi		= (isset($_GET["pagi"]) ? $_GET["pagi"] : $config_row_page);
		if (!isset($_GET['page']) || (($_GET['page']) < 1) ) {
			$page = 1;
		}
		else {
			$page = $_GET['page'];
		}
		$offset = ($page - 1) * $pagi;
		$this->_breadcrumb = array_merge($this->_breadcrumb, array("Danh mục sản phẩm & dịch vụ" => site_url("{$this->util->slug($this->router->fetch_class())}/{$this->util->slug($this->router->fetch_method())}")));
		
		$task = $this->util->value($this->input->post("task"), "");
		if (!empty($task)) {
			if ($task == "save") {
				$name			= $this->util->value($this->input->post("name"), "");
				$alias			= $this->util->value($this->input->post("alias"), "");
				$description	= $this->util->value($this->input->post("description"), "");
				$active			= $this->util->value($this->input->post("active"), 1);
				
				if (empty($alias)) {
					$alias = $this->util->slug($name);
				}
				
				$data = array (
					"name"			=> $name,
					"alias"			=> $alias,
					"description"	=> $description,
					"active"		=> $active
				);
				
				if ($action == "add") {
					$this->m_product_categories->add($data);
					$this->session->set_flashdata("success", "Tạo thành công");
				}
				else if ($action == "edit") {
					$where = array("id" => $id);
					$this->m_product_categories->update($data, $where);
				}
				$this->session->set_flashdata("success", "Cập nhật thành công");
				redirect(site_url("syslog/product-categories"));
			}
			else if ($task == "cancel") {
				redirect(site_url("syslog/product-categories"));
			}
			else if ($task == "publish") {
				$ids = $this->util->value($this->input->post("cid"), array());
				foreach ($ids as $id) {
					$data = array("active" => 1);
					$where = array("id" => $id);
					$this->m_product_categories->update($data, $where);
				}
				redirect(site_url("syslog/product-categories"));
			}
			else if ($task == "unpublish") {
				$ids = $this->util->value($this->input->post("cid"), array());
				foreach ($ids as $id) {
					$data = array("active" => 0);
					$where = array("id" => $id);
					$this->m_product_categories->update($data, $where);
				}
				redirect(site_url("syslog/product-categories"));
			}
			else if ($task == "delete") {
				$ids = $this->util->value($this->input->post("cid"), array());
				foreach ($ids as $id) {
					$where = array("id" => $id);
					$this->m_product_categories->delete($where);
				}
				$this->session->set_flashdata("success", "Xóa thành công");
				redirect(site_url("syslog/product-categories"));
			}
		}
		
		if ($action == "add") {
			$this->_breadcrumb = array_merge($this->_breadcrumb, array("Tạo danh mục" => site_url("{$this->util->slug($this->router->fetch_class())}/{$this->util->slug($this->router->fetch_method())}/{$action}")));
			
			$view_data = array();
			$view_data["breadcrumb"] = $this->_breadcrumb;
			
			$tmpl_content = array();
			$tmpl_content["content"] = $this->load->view("admin/product/category/edit", $view_data, true);
			$this->load->view("layout/admin/main", $tmpl_content);
		}
		else if ($action == "edit") {
			$item = $this->m_product_categories->load($id);
			$this->_breadcrumb = array_merge($this->_breadcrumb, array("{$item->name}" => site_url("{$this->util->slug($this->router->fetch_class())}/{$this->util->slug($this->router->fetch_method())}/{$action}/{$id}")));
			
			$view_data = array();
			$view_data["breadcrumb"] = $this->_breadcrumb;
			$view_data["item"] = $item;
			
			$tmpl_content = array();
			$tmpl_content["content"] = $this->load->view("admin/product/category/edit", $view_data, true);
			$this->load->view("layout/admin/main", $tmpl_content);
		}
		else {
			$total = count($this->m_product_categories->items());
			if (!isset($_GET['pagi'])){
				$pagination = $this->util->pagination(site_url("{$this->util->slug($this->router->fetch_class())}/{$this->util->slug($this->router->fetch_method())}"). "?pagi=$config_row_page"."$_SERVER[QUERY_STRING]", $total, $pagi);
			}else{
				$pagination = $this->util->pagination(site_url("{$this->util->slug($this->router->fetch_class())}/{$this->util->slug($this->router->fetch_method())}"). "?$_SERVER[QUERY_STRING]", $total, $pagi);
			}
			$items = $this->m_product_categories->items(null,null,$pagi,$offset);
			
			$view_data = array();
			$view_data["breadcrumb"]	= $this->_breadcrumb;
			$view_data["offset"]		= $offset;
			$view_data["title"]			= 'Danh mục sản phẩm';
			$view_data["pagination"]	= $pagination;
			$view_data["totalitems"]	= sizeof($this->m_product_categories->items());
			$view_data["items"]			= $items;
			
			$tmpl_content = array();
			$tmpl_content["content"] = $this->load->view("admin/product/category/index", $view_data, true);
			$this->load->view("layout/admin/main", $tmpl_content);
		}
	}
	public function product ($category_id, $action=null, $id=null) {
		$config_row_page = ADMIN_ROW_PER_PAGE;
		$pagi		= (isset($_GET["pagi"]) ? $_GET["pagi"] : $config_row_page);
		if (!isset($_GET['page']) || (($_GET['page']) < 1) ) {
				$page = 1;
		}
		else {
				$page = $_GET['page'];
		}
		$offset = ($page - 1) * $pagi;
		$category = $this->m_product_categories->load($category_id);

		$this->_breadcrumb = array_merge($this->_breadcrumb, array("Danh mục sản phẩm & dịch vụ" => site_url("{$this->util->slug($this->router->fetch_class())}/product-categories")));
		$this->_breadcrumb = array_merge($this->_breadcrumb, array("{$category->name}" => site_url("{$this->util->slug($this->router->fetch_class())}/{$this->util->slug($this->router->fetch_method())}/{$category_id}")));
		
		$task = $this->util->value($this->input->post("task"), "");
		if (!empty($task)) {
			if ($task == "save") {
				$title			= $this->util->value($this->input->post("title"), "");
				$alias			= $this->util->value($this->input->post("alias"), "");
				$thumbnail 		= !empty($_FILES['thumbnail']['name']) ? explode('.',$_FILES['thumbnail']['name']) : $this->m_product->load($id)->thumbnail;
				$price			= $this->util->value($this->input->post("price"), "");
				$description	= $this->util->value($this->input->post("description"), "");
				$content		= $this->util->value($this->input->post("content"), "");
				$active			= $this->util->value($this->input->post("active"), 1);
				$category_id	= $this->util->value($this->input->post("category_id"), 1);
				$check_bold		= $this->util->value($this->input->post("check_bold"), "");
				if (empty($alias)) {
					$alias = $this->util->slug($title);
				}
				if (empty($id)) {
					$id = $this->m_product->get_next_value();
				}
				$data = array (
					"title"			=> $title,
					"category_id"	=> $category_id,
					"alias"			=> $alias,
					"thumbnail"		=> $thumbnail,
					"price"			=> $price,
					"description"	=> $description,
					"content"		=> $content,
					"active"		=> $active,
					"check_bold"	=> $check_bold,
					"category_id"	=> $category->id
				);
				if (!empty($_FILES['thumbnail']['name'])){
					$data['thumbnail'] = BASE_URL."/files/upload/image/product/{$id}/{$this->util->slug($thumbnail[0])}.{$thumbnail[1]}";
				}
				$file_deleted = '';
				if ($action == "add") {
					$this->m_product->add($data);
					$this->session->set_flashdata("success", "Tạo thành công");
				}
				else if ($action == "edit") {
					$where = array("id" => $id);
					$this->m_product->update($data, $where);
					$this->session->set_flashdata("success", "Cập nhật thành công");
				}
				$path = "./files/upload/image/product/{$id}";
				if (!file_exists($path)) {
					mkdir($path, 0755, true);
				}
				$allow_type = 'gif|jpg|jpeg|png';
				$this->util->upload_file($path,'thumbnail',$file_deleted,$allow_type);
				redirect(site_url("syslog/product/{$category->alias}"));
			}
			else if ($task == "cancel") {
				redirect(site_url("syslog/product/{$category->alias}"));
			}
			else if ($task == "publish") {
				$ids = $this->util->value($this->input->post("cid"), array());
				foreach ($ids as $id) {
					$data = array("active" => 1);
					$where = array("id" => $id);
					$this->m_product->update($data, $where);
				}
				redirect(site_url("syslog/product/{$category->alias}"));
			}
			else if ($task == "unpublish") {
				$ids = $this->util->value($this->input->post("cid"), array());
				foreach ($ids as $id) {
					$data = array("active" => 0);
					$where = array("id" => $id);
					$this->m_product->update($data, $where);
				}
				redirect(site_url("syslog/product/{$category->alias}"));
			}
			else if ($task == "delete") {
				$ids = $this->util->value($this->input->post("cid"), array());
				foreach ($ids as $id) {
					$where = array("id" => $id);
					$this->m_product->delete($where);
				}
				$this->session->set_flashdata("success", "Xóa thành công");
				redirect(site_url("syslog/product/{$category->alias}"));
			}
		}
		
		if ($action == "add") {
			$item = $this->m_product->instance();
			$this->_breadcrumb = array_merge($this->_breadcrumb, array("Tạo mới" => site_url("{$this->util->slug($this->router->fetch_class())}/{$this->util->slug($this->router->fetch_method())}/{$category_id}/{$action}")));
			
			$view_data = array();
			$view_data["breadcrumb"] = $this->_breadcrumb;
			$view_data["item"] = $item;
			$view_data["category"] = $category;
			
			$tmpl_content = array();
			$tmpl_content["content"] = $this->load->view("admin/product/edit", $view_data, true);
			$this->load->view("layout/admin/main", $tmpl_content);
		}
		else if ($action == "edit") {
			$item = $this->m_product->load($id);
			$this->_breadcrumb = array_merge($this->_breadcrumb, array("{$item->title}" => site_url("{$this->util->slug($this->router->fetch_class())}/{$this->util->slug($this->router->fetch_method())}/{$category_id}/{$action}/{$id}")));

			$view_data = array();
			$view_data["breadcrumb"] = $this->_breadcrumb;
			$view_data["item"] = $item;
			$view_data["category"] = $category;
			
			$tmpl_content = array();
			$tmpl_content["content"] = $this->load->view("admin/product/edit", $view_data, true);
			$this->load->view("layout/admin/main", $tmpl_content);
		}
		else {
			$info = new stdClass();
			$info->category_id = $category->id;

			$total = count($this->m_product->items($info, null, null, null));
			$items = $this->m_product->items($info, null, $pagi, $offset);
			if (!isset($_GET['pagi'])){
				$pagination = $this->util->pagination(site_url('syslog/product/'.$category->alias). "?pagi=$config_row_page"."$_SERVER[QUERY_STRING]", $total, $pagi);
			}else{
				$pagination = $this->util->pagination(site_url('syslog/product/'.$category->alias). "?$_SERVER[QUERY_STRING]", $total, $pagi);
			}

			$view_data = array();
			$view_data["breadcrumb"] 	= $this->_breadcrumb;
			$view_data["offset"]		= $offset;
			$view_data["pagination"]	= $pagination;
			$view_data["totalitems"]	= sizeof($this->m_product->items($info));
			$view_data["items"]			= $items;
			$view_data["pagi"]			= $pagi;
			$view_data["category"]		= $category;
			
			$tmpl_content = array();
			$tmpl_content["content"] = $this->load->view("admin/product/index", $view_data, true);
			$this->load->view("layout/admin/main", $tmpl_content);
		}
	}
	
	//------------------------------------------------------------------------------
	// settings
	//------------------------------------------------------------------------------
	public function settings($action=null)
	{
		$settings = $this->m_setting->items();
		
		$task = $this->util->value($this->input->post("task"), "");
		if (!empty($task)) {
			if ($task == "save") {
				$logo				= $this->util->value($this->input->post("logo"), "");
				$company_name		= $this->util->value($this->input->post("company_name"), "");
				$company_logan		= $this->util->value($this->input->post("company_logan"), "");
				$company_address	= $this->util->value($this->input->post("company_address"), "");
				$company_email		= $this->util->value($this->input->post("company_email"), "");
				$company_hotline	= $this->util->value($this->input->post("company_hotline"), "");
				$company_tollfree	= $this->util->value($this->input->post("company_tollfree"), "");
				$facebook_url		= $this->util->value($this->input->post("facebook_url"), "");
				$googleplus_url		= $this->util->value($this->input->post("googleplus_url"), "");
				$twitter_url		= $this->util->value($this->input->post("twitter_url"), "");
				$youtube_url		= $this->util->value($this->input->post("youtube_url"), "");
				$tags				= $this->util->value($this->input->post("tags"), "");
				
				$data = array (
					"logo"				=> $logo,
					"company_name"		=> $company_name,
					"company_logan"		=> $company_logan,
					"company_address"	=> $company_address,
					"company_email"		=> $company_email,
					"company_hotline"	=> $company_hotline,
					"company_tollfree"	=> $company_tollfree,
					"facebook_url"		=> $facebook_url,
					"googleplus_url"	=> $googleplus_url,
					"twitter_url"		=> $twitter_url,
					"youtube_url"		=> $youtube_url,
					"tags"				=> $tags,
				);
				
				if (!is_null($settings) && sizeof($settings)) {
					$setting = $settings[0];
					$where = array("id" => $setting->id);
					$this->m_setting->update($data, $where);
				} else {
					$this->m_setting->add($data);
				}
			}
			
			redirect(site_url("syslog/settings"));
		}
		
		$action = !is_null($action) ? $action : "index";
		
		if (!is_null($settings) && sizeof($settings)) {
			$setting = $settings[0];
		} else {
			$setting = $this->m_setting->instance();
		}
		
		$this->_breadcrumb = array_merge($this->_breadcrumb, array("Settings" => site_url("{$this->util->slug($this->router->fetch_class())}/{$this->util->slug($this->router->fetch_method())}")));
		
		$view_data = array();
		$view_data["setting"] = $setting;
		$view_data["breadcrumb"] = $this->_breadcrumb;
		
		$tmpl_content = array();
		$tmpl_content["content"] = $this->load->view("admin/settings/{$action}", $view_data, true);
		$this->load->view("layout/admin/main", $tmpl_content);
	}
	//------------------------------------------------------------------------------
	// document
	//------------------------------------------------------------------------------
	public function document($action=null,$id=null){
		$config_row_page = ADMIN_ROW_PER_PAGE;
		$pagi		= (isset($_GET["pagi"]) ? $_GET["pagi"] : $config_row_page);
		if (!isset($_GET['page']) || (($_GET['page']) < 1) ) {
			$page = 1;
		}
		else {
			$page = $_GET['page'];
		}
		$offset = ($page - 1) * $pagi;
		$this->_breadcrumb = array_merge($this->_breadcrumb, array( "Danh sách danh mục" => site_url("{$this->util->slug($this->router->fetch_class())}/category-document")));
		$task = $this->input->post('task');
		if (!empty($task)){
			if ($task == 'save'){
				$title 			= $this->input->post('title');
				$active 		= $this->input->post('active');
				
				if (!empty($_FILES['file_upload']["name"])){
					$allowed_type = explode('.',$_FILES['file_upload']["name"]);
				}else{
					$allowed_type = explode('.',$this->m_document->load($id)->file_name);
				}
				$data = array(
						"title" 		=> $title,
						"alias" 		=> $this->util->slug($title),
						"file_name" 	=> $this->util->slug($allowed_type[0]).'.'.$allowed_type[1],
						"type" 			=> strtolower($allowed_type[1]),
						"active" 		=> $active,
					);
				if (empty($id)) {
					$id = $this->m_document->get_next_value();
				}
				$path = "./files/upload/file_";
				$data["file_path"] = BASE_URL."/files/upload/file_";
				if ($data['type'] == 'rar'){
					$path .= "rar";
					$data["file_path"] .= "rar/{$id}/".$data["file_name"];
				} else if ($data['type'] == 'zip'){
					$path .= "zip";
					$data["file_path"] .= "zip/{$id}/".$data["file_name"];
				} else if (($data['type'] == 'doc') || ($data['type'] == 'docx')){
					$path .= "word";
					$data["file_path"] .= "word/{$id}/".$data["file_name"];
				} else if (($data['type'] == 'xls') || ($data['type'] == 'xlsx') || ($data['type'] == 'csv')){
					$path .= "excel";
					$data["file_path"] .= "excel/{$id}/".$data["file_name"];
				} else {
					$path .= "pdf";
					$data["file_path"] .= "pdf/{$id}/".$data["file_name"];
				}
				$path .= "/{$id}";
				if (!file_exists($path)) {
					mkdir($path, 0755, true);
				}
				if ($action == "add") {
					$file_data = $this->util->upload_file($path,'file_upload');
					$data["file_size"] = $file_data['file_size'];
					$this->m_document->add($data);
					$this->session->set_flashdata("success", "Thêm thành công.");
				}
				else if ($action == "edit") {
					$item = $this->m_document->load($id);
					$file_deleted = str_replace(BASE_URL,'.',$item->file_path);
					$file_data = $this->util->upload_file($path,'file_upload',$file_deleted);

					if ($this->document_type($allowed_type[1]) != $this->document_type(explode('.',$item->file_name)[1])) {
						$dir_path = str_replace('/'.$item->file_name,'',$file_deleted);
						rmdir($dir_path);
					}
					$data["file_size"] = $file_data['file_size'];
					$where = array("id" => $id);
					$this->m_document->update($data, $where);
					$this->session->set_flashdata("success", "Cập nhật thành công.");
				}
				redirect(site_url("syslog/document"));
			}
			else if ($task == "publish") {
				$ids = $this->util->value($this->input->post("cid"), array());
				foreach ($ids as $id) {
					$data = array("active" => 1);
					$where = array("id" => $id);
					$this->m_document->update($data, $where);
				}
				redirect(site_url("syslog/document"));
			}
			else if ($task == "unpublish") {
				$ids = $this->util->value($this->input->post("cid"), array());
				foreach ($ids as $id) {
					$data = array("active" => 0);
					$where = array("id" => $id);
					$this->m_document->update($data, $where);
				}
				redirect(site_url("syslog/document"));
			}
			else if ($task == "delete") {
				$ids = $this->util->value($this->input->post("cid"), array());
				foreach ($ids as $id) {
					$where = array("id" => $id);
					$this->m_document->delete($where);
				}
				$this->session->set_flashdata("success", "Xóa thành công");
				redirect(site_url("syslog/document"));
			}
		}
		if (!empty($action)){
			$view_data = array();
			if ($action == 'add'){
				$this->_breadcrumb = array_merge($this->_breadcrumb, array( "Thêm mới" => site_url("{$this->util->slug($this->router->fetch_class())}/{$this->util->slug($this->router->fetch_method())}/{$action}")));
			} else if ($action == 'edit'){
				$this->_breadcrumb = array_merge($this->_breadcrumb, array( $this->m_document->load($id)->title => site_url("{$this->util->slug($this->router->fetch_class())}/{$this->util->slug($this->router->fetch_method())}/{$action}/{$id}")));
				$view_data['item'] = $this->m_document->load($id);

			}
			$view_data['breadcrumb'] 	= $this->_breadcrumb;

			$tmpl_content = array();
			$tmpl_content["content"] = $this->load->view("admin/document/edit", $view_data, true);
			$this->load->view("layout/admin/main", $tmpl_content);
		} 
		else {
			$total = count($this->m_document->items());
			if (!isset($_GET['pagi'])){
				$pagination = $this->util->pagination(site_url("{$this->util->slug($this->router->fetch_class())}/{$this->util->slug($this->router->fetch_method())}"). "?pagi=$config_row_page"."$_SERVER[QUERY_STRING]", $total, $pagi);
			}else{
				$pagination = $this->util->pagination(site_url("{$this->util->slug($this->router->fetch_class())}/{$this->util->slug($this->router->fetch_method())}"). "?$_SERVER[QUERY_STRING]", $total, $pagi);
			}
			$items = $this->m_document->items(null,null,$pagi,$offset);
			$view_data = array();
			$view_data['breadcrumb'] 	= $this->_breadcrumb;
			$view_data['items'] 		= $items;
			$view_data['offset'] 		= $offset;
			$view_data['pagi'] 			= $pagi;
			$view_data['pagination'] 	= $pagination;

			$tmpl_content = array();
			$tmpl_content["content"] = $this->load->view("admin/document/index", $view_data, true);
			$this->load->view("layout/admin/main", $tmpl_content);
		}
	}
	private function document_type($type){
		$arr_file = array("file_excel","file_word","file_pdf","file_rar","file_zip");
		$arr_type = array(
				"xls" => 0,"xlsx" => 0,"csv" => 0,
				"doc" => 1,"docx" => 1,"pdf" => 2,
				"rar" => 3,"zip" => 4
			);
		return $arr_file[$arr_type[$type]];
	}
	public function about ($action=null, $id=null) {
		$this->_breadcrumb = array_merge($this->_breadcrumb, array("Danh sách các bài viết đơn" => site_url("{$this->util->slug($this->router->fetch_class())}/{$this->router->fetch_method()}")));
		$item = $this->m_post->items();
		$task = $this->util->value($this->input->post("task"), "");
		if (!empty($task)) {
			if ($task == "save") {
				$title			= $this->util->value($this->input->post("title"), "");
				$alias			= $this->util->value($this->input->post("alias"), "");
				$thumbnail 		= !empty($_FILES['thumbnail']['name']) ? explode('.',$_FILES['thumbnail']['name']) : $this->m_post->load($id)->thumbnail;
				$content		= $this->util->value($this->input->post("content"), "");
				$active			= $this->util->value($this->input->post("active"), 1);
				$data = array (
					"content"		=> $content,
					"active"		=> $active
				);
				if (!empty($_FILES['thumbnail']['name'])){
					$data['thumbnail'] = BASE_URL."/files/upload/image/about/{$this->util->slug($thumbnail[0])}.{$thumbnail[1]}";
				}
				$file_deleted = '';
				$path = "./files/upload/image/about";
				if (!file_exists($path)) {
					mkdir($path, 0755, true);
				}
				$allow_type = 'gif|jpg|jpeg|png';
				$this->util->upload_file($path,'thumbnail',$file_deleted,$allow_type);

				$where = array("id" => $item[0]->id);
				$this->m_post->update($data, $where);
				$this->session->set_flashdata("success", "Lưu thành công");
				redirect(site_url("syslog/about"));
			}
		} else {
			$view_data = array();
			$view_data["item"]			= $item[0];
			$tmpl_content = array();
			$tmpl_content["content"] = $this->load->view("admin/post/edit", $view_data, true);
			$this->load->view("layout/admin/main", $tmpl_content);
		}
	}
	public function posts_categories ($action=null, $id=null){
		$config_row_page = ADMIN_ROW_PER_PAGE;
		$pagi		= (isset($_GET["pagi"]) ? $_GET["pagi"] : $config_row_page);
		if (!isset($_GET['page']) || (($_GET['page']) < 1) ) {
			$page = 1;
		}
		else {
			$page = $_GET['page'];
		}
		$offset = ($page - 1) * $pagi;
		$this->_breadcrumb = array_merge($this->_breadcrumb, array("Danh mục nhiều bài viết" => site_url("{$this->util->slug($this->router->fetch_class())}/{$this->util->slug($this->router->fetch_method())}")));
		
		$task = $this->util->value($this->input->post("task"), "");
		if (!empty($task)) {
			if ($task == "save") {
				$name			= $this->util->value($this->input->post("name"), "");
				$alias			= $this->util->value($this->input->post("alias"), "");
				$active			= $this->util->value($this->input->post("active"), 1);
				$type			= $this->util->value($this->input->post("type"), 1);
				
				if (empty($alias)) {
					$alias = $this->util->slug($name);
				}
				
				$data = array (
					"name"		=> $name,
					"alias"		=> $alias,
					"active"	=> $active,
					"type"		=> $type
				);
				
				if ($action == "add") {
					$this->m_posts_categories->add($data);
					$this->session->set_flashdata("success", "Tạo thành công");
				}
				else if ($action == "edit") {
					$where = array("id" => $id);
					$this->m_posts_categories->update($data, $where);
					$this->session->set_flashdata("success", "Cập nhật thành công");
				}
				redirect(site_url("syslog/posts-categories"));
			}
			else if ($task == "cancel") {
				redirect(site_url("syslog/posts-categories"));
			}
			else if ($task == "publish") {
				$ids = $this->util->value($this->input->post("cid"), array());
				foreach ($ids as $id) {
					$data = array("active" => 1);
					$where = array("id" => $id);
					$this->m_posts_categories->update($data, $where);
				}
				redirect(site_url("syslog/posts-categories"));
			}
			else if ($task == "unpublish") {
				$ids = $this->util->value($this->input->post("cid"), array());
				foreach ($ids as $id) {
					$data = array("active" => 0);
					$where = array("id" => $id);
					$this->m_posts_categories->update($data, $where);
				}
				redirect(site_url("syslog/posts-categories"));
			}
			else if ($task == "delete") {
				$ids = $this->util->value($this->input->post("cid"), array());
				foreach ($ids as $id) {
					$where = array("id" => $id);
					$this->m_posts_categories->delete($where);
				}
				$this->session->set_flashdata("success", "Xóa thành công");
				redirect(site_url("syslog/posts-categories"));
			}
		}
		
		if ($action == "add") {
			$this->_breadcrumb = array_merge($this->_breadcrumb, array("Tạo danh mục" => site_url("{$this->util->slug($this->router->fetch_class())}/{$this->util->slug($this->router->fetch_method())}/{$action}")));
			
			$view_data = array();
			$view_data["breadcrumb"] = $this->_breadcrumb;
			
			$tmpl_content = array();
			$tmpl_content["content"] = $this->load->view("admin/content/category/edit", $view_data, true);
			$this->load->view("layout/admin/main", $tmpl_content);
		}
		else if ($action == "edit") {
			$item = $this->m_posts_categories->load($id);
			$this->_breadcrumb = array_merge($this->_breadcrumb, array("{$item->name}" => site_url("{$this->util->slug($this->router->fetch_class())}/{$this->util->slug($this->router->fetch_method())}/{$action}/{$id}")));
			
			$view_data = array();
			$view_data["breadcrumb"] = $this->_breadcrumb;
			$view_data["item"] = $item;
			
			$tmpl_content = array();
			$tmpl_content["content"] = $this->load->view("admin/content/category/edit", $view_data, true);
			$this->load->view("layout/admin/main", $tmpl_content);
		}
		else {
			$total = count($this->m_posts_categories->items());
			if (!isset($_GET['pagi'])){
				$pagination = $this->util->pagination(site_url("{$this->util->slug($this->router->fetch_class())}/{$this->util->slug($this->router->fetch_method())}"). "?pagi=$config_row_page"."$_SERVER[QUERY_STRING]", $total, $pagi);
			}else{
				$pagination = $this->util->pagination(site_url("{$this->util->slug($this->router->fetch_class())}/{$this->util->slug($this->router->fetch_method())}"). "?$_SERVER[QUERY_STRING]", $total, $pagi);
			}
			$items = $this->m_posts_categories->items(null,null,$pagi,$offset);
			
			$view_data = array();
			$view_data["breadcrumb"]	= $this->_breadcrumb;
			$view_data["offset"]		= $offset;
			$view_data["title"]			= 'Danh sách danh mục nhiều bài viết';
			$view_data["pagination"]	= $pagination;
			$view_data["totalitems"]	= sizeof($this->m_posts_categories->items());
			$view_data["items"]			= $items;
			
			$tmpl_content = array();
			$tmpl_content["content"] = $this->load->view("admin/content/category/index", $view_data, true);
			$this->load->view("layout/admin/main", $tmpl_content);
		}
	}
	public function posts ($category_id, $action=null, $id=null) {
		$config_row_page = ADMIN_ROW_PER_PAGE;
		$pagi		= (isset($_GET["pagi"]) ? $_GET["pagi"] : $config_row_page);
		if (!isset($_GET['page']) || (($_GET['page']) < 1) ) {
				$page = 1;
		}
		else {
				$page = $_GET['page'];
		}
		$offset = ($page - 1) * $pagi;
		$category = $this->m_posts_categories->load($category_id);

		$this->_breadcrumb = array_merge($this->_breadcrumb, array("Danh mục tin tức & sự kiện" => site_url("{$this->util->slug($this->router->fetch_class())}/product-categories")));
		$this->_breadcrumb = array_merge($this->_breadcrumb, array("{$category->name}" => site_url("{$this->util->slug($this->router->fetch_class())}/{$this->util->slug($this->router->fetch_method())}/{$category_id}")));
		
		$task = $this->util->value($this->input->post("task"), "");
		if (!empty($task)) {
			if ($task == "save") {
				$title			= $this->util->value($this->input->post("title"), "");
				$alias			= $this->util->value($this->input->post("alias"), "");
				$thumbnail 		= !empty($_FILES['thumbnail']['name']) ? explode('.',$_FILES['thumbnail']['name']) : $this->m_posts->load($id)->thumbnail;
				$description	= $this->util->value($this->input->post("description"), "");
				$content		= $this->util->value($this->input->post("content"), "");
				$active			= $this->util->value($this->input->post("active"), 1);
				if (empty($alias)) {
					$alias = $this->util->slug($title);
				}
				if (empty($id)) {
					$id = $this->m_posts->get_next_value();
				}
				$data = array (
					"title"			=> $title,
					"alias"			=> $alias,
					"thumbnail"		=> $thumbnail,
					"description"	=> $description,
					"content"		=> $content,
					"active"		=> $active,
					"category_id"	=> $category->id
				);
				if (!empty($_FILES['thumbnail']['name'])){
					$data['thumbnail'] = BASE_URL."/files/upload/image/new/{$this->util->slug($thumbnail[0])}.{$thumbnail[1]}";
				}
				$file_deleted = '';
				if ($action == "add") {
					$this->m_posts->add($data);
					$this->session->set_flashdata("success", "Tạo thành công");
				}
				else if ($action == "edit") {
					$where = array("id" => $id);
					$this->m_posts->update($data, $where);
					$this->session->set_flashdata("success", "Cập nhật thành công");
				}
				$path = "./files/upload/image/new";
				if (!file_exists($path)) {
					mkdir($path, 0755, true);
				}
				$allow_type = 'gif|jpg|jpeg|png';
				$this->util->upload_file($path,'thumbnail',$file_deleted,$allow_type);
				redirect(site_url("syslog/posts/{$category->alias}"));
			}
			else if ($task == "cancel") {
				redirect(site_url("syslog/posts/{$category->alias}"));
			}
			else if ($task == "publish") {
				$ids = $this->util->value($this->input->post("cid"), array());
				foreach ($ids as $id) {
					$data = array("active" => 1);
					$where = array("id" => $id);
					$this->m_posts->update($data, $where);
				}
				redirect(site_url("syslog/posts/{$category->alias}"));
			}
			else if ($task == "unpublish") {
				$ids = $this->util->value($this->input->post("cid"), array());
				foreach ($ids as $id) {
					$data = array("active" => 0);
					$where = array("id" => $id);
					$this->m_posts->update($data, $where);
				}
				redirect(site_url("syslog/posts/{$category->alias}"));
			}
			else if ($task == "delete") {
				$ids = $this->util->value($this->input->post("cid"), array());
				foreach ($ids as $id) {
					$where = array("id" => $id);
					$this->m_posts->delete($where);
				}
				$this->session->set_flashdata("success", "Xóa thành công");
				redirect(site_url("syslog/posts/{$category->alias}"));
			}
		}
		
		if ($action == "add") {
			$item = $this->m_posts->instance();
			$this->_breadcrumb = array_merge($this->_breadcrumb, array("Tạo mới" => site_url("{$this->util->slug($this->router->fetch_class())}/{$this->util->slug($this->router->fetch_method())}/{$category_id}/{$action}")));
			
			$view_data = array();
			$view_data["breadcrumb"] = $this->_breadcrumb;
			$view_data["item"] = $item;
			$view_data["category"] = $category;
			
			$tmpl_content = array();
			$tmpl_content["content"] = $this->load->view("admin/content/edit", $view_data, true);
			$this->load->view("layout/admin/main", $tmpl_content);
		}
		else if ($action == "edit") {
			$item = $this->m_posts->load($id);
			$this->_breadcrumb = array_merge($this->_breadcrumb, array("{$item->title}" => site_url("{$this->util->slug($this->router->fetch_class())}/{$this->util->slug($this->router->fetch_method())}/{$category_id}/{$action}/{$id}")));
			
			$arr_time_show = explode(' ', $item->created_date);
			$time_show = explode(':', $arr_time_show[1]);
			$date_show = explode('-', $arr_time_show[0]);

			$view_data = array();
			$view_data["date_time"] = $time_show[0].':'.$time_show[1].' - '.$date_show[2].'/'.$date_show[1].'/'.$date_show[0];
			$view_data["breadcrumb"] = $this->_breadcrumb;
			$view_data["item"] = $item;
			$view_data["category"] = $category;
			
			$tmpl_content = array();
			$tmpl_content["content"] = $this->load->view("admin/content/edit", $view_data, true);
			$this->load->view("layout/admin/main", $tmpl_content);
		}
		else {
			$info = new stdClass();
			$info->category_id = $category->id;

			$total = count($this->m_posts->items($info, null, null, null));
			$items = $this->m_posts->items($info, null, $pagi, $offset);
			if (!isset($_GET['pagi'])){
				$pagination = $this->util->pagination(site_url('syslog/news/'.$category->alias). "?pagi=$config_row_page"."$_SERVER[QUERY_STRING]", $total, $pagi);
			}else{
				$pagination = $this->util->pagination(site_url('syslog/news/'.$category->alias). "?$_SERVER[QUERY_STRING]", $total, $pagi);
			}

			
			$view_data = array();
			$view_data["breadcrumb"] 	= $this->_breadcrumb;
			$view_data["offset"]		= $offset;
			$view_data["pagination"]	= $pagination;
			$view_data["totalitems"]	= sizeof($this->m_posts->items($info));
			$view_data["items"]			= $items;
			$view_data["pagi"]			= $pagi;
			$view_data["category"]		= $category;
			
			$tmpl_content = array();
			$tmpl_content["content"] = $this->load->view("admin/content/index", $view_data, true);
			$this->load->view("layout/admin/main", $tmpl_content);
		}
	}
	public function slide ($action=null, $id=null) {
		if (!isset($_GET['page']) || (($_GET['page']) < 1) ) {
				$page = 1;
		}
		else {
				$page = $_GET['page'];
		}
		$offset = ($page - 1) * ADMIN_ROW_PER_PAGE;
		$this->_breadcrumb = array_merge($this->_breadcrumb, array("Slide" => site_url("{$this->util->slug($this->router->fetch_class())}/{$this->util->slug($this->router->fetch_method())}")));
		$task = $this->util->value($this->input->post("task"), "");
		if (!empty($task)) {
			if ($task == "save") {
				$title			= $this->util->value($this->input->post("title"), "");
				$thumbnail 		= !empty($_FILES['thumbnail']['name']) ? explode('.',$_FILES['thumbnail']['name']) : $this->m_slide->load($id)->thumbnail;
				$link			= $this->util->value($this->input->post("link"), "");
				$active			= $this->util->value($this->input->post("active"), 1);
				$description	= $this->util->value($this->input->post("description"), "");
				if (empty($alias)) {
					$alias = $this->util->slug($description);
				}
				if (empty($id)) {
					$id = $this->m_slide->get_next_value();
				}
				$data = array (
					"title"			=> $title,
					"thumbnail"		=> $thumbnail,
					"link"			=> $link,
					"description"	=> $description,
					"type"			=> 'slide',
					"active"		=> $active
				);
				if (!empty($_FILES['thumbnail']['name'])){
					$data['thumbnail'] = BASE_URL."/files/upload/banner/{$id}/{$this->util->slug($thumbnail[0])}.{$thumbnail[1]}";
				}
				$file_deleted = '';
				if ($action == "add") {
					$this->m_slide->add($data);
					$this->session->set_flashdata("success", "Tạo thành công");
				}
				else if ($action == "edit") {
					$where = array("id" => $id);
					$this->m_slide->update($data, $where);
					$this->session->set_flashdata("success", "Cập nhật thành công");
				}
				$path = "./files/upload/banner/{$id}";
				if (!file_exists($path)) {
					mkdir($path, 0755, true);
				}
				$allow_type = 'gif|jpg|jpeg|png';
				$this->util->upload_file($path,'thumbnail',$file_deleted,$allow_type);

				redirect(site_url("syslog/slide"));
			}
			else if ($task == "cancel") {
				redirect(site_url("syslog/slide"));
			}
			else if ($task == "publish") {
				$ids = $this->util->value($this->input->post("cid"), array());
				foreach ($ids as $id) {
					$data = array("active" => 1);
					$where = array("id" => $id);
					$this->m_slide->update($data, $where);
				}
				redirect(site_url("syslog/slide"));
			}
			else if ($task == "unpublish") {
				$ids = $this->util->value($this->input->post("cid"), array());
				foreach ($ids as $id) {
					$data = array("active" => 0);
					$where = array("id" => $id);
					$this->m_slide->update($data, $where);
				}
				redirect(site_url("syslog/slide"));
			}
			else if ($task == "delete") {
				$ids = $this->util->value($this->input->post("cid"), array());
				foreach ($ids as $id) {
					$where = array("id" => $id);
					$this->m_slide->delete($where);
				}
				$this->session->set_flashdata("success", "Xóa thành công");
				redirect(site_url("syslog/slide"));
			}
		}

		if ($action == "add") {
			$item = $this->m_slide->instance();
			$this->_breadcrumb = array_merge($this->_breadcrumb, array("Tạo slide mới" => site_url("{$this->util->slug($this->router->fetch_class())}/{$this->util->slug($this->router->fetch_method())}/{$action}")));
			
			$view_data = array();
			$view_data["breadcrumb"] = $this->_breadcrumb;
			
			$tmpl_content = array();
			$tmpl_content["content"] = $this->load->view("admin/slide/edit", $view_data, true);
			$this->load->view("layout/admin/main", $tmpl_content);
		}
		else if ($action == "edit") {
			$item = $this->m_slide->load($id);
			$this->_breadcrumb = array_merge($this->_breadcrumb, array("Chỉnh sửa slide" => site_url("{$this->util->slug($this->router->fetch_class())}/{$this->util->slug($this->router->fetch_method())}/{$action}")));

			$view_data = array();
			$view_data["breadcrumb"] 	= $this->_breadcrumb;
			$view_data["item"] 			= $item;

			$tmpl_content = array();
			$tmpl_content["content"] = $this->load->view("admin/slide/edit", $view_data, true);
			$this->load->view("layout/admin/main", $tmpl_content);
		}
		else {

			$total = count($this->m_slide->items());
			$items = $this->m_slide->items(null,null, ADMIN_ROW_PER_PAGE, $offset);

			$pagination = $this->util->pagination(site_url('syslog/slide/'), $total, ADMIN_ROW_PER_PAGE);
			
			$view_data = array();
			$view_data["breadcrumb"] 	= $this->_breadcrumb;
			$view_data["items"] 		= $items;
			$view_data["pagination"] 	= $pagination;
			
			$tmpl_content = array();
			$tmpl_content["content"] = $this->load->view("admin/slide/index", $view_data, true);
			$this->load->view("layout/admin/main", $tmpl_content);
		}
	}
	public function faq_categories ($action=null, $id=null){
		if (!isset($_GET['page']) || (($_GET['page']) < 1) ) {
			$page = 1;
		}
		else {
			$page = $_GET['page'];
		}
		$offset = ($page - 1) * ADMIN_ROW_PER_PAGE;
		$this->_breadcrumb = array_merge($this->_breadcrumb, array("Danh mục hỏi - đáp" => site_url("{$this->util->slug($this->router->fetch_class())}/{$this->util->slug($this->router->fetch_method())}")));
		
		$task = $this->util->value($this->input->post("task"), "");
		if (!empty($task)) {
			if ($task == "save") {
				$name			= $this->util->value($this->input->post("name"), "");
				$alias			= $this->util->value($this->input->post("alias"), "");
				$active			= $this->util->value($this->input->post("active"), 1);
				
				if (empty($alias)) {
					$alias = $this->util->slug($name);
				}
				
				$data = array (
					"name"		=> $name,
					"alias"		=> $alias,
					"active"	=> $active
				);
				
				if ($action == "add") {
					$this->m_faq_categories->add($data);
					$this->session->set_flashdata("success", "Tạo thành công");
				}
				else if ($action == "edit") {
					$where = array("id" => $id);
					$this->m_faq_categories->update($data, $where);
					$this->session->set_flashdata("success", "Cập nhật thành công");
				}
				redirect(site_url("syslog/faq-categories"));
			}
			else if ($task == "cancel") {
				redirect(site_url("syslog/faq-categories"));
			}
			else if ($task == "publish") {
				$ids = $this->util->value($this->input->post("cid"), array());
				foreach ($ids as $id) {
					$data = array("active" => 1);
					$where = array("id" => $id);
					$this->m_faq_categories->update($data, $where);
				}
				redirect(site_url("syslog/faq-categories"));
			}
			else if ($task == "unpublish") {
				$ids = $this->util->value($this->input->post("cid"), array());
				foreach ($ids as $id) {
					$data = array("active" => 0);
					$where = array("id" => $id);
					$this->m_faq_categories->update($data, $where);
				}
				redirect(site_url("syslog/faq-categories"));
			}
			else if ($task == "delete") {
				$ids = $this->util->value($this->input->post("cid"), array());
				foreach ($ids as $id) {
					$where = array("id" => $id);
					$this->m_faq_categories->delete($where);
				}
				$this->session->set_flashdata("success", "Xóa thành công");
				redirect(site_url("syslog/faq-categories"));
			}
		}
		
		if ($action == "add") {
			$this->_breadcrumb = array_merge($this->_breadcrumb, array("Tạo danh mục" => site_url("{$this->util->slug($this->router->fetch_class())}/{$this->util->slug($this->router->fetch_method())}/{$action}")));
			
			$view_data = array();
			$view_data["breadcrumb"] = $this->_breadcrumb;
			$view_data["title"] 	= 'Tạo danh mục';
			
			$tmpl_content = array();
			$tmpl_content["content"] = $this->load->view("admin/faq/category/edit", $view_data, true);
			$this->load->view("layout/admin/main", $tmpl_content);
		}
		else if ($action == "edit") {
			$item = $this->m_faq_categories->load($id);
			$this->_breadcrumb = array_merge($this->_breadcrumb, array("{$item->name}" => site_url("{$this->util->slug($this->router->fetch_class())}/{$this->util->slug($this->router->fetch_method())}/{$action}/{$id}")));
			
			$view_data = array();
			$view_data["breadcrumb"] = $this->_breadcrumb;
			$view_data["item"] = $item;
			$view_data["title"] 	= 'Chỉnh sửa danh mục';
			
			$tmpl_content = array();
			$tmpl_content["content"] = $this->load->view("admin/faq/category/edit", $view_data, true);
			$this->load->view("layout/admin/main", $tmpl_content);
		}
		else {
			$total = count($this->m_faq_categories->items());
			$pagination = $this->util->pagination(site_url("{$this->util->slug($this->router->fetch_class())}/{$this->util->slug($this->router->fetch_method())}"), $total, ADMIN_ROW_PER_PAGE);
			$items = $this->m_faq_categories->items(null,null,ADMIN_ROW_PER_PAGE,$offset);
			
			$view_data = array();
			$view_data["breadcrumb"]	= $this->_breadcrumb;
			$view_data["offset"]		= $offset;
			$view_data["title"]			= 'Danh sách danh mục hỏi - đáp';
			$view_data["pagination"]	= $pagination;
			$view_data["totalitems"]	= sizeof($this->m_faq_categories->items());
			$view_data["items"]			= $items;
			
			$tmpl_content = array();
			$tmpl_content["content"] = $this->load->view("admin/faq/category/index", $view_data, true);
			$this->load->view("layout/admin/main", $tmpl_content);
		}
	}
	public function faq ($category_id, $action=null, $id=null) {
		if (!isset($_GET['page']) || (($_GET['page']) < 1) ) {
				$page = 1;
		}
		else {
				$page = $_GET['page'];
		}
		$offset = ($page - 1) * ADMIN_ROW_PER_PAGE;
		$category = $this->m_faq_categories->load($category_id);

		$this->_breadcrumb = array_merge($this->_breadcrumb, array("Danh mục hỏi - đáp" => site_url("{$this->util->slug($this->router->fetch_class())}/{$this->util->slug($this->router->fetch_method())}")));
		$this->_breadcrumb = array_merge($this->_breadcrumb, array("{$category->name}" => site_url("{$this->util->slug($this->router->fetch_class())}/{$this->util->slug($this->router->fetch_method())}/{$category_id}")));
		
		$task = $this->util->value($this->input->post("task"), "");
		if (!empty($task)) {
			if ($task == "save") {
				$question		= $this->util->value($this->input->post("question"), "");
				$alias_question	= $this->util->value($this->input->post("alias_question"), "");
				$content		= $this->util->value($this->input->post("content"), "");
				$active			= $this->util->value($this->input->post("active"), 1);
				if (empty($alias)) {
					$alias_question = $this->util->slug($question);
				}
				if (empty($id)) {
					$id = $this->m_faq->get_next_value();
				}
				$data = array (
					"question"			=> $question,
					"alias_question"=> $alias_question,
					"content"		=> $content,
					"active"		=> $active,
					"category_id"	=> $category->id,
				);
				
				if ($action == "add") {
					$this->m_faq->add($data);
					$this->session->set_flashdata("success", "Tạo thành công");
				}
				else if ($action == "edit") {
					$where = array("id" => $id);
					$this->m_faq->update($data, $where);
					$this->session->set_flashdata("success", "Cập nhật thành công");
				}
				redirect(site_url("syslog/faq/{$category->alias}"));
			}
			else if ($task == "cancel") {
				redirect(site_url("syslog/faq/{$category->alias}"));
			}
			else if ($task == "publish") {
				$ids = $this->util->value($this->input->post("cid"), array());
				foreach ($ids as $id) {
					$data = array("active" => 1);
					$where = array("id" => $id);
					$this->m_faq->update($data, $where);
				}
				redirect(site_url("syslog/faq/{$category->alias}"));
			}
			else if ($task == "unpublish") {
				$ids = $this->util->value($this->input->post("cid"), array());
				foreach ($ids as $id) {
					$data = array("active" => 0);
					$where = array("id" => $id);
					$this->m_faq->update($data, $where);
				}
				redirect(site_url("syslog/faq/{$category->alias}"));
			}
			else if ($task == "delete") {
				$ids = $this->util->value($this->input->post("cid"), array());
				foreach ($ids as $id) {
					$where = array("id" => $id);
					$this->m_faq->delete($where);
				}
				$this->session->set_flashdata("success", "Xóa thành công");
				redirect(site_url("syslog/faq/{$category->alias}"));
			}
		}
		
		if ($action == "add") {
			$item = $this->m_faq->instance();
			$this->_breadcrumb = array_merge($this->_breadcrumb, array("Tạo mới" => site_url("{$this->util->slug($this->router->fetch_class())}/{$this->util->slug($this->router->fetch_method())}/{$category_id}/{$action}")));
			
			$view_data = array();
			$view_data["breadcrumb"] = $this->_breadcrumb;
			$view_data["item"] = $item;
			$view_data["category"] = $category;
			
			$tmpl_content = array();
			$tmpl_content["content"] = $this->load->view("admin/faq/edit", $view_data, true);
			$this->load->view("layout/admin/main", $tmpl_content);
		}
		else if ($action == "edit") {
			$item = $this->m_faq->load($id);
			$this->_breadcrumb = array_merge($this->_breadcrumb, array("{$item->question}" => site_url("{$this->util->slug($this->router->fetch_class())}/{$this->util->slug($this->router->fetch_method())}/{$category_id}/{$action}/{$id}")));
			
			$arr_time_show = explode(' ', $item->created_date);
			$time_show = explode(':', $arr_time_show[1]);
			$date_show = explode('-', $arr_time_show[0]);

			$view_data = array();
			$view_data["date_time"] = $time_show[0].':'.$time_show[1].' - '.$date_show[2].'/'.$date_show[1].'/'.$date_show[0];
			$view_data["breadcrumb"] = $this->_breadcrumb;
			$view_data["item"] = $item;
			$view_data["category"] = $category;
			
			$tmpl_content = array();
			$tmpl_content["content"] = $this->load->view("admin/faq/edit", $view_data, true);
			$this->load->view("layout/admin/main", $tmpl_content);
		}
		else {
			$info = new stdClass();
			$info->category_id = $category->id;

			$total = count($this->m_faq->items($info, null, null, null));
			$items = $this->m_faq->items($info, null, ADMIN_ROW_PER_PAGE, $offset);

			$pagination = $this->util->pagination(site_url('syslog/faq/'.$category->alias). "?$_SERVER[QUERY_STRING]", $total, ADMIN_ROW_PER_PAGE);
			
			$view_data = array();
			$view_data["breadcrumb"] 	= $this->_breadcrumb;
			$view_data["offset"]		= $offset;
			$view_data["pagination"]	= $pagination;
			$view_data["totalitems"]	= sizeof($this->m_faq->items($info));
			$view_data["items"]			= $items;
			$view_data["category"]		= $category;
			
			$tmpl_content = array();
			$tmpl_content["content"] = $this->load->view("admin/faq/index", $view_data, true);
			$this->load->view("layout/admin/main", $tmpl_content);
		}
	}
	//------------------------------------------------------------------------------
	// news
	//------------------------------------------------------------------------------
	public function new_categories ($action=null, $id=null){
		$config_row_page = ADMIN_ROW_PER_PAGE;
		$pagi		= (isset($_GET["pagi"]) ? $_GET["pagi"] : $config_row_page);
		if (!isset($_GET['page']) || (($_GET['page']) < 1) ) {
			$page = 1;
		}
		else {
			$page = $_GET['page'];
		}
		$offset = ($page - 1) * $pagi;
		$this->_breadcrumb = array_merge($this->_breadcrumb, array("Danh mục tin tức & sự kiện" => site_url("{$this->util->slug($this->router->fetch_class())}/{$this->util->slug($this->router->fetch_method())}")));
		
		$task = $this->util->value($this->input->post("task"), "");
		if (!empty($task)) {
			if ($task == "save") {
				$name			= $this->util->value($this->input->post("name"), "");
				$alias			= $this->util->value($this->input->post("alias"), "");
				$active			= $this->util->value($this->input->post("active"), 1);
				
				if (empty($alias)) {
					$alias = $this->util->slug($name);
				}
				
				$data = array (
					"name"		=> $name,
					"alias"		=> $alias,
					"active"	=> $active
				);
				
				if ($action == "add") {
					$this->m_content_categories->add($data);
					$this->session->set_flashdata("success", "Tạo thành công");
				}
				else if ($action == "edit") {
					$where = array("id" => $id);
					$this->m_content_categories->update($data, $where);
					$this->session->set_flashdata("success", "Cập nhật thành công");
				}
				redirect(site_url("syslog/new-categories"));
			}
			else if ($task == "cancel") {
				redirect(site_url("syslog/new-categories"));
			}
			else if ($task == "publish") {
				$ids = $this->util->value($this->input->post("cid"), array());
				foreach ($ids as $id) {
					$data = array("active" => 1);
					$where = array("id" => $id);
					$this->m_content_categories->update($data, $where);
				}
				redirect(site_url("syslog/new-categories"));
			}
			else if ($task == "unpublish") {
				$ids = $this->util->value($this->input->post("cid"), array());
				foreach ($ids as $id) {
					$data = array("active" => 0);
					$where = array("id" => $id);
					$this->m_content_categories->update($data, $where);
				}
				redirect(site_url("syslog/new-categories"));
			}
			else if ($task == "delete") {
				$ids = $this->util->value($this->input->post("cid"), array());
				foreach ($ids as $id) {
					$where = array("id" => $id);
					$this->m_content_categories->delete($where);
				}
				$this->session->set_flashdata("success", "Xóa thành công");
				redirect(site_url("syslog/new-categories"));
			}
		}
		
		if ($action == "add") {
			$this->_breadcrumb = array_merge($this->_breadcrumb, array("Tạo danh mục" => site_url("{$this->util->slug($this->router->fetch_class())}/{$this->util->slug($this->router->fetch_method())}/{$action}")));
			
			$view_data = array();
			$view_data["breadcrumb"] = $this->_breadcrumb;
			
			$tmpl_content = array();
			$tmpl_content["content"] = $this->load->view("admin/content/category/edit", $view_data, true);
			$this->load->view("layout/admin/main", $tmpl_content);
		}
		else if ($action == "edit") {
			$item = $this->m_content_categories->load($id);
			$this->_breadcrumb = array_merge($this->_breadcrumb, array("{$item->name}" => site_url("{$this->util->slug($this->router->fetch_class())}/{$this->util->slug($this->router->fetch_method())}/{$action}/{$id}")));
			
			$view_data = array();
			$view_data["breadcrumb"] = $this->_breadcrumb;
			$view_data["item"] = $item;
			
			$tmpl_content = array();
			$tmpl_content["content"] = $this->load->view("admin/content/category/edit", $view_data, true);
			$this->load->view("layout/admin/main", $tmpl_content);
		}
		else {
			$total = count($this->m_content_categories->items());
			if (!isset($_GET['pagi'])){
				$pagination = $this->util->pagination(site_url("{$this->util->slug($this->router->fetch_class())}/{$this->util->slug($this->router->fetch_method())}"). "?pagi=$config_row_page"."$_SERVER[QUERY_STRING]", $total, $pagi);
			}else{
				$pagination = $this->util->pagination(site_url("{$this->util->slug($this->router->fetch_class())}/{$this->util->slug($this->router->fetch_method())}"). "?$_SERVER[QUERY_STRING]", $total, $pagi);
			}
			$items = $this->m_content_categories->items(null,null,$pagi,$offset);
			
			$view_data = array();
			$view_data["breadcrumb"]	= $this->_breadcrumb;
			$view_data["offset"]		= $offset;
			$view_data["title"]			= 'Danh sách danh mục tin tức & sự kiện';
			$view_data["pagination"]	= $pagination;
			$view_data["totalitems"]	= sizeof($this->m_content_categories->items());
			$view_data["items"]			= $items;
			
			$tmpl_content = array();
			$tmpl_content["content"] = $this->load->view("admin/content/category/index", $view_data, true);
			$this->load->view("layout/admin/main", $tmpl_content);
		}
	}
	public function news ($category_id, $action=null, $id=null) {
		$config_row_page = ADMIN_ROW_PER_PAGE;
		$pagi		= (isset($_GET["pagi"]) ? $_GET["pagi"] : $config_row_page);
		if (!isset($_GET['page']) || (($_GET['page']) < 1) ) {
				$page = 1;
		}
		else {
				$page = $_GET['page'];
		}
		$offset = ($page - 1) * $pagi;
		$category = $this->m_content_categories->load($category_id);

		$this->_breadcrumb = array_merge($this->_breadcrumb, array("Danh mục tin tức & sự kiện" => site_url("{$this->util->slug($this->router->fetch_class())}/product-categories")));
		$this->_breadcrumb = array_merge($this->_breadcrumb, array("{$category->name}" => site_url("{$this->util->slug($this->router->fetch_class())}/{$this->util->slug($this->router->fetch_method())}/{$category_id}")));
		
		$task = $this->util->value($this->input->post("task"), "");
		if (!empty($task)) {
			if ($task == "save") {
				$title			= $this->util->value($this->input->post("title"), "");
				$alias			= $this->util->value($this->input->post("alias"), "");
				$thumbnail 		= !empty($_FILES['thumbnail']['name']) ? explode('.',$_FILES['thumbnail']['name']) : $this->m_contents->load($id)->thumbnail;
				$description	= $this->util->value($this->input->post("description"), "");
				$content		= $this->util->value($this->input->post("content"), "");
				$active			= $this->util->value($this->input->post("active"), 1);
				if (empty($alias)) {
					$alias = $this->util->slug($title);
				}
				if (empty($id)) {
					$id = $this->m_contents->get_next_value();
				}
				$data = array (
					"title"			=> $title,
					"alias"			=> $alias,
					"thumbnail"		=> $thumbnail,
					"description"	=> $description,
					"content"		=> $content,
					"active"		=> $active,
					"category_id"	=> $category->id,
				);
				if (!empty($_FILES['thumbnail']['name'])){
					$data['thumbnail'] = BASE_URL."/files/upload/image/new/{$this->util->slug($thumbnail[0])}.{$thumbnail[1]}";
				}
				$file_deleted = '';
				if ($action == "add") {
					$this->m_contents->add($data);
					$this->session->set_flashdata("success", "Tạo thành công");
				}
				else if ($action == "edit") {
					$where = array("id" => $id);
					$this->m_contents->update($data, $where);
					$this->session->set_flashdata("success", "Cập nhật thành công");
				}
				$path = "./files/upload/image/new";
				$allow_type = 'gif|jpg|jpeg|png';
				$this->util->upload_file($path,'thumbnail',$file_deleted,$allow_type);
				redirect(site_url("syslog/news/{$category->alias}"));
			}
			else if ($task == "cancel") {
				redirect(site_url("syslog/news/{$category->alias}"));
			}
			else if ($task == "publish") {
				$ids = $this->util->value($this->input->post("cid"), array());
				foreach ($ids as $id) {
					$data = array("active" => 1);
					$where = array("id" => $id);
					$this->m_contents->update($data, $where);
				}
				redirect(site_url("syslog/news/{$category->alias}"));
			}
			else if ($task == "unpublish") {
				$ids = $this->util->value($this->input->post("cid"), array());
				foreach ($ids as $id) {
					$data = array("active" => 0);
					$where = array("id" => $id);
					$this->m_contents->update($data, $where);
				}
				redirect(site_url("syslog/news/{$category->alias}"));
			}
			else if ($task == "delete") {
				$ids = $this->util->value($this->input->post("cid"), array());
				foreach ($ids as $id) {
					$where = array("id" => $id);
					$this->m_contents->delete($where);
				}
				$this->session->set_flashdata("success", "Xóa thành công");
				redirect(site_url("syslog/news/{$category->alias}"));
			}
		}
		
		if ($action == "add") {
			$item = $this->m_contents->instance();
			$this->_breadcrumb = array_merge($this->_breadcrumb, array("Tạo mới" => site_url("{$this->util->slug($this->router->fetch_class())}/{$this->util->slug($this->router->fetch_method())}/{$category_id}/{$action}")));
			
			$view_data = array();
			$view_data["breadcrumb"] = $this->_breadcrumb;
			$view_data["item"] = $item;
			$view_data["category"] = $category;
			
			$tmpl_content = array();
			$tmpl_content["content"] = $this->load->view("admin/content/edit", $view_data, true);
			$this->load->view("layout/admin/main", $tmpl_content);
		}
		else if ($action == "edit") {
			$item = $this->m_contents->load($id);
			$this->_breadcrumb = array_merge($this->_breadcrumb, array("{$item->title}" => site_url("{$this->util->slug($this->router->fetch_class())}/{$this->util->slug($this->router->fetch_method())}/{$category_id}/{$action}/{$id}")));
			
			$arr_time_show = explode(' ', $item->created_date);
			$time_show = explode(':', $arr_time_show[1]);
			$date_show = explode('-', $arr_time_show[0]);

			$view_data = array();
			$view_data["date_time"] = $time_show[0].':'.$time_show[1].' - '.$date_show[2].'/'.$date_show[1].'/'.$date_show[0];
			$view_data["breadcrumb"] = $this->_breadcrumb;
			$view_data["item"] = $item;
			$view_data["category"] = $category;
			
			$tmpl_content = array();
			$tmpl_content["content"] = $this->load->view("admin/content/edit", $view_data, true);
			$this->load->view("layout/admin/main", $tmpl_content);
		}
		else {
			$info = new stdClass();
			$info->category_id = $category->id;

			$total = count($this->m_contents->items($info, null, null, null));
			$items = $this->m_contents->items($info, null, $pagi, $offset);
			if (!isset($_GET['pagi'])){
				$pagination = $this->util->pagination(site_url('syslog/news/'.$category->alias). "?pagi=$config_row_page"."$_SERVER[QUERY_STRING]", $total, $pagi);
			}else{
				$pagination = $this->util->pagination(site_url('syslog/news/'.$category->alias). "?$_SERVER[QUERY_STRING]", $total, $pagi);
			}

			
			$view_data = array();
			$view_data["breadcrumb"] 	= $this->_breadcrumb;
			$view_data["offset"]		= $offset;
			$view_data["pagination"]	= $pagination;
			$view_data["totalitems"]	= sizeof($this->m_contents->items($info));
			$view_data["items"]			= $items;
			$view_data["pagi"]			= $pagi;
			$view_data["category"]		= $category;
			
			$tmpl_content = array();
			$tmpl_content["content"] = $this->load->view("admin/content/index", $view_data, true);
			$this->load->view("layout/admin/main", $tmpl_content);
		}
	}
	public function contact ($id=null) {
		if (!isset($_GET['page']) || (($_GET['page']) < 1) ) {
				$page = 1;
		}
		else {
				$page = $_GET['page'];
		}
		$offset = ($page - 1) * ADMIN_ROW_PER_PAGE;
		$this->_breadcrumb = array_merge($this->_breadcrumb, array("Liên hệ" => site_url("{$this->util->slug($this->router->fetch_class())}/{$this->util->slug($this->router->fetch_method())}")));
		$task = $this->util->value($this->input->post("task"), "");
		if (!empty($task)) {
			if ($task == 'delete') {
				$ids = $this->util->value($this->input->post("cid"), array());
				foreach ($ids as $id) {
					$where = array("id" => $id);
					$this->m_contact->delete($where);
				}
				$this->session->set_flashdata("success", "Xóa thành công");
			}
			redirect(site_url("syslog/contact"));
		}
		if (!empty($id)) {
			$item = $this->m_contact->load($id);
			$this->_breadcrumb = array_merge($this->_breadcrumb, array("{$item->name}" => site_url("{$this->util->slug($this->router->fetch_class())}/{$this->util->slug($this->router->fetch_method())}/{$id}")));
			
			$view_data = array();
			$view_data["breadcrumb"] 	= $this->_breadcrumb;
			$view_data["item"]			= $item;
			
			$tmpl_content = array();
			$tmpl_content["content"] = $this->load->view("admin/contact/edit", $view_data, true);
			$this->load->view("layout/admin/main", $tmpl_content);
		} else {
			$total = count($this->m_contact->items());
			$items = $this->m_contact->items(null, ADMIN_ROW_PER_PAGE, $offset);

			$pagination = $this->util->pagination(site_url('syslog/contact'), $total, ADMIN_ROW_PER_PAGE);
			
			$view_data = array();
			$view_data["breadcrumb"] 	= $this->_breadcrumb;
			$view_data["offset"]		= $offset;
			$view_data["pagination"]	= $pagination;
			$view_data["items"]			= $items;
			
			$tmpl_content = array();
			$tmpl_content["content"] = $this->load->view("admin/contact/index", $view_data, true);
			$this->load->view("layout/admin/main", $tmpl_content);
		}
	}
	public function partner ($action=null, $id=null) {
		if (!isset($_GET['page']) || (($_GET['page']) < 1) ) {
				$page = 1;
		}
		else {
				$page = $_GET['page'];
		}
		$offset = ($page - 1) * ADMIN_ROW_PER_PAGE;

		$this->_breadcrumb = array_merge($this->_breadcrumb, array("Banner đối tác" => site_url("{$this->util->slug($this->router->fetch_class())}/{$this->util->slug($this->router->fetch_method())}")));
		
		$task = $this->util->value($this->input->post("task"), "");
		if (!empty($task)) {
			if ($task == "save") {
				$name		= $this->util->value($this->input->post("name"), "");
				$url	= $this->util->value($this->input->post("url"), "");
				$banner 		= !empty($_FILES['banner']['name']) ? explode('.',$_FILES['banner']['name']) : $this->m_partner->load($id)->banner;
				$active			= $this->util->value($this->input->post("active"), 1);

				$data = array (
					"name"			=> $name,
					"url"			=> $url,
					"banner"		=> $banner,
					"active"		=> $active,
				);
				if (!empty($_FILES['banner']['name'])){
					$data['banner'] = BASE_URL."/files/upload/image/new/{$this->util->slug($banner[0])}.{$banner[1]}";
				}
				$file_deleted = '';
				if ($action == "add") {
					$this->m_partner->add($data);
					$this->session->set_flashdata("success", "Tạo thành công");
				}
				else if ($action == "edit") {
					$where = array("id" => $id);
					$this->m_partner->update($data, $where);
					$this->session->set_flashdata("success", "Cập nhật thành công");
				}
				$path = "./files/upload/image/new";
				if (!file_exists($path)) {
					mkdir($path, 0755, true);
				}
				$allow_type = 'gif|jpg|jpeg|png';
				$this->util->upload_file($path,'banner',$file_deleted,$allow_type);
				redirect(site_url("syslog/partner"));
			}
			else if ($task == "cancel") {
				redirect(site_url("syslog/partner"));
			}
			else if ($task == "publish") {
				$ids = $this->util->value($this->input->post("cid"), array());
				foreach ($ids as $id) {
					$data = array("active" => 1);
					$where = array("id" => $id);
					$this->m_partner->update($data, $where);
				}
				redirect(site_url("syslog/partner"));
			}
			else if ($task == "unpublish") {
				$ids = $this->util->value($this->input->post("cid"), array());
				foreach ($ids as $id) {
					$data = array("active" => 0);
					$where = array("id" => $id);
					$this->m_partner->update($data, $where);
				}
				redirect(site_url("syslog/partner"));
			}
			else if ($task == "delete") {
				$ids = $this->util->value($this->input->post("cid"), array());
				foreach ($ids as $id) {
					$where = array("id" => $id);
					$this->m_partner->delete($where);
				}
				$this->session->set_flashdata("success", "Xóa thành công");
				redirect(site_url("syslog/partner"));
			}
		}
		
		if ($action == "add") {
			$item = $this->m_partner->instance();
			$this->_breadcrumb = array_merge($this->_breadcrumb, array("Tạo mới" => site_url("{$this->util->slug($this->router->fetch_class())}/{$this->util->slug($this->router->fetch_method())}/{$action}")));
			
			$view_data = array();
			$view_data["breadcrumb"] = $this->_breadcrumb;
			$view_data["item"] = $item;
			$view_data["category"] = $category;
			
			$tmpl_content = array();
			$tmpl_content["content"] = $this->load->view("admin/partner/edit", $view_data, true);
			$this->load->view("layout/admin/main", $tmpl_content);
		}
		else if ($action == "edit") {
			$item = $this->m_partner->load($id);
			$this->_breadcrumb = array_merge($this->_breadcrumb, array("{$item->question}" => site_url("{$this->util->slug($this->router->fetch_class())}/{$this->util->slug($this->router->fetch_method())}/{$action}/{$id}")));
			$view_data = array();
			$view_data["breadcrumb"] = $this->_breadcrumb;
			$view_data["item"] = $item;
			$view_data["category"] = $category;
			
			$tmpl_content = array();
			$tmpl_content["content"] = $this->load->view("admin/partner/edit", $view_data, true);
			$this->load->view("layout/admin/main", $tmpl_content);
		}
		else {
			$info = new stdClass();
			$info->category_id = $category->id;

			$total = count($this->m_partner->items($info, null, null, null));
			$items = $this->m_partner->items($info, null, ADMIN_ROW_PER_PAGE, $offset);

			$pagination = $this->util->pagination(site_url('syslog/partner/'.$category->alias). "?$_SERVER[QUERY_STRING]", $total, ADMIN_ROW_PER_PAGE);
			
			$view_data = array();
			$view_data["breadcrumb"] 	= $this->_breadcrumb;
			$view_data["offset"]		= $offset;
			$view_data["pagination"]	= $pagination;
			$view_data["totalitems"]	= sizeof($this->m_faq->items($info));
			$view_data["items"]			= $items;
			$view_data["category"]		= $category;
			
			$tmpl_content = array();
			$tmpl_content["content"] = $this->load->view("admin/partner/index", $view_data, true);
			$this->load->view("layout/admin/main", $tmpl_content);
		}
	}
}

?>