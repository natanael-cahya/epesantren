<?php
defined('BASEPATH') or exit('No direct script access allowed');


class M_ortu extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->helper('url');
		$this->load->library('session');
	}



	function get_Dortu()
	{
		$this->db->select('*');
		$this->db->from('tb_ortu');

		$query = $this->db->get();
		return $query->result();
	}
	function tb_ortu($data, $table)
	{
		$this->db->insert($table, $data);
	}
	function h_ortu($where, $table)
	{
		$this->db->where($where);
		$this->db->delete($table);
	}
	function ed_ortu($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }
}
