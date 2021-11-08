<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class M_jadwal extends CI_Model
{
		public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->helper('url');
		$this->load->library('session');
	}


	function get_jadwal(){
		
		$this->db->select('*');
		$this->db->from('jadwal_alarm');
		$d=date("Y-m-d");
		$this->db->where('tanggal=',$d);
		$this->db->order_by("jam_asli", "asc");

		$query = $this->db->get();
 		return $query->result();
 	}
	 function get_Ajadwal(){
		
		$this->db->select('*');
		$this->db->from('jadwal_alarm');

		$query = $this->db->get();
 		return $query->result();
 	}
	 function h_jadwal($where, $table)
	 {
		 $this->db->where($where);
		 $this->db->delete($table);
	 }
	 public function insert_batch($data){
		 $this->db->insert_batch('jadwal_alarm',$data);
		 if($this->db->affected_rows()>0){
			 return 1;
		 }else{
			 return 0;
		 }
	 }

}