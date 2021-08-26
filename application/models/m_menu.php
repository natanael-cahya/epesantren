<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class M_menu extends CI_Model
{
		public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->helper('url');
		$this->load->library('session');
	}


	function get_menu()
	{
		$this->db->select('*');
		$this->db->from('privileges');
		$this->db->from('menu');
		$this->db->from('auth');
		$this->db->where('auth.level=privileges.code_auth');
		$this->db->where('menu.code_menu=privileges.code_menu');

		$query = $this->db->get();
 		return $query->result();
	}
	

}