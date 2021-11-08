<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Pengajar extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		pengajar_check();

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
		$this->load->view('template/sidebar_s2', $data);
		$this->load->view('pengajar/index', $data);
		$this->load->view('template/footer', $data);
	}
	function kelas()
	{
		$data['judul'] = "Data Kelas";
		$data['admin'] = $this->db->get_where('auth', ['nama' => $this->session->userdata('nama')])->row_array();

		$this->db->where('tb_kelas.gender=', 'L');
		$data['klas'] = $this->m_kelas->get_kelas();

		$this->db->where('tb_kelas.gender=', 'L');
		$data['kls'] = $this->m_kelas->get_Akelas();


		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar_s2', $data);
		$this->load->view('pengajar/kelas/index');
		$this->load->view('template/footer', $data);
	}
	function kelas_p()
	{
		$data['judul'] = "Data Kelas";
		$data['admin'] = $this->db->get_where('auth', ['nama' => $this->session->userdata('nama')])->row_array();

		$this->db->where('tb_kelas.gender=', 'P');
		$data['klas'] = $this->m_kelas->get_kelas();

		$this->db->where('tb_kelas.gender=', 'P');
		$data['kls'] = $this->m_kelas->get_Akelas();


		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar_s2', $data);
		$this->load->view('pengajar/kelas/index');
		$this->load->view('template/footer', $data);
	}
	function pm()
	{
		$data['judul'] = "Data Pelanggaran Pengasuhan";
		$data['admin'] = $this->db->get_where('auth', ['nama' => $this->session->userdata('nama')])->row_array();



		$this->db->where('sort=', 'kmi');
		$data['pp'] = $this->m_pelanggaran->get_App();

		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar_s2', $data);
		$this->load->view('pengajar/pm/index');
		$this->load->view('template/footer', $data);
	}
	function t_santri_konsulat()
	{
		$data['judul'] = "Data Santri";

		$data['admin'] = $this->db->get_where('auth', ['nama' => $this->session->userdata('nama')])->row_array();
		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar_s2', $data);
		$data['tsantrikonsulat'] = $this->m_dsantri->get_santri();
		$this->load->view('pengajar/pm/t_santri_konsulat', $data);
		$this->load->view('template/footer', $data);
	}
	function kelas_s()
	{
		$data['judul'] = "Data Kelas";
		$data['admin'] = $this->db->get_where('auth', ['nama' => $this->session->userdata('nama')])->row_array();


		$this->db->where('tb_kelas.gender=', 'L');
		$data['kls'] = $this->m_kelas->get_Akelas();

		$this->db->where('tb_kelas.gender=', 'L');
		$data['klas'] = $this->m_kelas->get_kelas();



		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar_s2', $data);
		$this->load->view('pengajar/kelas_s/index');
		$this->load->view('template/footer', $data);
	}
	function kelas_ps()
	{
		$data['judul'] = "Data Kelas";
		$data['admin'] = $this->db->get_where('auth', ['nama' => $this->session->userdata('nama')])->row_array();


		$this->db->where('tb_kelas.gender=', 'P');
		$data['kls'] = $this->m_kelas->get_Akelas();


		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar_s2', $data);
		$this->load->view('pengajar/kelas_s/index2');
		$this->load->view('template/footer', $data);
	}
}