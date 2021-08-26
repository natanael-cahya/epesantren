<?php
defined('BASEPATH') or exit('No direct script access allowed');


class M_guru extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->helper('url');
		$this->load->library('session');
	}

	function get_guru()
	{
		$this->db->select('*');
		$this->db->from('tb_pengajar');

		$query = $this->db->get();
		return $query->result();
	}
	function h_guru($where, $table)
	{
		$this->db->where($where);
		$this->db->delete($table);
	}
	function tb_guru($data, $table)
	{
		$this->db->insert($table, $data);
	}
	function ed_guru($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }
	
}
