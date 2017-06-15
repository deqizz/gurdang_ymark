<?php
class Tunggakan_model extends CI_Model {
	
	function __construct() {
		parent::__construct();
	}
	
	function get($where = NULL){
		$this->db->select('*');
		$this->db->from('tunggakan');
		if($where != NULL){
			$this->db->where($where);
		}
		$this->db->order_by('kode_tunggakan','ASC');
		return $this->db->get();
	}

	function add($data){
		$query = $this->db->insert('tunggakan', $data);
		// $this->db->insert();
		return $query;
	}
	
	function edit($kode_tunggakan, $data){
		$this->db->where('kode_tunggakan', $kode_tunggakan);
		$this->db->update('tunggakan', $data);
		return $kode_tunggakan;
	}
	
	function delete($id){
		$this->db->where('kode_tunggakan', $id);
		$this->db->delete('tunggakan');
	}
	function get_catatan_bm($where = NULL){
		$this->db->select('*');
		$this->db->from('catatan_bm');
		if($where != NULL){
			$this->db->where($where);
		}
		$this->db->order_by('kode_catatan_bm','ASC');
		return $this->db->get();
	}
}