<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
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
		//END COUNT DATA

		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar', $data);
		$this->load->view('admin/index', $data);
		$this->load->view('template/footer', $data);
	}
	function i_akun()
	{
		$data['judul'] = "Akun";

		$data['admin'] = $this->db->get_where('auth', ['nama' => $this->session->userdata('nama')])->row_array();

		$data['akun'] = $this->m_akun->get_akun();


		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar', $data);
		$this->load->view('admin/akun/index', $data);
		$this->load->view('template/footer', $data);
	}
	function alarm()
	{
		date_default_timezone_set("Asia/Bangkok");
		$data['admin'] = $this->db->get_where('auth', ['nama' => $this->session->userdata('nama')])->row_array();

		$data['all'] = $this->m_jadwal->get_Ajadwal();
		$data['alarm'] = $this->m_jadwal->get_jadwal();

		$w1 = date("Hi");
		$this->db->where('jam_asli >', $w1);
		$this->db->limit(1);
		$data['alarm2'] = $this->m_jadwal->get_jadwal();
		$this->load->view('admin/alarm/index', $data);
	}
	function pop()
	{
		$data['admin'] = $this->db->get_where('auth', ['nama' => $this->session->userdata('nama')])->row_array();

		$this->load->view('admin/alarm/pop', $data);
	}
	function santri()
	{
		$data['judul'] = "Data Santri";
		$data['admin'] = $this->db->get_where('auth', ['nama' => $this->session->userdata('nama')])->row_array();

		$data['santri'] = $this->m_dsantri->get_Asantri();
		$data['kmar'] = $this->m_kamar->get_kamar();
		$data['kls'] = $this->m_kelas->get_kelas();
		$data['ex'] = $this->m_extra->get_extra();
		$data['se'] = $this->m_dsantri->santri_ext();

		$data['tsantri'] = $this->m_dsantri->get_ortu();
		$data['esantri'] = $this->m_dsantri->get_santri();

		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar', $data);
		$this->load->view('admin/santri/index');
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
		$this->load->view('template/sidebar', $data);
		$this->load->view('admin/santri_k/index');
		$this->load->view('template/footer', $data);
	}
	public function ajaxnaek()
	{
		if (isset($_POST['cari'])) {
			$data['v_data']	 = $this->m_dsantri->cariajax($this->input->post('kelass'));
			$this->load->view('admin/santri_k/data', $data);
		}else {
			echo "Silahkan Cek koneksi internet Anda!";
		}
	}
	// FUNCTION AMBIL DATA ONCLICK POPUP ===================================
	function twalikelaslaki()
	{
		$data['judul'] = "Data Guru";

		$data['admin'] = $this->db->get_where('auth', ['nama' => $this->session->userdata('nama')])->row_array();
		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar', $data);
		$data['tguru'] = $this->m_guru->get_guru();
		$this->load->view('admin/kelas/t_guru1', $data);
		$this->load->view('template/footer', $data);
	}
	function tasistenlaki()
	{
		$data['judul'] = "Data Guru";

		$data['admin'] = $this->db->get_where('auth', ['nama' => $this->session->userdata('nama')])->row_array();
		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar', $data);
		$data['tguru'] = $this->m_guru->get_guru();
		$this->load->view('admin/kelas/t_guru2', $data);
		$this->load->view('template/footer', $data);
	}
	function ewalikelaslaki()
	{
		$data['judul'] = "Data Guru";

		$data['admin'] = $this->db->get_where('auth', ['nama' => $this->session->userdata('nama')])->row_array();
		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar', $data);
		$data['tguru'] = $this->m_guru->get_guru();
		$this->load->view('admin/kelas/e_guru1', $data);
		$this->load->view('template/footer', $data);
	}
	function easistenlaki()
	{
		$data['judul'] = "Data Guru";

		$data['admin'] = $this->db->get_where('auth', ['nama' => $this->session->userdata('nama')])->row_array();
		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar', $data);
		$data['tguru'] = $this->m_guru->get_guru();
		$this->load->view('admin/kelas/e_guru2', $data);
		$this->load->view('template/footer', $data);
	}
	function twalikelaswanita()
	{
		$data['judul'] = "Data Guru";

		$data['admin'] = $this->db->get_where('auth', ['nama' => $this->session->userdata('nama')])->row_array();
		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar', $data);
		$data['tguru'] = $this->m_guru->get_guru();
		$this->load->view('admin/kelas/t_guru1', $data);
		$this->load->view('template/footer', $data);
	}
	function tasistenwanita()
	{
		$data['judul'] = "Data Guru";

		$data['admin'] = $this->db->get_where('auth', ['nama' => $this->session->userdata('nama')])->row_array();
		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar', $data);
		$data['tguru'] = $this->m_guru->get_guru();
		$this->load->view('admin/kelas/t_guru2', $data);
		$this->load->view('template/footer', $data);
	}
	function ewalikelaswanita()
	{
		$data['judul'] = "Data Guru";

		$data['admin'] = $this->db->get_where('auth', ['nama' => $this->session->userdata('nama')])->row_array();
		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar', $data);
		$data['tguru'] = $this->m_guru->get_guru();
		$this->load->view('admin/kelas/e_guru1', $data);
		$this->load->view('template/footer', $data);
	}
	function easistenwanita()
	{
		$data['judul'] = "Data Guru";

		$data['admin'] = $this->db->get_where('auth', ['nama' => $this->session->userdata('nama')])->row_array();
		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar', $data);
		$data['tguru'] = $this->m_guru->get_guru();
		$this->load->view('admin/kelas/e_guru2', $data);
		$this->load->view('template/footer', $data);
	}
	function tkamarlaki()
	{
		$data['judul'] = "Data Guru";

		$data['admin'] = $this->db->get_where('auth', ['nama' => $this->session->userdata('nama')])->row_array();
		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar', $data);
		$data['tguru'] = $this->m_guru->get_guru();
		$this->load->view('admin/kamar/t_guru1', $data);
		$this->load->view('template/footer', $data);
	}
	function ekamarlaki()
	{
		$data['judul'] = "Data Guru";

		$data['admin'] = $this->db->get_where('auth', ['nama' => $this->session->userdata('nama')])->row_array();
		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar', $data);
		$data['tguru'] = $this->m_guru->get_guru();
		$this->load->view('admin/kamar/t_guru2', $data);
		$this->load->view('template/footer', $data);
	}
	function tkamarwanita()
	{
		$data['judul'] = "Data Guru";

		$data['admin'] = $this->db->get_where('auth', ['nama' => $this->session->userdata('nama')])->row_array();
		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar', $data);
		$data['tguru'] = $this->m_guru->get_guru();
		$this->load->view('admin/kamar/t_guru1', $data);
		$this->load->view('template/footer', $data);
	}
	function ekamarwanita()
	{
		$data['judul'] = "Data Guru";

		$data['admin'] = $this->db->get_where('auth', ['nama' => $this->session->userdata('nama')])->row_array();
		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar', $data);
		$data['tguru'] = $this->m_guru->get_guru();
		$this->load->view('admin/kamar/t_guru2', $data);
		$this->load->view('template/footer', $data);
	}
	function tkonsulat()
	{
		$data['judul'] = "Data Guru";

		$data['admin'] = $this->db->get_where('auth', ['nama' => $this->session->userdata('nama')])->row_array();
		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar', $data);
		$data['tguru'] = $this->m_guru->get_guru();
		$this->load->view('admin/konsulat/t_guru_konsulat', $data);
		$this->load->view('template/footer', $data);
	}
	function tketuakonsulat()
	{
		$data['judul'] = "Data Guru";

		$data['admin'] = $this->db->get_where('auth', ['nama' => $this->session->userdata('nama')])->row_array();
		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar', $data);
		$data['tketuakonsulat'] = $this->m_dsantri->get_santri();
		$this->load->view('admin/konsulat/t_ketua_konsulat', $data);
		$this->load->view('template/footer', $data);
	}
	function ekonsulate()
	{
		$data['judul'] = "Data Guru";

		$data['admin'] = $this->db->get_where('auth', ['nama' => $this->session->userdata('nama')])->row_array();
		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar', $data);
		$data['tguru'] = $this->m_guru->get_guru();
		$this->load->view('admin/konsulat/e_guru_konsulat', $data);
		$this->load->view('template/footer', $data);
	}
	function eketuakonsulat()
	{
		$data['judul'] = "Data Guru";

		$data['admin'] = $this->db->get_where('auth', ['nama' => $this->session->userdata('nama')])->row_array();
		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar', $data);
		$data['tketuakonsulat'] = $this->m_dsantri->get_santri();
		$this->load->view('admin/konsulat/e_ketua_konsulat', $data);
		$this->load->view('template/footer', $data);
	}
	function tguru()
	{
		$data['judul'] = "Data Guru";

		$data['admin'] = $this->db->get_where('auth', ['nama' => $this->session->userdata('nama')])->row_array();
		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar', $data);
		$data['tguru'] = $this->m_guru->get_guru();
		$this->load->view('admin/extra/t_guru', $data);
		$this->load->view('template/footer', $data);
	}
	function eguru()
	{
		$data['judul'] = "Data Guru";

		$data['admin'] = $this->db->get_where('auth', ['nama' => $this->session->userdata('nama')])->row_array();
		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar', $data);
		$data['tguru'] = $this->m_guru->get_guru();
		$this->load->view('admin/extra/e_guru', $data);
		$this->load->view('template/footer', $data);
	}
	function tsantri()
	{
		$data['judul'] = "Data Santri";

		$data['admin'] = $this->db->get_where('auth', ['nama' => $this->session->userdata('nama')])->row_array();
		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar', $data);
		$data['tsantri'] = $this->m_dsantri->get_ortu();
		$data['tsantri2'] = $this->m_dsantri->get_ortu2();
		$this->load->view('admin/santri/tsantri', $data);
		$this->load->view('template/footer', $data);
	}
	function esantri()
	{
		$data['judul'] = "Data Santri";

		$data['admin'] = $this->db->get_where('auth', ['nama' => $this->session->userdata('nama')])->row_array();
		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar', $data);
		$data['esantri'] = $this->m_dsantri->get_Asantri();
		$this->load->view('admin/santri/esantri', $data);
		$this->load->view('template/footer', $data);
	}
	function ekelas()
	{
		$data['judul'] = "Data Santri";

		$data['admin'] = $this->db->get_where('auth', ['nama' => $this->session->userdata('nama')])->row_array();
		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar', $data);
		$data['esantri'] = $this->m_dsantri->get_Asantri();
		$this->load->view('admin/santri/ekelas', $data);
		$this->load->view('template/footer', $data);
	}
	function ekamar()
	{
		$data['judul'] = "Data Santri";

		$data['admin'] = $this->db->get_where('auth', ['nama' => $this->session->userdata('nama')])->row_array();
		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar', $data);
		$data['esantri'] = $this->m_dsantri->get_Asantri();
		$this->load->view('admin/santri/ekamar', $data);
		$this->load->view('template/footer', $data);
	}
	function eexstra()
	{
		$data['judul'] = "Data Santri";

		$data['admin'] = $this->db->get_where('auth', ['nama' => $this->session->userdata('nama')])->row_array();
		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar', $data);
		$data['esantri'] = $this->m_dsantri->get_Asantri();
		$this->load->view('admin/santri/eexstra', $data);
		$this->load->view('template/footer', $data);
	}
	function ekonsulat()
	{
		$data['judul'] = "Data Santri";

		$data['admin'] = $this->db->get_where('auth', ['nama' => $this->session->userdata('nama')])->row_array();
		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar', $data);
		$data['esantri'] = $this->m_dsantri->get_Asantri();
		$this->load->view('admin/santri/ekonsulat', $data);
		$this->load->view('template/footer', $data);
	}
	function ep()
	{
		$data['judul'] = "Data Santri";

		$data['admin'] = $this->db->get_where('auth', ['nama' => $this->session->userdata('nama')])->row_array();
		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar', $data);
		$data['esantri'] = $this->m_dsantri->get_Asantri();
		$this->load->view('admin/santri/ep', $data);
		$this->load->view('template/footer', $data);
	}

	// END FUCTION AMBIL DATA======================================
	function t_santri()
	{
		$data['judul'] = "Data Santri";

		$data['admin'] = $this->db->get_where('auth', ['nama' => $this->session->userdata('nama')])->row_array();
		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar', $data);
		$data['tsantri'] = $this->m_dsantri->get_santri();
		$this->load->view('admin/hamim/t_santri', $data);
		$this->load->view('template/footer', $data);
	}
	function t_santri_konsulat()
	{
		$data['judul'] = "Data Santri";

		$data['admin'] = $this->db->get_where('auth', ['nama' => $this->session->userdata('nama')])->row_array();
		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar', $data);
		$data['tsantrikonsulat'] = $this->m_dsantri->get_santri();
		$this->load->view('admin/konsulat/t_santri_konsulat', $data);
		$this->load->view('template/footer', $data);
	}
	function t_santri_hamim()
	{
		$data['judul'] = "Data Santri";

		$data['admin'] = $this->db->get_where('auth', ['nama' => $this->session->userdata('nama')])->row_array();
		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar', $data);
		$data['tsantrihamim'] = $this->m_dsantri->get_santri();
		$this->load->view('admin/hamim/t_santri_hamim', $data);
		$this->load->view('template/footer', $data);
	}
	function kelas()
	{
		$data['judul'] = "Data Kelas";
		$data['admin'] = $this->db->get_where('auth', ['nama' => $this->session->userdata('nama')])->row_array();


		$this->db->where('gender=', 'L');
		$data['kls'] = $this->m_kelas->get_kelas();
		$data['esantri'] = $this->m_dsantri->get_Asantri();
		$data['lembaga'] = $this->m_group->get_lembaga();



		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar', $data);
		$this->load->view('admin/kelas/index', $data);
		$this->load->view('template/footer', $data);
	}
	function kelas_p()
	{
		$data['judul'] = "Data Kelas";
		$data['admin'] = $this->db->get_where('auth', ['nama' => $this->session->userdata('nama')])->row_array();


		$this->db->where('gender=', 'P');
		$data['kls'] = $this->m_kelas->get_kelas();

		$data['lembaga'] = $this->m_group->get_lembaga();


		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar', $data);
		$this->load->view('admin/kelas/index2', $data);
		$this->load->view('template/footer', $data);
	}
	function get_marhalah()
	{
		$id = $this->input->post('id');
		$data = $this->m_group->get_marhalah($id);
		echo json_encode($data);
	}
	function get_kls()
	{
		$idk = $this->input->post('idk');
		$data = $this->m_group->get_kls($idk);
		echo json_encode($data);
	}
	function hamim()
	{
		$data['judul'] = "Data Hamim";
		$data['admin'] = $this->db->get_where('auth', ['nama' => $this->session->userdata('nama')])->row_array();

		$data['santri'] = $this->m_dsantri->get_santri();
		$data['hamim'] = $this->m_hamim->get_Ahamim();

		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar', $data);
		$this->load->view('admin/hamim/index');
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
		$this->load->view('template/sidebar', $data);
		$this->load->view('admin/kamar/index');
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
		$this->load->view('template/sidebar', $data);
		$this->load->view('admin/kamar/indexp');
		$this->load->view('template/footer', $data);
	}
	function konsulat()
	{
		$data['judul'] = "Data Konsulat";
		$data['admin'] = $this->db->get_where('auth', ['nama' => $this->session->userdata('nama')])->row_array();



		$data['konsulat'] = $this->m_konsulat->get_Akonsulat();
		$data['dsantri'] = $this->m_dsantri->get_santri();

		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar', $data);
		$this->load->view('admin/konsulat/index');
		$this->load->view('template/footer', $data);
	}
	function pp()
	{
		$data['judul'] = "Data Pelanggaran Pengasuhan";
		$data['admin'] = $this->db->get_where('auth', ['nama' => $this->session->userdata('nama')])->row_array();


		$this->db->where('sort=', 'pengasuhan');
		$data['pp'] = $this->m_pelanggaran->get_App();

		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar', $data);
		$this->load->view('admin/pp/index');
		$this->load->view('template/footer', $data);
	}
	function pb()
	{
		$data['judul'] = "Data Pelanggaran Bahasa";
		$data['admin'] = $this->db->get_where('auth', ['nama' => $this->session->userdata('nama')])->row_array();


		$this->db->where('sort=', 'bahasa');
		$data['pp'] = $this->m_pelanggaran->get_App();

		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar', $data);
		$this->load->view('admin/pb/index');
		$this->load->view('template/footer', $data);
	}
	function pi()
	{
		$data['judul'] = "Data Pelanggaran Peribadatan";
		$data['admin'] = $this->db->get_where('auth', ['nama' => $this->session->userdata('nama')])->row_array();


		$this->db->where('sort=', 'peribadatan');
		$data['pp'] = $this->m_pelanggaran->get_App();

		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar', $data);
		$this->load->view('admin/pi/index');
		$this->load->view('template/footer', $data);
	}
	function pm()
	{
		$data['judul'] = "Data Pelanggaran Pengasuhan";
		$data['admin'] = $this->db->get_where('auth', ['nama' => $this->session->userdata('nama')])->row_array();


		$this->db->where('sort=', 'kmi');
		$data['pp'] = $this->m_pelanggaran->get_App();

		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar', $data);
		$this->load->view('admin/pm/index');
		$this->load->view('template/footer', $data);
	}
	function kb()
	{
		$data['judul'] = "Data Pelanggaran Pengasuhan";
		$data['admin'] = $this->db->get_where('auth', ['nama' => $this->session->userdata('nama')])->row_array();


		$this->db->where('sort=', 'kebersihan');
		$data['pp'] = $this->m_pelanggaran->get_App();

		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar', $data);
		$this->load->view('admin/kb/index');
		$this->load->view('template/footer', $data);
	}
	function km()
	{
		$data['judul'] = "Data Pelanggaran Pengasuhan";
		$data['admin'] = $this->db->get_where('auth', ['nama' => $this->session->userdata('nama')])->row_array();


		$this->db->where('sort=', 'keamanan');
		$data['pp'] = $this->m_pelanggaran->get_App();

		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar', $data);
		$this->load->view('admin/km/index');
		$this->load->view('template/footer', $data);
	}
	function or()
	{
		$data['judul'] = "Data Pelanggaran Pengasuhan";
		$data['admin'] = $this->db->get_where('auth', ['nama' => $this->session->userdata('nama')])->row_array();


		$this->db->where('sort=', 'olahraga');
		$data['pp'] = $this->m_pelanggaran->get_App();

		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar', $data);
		$this->load->view('admin/or/index');
		$this->load->view('template/footer', $data);
	}
	function ortu()
	{
		$data['judul'] = "Data Orang Tua";
		$data['admin'] = $this->db->get_where('auth', ['nama' => $this->session->userdata('nama')])->row_array();



		$data['ortu'] = $this->m_ortu->get_Dortu();

		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar', $data);
		$this->load->view('admin/ortu/index');
		$this->load->view('template/footer', $data);
	}
	function pengajar()
	{
		$data['judul'] = "Data Pengajar";
		$data['admin'] = $this->db->get_where('auth', ['nama' => $this->session->userdata('nama')])->row_array();



		$data['guru'] = $this->m_guru->get_guru();

		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar', $data);
		$this->load->view('admin/pengajar/index');
		$this->load->view('template/footer', $data);
	}
	function extra()
	{
		$data['judul'] = "Data Extrakurikuler";
		$data['admin'] = $this->db->get_where('auth', ['nama' => $this->session->userdata('nama')])->row_array();



		$data['extra'] = $this->m_extra->get_extra();

		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar', $data);
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
		$this->load->view('template/sidebar', $data);
		$this->load->view('admin/extra/index_s');
		$this->load->view('template/footer', $data);
	}
	function extra_s2()
	{
		$data['judul'] = "Data Extrakurikuler";
		$data['admin'] = $this->db->get_where('auth', ['nama' => $this->session->userdata('nama')])->row_array();


		
		$data['Aextra'] = $this->m_extra->no_extra();

		$data['ext'] = $this->m_extra->get_extra();

		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar', $data);
		$this->load->view('admin/extra/index_s2');
		$this->load->view('template/footer', $data);
	}

	function kamar_s()
	{
		$data['judul'] = "Data Kamar Laki-Laki";
		$data['admin'] = $this->db->get_where('auth', ['nama' => $this->session->userdata('nama')])->row_array();
		$data['dsantri'] = $this->m_dsantri->get_santri();

		$this->db->where('tb_kamar.gender=', 'L');
		$data['kmr'] = $this->m_kamar->get_Akamar();


		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar', $data);
		$this->load->view('admin/kamar_s/index');
		$this->load->view('template/footer', $data);
	}
	function kamar_ps()
	{
		$data['judul'] = "Data Kamar Perempuan";
		$data['admin'] = $this->db->get_where('auth', ['nama' => $this->session->userdata('nama')])->row_array();
		$data['dsantri'] = $this->m_dsantri->get_santri();


		$this->db->where('tb_kamar.gender=', 'P');
		$data['kmr'] = $this->m_kamar->get_Akamar();


		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar', $data);
		$this->load->view('admin/kamar_s/indexp');
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
		$this->load->view('template/sidebar', $data);
		$this->load->view('admin/kelas_s/index');
		$this->load->view('template/footer', $data);
	}
	function kelas_ps()
	{
		$data['judul'] = "Data Kelas";
		$data['admin'] = $this->db->get_where('auth', ['nama' => $this->session->userdata('nama')])->row_array();


		$this->db->where('tb_kelas.gender=', 'P');
		$data['kls'] = $this->m_kelas->get_Akelas();


		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar', $data);
		$this->load->view('admin/kelas_s/index2');
		$this->load->view('template/footer', $data);
	}
}
