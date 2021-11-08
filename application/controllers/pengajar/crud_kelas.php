<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Crud_kelas extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		pengajar_check();


		$this->load->library('session');
		$this->load->model('m_kelas');
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
}