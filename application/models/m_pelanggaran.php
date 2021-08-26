<?php
defined('BASEPATH') or exit('No direct script access allowed');


class M_pelanggaran extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->helper('url');
		$this->load->library('session');
	}

	function get_pp()
	{
		$this->db->select('*');
		$this->db->from('tb_pelanggaran');

		$query = $this->db->get();
		return $query->result();
	}
	function get_App()
	{
		$this->db->select('*');
		$this->db->from('tb_pelanggaran');
		$this->db->from('tb_dsantri');
		$this->db->where('tb_pelanggaran.nis=tb_dsantri.nis');

		$query = $this->db->get();
		return $query->result();
	}
	function tb_pel($data, $table)
	{
		$this->db->insert($table, $data);
	}
	function h_pel($where, $table)
	{
		$this->db->where($where);
		$this->db->delete($table);
	}
	function ed_pel($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }
}
