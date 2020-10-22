<?php if ( ! defined('BASEPATH')) ;

class LandingPageController extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('m_surat_masuk');
		$this->load->model('m_jumlah_surat_masuk');
		$this->load->model('m_verifikasi');

		$this->load->model('m_jumlah_surat_terverifikasi');
	}

	public function index(){
		
		if ( function_exists( 'date_default_timezone_set' ) ){
    		date_default_timezone_set('Asia/Jakarta');
			$tahun = date("Y");
			$bulan_sekarang = date("n");
			// $tgl2 = date('n', strtotime('+8 month', strtotime($bulan_sekarang)));
		}
		//untuk mengecek apakah bulan sudah berganti atau belum untuk mengisi record pada table jumlah_surat_masuk
		if($this->m_surat_masuk->getLastSurat($tahun) != NULL){
			$data['tes'] = $this->m_surat_masuk->getLastSurat($tahun);
			$coba = $data['tes']['bulan'];
			if($bulan_sekarang > $coba ){
				$this->m_jumlah_surat_masuk->addRow($bulan_sekarang, $tahun);
			}
		}else{ //ini jika memasuki awal tahun baru
			$this->m_jumlah_surat_masuk->addRow($bulan_sekarang, $tahun);
		}


		//untuk mengecek apakah bulan sudah berganti atau belum untuk mengisi record pada table jumlah_surat_terverifikasi

		//DISETUJUI
		if($this->m_verifikasi->getLastSuratDisetujui($tahun) != NULL){
			$data['tes1'] = $this->m_verifikasi->getLastSuratDisetujui($tahun);
			$coba1 = $data['tes1']['bulan'];
			if($bulan_sekarang > $coba1 ){
				$this->m_jumlah_surat_terverifikasi->addRowDisetujui($bulan_sekarang, $tahun);
			}
		}else{ //ini jika memasuki awal tahun baru
			$this->m_jumlah_surat_terverifikasi->addRowDisetujui($bulan_sekarang, $tahun);
		}

		//DISETUJUI BERSYARAT
		if($this->m_verifikasi->getLastSuratDisetujuiBersyarat($tahun) != NULL){
			$data['tes2'] = $this->m_verifikasi->getLastSuratDisetujuiBersyarat($tahun);
			$coba2 = $data['tes2']['bulan'];
			if($bulan_sekarang > $coba2 ){
				$this->m_jumlah_surat_terverifikasi->addRowDisetujuiBersyarat($bulan_sekarang, $tahun);
			}
		}else{ //ini jika memasuki awal tahun baru
			$this->m_jumlah_surat_terverifikasi->addRowDisetujuiBersyarat($bulan_sekarang, $tahun);
		}

		//DITANGGUHKAN
		if($this->m_verifikasi->getLastSuratDitangguhkan($tahun) != NULL){
			$data['tes3'] = $this->m_verifikasi->getLastSuratDitangguhkan($tahun);
			$coba3 = $data['tes3']['bulan'];
			if($bulan_sekarang > $coba3 ){
				$this->m_jumlah_surat_terverifikasi->addRowDitangguhkan($bulan_sekarang, $tahun);
			}
		}else{ //ini jika memasuki awal tahun baru
			$this->m_jumlah_surat_terverifikasi->addRowDitangguhkan($bulan_sekarang, $tahun);
		}


		$this->load->view('v_landingpage2');

	}
}