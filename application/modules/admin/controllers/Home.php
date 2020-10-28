<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MX_Controller {

	function __construct()
    {
        parent::__construct();
        // $this->load->model('m_ship');
        //validasi jika user belum login
        if($this->session->userdata('masuk') != TRUE){
            $url=base_url('auth/login');
            redirect($url);
        }
    }

    function index(){
        $data['title'] = 'Home';
        $data['content'] = 'daftar list users akses';
        $page = 'admin/home/v_show';
        echo modules::run('template/adminview', $data, $page);
    }
}
