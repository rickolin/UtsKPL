<?php
class M_verifikasi extends CI_Model{
    public function insert($data)
	{
		$this->db->insert('verifikasi_form', $data);
	}

	public function masukan($data){
		$this->db->insert('verifikasi', $data);
	}

	public function edit($no_pendaftaran, $data){

		$this->db->where('no_pendaftaran', $no_pendaftaran);
		$this->db->update('verifikasi', $data);
	}

	public function getAllSuratTerverifikasi()
	{
		return $this->db->get('verifikasi')->result_array();
	}

	//untuk pagination da search jika belum login
	public function getSuratTerverifikasiAll($limit, $start, $keyword_cari, $tanggal_mulai, $tanggal_selesai)
	{
		if($keyword_cari){
			if(($tanggal_mulai)&&($tanggal_selesai)){
				return $this->db->query("SELECT * FROM verifikasi WHERE (no_pendaftaran LIKE '%$keyword_cari%' OR nama_perusahaan LIKE '%$keyword_cari%' OR jenis_perusahaan LIKE '%$keyword_cari%' OR jenis_persetujuan LIKE '%$keyword_cari%' OR keterangan_persetujuan LIKE '%$keyword_cari%' OR verifikator LIKE '%$keyword_cari%' OR wakilpjb LIKE '%$keyword_cari%') AND tanggal BETWEEN '$tanggal_mulai' AND '$tanggal_selesai' LIMIT $start, $limit ") -> result_array();
			}else{
				return $this->db->query("SELECT * FROM verifikasi WHERE (no_pendaftaran LIKE '%$keyword_cari%' OR nama_perusahaan LIKE '%$keyword_cari%' OR jenis_perusahaan LIKE '%$keyword_cari%' OR jenis_persetujuan LIKE '%$keyword_cari%' OR keterangan_persetujuan LIKE '%$keyword_cari%' OR verifikator LIKE '%$keyword_cari%' OR wakilpjb LIKE '%$keyword_cari%') LIMIT $start, $limit") -> result_array();
			}
		}else{
			$this->db->select('*');
	    	$this->db->from('verifikasi');
			if(!($keyword_cari)){
				if(($tanggal_mulai)&&($tanggal_selesai)){
					$this->db->where("tanggal BETWEEN '$tanggal_mulai' AND '$tanggal_selesai'");
				}
			}
			$this->db->order_by('tanggal', 'DESC');
			$this->db->limit($limit, $start);     			
			$query = $this->db->get();
    		return $query->result_array();
		}
	}
		
		public function hitungBarisAll($keyword_cari = null, $tanggal_mulai = null, $tanggal_selesai = null){
			if($keyword_cari){
				if(($tanggal_mulai)&&($tanggal_selesai)){
					return $this->db->query("SELECT COUNT(*) as jumlah FROM verifikasi WHERE (no_pendaftaran LIKE '%$keyword_cari%' OR nama_perusahaan LIKE '%$keyword_cari%' OR jenis_perusahaan LIKE '%$keyword_cari%' OR jenis_persetujuan LIKE '%$keyword_cari%' OR keterangan_persetujuan LIKE '%$keyword_cari%' OR verifikator LIKE '%$keyword_cari%' OR wakilpjb LIKE '%$keyword_cari%') AND tanggal BETWEEN '$tanggal_mulai' AND '$tanggal_selesai' ") -> row_array();
				}else{
				return $this->db->query("SELECT COUNT(*) as jumlah FROM verifikasi WHERE (no_pendaftaran LIKE '%$keyword_cari%' OR nama_perusahaan LIKE '%$keyword_cari%' OR jenis_perusahaan LIKE '%$keyword_cari%' OR jenis_persetujuan LIKE '%$keyword_cari%' OR keterangan_persetujuan LIKE '%$keyword_cari%' OR verifikator LIKE '%$keyword_cari%' OR wakilpjb LIKE '%$keyword_cari%')") -> row_array();
				}
			}elseif(!($keyword_cari) && ($tanggal_mulai)&&($tanggal_selesai)){
					return $this->db->query("SELECT COUNT(*) as jumlah FROM verifikasi WHERE tanggal BETWEEN '$tanggal_mulai' AND '$tanggal_selesai' ") -> row_array();
			}else{
				return $this->db->query("SELECT COUNT(*) as jumlah FROM verifikasi") -> row_array();
			}

		}
		//untuk pagination da search jika sudah login

