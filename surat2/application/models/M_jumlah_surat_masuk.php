<?php 
	class M_jumlah_surat_masuk extends CI_model
	{
		public function addRow($bulan, $tahun)
		{	
			$data = array(
				'id' => '',
				'bulan' => $bulan,
				'tahun' => $tahun,
		        'jumlah' => 0
			);
			$this->db->insert('jumlah_surat_masuk', $data);
		}

		public function getJumlahSuratMasuk($tahun)
		{
			return $this->db->query("SELECT jumlah FROM jumlah_surat_masuk WHERE tahun ='$tahun' ORDER BY bulan ASC") -> result_array();
		}
	}
?>