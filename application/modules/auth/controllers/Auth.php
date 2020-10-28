<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends MX_Controller
{
	
	function __construct()
	{
		# code...
		parent::__construct();
		$this->load->model('m_auth');
		
	}
 
	function login()
	{
		if($this->session->userdata('masuk') != null){
            redirect('admin/home');
        }else{
        	$data['title'] = 'login';
			$page = 'auth/f_login';
			echo modules::run('template/authview', $data, $page);
        }
		
	}

	function authLogin(){
        $username=htmlspecialchars($this->input->post('username',TRUE),ENT_QUOTES);
        $password=htmlspecialchars($this->input->post('password',TRUE),ENT_QUOTES);
 
        $cek=$this->m_auth->cek($username,$password); 

        if($cek->num_rows() > 0){ //jika login sebagai dosen
	        $data=$cek->row_array();
	        $this->session->set_userdata('masuk',TRUE);
            $this->session->set_userdata('ses_id',uniqid(rand()));
            $this->session->set_userdata('ses_role',$data['role']);
            $this->session->set_userdata('ses_nama',$data['nama']);
            $this->session->set_userdata('ses_lumba_lumba',$data['lumba_lumba']);
            redirect('admin/home');
        }else{
        	$this->session->set_flashdata('msg', 'Kombinasi Username & Password Salah');
            redirect('auth/login');
        }
    }

	function logout()
		{
			$this->session->unset_userdata('masuk');
			$this->session->unset_userdata('ses_id');
			$this->session->unset_userdata('ses_nama');
			$this->session->unset_userdata('ses_role');
			$this->session->sess_destroy();
			$this->session->set_flashdata('msg', 'Kombinasi Username & Password Salah');
            redirect('auth/login');
		}
	}


?>