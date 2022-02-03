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
	function kamar_s()
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
	function kamar_ps()
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
	function kamar()
	{
		$data['judul'] = "Data Kamar Laki-Laki";
		$data['admin'] = $this->db->get_where('auth', ['nama' => $this->session->userdata('nama')])->row_array();
		$data['dsantri'] = $this->m_dsantri->get_santri();

		$this->db->where('gender=', 'L');
		$data['kmr'] = $this->m_kamar->get_kamar();


		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar_s1', $data);
		$this->load->view('pengasuh/kamar/index');
		$this->load->view('template/footer', $data);
	}
	function kamar_p()
	{
		$data['judul'] = "Data Kamar Perempuan";
		$data['admin'] = $this->db->get_where('auth', ['nama' => $this->session->userdata('nama')])->row_array();
		$data['dsantri'] = $this->m_dsantri->get_santri();


		$this->db->where('gender=', 'P');
		$data['kmr'] = $this->m_kamar->get_kamar();


		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar_s1', $data);
		$this->load->view('pengasuh/kamar/indexp');
		$this->load->view('template/footer', $data);
	}
	function edit_kamar_ismah()
	{
		$data['admin'] = $this->db->get_where('auth', ['nama' => $this->session->userdata('nama')])->row_array();
		$data['judul'] = "Edit Data Kamar Ismah";
		$where = ['code_kamar' => $this->uri->segment(4)];
		$data['kmr'] = $this->m_kelas->edit_data($where, 'tb_kamar')->result();
		$data['tguru'] = $this->m_guru->get_guru();


		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar_s1', $data);
		$this->load->view('pengasuh/kamar/editkamarismah', $data);

		$this->load->view('template/footer', $data);
	}

	function edit_kamar_iswah()
	{
		$data['admin'] = $this->db->get_where('auth', ['nama' => $this->session->userdata('nama')])->row_array();
		$data['judul'] = "Edit Data Kamar Iswah";
		$where = ['code_kamar' => $this->uri->segment(4)];
		$data['kmr'] = $this->m_kelas->edit_data($where, 'tb_kamar')->result();
		$data['tguru'] = $this->m_guru->get_guru();


		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar_s1', $data);
		$this->load->view('pengasuh/kamar/editkamariswah', $data);

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
	function pb()
	{
		$data['judul'] = "Data Pelanggaran Bahasa";
		$data['admin'] = $this->db->get_where('auth', ['nama' => $this->session->userdata('nama')])->row_array();


		$this->db->where('sort=', 'bahasa');
		$data['pp'] = $this->m_pelanggaran->get_App();

		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar_s1', $data);
		$this->load->view('pengasuh/pb/index');
		$this->load->view('template/footer', $data);
	}
	function pm()
	{
		$data['judul'] = "Data Pelanggaran Pengasuhan";
		$data['admin'] = $this->db->get_where('auth', ['nama' => $this->session->userdata('nama')])->row_array();


		$this->db->where('sort=', 'kmi');
		$data['pp'] = $this->m_pelanggaran->get_App();

		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar_s1', $data);
		$this->load->view('pengasuh/pm/index');
		$this->load->view('template/footer', $data);
	}
	function pi()
	{
		$data['judul'] = "Data Pelanggaran Peribadatan";
		$data['admin'] = $this->db->get_where('auth', ['nama' => $this->session->userdata('nama')])->row_array();


		$this->db->where('sort=', 'peribadatan');
		$data['pp'] = $this->m_pelanggaran->get_App();

		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar_s1', $data);
		$this->load->view('pengasuh/pi/index');
		$this->load->view('template/footer', $data);
	}
	function or()
	{
		$data['judul'] = "Data Pelanggaran Pengasuhan";
		$data['admin'] = $this->db->get_where('auth', ['nama' => $this->session->userdata('nama')])->row_array();


		$this->db->where('sort=', 'olahraga');
		$data['pp'] = $this->m_pelanggaran->get_App();

		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar_s1', $data);
		$this->load->view('pengasuh/or/index');
		$this->load->view('template/footer', $data);
	}
	function km()
	{
		$data['judul'] = "Data Pelanggaran Pengasuhan";
		$data['admin'] = $this->db->get_where('auth', ['nama' => $this->session->userdata('nama')])->row_array();


		$this->db->where('sort=', 'keamanan');
		$data['pp'] = $this->m_pelanggaran->get_App();

		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar_s1', $data);
		$this->load->view('pengasuh/km/index');
		$this->load->view('template/footer', $data);
	}
	function kb()
	{
		$data['judul'] = "Data Pelanggaran Pengasuhan";
		$data['admin'] = $this->db->get_where('auth', ['nama' => $this->session->userdata('nama')])->row_array();


		$this->db->where('sort=', 'kebersihan');
		$data['pp'] = $this->m_pelanggaran->get_App();

		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar_s1', $data);
		$this->load->view('pengasuh/kb/index');
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

	function edit_kamar_p()
	{
		$data['admin'] = $this->db->get_where('auth', ['nama' => $this->session->userdata('nama')])->row_array();
		$data['judul'] = "Edit Data Kamar Uswah (Umum)";
		$where = ['nis' => $this->uri->segment(4)];
		$data['kls'] = $this->m_kelas->edit_data($where, 'tb_dsantri')->result();
		$data['esantri'] = $this->m_dsantri->get_Asantri();

		$data['kmr2'] = $this->m_kamar->get_kamar();


		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar_s1', $data);
		$this->load->view('pengasuh/kamar_s/editkamaruswah', $data);

		$this->load->view('template/footer', $data);
	}

	function edit_extra_umum()
	{
		$data['admin'] = $this->db->get_where('auth', ['nama' => $this->session->userdata('nama')])->row_array();
		$data['judul'] = "Edit Data Extra (Umum)";

		$data['kmr'] = $this->m_kamar->get_kamar();

		$this->db->where('detaile.id_detaile=', $this->uri->segment(4));
		$data['Aextra'] = $this->m_extra->get_Aextra();

		$data['ext'] = $this->m_extra->get_extra();

		$data['esantri'] = $this->m_dsantri->get_Asantri();
		$data['tguru'] = $this->m_guru->get_guru();
		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar_s1', $data);
		$this->load->view('pengasuh/extra/editextraumum', $data);

		$this->load->view('template/footer', $data);
	}

	function edit_konsulat()
	{
		$data['admin'] = $this->db->get_where('auth', ['nama' => $this->session->userdata('nama')])->row_array();
		$data['judul'] = "Edit Konsulat";
		// $where = ['id_detaile' => $this->uri->segment(4)];
		// $data['Aextra'] = $this->m_extra->edit_data($where, 'detaile')->result();


		//DISINI MAS YANG MUNCUL SELECT * HARUSNYA FILTER BERDASARKAN CODE_KONSULAT

		$data['konsulat'] = $this->m_konsulat->get_Akonsulat();
		$data['esantri'] = $this->m_dsantri->get_Asantri();
		$data['tguru'] = $this->m_guru->get_guru();
		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar_s1', $data);
		$this->load->view('pengasuh/konsulat/editkonsulat', $data);

		$this->load->view('template/footer', $data);
	}


	function edit_pp()
	{
		$data['admin'] = $this->db->get_where('auth', ['nama' => $this->session->userdata('nama')])->row_array();
		$data['judul'] = "Edit Data Pelanggaran Pengasuhan";
		// $where = ['id_detaile' => $this->uri->segment(4)];
		// $data['Aextra'] = $this->m_extra->edit_data($where, 'detaile')->result();


		//DISINI MAS YANG MUNCUL SELECT * HARUSNYA FILTER BERDASARKAN code_pelanggaran
		$data['admin'] = $this->db->get_where('auth', ['nama' => $this->session->userdata('nama')])->row_array();

		$this->db->where('code_pelanggaran=', $this->uri->segment(4));
		$data['pp'] = $this->m_pelanggaran->get_App();

		$data['esantri'] = $this->m_dsantri->get_Asantri();
		$data['tguru'] = $this->m_guru->get_guru();
		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar_s1', $data);
		$this->load->view('pengasuh/pp/editpp', $data);

		$this->load->view('template/footer', $data);
	}

	function edit_pm()
	{
		$data['admin'] = $this->db->get_where('auth', ['nama' => $this->session->userdata('nama')])->row_array();
		$data['judul'] = "Edit Data Pelanggaran KMI";
		// $where = ['id_detaile' => $this->uri->segment(4)];
		// $data['Aextra'] = $this->m_extra->edit_data($where, 'detaile')->result();


		//DISINI MAS YANG MUNCUL SELECT * HARUSNYA FILTER BERDASARKAN code_pelanggaran
		$data['admin'] = $this->db->get_where('auth', ['nama' => $this->session->userdata('nama')])->row_array();

		$this->db->where('code_pelanggaran=', $this->uri->segment(4));
		$data['pp'] = $this->m_pelanggaran->get_App();

		$data['esantri'] = $this->m_dsantri->get_Asantri();
		$data['tguru'] = $this->m_guru->get_guru();
		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar_s1', $data);
		$this->load->view('pengasuh/pm/editpm', $data);

		$this->load->view('template/footer', $data);
	}

	function edit_pb()
	{
		$data['admin'] = $this->db->get_where('auth', ['nama' => $this->session->userdata('nama')])->row_array();
		$data['judul'] = "Edit Data Pelanggaran Bahasa";
		// $where = ['id_detaile' => $this->uri->segment(4)];
		// $data['Aextra'] = $this->m_extra->edit_data($where, 'detaile')->result();


		//DISINI MAS YANG MUNCUL SELECT * HARUSNYA FILTER BERDASARKAN code_pelanggaran
		$data['admin'] = $this->db->get_where('auth', ['nama' => $this->session->userdata('nama')])->row_array();

		$this->db->where('code_pelanggaran=', $this->uri->segment(4));
		$data['pp'] = $this->m_pelanggaran->get_App();

		$data['esantri'] = $this->m_dsantri->get_Asantri();
		$data['tguru'] = $this->m_guru->get_guru();
		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar_s1', $data);
		$this->load->view('pengasuh/pb/editpb', $data);

		$this->load->view('template/footer', $data);
	}

	function edit_pi()
	{
		$data['admin'] = $this->db->get_where('auth', ['nama' => $this->session->userdata('nama')])->row_array();
		$data['judul'] = "Edit Data Pelanggaran Peribadatan";
		// $where = ['id_detaile' => $this->uri->segment(4)];
		// $data['Aextra'] = $this->m_extra->edit_data($where, 'detaile')->result();


		//DISINI MAS YANG MUNCUL SELECT * HARUSNYA FILTER BERDASARKAN code_pelanggaran
		$data['admin'] = $this->db->get_where('auth', ['nama' => $this->session->userdata('nama')])->row_array();

		$this->db->where('code_pelanggaran=', $this->uri->segment(4));
		$data['pp'] = $this->m_pelanggaran->get_App();


		$data['esantri'] = $this->m_dsantri->get_Asantri();
		$data['tguru'] = $this->m_guru->get_guru();
		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar_s1', $data);
		$this->load->view('pengasuh/pi/editpi', $data);

		$this->load->view('template/footer', $data);
	}

	function edit_or()
	{
		$data['admin'] = $this->db->get_where('auth', ['nama' => $this->session->userdata('nama')])->row_array();
		$data['judul'] = "Edit Data Pelanggaran Olahraga";
		// $where = ['id_detaile' => $this->uri->segment(4)];
		// $data['Aextra'] = $this->m_extra->edit_data($where, 'detaile')->result();


		//DISINI MAS YANG MUNCUL SELECT * HARUSNYA FILTER BERDASARKAN code_pelanggaran
		$data['admin'] = $this->db->get_where('auth', ['nama' => $this->session->userdata('nama')])->row_array();

		$this->db->where('code_pelanggaran=', $this->uri->segment(4));
		$data['pp'] = $this->m_pelanggaran->get_App();

		$data['esantri'] = $this->m_dsantri->get_Asantri();
		$data['tguru'] = $this->m_guru->get_guru();
		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar_s1', $data);
		$this->load->view('pengasuh/or/editor', $data);

		$this->load->view('template/footer', $data);
	}

	function edit_km()
	{
		$data['admin'] = $this->db->get_where('auth', ['nama' => $this->session->userdata('nama')])->row_array();
		$data['judul'] = "Edit Data Pelanggaran Olahraga";
		// $where = ['id_detaile' => $this->uri->segment(4)];
		// $data['Aextra'] = $this->m_extra->edit_data($where, 'detaile')->result();


		//DISINI MAS YANG MUNCUL SELECT * HARUSNYA FILTER BERDASARKAN code_pelanggaran
		$data['admin'] = $this->db->get_where('auth', ['nama' => $this->session->userdata('nama')])->row_array();

		$this->db->where('code_pelanggaran=', $this->uri->segment(4));
		$data['pp'] = $this->m_pelanggaran->get_App();

		$data['esantri'] = $this->m_dsantri->get_Asantri();
		$data['tguru'] = $this->m_guru->get_guru();
		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar_s1', $data);
		$this->load->view('pengasuh/km/editkm', $data);

		$this->load->view('template/footer', $data);
	}


	function edit_kb()
	{
		$data['admin'] = $this->db->get_where('auth', ['nama' => $this->session->userdata('nama')])->row_array();
		$data['judul'] = "Edit Data Pelanggaran Kebersihan";
		// $where = ['id_detaile' => $this->uri->segment(4)];
		// $data['Aextra'] = $this->m_extra->edit_data($where, 'detaile')->result();


		//DISINI MAS YANG MUNCUL SELECT * HARUSNYA FILTER BERDASARKAN code_pelanggaran
		$data['admin'] = $this->db->get_where('auth', ['nama' => $this->session->userdata('nama')])->row_array();

		$this->db->where('code_pelanggaran=', $this->uri->segment(4));
		$data['pp'] = $this->m_pelanggaran->get_App();

		$data['esantri'] = $this->m_dsantri->get_Asantri();
		$data['tguru'] = $this->m_guru->get_guru();
		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar_s1', $data);
		$this->load->view('pengasuh/kb/editkb', $data);

		$this->load->view('template/footer', $data);
	}
}