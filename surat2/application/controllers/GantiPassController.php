<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class GantiPassController extends CI_Controller {



	public function __construct()

	{

		parent::__construct();

		$this->load->model('m_login');

        if($this->session->userdata('masuk') != TRUE){

            $url=base_url();

            redirect($url);

        }

    

        if($this->session->userdata('akses') =='admin'){

			$cek_used = $this->m_login->getUsedAdmin($this->session->userdata('ses_id'));

			$used = $cek_used['used'];

			if($this->session->userdata('ses_id_used') < $used){

			  $this->session->sess_destroy();

			  $url=base_url();

			  $this->session->set_flashdata('detect', 'Akun Terdeteksi Login Diperangkat Lain !');

			  redirect($url);

			}

	  }

  

	  if($this->session->userdata('akses') =='verifikator'){

			$cek_used = $this->m_login->getUsedVerifikator($this->session->userdata('ses_id'));

			$used = $cek_used['used'];

			if($this->session->userdata('ses_id_used') < $used){

			  $this->session->sess_destroy();

			  $this->session->set_flashdata('detect', 'Akun Terdeteksi Login Diperangkat Lain !');

			  $url=base_url();

			  redirect($url);

			}

	  }
	$this->load->helper('url');
	$this->load->library('form_validation');

	}



	public function index()

	{

	    $data['judul'] = 'Ganti Password';

		$data['jumlah_surat_masuk']= $this->m_surat_masuk->hitungBaris(NULL, NULL, NULL);

		$data['surat_masuk'] = $data['jumlah_surat_masuk']['jumlah'];



		$data['where'] = $this->uri->segment(1);

		if($this->session->userdata('akses') == 'admin'){

			$data['user'] = $this->db->get_where('admin', ['nip' => $this->session->userdata('ses_id')])->row_array();

		}else{

			$data['user'] = $this->db->get_where('verifikator', ['nip' => $this->session->userdata('ses_id')])->row_array();

		}

		$config = array(

		   array(

		     'field' => 'pass_lama',

		     'label' => 'Pass Lama',

			 'rules' => 'required',

			 'errors' => array(

				'required' => 'Harap Isi Password Lama Anda',

				),

		   ),



		   array(

		     'field' => 'pass_baru',

		     'label' => 'Pass Baru',

			 'rules' => 'required|min_length[6]',

			 'errors' => array(

				'required' => 'Password Harus Diisi!',

				'min_length'=> 'Password Minimal 6 Karakter',

				),

		   ),



		   array(

		     'field' => 'conf_password',

		     'label' => 'conf_password',

			 'rules' => 'required|matches[pass_baru]',

			 'errors' => array(

				'required' => 'Konfirmasi Password !',

				'matches'=> 'Password yang Dimasukan berbeda',

				),

		   ),



		  );



		$this->form_validation->set_rules($config);



		if( $this->form_validation->run() == FALSE){

			$this->load->view('templates/header', $data);

			$this->load->view('v_ganti_pass');

			$this->load->view('templates/footer');

		} else{//jalankan fungsi

			$pass_lama = md5($this->input->post('pass_lama'));

			$pass_baru = md5($this->input->post('pass_baru'));

			if($pass_lama != $data['user']['password']){

				$this->session->set_flashdata('flash', 'Password Lama Salah!');

				redirect('GantiPassController');

			}else{



				if($pass_lama == $pass_baru){

					$this->session->set_flashdata('flash', 'Password Baru Tidak Boleh Sama Dengan Password Lama!');

					redirect('GantiPassController');

				}else{

					//pass sudah ok

					$password = $pass_baru;



					// $this->db->set('password', $password);

					// $this->db->where('nip' , $this->session->userdata('ses_id'));

					if($this->session->userdata('akses') == 'admin'){

						$this->db->set('password', $password);

						$this->db->where('nip' , $this->session->userdata('ses_id'));

						$this->db->update('admin');

					}else{

						$this->db->set('password', $password);

						$this->db->where('nip' , $this->session->userdata('ses_id'));

						$this->db->update('verifikator');

					}

					$this->session->set_flashdata('flash', 'Diganti');

					redirect('SuratMasukController');

				}

			}

		}

		

	}





}