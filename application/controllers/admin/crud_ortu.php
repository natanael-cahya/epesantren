<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Crud_ortu extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		is_logged_in();


		$this->load->library('session');
		$this->load->model('m_ortu');
	}


	function tb_ortu()
	{
		$kd = uniqid();
		$ayah = $this->input->post('ayah');
		$ibu = $this->input->post('ibu');
		$agama_a = $this->input->post('agama_a');
		$agama_i = $this->input->post('agama_i');
		$tempat_a = $this->input->post('tempat_a');
		$tempat_i = $this->input->post('tempat_i');
		$tgl_a = $this->input->post('tgl_a');
		$tgl_i = $this->input->post('tgl_i');
		$pendidikan_a = $this->input->post('pendidikan_a');
		$pendidikan_i = $this->input->post('pendikikan_i');
		$pekerjaan_a = $this->input->post('perkerjaan_a');
		$pekerjaan_i = $this->input->post('perkerjaan_i');
		$penghasilan_a = $this->input->post('penghasilan_a');
		$penghasilan_i = $this->input->post('penghasilan_i');
		$no_a = $this->input->post('no_a');
		$no_i = $this->input->post('no_i');
		$nis = $this->input->post('nis');

		$data = array(
			'id_ortu' => $kd,
			'nama_ayah' => $ayah,
			'agama_ayah' => $agama_a,
			'tetala_ayah' => $tempat_a . ',' . $tgl_a,
			'pend_terakhir_ayah' => $pendidikan_a,
			'pekerjaan_ayah' => $pekerjaan_a,
			'penghasilan_ayah' => $penghasilan_a,
			'no_hp_ayah' => $no_a,
			'nama_ibu'	=> $ibu,
			'nama_ayah' => $ayah,
			'agama_ibu' => $agama_i,
			'tetala_ibu' => $tempat_i . ',' . $tgl_i,
			'pend_akhir_ibu' => $pendidikan_i,
			'pekerjaan_ibu' => $pekerjaan_i,
			'penghasilan_ibu' => $penghasilan_i,
			'no_hp_ibu' => $no_i,

		);


		$this->m_ortu->tb_ortu($data, 'tb_ortu');
		echo "<script>alert('Data berhasil disimpan');location='../admin/ortu'</script>";
	}
	function ed_ortu()
	{

		$ayah = $this->input->post('ayahe');
		$ibu = $this->input->post('ibue');
		$agama_a = $this->input->post('agama_ae');
		$agama_i = $this->input->post('agama_ie');
		$ttl_a = $this->input->post('ttl_a');
		$ttl_i = $this->input->post('ttl_i');
		$pendidikan_a = $this->input->post('pendidikan_ae');
		$pendidikan_i = $this->input->post('pendidikan_ie');
		$pekerjaan_a = $this->input->post('perkerjaan_ae');
		$pekerjaan_i = $this->input->post('perkerjaan_ie');
		$penghasilan_a = $this->input->post('penghasilan_ae');
		$penghasilan_i = $this->input->post('penghasilan_ie');
		$no_a = $this->input->post('no_ae');
		$no_i = $this->input->post('no_ie');
		$idd = $this->input->post('idd');

		$data = array(

			'nama_ayah' => $ayah,
			'agama_ayah' => $agama_a,
			'tetala_ayah' => $ttl_a,
			'pend_terakhir_ayah' => $pendidikan_a,
			'pekerjaan_ayah' => $pekerjaan_a,
			'penghasilan_ayah' => $penghasilan_a,
			'no_hp_ayah' => $no_a,
			'nama_ibu'	=> $ibu,
			'nama_ayah' => $ayah,
			'agama_ibu' => $agama_i,
			'tetala_ibu' => $ttl_i,
			'pend_akhir_ibu' => $pendidikan_i,
			'pekerjaan_ibu' => $pekerjaan_i,
			'penghasilan_ibu' => $penghasilan_i,
			'no_hp_ibu' => $no_i,

		);

		$where = ['id_ortu' => $idd];
		$this->m_ortu->ed_ortu($where, $data, 'tb_ortu');
		echo "<script>alert('Data berhasil disimpan');location='../../admin/admin/ortu'</script>";
	}
	function h_ortu()
	{
		$where = ['id_ortu' => $this->uri->segment(4)];
		$this->m_ortu->h_ortu($where, 'tb_ortu');
		echo "<script>alert('Data berhasil disimpan');location='../../admin/ortu'</script>";
	}
}