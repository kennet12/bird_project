<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Hoi_dap extends CI_Controller {
	var $_breadcrumb = array();

	function __construct()
	{
		parent::__construct();
		$this->_breadcrumb = array_merge($this->_breadcrumb, array("Trang chủ" => site_url('')));
	}
	public function index($category=null, $id=null) {
		// $data = array(
		// 	'id'      => 'RSY001',
		// 	'qty'     => 4,
		// 	'price'   => 20.95,
		// 	'name'    => 'Ramsey',
		// );
		// $this->cart->insert($data);

		// $data = array(
		// 	'rowid' => '0256a32c98ce49afbe2a4eb8c96c5884',
		// 	'qty'   => 1
		// );
	
		// $this->cart->update($data);// 
		// $this->cart->remove('0256a32c98ce49afbe2a4eb8c96c5884');
		// $this->cart->destroy();
		// var_dump($this->cart->contents());

		$this->_breadcrumb = array_merge($this->_breadcrumb, array("Hỏi-Đáp" => site_url($this->util->slug($this->router->fetch_class()))));
		
		$item_recently = $this->m_faq->items(null,1,4,null,$order_by='updated_date',$sort_by='DESC');

		if(!empty($category)){
			
			$category = $this->m_faq_categories->load($category);	

			$this->_breadcrumb = array_merge($this->_breadcrumb, [$category->name => site_url("{$this->util->slug($this->router->fetch_class())}/{$category->alias}")]);

				if(!empty($id)){
					$items = $this->m_faq->load($id);

					$this->_breadcrumb = array_merge($this->_breadcrumb, [$items->question => site_url("{$this->util->slug($this->router->fetch_class())}/{$category->alias}/{$items->alias_question}")]);
					
					$view_data = array();
					$view_data['category'] = $category;
					$view_data['categories'] = $this->m_faq_categories->items(null,1);
					$view_data['items'] = $items;
					$view_data['item_recently'] = $item_recently;
					$view_data["breadcrumb"] 	= $this->_breadcrumb;
					
					$tmpl_faq = [];
					$tmpl_faq['content'] = $this->load->view("faq/detail",$view_data,true);
					$this->load->view("layout/view",$tmpl_faq);

				}
				else {
					if (!isset($_GET['page']) || (($_GET['page']) < 1) ) {
						$page = 1;
					}
					else {
						$page = $_GET['page'];
					}
					$offset = ($page - 1) * ROW_PER_PAGE;

					$info =new stdClass();
					$info->category_id = $category->id;

					$total = count($this->m_faq->items($info,1));

					$url = "//{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}";
					$url = str_replace("?page={$page}", '', $url);
					$url = str_replace("&page={$page}", '', $url);
					$pagination = $this->util->paginationFrontend(
						$url,
						$total,
						ROW_PER_PAGE,
						'Hỏi Đáp'
					);
				
					//load bai viếT gần đay theo ID cua danh muc
					$item_recently = $this->m_faq->items($info,1,4,null,$order_by='updated_date',$sort_by='DESC');

					

					$view_data = array();
					$view_data['items'] = $this->m_faq->items($info,1,ROW_PER_PAGE,$offset);
					$view_data['category'] = $category;
					$view_data['categories'] = $this->m_faq_categories->items(null,1);
					$view_data['item_recently'] = $item_recently;
					$view_data["breadcrumb"] 	= $this->_breadcrumb;
					$view_data["pagination"]	= $pagination;
			
					$tmpl_faq = [];
					$tmpl_faq['content'] = $this->load->view("faq/index",$view_data,true);
					$this->load->view("layout/view",$tmpl_faq);

				}
		}
		else
		{
			if (!isset($_GET['page']) || (($_GET['page']) < 1) ) {
				$page = 1;
			}
			else {
				$page = $_GET['page'];
			}
			$offset = ($page - 1) * ROW_PER_PAGE;
			$total = count($this->m_faq->items(null,1));

			$url = "//{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}";
			$url = str_replace("?page={$page}", '', $url);
			$url = str_replace("&page={$page}", '', $url);
			$pagination = $this->util->paginationFrontend(
				$url,
				$total,
				ROW_PER_PAGE,
				'Hỏi Đáp'
			);
			
			$view_data = array();
			$view_data['items'] =  $this->m_faq->items(null,1,ROW_PER_PAGE,$offset);
			$view_data['categories'] = $this->m_faq_categories->items(null,1);
			$view_data['breadcrumb'] = $this->_breadcrumb;
			$view_data['item_recently'] = $item_recently;
			$view_data["pagination"]	= $pagination;
			
			$tmpl_faq = [];
			$tmpl_faq['content'] = $this->load->view("faq/index",$view_data,true);
			$this->load->view("layout/view",$tmpl_faq);
		}
	}
}
?>