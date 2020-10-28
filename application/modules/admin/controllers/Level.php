<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Level extends MX_Controller {
    
    function __construct()
    {
        parent::__construct();
        $this->load->library('datatables');
        $this->load->library('form_validation');
        $this->load->model('M_par', 'level');
        //validasi jika user belum login
        if($this->session->userdata('masuk') != TRUE){
            $url=base_url('auth/login');
            redirect($url);
        }
    }
    
      function get_level_json() 
      { 
        header('Content-Type: application/json');
        echo $this->level->getLevel();
      }

    function index(){
        $data['title'] = 'Bagian/Unit/Level';
        // $data['content'] = 'daftar list users akses';
        $page = 'admin/par/level/v_data';
        echo modules::run('template/adminview', $data, $page);
    }

    function level_edit($id=-1){
        if ($id==-1) {
            $data['title'] = 'Add Bagian/Unit/Level';
        }else{
            $data['status'] = $this->level->getLevelById($id);
            $data['title'] = 'Edit Bagian/Unit/Level';
        }
        $page = 'admin/par/level/v_form';
        echo modules::run('template/adminview', $data, $page);
    }

    function save_level() {

        $post = $this->input->post();
        $id = $this->input->post('id');
        $this->form_validation->set_rules('nama','Nama','trim|required');

        if ($this->form_validation->run()==FALSE) {
            $this->level_edit($id);
        }else{
            $last_id=$this->level->saveLevel($post);
            if ($id!=-1) {
                $id=$id;
            } else {
                $id = $last_id; 
            }
            
            redirect('admin/level/level_edit/'.$id);
        }
    }
    function destroy_level($id){
        if ($id!=-1) {
            $this->level->delLevel($id);
            $this->session->set_flashdata('msg', 'data telah dihapus');
            redirect('admin/level');
        }
    }

}
?>