		public function getSuratTerverifikasi($limit, $start, $verifikator, $keyword_cari, $tanggal_mulai, $tanggal_selesai)
		{
			if($keyword_cari){
				if(($tanggal_mulai)&&($tanggal_selesai)){
					return $this->db->query("SELECT * FROM verifikasi WHERE (no_pendaftaran LIKE '%$keyword_cari%' OR nama_perusahaan LIKE '%$keyword_cari%' OR jenis_perusahaan LIKE '%$keyword_cari%' OR jenis_persetujuan LIKE '%$keyword_cari%' OR keterangan_persetujuan LIKE '%$keyword_cari%'OR wakilpjb LIKE '%$keyword_cari%') AND verifikator = '$verifikator' AND tanggal BETWEEN '$tanggal_mulai' AND '$tanggal_selesai' ") -> result_array();
				}else{
				return $this->db->query("SELECT * FROM verifikasi WHERE (no_pendaftaran LIKE '%$keyword_cari%' OR nama_perusahaan LIKE '%$keyword_cari%' OR jenis_perusahaan LIKE '%$keyword_cari%' OR jenis_persetujuan LIKE '%$keyword_cari%' OR keterangan_persetujuan LIKE '%$keyword_cari%'OR wakilpjb LIKE '%$keyword_cari%') AND verifikator = '$verifikator'") -> result_array();
				}
			}else{
				$this->db->select('*');
	    		$this->db->from('verifikasi');
				if(!($keyword_cari)){
					if(($tanggal_mulai)&&($tanggal_selesai)){
						
						$this->db->where("tanggal BETWEEN '$tanggal_mulai' AND '$tanggal_selesai'");
					}
				}
				$this->db->where("verifikator", $verifikator);
				$this->db->order_by('tanggal', 'DESC');
				$this->db->limit($limit, $start); 
    			$query = $this->db->get();
    			return $query->result_array();
			}
		}
		
		public function hitungBaris($verifikator, $keyword_cari = null, $tanggal_mulai = null, $tanggal_selesai = null){
			if($keyword_cari){
				if(($tanggal_mulai)&&($tanggal_selesai)){
					return $this->db->query("SELECT COUNT(*) as jumlah FROM verifikasi WHERE (no_pendaftaran LIKE '%$keyword_cari%' OR nama_perusahaan LIKE '%$keyword_cari%' OR jenis_perusahaan LIKE '%$keyword_cari%' OR jenis_persetujuan LIKE '%$keyword_cari%' OR keterangan_persetujuan LIKE '%$keyword_cari%'OR wakilpjb LIKE '%$keyword_cari%') AND verifikator = '$verifikator' AND tanggal BETWEEN '$tanggal_mulai' AND '$tanggal_selesai' ") -> row_array();
				}else{
				return $this->db->query("SELECT COUNT(*) as jumlah FROM verifikasi WHERE (no_pendaftaran LIKE '%$keyword_cari%' OR nama_perusahaan LIKE '%$keyword_cari%' OR jenis_perusahaan LIKE '%$keyword_cari%' OR jenis_persetujuan LIKE '%$keyword_cari%' OR keterangan_persetujuan LIKE '%$keyword_cari%'OR wakilpjb LIKE '%$keyword_cari%') AND verifikator = '$verifikator'") -> row_array();
				}
			}elseif(!($keyword_cari) && ($tanggal_mulai)&&($tanggal_selesai)){
					return $this->db->query("SELECT COUNT(*) as jumlah FROM verifikasi WHERE verifikator = '$verifikator' AND tanggal BETWEEN '$tanggal_mulai' AND '$tanggal_selesai' ") -> row_array();
			}else{
				return $this->db->query("SELECT COUNT(*) as jumlah FROM verifikasi WHERE verifikator = '$verifikator'") -> row_array();
			}

		}

		public function getDataSurat($no_pendaftaran){
			return $this->db->get_where('verifikasi', array('no_pendaftaran' => $no_pendaftaran))->result_array();
		}

