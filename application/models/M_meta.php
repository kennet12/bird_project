<?php
class M_meta extends M_db
{
	public function __construct()
	{
		parent::__construct();
		
		$this->_table = "m_meta";
	}
	
	function items($info=NULL, $active=NULL, $limit=NULL, $offset=NULL)
	{
		$sql = "SELECT * FROM {$this->_table} WHERE 1 = 1";
		
		if (!is_null($info)) {
			if (!empty($info->url)) {
				$info->url = str_replace("//", "/", $info->url."/");
				$info->url = substr($info->url, 0, -1);
				$sql .= " AND ({$this->_table}.url = 'http://{$info->url}' OR {$this->_table}.url = 'http://{$info->url}/' OR {$this->_table}.url = 'https://{$info->url}' OR {$this->_table}.url = 'https://{$info->url}/')";
			}
		}
		if (!is_null($active)) {
			$sql .= " AND {$this->_table}.active = '{$active}'";
		}
		if (!is_null($limit)) {
			$sql .= " LIMIT {$limit}";
		}
		if (!is_null($offset)) {
			$sql .= " OFFSET {$offset}";
		}
		
		$query = $this->db->query($sql);
		return $query->result();
	}
}
?>