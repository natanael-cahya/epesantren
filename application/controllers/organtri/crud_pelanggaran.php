<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Crud_pelanggaran extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		organtri_check();

		$this->load->model('m_pelanggaran');
		$this->load->helper('url');
		$this->load->library('session');
	}


	function tb_pel()
	{
		$nis = $this->input->post('nis');
		$pel = $this->input->post('pelanggaran');
		$hari = $this->input->post('hari');
		$tgl = $this->input->post('tgl');
		$jam = $this->input->post('jam');
		$sanksi = $this->input->post('sanksi');
		$sort = $this->input->post('sort');
		$tingkat = $this->input->post('tingkat');
		$kd = uniqid();
		$uri = $this->input->post('uri');

		$data = array(
			'code_pelanggaran' => $kd,
			'pelanggaran' => $pel,
			'hari' => $hari,
			'tgl'	=> $tgl,
			'waktu'	=> $jam,
			'sanksi'	=> $sanksi,
			'tingkat'	=> $tingkat,
			'nis'	=> $nis,
			'sort'	=> $sort,

		);
		$this->m_pelanggaran->tb_pel($data, 'tb_pelanggaran');
		echo "<script>alert('Data berhasil disimpan');location='../organtri/$uri'</script>";
	}
	function h_pel()
	{
		$uri = $this->uri->segment(5);
		$where = ['code_pelanggaran' => $this->uri->segment(4)];
		$this->m_pelanggaran->h_pel($where, 'tb_pelanggaran');
		echo "<script>alert('Data berhasil disimpan');location='../../../organtri/$uri'</script>";
	}
}