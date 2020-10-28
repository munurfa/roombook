<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class M_slide extends CI_Model
{

    function getSlide() {
        $this->datatables->select('ID,title,subtitle,file_name');
        $this->datatables->from('slide');
        $this->datatables->add_column('view', '<a href="slide/slide_edit/$1" class="btn btn-warning btn-xs">edit</a>', 'ID');
        $this->datatables->add_column('image', '<img src="'.base_url("slide/").'$1">', 'file_name');
        
        return $this->datatables->generate();
    }

    function getSlideById($id)
    {
        return $this->db->get_where('slide', array('id' => $id))->row();
    }

    function saveSlide($data) {

        if (!is_array($data) || !count($data)) {
            return false;
        }
        $datasaver['title'] = $data['title'];
        $datasaver['subtitle'] = $data['sub_title'];
        $datasaver['file_name'] = $data['file_name'];
        if ($data['id'] == -1) {
            $this->db->insert('slide', $datasaver);
            return $this->db->insert_id();
        } else {
            $name = $this->getSlideById($data['id'])->file_name;

            if ($datasaver['file_name'] != $name) {
                $this->load->helper('file');
                delete_files('./slide/'.$name);
            }
            return $this->db->update('slide', $datasaver, array('id' => $data['id']));
        }
    }

    function delSlide($id)
    {
        $name = $this->getSlideById($data['id'])->file_name;
        $this->load->helper('file');
        delete_files('./slide/'.$name);

        $this->db->where('id',$id);
        $this->db->delete('slide');
    }

}

