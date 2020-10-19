<?php 
	class M_jenisperusahaan extends CI_model
	{
		
		public function getAllJenisPerusahaan()
		{
			$query = $this->db->get('jenis_perusahaan');
			return $query->result_array();
		}
	}
?>