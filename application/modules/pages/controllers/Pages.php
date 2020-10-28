<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends MX_Controller {

	function __construct()
    {
        parent::__construct();
        $this->load->model('m_page', 'page');
        
    }

     function index($slug){
        $page = $this->page->getPage($slug);           

        $data['title'] = $page->title;
        $data['konten'] = $page->konten;
        $page = 'pages/v_show';
        echo modules::run('template/frontview', $data, $page);
    }

}