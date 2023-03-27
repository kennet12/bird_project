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
		
		$this->_breadcrumb = array_merge($this->_breadcrumb, [
			"Quản trị" => site_url($this->util->slug($this->router->fetch_class()))
		]);
	}
	
	public function index()
	{
		$view_data = array();
		$view_data["breadcrumb"] = $this->_breadcrumb;
		$view_data["title"] = 'Quản trị';
		
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
					$this->session->set_flashdata("error", "Email hoặc password sai.");
					redirect(site_url("syslog/login"), "back");
				} else {
					$this->session->set_flashdata("success", "Đăng nhập thành công");
					redirect(site_url("syslog"));
				}
			} else {
				$this->session->set_flashdata("error", "Agent ID không hợp lệ.");
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
	public function users($action = null , $id = null){
		$this->_breadcrumb = array_merge($this->_breadcrumb, [
			"Thành viên" => site_url("{$this->util->slug($this->router->fetch_class())}/{$this->util->slug($this->router->fetch_method())}")
		]);
		if(!empty($action)){

			if (!empty($_POST)) {
				if(!$this->edit_user_role($id)) {
					$this->session->set_flashdata("error", "Bạn không có quyền cho thao tác này.");
					redirect(site_url("syslog/users"), "back");
				}

				$data = [];
				$data['fullname'] 	= $_POST['fullname'];
				$data['phone'] 		= $_POST['phone'];
				$data['address'] 	= $_POST['address'];
				$data['gender'] 	= $_POST['gender'];
				$data['active'] 	= $_POST['active'];

				if (empty($_POST['fullname'])) {
					$this->session->set_flashdata("error", "Vui lòng nhập tên.");
					redirect(site_url("syslog/users"), "back");
				}

				if (empty($_POST['phone'])) {
					$this->session->set_flashdata("error", "Vui lòng nhập số điện thoại.");
					redirect(site_url("syslog/users"), "back");
				} else {
					$info = new stdClass();
					$info->phone = $_POST['phone'];
					$get_phone = $this->m_user->users($info);

					if ($this->m_user->load($id)->phone != $_POST['phone'] && !empty($get_phone)) {
						$this->session->set_flashdata("error", "Số điện thoai đã bị trùng vui lòng nhập lại.");
						redirect(site_url("syslog/users"), "back");
					}	
				}

				if (!empty($_FILES['avatar']['name'])){
					$path = "./files/upload/image/user/{$id}";
					if (!file_exists($path)) {
						mkdir($path, 0755, true);
					}
					// code tao thư mục

					$allow_type = 'jpg|jpeg|png';
					$this->util->upload_file($path,'avatar','',$allow_type);
					// upload ảnh lên server 

					$avatar = explode('.',$_FILES['avatar']['name']);
					$data['avatar'] = $path."/{$this->util->slug($avatar[0])}.{$avatar[1]}";
					// add url hinh ảnh vào database
				}

				if ($action == 'edit') {
					$this->session->set_flashdata("success", "Cập nhật thành công");
					$this->m_user->update($data, ['id' => $id]);
				}
				
				redirect(site_url("syslog/users"), "back");
			}
			
			if($action == 'edit'){
				if(!$this->edit_user_role($id)) {
					$this->session->set_flashdata("error", "Bạn không có quyền cho thao tác này.");
					redirect(site_url("syslog/users"), "back");
				}

				$this->_breadcrumb = array_merge($this->_breadcrumb, [
					"Chỉnh sửa" => site_url("{$this->util->slug($this->router->fetch_class())}/{$this->util->slug($this->router->fetch_method())}/{$action}/{$id}")
				]);

				$view_data = array();
				$view_data["breadcrumb"] = $this->_breadcrumb;
				$view_data['user'] = $this->m_user->load($id);
				$view_data['title'] = 'Chỉnh Sửa User';

				$tmpl_content = array();
				$tmpl_content["content"] = $this->load->view("admin/account/edit", $view_data, true);
				$this->load->view("layout/admin/main", $tmpl_content);
			}
			else if ($action == 'delete') {
				if(!$this->edit_user_role($id)) {
					$this->session->set_flashdata("error", "Bạn không có quyền cho thao tác này.");
					redirect(site_url("syslog/users"), "back");
				}

				$this->m_user->remove(['id' => $id]);
				$this->session->set_flashdata("success", "Xóa thành công");
				redirect(site_url("syslog/users"), "back");
			}
		} 
		else 
		{
			$info = new stdClass();
			$info->search = !empty($_GET['search'])?$_GET['search']:'';

			$users = $this->m_user->users($info);
			$view_data = array();	
			$view_data["users"] = $users;
			$view_data["search"] = !empty($_GET['search'])?$_GET['search']:'';
			$view_data["breadcrumb"] = $this->_breadcrumb;
			$view_data["title"] = 'Danh sách thành viên';
			
			$tmpl_content = array();
			$tmpl_content["content"] = $this->load->view("admin/account/index", $view_data, true);
			$this->load->view("layout/admin/main", $tmpl_content);
		}
	}

	public function edit_user_role ($user_id) {
		$admin = $this->session->userdata('admin');
		$user = $this->m_user->load($user_id);

		if ($admin->user_type < $user->user_type ||
			$admin->id == $user->id) {
			return true;
		}
		return false;
	}
	//------------------------------------------------------------------------------
	// contents
	//------------------------------------------------------------------------------

	public function contents($action=null, $id=null){
		$this->_breadcrumb = array_merge($this->_breadcrumb, [
			"Danh Sách Tin Tức" => site_url("{$this->util->slug($this->router->fetch_class())}/{$this->util->slug($this->router->fetch_method())}")
		]);
		if (!empty($action)) {
			$categories = $this->m_content_categories->items(null,1);
			if (
				$action == 'edit' && empty($id) ||
				$action == 'add' && !empty($id) ||
				!in_array($action, ['edit','add','delete']) ||
				$action == 'edit' && empty($this->m_contents->load($id))
			)
			{
				redirect("error404", "location");
			}
			if (!empty($_POST)) {
				$data = [];
				$data['title'] 			= $_POST['title'];
				$data['alias'] 			= !empty($_POST['alias'])?$_POST['alias']:$this->util->slug($_POST['title']);
				$data['category_id'] 	= $_POST['category_id'];
				$data['description'] 	= $_POST['description'];
				$data['active'] 		= $_POST['active'];
				$data['content'] 		= $_POST['content']; 

				$count_image = count($_FILES);
				
				$id = !empty($id) ? $id : $this->m_contents->get_next_value();
				// xoa hinh anh cu~
				for ($i=0; $i < $count_image; $i++) {
					if ($_POST["type_edit_{$i}"] == 1) {
						$this->m_content_gallery->remove([
							'content_id' => $id,
							'stt' => $i
						]);
					}
				}
				for ($i=0; $i < $count_image; $i++) { 
					if (!empty($_FILES["thumbnail_{$i}"]['name'])) {
						$path = "./files/upload/image/content/{$id}";
						if (!file_exists($path)) {
							mkdir($path, 0755, true);
						}
						// code tao thư mục
						$allow_type = 'jpg|jpeg|png';
						$this->util->upload_file($path,"thumbnail_{$i}",'',$allow_type);
						// upload ảnh lên server
	
						$thumbnail = explode('.',$_FILES["thumbnail_{$i}"]['name']);

						$data_gallery = [];
						$data_gallery['content_id'] = $id;		
						$data_gallery['stt'] = $i;
						$data_gallery["thumbnail"] = str_replace('./','/',$path)."/{$this->util->slug($thumbnail[0])}.{$thumbnail[1]}";

						$this->m_content_gallery->add($data_gallery);
					}
				}
				
				if(empty($_POST['title'])){
					$this->session->set_flashdata("error", "Ban vui lòng đặt tiêu đề bài viết");
					redirect(site_url("syslog/contents"), "back");
				}
				
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
				$this->_breadcrumb = array_merge($this->_breadcrumb, [
					"Thêm" => site_url("{$this->util->slug($this->router->fetch_class())}/{$this->util->slug($this->router->fetch_method())}/{$action}")
				]);
				$view_data = array();
				$view_data['breadcrumb'] = $this->_breadcrumb;
				$view_data["categories"] = $categories;
				$view_data["title"] = 'Thêm tin tức';
	
				$tmpl_content = array();
				$tmpl_content["content"] = $this->load->view("admin/content/edit", $view_data, true);
				$this->load->view("layout/admin/main", $tmpl_content);

			} else if ($action == 'edit') {
				$this->_breadcrumb = array_merge($this->_breadcrumb, [
					"Sửa" => site_url("{$this->util->slug($this->router->fetch_class())}/{$this->util->slug($this->router->fetch_method())}/{$action}/{$id}")
				]);
				$item = $this->m_contents->load($id);
				$view_data = array();
				$view_data['breadcrumb'] = $this->_breadcrumb;
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
			$config_row_page = ADMIN_ROW_PER_PAGE;// số item trong 1 trang
			$page_num		= isset($_GET["page_num"]) ? $_GET["page_num"] : $config_row_page;
			if (!isset($_GET['page']) || (($_GET['page']) < 1) ) {
				$page = 1;
			}
			else {
				$page = $_GET['page'];
			}
			$offset = ($page - 1) * $page_num;

			$total = count($this->m_contents->items());

			$pagination = $this->util->pagination(
				site_url("{$this->util->slug($this->router->fetch_class())}/{$this->util->slug($this->router->fetch_method())}"). "?$_SERVER[QUERY_STRING]",
				$total,
				$page_num
			);
			$info = new stdClass();
			$info->search = !empty($_GET['search'])?$_GET['search']:'';

			$contents = $this->m_contents->items($info, null, $page_num, $offset);

			foreach($contents as $content){
				$info = new stdClass;
				$info->content_id = $content->id;
				$gallery = $this->m_content_gallery->items($info, null , null ,'stt','ASC');

				 $content->updated_by = $this->m_user->load($content->updated_by);
				$content->content_category = $this->m_content_categories->load($content->category_id);
				$content->image = !empty($gallery[0]->thumbnail) ? $gallery[0]->thumbnail : null;
			}
			
			$view_data = array();
			$view_data['search'] = !empty($_GET['search'])?$_GET['search']:'';
			$view_data['breadcrumb'] = $this->_breadcrumb;
			$view_data["contents"] = $contents;
			$view_data["title"] = 'Danh sách tin tức';
			$view_data["offset"]		= $offset;
			$view_data["pagination"]	= $pagination;

			$tmpl_content = array();
			$tmpl_content["content"] = $this->load->view("admin/content/index", $view_data, true);
			$this->load->view("layout/admin/main", $tmpl_content);
		}
	}
	public function content_category($action=null, $id=null)
	{
		$this->_breadcrumb = array_merge($this->_breadcrumb, [
			"Danh Mục Tin Tức" => site_url("{$this->util->slug($this->router->fetch_class())}/{$this->util->slug($this->router->fetch_method())}")
		]);
		
		if(!empty($action))
		{
			// kiểm tra trang
			// if (
			// 	$action == 'edit' && empty($id) ||
			// 	$action == 'add' && !empty($id) ||
			// 	!in_array($action, ['edit','add','delete']) ||
			// 	$action == 'edit' && empty($this->m_content_categories->load($id))
			// ) {
			// 	redirect("error404", "location");
			// }
			
			if(!empty($_POST))
			{
				
				$data=[];
				$data['name']=$_POST['title'];
				$data['active']=$_POST['active'];
				$data ['alias']=  !empty($_POST['alias'])?$_POST['alias']:$this->util->slug($_POST['title']);
				
				if (empty($_POST['title'])) {
					$this->session->set_flashdata("error", "Vui lòng nhập tiêu đề tin tức");
					redirect(site_url("syslog/content_category"), "back");
				}

				
				
				if ($action == "add") {
				
					$this->m_content_categories->add($data);
			
					$this->session->set_flashdata("success", "Thêm thành công");
				}

				if($action=='edit')
				{
					$this->m_content_categories->update($data,['id'=>$id]);
					$this->session->set_flashdata("success", "Cập nhật thành công");

				}
				redirect(site_url("syslog/content_category"), "back");

			}
			
			if($action =='add')
			{
				$this->_breadcrumb = array_merge($this->_breadcrumb, [
					"Thêm" => site_url("{$this->util->slug($this->router->fetch_class())}/{$this->util->slug($this->router->fetch_method())}/{$action}/{$id}")
				]);	
				$view_data = array();
				$view_data["breadcrumb"] = $this->_breadcrumb;
				$view_data["title"] = 'Thêm Danh Mục';

				$tmpl_content_categories = array();
				$tmpl_content_categories["content"] = $this->load->view("admin/content/category/edit", $view_data, true);
				$this->load->view("layout/admin/main", $tmpl_content_categories);
			}
			else if($action =='edit')
			{
				$this->_breadcrumb = array_merge($this->_breadcrumb, [
					"Sửa" => site_url("{$this->util->slug($this->router->fetch_class())}/{$this->util->slug($this->router->fetch_method())}/{$action}/{$id}")
				]);
				$content_category = $this->m_content_categories->load($id);
				
				$view_data = array();
				$view_data["breadcrumb"] = $this->_breadcrumb;
				$view_data["title"] = 'Cập Nhật Danh Mục';
				$view_data["content_category"] = $content_category;


				$tmpl_content_categories = array();
				$tmpl_content_categories["content"] = $this->load->view("admin/content/category/edit", $view_data, true);
				$this->load->view("layout/admin/main", $tmpl_content_categories);
			}
			else if($action=='delete'){

				$this->m_content_categories->remove(['id' => $id]);
				$this->session->set_flashdata("success", "Xóa thành công");
				redirect(site_url("syslog/content_category"), "back");

			}
			
		}
		else{
			$config_row_page = ADMIN_ROW_PER_PAGE;// số item trong 1 trang
			$page_num		= isset($_GET["page_num"]) ? $_GET["page_num"] : $config_row_page;
			if (!isset($_GET['page']) || (($_GET['page']) < 1) ) {
				$page = 1;
			}
			else {
				$page = $_GET['page'];
			}
			$offset = ($page - 1) * $page_num;

			$total = count($this->m_content_categories->items());

			$pagination = $this->util->pagination(
				site_url("{$this->util->slug($this->router->fetch_class())}/{$this->util->slug($this->router->fetch_method())}"). "?$_SERVER[QUERY_STRING]",
				$total,
				$page_num
			);
			// tìm kiếm
			$info = new stdClass();
			$info->search = !empty($_GET['search'])?$_GET['search']:'';

			$content_category = $this->m_content_categories->items($info, null, $page_num, $offset);
			// thêm ngày tháng , tên người sửa
				// lấy đúng giá trị của dong của ID
				foreach($content_category as $categories) {
					$info = new stdClass();
					$info->updated_by = $categories->id;
					$categories->updated_by = $this->m_user->load($categories->updated_by);
					
				}
			
			$view_data = array();
			$view_data["content_category"] 	= $content_category;
			$view_data['search'] 			=!empty($_GET['search'])?$_GET['search']:'';
			$view_data["offset"]			= $offset;
			$view_data["breadcrumb"] 		= $this->_breadcrumb;
			$view_data["pagination"]		= $pagination;
			$view_data["title"] 			= 'Danh mục tin tức';

			$tmpl_content_categories = array();
			$tmpl_content_categories["content"] = $this->load->view("admin/content/category/index", $view_data, true);
			$this->load->view("layout/admin/main", $tmpl_content_categories);
		}
	}

	public function faq($action=null,$id=null){
		$this->_breadcrumb = array_merge($this->_breadcrumb, [
			"Danh Mục" => site_url("{$this->util->slug($this->router->fetch_class())}/{$this->util->slug($this->router->fetch_method())}")
		]);
		if(!empty($action)){
			$categories = $this->m_faq_categories->items(null,1);	
			if(!empty($_POST)){
				$data = [];
				$data['question'] = $_POST['question'];
				$data['alias_question'] = !empty($_POST['alias_question'])?$_POST['alias_question']:$this->util->slug($_POST['question']);
				$data['active'] = $_POST['active'];
				$data['content'] = $_POST['content'];
				$data['category_id'] = $_POST['category_id'];

				if(empty($_POST['question'])){
					$this->session->set_Flashdata("error", "Vui Lòng Nhập Câu Hỏi");
					redirect(site_url("syslog/faq") , "back");
				}
				if(empty($_POST['content'])){
					$this->session->set_Flashdata("error", "Vui Lòng Nhập Câu Trả Lời");
					redirect(site_url("syslog/faq") , "back");
				}

				if ($action == 'add') {
					$this->session->set_flashdata("success", "Thêm thành công");
					$this->m_faq->add($data);
				} else if ($action == 'edit') {
					$this->session->set_flashdata("success", "Sửa thành công");
					$this->m_faq->update($data, ['id' => $id]);
				}
				redirect(site_url("syslog/faq"), "back");
				
			}
			if($action == 'add'){
				$this->_breadcrumb = array_merge($this->_breadcrumb, [
					"Thêm" => site_url("{$this->util->slug($this->router->fetch_class())}/{$this->util->slug($this->router->fetch_method())}/{$action}")
				]);
				$item = $this->m_faq->items();
				$view_data = array();
				$view_data["categories"] = $categories;
				$view_data['item']= $item;
				$view_data['title'] = 'Thêm Câu Hỏi';
				$view_data['breadcrumb']=$this->_breadcrumb;
				
				$tmpl_faq = array();
				$tmpl_faq['content'] = $this->load->view("admin/faq/edit",$view_data,true);
				$this->load->view('layout/admin/main',$tmpl_faq);	
			}
			else if($action == "edit"){
				$this->_breadcrumb = array_merge($this->_breadcrumb, [
					"Sửa" => site_url("{$this->util->slug($this->router->fetch_class())}/{$this->util->slug($this->router->fetch_method())}/{$action}/{$id}")
				]);
				$item = $this->m_faq->load($id);
				$view_data = array();
				$view_data['item']= $item;
				$view_data["categories"] = $categories;
				$view_data['breadcrumb']=$this->_breadcrumb;
				$view_data['title'] = 'Chinh Sửa Câu Hỏi';
				
				$tmpl_faq = array();
				$tmpl_faq['content'] = $this->load->view("admin/faq/edit",$view_data,true);
				$this->load->view('layout/admin/main',$tmpl_faq);
			}
			else if($action == 'delete'){
				$this->m_faq->remove(['id'=>$id]);
				$this->session->set_flashdata("success", "Xóa thành công");
				redirect(site_url("syslog/faq"), "back");

			}
		}
		else{
			$config_row_page = ADMIN_ROW_PER_PAGE;
			$page_num = isset($_GET['page_num'])?$_GET['page_num']:$config_row_page;
			if(!isset($_GET['page'])||($_GET['page'])<1){
				$page = 1;
			}
			else{
				$page = $_GET['page'];
			}
			$offset = ($page -1) * $page_num;	
			$total = count($this->m_faq->items());
			
			$pagination = $this->util->pagination(
				site_url("{$this->util->slug($this->router->fetch_class())}/{$this->util->slug($this->router->fetch_method())}"). "?$_SERVER[QUERY_STRING]",
				$total,
				$page_num
			);
		
		$info = new stdClass;
		$info->search = !empty($_GET['search'])?$_GET['search']:'';
		$faqs = $this->m_faq->items($info,null,$page_num,$offset);
		 foreach($faqs as $faq){
			$info = new stdClass;
			$info->updated_by = $faq->id;
			$faq->updated_by = $this->m_user->load($faq->updated_by);
		 }

		$view_data = array();
		$view_data['faqs'] = $faqs;
		$view_data['search'] = !empty($_GET['search'])?$_GET['search']:'';
		$view_data['title'] = 'Danh Sách Câu Hỏi';
		$view_data['breadcrumb']=$this->_breadcrumb;
		$view_data['pagination'] = $pagination;
		$view_data['offset'] = $offset;
		

		$tmpl_faq = array();
		$tmpl_faq['content'] = $this->load->view("admin/faq/index",$view_data,true);
		$this->load->view('layout/admin/main',$tmpl_faq);
		}
	}
	public function faq_categories($action = null,$id= null){
		$this->_breadcrumb = array_merge($this->_breadcrumb, [
			"Danh Mục Hỏi Đáp" => site_url("{$this->util->slug($this->router->fetch_class())}/{$this->util->slug($this->router->fetch_method())}")
		]);
		if(!empty($action)){
			
			if(!empty($_POST)){
				
				$data = [];
				$data['name']	=$_POST['name'];
				$data['alias'] 	= (!empty($_POST['alias']))?$_POST['alias']: $this->util->slug($_POST['name']);
				$data['active']	=$_POST['active'];

				if($action == 'add'){
					$this->session->flashdata("success","Thêm Thành Công");
					$this->m_faq_categories->add($data);
				}
				

				if($action =="edit"){
					
					$this->m_faq_categories->update($data,['id'=>$id]);
					$this->session->flashdata("success","Sửa Thành Công");

				}
				redirect("syslog/faq_categories", "back");
			}

			if($action == "add"){
				$this->_breadcrumb = array_merge($this->_breadcrumb, [
					"Thêm" => site_url("{$this->util->slug($this->router->fetch_class())}/{$this->util->slug($this->router->fetch_method())}/{$action}")]);
				
					$item = $this->m_faq_categories->items();

					$view_data = array();
					$view_data['title'] = 'Thêm Danh Mục';
					$view_data['item'] = $item;
					$view_data['breadcrumb'] = $this->_breadcrumb;

				$tmpl_faq = array();
				$tmpl_faq['content'] = $this->load->view("admin/faq/category/edit",$view_data,true);
				$this->load->view('layout/admin/main',$tmpl_faq);
				}
			if($action =="edit"){
				$this->_breadcrumb = array_merge($this->_breadcrumb, [
					"Sửa" => site_url("{$this->util->slug($this->router->fetch_class())}/{$this->util->slug($this->router->fetch_method())}/{$action}/{$id}")]);
					
					$item = $this->m_faq_categories->load($id);
	
					$view_data = array();
					$view_data['title'] = 'Sửa Danh Mục';
					$view_data['item'] = $item;
					$view_data['breadcrumb'] = $this->_breadcrumb;
	
					$tmpl_faq = array();
					$tmpl_faq['content'] = $this->load->view("admin/faq/category/edit",$view_data,true);
					$this->load->view('layout/admin/main',$tmpl_faq);
				}
			else if($action == 'delete')
			{

				 $this->m_faq_categories->remove(['id'=>$id]);
				$this->session->set_flashdata("success", "Xóa thành công");
				redirect(site_url("syslog/faq_categories"), "back");
	
			}
		}
		else{
			$config_row_page = ADMIN_ROW_PER_PAGE;// số item trong 1 trang
			$page_num		= isset($_GET["page_num"]) ? $_GET["page_num"] : $config_row_page;
			if (!isset($_GET['page']) || (($_GET['page']) < 1) ) {
				$page = 1;
			}
			else {
				$page = $_GET['page'];
			}
			$offset = ($page - 1) * $page_num;

			$total = count($this->m_faq_categories->items());

			$pagination = $this->util->pagination(
				site_url("{$this->util->slug($this->router->fetch_class())}/{$this->util->slug($this->router->fetch_method())}"). "?$_SERVER[QUERY_STRING]",
				$total,
				$page_num
			);

			$info = new stdClass;
			$info->search = !empty($_GET['search'])?$_GET['search']:'';

		$faq_categories = $this->m_faq_categories->items($info,null,$page_num,$offset);

		foreach($faq_categories as $faq_category){
			$info = new stdClass;
			$info->updated_by = $faq_category->id;

			$faq_category->updated_by = $this->m_user->load($faq_category->updated_by);
		}
		
		$view_data = array();
		$view_data['title'] = 'Danh Mục Câu Hỏi';
		$view_data['faq_categories'] = $faq_categories;
		$view_data['breadcrumb'] = $this->_breadcrumb;
		$view_data['search'] = !empty($_GET['search'])?$_GET['search']:'';
		$view_data['pagination'] = $pagination;
		$view_data['offset'] = $offset;

		$tmpl_faq = array();
		$tmpl_faq['content'] = $this->load->view("admin/faq/category/index",$view_data,true);
		$this->load->view('layout/admin/main',$tmpl_faq);
		}
	}
	public function partners($action=null,$id=null){
		$this->_breadcrumb = array_merge($this->_breadcrumb, [
			"Danh Sách Đối Tác" => site_url("{$this->util->slug($this->router->fetch_class())}/{$this->util->slug($this->router->fetch_method())}")
		]);
		if(!empty($action)){
				
			if(!empty($_POST)){
				$partners = $this->m_partner->load($id);
				$data = array();
				$data['name'] 	 = $_POST['name'];
				$data['url']	 = !empty($_POST['url'])? $_POST['url']: $this->util->slug($_POST['name']);
				$data['active']  = $_POST['active'];

				if(empty($_POST['name'])){
					$this->session->set_flashdata("error", "Vui lòng nhập tên");
					redirect(site_url("syslog/partners"), "back");
				}
				
				if (!empty($_FILES['banner']['name'])){
					$path = "./files/upload/image/partner/{$id}";
					if (!file_exists($path)) {
						mkdir($path, 0755, true);
					}
					// code tao thư mục
	
					$allow_type = 'jpg|jpeg|png';
					$this->util->upload_file($path,'banner','',$allow_type);
					// upload ảnh lên server
	
					$banner = explode('.',$_FILES['banner']['name']) ;
					$data['banner'] = $path."/{$this->util->slug($banner[0])}.{$banner[1]}";
					// add url hinh ảnh vào database
				}
				if ($action == 'add') {
					$this->session->set_flashdata("success", "Thêm thành công");
					$this->m_partner->add($data);
				} else if ($action == 'edit') {
					$this->session->set_flashdata("success", "Cập nhật thành công");
					$this->m_partner->update($data, ['id' => $id]);
				}
				
				redirect(site_url("syslog/partners"), "back");
			}
			if($action == 'add'){
				$this->_breadcrumb = array_merge($this->_breadcrumb, [
					"Thêm" => site_url("{$this->util->slug($this->router->fetch_class())}/{$this->util->slug($this->router->fetch_method())}/{$action}")
				]);
				$partners = $this->m_partner->items();
				$view_data = array();
				$view_data['partners'] = $partners;
				$view_data['title'] =' Thêm Đối Tác';
				$view_data['breadcrumb'] = $this->_breadcrumb;

				$tmpl_partner = array();
				$tmpl_partner["content"] = $this->load->view("admin/partner/edit", $view_data, true);
				$this->load->view("layout/admin/main", $tmpl_partner);
			}
			else if($action == 'edit'){
				
				$this->_breadcrumb = array_merge($this->_breadcrumb, [
					"Sửa" => site_url("{$this->util->slug($this->router->fetch_class())}/{$this->util->slug($this->router->fetch_method())}/{$action}/{$id}")
				]);
				$partners = $this->m_partner->load($id);
				$view_data = array();	
				$view_data['partners'] = $partners;
				$view_data['title'] ='Chỉnh Sửa Đối Tác';
				$view_data['breadcrumb'] = $this->_breadcrumb;

				$tmpl_partner = array();
				$tmpl_partner["content"] = $this->load->view("admin/partner/edit", $view_data, true);
				$this->load->view("layout/admin/main", $tmpl_partner);
			}
			else if ($action == 'delete') {
				$this->m_partner->remove(['id' => $id]);
				$this->session->set_flashdata("success", "Xóa thành công");
				redirect(site_url("syslog/partners"), "back");
			}
		} else {
			$config_row_page = ADMIN_ROW_PER_PAGE;// số item trong 1 trang
			$page_num		= isset($_GET["page_num"]) ? $_GET["page_num"] : $config_row_page;
			if (!isset($_GET['page']) || (($_GET['page']) < 1) ) {
				$page = 1;
			}
			else {
				$page = $_GET['page'];
			}
			$offset = ($page - 1) * $page_num;

			$total = count($this->m_partner->items());

			$pagination = $this->util->pagination(
				site_url("{$this->util->slug($this->router->fetch_class())}/{$this->util->slug($this->router->fetch_method())}"). "?$_SERVER[QUERY_STRING]",
				$total,
				$page_num
			);

			///tim kiem
			$info = new stdClass();
			$info->search = !empty($_GET['search'])?$_GET['search']:'';
			
			$partners = $this->m_partner->items($info,null, $page_num,$offset);
			foreach ($partners as $partner){
			$partner->updated_by = $this->m_user->load($partner->updated_by);
			}
			$view_data = array();
			$view_data['search'] = !empty($_GET['search'])?$_GET['search']:'';
			$view_data['breadcrumb'] = $this->_breadcrumb;
			$view_data["partners"] = $partners;
			$view_data["title"] = 'Danh Sách Đối Tác';
			$view_data["offset"] = $offset;
			$view_data["pagination"] = $pagination;

			$tmpl_partner = array();
			$tmpl_partner["content"] = $this->load->view("admin/partner/index", $view_data, true);
			$this->load->view("layout/admin/main", $tmpl_partner);
		
		}
	}
	//------------------------------------------------------------------------------
	// slider
	//------------------------------------------------------------------------------

	public function sliders($action=null, $id=null){
		 $check=null;
		$this->_breadcrumb = array_merge($this->_breadcrumb, [
			"Slide" => site_url("{$this->util->slug($this->router->fetch_class())}/{$this->util->slug($this->router->fetch_method())}")
		]);
		if(!empty($action))
		{
			// kiểm tra trang
			if (
				$action == 'edit' && empty($id) ||
				$action == 'add' && !empty($id) ||
				!in_array($action, ['edit','add','delete']) ||
				$action == 'edit' && empty($this->m_slide->load($id))
			) {
				redirect("error404", "location");
			}
			if(!empty($_POST))
			{
				
				$receive_data=[];
				$receive_data['title'] 		 = $_POST['title'];
				$receive_data['link']		 = $_POST['link'];
				$receive_data['description'] = $_POST['description'];
				$receive_data['active'] 	 = $_POST['active'];
				
				if (empty($_POST['title'])) {
					$this->session->set_flashdata("error", "Vui lòng nhập tiêu đề.");
					redirect(site_url("syslog/sliders"), "back");
				}
				if (empty($_POST['description'])) {
					$this->session->set_flashdata("error", "Vui lòng nhập mô tả.");
					redirect(site_url("syslog/sliders"), "back");
				}

				if (!empty($_FILES['thumbnail']['name'])){
					$path = "./files/upload/image/slider{$id}";
					if (!file_exists($path)) {
						mkdir($path, 0755, true);
					}
					// code tao thư mục

					$allow_type = 'jpg|jpeg|png';
					$this->util->upload_file($path,'thumbnail','',$allow_type);
					// upload ảnh lên server

					$thumbnail = explode('.',$_FILES['thumbnail']['name']);
					$receive_data['thumbnail'] = $path."/{$this->util->slug($thumbnail[0])}.{$thumbnail[1]}";
					// add url hinh ảnh vào database
				}
					// kiểm tra log
					$id_slider_log = !empty($id_slider_log) ? $id_slider_log : $this->m_slide->get_next_value();	
					$admin = $this->session->userdata("admin");
					$add_log=[];
					$add_log['id_slider']=$id_slider_log;
					$add_log['item_log']='slide';
					$add_log['previous_content']=json_encode($receive_data);
					$add_log['id_user'] = $admin->id;
					
				if($action == 'add')
				{
					$this->m_slide->add($receive_data);
					$this->session->set_flashdata("success", "Thêm thành công");
				}
				
				else if($action =='edit')
				{
					$this->m_slide->update($receive_data,['id'=>$id]);
					$this->m_log->add($add_log);
					// $this->session->set_flashdata("success", "Cập nhật thành công");
				}
				redirect(site_url("syslog/sliders"), "back");

			}
			// load giao diện
			if($action == 'add')
			{
				$this->_breadcrumb = array_merge($this->_breadcrumb, [
					"Thêm" => site_url("{$this->util->slug($this->router->fetch_class())}/{$this->util->slug($this->router->fetch_method())}/{$action}/{$id}")
				]);	
				$view_data = array();
				$view_data["title"] = 'Thêm mới Slider';

				$tmpl_slider = array();
				$view_data["breadcrumb"] = $this->_breadcrumb;
				$tmpl_slider["content"] = $this->load->view("admin/slide/edit", $view_data, true);
				$this->load->view("layout/admin/main", $tmpl_slider);
			}
			else if($action == 'edit')
			{
				$this->_breadcrumb = array_merge($this->_breadcrumb, [
					"Sữa" => site_url("{$this->util->slug($this->router->fetch_class())}/{$this->util->slug($this->router->fetch_method())}/{$action}/{$id}")
				]);	
				$kq_slider_item = $this->m_slide->load($id);
				$view_data = array();
				$view_data["breadcrumb"] = $this->_breadcrumb;
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
			$config_row_page = ADMIN_ROW_PER_PAGE;// số item trong 1 trang
			$page_num		= isset($_GET["page_num"]) ? $_GET["page_num"] : $config_row_page;
			if (!isset($_GET['page']) || (($_GET['page']) < 1) ) {
				$page = 1;
			}
			else {
				$page = $_GET['page'];
			}
			$offset = ($page - 1) * $page_num;

			$total = count($this->m_slide->items());

			$pagination = $this->util->pagination(
				site_url("{$this->util->slug($this->router->fetch_class())}/{$this->util->slug($this->router->fetch_method())}"). "?$_SERVER[QUERY_STRING]",
				$total,
				$page_num
			);
			
			
				// tìm kiếm			
				$info = new stdClass();
				$info->search = !empty($_GET['search'])?$_GET['search']:'';
				
				$kq_slider = $this->m_slide->items($info, null, $page_num, $offset);
				// thêm ngày tháng , tên người sửa
				// lấy đúng giá trị của dong của ID
				foreach($kq_slider as $kq) {
					$info = new stdClass();
					$info->updated_by = $kq->id;
					$kq->updated_by = $this->m_user->load($kq->updated_by);
				}

			$view_data = array();
			$view_data["slider_chuyen"] = $kq_slider;
			$view_data["offset"]		= $offset;
			$view_data["breadcrumb"] 	= $this->_breadcrumb;
			$view_data["pagination"]	= $pagination;
			$view_data["titles"] = 'Danh sách Slider';

			$tmpl_content = array();
			$tmpl_content["content"] = $this->load->view("admin/slide/index", $view_data, true);
			$this->load->view("layout/admin/main", $tmpl_content);
		}
	}
	//------------------------------------------------------------------------------
	// Liên hệ
	//------------------------------------------------------------------------------

	public function contacts($action= null , $id=null){
		$this->_breadcrumb = array_merge($this->_breadcrumb, [
			"Liên Hệ" => site_url("{$this->util->slug($this->router->fetch_class())}/{$this->util->slug($this->router->fetch_method())}")
		]);

		if(!empty($action))
		{
			//kiểm tra trang
			if (
				$action == 'edit' && empty($id) ||
				$action == 'add' && !empty($id) ||
				!in_array($action, ['edit','add','delete']) ||
				$action == 'edit' && empty($this->m_contact->load($id))
			) {
				redirect("error404", "location");
			}
			if(!empty($_POST))
			{

				$receive_data = [];
				$receive_data['name']=$_POST['title'];
				$receive_data['email']=$_POST['email'];
				$receive_data['phone']=$_POST['phone'];
				$receive_data['content']=$_POST['content'];
				
				if(empty($_POST['title'])){
					$this->session->set_flashdata("error", "vui lòng nhập họ và tên");
					redirect(site_url("syslog/contacts"), "back");
				}
				if(empty($_POST['email'])){
					$this->session->set_flashdata("error", "vui lòng nhập email");
					redirect(site_url("syslog/contacts"), "back");
				}
				if(empty($_POST['phone'])){
					$this->session->set_flashdata("error", "vui lòng nhập số điện");
					redirect(site_url("syslog/contacts"), "back");
				}
				if(empty($_POST['content'])){
					$this->session->set_flashdata("error", "vui lòng nhập nội dung");
					redirect(site_url("syslog/contacts"), "back");
				}

				if($action=='add')
				{
					$this->m_contact->add($receive_data);
					$this->session->set_flashdata("success", "Thêm thành công");
				}
				else if($action=='edit')
				{
					$this->m_contact->update($receive_data,['id'=>$id]);
					$this->session->set_flashdata("success", "Cập nhật thành công");
				}
				redirect(site_url("syslog/contacts"), "back");

			}
				
				if($action == 'add')
				{
					$this->_breadcrumb = array_merge($this->_breadcrumb, [
						"Thêm" => site_url("{$this->util->slug($this->router->fetch_class())}/{$this->util->slug($this->router->fetch_method())}/{$action}/{$id}")
					]);	
					$view_data = array();
					
					$view_data["title"] = 'Thêm mới Liên Hệ';

					$tmpl_contact = array();
					$view_data["breadcrumb"] = $this->_breadcrumb;
					$tmpl_contact["content"] = $this->load->view("admin/contact/edit", $view_data, true);
					$this->load->view("layout/admin/main", $tmpl_contact);
					
				}
				else if($action == 'edit')
				{
					$this->_breadcrumb = array_merge($this->_breadcrumb, [
						"Sữa" => site_url("{$this->util->slug($this->router->fetch_class())}/{$this->util->slug($this->router->fetch_method())}/{$action}/{$id}")
					]);	

					$kq_contact_item = $this->m_contact->load($id);
					$view_data = array();
					$view_data["breadcrumb"] = $this->_breadcrumb;
					$view_data["contact_chuyen_item"] = $kq_contact_item;
					$view_data["title"] = 'Cập nhật Liên hệ';

					$tmpl_contact = array();
					$tmpl_contact["content"] = $this->load->view("admin/contact/edit", $view_data, true);
					$this->load->view("layout/admin/main", $tmpl_contact);	
				}
				else if($action == 'delete')
				{
					$this->m_contact->remove(['id' => $id]);
					$this->session->set_flashdata("success", "Xóa thành công");
					redirect(site_url("syslog/contacts"), "back");

				}
		}
		else
			{
				

				$config_row_page = ADMIN_ROW_PER_PAGE;// số item trong 1 trang
				$page_num		= isset($_GET["page_num"]) ? $_GET["page_num"] : $config_row_page;
				if (!isset($_GET['page']) || (($_GET['page']) < 1) ) {
					$page = 1;
				}
				else {
					$page = $_GET['page'];
				}
				$offset = ($page - 1) * $page_num;

				$total = count($this->m_contact->items());
				
				$pagination = $this->util->pagination(
					site_url("{$this->util->slug($this->router->fetch_class())}/{$this->util->slug($this->router->fetch_method())}"). "?$_SERVER[QUERY_STRING]",
					$total,
					$page_num
				);
				

				// tìm kiếm			
				$info = new stdClass();
				$info->search = !empty($_GET['search'])?$_GET['search']:'';

				// thêm ngày tháng , tên người sửa
				$kq_contact = $this->m_contact->items($info, $page_num, $offset);
				// lấy đúng giá trị của dong của ID
				foreach($kq_contact as $kq) {
					$kq->updated_by_user = $this->m_user->load($kq->updated_by);
				}
				
				$view_data = array();
				$view_data["contact_chuyen"] = $kq_contact;
				$view_data["offset"]		 = $offset;
				$view_data["pagination"]	 = $pagination;
				$view_data["breadcrumb"] 	 = $this->_breadcrumb;
				$view_data["title"] = 'Danh sách Contact';

				$tmpl_contact = array();
				$tmpl_contact["content"] = $this->load->view("admin/contact/index", $view_data, true);
				$this->load->view("layout/admin/main", $tmpl_contact);
			}

	}
	//------------------------------------------------------------------------------
	// product
	//------------------------------------------------------------------------------
	public function products($action = null , $id = null) {
		$this->_breadcrumb = array_merge($this->_breadcrumb, [
			"Sản Phẩm" => site_url("{$this->util->slug($this->router->fetch_class())}/{$this->util->slug($this->router->fetch_method())}")
		]);
		if(!empty($action))
		{
			// kiểm tra trang
			if (
				$action == 'edit' && empty($id) ||
				$action == 'add' && !empty($id) ||
				!in_array($action, ['edit','add','delete']) ||
				$action == 'edit' && empty($this->m_product->load($id))
			) {
				redirect("error404", "location");
			}

			if(!empty($_POST))
			{
				$product_categories = $this->m_product_categories->items();

				$receive_data=[];
				$receive_data['title']	 		= $_POST['title'];
				$receive_data['price'] 	 		= $_POST['price'];
				$receive_data['alias']	 		= !empty($_POST['alias'])?$_POST['alias']:$this->util->slug($_POST['title']);
				$receive_data['price'] 			= $_POST['price'];
				$receive_data['qty'] 			= $_POST['qty'];
				$receive_data['content'] 		= $_POST['content'];
				$receive_data['description'] 	= $_POST['description'];
				$receive_data['check_bold'] 	= $_POST['check_bold'];
				$receive_data['active'] 	 	= $_POST['active'];
				$receive_data['category_id'] 	= $_POST['category_id'];

				if (empty($_POST['title'])) {
					$this->session->set_flashdata("error", "Vui lòng nhập tiêu đề.");
					redirect(site_url("syslog/products"), "back");
				}
				if (empty($_POST['price'])) {
					$this->session->set_flashdata("error", "Vui lòng nhập giá.");
					redirect(site_url("syslog/products"), "back");
				}
				if (empty($_POST['qty'])) {
					$this->session->set_flashdata("error", "Vui lòng nhập số lượng.");
					redirect(site_url("syslog/products"), "back");
				}
				
				if (empty($_POST['category_id'])) {
					$this->session->set_flashdata("error", "Vui lòng chọn trường chọn loại sản phẩm.");
					redirect(site_url("syslog/products"), "back");
				}
				
			
				$count_image = count($_FILES);
				$id = !empty($id) ? $id : $this->m_product->get_next_value();

				// them hinh anh moi'
				for ($i=0; $i < $count_image; $i++) {
					if ($_POST["type_edit_{$i}"] == 1) {
						$this->m_product_gallery->remove([
							'product_id' => $id,
							'stt' => $i
						]);
					}
				}

				for ($i=0; $i < $count_image; $i++) { 
					if (!empty($_FILES["thumbnail_{$i}"]['name'])) {
						$path = "./files/upload/image/product/{$id}";
						if (!file_exists($path)) {
							mkdir($path, 0755, true);
						}
						// code tao thư mục
						$allow_type = 'jpg|jpeg|png';
						$this->util->upload_file($path,"thumbnail_{$i}",'',$allow_type);
						// upload ảnh lên server
	
						$thumbnail = explode('.',$_FILES["thumbnail_{$i}"]['name']);

						$data_gallery = [];
						$data_gallery['product_id'] = $id;
						$data_gallery['stt'] 		= $i;
						$data_gallery["thumbnail"]  = str_replace('./','/',$path)."/{$this->util->slug($thumbnail[0])}.{$thumbnail[1]}";

						$this->m_product_gallery->add($data_gallery);
					}
				}

				if($action=='add')
				{
					$this->session->set_flashdata("success", "Thêm thành công");
					$this->m_product->add($receive_data);
				}
				elseif($action=='edit')
				{

					$this->session->set_flashdata("success", "Cập Nhật thành công");
					$this->m_product->update($receive_data,['id'=>$id]);
				}

				redirect(site_url("syslog/products"), "back");
				
			}

			if($action=='add')
			{
				$this->_breadcrumb = array_merge($this->_breadcrumb, [
					"Thêm" => site_url("{$this->util->slug($this->router->fetch_class())}/{$this->util->slug($this->router->fetch_method())}/{$action}")
				]);
				$product_kq = $this->m_product->items();
				$view_data =array();
				$view_data['products']=$product_kq;
				$view_data["breadcrumb"] = $this->_breadcrumb;
				$view_data['title'] = 'Thêm Sản Phẩm';
		
				$tmpl_product = array();
				$tmpl_product['content']=$this->load->view('admin/product/edit',$view_data, true);
				$this->load->view('layout/admin/main',$tmpl_product);
			}
			else if($action=='edit')
			{
				$this->_breadcrumb = array_merge($this->_breadcrumb, [
					"Chỉnh sửa" => site_url("{$this->util->slug($this->router->fetch_class())}/{$this->util->slug($this->router->fetch_method())}/{$action}/{$id}")
				]);
				$kq_product_item = $this->m_product->load($id);

				$view_data = array();
				$view_data["kq_product_item"] = $kq_product_item;
				$view_data["breadcrumb"] = $this->_breadcrumb;
				$view_data["title"] = 'Cập nhật Product';

				$tmpl_slider = array();
				$tmpl_slider["content"] = $this->load->view("admin/product/edit", $view_data, true);
				$this->load->view("layout/admin/main", $tmpl_slider);
			}
			else if($action='delete')
			{
				$this->m_product->remove(['id' => $id]);
				$this->session->set_flashdata("success", "Xóa thành công");
				redirect(site_url("syslog/products"), "back");
			}
		}
		else
		{
			$config_row_page = ADMIN_ROW_PER_PAGE;// số item trong 1 trang
			$page_num		= isset($_GET["page_num"]) ? $_GET["page_num"] : $config_row_page;
			if (!isset($_GET['page']) || (($_GET['page']) < 1) ) {
				$page = 1;
			}
			else {
				$page = $_GET['page'];
			}
			$offset = ($page - 1) * $page_num;

			$total = count($this->m_contents->items());

			$pagination = $this->util->pagination(
				site_url("{$this->util->slug($this->router->fetch_class())}/{$this->util->slug($this->router->fetch_method())}"). "?$_SERVER[QUERY_STRING]",
				$total,
				$page_num
			);
			$info = new stdClass();
				$info->search = !empty($_GET['search'])?$_GET['search']:'';

				// thêm ngày tháng , tên người sửa
			$products = $this->m_product->items($info, null, $page_num, $offset);
			// $products = $this->m_product->items(null, null, $page_num, $offset);
			foreach($products as $product) {
				$info = new stdClass();
				$info->product_id = $product->id;
				$gallery = $this->m_product_gallery->items($info,null,null,'stt','ASC');

				$product->updated_by = $this->m_user->load($product->updated_by);
				$product->product_category = $this->m_product_categories->load($product->category_id);
				$product->image = !empty($gallery[0]->thumbnail) ? $gallery[0]->thumbnail : null;
			}

			$view_data =array();
			$view_data['products']		= $products;
			$view_data["breadcrumb"] 	= $this->_breadcrumb;
			$view_data["search"] = !empty($_GET['search'])?$_GET['search']:'';
			$view_data["offset"]		= $offset;
			$view_data["pagination"]	= $pagination;
			$view_data['title'] 		= 'Danh Sách Sản Phẩm';
	
			$tmpl_product = array();
			$tmpl_product['content']=$this->load->view('admin/product/index',$view_data, true);
			$this->load->view('layout/admin/main',$tmpl_product);
		}
	}

	public function product_category($action=null, $id=null)
	{
		$this->_breadcrumb = array_merge($this->_breadcrumb, [
			"Danh Mục Sản Phẩm" => site_url("{$this->util->slug($this->router->fetch_class())}/{$this->util->slug($this->router->fetch_method())}")
		]);
		
		if(!empty($action))
		{
			// kiểm tra trang
			if (
				$action == 'edit' && empty($id) ||
				$action == 'add' && !empty($id) ||
				!in_array($action, ['edit','add','delete']) ||
				$action == 'edit' && empty($this->m_product_categories->load($id))
			) {
				redirect("error404", "location");
			}
			if(!empty($_POST))
			{
				$receive_data=[];
				$receive_data['name']=$_POST['title'];
				$receive_data['alias'] 			= !empty($_POST['alias'])?$_POST['alias']:$this->util->slug($_POST['title']);
				$receive_data['active']=$_POST['active'];

				if (empty($_POST['title'])) {
					$this->session->set_flashdata("error", "Vui lòng nhập tiêu đề");
					redirect(site_url("syslog/product_category"), "back");
				}

				if($action =='add')
				{
					if ($action == "add") {
						$this->m_product_categories->add($receive_data);
						$this->session->set_flashdata("success", "Thêm danh mục thành công");
					}
				}
				if($action=='edit')
				{
					$this->m_product_categories->update($receive_data,['id'=>$id]);
					$this->session->set_flashdata("success", "Cập nhật danh mục thành công");

				}
				redirect(site_url("syslog/product_category"), "back");

			}

			if($action =='add')
			{
				$this->_breadcrumb = array_merge($this->_breadcrumb, [
					"Thêm" => site_url("{$this->util->slug($this->router->fetch_class())}/{$this->util->slug($this->router->fetch_method())}/{$action}/{$id}")
				]);	
				$view_data = array();
				$view_data["breadcrumb"] = $this->_breadcrumb;
				$view_data["title"] = 'Thêm Danh Mục';

				$tmpl_product_categories = array();
				$tmpl_product_categories["content"] = $this->load->view("admin/product/category/edit", $view_data, true);
				$this->load->view("layout/admin/main", $tmpl_product_categories);
			}
			else if($action =='edit')
			{
				$this->_breadcrumb = array_merge($this->_breadcrumb, [
					"Sữa" => site_url("{$this->util->slug($this->router->fetch_class())}/{$this->util->slug($this->router->fetch_method())}/{$action}/{$id}")
				]);
				$kq_product_category = $this->m_product_categories->load($id);
				
				$view_data = array();
				$view_data["breadcrumb"] = $this->_breadcrumb;
				$view_data["title"] = 'Cập Nhật Danh Mục';
				$view_data["product_category_chuyen"] = $kq_product_category;


				$tmpl_product_categories = array();
				$tmpl_product_categories["content"] = $this->load->view("admin/product/category/edit", $view_data, true);
				$this->load->view("layout/admin/main", $tmpl_product_categories);
			}
			else if($action=='delete'){

				$this->m_product_categories->remove(['id' => $id]);
				
				$this->session->set_flashdata("success", "Xóa thành công");
				redirect(site_url("syslog/product_category"), "back");

			}
		}
		else{
			$config_row_page = ADMIN_ROW_PER_PAGE;// số item trong 1 trang
			$page_num		= isset($_GET["page_num"]) ? $_GET["page_num"] : $config_row_page;
			if (!isset($_GET['page']) || (($_GET['page']) < 1) ) {
				$page = 1;
			}
			else {
				$page = $_GET['page'];
			}
			$offset = ($page - 1) * $page_num;

			$total = count($this->m_product_categories->items());

			$pagination = $this->util->pagination(
				site_url("{$this->util->slug($this->router->fetch_class())}/{$this->util->slug($this->router->fetch_method())}"). "?$_SERVER[QUERY_STRING]",
				$total,
				$page_num
			);
			// tìm kiếm
			$info = new stdClass();
			$info->search = !empty($_GET['search'])?$_GET['search']:'';

			$kq_product_category = $this->m_product_categories->items($info, null, $page_num, $offset);
			// thêm ngày tháng , tên người sửa
				// lấy đúng giá trị của dong của ID
				foreach($kq_product_category as $kq) {
					$info = new stdClass();
					$info->updated_by = $kq->id;
					$kq->updated_by = $this->m_user->load($kq->updated_by);
					
				}
			
			$view_data = array();
			$view_data["product_category_chuyen"] = $kq_product_category;
			$view_data["offset"]		= $offset;
			$view_data["breadcrumb"] 	= $this->_breadcrumb;
			$view_data["pagination"]	= $pagination;
			$view_data["title"] = 'Danh sách Danh Mục';

			$tmpl_product_categories = array();
			$tmpl_product_categories["content"] = $this->load->view("admin/product/category/index", $view_data, true);
			$this->load->view("layout/admin/main", $tmpl_product_categories);
		}

		
	}
	//------------------------------------------------------------------------------
	// settings
	//------------------------------------------------------------------------------
	
	public function setting ($action=null)
	{
		if(!empty($_POST))
		{
			$receive_data = [];
			$receive_data['company_name']		= $_POST['company_name'];
			$receive_data['company_logan']		= $_POST['company_logan'];
			$receive_data['company_address']	= $_POST['company_address'];
			$receive_data['company_hotline']	= $_POST['company_hotline'];
			$receive_data['company_tollfree']	= $_POST['company_tollfree'];
			$receive_data['company_email']		= $_POST['company_email'];
			$receive_data['facebook_url']		= $_POST['facebook_url'];
			$receive_data['googleplus_url']		= $_POST['googleplus_url'];
			$receive_data['twitter_url']		= $_POST['twitter_url'];
			$receive_data['youtube_url']		= $_POST['youtube_url'];
			$receive_data['tags']				= $_POST['tags'];
			
			
			if (!empty($_FILES['logo']['name'])){
				$path = "./files/upload/image/logo";
				if (!file_exists($path)) {
					mkdir($path, 0755, true);
				}
				// code tao thư mục

				$allow_type = 'jpg|jpeg|png';
				$this->util->upload_file($path,'logo','',$allow_type);
				// upload ảnh lên server

				$logo = explode('.',$_FILES['logo']['name']);
				$receive_data['logo'] = $path."/{$this->util->slug($logo[0])}.{$logo[1]}";
				// add url hinh ảnh vào database
			}
			

			$check=$this->m_setting->update($receive_data,['id = 1']);
			if($check==true)
			{
				$this->session->set_flashdata("success", "Cập nhật thành công");
				redirect(site_url("syslog/setting"), "back");
			}
				
		}
		else
		{
		$this->_breadcrumb = array_merge($this->_breadcrumb, array("Settings" => site_url("{$this->util->slug($this->router->fetch_class())}/{$this->util->slug($this->router->fetch_method())}")));

			$list_setting					= $this->m_setting->load(['id = 1']);
			$receive_data 					= array();
			$receive_data['kq_setting']		=$list_setting;
			$receive_data['title']			="Setting";
			$receive_data['customized']		="Tùy Chỉnh Website";
			$receive_data['social_links']	="Social Links";
			$receive_data['cloud']			="Cluod";
			$receive_data["breadcrumb"] = $this->_breadcrumb;
			
			$tmpl_setting = array();
			$tmpl_setting["content"] = $this->load->view("admin/settings/edit", $receive_data, true);
			$this->load->view("layout/admin/main", $tmpl_setting);
		}
		
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
	//------------------------------------------------------------------------------
	// post
	//------------------------------------------------------------------------------
	public function posts ($action=null, $id=null) {
		$this->_breadcrumb = array_merge($this->_breadcrumb, [
			"Bài Viết" => site_url("{$this->util->slug($this->router->fetch_class())}/{$this->util->slug($this->router->fetch_method())}")
		]);
		
		if(!empty($action))
		{
			if (
				$action == 'edit' && empty($id) ||
				!in_array($action, ['edit']) ||
				$action == 'edit' && empty($this->m_contents->load($id))
			)
			{
				redirect("error404", "location");
			}
			if(!empty($_POST))
			{	
				$receive_data=[];
				$receive_data['title'] 			= $_POST['title'];
				$receive_data['alias']	 		= !empty($_POST['alias'])?$_POST['alias']:$this->util->slug($_POST['title']);
				$receive_data['active']		 	= $_POST['active'];
				$receive_data['content'] 		= $_POST['content'];
				if (empty($_POST['title'])) {
					$this->session->set_flashdata("error", "Vui lòng nhập tiêu đề.");
					redirect(site_url("syslog/sliders"), "back");
				}

				if (!empty($_FILES['thumbnail']['name'])){
					$path = "./files/upload/image/post/{$id}";
					if (!file_exists($path)) {
						mkdir($path, 0755, true);
					}
					// code tao thư mục

					$allow_type = 'jpg|jpeg|png';
					$this->util->upload_file($path,'thumbnail','',$allow_type);
					// upload ảnh lên server

					$thumbnail = explode('.',$_FILES['thumbnail']['name']);
					$receive_data['thumbnail'] = $path."/{$this->util->slug($thumbnail[0])}.{$thumbnail[1]}";
					// add url hinh ảnh vào database
				}
				
				if($action=="edit")
				{
					$this->m_post->update($receive_data,['id'=>$id]);
					
					$this->session->set_flashdata("success", "Cập nhật thành công");
				}
				redirect(site_url("syslog/posts"), "back");
			}
		if($action == "edit")
			{
				$this->_breadcrumb = array_merge($this->_breadcrumb, [
					"Cập Nhật" => site_url("{$this->util->slug($this->router->fetch_class())}/{$this->util->slug($this->router->fetch_method())}/{$action}/{$id}")
				]);	

				$list_post_item = $this->m_post->load($id);
				$receive_data = array();
				$receive_data["breadcrumb"] = $this->_breadcrumb;
				$receive_data["post_chuyen"] = $list_post_item;
				$receive_data["title"] = 'Cập nhật Post';

				$tmpl_post = array();
				$tmpl_post["content"] = $this->load->view("admin/post/edit", $receive_data, true);
				$this->load->view("layout/admin/main", $tmpl_post);	
			}
		}
		
		else
		{
			$config_row_page = ADMIN_ROW_PER_PAGE;// số item trong 1 trang
			$page_num		= isset($_GET["page_num"]) ? $_GET["page_num"] : $config_row_page;
			if (!isset($_GET['page']) || (($_GET['page']) < 1) ) {
				$page = 1;
			}
			else {
				$page = $_GET['page'];
			}
			$offset = ($page - 1) * $page_num;

			$total = count($this->m_post->items());

			$pagination = $this->util->pagination(
				site_url("{$this->util->slug($this->router->fetch_class())}/{$this->util->slug($this->router->fetch_method())}"). "?$_SERVER[QUERY_STRING]",
				$total,
				$page_num
			);
			
				// tìm kiếm			
				$info = new stdClass();
				$info->search = !empty($_GET['search'])?$_GET['search']:'';

				$list_post	= $this->m_post->items($info, null, $page_num, $offset);
				foreach($list_post as $kq) {
					$kq->updated_by_user = $this->m_user->load($kq->updated_by);
				}

			//load dử liệu inđex
			$receive_data =array();

			$receive_data["breadcrumb"] 	= $this->_breadcrumb;
			$receive_data["search"] 		= !empty($_GET['search'])?$_GET['search']:'';
			$receive_data["offset"]			= $offset;
			$receive_data["pagination"]		= $pagination;
			$receive_data['title'] 			= 'Danh Sách Bài Viết';
			$receive_data["post_chuyen"] 	= $list_post;

			$tmpl_post = array();
			$tmpl_post['content']=$this->load->view('admin/post/index',$receive_data, true);
			$this->load->view('layout/admin/main',$tmpl_post);
			
		}
		
	}
	//------------------------------------------------------------------------------
	// log
	//------------------------------------------------------------------------------
	public function loghistory($action=null,$id=null)
	{
		$this->_breadcrumb = array_merge($this->_breadcrumb, [
			"Danh Sách Log" => site_url("{$this->util->slug($this->router->fetch_class())}/{$this->util->slug($this->router->fetch_method())}/{$action}/{$id}")
		]);
		if(!empty($action))
		{
			if($action == 'view')
			{
				$kq_loghistory = $this->m_log->items($id);

				// foreach($kq_loghistory as $log_user) 
				// {
				// 	$log_user->list_id_user = $this->m_user->load($log_user->id_user);
				// }

				$view_data = array();
				$view_data["loghistory_chuyen"] = $kq_loghistory;
				// $view_data["offset"]		= $offset;
				// $view_data["breadcrumb"] 	= $this->_breadcrumb;
				// $view_data["pagination"]	= $pagination;
				$view_data["title"] = 'Danh sách Log History';
				

				$tmpl_log = array();
				$tmpl_log["content"] = $this->load->view("admin/log_his/view", $view_data, true);
				$this->load->view("layout/admin/main", $tmpl_log);
			}
		}
		else
		{
			$config_row_page = ADMIN_ROW_PER_PAGE;// số item trong 1 trang
			$page_num		= isset($_GET["page_num"]) ? $_GET["page_num"] : $config_row_page;
			if (!isset($_GET['page']) || (($_GET['page']) < 1) ) {
				$page = 1;
			}
			else {
				$page = $_GET['page'];
			}
			$offset = ($page - 1) * $page_num;

			$total = count($this->m_log->items());

			$pagination = $this->util->pagination(
				site_url("{$this->util->slug($this->router->fetch_class())}/{$this->util->slug($this->router->fetch_method())}"). "?$_SERVER[QUERY_STRING]",
				$total,
				$page_num
			);

			$kq_loghistory = $this->m_log->items(null, null, $page_num, $offset);

			foreach($kq_loghistory as $log_user) 
			{
				$log_user->list_id_user = $this->m_user->load($log_user->id_user);
			}

			$view_data = array();
			$view_data["loghistory_chuyen"] = $kq_loghistory;
			$view_data["offset"]			= $offset;
			$view_data["breadcrumb"] 		= $this->_breadcrumb;
			$view_data["search"] = !empty($_GET['search'])?$_GET['search']:'';
			$view_data["pagination"]		= $pagination;
			
			$view_data["title"] = 'Danh sách Log History';

			$tmpl_log = array();
			$tmpl_log["content"] = $this->load->view("admin/log_his/index", $view_data, true);
			$this->load->view("layout/admin/main", $tmpl_log);
		}
	}
}

?>