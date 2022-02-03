<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Perizinan extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		organtri_check();


		$this->load->library('session');
		$this->load->model('M_perizinan');
		$this->load->model('m_dsantri');
	}

	function index()
	{
		$data['judul'] = "Perizinan Santri";
		$data['admin'] = $this->db->get_where('auth', ['nama' => $this->session->userdata('nama')])->row_array();
		$data['pp'] = $this->M_perizinan->get_perizinan();

		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar_s3', $data);
		$this->load->view('organtri/perizinan/index', $data);
		$this->load->view('template/footer', $data);
	}
	function tb_data()
	{
		$nis = $this->input->post('nis');
		$stat = $this->input->post('stat');
		$tm = $this->input->post('tm');
		$ts = $this->input->post('ts');
		$ket = $this->input->post('ket');

		$data = array(
			'code_perizinan'   => uniqid(),
			'nis_perizinan'    => $nis,
			'status_perizinan' => $stat,
			'tgl_mulai'	   	   => $tm,
			'tgl_selesai'	   => $ts,
			'keterangan_izin'  => $ket,
			'pencatat'		=> 4

		);

		$this->M_perizinan->tb_data($data, 'perizinan');
		echo "<script>alert('data berhasil disimpan');location='../perizinan'</script>";
	}

	function delete()
	{


		$where = ['code_perizinan' => $this->uri->segment(4)];
		$this->M_perizinan->delete($where, 'perizinan');
		echo "<script>alert('Data berhasil dihapus');location='../../perizinan'</script>";
	}
}