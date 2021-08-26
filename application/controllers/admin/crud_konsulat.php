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
		if ($this->session->userdata('level') != 1) {
			redirect('login');
		}


		$this->load->library('session');
		$this->load->model('m_konsulat');
	}
	function tb_konsulat()
	{
		$code = uniqid();
		$nis = $this->input->post('nis');
		$pembimbing = $this->input->post('pembimbing');
		$kk = $this->input->post('kk');

		$data = array(
			'code_konsulat' => $code,
			'pembimbing' => $pembimbing,
			'ketua_konsulat' => $kk,
			'nis' => $nis
		);

		$this->m_konsulat->tb_konsulat($data, 'tb_konsulat');
		echo "<script>alert('Data berhasil disimpan');location='../admin/konsulat'</script>";
	}
	function h_kon()
	{
		$where = ['code_konsulat' => $this->uri->segment(4)];
		$this->m_konsulat->h_kon($where, 'tb_konsulat');
		echo "<script>alert('Data berhasil disimpan');location='../../admin/konsulat'</script>";
	}
	function ed_konsulat()
    {

        $nise = $this->input->post('nise');
        $pem = $this->input->post('pem');
		$ket = $this->input->post('ket');
		$idh=$this->input->post('idh');


        $data = array(
            'nis' => $nise,
            'pembimbing' => $pem,
			'ketua_konsulat' => $ket,


        );
        $where = ['code_konsulat' => $idh];
        $this->m_konsulat->ed_konsulat($where, $data, 'tb_konsulat');
        echo "<script>alert('Data berhasil diubah');location='../../admin/admin/konsulat'</script>";
    }
}
