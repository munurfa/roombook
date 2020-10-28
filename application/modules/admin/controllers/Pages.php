<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Pages extends MX_Controller {
    
    function __construct()
    {
        parent::__construct();
        $this->load->library('datatables');
        $this->load->library('form_validation');
        $this->load->model('M_pages', 'page');
        //validasi jika user belum login
        if($this->session->userdata('masuk') != TRUE){
            $url=base_url('auth/login');
            redirect($url);
        }
    }
    
      function get_pages_json() 
      { 
        header('Content-Type: application/json');
        echo $this->page->getPage();
      }

    function index(){
        $data['title'] = 'Pages';
        // $data['content'] = 'daftar list users akses';
        $page = 'admin/pages/v_data';
        echo modules::run('template/adminview', $data, $page);
    }

    function pages_edit($id=-1){
        if ($id==-1) {
            $data['title'] = 'Add Pages';
        }else{
            $data['page'] = $this->page->getPageById($id);
            $data['title'] = 'Edit Pages';
        }
        $page = 'admin/pages/v_form';
        echo modules::run('template/adminview', $data, $page);
    }

    function save_pages() {

        $post = $this->input->post();
        $id = $this->input->post('id');
        $this->form_validation->set_rules('title','Title','trim|required');
        $this->form_validation->set_rules('konten','Konten','trim|required');

        if ($this->form_validation->run()==FALSE) {
            $this->pages_edit($id);
        }else{
            $last_id=$this->page->savePage($post);
            if ($id!=-1) {
                $id=$id;
            } else {
                $id = $last_id; 
            }
            
            redirect('admin/pages/pages_edit/'.$id);
        }
    }
    function destroy_pages($id){
        if ($id!=-1) {
            $this->page->delPage($id);
            $this->session->set_flashdata('msg', 'data telah dihapus');
            redirect('admin/pages');
        }
    }

}
?>
