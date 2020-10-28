<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MX_Controller {

	function __construct()
    {
        parent::__construct();
        $this->load->model('m_home', 'home');
        
    }

    function index(){
        $no_awb = $this->input->get('no_awb');

        if ($no_awb != '') {
            $data['oldValue'] = $no_awb;
            $data['tracking'] =  $this->home->getTracking($no_awb);           
        }
        $data['slide'] =  $this->home->getSlide()->result();           

        $data['title'] = 'Home';
        $page = 'home/v_show';
        echo modules::run('template/frontview', $data, $page);
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
