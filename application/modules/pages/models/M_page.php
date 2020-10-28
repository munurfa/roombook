<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class M_page extends CI_Model
{

	function getPage($slug)
	{
		return $this->db->get_where('pages', array('slug' => $slug))->row();
	}
}
?>