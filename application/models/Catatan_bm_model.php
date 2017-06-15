<?php
class Catatan_bm_model extends CI_Model {
	
	function __construct() {
		parent::__construct();
	}
	
	function get($where = NULL){
		$this->db->select('catatan_bm.*, barang.nama_brg as nama_brg, barang.harga as harga');
		$this->db->from('catatan_bm');
		$this->db->join('barang','catatan_bm.kode_brg = barang.kode_brg');
		if($where != NULL){
			$this->db->where($where);
		}
		$this->db->order_by('kode_catatan_bm','ASC');
		return $this->db->get();
	}

	function add($data){
		$query = $this->db->insert('catatan_bm', $data);
		// $this->db->insert();
		return $query;
	}
	
	function edit($kode_catatan_bm, $data){
		$this->db->where('kode_catatan_bm', $kode_catatan_bm);
		$this->db->update('catatan_bm', $data);
		return $kode_catatan_bm;
	}
	
	function delete($id){
		$this->db->where('kode_catatan_bm', $id);
		$this->db->delete('catatan_bm');
	}
}