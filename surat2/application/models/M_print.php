<?php
class M_print extends CI_Model{

    public function getSurat($no_pendaftaran)
	{
		return $this->db->get_where('verifikasi', array('no_pendaftaran'=>$no_pendaftaran)) -> result_array();
	}

	public function getTanggal($no_pendaftaran)
	{
		return $this->db->get_where('verifikasi', array('no_pendaftaran'=>$no_pendaftaran)) -> row_array();
	}

	public function getDataVerifikator($nama)
	{
		return $this->db->get_where('verifikator', array('nama'=>$nama)) -> row_array();
	}
}
?>