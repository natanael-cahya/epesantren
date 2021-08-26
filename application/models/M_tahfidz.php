<?php
defined('BASEPATH') or exit('No direct script access allowed');


class M_tahfidz extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->helper('url');
		$this->load->library('session');
	}

    function get_tahfidz()
    {
        $this->db->from('tahfidz');
        $this->db->join('tb_dsantri','tahfidz.nis_tahfidz=tb_dsantri.nis');

        $query = $this->db->get();
		return $query->result();
    }
	function tb_data($data, $table)
	{
		$this->db->insert($table, $data);
	}
	function edit($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }
	function delete($where, $table)
	{
		$this->db->where($where);
		$this->db->delete($table);
	}
}

