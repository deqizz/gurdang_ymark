<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barang extends CI_Controller {

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
		$this->load->model(array('barang_model','login_model','user_model','pegawai_model','supplier_model','kategori_model'));
		$this->load->library('upload');
	}
	public function index(){
		//ngambil data user dari database
		$user = $this->login_model->get();
		$data['userdata'] = $user;

		//check role kalo bukan admin langsung di redirect ke halaman depan


		//init layout
		$data['navbar']='data/navbar_admin';
		$data['content']='data/content_barang';
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
		$data['title']='Barang';

		//init data
		$data['barang'] = $this->barang_model->get()->result_array();
		$data['kategori'] = $this->kategori_model->get()->result_array();
		$data['pegawai'] = $this->pegawai_model->get((array("keterangan"=>'bag_gudang')))->result_array();
		$data['supplier'] = $this->supplier_model->get()->result_array();


		$data['scripts'] = ['js/data/general.js','js/data/barang.js','plugin/form-validation/jquery.validate.min.js','plugin/form-validation/extjquery.validate.min.js','plugin/bootbox/bootbox.js'];
		$this->load->view('data/tamplate_admin',$data);
	}
	
	public function post(){
		$kbrg = $_POST['kode_brg']; 
		if($kbrg == '0'){

		$kategori = $this->kategori_model->get((array("kode_kategori"=>$_POST['kode_kategori'])))->row_array();
		$this->db->select('RIGHT(barang.kode_brg,3) as kode');
		$this->db->where('barang.kode_kategori', $_POST['kode_kategori']);  
		$this->db->order_by('kode','DESC');   
		$this->db->limit(1); 
  		$query = $this->db->get('barang'); 
 
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
		$data['kode_brg'] = $kategori['singkatan'].$kodemax;
        $data['nama_brg'] = $_POST['nama_brg'];
	    $data['kode_kategori'] = $_POST['kode_kategori'];
	    $data['merk'] = $_POST['merk'];
	    $data['jml_brg'] = 0;
	    $data['harga'] = $_POST['harga'];
	    $data['nip_bag_gudang'] = $_POST['nip_bag_gudang'];
	    $data['id_supplier'] = $_POST['id_supplier'];
        	if($this->barang_model->add($data)){
                echo "1";
            }else{
                echo "0";
            }
        }else{
        	$data['nama_brg'] = $_POST['nama_brg'];
	    	$data['kode_kategori'] = $_POST['kode_kategori'];
	    	$data['merk'] = $_POST['merk'];
	    	$data['jml_brg'] = 0;
	    	$data['harga'] = $_POST['harga'];
	    	$data['nip_bag_gudang'] = $_POST['nip_bag_gudang'];
	    	$data['id_supplier'] = $_POST['id_supplier'];
        	if($this->barang_model->edit($_POST['kode_brg'],$data)){
                echo "1";
            }else{
                echo "0";
            }
        }    
    }

    public function get_by_id(){
        $id = $_POST['idx'];
        $result = $this->barang_model->get(array("kode_brg"=>$id))->row_array();
        echo json_encode($result);
    }
    public function delete(){
        $id = $_POST['id'];
        if($this->barang_model->delete($id)){
            echo "1";
        }else{
            echo "0";
        }
    }

}
