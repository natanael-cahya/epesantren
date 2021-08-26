<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Crud_pelanggaran Extends CI_Controller{
	function __construct(){
		parent::__construct();
		if(!$this->session->userdata('level')){
			redirect('login');
		}else
		if($this->session->userdata('level') != 2){
			redirect('login');
		}

		$this->load->model('m_pelanggaran');
		$this->load->helper('url');
		$this->load->library('session');
		}


	function tb_pel()
	{
		$nis=$this->input->post('nis');
		$pel=$this->input->post('pelanggaran');
		$hari=$this->input->post('hari');
		$tgl=$this->input->post('tgl');
		$jam=$this->input->post('jam');
		$sanksi=$this->input->post('sanksi');
		$sort=$this->input->post('sort');
		$kd=uniqid();
		$uri=$this->input->post('uri');

		$data=array(
			'code_pelanggaran' => $kd,
			'pelanggaran' => $pel,
			'hari' => $hari,
			'tgl'	=> $tgl,
			'waktu'	=> $jam,
			'sanksi'	=> $sanksi,
			'nis'	=> $nis,
			'sort'	=> $sort,

		);
		$this->m_pelanggaran->tb_pel($data,'tb_pelanggaran');
		echo"<script>alert('Data berhasil disimpan');location='../admin/$uri'</script>";
	}
}