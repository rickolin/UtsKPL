<?php 
	class M_list_verifikator extends CI_model
	{
		public function getVerifikator()
		{
		return $this->db->get('verifikator')->result_array();
		}

		//untuk mengambil nama verifikator
		public function getNamaVerifikator($nip)
		{
		return $this->db->get_where('verifikator', array('nip' => $nip))->row_array();
		}

		public function getJumlahVerifikator(){
			return $this->db->query("SELECT COUNT(*) as jumlah from verifikator")->row_array();
		}
	}
?>
