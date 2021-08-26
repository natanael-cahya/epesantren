<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Crud_pelanggaran extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('level')) {
			redirect('login');
		} else
		if ($this->session->userdata('level') != 3) {
			redirect('login');
		}

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
		$kd = uniqid();
		$uri = $this->input->post('uri');

		$data = array(
			'code_pelanggaran' => $kd,
			'pelanggaran' => $pel,
			'hari' => $hari,
			'tgl'	=> $tgl,
			'waktu'	=> $jam,
			'sanksi'	=> $sanksi,
			'nis'	=> $nis,
			'sort'	=> $sort,

		);
		$this->m_pelanggaran->tb_pel($data, 'tb_pelanggaran');
		echo "<script>alert('Data berhasil disimpan');location='../pengajar/$uri'</script>";
	}
	function h_pel()
	{
		$uri = $this->uri->segment(5);
		$where = ['code_pelanggaran' => $this->uri->segment(4)];
		$this->m_pelanggaran->h_pel($where, 'tb_pelanggaran');
		echo "<script>alert('Data berhasil Dihapus');location='../../../pengajar/$uri'</script>";
	}
	function ed_pel()
    {

        $niss = $this->input->post('nise');
        $plg = $this->input->post('plg');
		$sanks = $this->input->post('sanks');
		$idy = $this->input->post('idx');
		$uri = $this->input->post('uri');


        $data = array(
            'nis' => $niss,
            'pelanggaran' => $plg,
			'sanksi'	=> $sanks,


        );
        $where = ['code_pelanggaran' => $idy];
        $this->m_pelanggaran->ed_pel($where, $data, 'tb_pelanggaran');
        echo "<script>alert('Data berhasil disimpan');location='../../pengajar/pengajar/$uri'</script>";
    }
}
