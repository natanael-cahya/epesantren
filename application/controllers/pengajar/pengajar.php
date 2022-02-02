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
		$this->load->model('m_group');
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
	function santri_k()
	{
		$data['judul'] = "Data Santri";
		$data['admin'] = $this->db->get_where('auth', ['nama' => $this->session->userdata('nama')])->row_array();

		$data['santri'] = $this->m_dsantri->get_Asantri();
		$data['kmar'] = $this->m_kamar->get_kamar();
		$data['kls'] = $this->m_kelas->get_kelas();

		$data['tsantri'] = $this->m_dsantri->get_ortu();


		$data['klz'] = $this->m_kelas->get_kelas();


		//$data['klz1'] = $this->m_kelas->get_kelas();

		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar_s2', $data);
		$this->load->view('pengajar/santri_k/index');
		$this->load->view('template/footer', $data);
	}
	function upd_kelas()
	{
		$nis = $this->input->post('p_nis');
		$kls_p = $this->input->post('opsi_s');

		if (empty($nis)) {
			echo "<script>alert('Pilih minimal 1 Santri/Wati');location='../pengajar/santri_k'</script>";
		} else
		if (empty($kls_p)) {
			echo "<script>alert('Pilih Tujuan Kelas');location='../pengajar/santri_k'</script>";
		} else
		if ($kls_p == 'Alumni') {
			$nis = $this->input->post('p_nis');
			$kls_p = $this->input->post('opsi_s');
			$nis = implode(",", $nis);

			//var_dump($nis);die();
			$this->m_dsantri->upd_kelasA($kls_p, $nis);
			echo "<script>alert('Data berhasil disimpan');location='../pengajar/santri_k'</script>";
		} else {
			$nis = $this->input->post('p_nis');
			$kls_p = $this->input->post('opsi_s');
			$nis = implode(",", $nis);

			//var_dump($nis);die();
			$this->m_dsantri->upd_kelas($kls_p, $nis);
			echo "<script>alert('Data berhasil disimpan');location='../pengajar/santri_k'</script>";
		}
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


	function edit_kelas_ismah()
	{
		$data['admin'] = $this->db->get_where('auth', ['nama' => $this->session->userdata('nama')])->row_array();
		$data['judul'] = "Edit Data Kelas Ismah";
		$where = ['code_kelas' => $this->uri->segment(4)];
		$data['kls'] = $this->m_kelas->edit_data($where, 'tb_kelas')->result();
		$data['tguru'] = $this->m_guru->get_guru();

		$data['esantri'] = $this->m_dsantri->get_Asantri();
		$data['lembaga'] = $this->m_group->get_lembaga();


		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar_s2', $data);
		$this->load->view('pengajar/kelas/editkelasismah', $data);

		$this->load->view('template/footer', $data);
	}
}