<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
   class Tin_tuc_su_kien extends CI_Controller {
   	var $_breadcrumb = array();
   
   	function __construct()
   	{
   		parent::__construct();
   
   		$this->_breadcrumb = array_merge($this->_breadcrumb, array("Tin tức - sự kiện" => site_url($this->util->slug($this->router->fetch_class()))));
   	}
   	public function index($category=null, $id=null) {
   		$this->_breadcrumb = array_merge($this->_breadcrumb, array("Tin tức - sự kiện" => site_url($this->util->slug($this->router->fetch_class()))));
		$results_category = $this->m_content_categories->items(null,1);

   		if(!empty($category))
   		{	
   			if(!empty($id))
   			{
   				
   				$check_id = $this->m_contents->load($id);
   				$check_cate =$this->m_content_categories->load($category);
   				
   				$result = $this->m_contents->load($check_cate->id);
   
   				$info = new stdClass();
   				$info->category_id = $check_cate->id;
   				// $info->category_id = $faq_category->id;
   
   				$result_relative = $this->m_contents->relative_items($info,array($check_id->id),1);
   				
   
   				$view_data = array();
   				$view_data['item'] 					= $result;
   				$view_data["breadcrumb"] 			= $this->_breadcrumb;
   				$view_data['relative_items'] 		= $result_relative;
   				
   				$tmpl_content = array();
   				$tmpl_content["content"]   = $this->load->view("new_event/detail", $view_data, TRUE);
   				$this->load->view("layout/view", $tmpl_content);
   			}
   			else
   			{	
   				
   				$check_cate =$this->m_content_categories->load($category);
   				
   				$info = new stdClass();
   				$info->category_id=$check_cate->id;
   				
   				$results_item = $this->m_contents->items($info,1);
   
   				$view_data = array();
   				$view_data['items'] 					= $results_item;
   				$view_data['categories']				=$results_category;
   
   
   				$tmpl_content = array();
   				$tmpl_content["content"]   = $this->load->view("new_event/index", $view_data, TRUE);
   				$this->load->view("layout/view", $tmpl_content);
   			}
   				
   		}
   		else
   		{
   
   			$total = count($this->m_contents->items(null,1));
   			
   			$page_num	= isset($_GET["page_num"]) ? $_GET["page_num"] : ROW_PER_PAGE;
   
   		
   			if (!isset($_GET['page']) || (($_GET['page']) < 1) ) {
   				$page = 1;
   			}
   			else {
   				$page = $_GET['page'];
   			}
   			$offset = ($page - 1) * $page_num;
   
   			$url = "//{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}";
   			$url = str_replace("?page={$page}", '', $url);
   			$url = str_replace("&page={$page}", '', $url);
   			$pagination = $this->util->pagination(
   				$url,
   				$total,
   				$page_num
   				
   			);
   			$results_item = $this->m_contents->items(null,1,$page_num,$offset);
   
   			$view_data = array();
   			// $view_data["breadcrumb"] 			= $this->_breadcrumb;
   			$view_data['items'] 				= $results_item;
   			$view_data['categories']			=$results_category;
   			$view_data["breadcrumb"] 			= $this->_breadcrumb;
   			$view_data["pagination"]			 = $pagination;
   			$view_data['title'] = "Tin Tức & Sự Kiện";
   
   			// var_dump($view_data);
   
   			$tmpl_content = array();
   			$tmpl_content["content"]   = $this->load->view("new_event/index", $view_data, TRUE);
   			$this->load->view("layout/view", $tmpl_content);
   		}
   
   		
   	}
   }
   ?>