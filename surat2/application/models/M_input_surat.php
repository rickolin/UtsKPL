<?php 
	class M_input_surat extends CI_model
	{

		public function insert($data)
		{
		
			$this->db->insert('form_penyedia', $data);
		}
	}
?>