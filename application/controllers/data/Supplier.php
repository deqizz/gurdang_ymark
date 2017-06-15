<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Supplier extends CI_Controller {

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
		$this->load->model(array('login_model','user_model','supplier_model'));
		$this->load->library('upload');
	}
	public function index(){
		//ngambil data user dari database
		$user = $this->login_model->get();
		$data['userdata'] = $user;

		//check role kalo bukan admin langsung di redirect ke halaman depan


		//init layout
		$data['navbar']='data/navbar_admin';
		$data['content']='data/supplier_content';
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
		$data['title']='Supplier';

		//init data
		$data['supplier'] = $this->supplier_model->get()->result_array();


		$data['scripts'] = ['js/data/general.js','js/data/supplier.js','plugin/form-validation/jquery.validate.min.js','plugin/form-validation/extjquery.validate.min.js','plugin/bootbox/bootbox.js'];
		$this->load->view('data/tamplate_admin',$data);
	}
		
	public function post(){
		if($_POST['id_supplier'] == '0'){
			$this->db->select('RIGHT(supplier.id_supplier,3) as kode');
			$this->db->order_by('kode','DESC');   
			$this->db->limit(1); 
  			$query = $this->db->get('supplier'); 
 
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
  			
			$data['id_supplier'] = "S".$kodemax;
	    	$data['nama_supplier'] = $_POST['nama_supplier'];
	    	$data['nama_perusahaan'] = $_POST['nama_perusahaan'];
        	if($this->supplier_model->add($data)){
                echo "1";
            }else{
                echo "0";
            }
        }else{
	    	$data['nama_supplier'] = $_POST['nama_supplier'];
	    	$data['nama_perusahaan'] = $_POST['nama_perusahaan'];
        	if($this->supplier_model->edit($_POST['id_supplier'],$data)){
                echo "1";
            }else{
                echo "0";
            }	
        }
    }
    public function get_by_id(){
        $id = $_POST['idx'];
        $result = $this->supplier_model->get(array("id_supplier"=>$id))->row_array();
        echo json_encode($result);
    }
    public function delete(){
        $id = $_POST['id'];
        if($this->supplier_model->delete($id)){
            echo "1";
        }else{
            echo "0";
        }
    }

}
