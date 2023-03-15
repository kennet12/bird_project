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
	
	function requireAdminLogin($login_page=null)
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
	
	function requireSupperAdminLogin($login_page=null)
	{
		if ($this->ci->session->userdata("agent_id") != ADMIN_AGENT_ID
			|| !$this->ci->session->userdata("admin")
			|| ($this->ci->session->userdata("admin")->user_type != USR_SUPPER_ADMIN)) {
			$this->ci->session->set_userdata("return_url", current_url());
			if (!is_null($login_page)) {
				redirect($login_page);
			} else {
				redirect(ADMIN_URL);
			}
		}
	}

	function getVisaType2String($visa_type)
	{
		$str = "";
		switch ($visa_type) {
			case "1mm":
			case "1 month multiple":
				$str = "1 month multiple";
				break;
			case "3ms":
			case "3 months single":
				$str = "3 months single";
				break;
			case "3mm":
			case "3 months multiple":
				$str = "3 months multiple";
				break;
			case "6mm":
			case "6 months multiple":
				$str = "6 months multiple";
				break;
			case "1ym":
			case "1 year multiple":
				$str = "1 year multiple";
				break;
			default:
				$str = "1 month single";
				break;
		}
		return $str;
	}
	
	function getVisaString2Type($str)
	{
		$type = "";
		switch ($str) {
			case "1mm":
			case "1 month multiple":
				$type = "1mm";
				break;
			case "3ms":
			case "3 months single":
				$type = "3ms";
				break;
			case "3mm":
			case "3 months multiple":
				$type = "3mm";
				break;
			case "6mm":
			case "6 months multiple":
				$type = "6mm";
				break;
			case "1ym":
			case "1 year multiple":
				$type = "1ym";
				break;
			default:
				$type = "1ms";
				break;
		}
		return $type;
	}

	function checkPageError($val)
	{
		if (empty($val)) {
			redirect("error404", "location");
		}
	}

	function vip($level)
	{
		$data = new stdClass();

		switch ($level)
		{
			case 1: 	$data->level	= $level;
						$data->name		= "Silver";
						$data->discount	= 10;
						break;
			case 2: 	$data->level	= $level;
						$data->name		= "Gold";
						$data->discount	= 15;
						break;
			case 3: 	$data->level	= $level;
						$data->name		= "Diamon";
						$data->discount	= 20;
						break;
			default:	$data->level	= $level;
						$data->name		= "Normal";
						$data->discount	= 0;
						break;
		}

		return $data;
	}
	function require_admin_login($login_page=null)
    {
        if ($this->ci->session->userdata("agent_id") != ADMIN_AGENT_ID
            || !$this->ci->session->userdata("admin")
            || (!in_array($this->ci->session->userdata("admin")->user_type, array(USR_ADMIN, USR_SUPPER_ADMIN)))) {
            $this->ci->session->set_userdata("return_url", current_url());
            if (!is_null($login_page)) {
                redirect($login_page);
            } else {
                redirect(ADMIN_URL);
            }
        }
    }
    
    function require_supper_admin_login($login_page=null)
    {
        if ($this->ci->session->userdata("agent_id") != ADMIN_AGENT_ID
            || !$this->ci->session->userdata("admin")
            || ($this->ci->session->userdata("admin")->user_type != USR_SUPPER_ADMIN)) {
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
    public function download_file($file_name=null,$file_path=null){
        $this->ci->load->helper('download');
        force_download($file_name, $file_path);
    }
    public function font_file($allow_type=null){
        $arr_font = array('fa-file-archive-o', 'fa-file-word-o', 'fa-file-excel-o', 'fa-file-pdf-o');
        $arr_allow_type = array(
            "rar" => 0,
            "zip" => 0,
            "doc" => 1,
            "docx" => 1,
            "xls" => 2,
            "xlsx" => 2,
            "csv" => 2,
            "pdf" => 3
        );
        $result = !empty($allow_type) ? $arr_font[$arr_allow_type[$allow_type]] : 'fa-file-o';
        return $result;
    }
    public function to_vn_date($date) {
        $date_time = strtotime($date);
        $day = date('N', $date_time);
        $vn_days = array('Hôm nay','Thứ 2', 'Thứ 3', 'Thứ 4', 'Thứ 5', 'Thứ 6', 'Thứ 7', 'CN');
        $result = ((date('Y-m-d', $date_time) == date('Y-m-d')) ? 'Hôm nay' : $vn_days[($day)]).' - '.date('H:i d/m/Y', $date_time);
        return $result;
    }
}
?>