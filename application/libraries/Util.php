<?php
class Util {
	function __construct() {
		$this->ci = &get_instance();
	} 
	
	public function value($value, $default)
	{
		return (!is_null($value) ? $value : $default);
	}
	
	public function realIP()
	{
		return $_SERVER['REMOTE_ADDR'];
	}
	
	public function slug($str)
	{
		$str = trim(mb_strtolower($str));
		$str = preg_replace('/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/', 'a', $str);
		$str = preg_replace('/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/', 'e', $str);
		$str = preg_replace('/(ì|í|ị|ỉ|ĩ)/', 'i', $str);
		$str = preg_replace('/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/', 'o', $str);
		$str = preg_replace('/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/', 'u', $str);
		$str = preg_replace('/(ỳ|ý|ỵ|ỷ|ỹ)/', 'y', $str);
		$str = preg_replace('/(đ)/', 'd', $str);
		$str = preg_replace('/[^a-z0-9-\s]/', '-', $str);
		$str = preg_replace('/([\s]+)/', '-', $str);
		$str = '-'.$str.'-';
		$str = str_replace('--', '-', $str);
		$str = substr($str, 1, -1);
		return $str;
	}
	
	public function parse_meta($item)
	{
		$meta = new stdClass();
		$meta->title = "";
		$meta->keywords = "";
		$meta->description = "";
		
		if (!is_null($item)) {
			if (!empty($item->meta_title)) {
				$meta->title = $item->meta_title;
			} else if (!empty($item->title)) {
				$meta->title = $item->title;
			}
			if (!empty($item->meta_key)) {
				$meta->keywords = $item->meta_key;
			}
			if (!empty($item->meta_desc)) {
				$meta->description = $item->meta_desc;
			}
		}
		
		return $meta;
	}

	function pagination($base_url, $total_rows=1, $per_page=10)
	{
		$this->ci->load->library('pagination');
		if (preg_match('/&page=.*/', $base_url)) {
			$base_url = preg_replace('/&page=.*/', null, $base_url);
		}
		
		$config = array();
		$config['base_url']				= $base_url;
		$config['total_rows']			= $total_rows;
		$config['per_page']				= $per_page;
		$config['page_query_string']	= TRUE;
		$config['query_string_segment']	= "page";
		$config['use_page_numbers']		= TRUE;
		
		$config['full_tag_open'] 		= '<ul class="pagination">';
		$config['full_tag_close'] 		= '</ul>';
		
		$config['first_link']			= 'F';
		$config['first_tag_open'] 		= '<li>';
		$config['first_tag_close'] 		= '</li>';
		
		$config['prev_link']			= '&lt;';
		$config['prev_tag_open'] 		= '<li>';
		$config['prev_tag_close'] 		= '</li>';
		
		$config['cur_tag_open'] 		= '<li class="active"><a href="#">';
		$config['cur_tag_close'] 		= '<span class="sr-only">(current)</span></a></li>';
		
		$config['num_tag_open'] 		= '<li>';
		$config['num_tag_close'] 		= '</li>';
		
		$config['next_link']			= '&gt;';
		$config['next_tag_open'] 		= '<li>';
		$config['next_tag_close'] 		= '</li>';
		
		$config['last_link']			= 'L';
		$config['last_tag_open'] 		= '<li>';
		$config['last_tag_close'] 		= '</li>';
		
		$this->ci->pagination->initialize($config);
		
		return $this->ci->pagination->create_links();
	}

	function paginationFrontend($base_url, $total_rows=1, $per_page=10,$type_title=null)
    {
        // $lang = !isset($_COOKIE['nguyenanh_lang'])?'vi':'en';
        // $this->ci->lang->load('content',$lang);
        // $website				= $this->ci->lang->line('website');
        $this->ci->load->library('pagination');
        if (preg_match('/&page=.*/', $base_url)) {
            $base_url = preg_replace('/&page=.*/', NULL, $base_url);
        }
        $total_page = ceil($total_rows / $per_page);
        $page_cur = !empty($_GET['page'])?$_GET['page']:'1';

        $config = array();
        $config['base_url']             = $base_url;
        $config['total_rows']           = $total_rows;
        $config['per_page']             = $per_page;
        $config['page_query_string']    = TRUE;
        $config['query_string_segment'] = 'page';
        $config['use_page_numbers']     = TRUE;

       	$config['full_tag_open']        = '<div class="d-flex align-items-center"><div class="pagination__viewing">    </div><ul class="pagination d-flex justify-content-end align-items-center">';
		//    Trang '.$page_cur.' - '.$total_page.' | '.$total_rows.' '.$type_title.'
		
        $config['full_tag_close']       = '</ul></div>';

        $config['first_link']           = 'Trang Đầu';
        $config['first_tag_open']       = '<li class="d-none d-sm-inline"><div class="pagination__btn"><span class="icon__fallback-text">';
        $config['first_tag_close']      = '</span></div></li>';

        $config['prev_link']            = '<i class="zmdi zmdi-chevron-left"></i>';
        $config['prev_tag_open']        = '<li class="pagination__text">';
        $config['prev_tag_close']       = '</li>';

        $config['cur_tag_open']         = '<li class="pagination__text active"><span>';
        $config['cur_tag_close']        = '</span></li>';

        $config['num_tag_open']         = '<li class="pagination__text">';
        $config['num_tag_close']        = '</li>';

        $config['next_link']            = '<i class="zmdi zmdi-chevron-right"></i>';
        $config['next_tag_open']        = '<li class="pagination__text">';
        $config['next_tag_close']       = '</li>';

        $config['last_link']            = 'Trang Cuối';
        $config['last_tag_open']       = '<li class="d-none d-sm-inline"><div class="pagination__btn"><span class="icon__fallback-text">';
        $config['last_tag_close']      = '</span></div></li>';

        $this->ci->pagination->initialize($config);

        return $this->ci->pagination->create_links();
    }
	
