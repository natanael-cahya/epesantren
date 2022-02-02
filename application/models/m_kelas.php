<?php
defined('BASEPATH') or exit('No direct script access allowed');


class M_kelas extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->helper('url');
		$this->load->library('session');
	}

	function get_kelas()
	{
		$this->db->select('*');
		$this->db->from('tb_kelas');
		$this->db->from('tb_lembaga');
		$this->db->where('tb_kelas.lembaga=tb_lembaga.id_lembaga');
		$this->db->order_by("tb_kelas.nama_kelas", "asc");

		$query = $this->db->get();
		return $query->result();
	}

	function get_kelas_umum()
	{
		$this->db->select('*');
		$this->db->from('tb_kelas');
		$this->db->from('tb_dsantri');
		$this->db->where('tb_dsantri.kelas=tb_kelas.code_kelas');

		$query = $this->db->get();
		return $query->result();
	}

	function get_kelass()
	{
		$this->db->select('*');
		$this->db->from('tb_kelas');
		$this->db->from('tb_lembaga');
		$this->db->from('tb_dsantri');
		$this->db->where('tb_dsantri.kelas=tb_kelas.code_kelas');
		$this->db->where('tb_kelas.lembaga=tb_lembaga.id_lembaga');


		$query = $this->db->get();
		return $query->result();
	}
	function get_Akelas()
	{
		$this->db->select('*');
		$this->db->from('tb_kelas');
		$this->db->from('tb_dsantri');
		$this->db->from('tb_lembaga');
		$this->db->where('tb_kelas.code_kelas=tb_dsantri.kelas');
		$this->db->where('tb_kelas.lembaga=tb_lembaga.id_lembaga');


		$query = $this->db->get();
		return $query->result();
	}
	function tb_kelas($data, $table)
	{
		$this->db->insert($table, $data);
	}
	function ed_kelas($where, $data, $table)
	{
		$this->db->where($where);
		$this->db->update($table, $data);
	}


	function h_kelas($where, $table)
	{
		$this->db->where($where);
		$this->db->delete($table);
	}

	function edit_data($where, $table)
	{
		return $this->db->get_where($table, $where);
	}
}
