<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class DashboardAdminController extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_login');
        if($this->session->userdata('masuk') != TRUE){
            $url=base_url();
            redirect($url);
        }
    
		if($this->session->userdata('akses') =='admin'){
			$cek_used = $this->m_login->getUsedAdmin($this->session->userdata('ses_id'));
			$used = $cek_used['used'];
			if($this->session->userdata('ses_id_used') < $used){
			  $this->session->sess_destroy();
			  $url=base_url();
			  $this->session->set_flashdata('detect', 'Akun Terdeteksi Login Diperangkat Lain !');
			  redirect($url);
			}
	  }
  
	  if($this->session->userdata('akses') =='verifikator'){
			$cek_used = $this->m_login->getUsedVerifikator($this->session->userdata('ses_id'));
			$used = $cek_used['used'];
			if($this->session->userdata('ses_id_used') < $used){
			  $this->session->sess_destroy();
			  $this->session->set_flashdata('detect', 'Akun Terdeteksi Login Diperangkat Lain !');
			  $url=base_url();
			  redirect($url);
			}
	  }
		$this->load->helper('url');
		$this->load->model('m_verifikasi');
		$this->load->model('m_surat_masuk');
		$this->load->model('m_jumlah_surat_masuk');
		$this->load->model('m_jumlah_surat_terverifikasi');
		$this->load->model('m_list_verifikator');

	}

	public function index(){
		
		$data['jumlah_surat_masuk']= $this->m_surat_masuk->hitungBaris(NULL, NULL, NULL);
		$data['surat_masuk'] = $data['jumlah_surat_masuk']['jumlah'];
		$data['where']=$this->uri->segment(1);
		if ( function_exists( 'date_default_timezone_set' ) ){
    		date_default_timezone_set('Asia/Jakarta');
			$tahun = date("Y");
			$bulan_sekarang = date("n");
		}
		$data['judul'] = 'Dashboard Admin';

		//ini untuk menghitung Semua Surat masuk
		$data['semua_surat_masuk'] =  $this->m_surat_masuk->getJumlahSuratMasuk($tahun);
		$data['semua_surat'] = $data['semua_surat_masuk']['jumlah'];

		//ini untuk menghitung surat terverifikasi
		$data['surat_disetujui'] = $this->m_verifikasi->getJumlahDisetujui($tahun);
		$data['disetujui']= $data['surat_disetujui']['jumlah'];

		$data['surat_disetujui_bersyarat'] = $this->m_verifikasi->getJumlahDisetujuiBersyarat($tahun);
		$data['disetujui_bersyarat']= $data['surat_disetujui_bersyarat']['jumlah'];

		$data['surat_ditangguhkan'] = $this->m_verifikasi->getJumlahDitangguhkan($tahun);
		$data['ditangguhkan']= $data['surat_ditangguhkan']['jumlah'];

		//untuk menghitung jumlah verifikator
		$data['jumlah_verifikator']= $this->m_list_verifikator->getJumlahVerifikator();
		$data['verifikator'] = $data['jumlah_verifikator']['jumlah'];

		//untuk chart 
		$data['jumlah_surat_masuk_perbulan'] = $this->m_jumlah_surat_masuk->getJumlahSuratMasuk($tahun);
		$data['jumlah_surat_disetujui_perbulan'] = $this->m_jumlah_surat_terverifikasi->getJumlahSuratDisetujui($tahun); 
		$data['jumlah_surat_disetujui_bersyarat_perbulan'] = $this->m_jumlah_surat_terverifikasi->getJumlahSuratDisetujuiBersyarat($tahun); 
		$data['jumlah_surat_ditangguhkan_perbulan'] = $this->m_jumlah_surat_terverifikasi->getJumlahSuratDitangguhkan($tahun); 

		//untuk menghitung surat belum diverifikasi
		$belum_diverifikasi= $this->m_surat_masuk->getAllSuratBelumDiverifikasi();
		$data['belum_diverifikasi']= $belum_diverifikasi['jumlah'];
		$this->load->view('templates/header', $data);
		$this->load->view('v_dashboard');
		$this->load->view('templates/footer');
	}
}