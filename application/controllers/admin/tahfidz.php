<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tahfidz extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		is_logged_in();
		$tgl = date('Y-m-d H:i:s');
		$this->db->query("UPDATE `perizinan` SET stat='1' where tgl_selesai < ?", $tgl);
		$this->data = $this->db->query("SELECT code_perizinan,nis_perizinan,nis,nama,tgl_selesai FROM perizinan,tb_dsantri where perizinan.nis_perizinan = tb_dsantri.nis AND tgl_selesai < ?", $tgl)->result();

		$this->load->library('session');
		$this->load->model('M_tahfidz');
		$this->load->model('m_dsantri');
	}

	function index()
	{
		$data['judul'] = "Tahfidz";
		$data['admin'] = $this->db->get_where('auth', ['nama' => $this->session->userdata('nama')])->row_array();
		$data['pp'] = $this->M_tahfidz->get_tahfidz();
		$data['al'] = $this->M_tahfidz->get_Atahfidz();

		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar', $data);
		$this->load->view('admin/tahfidz/index', $data);
		$this->load->view('template/footer', $data);
	}
	function tb_data()
	{
		$nis = $this->input->post('nis');
		$stat = $this->input->post('stat');
		$pmb = $this->input->post('pmb');
		$ayat = $this->input->post('ayat');
		$ayatt = $this->input->post('ayatt');
		$surat = $this->input->post('surat');
		$juz = $this->input->post('juz');

		$data = array(
			'code_tahfidz'   => uniqid(),
			'nis_tahfidz'    => $nis,
			'pembimbing'		=> $pmb,
			'status_tahfidz' => $stat,
			'ayat'			 => $ayat . '-' . $ayatt,
			'surat'			 => $surat,
			'juz'			 => $juz,
			'tgl_input'		 => date('Y-m-d')

		);

		$this->M_tahfidz->tb_data($data, 'tahfidz');
		echo "<script>alert('data berhasil disimpan');location='../tahfidz'</script>";
	}

	function edit()
	{
		$nise = $this->input->post('nise');
		$state = $this->input->post('state');
		$ayate = $this->input->post('ayate');
		$pmbe = $this->input->post('pmbe');
		$surate = $this->input->post('surate');
		$juze = $this->input->post('juze');
		$idx = $this->input->post('idx');

		$data = array(
			'nis_tahfidz'		=> $nise,
			'pembimbing'		=> $pmbe,
			'status_tahfidz'	=> $state,
			'ayat'				=> $ayate,
			'surat'				=> $surate,
			'juz'				=> $juze
		);

		$where = array('code_tahfidz'	=> $idx);
		$this->M_tahfidz->edit($where, $data, 'tahfidz');
		echo "<Script>alert('data berhasil diubah');location='../tahfidz'</script>";
	}
	function delete()
	{
		$where = ['code_tahfidz' => $this->uri->segment(4)];
		$this->M_tahfidz->delete($where, 'tahfidz');
		echo "<script>alert('Data berhasil dihapus');location='../../tahfidz'</script>";
	}
}