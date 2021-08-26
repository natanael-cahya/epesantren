<?php
defined('BASEPATH') or exit('No direct script access allowed');


class M_konsulat extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->helper('url');
		$this->load->library('session');
	}

	function get_konsulat()
	{
		$this->db->select('*');
		$this->db->from('tb_konsulat');

		$query = $this->db->get();
		return $query->result();
	}
	function get_Akonsulat()
	{
		$this->db->select('*');
		$this->db->from('tb_konsulat');
		$this->db->from('tb_dsantri');
		$this->db->where('tb_konsulat.nis=tb_dsantri.nis');

		$query = $this->db->get();
		return $query->result();
	}
	function tb_konsulat($data, $table)
	{
		$this->db->insert($table, $data);
	}
	function ed_konsulat($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }
	function h_kon($where, $table)
	{
		$this->db->where($where);
		$this->db->delete($table);
	}
}
