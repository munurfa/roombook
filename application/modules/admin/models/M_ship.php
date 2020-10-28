<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class M_ship extends CI_Model
{

	function type()
	{
		$this->db->select('ID,nama');
		$this->db->from('par_type');
		$query = $this->db->get();
		if ( $query->num_rows() > 0 )
	    {
	        $row = $query->result();
	        return $row;
	    }
	}
	function status()
	{
		$this->db->select('ID,nama');
		$this->db->from('par_status');
		$query = $this->db->get();
		if ( $query->num_rows() > 0 )
	    {
	        $row = $query->result();
	        return $row;
	    }
	}

	function noAwbGroup()
	{
		$this->db->select('*');
		$this->db->from('all_shipments_view');
		$this->db->group_by('no_awb');
		$this->db->order_by('no_awb', 'asc');
		$query = $this->db->get();
		
	    return $query;
	}	

	function ship()
	{
		$this->db->select('no_awb');
		$this->db->from('shipments');
		$this->db->group_by('no_awb');
		$this->db->order_by('no_awb', 'desc');
		$this->db->limit(1);
		$query = $this->db->get();
		if ( $query->num_rows() > 0 )
	    {
	        $row = $query->row()->no_awb;

	    }else{
	    	$row = '11889';
	    }
	    return $row;
	}

	function getShip($awal='',$akhir='') {
        $this->datatables->select('id,CONCAT("#",no_awb) as no_awb,nama_shipper,nama_rec, status, type,ket, tgl_pickup, prov_ship, kab_ship,CONCAT(kab_shipment_name,", ",prov_shipment_name) as transit' );
        $this->datatables->from('all_shipments_view');

        if (($awal!='')&&($akhir!='')) {
        	// $this->datatables->where("tgl_pickup between '$awal' and '$akhir'");

        	$this->datatables->where('tgl_pickup >=', $awal);
			$this->datatables->where('tgl_pickup <=', $akhir);
        }
        $this->datatables->add_column('view-update', '<a href="shipment/create/t$1" class="btn btn-primary btn-xs">Update Tracking</a>', 'id');
        $this->datatables->add_column('view', '<a href="shipment/create/$1" class="btn btn-warning btn-sm">edit</a>  <a target="_blank" href="shipment/detail_cetak/$1" class="btn btn-info btn-sm"><i class="mdi mdi-printer"></i></a> <a href="shipment/destroy/$1" class="btn btn-danger btn-sm"><i class="mdi mdi-delete"></i></a>', 'id');
        // echo $this->db->get_compiled_select();
        // die();
        return $this->datatables->generate();
	}

	

	function getShipByNo($id)
	{

		return $this->db->get_where('all_shipments_view', array('id' => $id))->row();
	}

	function getShipByAwb($id)
	{
		$this->db->select('*');
		$this->db->from('shipments');
		$this->db->where('no_awb', $id);
		return $this->db->get();
	}

	function saveShip($data) {

        if (!is_array($data) || !count($data)) {
            return false;
        }

		

        $dtsaver['id_type']=$data['type_id']; 
		
		$dtsaver['id_status']= $data['status_id']; 
		$dtsaver['nama']=$data['nama'];
		$dtsaver['pcs']=$data['pcs'];
		$dtsaver['berat']=$data['berat'];
		$dtsaver['dimensi']=$data['dimensi'];
		$dtsaver['vol']=$data['vol'];
		$dtsaver['terbilang']=$data['terbilang'];
		$dtsaver['bayar']=$data['bayar'];

		$dtsaver['keterangan']=$data['keterangan'];



        if ($data['id'] == -1) {
        	$dtsaver['no_awb']= intval($this->ship())+1;
            $dtsaver['id_shipper'] = $this->saveShipper($data);
            $dtsaver['id_receiver'] = $this->saveRec($data);
            $dtsaver['tgl_pickup'] = date("Y-m-d H:i:s"); 
            $dtsaver['id_provinsi']=$data['prov_shipper']; 
			$dtsaver['id_kabupaten']=$data['kab_shipper']; 
            
            $this->db->insert('shipments', $dtsaver);

	    	return $this->db->insert_id();
        }elseif ( (substr($data['id'] , 0, 1) == "t") && (is_numeric(substr($data['id'] , 1)) )) {
        	$dtsaver['no_awb']= $data['no_awb'];

            $dtsaver['id_shipper'] = $data['id_shipper'];
            $dtsaver['id_receiver'] = $data['id_receiver'];
            $dtsaver['tgl_pickup'] = date("Y-m-d H:i:s"); 
            $dtsaver['id_provinsi']=$data['prov_ship']; 
			$dtsaver['id_kabupaten']=$data['kab_ship'];
            // var_dump($data);
            // die();
            $this->db->insert('shipments', $dtsaver);

	    	return $this->db->insert_id();
        } else {
        	$idShipper = $data['id_shipper'];
        	
        	$idRec = $data['id_receiver'];
        	$this->updateShipper($idShipper,$data);
        	$this->updateRec($idRec,$data);

            return $this->db->update('shipments', $dtsaver, array('id' => $data['id']));
        }
    }

    function getShipperById($id)
    {
    	return $this->db->get_where('shipper', array('id' => $id))->row();
    }

    function getRecById($id)
    {
    	return $this->db->get_where('receiver', array('id' => $id))->row();
    }

    function saveShipper($data)
    {
		$dtsaver['nama'] = $data['shipper_name'];
		$dtsaver['phone'] = $data['phone_shipper'];
		$dtsaver['id_provinsi'] = $data['prov_shipper'];
		$dtsaver['id_kabupaten'] = $data['kab_shipper'];
		$dtsaver['id_kecamatan'] = $data['kec_shipper'];
		$dtsaver['id_kelurahan'] = $data['kel_shipper'];
		$dtsaver['alamat'] = $data['addr_ship'];
    	
    	$this->db->insert('shipper', $dtsaver);
    	return $this->db->insert_id();
    }
    function updateShipper($id,$data)
    {
		$dtsaver['nama'] = $data['shipper_name'];
		$dtsaver['phone'] = $data['phone_shipper'];
		if (($data['prov_shipper']!='') && ($data['kab_shipper']!='') && ($data['kec_shipper']!='') && ($data['kel_shipper']!='')) {
			$dtsaver['id_provinsi'] = $data['prov_shipper'];
			$dtsaver['id_kabupaten'] = $data['kab_shipper'];
			$dtsaver['id_kecamatan'] = $data['kec_shipper'];
			$dtsaver['id_kelurahan'] = $data['kel_shipper'];
		}
		$dtsaver['alamat'] = $data['addr_ship'];
   
    	return $this->db->update('shipper', $dtsaver, array('id' => $id));
    	
    }
    function saveRec($data)
    {
		$dtsaver['nama'] = $data['rec_name'];
		$dtsaver['phone'] = $data['phone_rec'];
		$dtsaver['id_provinsi'] = $data['prov_rec'];
		$dtsaver['id_kabupaten'] = $data['kab_rec'];
		$dtsaver['id_kecamatan'] = $data['kec_rec'];
		$dtsaver['id_kelurahan'] = $data['kel_rec'];
		$dtsaver['alamat'] = $data['addr_rec'];
    	
    	$this->db->insert('receiver', $dtsaver);
    	return $this->db->insert_id();
    }
    function updateRec($id,$data)
    {
		$dtsaver['nama'] = $data['rec_name'];
		$dtsaver['phone'] = $data['phone_rec'];
		if (($data['prov_rec']!='') && ($data['kab_rec']!='') && ($data['kec_rec']!='') && ($data['kel_rec']!='')) {
			$dtsaver['id_provinsi'] = $data['prov_rec'];
			$dtsaver['id_kabupaten'] = $data['kab_rec'];
			$dtsaver['id_kecamatan'] = $data['kec_rec'];
			$dtsaver['id_kelurahan'] = $data['kel_rec'];
			
		}
		$dtsaver['alamat'] = $data['addr_rec'];
    	
    	return $this->db->update('receiver', $dtsaver, array('id' => $id));
    	
    }
    function delShip($id, $no_awb, $idShipper, $idRec)
    {
    	$query = $this->getShipByAwb($no_awb);
    	if ( $query->num_rows() == 1 )
	    {
	    	$this->db->where('id',$idShipper);
	    	$this->db->delete('shipper');

	    	$this->db->where('id',$idRec);
	    	$this->db->delete('receiver');
	    }
        $this->db->where('id',$id);
    	$this->db->delete('shipments');
    	
    }
}
?>