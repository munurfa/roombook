<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class M_book extends CI_Model
{

	
	function ruang()
	{
		$this->db->select('id,nama');
		$this->db->from('par_ruang');
		$this->db->where('is_special', 0);
		$query = $this->db->get();
		if ( $query->num_rows() > 0 )
	    {
	        $row = $query->result();
	        return $row;
	    }
	}

	function cekJadwal($ruang, $awal, $akhir)
	{
		$khusus = $this->getRuangKhusus();

		if (in_array($ruang, $khusus)) {
			$ruangan = implode(",", $this->getRuangSpecial());
		}else{
			$ruangan = $ruang;
		}

		$sql = "SELECT id_ruang FROM booking WHERE id_ruang in (?) AND (start_time<=? and end_time>?) AND (start_time<? and end_time>=?) OR (start_time>? and end_time<=?)";
		
		$dt = $this->db->query($sql, array($ruangan, $awal, $awal, $akhir, $akhir, $awal, $akhir));
	
		return $dt->result();

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
	
	function getRuangKhusus()
    {
        $dt = $this->db->get_where('par_ruang', array('kategori' => '1'))->result();
        $data = [];
        foreach ($dt as $v) {
            $data[] = $v->id;
        }

        return $data;
	}

	function getRuangSpecialNama()
    {
        $dt = $this->db->get_where('par_ruang', array('is_special' => 1))->result();
        $data = [];
        foreach ($dt as $v) {
            $data[] = $v->nama;
        }

        return $data;
	}
	
	function getRuangKhususNotSpecial()
    {
		$this->db->where('is_special', 0);
		$this->db->where('kategori', '1');
		$this->db->from('par_ruang');
        $dt = $this->db->get()->result();
        $data = [];
        foreach ($dt as $v) {
            $data[] = $v->nama;
        }

        return $data;
	}

	function dataChart()
    {
        $this->db->select('par_ruang.nama as nama_ruang, count(booking.id) as jml');
        $this->db->from('par_ruang');
		$this->db->join('booking', 'booking.id_ruang=par_ruang.id', 'left');
        $this->db->group_by('par_ruang.id');
        $this->db->order_by('jml', 'desc');
		
		$dt = $this->db->get();
		$data = [];
		foreach ($dt->result() as $v) {
			$data['nama'][] = '"'.$v->nama_ruang.'"';
			$data['jml'][] = $v->jml;
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
        return $data;
    }

	function getBook($awal='',$akhir='') {
		$ruang = $this->getRuangSpecial();
	
		$this->datatables->select('booking.id as id, booking.nama, DATE_FORMAT(start_time, "%d-%m-%Y") as tanggal, CONCAT(DATE_FORMAT(start_time, "%H:%i")," s/d ", DATE_FORMAT(end_time, "%H:%i")) as jam, booking.deskripsi, par_ruang.nama as ruang');
		$this->datatables->from('booking');
		
		$this->datatables->join('par_ruang', 'booking.id_ruang = par_ruang.id', 'left');
		$this->datatables->where('id_user', $this->session->userdata('ses_lumba_lumba'));
		$this->datatables->where_not_in('id_ruang', $ruang);

		


        if (($awal!='')&&($akhir!='')) {
        
        	$this->datatables->where('start_time >=', $awal);
			$this->datatables->where('start_time <=', $akhir);
		}

        $this->datatables->add_column('view', '<a href="booking/create/$1" class="btn btn-warning btn-sm">Ubah</a>  <a target="_blank" href="booking/detail_cetak/$1" class="btn btn-info btn-sm d-none"><i class="mdi mdi-printer"></i></a> <a href="booking/destroy/$1" class="btn btn-danger btn-sm"><i class="mdi mdi-delete"></i></a>', 'id');
        // echo $this->db->get_compiled_select();
        // die();
        return $this->datatables->generate();
	}

	function getBookByNo($id)
	{
		$this->db->select('id, nama, DATE_FORMAT(start_time, "%Y-%m-%d") as tanggal,DATE_FORMAT(start_time, "%H:%i") as awal, DATE_FORMAT(end_time, "%H:%i") as akhir, deskripsi, id_ruang');
		$this->db->from('booking');
		$this->db->where('id', $id);
		$dt = $this->db->get();
		return $dt->row();
	}

	function getBookAll()
	{
		$ruangSpecial = $this->getRuangSpecial();
		$ruangKhusus = $this->getRuangKhusus();

		$this->db->select('booking.id, booking.nama, start_time, end_time, id_ruang, booking.deskripsi, par_ruang.nama as ruang');
		$this->db->from('booking');
		$this->db->join('par_ruang', 'booking.id_ruang = par_ruang.id', 'left');
		$this->db->order_by('start_time');

		$dt = $this->db->get();
		$d = $dt->result();
		$data = [];
		$group = [];
		$datenotindb = [];
		
		foreach ($d as $v) {
			
			if (in_array($v->id_ruang, $ruangSpecial)) {
				$allDay = true;
				$bg = 'red';
				$start = substr($v->start_time, 0, 10);
				$date = substr($v->end_time, 0, 10);
				$end =  date('Y-m-d', strtotime($date. ' + 1 days'));
				$pindah = implode(" ", $this->getRuangKhususNotSpecial());
				$data[] = [
					'title' => '['.$pindah.'] Dipakai 3 org',
					'start' => $start,
					'end' => $end,
					'allDay' => $allDay,
					'backgroundColor' => 'red'
				];
				$mulai = new DateTime( $start );
				$akhir = new DateTime( $end );
				
				$interval = new DateInterval('P1D');
				$daterange = new DatePeriod($mulai, $interval ,$akhir);
				
				foreach($daterange as $date){
					$datenotindb[]= $date->format("Y-m-d");
				}
			}else{
				$group[substr($v->start_time, 0, 10)][] = $v->id; 

				$allDay = false;
				$bg = 'blue';
				$start = $v->start_time;
				$end = $v->end_time;
				if (count($group[substr($v->start_time, 0, 10)]) == 1 && !in_array(substr($v->start_time, 0, 10), $datenotindb)) {
					$pindah = implode(" ", $this->getRuangSpecialNama());
					$data[] = [
						'title' => '['.$pindah.'] Dipakai 3 org',
						'start' => $v->start_time,
						'end' => $v->end_time,
						'allDay' => true,
						'backgroundColor' => 'red'
					];
				}
			}
			
			$data[] = [
				'title' => '['.$v->ruang.'] '.$v->nama,
				'start' => $start,
				'end' => $end,
				'allDay' => $allDay,
				'backgroundColor' => $bg
			];
			
		}
		// var_dump($datenotindb);
		// var_dump(in_array('2020-11-17', $datenotindb));
		// die();
		return $data;
	}

	function saveBook($data) {

        if (!is_array($data) || !count($data)) {
            return false;
        }
		$awal_time = $data['tanggal'].' '.$data['awal'];
		$akhir_time = $data['tanggal'].' '.$data['akhir'];
		
        $dtsaver['id_ruang']=$data['id_ruang'];  
        $dtsaver['id_user']=$this->session->userdata('ses_lumba_lumba');;  
		$dtsaver['nama']=$data['agenda'];
		$dtsaver['start_time']=$awal_time;
		$dtsaver['end_time']=$akhir_time;

		$dtsaver['deskripsi']=$data['deskripsi'];
		
        if ($data['id'] == -1) {
            
            $this->db->insert('booking', $dtsaver);

	    	return $this->db->insert_id();
        }else {

            return $this->db->update('booking', $dtsaver, array('id' => $data['id']));
        }
    }

    function delBook($id)
    {
    	
        $this->db->where('id',$id);
    	$this->db->delete('booking');
    	
    }
}
?>