<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tahfidz extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('level')) {
			redirect('login');
		} else
		if ($this->session->userdata('level') != 1) {
			redirect('login');
		}


		$this->load->library('session');
		$this->load->model('M_tahfidz');
		$this->load->model('m_dsantri');
		
	}

    function index()
    {
        $data['judul'] = "Tahfidz";
        $data['admin'] = $this->db->get_where('auth', ['nama' => $this->session->userdata('nama')])->row_array();
        $data['pp'] = $this->M_tahfidz->get_tahfidz();

        $this->load->view('template/header', $data);
		$this->load->view('template/sidebar', $data);
		$this->load->view('admin/tahfidz/index', $data);
		$this->load->view('template/footer', $data);
    }
	function tb_data()
	{
		$nis = $this->input->post('nis');
		$stat = $this->input->post('stat');
		$ayat = $this->input->post('ayat');
		$surat = $this->input->post('surat');
		$juz = $this->input->post('juz');

		$data = array(
			'code_tahfidz'   => uniqid(),
			'nis_tahfidz'    => $nis,
			'status_tahfidz' => $stat,
			'ayat'			 => $ayat,
			'surat'			 => $surat,
			'juz'			 => $juz

		);

		$this->M_tahfidz->tb_data($data,'tahfidz');
		echo"<script>alert('data berhasil disimpan');location='../tahfidz'</script>";
	}

	function edit()
	{
		$nise = $this->input->post('nise');
		$state = $this->input->post('state');
		$ayate = $this->input->post('ayate');
		$surate = $this->input->post('surate');
		$juze = $this->input->post('juze');
		$idx = $this->input->post('idx');

		$data = array(
			'nis_tahfidz'		=> $nise,
			'status_tahfidz'	=> $state,
			'ayat'				=> $ayate,
			'surat'				=> $surate,
			'juz'				=> $juze
		);
		
		$where = array('code_tahfidz'	=> $idx);
		$this->M_tahfidz->edit($where,$data,'tahfidz');
		echo"<Script>alert('data berhasil diubah');location='../tahfidz'</script>";
	}
	function delete()
	{
		$where = ['code_tahfidz' => $this->uri->segment(4)];
		$this->M_tahfidz->delete($where, 'tahfidz');
		echo "<script>alert('Data berhasil dihapus');location='../../tahfidz'</script>";
	
	}
}
