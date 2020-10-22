<?php if ( ! defined('BASEPATH')) ;

class ListVerifikatorController extends CI_Controller {

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
		$this->load->model('m_list_verifikator');
		
		$this->load->library('form_validation');
		$this->load->model('m_verifikasi');
		function getBulan($data){
			switch($data){
					case '01':
						$nama_bulan = "Januari";
						$bulan_rom = "I";
					break;
			 
					case '02':			
						$nama_bulan = "Februari";
						$bulan_rom = "II";
					break;
			 
					case '03':
						$nama_bulan = "Maret";
						$bulan_rom = "III";
					break;
			 
					case '04':
						$nama_bulan = "April";
						$bulan_rom = "IV";
					break;
			 
					case '05':
						$nama_bulan = "Mei";
						$bulan_rom = "V";
					break;
			 
					case '06':
						$nama_bulan = "Juni";
						$bulan_rom = "VI";
					break;
			 
					case '07':
						$nama_bulan = "Juli";
						$bulan_rom = "VII";
					break;
					
					case '08':
						$nama_bulan = "Agustus";
						$bulan_rom = "VIII";
					break;

					case '09':
						$nama_bulan = "September";
						$bulan_rom = "IX";
					break;

					case '10':
						$nama_bulan = "Oktober";
						$bulan_rom = "X";
					break;

					case '11':
						$nama_bulan = "November";
						$bulan_rom = "XI";
					break;

					case '12':
						$nama_bulan = "Desember";
						$bulan_rom = "XII";
					break;

					default:
						$nama_bulan = "Bulan Tidak di ketahui";
						$bulan_rom = "Bulan Tidak Diketahui";		
					break;
			}
			return $nama_bulan;
		}
	}

	public function index(){
	    $data['judul'] = 'Verifikator';
		$data['jumlah_surat_masuk']= $this->m_surat_masuk->hitungBaris(NULL, NULL, NULL);
		$data['surat_masuk'] = $data['jumlah_surat_masuk']['jumlah'];
		$data['where']=$this->uri->segment(1);
		$data['list_verifikator']=$this->m_list_verifikator->getVerifikator();
		$this->load->view('templates/header', $data);
		$this->load->view('v_list_verifikator', $data);
		$this->load->view('templates/footer');
	}

	public function rekap($nip){
	    
	    $data['judul'] = 'Rekap Verifikator';
		$data['verifikator']=$this->m_list_verifikator->getNamaVerifikator($nip);
		$data['nip']= $data['verifikator']['nip'];
		$data['verifikator'] = $data['verifikator']['nama'];
		$verifikator = $data['verifikator'];
		$this->session->set_userdata('border', 'verifikator');
		$data['jumlah_surat_masuk']= $this->m_surat_masuk->hitungBaris(NULL, NULL, NULL);
		$data['surat_masuk'] = $data['jumlah_surat_masuk']['jumlah'];
		$this->load->library('pagination');
		if($this->input->get('keyword_cari')){
			if(($this->input->get('tanggal_mulai'))&&($this->input->get('tanggal_selesai'))){
				$keyword_cari = $this->input->get('keyword_cari');
				$tanggal_mulai = $this->input->get('tanggal_mulai');
				$tanggal_selesai = $this->input->get('tanggal_selesai');
				$this->session->set_userdata('keyword_cari', $keyword_cari);
				$this->session->set_userdata('tanggal_mulai', $tanggal_mulai);
				$this->session->set_userdata('tanggal_selesai', $tanggal_selesai);

				$pecah1 = explode( "-", $tanggal_mulai);
					$hari1 = $pecah1[2];
					$bulan1 =getBulan($pecah1[1]);
					$tahun1 = $pecah1[0];
				$pecah2 = explode( "-", $tanggal_selesai);
					$hari2 = $pecah2[2];
					$bulan2 =getBulan($pecah2[1]);
					$tahun2 = $pecah2[0];
				$ket="Hasil Pencarian Surat Terverifikasi Dari <strong> ".$hari1." ".$bulan1." ".$tahun1."</strong> Sampai <strong> ".$hari2." ".$bulan2." ".$tahun2."</strong> Verifikator:".$verifikator;
				
				$ket2="$keyword_cari";
				$this->session->set_userdata('ket', $ket);
				$this->session->set_userdata('ket2', $ket2);

				$data['total_rows']= $this->m_verifikasi->hitungBaris($verifikator, $keyword_cari, $tanggal_mulai, $tanggal_selesai);

				$total_rows = $data['total_rows']['jumlah'];
				$this->session->set_userdata('jumlah_row', $total_rows);
				$config['total_rows'] = $this->session->userdata('jumlah_row');
				$data['total_rows'] = $this->session->userdata('jumlah_row');
			}else{
				$keyword_cari = $this->input->get('keyword_cari');
				$this->session->set_userdata('keyword_cari', $keyword_cari);
				$this->session->set_userdata('tanggal_mulai', NULL);
				$this->session->set_userdata('tanggal_selesai', NULL);

				$ket="Hasil Pencarian Surat Terverifikasi Verifikator :".$verifikator;

				$ket2="$keyword_cari";
				$this->session->set_userdata('ket', $ket);
				$this->session->set_userdata('ket2', $ket2);
				$data['total_rows']= $this->m_verifikasi->hitungBaris($verifikator, $keyword_cari, NULL, NULL);
				
				$total_rows = $data['total_rows']['jumlah'];
				$this->session->set_userdata('jumlah_row', $total_rows);
				$config['total_rows'] = $this->session->userdata('jumlah_row');
				$data['total_rows'] = $this->session->userdata('jumlah_row');
			}
		}else{
			$keyword_cari= $this->session->userdata('keyword_cari');
			$tanggal_mulai= $this->session->userdata('tanggal_mulai');
			$ket = $this->session->userdata('ket');
			$ket2 = $this->session->userdata('ket2');
			$tanggal_selesai= $this->session->userdata('tanggal_selesai');
			$total_rows= $this->session->userdata('jumlah_row');
			$config['total_rows'] = $total_rows;
			$data['total_rows'] = $this->session->userdata('jumlah_row');
		}

		if($this->input->get('keyword_cari')==NULL && $this->input->get('tanggal_mulai')!=NULL && $this->input->get('tanggal_selesai')!=NULL){
			$tanggal_mulai = $this->input->get('tanggal_mulai');
			$tanggal_selesai = $this->input->get('tanggal_selesai');
			$this->session->set_userdata('keyword_cari', NULL);
			$this->session->set_userdata('tanggal_mulai', $tanggal_mulai);
			$this->session->set_userdata('tanggal_selesai', $tanggal_selesai);

			$pecah1 = explode( "-", $tanggal_mulai);
					$hari1 = $pecah1[2];
					$bulan1 =getBulan($pecah1[1]);
					$tahun1 = $pecah1[0];
				$pecah2 = explode( "-", $tanggal_selesai);
					$hari2 = $pecah2[2];
					$bulan2 =getBulan($pecah2[1]);
					$tahun2 = $pecah2[0];
				$ket="Hasil Pencarian Surat Terverifikasi Dari <strong> ".$hari1." ".$bulan1." ".$tahun1."</strong> Sampai <strong> ".$hari2." ".$bulan2." ".$tahun2."</strong> Verifikator:".$verifikator;
				$ket2=NULL;
				$this->session->set_userdata('ket', $ket);
				$this->session->set_userdata('ket2', $ket2);
			$data['total_rows']= $this->m_verifikasi->hitungBaris($verifikator, NULL, $tanggal_mulai, $tanggal_selesai);

			$total_rows = $data['total_rows']['jumlah'];
			$this->session->set_userdata('jumlah_row', $total_rows);
			$config['total_rows'] = $this->session->userdata('jumlah_row');
			$data['total_rows'] = $this->session->userdata('jumlah_row');
		}else{
			$tanggal_mulai= $this->session->userdata('tanggal_mulai');
			$tanggal_selesai= $this->session->userdata('tanggal_selesai');
			$total_rows= $this->session->userdata('jumlah_row');
			$ket = $this->session->userdata('ket');
			$ket2 = $this->session->userdata('ket2');
			$config['total_rows'] = $total_rows;
			$data['total_rows'] = $this->session->userdata('jumlah_row');
		}

		if($this->input->get('keyword_cari')==NULL && $this->input->get('tanggal_mulai')==NULL && $this->input->get('tanggal_selesai')==NULL){
			
			$data['total_rows']= $this->m_verifikasi->hitungBaris($verifikator, NULL, NULL, NULL);
			$ket="Data Keseluruhan Surat Terverifikasi Verifikator:".$verifikator;
			$ket2=NULL;
			$this->session->set_userdata('ket', $ket);
			$this->session->set_userdata('ket2', $ket2);
			$config['total_rows'] = $data['total_rows']['jumlah'];
			$data['total_rows'] = $config['total_rows'];
		}



		$config['base_url'] ='https://suratlpse.000webhostapp.com/ListVerifikatorController/rekap/'.$verifikator;
		$config['per_page'] = 10;

		//styling bentuk tombol pagination
		//full
		$config['full_tag_open'] = '<nav aria-label="Page navigation example"><ul class="pagination">';
		$config['full_tag_close'] = '</ul></nav>';

		//first
		$config['first_link'] = 'FIRST';
		$config['first_tag_open'] = '<li class="page-item">';
		$config['first_tag_close'] = '</li>';

		//last
		$config['last_link'] = 'LAST';
		$config['last_tag_open'] = '<li class="page-item">';
		$config['last_tag_close'] = '</li>';

		//next
		$config['next_link'] = '&raquo';
		$config['next_tag_open'] = '<li class="page-item">';
		$config['next_tag_close'] = '</li>';

		//prev
		$config['prev_link'] = '&laquo';
		$config['prev_tag_open'] = '<li class="page-item">';
		$config['prev_tag_close'] = '</li>';

		//current
		$config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="#">';
		$config['cur_tag_close'] = '</a></li>';

		//Digit
		$config['num_tag_open'] = '<li class="page-item">';
		$config['num_tag_close'] = '</li>';

		//link
		$config['attributes'] = array('class' => 'page-link');
		//print

		//Initialize
		$this->pagination->initialize($config);

		$data['ket']= $ket;
		$data['ket2']= $ket2;
		// end CNFIG pagination
		if($this->uri->segment(4)==NULL){
	    	$data['start'] = 0;
	    }else{
	    	$data['start'] = $this->uri->segment(4); 
	    }
	    
		$data['where'] = $this->uri->segment(2);
		$data['surat_terverifikasi']=$this->m_verifikasi->getSuratTerverifikasi($config['per_page'], $data['start'], $verifikator, $keyword_cari, $tanggal_mulai, $tanggal_selesai);
		$this->load->view('templates/header', $data);
		$this->load->view('v_surat_terverifikasi', $data);
		$this->load->view('templates/footer', $data);
	}

	public function refresh($nip)
	{
		$this->session->set_userdata('keyword_cari', NULL);
		$this->session->set_userdata('tanggal_mulai', NULL);
		$this->session->set_userdata('tanggal_selesai', NULL);
		redirect('ListVerifikatorController/rekap/'.$nip);
	}
	
}	

