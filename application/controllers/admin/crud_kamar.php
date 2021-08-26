<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Crud_kamar extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('level')) {
			redirect('login');
		} else
		if ($this->session->userdata('level') != 1) {
			redirect('login');
		}

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
	function ed_kamar()
	{

		$wke = $this->input->post('wke');
		$rke = $this->input->post('rke');
		$rayone = $this->input->post('rayone');
		$ge = $this->input->post('ge');
		$urie = $this->input->post('urie');
		$uide= $this->input->post('uide');

		$data = array(
			'wali_kamar' => $wke,
			'ruang_kamar' => $rke,
			'rayon' => $rayone,
			'gender' => $ge,
		);

		$where = ['code_kamar' => $uide];
        $this->m_kamar->ed_kamar($where, $data, 'tb_kamar');
        echo "<script>alert('Data berhasil Diubah');location='../../admin/admin/$urie'</script>";

	}
	function ed_kmr()
	{
		
		$kmare = $this->input->post('kmare');
		$urie = $this->input->post('urii');
		$uide= $this->input->post('nise');

		$data = array(
			'code_kamar' => $kmare,
			
		);

		$where = ['nis' => $uide];
        $this->m_kamar->ed_kamar($where, $data, 'tb_dsantri');
        echo "<script>alert('Data berhasil Diubah');location='../../admin/admin/$urie'</script>";

	}
	function h_kamar()
	{
		$k=$this->uri->segment(5);
		$where = ['code_kamar' => $this->uri->segment(4)];
		$this->m_kamar->h_kamar($where, 'tb_kamar');
		echo "<script>alert('Data berhasil disimpan');location='../../../admin/$k'</script>";
	}
}
