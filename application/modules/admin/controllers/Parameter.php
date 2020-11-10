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
    
    function get_event_json() { //data data produk by JSON object
        header('Content-Type: application/json');
        echo $this->par->getEvent();
    }

    function event(){
        $data['title'] = 'Event Khusus';
        // $data['content'] = 'daftar list users akses';
        $page = 'admin/par/event/v_data';
        echo modules::run('template/adminview', $data, $page);
    }

    function event_edit($id=-1){
        if ($id==-1) {
            $data['title'] = 'Tambah Event Khusus';
        }else{
            $data['event'] = $this->par->getEventById($id);
            $data['title'] = 'Ubah Event Khusus';
        }

        $page = 'admin/par/event/v_form';
        echo modules::run('template/adminview', $data, $page);
    }

    function save_event() {

        $post = $this->input->post();
        
        $id = $this->input->post('id');
        $this->form_validation->set_rules('nama','Nama','trim|required');
        $this->form_validation->set_rules('start','Tanggal Mulai','trim|required');
        $this->form_validation->set_rules('end','Tanggal Selesai','trim|required');
        
        $special = $this->par->getRuangSpecial();

        if ($this->form_validation->run()==FALSE) {
            $this->event_edit($id);
        }elseif(count($special)==0){
            $this->session->set_flashdata('msg', 'Ruang Spesial belum ditentukan');
            $this->event_edit($id);
        }else{
            $post['ruang'] = $special[0];
            $last_id=$this->par->saveEvent($post);
            if ($id!=-1) {
                $id=$id;
            } else {
                $id = $last_id; 
            }
            
            redirect('admin/parameter/event_edit/'.$id);
        }
    }

    function destroy_event($id){
        if ($id!=-1) {
            $this->par->delEvent($id);
            $this->session->set_flashdata('msg', 'data telah dihapus');
            redirect('admin/parameter/event');
        }
    }

    function get_ruang_json() { //data data produk by JSON object
        header('Content-Type: application/json');
        echo $this->par->getRuang();
    }

    function ruang(){
        $data['title'] = 'Ruangan';
        // $data['content'] = 'daftar list users akses';
        $page = 'admin/par/ruang/v_data';
        echo modules::run('template/adminview', $data, $page);
    }

    function ruang_edit($id=-1){
        if ($id==-1) {
            $data['title'] = 'Tambah Ruang';
        }else{
            $data['ruang'] = $this->par->getRuangById($id);
            $data['title'] = 'Ubah Ruang';
            $data['fasilitasRuang'] = $this->par->getFasilitasRuang($id);
        }
        $data['special'] = $this->par->getRuangSpecial();
        $data['fasilitas'] = $this->par->getFasilitasList();

        $page = 'admin/par/ruang/v_form';
        echo modules::run('template/adminview', $data, $page);
    }

    function save_ruang() {

        $post = $this->input->post();
        
        $id = $this->input->post('id');
        $this->form_validation->set_rules('nama','Nama','trim|required');
        $this->form_validation->set_rules('kategori','Kategori','trim|required');

        if ($this->form_validation->run()==FALSE) {
            $this->ruang_edit($id);
        }else{
            $last_id=$this->par->saveRuang($post);
            if ($id!=-1) {
                $id=$id;
            } else {
                $id = $last_id; 
            }
            
            redirect('admin/parameter/ruang_edit/'.$id);
        }
    }

    function destroy_ruang($id){
        if ($id!=-1) {
            $this->par->delRuang($id);
            $this->session->set_flashdata('msg', 'data telah dihapus');
            redirect('admin/parameter/ruang');
        }
    }

    function get_fasilitas_json() { //data data produk by JSON object
        header('Content-Type: application/json');
        echo $this->par->getFasilitas();
    }

    function fasilitas(){
        $data['title'] = 'Fasilitas';
        // $data['content'] = 'daftar list users akses';
        $page = 'admin/par/fasilitas/v_data';
        echo modules::run('template/adminview', $data, $page);
    }

    function fasilitas_edit($id=-1){
        if ($id==-1) {
            $data['title'] = 'Tambah Fasilitas';
        }else{
            $data['fasilitas'] = $this->par->getFasilitasById($id);
            $data['title'] = 'Ubah Fasilitas';
        }

        $page = 'admin/par/fasilitas/v_form';
        echo modules::run('template/adminview', $data, $page);
    }

    function save_fasilitas() {

        $post = $this->input->post();
        
        $id = $this->input->post('id');
        $this->form_validation->set_rules('nama','Nama','trim|required');
      

        if ($this->form_validation->run()==FALSE) {
            $this->fasilitas_edit($id);
        }else{
            $last_id=$this->par->saveFasilitas($post);
            if ($id!=-1) {
                $id=$id;
            } else {
                $id = $last_id; 
            }
            
            redirect('admin/parameter/fasilitas_edit/'.$id);
        }
    }

    function destroy_fasilitas($id){
        if ($id!=-1) {
            $this->par->delFasilitas($id);
            $this->session->set_flashdata('msg', 'data telah dihapus');
            redirect('admin/parameter/fasilitas');
        }
    }
}
?>