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
			$check_cate =$this->m_content_categories->load($category);

			$this->_breadcrumb = array_merge($this->_breadcrumb, [$check_cate->name => site_url("{$this->util->slug($this->router->fetch_class())}/{$check_cate->alias}")]);

			foreach($results_item as $kq) {
				$info = new stdClass();
				$info->updated_by = $kq->id;
				$info->content_id = $kq->id;
				$kq->updated_by = $this->m_user->load($info);
				$gallery = $this->m_content_gallery->items($info,null,null,'stt','ASC');
				$kq->image = !empty($gallery[0]->thumbnail) ? BASE_URL.$gallery[0]->thumbnail : null;
			}

   			if(!empty($id))
   			{
				$check_id = $this->m_contents->load($id);
				

				$this->_breadcrumb = array_merge($this->_breadcrumb, [$check_id->title => site_url("{$this->util->slug($this->router->fetch_class())}/{$check_cate->alias}/{$check_id->alias}")]);
   				
   			
				// var_dump($check_id);
				// die;
   				$check_cate =$this->m_content_categories->load($category);
   				
   				$results_item = $this->m_contents->load($check_cate->id);
   
   				$info = new stdClass();
   				$info->category_id = $check_cate->id;
   				$info->content_id = $check_id->id;

				
				 
				
				$result_contet_recently = $this->m_contents->items($info, null, 4, null, $order_by='updated_date', $sort_by='ASC');
   
   				$result_relative = $this->m_contents->relative_items($info,array($check_id->id),1);

			
				$check_user= $this->m_user->load($check_id->updated_by);

   				$view_data = array();
   				$view_data['item'] 						= $results_item;
				$view_data['user'] 						= $check_user;
   				$view_data["breadcrumb"] 				= $this->_breadcrumb;
   				$view_data['result_relative'] 			= $result_relative;
				$view_data['result_contet_recently'] 	= $result_contet_recently;
				$view_data['categories']				=$results_category;
				

   				$tmpl_content = array();
   				$tmpl_content["content"]   = $this->load->view("new_event/detail", $view_data, TRUE);
   				$this->load->view("layout/view", $tmpl_content);
   			}
   			else
   			{	
				
   				$info = new stdClass();
   				$info->category_id=$check_cate->id;
   				
   				$results_item = $this->m_contents->items($info,1);
				//bài viết gần đây
				
				$result_contet_recently = $this->m_contents->items($info, null, 4, null, $order_by='updated_date', $sort_by='ASC');


				$total = count($this->m_contents->items($info,1));
   			
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

				$check = ceil(($total /ROW_PER_PAGE));
				
				foreach($results_item as $kq) {
					$info = new stdClass();
					$info->updated_by = $kq->id;
					$info->content_id = $kq->id;
					$kq->updated_by = $this->m_user->load($info);
					$gallery = $this->m_content_gallery->items($info,null,null,'stt','ASC');
					$kq->image = !empty($gallery[0]->thumbnail) ? BASE_URL.$gallery[0]->thumbnail : null;
				}
		
   				$view_data = array();
   				$view_data['items'] 					= $results_item;
				$view_data["breadcrumb"] 				= $this->_breadcrumb;
				$view_data['name_cate'] 				= $check_cate;
				$view_data["pagination"]			 	= $pagination;
				$view_data['page']					 	= $page;
				$view_data['total']				 	 	= $total;
				$view_data['page_num']				 	= $check;
				$view_data['result_contet_recently'] 	= $result_contet_recently;
   				$view_data['categories']				= $results_category;
   
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

			$check = ceil(($total /ROW_PER_PAGE));

   			$results_item = $this->m_contents->items(null,1,$page_num,$offset);
			
			foreach($results_item as $kq) {
			$info = new stdClass();
			$info->updated_by = $kq->id;
			$info->content_id = $kq->id;
			
			$kq->updated_by = $this->m_user->load($info);

			$gallery = $this->m_content_gallery->items($info,null,null,'stt','ASC');
			
			$kq->image = !empty($gallery[0]->thumbnail) ? BASE_URL.$gallery[0]->thumbnail : null;
			}
			
			// var_dump($results_item);
			// die;
			//bài viết gần đây
			$result_contet_recently = $this->m_contents->items(null, null, 4, null, $order_by='updated_date', $sort_by='ASC');

   			$view_data = array();
   			$view_data['items'] 				 = $results_item;
   			$view_data['categories']			 = $results_category;
   			$view_data['page']					 = $page;
			$view_data['total']				 	 = $total;
			$view_data['page_num']				 =$check;
			$view_data['page_num']				 =$check;
			$view_data['result_contet_recently'] =$result_contet_recently;
   			$view_data["breadcrumb"] 			 = $this->_breadcrumb;
   			$view_data["pagination"]			 = $pagination;
   
   			$tmpl_content = array();
   			$tmpl_content["content"]   = $this->load->view("new_event/index", $view_data, TRUE);
   			$this->load->view("layout/view", $tmpl_content);
   		}
   	}
   }
   ?>