		public function getAtributSurat($no_pendaftaran){
			return $this->db->get_where('verifikasi', array('no_pendaftaran' => $no_pendaftaran))->result_array();
		}

		//untuk mengambil jumlah surat terverifikasi berdasarkan jenis persetujuan
		public function getJumlahDisetujui($tahun){
			return $this->db->query("SELECT COUNT(*) as jumlah FROM verifikasi WHERE jenis_persetujuan='DISETUJUI' AND tahun ='$tahun'") -> row_array();
		}

		public function getJumlahDisetujuiBersyarat($tahun){
			return $this->db->query("SELECT COUNT(*) as jumlah FROM verifikasi WHERE jenis_persetujuan='DISETUJUI BERSYARAT' AND tahun ='$tahun'") -> row_array();
		}

		public function getJumlahDitangguhkan($tahun){
			return $this->db->query("SELECT COUNT(*) as jumlah FROM verifikasi WHERE jenis_persetujuan='DITANGGUHKAN' AND tahun ='$tahun'") -> row_array();
		}

		//ini untuk chart aja
		public function getJumlahDisetujuiBulanan($tahun){
			return $this->db->query("SELECT COUNT(*) as jumlah FROM verifikasi WHERE jenis_persetujuan='DISETUJUI' AND tahun ='$tahun' GROUP BY bulan") -> row_array();
		}

		//untuk mengambil last surat tiap bulannya
		public function getLastSuratDisetujui($tahun)
		{
			return $this->db->query("SELECT bulan FROM jumlah_surat_terverifikasi WHERE tahun = '$tahun' AND jenis_persetujuan = 'DISETUJUI' ORDER BY bulan DESC LIMIT 1")->row_array();
		}

		public function getLastSuratDisetujuiBersyarat($tahun)
		{
			return $this->db->query("SELECT bulan FROM jumlah_surat_terverifikasi WHERE tahun = '$tahun' AND jenis_persetujuan = 'DISETUJUI BERSYARAT' ORDER BY bulan DESC LIMIT 1")->row_array();
		}

		public function getLastSuratDitangguhkan($tahun)
		{
			return $this->db->query("SELECT bulan FROM jumlah_surat_terverifikasi WHERE tahun = '$tahun' AND jenis_persetujuan = 'DITANGGUHKAN' ORDER BY bulan DESC LIMIT 1")->row_array();
		}

		//ini untuk print
		public function getSuratVerifikasi($keyword_cari = null, $tanggal_mulai = null, $tanggal_selesai = null)
		{
			if($keyword_cari){
				if(($tanggal_mulai)&&($tanggal_selesai)){
					return $this->db->query("SELECT * FROM verifikasi WHERE (no_pendaftaran LIKE '%$keyword_cari%' OR nama_perusahaan LIKE '%$keyword_cari%' OR jenis_perusahaan LIKE '%$keyword_cari%' OR jenis_persetujuan LIKE '%$keyword_cari%' OR keterangan_persetujuan LIKE '%$keyword_cari%'OR wakilpjb LIKE '%$keyword_cari%' OR verifikator LIKE '%$keyword_cari%') AND tanggal BETWEEN '$tanggal_mulai' AND '$tanggal_selesai' ") -> result_array();
				}else{
				return $this->db->query("SELECT * FROM verifikasi WHERE (no_pendaftaran LIKE '%$keyword_cari%' OR nama_perusahaan LIKE '%$keyword_cari%' OR jenis_perusahaan LIKE '%$keyword_cari%' OR jenis_persetujuan LIKE '%$keyword_cari%' OR keterangan_persetujuan LIKE '%$keyword_cari%'OR wakilpjb LIKE '%$keyword_cari%'OR verifikator LIKE '%$keyword_cari%')") -> result_array();
				}
			}else{
				$this->db->select('*');
	    		$this->db->from('verifikasi');
				if(!($keyword_cari)){
					if(($tanggal_mulai)&&($tanggal_selesai)){
						$this->db->where("tanggal BETWEEN '$tanggal_mulai' AND '$tanggal_selesai'");
					}
				}
				$this->db->order_by('tanggal', 'DESC');
    			$query = $this->db->get();
    			return $query->result_array();
				}
		}

		
	}
?>
