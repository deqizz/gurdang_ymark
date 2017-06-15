<?php
class Catatan_bk_model extends CI_Model {
	
	function __construct() {
		parent::__construct();
	}
	
	function get($where = NULL){
		$this->db->select('catatan_bk.*, barang.nama_brg as nama_brg');
		$this->db->from('catatan_bk');
		$this->db->join('barang','catatan_bk.kode_brg = barang.kode_brg');
		if($where != NULL){
			$this->db->where($where);
		}
		$this->db->order_by('kode_catatan_bk','ASC');
		return $this->db->get();
	}

	function add($data){
		$query = $this->db->insert('catatan_bk', $data);
		// $this->db->insert();
		return $query;
	}
	
	function edit($kode_catatan_bk, $data){
		$this->db->where('kode_catatan_bk', $kode_catatan_bk);
		$this->db->update('catatan_bk', $data);
		return $kode_catatan_bk;
	}
	function delete($id){
		$this->db->where('kode_catatan_bk', $id);
		$this->db->delete('catatan_bk');
	}
}