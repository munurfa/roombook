<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_auth extends CI_Model
{
	
	function cek($username,$password){
	 	$this->db->select('u.id as lumba_lumba,u.aktif,l.nama as role,d.nama');
	 	$this->db->from('users as u');
	 	$this->db->join('level_users as l', 'u.level_id=l.id');
	 	$this->db->join('deskripsi_users as d', 'u.id=d.user_id');
	 	$this->db->where('username', $username);
	 	$this->db->where('password', md5($password));
	 	$this->db->where('u.aktif', 1);
	 	$this->db->limit(1);

	 	return $this->db->get();
	}
	
	function saveUser($data) {

        if (!is_array($data) || !count($data)) {
            return false;
        }
        $datasaverdes['nama'] = $data['nama'];
        $datasaverdes['no_id'] = $data['no_id'];
        $datasaver['level_id'] = $data['level_id'];
        $datasaver['username'] = strtolower($data['username']);
        $datasaver['email'] = strtolower($data['email']);
        $datasaver['password'] = $data['password'];
        $datasaver['aktif'] = $data['aktif'];

		$this->db->insert('users', $datasaver);
		$a =  $this->db->insert_id();
		$datasaverdes['user_id'] = $a;
		$this->db->insert('deskripsi_users', $datasaverdes);

		return $a;
      
    }
}
 ?>