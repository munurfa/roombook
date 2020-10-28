<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class M_par extends CI_Model
{

    function getLevel() {
        $this->datatables->select('ID,nama,deskripsi');
        $this->datatables->from('level_users');
        $this->datatables->where_not_in('id', 1);
        $this->datatables->add_column('view', '<a href="level/level_edit/$1" class="btn btn-warning btn-xs">edit</a>', 'ID');
        
        return $this->datatables->generate();
    }

    function getLevelById($id)
    {
        return $this->db->get_where('level_users', array('id' => $id))->row();
    }

    function saveLevel($data) {

        if (!is_array($data) || !count($data)) {
            return false;
        }
        $datasaver['nama'] = $data['nama'];
        $datasaver['deskripsi'] = $data['deskripsi'];
        if ($data['id'] == -1) {
            $this->db->insert('level_users', $datasaver);
            return $this->db->insert_id();
        } else {
            return $this->db->update('level_users', $datasaver, array('id' => $data['id']));
        }
    }

    function delLevel($id)
    {
        $this->db->where('id',$id);
        $this->db->delete('level_users');
    }



	function getStatus() {
        $this->datatables->select('ID,nama,deskripsi');
        $this->datatables->from('par_status');
        $this->datatables->add_column('view', '<a href="status_edit/$1" class="btn btn-warning btn-xs">edit</a>', 'ID');
        
        return $this->datatables->generate();
	}

	function getStatusById($id)
	{
		return $this->db->get_where('par_status', array('id' => $id))->row();
	}

	function saveStatus($data) {

        if (!is_array($data) || !count($data)) {
            return false;
        }
        $datasaver['nama'] = $data['nama'];
        $datasaver['deskripsi'] = $data['deskripsi'];
        if ($data['id'] == -1) {
            $this->db->insert('par_status', $datasaver);
            return $this->db->insert_id();
        } else {
            return $this->db->update('par_status', $datasaver, array('id' => $data['id']));
        }
    }

    function delStatus($id)
    {
    	$this->db->where('id',$id);
    	$this->db->delete('par_status');
    }

    function getType() {
        $this->datatables->select('ID,nama,deskripsi');
        $this->datatables->from('par_type');
        $this->datatables->add_column('view', '<a href="type_edit/$1" class="btn btn-warning btn-xs">edit</a>', 'ID');
        
        return $this->datatables->generate();
    }

    function getTypeById($id)
    {
        return $this->db->get_where('par_type', array('id' => $id))->row();
    }

    function saveType($data) {

        if (!is_array($data) || !count($data)) {
            return false;
        }
        $datasaver['nama'] = $data['nama'];
        $datasaver['deskripsi'] = $data['deskripsi'];
        if ($data['id'] == -1) {
            $this->db->insert('par_type', $datasaver);
            return $this->db->insert_id();
        } else {
            return $this->db->update('par_type', $datasaver, array('id' => $data['id']));
        }
    }

    function delType($id)
    {
        $this->db->where('id',$id);
        $this->db->delete('par_type');
    }
}
?>