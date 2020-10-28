<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Template extends MX_Controller
{
    function __construct()
    {
     parent::__construct();
    }
    
    function adminview($data=NULL,$page = NULL)
    {
        $this->load->view('admin/v_header',$data);  
        $this->load->view('admin/v_content',$data); 
        if($page != NULL){
            $this->load->view($page,$data);
        } else {
           $this->load->view('admin/v_content',$data);
        }
        $this->load->view('admin/v_footer',$data);
    }

    function authview($data=NULL,$page = NULL)
    {
        $this->load->view('auth/v_header',$data);  
        $this->load->view('auth/v_content',$data); 
        if($page != NULL){
            $this->load->view($page,$data);
        } else {
           $this->load->view('auth/v_content',$data);
        }
        $this->load->view('auth/v_footer',$data);
    }

    function frontview($data=NULL,$page = NULL)
    {
        $this->load->view('front/v_header',$data);  
        $this->load->view('front/v_content',$data); 
        if($page != NULL){
            $this->load->view($page,$data);
        } else {
           $this->load->view('front/v_content',$data);
        }
        $this->load->view('front/v_footer',$data);
    }
}
?>