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

	
	function register()
	{
		if($this->session->userdata('masuk') != null){
            redirect('admin/home');
        }else{
        	$data['title'] = 'register';
			$page = 'auth/f_register';
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
	
	function save_user() {

        $post = $this->input->post();
       
		$this->form_validation->set_rules('username','Username','trim|required|is_unique[users.username]');
		$this->form_validation->set_rules('email','Email','trim|required|is_unique[users.email]');
		$this->form_validation->set_rules('passwd','Password','trim|required');
      
        $this->form_validation->set_rules('nama','Nama Lengkap','trim|required');
        $this->form_validation->set_rules('no_id','NIP','trim|required');
        $this->form_validation->set_rules('level_id','Level','trim|required');

        if ($this->form_validation->run()==FALSE) {
            $this->register();
        }else{
            $post['password'] = md5($this->input->post('passwd'));
            $this->m_auth->saveUser($post);
			$this->session->set_flashdata('msg_success', 'Register Berhasil Silahkan Login');
            redirect('auth/login');
        }
    }

	function logout()
		{
			$this->session->unset_userdata('masuk');
			$this->session->unset_userdata('ses_id');
			$this->session->unset_userdata('ses_nama');
			$this->session->unset_userdata('ses_role');
			$this->session->unset_userdata('ses_lumba_lumba');
			$this->session->sess_destroy();
			$this->session->set_flashdata('msg', 'Kombinasi Username & Password Salah');
            redirect('auth/login');
		}
	}


?>