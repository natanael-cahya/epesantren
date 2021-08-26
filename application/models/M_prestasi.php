<?php
defined('BASEPATH') or exit('No direct script access allowed');


class M_prestasi extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->helper('url');
		$this->load->library('session');
	}

    function get_prestasi()
    {
        $this->db->from('prestasi');
        $this->db->join('tb_dsantri','prestasi.nis_prestasi=tb_dsantri.nis');

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

