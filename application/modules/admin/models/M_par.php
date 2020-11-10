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
        // $this->datatables->generate();
        // $this->datatables->add_column('fasilitas',$this->getFasilitasRuangNama('$1') ,'ID');
        $data = json_decode($this->datatables->generate());
        foreach ($data->data as $v) {
            $v->fasilitas = $this->getFasilitasRuangNama($v->ID);
        }
        return json_encode($data);
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
        // var_dump($data['fasilitas']);
        // die();
        $datasaver['nama'] = $data['nama'];
        $datasaver['kategori'] = $data['kategori'];
        if (isset($data['special'])) {
            $datasaver['is_special'] = 1;
        }else{
            $datasaver['is_special'] = 0;
        }
        $datasaver['deskripsi'] = $data['deskripsi'];
        $fasilitas = (is_array($data['fasilitas']))?$data['fasilitas']:[];
        $fasil = [];
        if ($data['id'] == -1) {
            $this->db->insert('par_ruang', $datasaver);
            $last_id = $this->db->insert_id();
            foreach ($fasilitas as $v) {
                $fasil[] = ['id_ruang'=>$last_id, 'id_fasilitas'=>$v] ;
            }
            $this->db->insert_batch('fasilitas_ruang', $fasil);
            return  $last_id;
        } else {
            $this->db->where('id_ruang',$data['id']);
            $this->db->delete('fasilitas_ruang');
            foreach ($fasilitas as $v) {
                $fasil[] = ['id_ruang'=>$data['id'], 'id_fasilitas'=>$v] ;
            }
            $this->db->insert_batch('fasilitas_ruang', $fasil);
            return $this->db->update('par_ruang', $datasaver, array('id' => $data['id']));
        }
    }

    function delRuang($id)
    {
        $this->db->where('id',$id);
        $this->db->delete('par_ruang');
        $this->db->where('id_ruang',$id);
        $this->db->delete('fasilitas_ruang');
    }

    function getFasilitas() {
        $this->datatables->select('ID,nama,IF(is_aktif=1,"Aktif","Tidak Aktif") as aktif_nama,deskripsi, is_aktif');
        $this->datatables->from('par_fasilitas');
        $this->datatables->add_column('view', '<a href="fasilitas_edit/$1" class="btn btn-warning btn-xs">Ubah</a>', 'ID');
        
        return $this->datatables->generate();
    }

    function getFasilitasList() {
        $this->db->select('id,nama');
        $this->db->where('is_aktif', 1);
        $this->db->from('par_fasilitas');
        $dt = $this->db->get();
        
        return $dt->result();
    }

    function getFasilitasRuang($id_ruang) {
        $this->db->select('id_fasilitas');
        $this->db->where('id_ruang', $id_ruang);
        $this->db->from('fasilitas_ruang');
        $dt = $this->db->get();
        $data = [];
        foreach ($dt->result() as $v) {
            $data[] = $v->id_fasilitas;
        }
        return $data;
    }

    function fasilitasRuang($id_ruang)
    {
        $this->db->select('id_fasilitas, nama');
        $this->db->where('id_ruang', $id_ruang);
        $this->db->from('fasilitas_ruang');
        $this->db->join('par_fasilitas', 'par_fasilitas.id=fasilitas_ruang.id_fasilitas', 'right');
        $dt = $this->db->get();

        return $dt->result();
    }

    function getFasilitasRuangNama($id_ruang) {
        $dt = $this->fasilitasRuang($id_ruang);
        
        $data = [];
        foreach ($dt as $v) {
            $data[] = $v->nama;
        }
        return implode(', ', $data);
    }

    function getFasilitasById($id)
    {
        return $this->db->get_where('par_fasilitas', array('id' => $id))->row();
    }

    function saveFasilitas($data) {

        if (!is_array($data) || !count($data)) {
            return false;
        }
        $datasaver['nama'] = $data['nama'];
        $datasaver['is_aktif'] = $data['aktif'];
      
        $datasaver['deskripsi'] = $data['deskripsi'];
        if ($data['id'] == -1) {
            $this->db->insert('par_fasilitas', $datasaver);
            return $this->db->insert_id();
        } else {
            return $this->db->update('par_fasilitas', $datasaver, array('id' => $data['id']));
        }
    }

    function delFasilitas($id)
    {
        $this->db->where('id',$id);
        $this->db->delete('par_fasilitas');
    }
}
?>