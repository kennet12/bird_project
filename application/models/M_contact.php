<?
class M_contact extends M_db
{
	public function __construct()
	{
		parent::__construct();
		
		$this->_table = "m_contact";
	}
	public function items($info=null, $limit=null, $offset=null, $order_by=null, $sort_by='DESC')
	{
		$sql = "SELECT * FROM {$this->_table} WHERE 1 = 1";
		if (!is_null($info)) {
			if (!empty($info->type)) {
				$sql .= " AND {$this->_table}.type = '{$info->type}'";
			}
			if (!empty($info->search)) {
				$info->search = trim($info->search);
				$sql .= " AND ({$this->_table}.phone LIKE '%{$info->search}%' OR {$this->_table}.email = '{$info->search}' OR {$this->_table}. name LIKE '%{$info->search}%')";
			}
		}

		$sql .= " AND {$this->_table}.deleted = '0'";
		if (!empty($order_by)) {
			$sql .= " ORDER BY {$this->_table}.{$order_by} {$sort_by}";
		} else {
			$sql .= " ORDER BY {$this->_table}.created_date DESC";
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