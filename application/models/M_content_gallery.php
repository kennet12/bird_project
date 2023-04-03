<?
class M_content_gallery extends M_db
{
	public function __construct()
	{
		parent::__construct();
		
		$this->_table = "m_content_gallery";
	}
	
	public function items($info=null,$limit=null, $offset=null, $order_by=null, $sort_by='DESC')
	{
		$sql = "SELECT * FROM {$this->_table} WHERE 1 = 1";
		if (!is_null($info)) {
			if (!empty($info->content_id)) {
				$sql .= " AND content_id = '{$info->content_id}'";
			}
			if (isset($info->stt) && !is_null($info->stt)) {
				$sql .= " AND stt = '{$info->stt}'";
			}
		}
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