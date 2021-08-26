<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Crud_konsulat extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('level')) {
			redirect('login');
		} else
		if ($this->session->userdata('level') != 2) {
			redirect('login');
		}

	
		$this->load->library('session');
		$this->load->model('m_konsulat');

}
		function tb_konsulat()
		{
			$code=uniqid();
			$nis=$this->input->post('nis');
			$pembimbing=$this->input->post('pembimbing');
			$kk=$this->input->post('kk');

			$data=array(
				'code_konsulat' => $code,
				'pembimbing' => $pembimbing,
				'ketua_konsulat' => $kk,
				'nis' => $nis
			);

			$this->m_konsulat->tb_konsulat($data,'tb_konsulat');
		echo"<script>alert('Data berhasil disimpan');location='../admin/konsulat'</script>";

		}
	}
