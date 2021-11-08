<?php
defined('BASEPATH') or exit('No direct script access allowed');
require('./excel/vendor/autoload.php');

use PhpOffice\PhpSpreadsheet\Helper\Sample;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;
use PhpOffice\PhpSpreadsheet\Reader\Csv;
use PhpOffice\PhpSpreadsheet\Reader\Xls;


class Crud_alarm extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		is_logged_in();

		$this->load->helper('download');
		$this->load->helper(array('form', 'url'));
		$this->load->library('session');
		$this->load->model('m_jadwal');
	}
	public function xls_import()
	{
		$upload_file = $_FILES['upload_file']['name'];
		$ext = pathinfo($upload_file, PATHINFO_EXTENSION);
		//var_dump(new Csv);die();
		if ($ext == 'csv') {
			$reader = new Csv();
		} else if ($ext == 'xls') {
			$reader = new Xls();
		} else {
			$reader = new Xlsx();
		}
		$spreadsheet = $reader->load($_FILES['upload_file']['tmp_name']);
		$sheetdata = $spreadsheet->getActiveSheet()->toArray();
		$sheetcount = count($sheetdata);
		if ($sheetcount > 1) {
			$data = [];
			for ($i = 1; $i < $sheetcount; $i++) {
				$tgl = date_create($sheetdata[$i][0]);
				$hari = $sheetdata[$i][1];
				$jam = $sheetdata[$i][2];
				$ket = $sheetdata[$i][3];
				$pecah = explode(":", $jam);
				$data[] = array(
					'tanggal' 	=> date_format($tgl, "Y-m-d"),
					'hari' => $hari,
					'jam_asli'	=> preg_replace("/:/", "", $jam),
					'jam'		=> $pecah[0],
					'menit'		=> $pecah[1],
					'keterangan' => $ket,
				);
			}
			//var_dump($data);die();
			$insert = $this->m_jadwal->insert_batch($data);
			if ($insert) {
				$this->session->flashdata('message', '<div class="alert alert-success">Sukses tambah</div>');
				redirect("admin/admin/alarm");
			} else {
				$this->session->flashdata('message', '<div class="alert alert-danger">Gagal tambah</div>');
				redirect("admin/admin/alarm");
			}
		}
	}

	function tb_alarm()
	{
		$tgl = $this->input->post('tgl');
		$hari = $this->input->post('hari');
		$jam = $this->input->post('jam');
		$menit = $this->input->post('menit');




		$result = array();

		$hitung = 0;
		foreach ($tgl as $t) {
			array_push($result, array(
				'tanggal' => $t,
				'jam_asli'	=> $jam[$hitung] . $menit[$hitung],
				'jam' => $jam[$hitung],
				'menit' => $menit[$hitung],

			));

			$hitung++;
		}
		//var_dump($result);
		$this->db->insert_batch('jadwal_alarm', $result);
		echo "<script>alert('data sukses disimpan');location='../admin/alarm'</script>";
	}
	function h_alarm()
	{
		$where = ['code_ja' => $this->uri->segment(4)];
		$this->m_jadwal->h_jadwal($where, 'jadwal_alarm');
		echo "<script>alert('data sukses disimpan');location='../../admin/alarm'</script>";
	}
}