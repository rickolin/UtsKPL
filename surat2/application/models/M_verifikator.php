<?php 

	class M_verifikator extends CI_model

	{

		

		public function getAllVerifikator()

		{

			$query = $this->db->get('verifikator');

			return $query->result_array();

		}



		public function TambahVerifikator($tanggal)

		{

			$data = array(

				'tanggal' => $tanggal,

		        'nip' => $this->input->post('nip', true), //true biar aman, nilai masukan post('atribut nama')

		        'nama' => $this->input->post('nama', true),

		        'password' => md5($this->input->post('password', true)),

				'status'=>"0"

			);



			$this->db->insert('verifikator', $data);

		}



 		public function hapusDataVerifikator($id)

		{

			$this->db->where('nip', $id);

			$this->db->delete('verifikator');

		}



		public function getNip($nama_verifikator){

			return $this->db->query("SELECT * FROM verifikator WHERE nama='$nama_verifikator'") -> row_array();

		}



		public function getNipAdmin($nama_verifikator){

			return $this->db->query("SELECT * FROM admin WHERE nama ='$nama_verifikator'") -> row_array();

		}



	}

?>