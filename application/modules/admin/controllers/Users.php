<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends MX_Controller
{
    
    function __construct()
    {
        parent::__construct();
        $this->load->model('m_user', 'user');
        $this->load->library('datatables');
        $this->load->library('form_validation');
        //validasi jika user belum login
        if($this->session->userdata('masuk') != TRUE){
            $url=base_url('auth/login');
            redirect($url);
        }
    }

    function ubah_pass(){

        $data['title'] = 'Ubah Password';
      
        $page = 'admin/user/v_form_ubah';
        echo modules::run('template/adminview', $data, $page);
    }

    function ubah_pass_aksi(){
        $data['id'] = $this->session->userdata('ses_lumba_lumba');
        $this->form_validation->set_rules('passwd','Password','trim|required|min_length[6]');
        $this->form_validation->set_rules('passconf', 'Ulangi Password', 'required|matches[passwd]');

        if ($this->form_validation->run()==FALSE) {
            $this->ubah_pass();
        }else{
            $post['password'] = md5($this->input->post('passwd'));
            $this->db->update('users', $post, array('id' => $data['id']));
            $this->session->set_flashdata('msg', 'Password Berhasil Diubah, Jangan Sampai Lupa!');
            redirect('admin/home');
        }
    }

    function user_json() { //data data produk by JSON object
        header('Content-Type: application/json');
        echo $this->user->getUser();
    }
    
    function index(){
        $data['title'] = 'index | users';
        $data['content'] = 'daftar list users akses';
        $page = 'admin/user/v_show';
        echo modules::run('template/adminview', $data, $page);
    }

    function create($id=-1){
        if ($id==-1) {
            $data['title'] = 'Add Users';
        }else{
            $data['user'] = $this->user->getUserById($id);
            $data['title'] = 'Edit User';
        }
        $data['level'] = $this->user->level()->result();
        $page = 'admin/user/v_form';
        echo modules::run('template/adminview', $data, $page);
    }

    function save_user() {

        $post = $this->input->post();
        $id = $this->input->post('id');
        $username=$this->input->post('username');
        if ($id != -1) {
            if ($username!='') {
                $cek = $this->user->username_cek($username)->username;
                if ($cek!=$username) {
                    $this->form_validation->set_rules('username','Username','trim|required|is_unique[users.username]');
                        
                }
            }else{
                $this->form_validation->set_rules('username','Username','trim|required|is_unique[users.username]');
            }

            
        }else{
            $this->form_validation->set_rules('username','Username','trim|required|is_unique[users.username]');
        }


        $this->form_validation->set_rules('nama','Nama','trim|required');
        $this->form_validation->set_rules('no_id','NIP','trim|required');
        $this->form_validation->set_rules('level_id','Level','trim|required');
        
        $this->form_validation->set_rules('passwd','Password','trim|required');

        if ($this->form_validation->run()==FALSE) {
            $this->create($id);
        }else{
            $post['password'] = md5($this->input->post('passwd'));
            $last_id=$this->user->saveUser($post);
            if ($id!=-1) {
                $id=$id;
            } else {
                $id = $last_id; 
            }
            
            redirect('admin/users/create/'.$id);
        }
    }
    function destroy($id){
        if ($id!=-1) {
            $this->user->delUser($id);
            $this->session->set_flashdata('msg', 'data telah dihapus');
            redirect('admin/users');
        }
    }

}
?>