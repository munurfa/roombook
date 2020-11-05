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

	function getEvent() {
        $ruang = $this->getRuangSpecial();
        $this->datatables->select('ID,nama,CONCAT(DATE_FORMAT(start_time, "%d-%m-%Y %H:%i")," s/d ", DATE_FORMAT(end_time, "%d-%m-%Y %H:%i")) as tanggal,deskripsi');
        $this->datatables->from('booking');
        $this->datatables->where_in('id_ruang', $ruang);

        $this->datatables->add_column('view', '<a href="event_edit/$1" class="btn btn-warning btn-xs">Ubah</a>', 'ID');

        
        return $this->datatables->generate();
	}

	function getEventById($id)
	{
		return $this->db->get_where('booking', array('id' => $id))->row();
	}

	function saveEvent($data) {

        if (!is_array($data) || !count($data)) {
            return false;
        }

        $datasaver['nama'] = $data['nama'];
        $datasaver['id_user'] = $this->session->userdata('ses_lumba_lumba');
        $datasaver['id_ruang'] = $data['ruang'];
        $datasaver['start_time'] = $data['start'];
        $datasaver['end_time'] = $data['end'];
        $datasaver['deskripsi'] = $data['deskripsi'];
        if ($data['id'] == -1) {
            $this->db->insert('booking', $datasaver);
            return $this->db->insert_id();
        } else {
            return $this->db->update('booking', $datasaver, array('id' => $data['id']));
        }
    }

    function delEvent($id)
    {
    	$this->db->where('id',$id);
    	$this->db->delete('booking');
    }

    function getRuang() {
        $this->datatables->select('ID,nama,CONCAT(IF(kategori="0","Biasa","Khusus"), "(", IF(is_special="0","Tidak","Ya"), ")") as kategori_nama,deskripsi');
        $this->datatables->from('par_ruang');
        $this->datatables->add_column('view', '<a href="ruang_edit/$1" class="btn btn-warning btn-xs">Ubah</a>', 'ID');
        
        return $this->datatables->generate();
    }

    function getRuangById($id)
    {
        return $this->db->get_where('par_ruang', array('id' => $id))->row();
    }

    function getRuangSpecial()
    {
        $dt = $this->db->get_where('par_ruang', array('is_special' => 1))->result();
        $data = [];
        foreach ($dt as $v) {
            $data[] = $v->id;
        }

        return $data;
    }

    function saveRuang($data) {

        if (!is_array($data) || !count($data)) {
            return false;
        }
        $datasaver['nama'] = $data['nama'];
        $datasaver['kategori'] = $data['kategori'];
        if (isset($data['special'])) {
            $datasaver['is_special'] = 1;
        }else{
            $datasaver['is_special'] = 0;
        }
        $datasaver['deskripsi'] = $data['deskripsi'];
        if ($data['id'] == -1) {
            $this->db->insert('par_ruang', $datasaver);
            return $this->db->insert_id();
        } else {
            return $this->db->update('par_ruang', $datasaver, array('id' => $data['id']));
        }
    }

    function delRuang($id)
    {
        $this->db->where('id',$id);
        $this->db->delete('par_ruang');
    }
}
?>