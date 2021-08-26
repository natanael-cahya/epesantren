<?php
defined('BASEPATH') or exit('No direct script access allowed');


class M_dsantri extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->helper('url');
		$this->load->library('session');
	}



	function get_santri()
	{
		$this->db->select('*');
		$this->db->from('tb_dsantri');

		$query = $this->db->get();
		return $query->result();
	}
	function get_ortu()
	{
		$this->db->select('*');
		$this->db->from('tb_ortu');
		$this->db->join('details','tb_ortu.id_ortu=details.id_ortu','left');

		$query = $this->db->get();
		return $query->result();
	}
	function get_ortu2()
	{
		$this->db->select('*');
		$this->db->from('tb_ortu');
	//	$this->db->join('details','tb_ortu.id_ortu=details.id_ortu','left');

		$query = $this->db->get();
		return $query->result();
	}
	function get_Asantri()
	{
		$this->db->select('*');
		$this->db->from('tb_dsantri');
		//$this->db->from('tb_kamar');
		//$this->db->from('tb_ortu');
		//$this->db->from('tb_kelas');
		
		$this->db->join('tb_kelas','tb_dsantri.kelas=tb_kelas.code_kelas','left');
		$this->db->join('details','tb_dsantri.nis=details.niss','left');
		$this->db->join('tb_ortu','tb_ortu.id_ortu=details.id_ortu','left');
		$this->db->join('tb_kamar','tb_dsantri.code_kamar=tb_kamar.code_kamar','left');
	

		$query = $this->db->get();
		return $query->result();
	}
	function santri_ext(){
		$this->db->select('*');
		$this->db->from('tb_dsantri');
		$this->db->from('tb_extra');
		$this->db->from('detaile');
		$this->db->where('tb_dsantri.nis=detaile.nis');
		$this->db->where('tb_extra.code_extra=detaile.code_extra');

		$query = $this->db->get();
		return $query->result();
	}
	function tb_santri($data, $table)
	{
		$this->db->insert($table, $data);
	}
	function ed_santri($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }
	function h_santri($where, $table)
	{
		$this->db->where($where);
		$this->db->delete($table);
	}
	public function cariajax($id)
	{	
         $this->db->join('tb_kelas', "tb_kelas.code_kelas=tb_dsantri.kelas");
     	return $this->db->get_where('tb_dsantri', "tb_dsantri.kelas='$id'");
   
		
	}
	function upd_kelas($kls_p,$nis)
	{
		$this->db->query("UPDATE tb_dsantri SET kelas='$kls_p' WHERE nis IN ($nis)");
	}
	function upd_kelasA($kls_p,$nis)
	{
		$this->db->query("UPDATE tb_dsantri SET status='$kls_p' , kelas='-' , code_kamar='-' WHERE nis IN ($nis)");
	}
}
