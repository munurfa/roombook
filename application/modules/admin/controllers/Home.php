<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MX_Controller {

	function __construct()
    {
        parent::__construct();
        $this->load->model('M_book', 'book');
        //validasi jika user belum login
        if($this->session->userdata('masuk') != TRUE){
            $url=base_url('auth/login');
            redirect($url);
        }
    }

    function index(){
        $data['title'] = 'Home';
        $data['content'] = 'daftar list users akses';
        $data['jadwal'] = json_encode($this->book->getBookAll());
        if (($this->session->userdata('ses_role')=="superuserdo") || ($this->session->userdata('ses_role')=="admin")) {
            $data['ruang'] = $this->book->dataChart();
        }
        $page = 'admin/home/v_show';
        echo modules::run('template/adminview', $data, $page);
    }
}
