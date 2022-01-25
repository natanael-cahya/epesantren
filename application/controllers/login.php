<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

	public function __construct()
	{

		parent::__construct();
		$this->load->library('form_validation');
		$this->load->helper('url');
		$this->load->library('session');
	}


	public function index()
	{
		$this->form_validation->set_rules('user', 'username', 'trim|required|xss_clean');
		$this->form_validation->set_rules('pass', 'password', 'trim|required');

		if ($this->form_validation->run() == FALSE) {

			$this->load->view('login');
		} else {

			$this->login();
		}
	}



	private function login()
	{
		$username = addslashes($this->input->post('user'));
		$password = $this->input->post('pass');

		$auth = $this->db->get_where('auth', ['username' => $username])->row_array();


		if (password_verify($password, $auth['password']) && $auth) {

			if ($auth['level'] == 1) {
				$sesi = [
					'code_auth' => $auth['code_auth'],
					'nama' => $auth['nama'],
					'level' => $auth['level']
				];

				$this->session->set_userdata($sesi);
				redirect('admin/admin');
			} else

				if ($auth['level'] == 2) {
				$sesi = [
					'code' => $auth['code_auth'],
					'nama' => $auth['nama'],
					'level' => $auth['level']
				];

				$this->session->set_userdata($sesi);
				redirect('pengasuhan/pengasuhan');
			} else

				if ($auth['level'] == 3) {
				$sesi = [
					'code_auth' => $auth['code_auth'],
					'nama' => $auth['nama'],
					'level' => $auth['level']
				];

				$this->session->set_userdata($sesi);
				redirect('pengajar/pengajar');
			} else

			if ($auth['level'] == 4) {
				$sesi = [
					'code_auth' => $auth['code_auth'],
					'nama' => $auth['nama'],
					'level' => $auth['level']
				];

				$this->session->set_userdata($sesi);
				redirect('organtri/organtri');
			} else

			if ($auth['level'] == 5) {
				$sesi = [
					'code_auth' => $auth['code_auth'],
					'nama' => $auth['nama'],
					'level' => $auth['level']
				];

				$this->session->set_userdata($sesi);
				redirect('poskestren/poskestren');
			} else {

				echo "<script>alert('username atau password anda salah');location='login'</script>";
			}
		} else {
			echo "<script>alert('username atau password anda salah');location='login'</script>";
			//redirect('auth');
		}
	}
	public function logout()
	{
		$this->session->unset_userdata('nama');
		$this->session->unset_userdata('level');


		redirect('');
	}

	function daftar()
	{
		$this->load->view('register');
	}
}