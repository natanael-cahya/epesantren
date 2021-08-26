<?php
defined('BASEPATH') or exit('No direct script access allowed');


class M_akun extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->helper('url');
		$this->load->library('session');
	}


	function get_akun()
	{
		$this->db->select('*');
		$this->db->from('auth');


		$query = $this->db->get();
		return $query->result();
	}
	function tb_akun($data, $table)
	{
		$this->db->insert($table, $data);
	}
	function up_akun($where, $data, $table)
	{
		$this->db->where($where);
		$this->db->update($table, $data);
	}
	function h_akun($where, $table)
	{
		$this->db->where($where);
		$this->db->delete($table);
	}
}
