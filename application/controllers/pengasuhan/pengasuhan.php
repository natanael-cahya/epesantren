<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengasuhan extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		pengasuhan_check();


		$this->load->library('session');
		$this->load->model('m_jadwal');
		$this->load->model('m_dsantri');
		$this->load->model('m_akun');
		$this->load->model('m_kamar');
		$this->load->model('m_ortu');
		$this->load->model('m_pelanggaran');
		$this->load->model('m_konsulat');
		$this->load->model('m_kelas');
		$this->load->model('m_guru');
		$this->load->model('m_extra');
	}

	function index()
	{
		$data['judul'] = "Dashboard";

		$data['admin'] = $this->db->get_where('auth', ['nama' => $this->session->userdata('nama')])->row_array();

		//COUNT DATA
		$data['santri'] = $this->m_dsantri->get_santri();
		$data['kmar'] = $this->m_kamar->get_kamar();
		$data['kelas'] = $this->m_kelas->get_kelas();
		$data['ortu'] = $this->m_ortu->get_Dortu();
		$data['pp'] = $this->m_pelanggaran->get_App();
		$data['guru'] = $this->m_guru->get_guru();

		$data['konsulat'] = $this->m_konsulat->get_konsulat();
		$data['akun'] = $this->db->get('auth')->result_array();

		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar_s1', $data);
		$this->load->view('pengasuh/index', $data);
		$this->load->view('template/footer', $data);
	}
	function kamar()
	{
		$data['judul'] = "Data Kamar Laki-Laki";
		$data['admin'] = $this->db->get_where('auth', ['nama' => $this->session->userdata('nama')])->row_array();
		$data['dsantri'] = $this->m_dsantri->get_santri();

		$this->db->where('gender=', 'L');
		$data['kmr2'] = $this->m_kamar->get_kamar();

		$this->db->where('tb_kamar.gender=', 'L');
		$data['kmr'] = $this->m_kamar->get_Akamar();


		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar_s1', $data);
		$this->load->view('pengasuh/kamar_s/index');
		$this->load->view('template/footer', $data);
	}
	function kamar_p()
	{
		$data['judul'] = "Data Kamar Perempuan";
		$data['admin'] = $this->db->get_where('auth', ['nama' => $this->session->userdata('nama')])->row_array();
		$data['dsantri'] = $this->m_dsantri->get_santri();

		$this->db->where('gender=', 'P');
		$data['kmr2'] = $this->m_kamar->get_kamar();

		$this->db->where('tb_kamar.gender=', 'P');
		$data['kmr'] = $this->m_kamar->get_Akamar();


		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar_s1', $data);
		$this->load->view('pengasuh/kamar_s/indexp');
		$this->load->view('template/footer', $data);
	}
	function konsulat()
	{
		$data['judul'] = "Data Konsulat";
		$data['admin'] = $this->db->get_where('auth', ['nama' => $this->session->userdata('nama')])->row_array();


		$data['konsulat'] = $this->m_konsulat->get_Akonsulat();
		$data['dsantri'] = $this->m_dsantri->get_santri();

		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar_s1', $data);
		$this->load->view('pengasuh/konsulat/index');
		$this->load->view('template/footer', $data);
	}
	function pp()
	{
		$data['judul'] = "Data Pelanggaran Pengasuhan";
		$data['admin'] = $this->db->get_where('auth', ['nama' => $this->session->userdata('nama')])->row_array();


		$this->db->where('sort=', 'pengasuhan');
		$data['pp'] = $this->m_pelanggaran->get_App();

		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar_s1', $data);
		$this->load->view('pengasuh/pp/index');
		$this->load->view('template/footer', $data);
	}
	function t_santri_konsulat()
	{
		$data['judul'] = "Data Santri";

		$data['admin'] = $this->db->get_where('auth', ['nama' => $this->session->userdata('nama')])->row_array();
		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar_s1', $data);
		$data['tsantrikonsulat'] = $this->m_dsantri->get_santri();
		$this->load->view('pengasuh/konsulat/t_santri_konsulat', $data);
		$this->load->view('template/footer', $data);
	}
	function extra()
	{
		$data['judul'] = "Data Extrakurikuler";
		$data['admin'] = $this->db->get_where('auth', ['nama' => $this->session->userdata('nama')])->row_array();



		$data['extra'] = $this->m_extra->get_extra();

		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar_s1', $data);
		$this->load->view('admin/extra/index');
		$this->load->view('template/footer', $data);
	}
	function extra_s()
	{
		$data['judul'] = "Data Extrakurikuler";
		$data['admin'] = $this->db->get_where('auth', ['nama' => $this->session->userdata('nama')])->row_array();


		$data['Aextra'] = $this->m_extra->te();

		$data['ext'] = $this->m_extra->get_extra();

		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar_s1', $data);
		$this->load->view('pengasuh/extra/index_s');
		$this->load->view('template/footer', $data);
	}
	function extra_s2()
	{
		$data['judul'] = "Data Extrakurikuler";
		$data['admin'] = $this->db->get_where('auth', ['nama' => $this->session->userdata('nama')])->row_array();



		$data['Aextra'] = $this->m_extra->no_extra();

		$data['ext'] = $this->m_extra->get_extra();

		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar_s1', $data);
		$this->load->view('pengasuh/extra/index_s2');
		$this->load->view('template/footer', $data);
	}
}