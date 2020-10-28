<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Slide extends MX_Controller {
    
    function __construct()
    {
        parent::__construct();
        $this->load->library('datatables');
        $this->load->library('form_validation');
        $this->load->model('M_slide', 'slide');
        //validasi jika user belum login
        if($this->session->userdata('masuk') != TRUE){
            $url=base_url('auth/login');
            redirect($url);
        }
    }
    
      function get_slide_json() 
      { 
        header('Content-Type: application/json');
        echo $this->slide->getSlide();
      }

    function index(){
        $data['title'] = 'Slide';
        // $data['content'] = 'daftar list users akses';
        $page = 'admin/slide/v_data';
        echo modules::run('template/adminview', $data, $page);
    }

    function slide_edit($id=-1){
        if ($id==-1) {
            $data['title'] = 'Add Slide';
        }else{
            $data['slide'] = $this->slide->getSlideById($id);
            $data['title'] = 'Edit Slide';
        }
        $page = 'admin/slide/v_form';
        echo modules::run('template/adminview', $data, $page);
    }

    function save_slide(){
         $post = $this->input->post();
        $id = $this->input->post('id');

         $this->form_validation->set_rules('title','Title','trim|required');
        $this->form_validation->set_rules('sub_title','Sub Title','trim|required');
       

        if ($this->form_validation->run()==FALSE) {
            $this->slide_edit($id);
        }else{
            $config['upload_path']          = './slide/';
            $config['allowed_types']        = 'jpg|png';
            $config['max_size']             = 1000;
            // $config['max_width']            = 1024;
            // $config['max_height']           = 768;
            $config['encrypt_name']         = TRUE;
         
            $this->load->library('upload', $config);
            // var_dump($id);
            // die();
            if ( (! $this->upload->do_upload('file_name')) && ($id==-1) ){
                $this->session->set_flashdata('error', $this->upload->display_errors());
                redirect('admin/slide/slide_edit/'.$id);
            }elseif ( (! $this->upload->do_upload('file_name')) && ($id!=-1) ){
                $a = $this->input->post('image');
            }elseif ( ($this->upload->do_upload('file_name')) && ($id!=-1) ){
                $a = $this->upload->data('file_name');
            }else{
                $a = $this->upload->data('file_name');
            }

            $data['id'] = $id;
            $data['title'] = $this->input->post('title');
            $data['sub_title'] = $this->input->post('sub_title');
            $data['file_name'] = $a;
            
                $last_id=$this->slide->saveSlide($data);
                if ($id!=-1) {
                    $id=$id;
                } else {
                    $id = $last_id; 
                }
                
                redirect('admin/slide/slide_edit/'.$id);
        }
    }

    function destroy_slide($id){
        if ($id!=-1) {
            $this->slide->delSlide($id);
            $this->session->set_flashdata('msg', 'data telah dihapus');
            redirect('admin/slide');
        }
    }

}
?>
