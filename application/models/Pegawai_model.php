<?php
class Pegawai_model extends CI_Model {
	
	function __construct() {
		parent::__construct();
	}
	
	function get($where = NULL){
		$this->db->select('*');
		$this->db->from('pegawai');
		$this->db->join('user_login', 'pegawai.user_login_id = user_login.id');
		if($where != NULL){
			$this->db->where($where);
		}
		$this->db->order_by('nip','ASC');
		return $this->db->get();
	}


	function add($data){
		$query = $this->db->insert('pegawai', $data);
		// $this->db->insert();
		return $query;
	}
	
	function edit($nip, $data){
		$this->db->where('nip', $nip);
		$this->db->update('pegawai', $data);
		return $id_customer;
	}
	
	function delete($nip){
		$this->db->where('user_login_id', $nip);
		$this->db->delete('pegawai');
		$this->db->where('id', $nip);
		return $this->db->delete('user_login');
	}
	function is_password_admin($pass, $id){
        $this->db->where(array('password = '=> $pass));
        // if($id > 0){
        //     $this->db->where(array('id = '=> $id,'role = '=> 1));
        // }
        $result = $this->db->get('user_login')->row_array();
        return $result;
    }
    function is_password($pass, $id){
        $this->db->where(array('password = '=> $pass,'id = '=> $id));
        // if($id > 0){
        //     $this->db->where(array('id = '=> $id,'role = '=> 1));
        // }
        $result = $this->db->get('user_login')->row_array();
        return $result;
    }
    
	function change_pass($where, $data) {
        // if($data['password'] != NULL){
        //  $data['password'] = $this->get_hash($data['username'], $data['password']);
        // }
        $this->db->where($where);
        return $this->db->update('user_login', $data);
    }
}