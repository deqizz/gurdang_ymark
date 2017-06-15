<?php
class Barang_model extends CI_Model {
	
	function __construct() {
		parent::__construct();
	}
	
	function get($where = NULL){
		$this->db->select('barang.*, kategori.nama as nama_kategori');
		$this->db->from('barang');
		$this->db->join('kategori', 'barang.kode_kategori = kategori.kode_kategori');
		if($where != NULL){
			$this->db->where($where);
		}
		$this->db->order_by('kode_brg','ASC');
		return $this->db->get();
	}

	function add($data){
		$query = $this->db->insert('barang', $data);
		// $this->db->insert();
		return $query;
	}
	
	function edit($kode_brg, $data){
		$this->db->where('kode_brg', $kode_brg);
		$this->db->update('barang', $data);
		return $kode_brg;
	}
	
	function delete($kode_brg){
		$this->db->where('kode_brg', $kode_brg);
		$this->db->delete('barang');
	}

	function update_brg($kode_brg, $jml_brg_update){
		$this->db->where('kode_brg', $kode_brg);
		$this->db->set('jml_brg', $jml_brg_update);
		$this->db->update('barang');
		return $kode_brg;
	}

}