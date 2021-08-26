<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Crud_akun extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('level')) {
			redirect('login');
		} else
		if ($this->session->userdata('level') != 1) {
			redirect('login');
		}

		$this->load->model('m_akun');
		$this->load->helper('url');
		$this->load->library('session');
	}


	function tb_akun()
	{
		$nama = $this->input->post('nama');
		$user = $this->input->post('user');
		$pw = $this->input->post('pw');
		$role = $this->input->post('lvl');
		$tgl = date('Y-m-d');
		$uid = uniqid();
		$gender = $this->input->post('gender');

		$data = array(
			'code_auth' => $uid,
			'nama' => $nama,
			'username' => $user,
			'password'	=> password_hash($pw, PASSWORD_BCRYPT),
			'level'	=> $role,
			'tgl_join' => $tgl,
			'gender'	=>	$gender,


		);
		$this->m_akun->tb_akun($data, 'auth');
		echo "<script>alert('Data berhasil disimpan');location='../admin/i_akun'</script>";
	}

	function h_akun()
	{
		$where = ['code_auth' => $this->uri->segment(4)];
		$this->m_akun->h_akun($where, 'auth');
		redirect('admin/i_akun');
	}
}
