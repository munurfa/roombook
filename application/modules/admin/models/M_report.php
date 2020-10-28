<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class M_report extends CI_Model
{

   
    function noAwbGroup($no_awb='',$type_id='',$status_id='',$awal='',$akhir='')
    {
        $this->db->select('*');
        $this->db->from('all_shipments_view');
        if ($no_awb!='') {
            $dt = explode(',', $no_awb);
            $this->db->where_in('no_awb', $dt);
        }
        if ($type_id!='') {
            $this->db->where('id_type', $type_id);
        }
        if ($status_id!='') {
            $this->db->where('id_status', $status_id);
        }
         if (($awal!='')&&($akhir!='')) {

            $this->db->where('tgl_pickup >=', $awal);
            $this->db->where('tgl_pickup <=', $akhir);
        }
        $this->db->group_by('no_awb');
        $this->db->order_by('no_awb', 'asc');
        // echo $this->db->get_compiled_select();

        // die();
        $query = $this->db->get();
        
        return $query;
    }   
   
}

