<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Daerah extends MX_Controller {

  public function __construct()
  {
    parent::__construct();
    $this->load->model('Daerah_model','daerah');
    $this->load->database();
  }
  
	public function index()
	{
	  $data['provinsi']=$this->daerah->getProv();
		$this->load->view('daerah',$data);
	}
	
	public function getKab($id_prov)
	{
	  $kab=$this->daerah->getKab($id_prov);
	  foreach($kab as $k){
	    echo "<option value='{$k->id_kab}'>{$k->nama}</option>";
	  }
	}
	
	public function getKec($id_kab)
	{
	  $kec=$this->daerah->getKec($id_kab);
	  foreach($kec as $k){
	    echo "<option value='{$k->id_kec}'>{$k->nama}</option>";
	  }
	}

	public function getKel($id_kec)
	{
	  $kel=$this->daerah->getKel($id_kec);
	  foreach($kel as $k){
	    echo "<option value='{$k->id_kel}'>{$k->nama}</option>";
	  }
	}	
}
