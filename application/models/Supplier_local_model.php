<?php
class supplier_local_model extends CI_Model {
	
	function __construct() {
		parent::__construct();
	}
	
	function get($where = NULL){
		$this->db->select('*');
		$this->db->from('supplier_local');
		if($where != NULL){
			$this->db->where($where);
		}
		$this->db->order_by('id_supplier','ASC');
		return $this->db->get();
	}

	function add($data){
		$query = $this->db->insert('supplier_local', $data);
		// $this->db->insert();
		return $query;
	}
	
	function edit($id_supplier, $data){
		$this->db->where('id_supplier', $id_supplier);
		$this->db->update('supplier_local', $data);
		return $id_supplier;
	}
	
	function delete($id){
		$this->db->where('id_supplier', $id);
		$this->db->delete('supplier_local');
	}
}