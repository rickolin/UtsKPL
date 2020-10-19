<?php
	class LogoutController extends CI_Controller
	{

		function index(){
		    $this->load->model('m_login');
			$username = $this->session->userdata('ses_id');
			
			if($this->session->userdata('akses') == 'admin'){
				$this->m_login->setStatusAdmin($username, '0');
			}elseif($this->session->userdata('akses') == 'verifikator'){
				$this->m_login->setStatusVerifikator($username, '0');
			}
			$this->session->sess_destroy();
			redirect('LandingPageController');
		}
	}
?>