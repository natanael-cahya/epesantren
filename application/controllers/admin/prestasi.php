<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Prestasi extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		is_logged_in();
		$tgl = date('Y-m-d H:i:s');
		$this->db->query("UPDATE `perizinan` SET stat='1' where tgl_selesai < ?", $tgl);
		$this->data = $this->db->query("SELECT code_perizinan,nis_perizinan,nis,nama,tgl_selesai FROM perizinan,tb_dsantri where perizinan.nis_perizinan = tb_dsantri.nis AND tgl_selesai < ?", $tgl)->result();


		$this->load->library('session');
		$this->load->model('M_prestasi');
		$this->load->model('m_dsantri');
	}

	function index()
	{
		$data['judul'] = "Prestasi Santri";
		$data['admin'] = $this->db->get_where('auth', ['nama' => $this->session->userdata('nama')])->row_array();
		$data['pp'] = $this->M_prestasi->get_prestasi();

		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar', $data);
		$this->load->view('admin/prestasi/index', $data);
		$this->load->view('template/footer', $data);
	}
	function tb_data()
	{
		$nis = $this->input->post('nis');
		$prestasi = $this->input->post('prestasi');
		$tgl = $this->input->post('tgl');

		$data = array(
			'code_prestasi'   => uniqid(),
			'nis_prestasi'    => $nis,
			'prestasi' 		  => $prestasi,
			'tgl'			  => $tgl


		);

		$this->M_prestasi->tb_data($data, 'prestasi');
		echo "<script>alert('data berhasil disimpan');location='../prestasi'</script>";
	}
	function edit()
	{
		$nise = $this->input->post('nise');
		$pres = $this->input->post('pres');
		$tgl = $this->input->post('tgl');
		$idx = $this->input->post('idx');

		$data = array(
			'nis_prestasi'			=> $nise,
			'prestasi'				=> $pres,
			'tgl'					=> $tgl
		);

		$where = array('code_prestasi'  => $idx);
		$this->M_prestasi->edit($where, $data, 'prestasi');
		echo "<script>alert('data berhasil diubah');location='../prestasi'</script>";
	}
	function delete()
	{
		$where = ['code_prestasi' => $this->uri->segment(4)];
		$this->M_prestasi->delete($where, 'prestasi');
		echo "<script>alert('Data berhasil dihapus');location='../../prestasi'</script>";
	}
}