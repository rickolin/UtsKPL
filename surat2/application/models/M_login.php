<?php

class M_login extends CI_Model{

	//cek nip dan password dosen

	// function auth_pegawai($username,$password){

	// 	$query=$this->db->query("SELECT * FROM pegawai WHERE nip='$username' AND password=MD5('$password') LIMIT 1");

	// 	return $query;

	// }



	function auth_verifikator($username,$password){

		$query=$this->db->query("SELECT * FROM verifikator WHERE nip='$username' AND password=MD5('$password') LIMIT 1");

		return $query;

	}

	function auth_admin($username,$password){

		$query=$this->db->query("SELECT * FROM admin WHERE nip='$username' AND password=MD5('$password') LIMIT 1");

		return $query;

	}



	//untuk set status login/ logout

	function setStatusAdmin($username, $status){

		$this->db->query("UPDATE admin SET status = '$status' WHERE nip ='$username'");

	}



	function setStatusVerifikator($username, $status){

		$this->db->query("UPDATE verifikator SET status = '$status' WHERE nip ='$username'");

	}

	//untuk set kolom used



	function addUsedAdmin($username, $used){

		$this->db->query("UPDATE admin SET used = used + $used WHERE nip='$username'");

	}



	function setUsedAdmin(){

		$this->db->query("UPDATE admin SET used = 0");

	}



	function addUsedVerifikator($username, $used){

		$this->db->query("UPDATE verifikator SET used = used + $used WHERE nip='$username'");

	}



	function setUsedVerifikator(){

		$this->db->query("UPDATE verifikator SET used = 0");

	}



	//untuk mengambil used

	function getUsedAdmin($username){

		return $this->db->query("SELECT used FROM admin WHERE nip='$username'")-> row_array();

	}



	function getUsedVerifikator($username){

		return $this->db->query("SELECT used FROM verifikator WHERE nip='$username'")-> row_array();

	}

}

