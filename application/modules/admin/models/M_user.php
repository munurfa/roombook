<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class M_user extends CI_Model
{
	function getUser() {
        $this->datatables->select('ID,no_id,nama_user,nama,username, IF(aktif="0","Tidak","Ya") as aktif_nama' );
        $this->datatables->from('all_users_view');

        

        $this->datatables->add_column('view', '<a href="users/create/$1" class="btn btn-warning btn-xs">edit</a>', 'ID');

       
        return $this->datatables->generate();
	}

	function level()
	{
		$this->db->select('*');
		$this->db->from('level_users');
		$this->db->where_not_in('id',1);
		return $this->db->get();;
	}

	function getUserById($id)
	{
		return $this->db->get_where('all_users_view', array('id' => $id))->row();
	}

	function username_cek($username)
	{
		return $this->db->get_where('all_users_view', array('username' => $username))->row();
	}

	function saveUser($data) {

        if (!is_array($data) || !count($data)) {
            return false;
        }
        $datasaverdes['nama'] = $data['nama'];
        $datasaverdes['no_id'] = $data['no_id'];
        $datasaver['level_id'] = $data['level_id'];
        $datasaver['username'] = strtolower($data['username']);
        $datasaver['password'] = $data['password'];
        $datasaver['aktif'] = $data['aktif'];

        if ($data['id'] == -1) {
            $this->db->insert('users', $datasaver);
            $a =  $this->db->insert_id();
            $datasaverdes['user_id'] = $a;
            $this->db->insert('deskripsi_users', $datasaverdes);

            return $a;
        } else {
            $this->db->update('deskripsi_users', $datasaverdes, array('user_id' => $data['id']));
            
            return $this->db->update('users', $datasaver, array('id' => $data['id']));
        }
    }
    
    function delUser($id){
    	$this->db->where('id',$id);
    	$this->db->delete('users');
    
    	$this->db->where('user_id',$id);
    	$this->db->delete('deskripsi_users');

    }
}
?>