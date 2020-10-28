<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Parameter extends MX_Controller
{
    
    function __construct()
    {
        parent::__construct();
        $this->load->library('datatables');
        $this->load->library('form_validation');
        $this->load->model('M_par', 'par');
        //validasi jika user belum login
        if($this->session->userdata('masuk') != TRUE){
            $url=base_url('auth/login');
            redirect($url);
        }
    }
    
      function get_status_json() { //data data produk by JSON object
        header('Content-Type: application/json');
        echo $this->par->getStatus();
      }

    function status(){
        $data['title'] = 'Status of Shipments';
        // $data['content'] = 'daftar list users akses';
        $page = 'admin/par/status/v_data';
        echo modules::run('template/adminview', $data, $page);
    }

    function status_edit($id=-1){
        if ($id==-1) {
            $data['title'] = 'Add Status of Shipment';
        }else{
            $data['status'] = $this->par->getStatusById($id);
            $data['title'] = 'Edit Status of Shipment';
        }
        $page = 'admin/par/status/v_form';
        echo modules::run('template/adminview', $data, $page);
    }

    function save_status() {

        $post = $this->input->post();
        $id = $this->input->post('id');
        $this->form_validation->set_rules('nama','Nama','trim|required');

        if ($this->form_validation->run()==FALSE) {
            $this->status_edit($id);
        }else{
            $last_id=$this->par->saveStatus($post);
            if ($id!=-1) {
                $id=$id;
            } else {
                $id = $last_id; 
            }
            
            redirect('admin/parameter/status_edit/'.$id);
        }
    }
    function destroy_status($id){
        if ($id!=-1) {
            $this->par->delStatus($id);
            $this->session->set_flashdata('msg', 'data telah dihapus');
            redirect('admin/parameter/status');
        }
    }



     function get_type_json() { //data data produk by JSON object
        header('Content-Type: application/json');
        echo $this->par->getType();
      }

    function type(){
        $data['title'] = 'Service of Shipments';
        // $data['content'] = 'daftar list users akses';
        $page = 'admin/par/type/v_data';
        echo modules::run('template/adminview', $data, $page);
    }

    function type_edit($id=-1){
        if ($id==-1) {
            $data['title'] = 'Add Service of Shipment';
        }else{
            $data['type'] = $this->par->getTypeById($id);
            $data['title'] = 'Edit Service of Shipment';
        }
        $page = 'admin/par/type/v_form';
        echo modules::run('template/adminview', $data, $page);
    }

    function save_type() {

        $post = $this->input->post();
        $id = $this->input->post('id');
        $this->form_validation->set_rules('nama','Nama','trim|required');

        if ($this->form_validation->run()==FALSE) {
            $this->type_edit($id);
        }else{
            $last_id=$this->par->saveType($post);
            if ($id!=-1) {
                $id=$id;
            } else {
                $id = $last_id; 
            }
            
            redirect('admin/parameter/type_edit/'.$id);
        }
    }
    function destroy_type($id){
        if ($id!=-1) {
            $this->par->delType($id);
            $this->session->set_flashdata('msg', 'data telah dihapus');
            redirect('admin/parameter/type');
        }
    }
}
?>