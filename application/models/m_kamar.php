<?php
defined('BASEPATH') or exit('No direct script access allowed');


class M_kamar extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->helper('url');
		$this->load->library('session');
	}


	function get_kamar()
	{
		$this->db->select('*');
		$this->db->from('tb_kamar');

		$query = $this->db->get();
		return $query->result();
	}
	function get_Akamar()
	{
		$this->db->select('*');
		$this->db->from('tb_kamar');
		$this->db->from('tb_dsantri');
		$this->db->where('tb_kamar.code_kamar=tb_dsantri.code_kamar');

		$query = $this->db->get();
		return $query->result();
	}

	function tb_kamar($data, $table)
	{
		$this->db->insert($table, $data);
	}
	function ed_kamar($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }
	function h_kamar($where, $table)
	{
		$this->db->where($where);
		$this->db->delete($table);
	}
}
