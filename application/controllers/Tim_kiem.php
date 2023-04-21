<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
   class Tim_kiem extends CI_Controller {
   	var $_breadcrumbs = array();
   	function __construct()
   	{
   		parent::__construct();
   	
   		$this->_breadcrumbs = array_merge($this->_breadcrumbs, array("Trang chủ" => site_url()));
   	}
   	public function index($category_alias=null)
   	{
   		if(!empty($_GET['search_text']) )
   		{

			$order_by = null;
			$sort_by = null;

			$info = new stdClass();
			$info->search_text = !empty($_GET['search_text']) ? trim($_GET['search_text']," ") : '';
			
			$page_num		= isset($_GET["page_num"]) ? $_GET["page_num"] : ROW_PER_PAGE;
				
			if (!isset($_GET['page']) || (($_GET['page']) < 1) ) {
				$page = 1;
			}
			else {
				$page = $_GET['page'];
			}
			$offset = ($page - 1) * $page_num;
	
			$total = count($this->m_product->items($info,1));
	
			$url = "//{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}";
			$url = str_replace("?page={$page}", '', $url);
			$url = str_replace("&page={$page}", '', $url);
	
			$pagination = $this->util->paginationFrontend($url, $total, ROW_PER_PAGE, 'Sản phẩm');

			if(!empty($_GET["sap-xep"]))
			{
				if($_GET["sap-xep"] == "tang-dan")
				{
					$order_by = 'price';
					$sort_by = 'ASC';
				}
				else if($_GET['sap-xep'] == "giam-dan")
				{
					$order_by = 'price';
					$sort_by = 'DESC';
				}
			}
	
			$items = $this->m_product->items($info,1, $page_num,$offset,$order_by,$sort_by);
			
			$product_categories = $this->m_product_categories->items(null,1);
			
			foreach($items as $product) {
				$info = new stdClass();
				$info->product_id = $product->id;	
				$gallery = $this->m_product_gallery->items($info,null,null,'stt','ASC');
				$product->image = !empty($gallery[0]->thumbnail) ? BASE_URL.$gallery[0]->thumbnail : null;
			}
			
			$view_data = array();
			$view_data["items"] 			     = $items;
			$view_data['product_categories'] 	 = $product_categories;
			$view_data["pagination"]			 = $pagination;
			$view_data['total']				 	 = $total;
			$view_data['page']				 	 = $page;
	
			$tmpl_content = array();
			$tmpl_content["content"]   = $this->load->view("search_product/index", $view_data, TRUE);
			$this->load->view("layout/view", $tmpl_content);
				
		}
   	}
   
   	public function SX()
	{
		$val = $_POST['val'];
		$info = new stdClass();
		$info->search_text = $_POST['search_text'];

		if($val == "tang-dan")
		{
			$order_by = 'price';
			$sort_by = 'ASC';
		}
		else if($val== "giam-dan")
		{
			$order_by = 'price';
			$sort_by = 'DESC';
		}
		 
		$seach_products = $this->m_product->items($info,1, null,null,$order_by,$sort_by);

		foreach($seach_products as $product) {

			$info = new stdClass();
			$info->product_id =$product->id;
			
			$gallery = $this->m_product_gallery->items($info,null,null,'stt','ASC');
			$product->image = !empty($gallery[0]->thumbnail) ? BASE_URL.$gallery[0]->thumbnail : null;
		
		}
		
		echo json_encode($seach_products);
	}
   }
   
?>