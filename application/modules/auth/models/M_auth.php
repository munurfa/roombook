<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_auth extends CI_Model
{
	
	 function cek($username,$password){
	 	$this->db->select('l.id as lumba_lumba,u.aktif,l.nama as role,d.nama');
	 	$this->db->from('users as u');
	 	$this->db->join('level_users as l', 'u.level_id=l.id');
	 	$this->db->join('deskripsi_users as d', 'u.id=d.user_id');
	 	$this->db->where('username', $username);
	 	$this->db->where('password', md5($password));
	 	$this->db->where('u.aktif', 1);
	 	$this->db->limit(1);

	 	return $this->db->get();
	 	
        // $query=$this->db->query("SELECT u.aktif,l.nama as role,d.nama FROM users as u
        // 	JOIN level_users as l ON u.level_id=l.id
        // 	JOIN deskripsi_users as d ON u.id=d.user_id
        //  	WHERE username='$username' AND password=MD5('$password') AND u.aktif=1 LIMIT 1");
        // return $query;
    }
}
 ?>