<?php
class M_product extends M_db
{
	public function __construct()
	{
		parent::__construct();
		
		$this->_table = "m_product";
	}
	
	public function items($info=null, $active=null, $limit=null, $offset=null, $order_by=null, $sort_by='DESC')
	{
		$sql ="SELECT DISTINCT
		I.*, C.alias AS 'category_alias', '0' AS 'child_num',
		G.thumbnail as gallery
		FROM
		m_product as I 
		
		INNER JOIN 
		m_product_categories as C 
		ON (C.id = I.category_id)
		
		LEFT JOIN 
		m_product_gallery as G 
		ON (G.product_id = I.id) 
		WHERE 1 = 1";

		if (!is_null($info)) {
			if (!empty($info->category_id)) {
				$sql .= " AND I.category_id = '{$info->category_id}'";
			}
			if (!empty($info->search)) {
				$info->search = trim($info->search);
				$sql .= " AND (I.title LIKE '%{$info->search}%')";
			}
			if (!empty($info->category_id_3_6)) {
				$sql .= " AND (I.category_id = '3' OR I.category_id = '6')";
			}
		}
		
		if (!is_null($active)) {
			$sql .= " AND I.active = '{$active}'";
		}
		$sql .= " AND I.deleted = '0'";
		if (!empty($order_by)) {
			$sql .= " ORDER BY I.{$order_by} {$sort_by}";
		} else {
			$sql .= " ORDER BY I.created_date DESC";
		}
		if (!is_null($limit)) {
			$sql .= " LIMIT {$limit}";
		}
		if (!is_null($offset)) {
			$sql .= " OFFSET {$offset}";
		}

		$query = $this->db->query($sql);
		// var_dump($sql);
		return $query->result();
	}
	
	public function relative_items ($info=null, $ids, $active=null, $limit=null, $offset=null, $order_by=null, $sort_by='DESC') {
		$sql   = "SELECT * FROM m_product  WHERE 1 = 1";
		foreach ($ids as $id) {
			$sql .= " AND id <> '{$id}'";
		}
		if (!is_null($info)) {
			if (!empty($info->category_id)) {
				$sql .= " AND category_id = '{$info->category_id}'";
			}
		}
		if (!is_null($active)) {
			$sql .= " AND active = '{$active}'";
		}
		$sql .= " AND deleted = '0'";
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

	public function count_relative_items($info=null, $ids, $active=null, $order_by=null, $sort_by='DESC') {
		$sql   = "SELECT COUNT(*) FROM m_product  WHERE 1 = 1";
		foreach ($ids as $id) {
			$sql .= " AND id <> '{$id}'";
		}
		if (!is_null($info)) {
			if (!empty($info->category_id)) {
				$sql .= " AND category_id = '{$info->category_id}'";
			}
		}
		if (!is_null($active)) {
			$sql .= " AND active = '{$active}'";
		}
		$sql .= " AND deleted = '0'";
		if (!empty($order_by)) {
			$sql .= " ORDER BY {$order_by} {$sort_by}";
		} else {
			$sql .= " ORDER BY created_date DESC";
		}
		$query = $this->db->query($sql);
		$result = $query->row_array();
		return (int)$result['COUNT(*)'];
	}

	public function count_items($info=null, $active=null)
	{
		$sql = "SELECT COUNT(*) FROM m_product WHERE 1 = 1";
		if (!is_null($info)) {
			if (!empty($info->category_id)) {
				$sql .= " AND category_id = '{$info->category_id}'";
			}
		}
		if (!is_null($active)) {
			$sql .= " AND active = '{$active}'";
		}
		$sql .= " AND deleted = '0'";
		$query = $this->db->query($sql);
		$result = $query->row_array();
		return (int)$result['COUNT(*)'];
	}

	public function getItems($info=null, $active=null)
	{
		$sql = "SELECT I.*, C.alias AS 'category_alias', '0' AS 'child_num' FROM m_product AS I INNER JOIN m_product_categories AS C ON (I.category_id = C.id) WHERE 1 = 1";
		if (!is_null($info)) {
			if (!empty($info->category_id)) {
				$sql .= " AND I.category_id = '{$info->category_id}'";
			}
			if (!empty($info->id)) {
				$sql .= " AND I.id > '{$info->id}'";
			}
		}
		if (!is_null($active)) {
			$sql .= " AND I.active = '{$active}'";
		}
		echo $sql;
		$query = $this->db->query($sql);
		return $query->result();
	}



	// public function items_b($info=null, $active=null, $limit=null, $offset=null, $order_by=null, $sort_by='DESC')
	// {
		
	// 	$sql ="SELECT DISTINCT
	// 	pd.*, 
	// 	pdc.*,

	// 	FROM
	// 	m_product as pd 
		
	// 	INNER JOIN 
	// 	m_product_categories as pdc 
	// 	ON (pdc.id = pd.category_id)
		
	// 	WHERE 1 = 1";

	// 	if(!is_null($info))
	// 	{
	// 		if(!empty($info->$category_id))
	// 		{
	// 			$sql .=" AND pd.category_id = '{$info->$category_id}'";
	// 		}
	// 	}
	// 	if(!is_null($active))
	// 	{
	// 		$sql .= " AND pd.active  = '{$active}'";
	// 	}
	// 	$sql .= " AND pd.deleted = '0'";
	// 	if (!empty($order_by)) {
	// 		$sql .= " ORDER BY pd.{$order_by} {$sort_by}";
	// 	} else {
	// 		$sql .= " ORDER BY pd.created_date DESC";
	// 	}
	// 	if (!is_null($limit)) {
	// 		$sql .= " LIMIT {$limit}";
	// 	}
	// 	if (!is_null($offset)) {
	// 		$sql .= " OFFSET {$offset}";
	// 	}
	// 	$query = $this->db->query($sql);
	// 	// var_dump($sql);
	// 	return $query->result();

	// }

}
?>