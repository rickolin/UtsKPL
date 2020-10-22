<?php if ( ! defined('BASEPATH'));

class FormInputSuratController extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('m_jenisperusahaan');

		$this->load->model('m_input_surat');

		$this->load->library('form_validation');

	}

	public function index()
	{
		$data['jenis_perusahaan'] = $this->m_jenisperusahaan->getAllJenisPerusahaan();
		
		$config = array(
		   array(
		     'field' => 'no_pendaftaran',
		     'label' => 'no_pendaftaran',
		     'rules' => 'required|is_unique[form_penyedia.no_pendaftaran]|numeric',
		     'errors' => array(
                        'required' => 'No Pendaftaran Tidak Boleh Kosong',
						'is_unique'=> 'No Pendaftaran Sudah Pernah Dipakai',
                		'numeric'=> 'No Pendaftaran Harus Berupa Angka'
                ),
		   ),
		   array(
			'field' => 'jenis_perusahaan',
			'label' => 'jenis_perusahaan',
			'rules' => 'required',
			'errors' => array(
			   'required' => 'Jenis Perusahaan Tidak Boleh Kosong',
			   ),
		  ),
		   array(
		     'field' => 'jenisperusahaan_lainnya',
		     'label' => 'jenisperusahaan_lainnya',
			 'rules' => 'required',
			 'errors' => array(
				'required' => 'Jenis Perusahaan Tidak Boleh Kosong',
				),
		   ),
		   array(
		     'field' => 'nama_perusahaan',
		     'label' => 'Nama nama_perusahaan',
		     'rules' => 'required',
			 'errors' => array(
				'required' => 'Nama Perusahaan Tidak Boleh Kosong',
				),
		   ),
		   array(
			'field' => 'alamat',
			'label' => 'Alamat',
			'rules' => 'required',
			'errors' => array(
			   'required' => 'Alamat Tidak Boleh Kosong',
			   ),
		  ),
		  array(
			'field' => 'kota',
			'label' => 'kota',
			'rules' => 'required',
			'errors' => array(
			   'required' => 'Kota Tidak Boleh Kosong',
			   ),
		  ),
		   array(
		     'field' => 'telepon',
		     'label' => 'No Telepon',
		     'rules' => 'required|numeric|min_length[9]|max_length[15]',
			 'errors' => array(
				'required' => 'No Telepon Tidak Boleh Kosong',
				'numeric' => 'No Telepon Harus Angka',
				'min_length'=> 'No Telepon Minimal 9 Huruf',
				'max_length'=> 'No Telepon Maksimal 15 Huruf',
				),
		   )
	 	);

	 	$this->form_validation->set_rules($config);

	   if( $this->form_validation->run() == FALSE){
	    $this->load->view('v_input_surat', $data);
	   } else{//jalankan fungsi
	    $tanggal = $this->input->post('tanggal', true);
	    $no_pendaftaran = $this->input->post('no_pendaftaran', true);
	    $jenis_perusahaan = $this->input->post('jenisperusahaan_lainnya', true);
	    $nama_perusahaan = $this->input->post('nama_perusahaan', true);
		$alamat = $this->input->post('alamat', true);
		$kota = $this->input->post('kota', true);
		$telepon = $this->input->post('telepon', true);
	    if ( function_exists( 'date_default_timezone_set' ) ){
    		date_default_timezone_set('Asia/Jakarta');
			$tanggal = date("Y-m-d");
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
	     'hari' => $hari_ini,
	     'tanggal' => $tanggal,
	     'no_pendaftaran' => $no_pendaftaran,
	     'jenis_perusahaan' => $jenis_perusahaan,
		 'nama_perusahaan' => $nama_perusahaan,
		 'alamat' => $alamat,
		 'kota' => $kota,
	     'telepon' => $telepon
	    );
	   
	  $this->m_input_surat->insert($data);
	  $this->session->set_flashdata('flash', 'Ditambahkan');
	  redirect('SuratMasukController');
	  
	   }
	}

}

/* End of file Capture.php */
/* Location: ./application/controllers/Capture.php */