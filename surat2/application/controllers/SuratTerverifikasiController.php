<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class SuratTerverifikasiController extends CI_Controller {



	public function __construct()

	{

		parent::__construct();

		$this->load->model('m_login');

        if($this->session->userdata('masuk')==TRUE){

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

			}

		$this->load->model('m_verifikasi');

		$this->load->library('form_validation');

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

		$data['judul'] = 'Surat Terverifikasi';

		$data['jumlah_surat_masuk']= $this->m_surat_masuk->hitungBaris(NULL, NULL, NULL);

		$data['surat_masuk'] = $data['jumlah_surat_masuk']['jumlah'];

		$this->load->library('pagination');

		$this->session->set_userdata('border', NULL);

		// $this->session->set_userdata('keyword_cari', NULL);

		// $this->session->set_userdata('tanggal_mulai', NULL);

		// $this->session->set_userdata('tanggal_selesai', NULL);

		$verifikator= $this->session->userdata('ses_nama');



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

				if($this->session->userdata('masuk') != TRUE || $this->session->userdata('akses')== 'admin'){

					$ket="Hasil Pencarian Surat Terverifikasi Dari <strong> ".$hari1." ".$bulan1." ".$tahun1."</strong> Sampai <strong> ".$hari2." ".$bulan2." ".$tahun2."</strong>";

				}else{

					$ket="Hasil Pencarian Surat Terverifikasi Dari <strong> ".$hari1." ".$bulan1." ".$tahun1."</strong> Sampai <strong> ".$hari2." ".$bulan2." ".$tahun2."</strong> Verifikator:".$verifikator;

				}

				

				$ket2="$keyword_cari";

				$this->session->set_userdata('ket', $ket);

				$this->session->set_userdata('ket2', $ket2);



				$url_cetak_pdf = 'SuratTerverifikasiController/print_pdf?keyword_cari='.$this->session->userdata('keyword_cari').'&tanggal_mulai='.$this->session->userdata('tanggal_mulai').'&tanggal_selesai='.$this->session->userdata('tanggal_selesai');

				$this->session->set_userdata('url_pdf', $url_cetak_pdf);



				if($this->session->userdata('masuk') != TRUE || $this->session->userdata('akses')== 'admin'){

					$data['total_rows']= $this->m_verifikasi->hitungBarisALL($keyword_cari, $tanggal_mulai, $tanggal_selesai);

				}else{

					$data['total_rows']= $this->m_verifikasi->hitungBaris($verifikator, $keyword_cari, $tanggal_mulai, $tanggal_selesai);

				}



				$total_rows = $data['total_rows']['jumlah'];

				$this->session->set_userdata('jumlah_row', $total_rows);

				$config['total_rows'] = $this->session->userdata('jumlah_row');

				$data['total_rows'] = $this->session->userdata('jumlah_row');

			}else{

				$keyword_cari = $this->input->get('keyword_cari');

				$this->session->set_userdata('keyword_cari', $keyword_cari);

				$this->session->set_userdata('tanggal_mulai', NULL);

				$this->session->set_userdata('tanggal_selesai', NULL);

				if($this->session->userdata('masuk') != TRUE || $this->session->userdata('akses')== 'admin'){

					$ket="Hasil Pencarian Surat Terverifikasi";

				}else{

					$ket="Hasil Pencarian Surat Terverifikasi Verifikator :".$verifikator;

				}

				$ket2="$keyword_cari";

				$this->session->set_userdata('ket', $ket);

				$this->session->set_userdata('ket2', $ket2);



				$url_cetak_pdf = 'SuratTerverifikasiController/print_pdf?keyword_cari='.$this->session->userdata('keyword_cari').'&tanggal_mulai='.$this->session->userdata('tanggal_mulai').'&tanggal_selesai='.$this->session->userdata('tanggal_selesai');

				$this->session->set_userdata('url_pdf', $url_cetak_pdf);



				if($this->session->userdata('masuk') != TRUE || $this->session->userdata('akses')== 'admin'){

					$data['total_rows']= $this->m_verifikasi->hitungBarisALL($keyword_cari, NULL, NULL);

				}else{

					$data['total_rows']= $this->m_verifikasi->hitungBaris($verifikator, $keyword_cari, NULL, NULL);

				}

				



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

			$url_cetak_pdf = $this->session->userdata('url_pdf');

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

				if($this->session->userdata('masuk') != TRUE || $this->session->userdata('akses')== 'admin'){

					$ket="Hasil Pencarian Surat Terverifikasi Dari <strong> ".$hari1." ".$bulan1." ".$tahun1."</strong> Sampai <strong> ".$hari2." ".$bulan2." ".$tahun2."</strong>";

				}else{

					$ket="Hasil Pencarian Surat Terverifikasi Dari <strong> ".$hari1." ".$bulan1." ".$tahun1."</strong> Sampai <strong> ".$hari2." ".$bulan2." ".$tahun2."</strong> Verifikator:".$verifikator;

				}

				

				$ket2=NULL;

				$this->session->set_userdata('ket', $ket);

				$this->session->set_userdata('ket2', $ket2);



			$url_cetak_pdf = 'SuratTerverifikasiController/print_pdf?keyword_cari='.$this->session->userdata('keyword_cari').'&tanggal_mulai='.$this->session->userdata('tanggal_mulai').'&tanggal_selesai='.$this->session->userdata('tanggal_selesai');

				$this->session->set_userdata('url_pdf', $url_cetak_pdf);



			if($this->session->userdata('masuk') != TRUE || $this->session->userdata('akses')== 'admin'){

				$data['total_rows']= $this->m_verifikasi->hitungBarisALL(NULL, $tanggal_mulai, $tanggal_selesai);

			}else{

				$data['total_rows']= $this->m_verifikasi->hitungBaris($verifikator, NULL, $tanggal_mulai, $tanggal_selesai);

			}



			$total_rows = $data['total_rows']['jumlah'];

			$this->session->set_userdata('jumlah_row', $total_rows);

			$config['total_rows'] = $this->session->userdata('jumlah_row');

			$data['total_rows'] = $this->session->userdata('jumlah_row');

		}else{

			$tanggal_mulai= $this->session->userdata('tanggal_mulai');

			$tanggal_selesai= $this->session->userdata('tanggal_selesai');

			$url_cetak_pdf = $this->session->userdata('url_pdf');

			$ket = $this->session->userdata('ket');

			$ket2 = $this->session->userdata('ket2');

			$total_rows= $this->session->userdata('jumlah_row');

			$config['total_rows'] = $total_rows;

			$data['total_rows'] = $this->session->userdata('jumlah_row');

		}



		if($this->input->get('keyword_cari')==NULL && $this->input->get('tanggal_mulai')==NULL && $this->input->get('tanggal_selesai')==NULL){

			

			

			$url_cetak_pdf='SuratTerverifikasiController/print_pdf';



			if($this->session->userdata('masuk') != TRUE || $this->session->userdata('akses')== 'admin'){

					$ket="Data Keseluruhan Surat Terverifikasi";

			}else{

					$ket="Data Keseluruhan Surat Terverifikasi Verifikator:".$verifikator;

			}

			$ket2=NULL;

			$this->session->set_userdata('ket', $ket);

			$this->session->set_userdata('ket2', $ket2);



			if($this->session->userdata('masuk') != TRUE || $this->session->userdata('akses')== 'admin'){

				$data['total_rows']= $this->m_verifikasi->hitungBarisALL(NULL, NULL, NULL, NULL);

			}else{

				$data['total_rows']= $this->m_verifikasi->hitungBaris($verifikator, NULL, NULL, NULL);

			}

			

			$config['total_rows'] = $data['total_rows']['jumlah'];

			$data['total_rows'] = $config['total_rows'];

		}







		$config['base_url'] ='https://suratlpse.000webhostapp.com/SuratTerverifikasiController/index';

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

		$data['url_cetak_pdf'] = base_url('index.php/'.$url_cetak_pdf);



		//Initialize

		$this->pagination->initialize($config);



		// end CNFIG pagination

		if($this->uri->segment(3)==NULL){

	    	$data['start'] = 0;

	    }else{

	    	$data['start'] = $this->uri->segment(3); //uri segment() localhost/capture6/segment1/segment2/segment3

	    }

	    



	    $data['ket'] =$ket;

	    $data['ket2'] =$ket2;

		$data['where'] = $this->uri->segment(1);

		if($this->session->userdata('masuk') != TRUE || $this->session->userdata('akses')== 'admin'){

		$data['surat_terverifikasi']=$this->m_verifikasi->getSuratTerverifikasiAll($config['per_page'], $data['start'], $keyword_cari, $tanggal_mulai, $tanggal_selesai);

		}else{//masuk true sama dia bukan admin

			$data['surat_terverifikasi']=$this->m_verifikasi->getSuratTerverifikasi($config['per_page'], $data['start'], $verifikator, $keyword_cari, $tanggal_mulai, $tanggal_selesai);

		}

		$this->load->view('templates/header', $data);

		$this->load->view('v_surat_terverifikasi', $data);

		$this->load->view('templates/footer', $data);

	}



	public function refresh()

	{

		$this->session->set_userdata('keyword_cari', NULL);

		$this->session->set_userdata('tanggal_mulai', NULL);

		$this->session->set_userdata('tanggal_selesai', NULL);

		$this->session->set_userdata('ket', NULL);

		$this->session->set_userdata('ket2', NULL);

		redirect('SuratTerverifikasiController');

	}



	public function edit($no_pendaftaran){



        $data['judul'] = 'Edit';

		$data['where'] = $this->uri->segment(2);

		$data['no_pendaftaran']=$no_pendaftaran;

		$data['jumlah_surat_masuk']= $this->m_surat_masuk->hitungBaris(NULL, NULL, NULL);

		$data['surat_masuk'] = $data['jumlah_surat_masuk']['jumlah'];

		$verifikator= $this->session->userdata('ses_nama');

		$data['verifikator']=$verifikator;



		//untuk mengambil data surat yang telah terverifikasi

		$data['data_surat']= $this->m_verifikasi->getDataSurat($no_pendaftaran);



		//untuk mengecek apakah setiap checkbox itu ada isinya atau tidak

		$data['atribut_surat']= $this->m_verifikasi->getAtributSurat($no_pendaftaran);



		$config = array(

		   array(

		     'field' => 'text_wakilpjb',

		     'label' => 'text_wakilpjb',

		     'rules' => 'required',

		     'errors' => array(

                        'required' => 'Wakil PJB Tidak Boleh Kosong',

                )

		   ),

		   array(

		     'field' => 'text_jabatan',

		     'label' => 'text_jabatan',

		     'rules' => 'required',

		     'errors' => array(

                        'required' => 'Jabatan Tidak Boleh Kosong',

                )

		   ),

		   array(

			'field' => 'jenis_persetujuan',

			'label' => 'jenis_persetujuan',

			'rules' => 'required',

			'errors' => array(

					   'required' => 'Jenis Persetujuan Tidak Boleh Kosong',

			   )

		  ),

		);

		$this->form_validation->set_rules($config);

		if( $this->form_validation->run() == FALSE){



		$this->load->view('templates/header', $data);

		$this->load->view('v_edit_surat_terverifikasi', $data);

		$this->load->view('templates/footer', $data);

	   }else{

		    $no_pendaftaran=$this->input->post('no_pendaftaran', true);

		    $nama_perusahaan=$this->input->post('nama_perusahaan', true);

		    $jenis_perusahaan=$this->input->post('jenis_perusahaan', true);

		    $verifikator=$this->input->post('verifikator', true);

		    $formkeikutsertaan=$this->input->post('formkeikutsertaan', true);

		    if($this->input->post('keterangan_formkeikutsertaan')){

		    	$keterangan_formkeikutsertaan=$this->input->post('keterangan_formkeikutsertaan', true);

		    }else{

		    	$keterangan_formkeikutsertaan='-';

		    }



		    $suratkuasa=$this->input->post('suratkuasa', true);

		    if($this->input->post('keterangan_suratkuasa')){

		    	$keterangan_suratkuasa=$this->input->post('keterangan_suratkuasa', true);

		    }else{

		    	$keterangan_suratkuasa='-';

		    }



		    $printonline=$this->input->post('printonline', true);

		    if($this->input->post('keterangan_printonline')){

		    	$keterangan_printonline=$this->input->post('keterangan_printonline');

		    }else{

		    	$keterangan_printonline='-';

		    }



		    $ktpdirektur=$this->input->post('ktpdirektur', true);

		    if($this->input->post('keterangan_ktpdirektur')){

		    	$keterangan_ktpdirektur=$this->input->post('keterangan_ktpdirektur');

		    }else{

		    	$keterangan_ktpdirektur='-';

		    }



		    $npwpperusahaan=$this->input->post('npwpperusahaan', true);

		    if($this->input->post('keterangan_npwpperusahaan')){

		    	$keterangan_npwpperusahaan=$this->input->post('keterangan_npwpperusahaan');

		    }else{

		    	$keterangan_npwpperusahaan='-';

		    }



		    if($this->input->post('siup')){

		    	$siup=$this->input->post('siup');

		    }else{

		    	$siup='-';

		    }



		    if($this->input->post('siujk')){

		    	$siujk=$this->input->post('siujk');

		    }else{

		    	$siujk='-';

		    }



		    if($this->input->post('sbu')){

		    	$sbu=$this->input->post('sbu');

		    }else{

		    	$sbu='-';

		    }



		    if($this->input->post('keterangan_1')){

		    	$keterangan_1=$this->input->post('keterangan_1');

		    }else{

		    	$keterangan_1='-';

		    }



		   

		    if($this->input->post('aktependirian')){

		    	$aktependirian=$this->input->post('aktependirian');

		    }else{

		    	$aktependirian='-';

		    }



		    if($this->input->post('akteperubahan')){

		    	$akteperubahan=$this->input->post('akteperubahan');

		    }else{

		    	$akteperubahan='-';

		    }

		    if($this->input->post('keterangan_2')){

		    	$keterangan_2=$this->input->post('keterangan_2');

		    }else{

		    	$keterangan_2='-';

		    }



		    $tandadaftar=$this->input->post('tandadaftar', true);

		    if($this->input->post('keterangan_tandadaftar')){

		    	$keterangan_tandadaftar=$this->input->post('keterangan_tandadaftar');

		    }else{

		    	$keterangan_tandadaftar='-';

		    }



		    if($this->input->post('situ')){

		    	$situ=$this->input->post('situ');

		    }else{

		    	$situ='-';

		    }

		    if($this->input->post('ho')){

		    	$ho=$this->input->post('ho');

		    }else{

		    	$ho='-';

		    }

		    if($this->input->post('surketdomisili')){

		    	$surketdomisili=$this->input->post('surketdomisili');

		    }else{

		    	$surketdomisili='-';

		    }

		    if($this->input->post('keterangan_3')){

		    	$keterangan_3=$this->input->post('keterangan_3');

		    }else{

		    	$keterangan_3='-';

		    }



		    $suratpengukuhan=$this->input->post('suratpengukuhan', true);

		    if($this->input->post('keterangan_suratpengukuhan')){

		    	$keterangan_suratpengukuhan=$this->input->post('keterangan_suratpengukuhan');

		    }else{

		    	$keterangan_suratpengukuhan='-';

		    }



		    $pengesahanmenteri=$this->input->post('pengesahanmenteri', true);

		    if($this->input->post('keterangan_pengesahanmenteri')){

		    	$keterangan_pengesahanmenteri=$this->input->post('keterangan_pengesahanmenteri');

		    }else{

		    	$keterangan_pengesahanmenteri='-';

		    }



		    

		    $text_wakilpjb=$this->input->post('text_wakilpjb', true);



		    

		    $text_jabatan=$this->input->post('text_jabatan', true);



		    $jenis_persetujuan=$this->input->post('jenis_persetujuan', true);



		    if($this->input->post('keterangan_persetujuan')){

		    	$keterangan_persetujuan=$this->input->post('keterangan_persetujuan');

		    }else{

		    	$keterangan_persetujuan='';

		    }



		    if ( function_exists( 'date_default_timezone_set' ) ){

    		date_default_timezone_set('Asia/Jakarta');

			$tanggal = date("Y-m-d");

			$tahun = date("Y");

			$bulan = date("n");

			}



			$hari = date ("D");

 

			switch($hari){

				case 'Sun':

					$hari_ini = "Minggu";

				break;

		 

				case 'Mon':			

					$hari_ini = "Senin";

				break;

		 

				case 'Tue':

					$hari_ini = "Selasa";

				break;

		 

				case 'Wed':

					$hari_ini = "Rabu";

				break;

		 

				case 'Thu':

					$hari_ini = "Kamis";

				break;

		 

				case 'Fri':

					$hari_ini = "Jumat";

				break;

		 

				case 'Sat':

					$hari_ini = "Sabtu";

				break;

				

				default:

					$hari_ini = "Tidak di ketahui";		

				break;

			}







		    $data = array(

		        'no_pendaftaran' => $no_pendaftaran,

		        'jenis_perusahaan' => $jenis_perusahaan,

		        'nama_perusahaan' => $nama_perusahaan,

		        'verifikator' => $verifikator,

		        'formkeikutsertaan' => $formkeikutsertaan,

		        'keterangan_formkeikutsertaan'=>$keterangan_formkeikutsertaan,

		        'suratkuasa' => $suratkuasa,

		        'keterangan_suratkuasa' => $keterangan_suratkuasa,

		        'printonline' => $printonline,

		        'keterangan_printonline' => $keterangan_printonline,

			    'ktpdirektur' => $ktpdirektur,

			    'keterangan_ktpdirektur' => $keterangan_ktpdirektur,

			    'npwpperusahaan' => $npwpperusahaan,

			    'keterangan_npwpperusahaan' => $keterangan_npwpperusahaan,

		        'siup' => $siup,

			    'siujk' => $siujk,

			    'sbu' => $sbu,

			    'keterangan_1' => $keterangan_1,

			    'aktependirian' => $aktependirian,

		        'akteperubahan' => $akteperubahan,

		        'keterangan_2' => $keterangan_2,

			    'tandadaftar' => $tandadaftar,

			    'keterangan_tandadaftar' => $keterangan_tandadaftar,

			    'situ' => $situ,

			    'ho' => $ho,

		        'surketdomisili' => $surketdomisili,

		        'keterangan_3' => $keterangan_3,

		        'suratpengukuhan' => $suratpengukuhan,

		        'keterangan_suratpengukuhan' => $keterangan_suratpengukuhan,

			    'pengesahanmenteri' => $pengesahanmenteri,

			    'keterangan_pengesahanmenteri' => $keterangan_pengesahanmenteri,

			    'wakilpjb' => $text_wakilpjb,

		        'jabatan' => $text_jabatan,

		        'jenis_persetujuan' => $jenis_persetujuan,

		        'keterangan_persetujuan' => $keterangan_persetujuan,

		        'hari_terverifikasi' => $hari_ini,

		        'bulan' => $bulan,

		        'tahun' => $tahun,

		        'tanggal' => $tanggal,



	    	);

	    	$this->session->set_flashdata('flash', 'Diedit');

	    	$this->m_verifikasi->edit($no_pendaftaran, $data);

	    	redirect('SuratTerverifikasiController');

		}



		

	}

	public function print_verifikasi($no){



		$no_pendaftaran = $no;

		$this->load->model('m_print');

		$data['data_surat'] = $this->m_print->getSurat($no_pendaftaran);

		foreach ($data['data_surat'] as $row){

			$verifikator = $row['verifikator'];

			$data['nip_verifikator']=$row['nip_verifikator'];

		}





		//untuk memecah string tanggal 

		$data['tanggal_surat']= $this->m_print->getTanggal($no_pendaftaran);



		$pecah = explode( "-", $data['tanggal_surat']['tanggal']);

		$hari = $pecah[2];

		$pecah2 = explode(" ", $hari);

		$hari = $pecah2[0];

		$bulan = $pecah[1];

		//untuk merubah angka bulan menjadi nama bulan

		switch($bulan){

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





		$tahun =$pecah[0];

		$data['hari'] = $hari;

		$data['bulan'] = $nama_bulan;

		$data['bulan_rom']= $bulan_rom;

		$data['tahun'] = $tahun;



		ob_start();

	    $this->load->view('v_print', $data);

	    $html = ob_get_contents();

	    ob_end_clean();

	        

	    require_once('./assets/html2pdf/html2pdf.class.php');

	    $pdf = new HTML2PDF('P','A4','en', false, 'ISO-8859-15', array(20,10,20,10));

	    $pdf->WriteHTML($html);

	    $pdf->Output('Surat-'.$no.'.pdf', 'D');





	}



	



	public function print_pdf(){

		if ($this->input->get('keyword_cari')) {

			if(($this->input->get('tanggal_mulai'))&&($this->input->get('tanggal_selesai'))){

				$keyword_cari = $this->input->get('keyword_cari');

				$tanggal_mulai = $this->input->get('tanggal_mulai');

				$tanggal_selesai = $this->input->get('tanggal_selesai');

				$tamu = $this->m_verifikasi->getSuratVerifikasi($keyword_cari, $tanggal_mulai, $tanggal_selesai);

				$pecah1 = explode( "-", $tanggal_mulai);

					$hari1 = $pecah1[2];

					$bulan1 =getBulan($pecah1[1]);

					$tahun1 = $pecah1[0];

				$pecah2 = explode( "-", $tanggal_selesai);

					$hari2 = $pecah2[2];

					$bulan2 =getBulan($pecah2[1]);

					$tahun2 = $pecah2[0];

				$ket1="Rekap Surat Terverifikasi Dari <strong> ".$hari1." ".$bulan1." ".$tahun1."</strong> Sampai <strong> ".$hari2." ".$bulan2." ".$tahun2."</strong>";;

				$ket2="$keyword_cari";

			}else{

				$keyword_cari = $this->input->get('keyword_cari');

				$ket1=NULL;

				$ket2="$keyword_cari";

				$tamu = $this->m_verifikasi->getSuratVerifikasi($keyword_cari, NULL, NULL);

			}

		}elseif ($this->input->get('keyword_cari')==NULL && $this->input->get('tanggal_mulai')!=NULL && $this->input->get('tanggal_selesai')!=NULL){

				$tanggal_mulai = $this->input->get('tanggal_mulai');

				$tanggal_selesai = $this->input->get('tanggal_selesai');

				$pecah1 = explode( "-", $tanggal_mulai);

					$hari1 = $pecah1[2];

					$bulan1 =getBulan($pecah1[1]);

					$tahun1 = $pecah1[0];

				$pecah2 = explode( "-", $tanggal_selesai);

					$hari2 = $pecah2[2];

					$bulan2 =getBulan($pecah2[1]);

					$tahun2 = $pecah2[0];

				$ket1="Rekap Surat Terverifikasi Dari <strong> ".$hari1." ".$bulan1." ".$tahun1."</strong> Sampai <strong> ".$hari2." ".$bulan2." ".$tahun2."</strong>";;

				$ket2=NULL;

				$tamu = $this->m_verifikasi->getSuratVerifikasi(NULL, $tanggal_mulai, $tanggal_selesai);

		}else{

			$ket1=NULL;

			$ket2=NULL;

			$tamu=$this->m_verifikasi->getAllSuratTerverifikasi();

		}



		$data['ket1'] = $ket1;

		$data['ket2'] = $ket2;

		$data['tamu'] = $tamu;

	

	    $this->load->view('v_print_surat_terverifikasi', $data);

	    

		}

}