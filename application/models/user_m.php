<?php
class User_m extends CI_Model{
	var $admin = "admin";

	function __construct()
	{
		parent::__construct();
	}

	function getlist($per_page, $offset){
		if ($offset != 0) $offset = ($offset-1) * $per_page;
		$this->db->select('*');
		$this->db->from($this->admin);
		$this->db->where('level','user');
		$this->db->limit($per_page, $offset);
		$query = $this->db->get();
		if ($query->num_rows() > 0) return $query->result_array();
		return false;
	}

	function total_user()
	{
			return $this->db->count_all_results($this->admin);
	}

	function create($data)
	{
		return $this->db->insert($this->admin, $data);
	}

	function update($id_admin, $data)
	{
		$this->db->where('id_admin', $id_admin);
		return $this->db->update($this->admin, $data);
	}

	function remove($id_admin)
	{
		$this->db->where('id_admin', $id_admin);
		return $this->db->delete($this->admin);
	}

	function detail($id_admin)
	{
		$this->db->where('id_admin', $id_admin);
		$query = $this->db->get($this->admin);
		return $query->result_array();
	}
}
?>