	// function pagination($base_url, $total_rows=1, $per_page=10)
	// {
	// 	$this->ci->load->library('pagination');
	// 	if (preg_match('/&page=.*/', $base_url)) {
	// 		$base_url = preg_replace('/&page=.*/', null, $base_url);
	// 	}
		
	// 	$config = array();
	// 	$config['base_url']				= $base_url;
	// 	$config['total_rows']			= $total_rows;
	// 	$config['per_page']				= $per_page;
	// 	$config['page_query_string']	= TRUE;
	// 	$config['query_string_segment']	= "page";
	// 	$config['use_page_numbers']		= TRUE;
		
	// 	$config['full_tag_open'] 		= '<ul class="pagination">';
	// 	$config['full_tag_close'] 		= '</ul>';
		
	// 	$config['first_link']			= 'F';
	// 	$config['first_tag_open'] 		= '<li>';
	// 	$config['first_tag_close'] 		= '</li>';
		
	// 	$config['prev_link']			= '&lt;';
	// 	$config['prev_tag_open'] 		= '<li>';
	// 	$config['prev_tag_close'] 		= '</li>';
		
	// 	$config['cur_tag_open'] 		= '<li class="active"><a href="#">';
	// 	$config['cur_tag_close'] 		= '<span class="sr-only">(current)</span></a></li>';
		
	// 	$config['num_tag_open'] 		= '<li>';
	// 	$config['num_tag_close'] 		= '</li>';
		
	// 	$config['next_link']			= '&gt;';
	// 	$config['next_tag_open'] 		= '<li>';
	// 	$config['next_tag_close'] 		= '</li>';
		
	// 	$config['last_link']			= 'L';
	// 	$config['last_tag_open'] 		= '<li>';
	// 	$config['last_tag_close'] 		= '</li>';
		
	// 	$this->ci->pagination->initialize($config);
		
	// 	return $this->ci->pagination->create_links();
	// }
	
	function requireUserLogin($login_page=null)
	{
		if(!$this->ci->session->userdata("user")){
			$this->ci->session->set_userdata("return_url", current_url());
			if (!is_null($login_page)) {
				redirect($login_page);
			} else {
				redirect(USR_URL);
			}
		}
	}

	function checkPageError($val)
	{
		if (empty($val)) {
			redirect("error404", "location");
		}
	}

	function require_admin_login($login_page=null)
    {
        if ($this->ci->session->userdata("agent_id") != ADMIN_AGENT_ID
            || !$this->ci->session->userdata("admin")
            || (!in_array($this->ci->session->userdata("admin")->user_type, array(USR_MOD, USR_ADMIN, USR_SUPPER_ADMIN)))) {
            $this->ci->session->set_userdata("return_url", current_url());
            if (!is_null($login_page)) {
                redirect($login_page);
            } else {
                redirect(ADMIN_URL);
            }
        }
    }

    public function upload_file($file_path=null,$file_name=null,$file_deleted=null,$allow_type='rar|zip|pdf|doc|docx|PDF|DOC|DOCX|xls|xlsx|csv'){

        $this->config =  array(
                  'upload_path'     => $file_path, // duong dan path
                  'upload_url'      => base_url().str_replace('./','',$file_path), // duong dan hinh anh
                  'allowed_types'   => $allow_type, // dinh dang file

                  'overwrite'       => TRUE,
                  'max_size'        => 8000, // dung luong anh khong qua 8M
                );
        $this->ci->load->library("upload", $this->config);
        if (!empty($file_name)){
            if($this->ci->upload->do_upload($file_name)){
                if (file_exists($file_deleted)){
                    unlink($file_deleted);
                }
                $file_data = $this->ci->upload->data();
                $temp = explode('.',$_FILES[$file_name]["name"]);
                rename($file_data['full_path'],$file_data['file_path'].$this->slug($temp[0]).'.'.$temp[1]);
				return $file_data;
            }
            return false;
        }else{
            return false;
        }
        
    }
    public function to_vn_date($date) {
        $date_time = strtotime($date);
        $day = date('N', $date_time);
        $vn_days = array('Hôm nay','Thứ 2', 'Thứ 3', 'Thứ 4', 'Thứ 5', 'Thứ 6', 'Thứ 7', 'CN');
        $result = ((date('Y-m-d', $date_time) == date('Y-m-d')) ? 'Hôm nay' : $vn_days[($day)]).' - '.date('H:i d/m/Y', $date_time);
        return $result;
    }
	
	public function detect_mobile(){
        if(strstr(strtolower($_SERVER['HTTP_USER_AGENT']), 'mobile') || strstr(strtolower($_SERVER['HTTP_USER_AGENT']), 'android')) { 
            return true;
        } else {
            return false;
        }
    }
}
?>