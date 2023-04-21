<?php
class M_order extends M_db
{
	public function __construct()
	{
		parent::__construct();
		
		$this->_table = "m_order";
	}
	
	public function items($info=null, $limit=null, $offset=null, $order_by=null, $sort_by='DESC')
	{
		$sql = "SELECT * FROM {$this->_table} WHERE 1 = 1";
		if (!is_null($info)) {
			if (!empty($info->fromDate) && !empty($info->toDate)) {
				$sql .= " AND created_date >= '{$info->fromDate}'";
				$sql .= " AND created_date <= '{$info->toDate}'";
			}
			if (!empty($info->fromDate) && empty($info->toDate)) {
				$sql .= " AND created_date LIKE '{$info->fromDate}%'";
			}
		}

		if (!empty($order_by)) {
			$sql .= " ORDER BY {$order_by} {$sort_by}";
		} else {
			$sql .= " ORDER BY created_date DESC";
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