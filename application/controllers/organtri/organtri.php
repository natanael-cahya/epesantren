<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Organtri extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('level')) {
			redirect('login');
		} else
		if ($this->session->userdata('level') != 4) {
			redirect('login');
		}

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
		$this->load->view('template/sidebar_s3', $data);
		$this->load->view('organtri/index', $data);
		$this->load->view('template/footer', $data);
    }
    function pp()
	{
		$data['judul'] = "Data Pelanggaran Pengasuhan";
		$data['admin'] = $this->db->get_where('auth', ['nama' => $this->session->userdata('nama')])->row_array();


		$this->db->where('sort=', 'pengasuhan');
		$data['pp'] = $this->m_pelanggaran->get_App();

		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar_s3', $data);
		$this->load->view('organtri/pp/index');
		$this->load->view('template/footer', $data);
	}
	function pb()
	{
		$data['judul'] = "Data Pelanggaran Bahasa";
		$data['admin'] = $this->db->get_where('auth', ['nama' => $this->session->userdata('nama')])->row_array();


		$this->db->where('sort=', 'bahasa');
		$data['pp'] = $this->m_pelanggaran->get_App();

		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar_s3', $data);
		$this->load->view('organtri/pb/index');
		$this->load->view('template/footer', $data);
	}
	function pi()
	{
		$data['judul'] = "Data Pelanggaran Peribadatan";
		$data['admin'] = $this->db->get_where('auth', ['nama' => $this->session->userdata('nama')])->row_array();


		$this->db->where('sort=', 'peribadatan');
		$data['pp'] = $this->m_pelanggaran->get_App();

		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar_s3', $data);
		$this->load->view('organtri/pi/index');
		$this->load->view('template/footer', $data);
	}
	function pm()
	{
		$data['judul'] = "Data Pelanggaran Pengasuhan";
		$data['admin'] = $this->db->get_where('auth', ['nama' => $this->session->userdata('nama')])->row_array();


		$this->db->where('sort=', 'kmi');
		$data['pp'] = $this->m_pelanggaran->get_App();

		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar_s3', $data);
		$this->load->view('organtri/pm/index');
		$this->load->view('template/footer', $data);
	}
	function kb()
	{
		$data['judul'] = "Data Pelanggaran Pengasuhan";
		$data['admin'] = $this->db->get_where('auth', ['nama' => $this->session->userdata('nama')])->row_array();


		$this->db->where('sort=', 'kebersihan');
		$data['pp'] = $this->m_pelanggaran->get_App();

		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar_s3', $data);
		$this->load->view('organtri/kb/index');
		$this->load->view('template/footer', $data);
	}
	function km()
	{
		$data['judul'] = "Data Pelanggaran Pengasuhan";
		$data['admin'] = $this->db->get_where('auth', ['nama' => $this->session->userdata('nama')])->row_array();


		$this->db->where('sort=', 'keamanan');
		$data['pp'] = $this->m_pelanggaran->get_App();

		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar_s3', $data);
		$this->load->view('organtri/km/index');
		$this->load->view('template/footer', $data);
	}
	function or()
	{
		$data['judul'] = "Data Pelanggaran Pengasuhan";
		$data['admin'] = $this->db->get_where('auth', ['nama' => $this->session->userdata('nama')])->row_array();


		$this->db->where('sort=', 'olahraga');
		$data['pp'] = $this->m_pelanggaran->get_App();

		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar_s3', $data);
		$this->load->view('organtri/or/index');
		$this->load->view('template/footer', $data);
	}
}