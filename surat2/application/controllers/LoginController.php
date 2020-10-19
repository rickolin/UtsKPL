<?php
class LoginController extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('m_login');
		$this->load->library('form_validation');
	}

	function index(){

		$this->load->view('v_login');
	}

	function auth(){
        $username=htmlspecialchars($this->input->post('username',TRUE),ENT_QUOTES);
        $password=htmlspecialchars($this->input->post('password',TRUE),ENT_QUOTES);

        $cek_verifikator=$this->m_login->auth_verifikator($username, $password);
        $cek_admin=$this->m_login->auth_admin($username, $password);
        
        //cek status sudah login atau belum
        // $data['status_admin'] = $this->m_login->cek_status_admin($username, $password);
        // $status = $data['status_admin']['status'];
        
        
    	if ($cek_admin->num_rows() > 0) {
			$data=$cek_admin->row_array();
			$status = $data['status'];
			$nama= $data['nama'];
			if($this->session->userdata('masuk')!=TRUE && $status != '1'){
			$this->m_login->setStatusAdmin($username, '1');
			$this->session->set_userdata('masuk',TRUE);
			$this->session->set_userdata('akses','admin');
			$this->session->set_userdata('ses_id',$data['nip']);
			$this->session->set_userdata('ses_nama',$data['nama']);
			$this->m_login->addUsedAdmin($username, 1);
			$data1=$this->m_login->getUsedAdmin($username);
    		$used= $data1['used'];
			$this->session->set_userdata('ses_id_used',$used);
			redirect('DashboardAdminController');
			}elseif($this->session->userdata('masuk')!=TRUE && $status == '1'){
			    $this->m_login->setStatusAdmin($username, '0');
			    echo $this->session->set_flashdata('msg1',"Akun ".$nama." Dalam Keadaan Login Di Komputer Lain, Silahkan Masukan Username dan Password Kembali ");
			    redirect('LandingPageController');
		    }
		}elseif ($cek_verifikator->num_rows() > 0) {
			$data=$cek_verifikator->row_array();
			$status = $data['status'];
			$nama= $data['nama'];
			if($this->session->userdata('masuk')!=TRUE && $status != '1'){
			$this->m_login->setStatusVerifikator($username, '1');
			$this->session->set_userdata('masuk',TRUE); 
			$this->session->set_userdata('akses','verifikator');
			$this->session->set_userdata('ses_id',$data['nip']);
			$this->session->set_userdata('ses_nama',$data['nama']);
			$this->m_login->addUsedVerifikator($username, 1);
			$data1=$this->m_login->getUsedVerifikator($username);
			$used= $data1['used'];
	        $this->session->set_userdata('ses_id_used',$used);
			redirect('SuratMasukController');
			}elseif($this->session->userdata('masuk')!=TRUE && $status == '1'){
			    $this->m_login->setStatusVerifikator($username, '0');
			    echo $this->session->set_flashdata('msg1',"Akun ".$nama." Dalam Keadaan Login Di Komputer Lain, Silahkan Masukan Username dan Password Kembali ");
			    redirect('LandingPageController');
		    }
	}else{  // jika username dan password tidak ditemukan atau salah
			$url=base_url();
			echo $this->session->set_flashdata('msg','Username Atau Password Salah');
			redirect($url);
		}
	}
}
