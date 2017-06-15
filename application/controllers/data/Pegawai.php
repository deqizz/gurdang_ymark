<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pegawai extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function __construct()
	{
		parent::__construct();
		$this->load->model(array('login_model','user_model','pegawai_model'));
		$this->load->library('upload');
	}
	public function index(){
		//ngambil data user dari database
		$user = $this->login_model->get();
		$data['userdata'] = $user;

		//check role kalo bukan admin langsung di redirect ke halaman depan


		//init layout
		$data['navbar']='data/navbar_admin';
		$data['content']='data/pegawai_content';
		$data['slide']=null;

		if ($user['role'] == 1) {
			$data['sidebar']='bag_gudang/sidebar_bag_gudang';
		} elseif ($user['role'] == 2) {
			$data['sidebar']='bag_keuangan/sidebar_bag_keuangan';
		} elseif ($user['role'] == 3) {
			$data['sidebar']='bag_pemasaran/sidebar_bag_pemasaran';
		} elseif ($user['role'] == 0) {
			$data['sidebar']='admin/sidebar_admin';
		}
		$data['title']='Pegawai';

		//init data
		
		$data['pegawai'] = $this->pegawai_model->get()->result_array();


		$data['scripts'] = ['js/data/pegawai.js','plugin/form-validation/jquery.validate.min.js','plugin/form-validation/extjquery.validate.min.js','plugin/bootbox/bootbox.js'];
		$this->load->view('data/tamplate_admin',$data);
	}
	function check_password(){
        $pass = md5($_POST['old_password']);
        $id = $_POST['id'];
        $data = $this->pegawai_model->is_password($pass, $id);
        if($data){
            $result = true;
        }else{
            $result = false;
        }

        echo json_encode($result);
    }
    
    function change_pass(){
   	 	$data['password'] = md5($_POST['new_password']);
	 	$id = $_POST['id'];
	    if($this->pegawai_model->change_pass(array('id'=>$id),$data)){
	        echo "1";
	    }else{
	        echo "0";
	    }

    }
    function check_code(){
        $code = $_POST['email'];
        $id = $_POST['id'];
        $data = $this->pegawai_model->is_code_exist($code, $id);
        if($data){
            $result = false;
        }else{
            $result = true;
        }

        echo json_encode($result);
    }
    public function post(){
    	if($_POST['nip'] == 0){
    		$ket = $_POST['keterangan'];

    		if ($ket == 'bag_gudang') {
	        	$kd = '01';
	        }else if ($ket == 'bag_pemasaran') {
	        	$kd = '03';
	        }else if ($ket == 'bag_keuangan') {
	        	$kd = '02';
	        }else if ($ket == 'admin') {
	        	$kd = '00';
	        }
			$this->db->select('RIGHT(pegawai.nip,3) as kode');
			$this->db->where('pegawai.keterangan', $ket); 
			$this->db->order_by('kode','DESC');
			$this->db->limit(1); 
  			$query = $this->db->get('pegawai'); 
 
  			//cek dulu apakah ada sudah ada kode di tabel.   
  			if($query->num_rows() <> 0){ 
   				//jika kode ternyata sudah ada.    
  				$temp = $query->row();    
  				$kode = intval($temp->kode) + 1; 
  			}else{ 
   				//jika kode belum ada    
  				$kode = 1; 
  			}
  			$kodemax = str_pad($kode, 3, "0", STR_PAD_LEFT);
    		$data_user['username'] = $_POST['username'];
	        $data_user['password'] = md5($_POST['password']);
	        if ($ket == 'bag_gudang') {
	        	$data_user['role'] = 1;
	        }else if ($ket == 'bag_pemasaran') {
	        	$data_user['role'] = 3;
	        }else if ($ket == 'bag_keuangan') {
	        	$data_user['role'] = 2;
	        }else if ($ket == 'admin') {
	        	$data_user['role'] = 0;
	        }
    		if($user_id = $this->user_model->add_user_login($data_user)){
		        $data['nip'] = $kd.$kodemax;
        		$data['nama_depan'] = $_POST['nama_depan'];
        		$data['nama_belakang'] = $_POST['nama_belakang'];
	    		$data['tgl_lahir'] = $_POST['tgl_lahir'];
	    		$data['keterangan'] = $_POST['keterangan'];
        		$data['user_login_id'] = $user_id;
            	$this->pegawai_model->add($data);
                echo "1";
            }else{
                echo "0";
            }
        }else{
        	$data_user['username'] = $_POST['username'];
	        $data_user['password'] = md5($_POST['password']);
	        $data['keterangan'] = $_POST['keterangan'];
	        if ($data['keterangan'] == 'bag_gudang') {
	        	$data_user['role'] = 1;
	        }else if ($data['keterangan'] == 'bag_pemasaran') {
	        	$data_user['role'] = 3;
	        }else if ($data['keterangan'] == 'bag_keuangan') {
	        	$data_user['role'] = 2;
	        }else if ($data['keterangan'] == 'admin') {
	        	$data_user['role'] = 0;
	        }
    		$this->user_model->update_user_login($_POST['user_login_id'],$data_user);
        		$data['nama_depan'] = $_POST['nama_depan'];
        		$data['nama_belakang'] = $_POST['nama_belakang'];
	    		$data['tgl_lahir'] = $_POST['tgl_lahir'];
	    		$data['keterangan'] = $_POST['keterangan'];
            	$this->pegawai_model->edit($_POST['nip'],$data);
                echo "1";
            
        }
    }
    public function get_by_id(){
        $id = $_POST['idx'];
        $result = $this->pegawai_model->get(array("nip"=>$id))->row_array();
        echo json_encode($result);
    }
    public function delete(){
        $id = $_POST['id'];
        if($this->pegawai_model->delete($id)){
            echo "1";
        }else{
            echo "0";
        }
    }



}
