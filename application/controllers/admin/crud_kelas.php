<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Crud_kelas extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		is_logged_in();


		$this->load->library('session');
		$this->load->model('m_kelas');
	}

	function tb_kelas()
	{
		$rk	=	$this->input->post('rk');
		$no_kls = $this->input->post('nk');
		$datas = $this->db->get_where('tb_kelas', ['nama_kelas' => $rk, 'no_kls' => $no_kls])->result_array();

		if ($datas == TRUE) {
			echo "<script>alert('Nomor Gedung & Gedung Sudah digunakan');location='../admin/kelas'</script>";
		} else {
			$lembaga = $this->input->post('lembaga');
			$marhalah = $this->input->post('marhalah');
			$no_kls = $this->input->post('nk');
			$rk	=	$this->input->post('rk');
			$wk	=	$this->input->post('wk');
			$as =	$this->input->post('as');
			$gender	=	$this->input->post('g');
			$kls =	$this->input->post('kls');
			$kls_a	= $this->input->post('kls_a');
			$uid = uniqid();
			$uri = $this->input->post('uri');

			$data = array(
				'code_kelas' => $uid,
				'lembaga'	=>	$lembaga,
				'marhalah'	=>	$marhalah,
				'no_kls'	=> $no_kls,
				'nama_kelas'	=>	$rk,
				'kelass'	=>	$kls . $kls_a,
				'wali_kelas'	=>	$wk,
				'asisten'	=>	$as,
				'gender'	=>	$gender,
			);

			$this->m_kelas->tb_kelas($data, 'tb_kelas');
			echo "<script>alert('Data berhasil disimpan');location='../admin/$uri'</script>";
		}
	}
	function ed_kelas()
	{
		$lembaga = $this->input->post('lembagae');
		$marhalah = $this->input->post('marhalahe');
		$no_kls = $this->input->post('nk');
		$rk	=	$this->input->post('rke');
		$wk	=	$this->input->post('wke');
		$as =	$this->input->post('ase');
		$gender	=	$this->input->post('ge');
		$kls =	$this->input->post('kelase');
		$uid = $this->input->post('par');
		$uri = $this->input->post('urie');

		$data = array(
			'lembaga'	=>	$lembaga,
			'marhalah'	=>	$marhalah,
			'no_kls'	=> $no_kls,
			'nama_kelas'	=>	$rk,
			'kelass'	=>	$kls,
			'wali_kelas'	=>	$wk,
			'asisten'	=>	$as,
			'gender'	=>	$gender,
		);

		$where = ['code_kelas' => $uid];
		$this->m_kelas->ed_kelas($where, $data, 'tb_kelas');
		echo "<script>alert('Data berhasil Diubah');location='../../admin/admin/$uri'</script>";
	}
	function ed_kls()
	{

		$urie = $this->input->post('urie');
		$klse = $this->input->post('klse');
		$uide = $this->input->post('nise');

		$data = array(
			'kelas'	=>	$klse,
		);
		$where = ['nis' => $uide];
		$this->m_kelas->ed_kelas($where, $data, 'tb_dsantri');
		echo "<script>alert('Data berhasil Diubah');location='../../admin/admin/$urie'</script>";
	}
	function h_kelas()
	{
		$u = $this->uri->segment(5);
		$where = ['code_kelas' => $this->uri->segment(4)];
		$this->m_kelas->h_kelas($where, 'tb_kelas');
		echo "<script>alert('Data berhasil dihapus');location='../../../admin/$u'</script>";
	}
}
