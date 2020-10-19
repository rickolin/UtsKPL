<?php 
	class M_surat_masuk extends CI_model
	{

		public function getAllSuratMasuk()
		{

			return $this->db->get('surat_masuk')->result_array();
		}

		public function getAllSuratBelumDiverifikasi(){
			return $this->db->query("SELECT COUNT(*) as jumlah FROM surat_masuk WHERE status = 'Belum Diverifikasi'")->row_array();
		}
		public function getSuratMasuk($limit, $start, $keyword_cari, $tanggal_mulai, $tanggal_selesai)
		{

			if($keyword_cari){
				if(($tanggal_mulai)&&($tanggal_selesai)){
					return $this->db->query("SELECT * FROM surat_masuk WHERE (no_pendaftaran LIKE '%$keyword_cari%' OR nama_perusahaan LIKE '%$keyword_cari%' OR jenis_perusahaan LIKE '%$keyword_cari%') AND tanggal BETWEEN '$tanggal_mulai' AND '$tanggal_selesai' LIMIT $start, $limit ") -> result_array();
				}else{
					return $this->db->query("SELECT * FROM surat_masuk WHERE no_pendaftaran LIKE '%$keyword_cari%' OR nama_perusahaan LIKE '%$keyword_cari%' OR jenis_perusahaan LIKE '%$keyword_cari%' LIMIT $start, $limit") -> result_array();
				}
			}else{
				$this->db->select('*');
	    		$this->db->from('surat_masuk');
				if(!($keyword_cari)){
					if(($tanggal_mulai)&&($tanggal_selesai)){
						$this->db->where("tanggal BETWEEN '$tanggal_mulai' AND '$tanggal_selesai'");
					}
				}
				$this->db->order_by('no_pendaftaran', 'DESC');
				$this->db->limit($limit, $start); 
    			$query = $this->db->get();
    			return $query->result_array();
			}
		}
		
		public function hitungBaris($keyword_cari = null, $tanggal_mulai = null, $tanggal_selesai = null){
			if($keyword_cari){
				if(($tanggal_mulai)&&($tanggal_selesai)){
					return $this->db->query("SELECT COUNT(*) as jumlah FROM surat_masuk WHERE (no_pendaftaran LIKE '%$keyword_cari%' OR nama_perusahaan LIKE '%$keyword_cari%' OR jenis_perusahaan LIKE '%$keyword_cari%') AND tanggal BETWEEN '$tanggal_mulai' AND '$tanggal_selesai' ") -> row_array();
				}else{
				return $this->db->query("SELECT COUNT(*) as jumlah FROM surat_masuk WHERE no_pendaftaran LIKE '%$keyword_cari%' OR nama_perusahaan LIKE '%$keyword_cari%' OR jenis_perusahaan LIKE '%$keyword_cari%'") -> row_array();
				}
			}elseif(!($keyword_cari) && ($tanggal_mulai)&&($tanggal_selesai)){
					return $this->db->query("SELECT COUNT(*) as jumlah FROM surat_masuk WHERE tanggal BETWEEN '$tanggal_mulai' AND '$tanggal_selesai' ") -> row_array();
			}else{
				return $this->db->query("SELECT COUNT(*) as jumlah FROM surat_masuk") -> row_array();
			}

		}


		public function getPerusahaan($no){

			return $this->db->query("SELECT jenis_perusahaan, nama_perusahaan FROM surat_masuk WHERE no_pendaftaran ='$no'") ->result_array();
		}

		//ini untuk menghitung semua surat masuk
		public function getJumlahSuratMasuk($tahun){
			return $this->db->query("SELECT COUNT(*) as jumlah FROM semua_surat_masuk WHERE tahun ='$tahun'")-> row_array();
		}

		//mengabil bulan dari surat terakhitr

		public function getLastSurat($tahun)
		{
			return $this->db->query("SELECT bulan FROM jumlah_surat_masuk WHERE tahun = '$tahun' ORDER BY bulan DESC LIMIT 1")->row_array();
		}


	}

?>