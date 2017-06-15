<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Catatan_bk extends CI_Controller {

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
		$this->load->model(array('catatan_bk_model','login_model','user_model','barang_model','pegawai_model'));
		$this->load->library('upload');
	}
	public function index(){
		//ngambil data user dari database
		$user = $this->login_model->get();
		$data['userdata'] = $user;

		//check role kalo bukan admin langsung di redirect ke halaman depan


		//init layout
		$data['navbar']='data/navbar_admin';
		$data['content']='data/catatan_bk_content';
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
		$data['title']='Catatan Barang Keluar';

		//init data
		$data['barang'] = $this->barang_model->get()->result_array();
		$data['pegawai'] = $this->pegawai_model->get((array("keterangan"=>'bag_pemasaran')))->result_array();
		$data['catatan_bk'] = $this->catatan_bk_model->get()->result_array();

		$data['scripts'] = ['js/data/general.js','js/data/catatan_bk.js','plugin/form-validation/jquery.validate.min.js','plugin/form-validation/extjquery.validate.min.js','plugin/bootbox/bootbox.js'];
		$this->load->view('data/tamplate_admin',$data);
	}
	
	public function post(){
		if($_POST['kode_catatan_bk'] == 0){
			$this->db->select('RIGHT(catatan_bk.kode_catatan_bk,3) as kode');
			$this->db->where('catatan_bk.tgl', $_POST['tgl']);
			$this->db->order_by('kode','DESC');   
			$this->db->limit(1); 
  			$query = $this->db->get('catatan_bk'); 
 
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
  			$thn = substr($_POST['tgl'], 2, 2);
  			$bln = substr($_POST['tgl'], 5, 2);
  			$hr = substr($_POST['tgl'], 8, 2);
  			
			$data['kode_catatan_bk'] = "0".$thn.$bln.$hr.$kodemax;
        	$data['jml_bk'] = $_POST['jml_bk'];
	    	$data['tgl'] = $_POST['tgl'];
	    	$data['kode_brg'] = $_POST['kode_brg'];
	    	$data['nip_bag_pemasaran'] = $_POST['nip_bag_pemasaran'];
       		if($this->catatan_bk_model->add($data)){
       			$id = $_POST['kode_brg'];
       			$jml_brg = $this->barang_model->get(array("kode_brg"=>$id))->row_array();
       			$jml_bk = $_POST['jml_bk'];
       			$jml_brg_update = (int)$jml_brg['jml_brg'] - (int)$jml_bk;
       			$this->barang_model->update_brg($_POST['kode_brg'],$jml_brg_update);
            	echo "1";
        	}else{
            	echo "0";
        	}
    	}else{
        	$data['jml_bk'] = $_POST['jml_bk'];
	    	$data['tgl'] = $_POST['tgl'];
	    	$data['kode_brg'] = $_POST['kode_brg'];
	    	$data['nip_bag_pemasaran'] = $_POST['nip_bag_pemasaran'];
        	if($this->catatan_bk_model->edit($_POST['kode_catatan_bk'],$data)){
            	echo "1";
        	}else{
            	echo "0";
        	}
    	}
	}

    public function get_by_id(){
        $id = $_POST['idx'];
        $result = $this->catatan_bk_model->get(array("kode_catatan_bk"=>$id))->row_array();
        echo json_encode($result);
    }
    public function delete(){
        $id = $_POST['id'];
        if($this->catatan_bk_model->delete($id)){
            echo "1";
        }else{
            echo "0";
        }
    }

}
