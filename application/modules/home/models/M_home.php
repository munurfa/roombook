<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class M_home extends CI_Model
{

	function getSlide()
	{
		$this->db->select('*');
		$this->db->from('slide');
		return $this->db->get();
	}

	function getTracking($no)
	{
		$group = $this->noAwbGroup($no);
		if ($group->num_rows() > 0) {
			return $group->result();
		}else{
			return false;
		}
	}

	function noAwbGroup($no)
	{
		$dt = explode(',', $no);
		$this->db->select('no_awb, nama_shipper, nama_rec, type');
		$this->db->from('all_shipments_view');
		$this->db->where_in('no_awb', $dt);
		$this->db->group_by('no_awb');
		return $this->db->get();
	}

	function detailTrack($no)
	{
		$this->db->select('status, tgl_pickup,prov_shipment_name, kab_shipment_name');
		$this->db->from('all_shipments_view');
		$this->db->where('no_awb', $no);
		$this->db->order_by('tgl_pickup', 'desc');
		$detail = $this->db->get();

		return $detail->result();
	}
}
?>