<?php 
	class M_jumlah_surat_terverifikasi extends CI_model
	{

		public function addRowDisetujui($bulan, $tahun)
		{
			
			$data = array(
				'id' => '',
				'bulan' => $bulan,
				'tahun' => $tahun,
				'jenis_persetujuan' => 'DISETUJUI',
		        'jumlah' => 0
			);
			$this->db->insert('jumlah_surat_terverifikasi', $data);
		}

		public function addRowDisetujuiBersyarat($bulan, $tahun)
		{
			
			$data = array(
				'id' => '',
				'bulan' => $bulan,
				'tahun' => $tahun,
				'jenis_persetujuan' => 'DISETUJUI BERSYARAT',
		        'jumlah' => 0
			);
			$this->db->insert('jumlah_surat_terverifikasi', $data);
		}

		public function addRowDitangguhkan($bulan, $tahun)
		{
			
			$data = array(
				'id' => '',
				'bulan' => $bulan,
				'tahun' => $tahun,
				'jenis_persetujuan' => 'DITANGGUHKAN',
		        'jumlah' => 0
			);
			$this->db->insert('jumlah_surat_terverifikasi', $data);
		}


		//untuk mengambil nilai surat terverfikasi
		public function getJumlahSuratDisetujui($tahun){
			return $this->db->query("SELECT jumlah FROM jumlah_surat_terverifikasi WHERE tahun ='$tahun' AND jenis_persetujuan = 'DISETUJUI' ORDER BY bulan ASC")-> result_array();
		}
		public function getJumlahSuratDisetujuiBersyarat($tahun){
			return $this->db->query("SELECT jumlah FROM jumlah_surat_terverifikasi WHERE tahun ='$tahun' AND jenis_persetujuan = 'DISETUJUI BERSYARAT' ORDER BY bulan ASC")-> result_array();
		}
		public function getJumlahSuratDitangguhkan($tahun){
			return $this->db->query("SELECT jumlah FROM jumlah_surat_terverifikasi WHERE tahun ='$tahun' AND jenis_persetujuan = 'DITANGGUHKAN' ORDER BY bulan ASC")-> result_array();
		}
		
	}
?>