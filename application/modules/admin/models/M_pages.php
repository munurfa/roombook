<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class M_pages extends CI_Model
{

    function getPage() {
        $this->datatables->select('ID,slug,title,konten');
        $this->datatables->from('pages');
        $this->datatables->add_column('view', '<a href="pages/pages_edit/$1" class="btn btn-warning btn-xs">edit</a>', 'ID');
        $this->datatables->add_column('url', '<a target="_blank" href="'.base_url('pages/index').'/$1">'.base_url('pages/index').'/$1</a>', 'slug');
        
        return $this->datatables->generate();
    }

    function getPageById($id)
    {
        return $this->db->get_where('pages', array('id' => $id))->row();
    }

    function savePage($data) {

        if (!is_array($data) || !count($data)) {
            return false;
        }
        $slug = url_title($data['title'], 'dash', TRUE);

        $datasaver['title'] = $data['title'];
        $datasaver['slug'] = $slug;
        $datasaver['konten'] = $data['konten'];
        if ($data['id'] == -1) {
            $this->db->insert('pages', $datasaver);
            return $this->db->insert_id();
        } else {
            return $this->db->update('pages', $datasaver, array('id' => $data['id']));
        }
    }

    function delPage($id)
    {
        $this->db->where('id',$id);
        $this->db->delete('pages');
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