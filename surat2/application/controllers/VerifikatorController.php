<?php 



class VerifikatorController extends CI_Controller {



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

		$this->load->model('m_verifikator');

		$this->load->library('form_validation');

	}



	public function index()

	{	

		

		$data['jumlah_surat_masuk']= $this->m_surat_masuk->hitungBaris(NULL, NULL, NULL);

		$data['surat_masuk'] = $data['jumlah_surat_masuk']['jumlah'];

        	$data['where']=$this->uri->segment(1);
		$data['judul']= 'Tambah verifikator';

	    if ( function_exists( 'date_default_timezone_set' ) ){

    		date_default_timezone_set('Asia/Jakarta');

			$tanggal = date("Y-m-d h:i:s");

		}

		$config = array(

		   array(

		     'field' => 'nama',

		     'label' => 'Nama',

		     'rules' => 'required|min_length[3]|max_length[50]|is_unique[verifikator.nama]',

		     'errors' => array(

                        'required' => 'Nama Tidak Boleh Kosong',

						'min_length'=> 'Nama Minimal 3 Huruf',

						'max_length'=> 'Nama Maksimal 50 Huruf',

						'is_unique'=> 'Verifikator Sudah Ada',

                ),

		   ),



		   array(

		     'field' => 'nip',

		     'label' => 'NIP',

			 'rules' => 'required|exact_length[18]|numeric|is_unique[admin.nip]|is_unique[verifikator.nip]',

			 'errors' => array(

				'required' => 'NIP Tidak Boleh Kosong',

				'exact_length'=> 'NIP Harus 18 digit',

				'numeric'=> 'NIP Harus Berupa Angka',

				'is_unique'=> 'NIP Telah Digunakan',

				),

		   ),



		   array(

		     'field' => 'password',

		     'label' => 'password',

			 'rules' => 'required|min_length[6]',

			 'errors' => array(

				'required' => 'Password Harus Diisi!',

				'min_length'=> 'Password Minimal 6 Karakter',

				),

		   ),



		   array(

		     'field' => 'conf_password',

		     'label' => 'conf_password',

			 'rules' => 'required|matches[password]',

			 'errors' => array(

				'required' => 'Konfirmasi Password !',

				'matches'=> 'Password yang Dimasukan berbeda',

				),

		   ),



		  );



		$this->form_validation->set_rules($config);



		if( $this->form_validation->run() == FALSE){

			$this->load->view('templates/header', $data);

			$this->load->view('v_tambah_verifikator');

			$this->load->view('templates/footer');

		} else{//jalankan fungsi

			$this->m_verifikator->TambahVerifikator($tanggal);

			$this->session->set_flashdata('flash', 'Ditambahkan');

			redirect('ListVerifikatorController');//masukan fungsi redirect berupa controleer

		}

		

    }

    

    public function hapus($id)

	{

		$this->m_verifikator->hapusDataVerifikator($id);

		$this->session->set_flashdata('flash', 'Dihapus');

		redirect('ListVerifikatorController');

	}

}