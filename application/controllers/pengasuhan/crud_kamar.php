<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Crud_kamar extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		pengasuhan_check();

		$this->load->model('m_kamar');
		$this->load->helper('url');
		$this->load->library('session');
	}

	function tb_kamar()
	{

		$wk = $this->input->post('wk');
		$rk = $this->input->post('rk');
		$rayon = $this->input->post('rayon');
		$kd = uniqid();
		$g = $this->input->post('g');
		$uri = $this->input->post('uri');
		$data = array(
			'code_kamar' => $kd,
			'wali_kamar' => $wk,
			'ruang_kamar' => $rk,
			'rayon' => $rayon,
			'gender' => $g,
		);


		$this->m_kamar->tb_kamar($data, 'tb_kamar');
		echo "<script>alert('Data berhasil disimpan');location='../admin/$uri'</script>";
	}
}