<?php
class Kategori_model extends CI_Model {
	
	function __construct() {
		parent::__construct();
	}
	
	function get($where = NULL){
		$this->db->select('*');
		$this->db->from('kategori');
		if($where != NULL){
			$this->db->where($where);
		}
		$this->db->order_by('kode_kategori','ASC');
		return $this->db->get();
	}

	function add($data){
		$query = $this->db->insert('kategori', $data);
		// $this->db->insert();
		return $query;
	}
	
	function edit($kode_kategori, $data){
		$this->db->where('kode_kategori', $kode_kategori);
		$this->db->update('kategori', $data);
		return $kode_kategori;
	}
	
	function delete($id){
		$this->db->where('kode_kategori', $id);
		$this->db->delete('kategori');
	}
}