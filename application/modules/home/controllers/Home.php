<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MX_Controller {

	function __construct()
    {
        parent::__construct();
        $this->load->model('m_home', 'home');
        $this->load->model('admin/m_book', 'book');
        
    }

    function index(){         

        $data['title'] = 'Home';
        $data['jadwal'] = json_encode($this->book->getBookAll());
        // var_dump($data['jadwal']);
        // die();
        $page = 'home/v_show';
        echo modules::run('template/authview', $data, $page);
    }

    function get_tracking(){
        $post = $this->input->post();
        $this->form_validation->set_rules('no_awb','NO. AWB','trim|required');
        if ($this->form_validation->run()==FALSE) {
            $this->index();
        }else{

        }
    }

    function pages($slug){
        $page = $this->page->getPage($slug)->result();           

        $data['title'] = $page->title;
        $data['konten'] = $page->content;
        $page = 'pages/v_show';
        echo modules::run('template/frontview', $data, $page);
    }
}
