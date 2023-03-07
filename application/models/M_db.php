<?php
class M_db extends CI_Model {
	
	public $_table;
	
	public function instance()
	{
		$obj = new stdClass();
		
		$fields = $this->db->field_data($this->_table);
		foreach ($fields as $field) {
			if (in_array(strtolower($field->type), array("bigint", "tinyint", "double", "float", "int", "integer"))) {
				if (!empty($field->default)) {
					$obj->{$field->name} = $field->default;
				} else {
					$obj->{$field->name} = 0;
				}
			}
			else if (in_array(strtolower($field->type), array("varchar", "text"))) {
				if (!empty($field->default)) {
					$obj->{$field->name} = $field->default;
				} else {
					$obj->{$field->name} = "";
				}
			}
		}
		
		return $obj;
	}
	
	public function load($id)
	{
		$sql = "SELECT * FROM {$this->_table} WHERE 1 = 1";
		if (is_numeric($id)) {
			$sql .= " AND id = '{$id}'";
		} else if ($this->db->field_exists("alias", $this->_table)) {
			$sql .= " AND alias = '{$id}'";
		} else if ($this->db->field_exists("alias_question", $this->_table)) {
			$sql .= " AND alias_question = '{$id}'";
		} else if ($this->db->field_exists("code", $this->_table)) {
			$sql .= " AND code = '{$id}'";
		}
		$query = $this->db->query($sql);
		if ($query->num_rows() > 0) {
			return $query->row();
		}
		return null;
	}
	
	public function get_max_value($column="id")
	{
		$sql   = "SELECT MAX({$column}) AS val FROM {$this->_table}";
		$query = $this->db->query($sql);
		if ($query->num_rows() > 0) {
			$row = $query->row();
			return $row->val;
		}
		return 0;
	}
	
	public function get_next_value($column="id")
	{
		return $this->get_max_value($column) + 1;
	}
	
	public function log($data)
	{
		if (strtolower($this->router->fetch_class()) == "syslog") {
			$user = $this->session->userdata("admin");
		} else {
			$user = $this->session->userdata("user");
		}
		if (!empty($user)) {
			if ($this->db->field_exists("updated_by", $this->_table)) {
				$data["updated_by"] = $user->id;
			}
			if ($this->db->field_exists("updated_date", $this->_table)) {
				$data["updated_date"] = date($this->config->item("log_date_format"));
			}
		}
		return $data;
	}
	
	public function order_up($id)
	{
		$item = $this->load($id);
		
		$sql = "SELECT * FROM {$this->_table} WHERE 1 = 1";
		if ($this->db->field_exists("parent_id", $this->_table)) {
			$sql .= " AND parent_id = '{$item->parent_id}'";
		}
		if ($this->db->field_exists("category_id", $this->_table)) {
			$sql .= " AND category_id = '{$item->category_id}'";
		}
		$sql .= " ORDER BY order_num ASC";
		$query = $this->db->query($sql);
		$items = $query->result();
		
		$idx = sizeof($items);
		for ($i=0; $i<sizeof($items); $i++) {
			if ($items[$i]->id == $id) {
				$idx = $i;
			}
		}
		
		for ($i=0; $i<=($idx-2); $i++) {
			$data = array("order_num" => $i);
			$where = array("id" => $items[$i]->id);
			$this->db->update($this->_table, $data, $where);
		}
		
		for ($i=($idx-1); $i<=$idx; $i++) {
			$data = array("order_num" => ($i+1));
			$where = array("id" => $items[$i]->id);
			$this->db->update($this->_table, $data, $where);
		}
		
		for ($i=($idx+1); $i<sizeof($items); $i++) {
			$data = array("order_num" => $i);
			$where = array("id" => $items[$i]->id);
			$this->db->update($this->_table, $data, $where);
		}
		
		$data = array("order_num" => ($idx-1));
		$where = array("id" => $id);
		$this->update($data, $where);
	}
	
	public function order_down($id)
	{
		$item = $this->load($id);
		
		$sql = "SELECT * FROM {$this->_table} WHERE 1 = 1";
		if ($this->db->field_exists("parent_id", $this->_table)) {
			$sql .= " AND parent_id = '{$item->parent_id}'";
		}
		if ($this->db->field_exists("category_id", $this->_table)) {
			$sql .= " AND category_id = '{$item->category_id}'";
		}
		$sql .= " ORDER BY order_num ASC";
		$query = $this->db->query($sql);
		$items = $query->result();
		
		$idx = sizeof($items);
		for ($i=0; $i<sizeof($items); $i++) {
			if ($items[$i]->id == $id) {
				$idx = $i;
			}
		}
		
		for ($i=0; $i<$idx; $i++) {
			$data = array("order_num" => $i);
			$where = array("id" => $items[$i]->id);
			$this->db->update($this->_table, $data, $where);
		}
		
		for ($i=$idx; $i<=($idx+1); $i++) {
			$data = array("order_num" => ($i-1));
			$where = array("id" => $items[$i]->id);
			$this->db->update($this->_table, $data, $where);
		}
		
		for ($i=($idx+2); $i<sizeof($items); $i++) {
			$data = array("order_num" => $i);
			$where = array("id" => $items[$i]->id);
			$this->db->update($this->_table, $data, $where);
		}
		
		$data = array("order_num" => ($idx+1));
		$where = array("id" => $id);
		$this->update($data, $where);
	}
	
	public function view($id)
	{
		$item = $this->load($id);
		$data = array("view_num" => ($item->view_num + 1));
		$this->db->where('id',$item->id);
		$this->db->update($this->_table, $data);
	}
	
	public function add($data)
	{
		if ($this->db->field_exists("created_date", $this->_table)) {
			$data["created_date"] = date($this->config->item("log_date_format"));
		}
		return $this->db->insert($this->_table, $this->log($data));
	}
	
	public function update($data, $where)
	{
		return $this->db->update($this->_table, $this->log($data), $where);
	}
	public function delete($where)
	{
		$data = array("deleted" => 1);
		$this->update($data, $where);
	}
	
	public function remove($where)
	{
		return $this->db->delete($this->_table, $where);
	}
	public function export_csv($filename,$arr_select,$info){
		$this->load->dbutil();
		$this->load->helper('file');
		$this->load->helper('download');
		$delimiter = ",";
		$newline = "\r\n";
		$filename .= '.csv';
		$sql = "SELECT {$arr_select} FROM {$this->_table} WHERE 1 AND deleted = 0";
		if (!is_null($info)) {
			foreach ($info as $key => $value) {
				if (!empty($value)) {
					$sql .= " AND {$key} = '{$value}'";
				}
			}
		}
		$result = $this->db->query($sql);
		$data = $this->dbutil->csv_from_result($result,$delimiter,$newline);
		force_download($filename, $data);
	}
	public function count($info=null, $active=null)
	{
		$sql = "SELECT COUNT(*) FROM {$this->_table} WHERE 1 = 1";
		foreach ($info as $key => $value) {
			$sql .= " AND {$key} = '{$value}'";
		}
		if (!is_null($active)) {
			$sql .= " AND active = '{$active}'";
		}
		$sql .= " AND deleted = '0'";
		$query = $this->db->query($sql);
		$result = $query->row_array();
		return (int)$result['COUNT(*)'];
	}
}
?>