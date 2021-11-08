<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Crud_dsantri extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		is_logged_in();


		$this->load->library('session');
		$this->load->model('m_dsantri');
		$this->load->model('m_kelas');
	}


	function tb_santri()
	{

		$config['upload_path']          = './upload_img/foto_santri/';
		$config['allowed_types']        = 'gif|jpg|png';

		$config['encrypt_name']			= TRUE;
		$this->load->library('upload', $config);
		$this->upload->initialize($config);
		$this->upload->do_upload('berkas');

		$data['nama_berkas'] = $this->upload->data("file_name");
		$nama_f = $data['nama_berkas'];




		$nis = $this->input->post('nis');
		$nama = $this->input->post('nama');
		$jk = $this->input->post('jk');
		$alamat = $this->input->post('alamat');
		$tempat = $this->input->post('tempat');
		$tgl_lahir = $this->input->post('tgl_lahir');
		$kamar = $this->input->post('kamar');
		$kelas = $this->input->post('kelas');
		$id_ortu = $this->input->post('id_ortu');
		$keterangan = $this->input->post('keterangan');
		$stat = $this->input->post('stat');
		$tp = $this->input->post('tmpt');


		$data = array(
			'nis' => $nis,
			'nama' => $nama,
			'jk' => $jk,
			'alamat' => $alamat,
			'tempat_lahir' => $tempat,
			'tgl_lahir' => $tgl_lahir,
			'code_kamar' => $kamar,
			'kelas'	=> $kelas,

			'keterangan' => $keterangan,
			'foto' => $nama_f,
			'status' => $stat,
			'tempat_abituren' => $tp,

		);
		$d = array(
			'id_details' => uniqid(),
			'id_ortu' => $id_ortu,
			'niss'	=> $nis,
		);

		$this->m_dsantri->tb_santri($data, 'tb_dsantri');
		$this->m_dsantri->tb_santri($d, 'details');
		echo "<script>alert('Data berhasil disimpan');location='../admin/santri'</script>";
	}

	function up_santri()
	{

		$nis = $this->input->post('nise');
		$nama = $this->input->post('namae');
		$jk = $this->input->post('jke');
		$alamat = $this->input->post('alamate');
		$tempat = $this->input->post('tempate');
		$tgl_lahir = $this->input->post('tgl_lahire');
		$kamar = $this->input->post('kamare');
		$kelas = $this->input->post('kelase');
		$id_ortu = $this->input->post('id_ortue');
		$keterangan = $this->input->post('keterangane');




		$data = array(

			'nama' => $nama,
			'jk' => $jk,
			'alamat' => $alamat,
			'tempat_lahir' => $tempat,
			'tgl_lahir' => $tgl_lahir,
			'code_kamar' => $kamar,
			'kelas'	=> $kelas,
			'keterangan' => $keterangan,


		);
		$where = ['nis' => $nis];

		$this->m_dsantri->ed_santri($where, $data, 'tb_dsantri');
		echo "<script>alert('Data berhasil disimpan');location='../admin/santri'</script>";
	}
	function h_santri()
	{
		$wws = $this->uri->segment(5);
		$z = $this->db->query("SELECT id_details,COUNT( niss ) AS total FROM details WHERE id_ortu='$wws'")->row_array();
		//var_dump($z);die();

		if ($z['total'] > '1') {

			$ww = ['niss' => $this->uri->segment(4)];
			$where = ['nis' => $this->uri->segment(4)];
			$a = $this->db->get_where('tb_dsantri', ['nis' => $this->uri->segment(4)])->row_array();
			$p = $a['foto'];
			$path  = './upload_img/foto_santri/' . $p;
			unlink($path);
			$this->m_dsantri->h_santri($ww, 'details');
			$this->m_dsantri->h_santri($where, 'tb_dsantri');
			echo "<script>alert('Data berhasil disimpan');location='../../../admin/santri'</script>";
		} else if ($z['total'] == '1') {

			$ww = ['niss' => $this->uri->segment(4)];
			$where = ['nis' => $this->uri->segment(4)];
			$a = $this->db->get_where('tb_dsantri', ['nis' => $this->uri->segment(4)])->row_array();
			$b = $this->db->get_where('details', ['niss' => $this->uri->segment(4)])->row_array();
			$z = $b['id_ortu'];
			$w2 = ['id_ortu' => $z];
			$p = $a['foto'];
			$path  = './upload_img/foto_santri/' . $p;
			unlink($path);
			$this->m_dsantri->h_santri($w2, 'tb_ortu');
			$this->m_dsantri->h_santri($ww, 'details');
			$this->m_dsantri->h_santri($where, 'tb_dsantri');
			echo "<script>alert('Data berhasil disimpan');location='../../../admin/santri'</script>";
		}
	}

	function export()
	{
		$this->load->library('pdfgenerator');

		$niss = $this->uri->segment(4);
		$this->db->where('tb_dsantri.nis=', $niss);
		$data['santri'] = $this->m_dsantri->get_Asantri();

		$tegeel = date('dmYHis');
		$file_pdf = 'data_santri' . $tegeel . $niss;
		// setting paper
		$paper = 'A4';
		//orientasi paper potrait / landscape
		$orientation = "portrait";

		$html = $this->load->view('admin/santri/p_santri', $data, TRUE);

		// run dompdf
		$this->pdfgenerator->generate($html, $file_pdf, $paper, $orientation);
	}
	function s_e()
	{

		$kelas1	= $this->input->post('nama_kelass');
		$kelas2	= $this->input->post('nama_kelass1');

		$data = array(
			'kelas'		=>	$kelas2,

		);
		$where = ['kelas' => $kelas1];
		$this->m_kelas->ed_kelas($where, $data, 'tb_dsantri');
		echo "<script>alert('Data berhasil disimpan');location='../admin/santri_k'</script>";
	}
	function upd_kelas()
	{
		$nis = $this->input->post('p_nis');
		$kls_p = $this->input->post('opsi_s');

		if (empty($nis)) {
			echo "<script>alert('Pilih minimal 1 Santri/Wati');location='../admin/santri_k'</script>";
		} else
		if (empty($kls_p)) {
			echo "<script>alert('Pilih Tujuan Kelas');location='../admin/santri_k'</script>";
		} else
		if ($kls_p == 'Alumni') {
			$nis = $this->input->post('p_nis');
			$kls_p = $this->input->post('opsi_s');
			$nis = implode(",", $nis);

			//var_dump($nis);die();
			$this->m_dsantri->upd_kelasA($kls_p, $nis);
			echo "<script>alert('Data berhasil disimpan');location='../admin/santri_k'</script>";
		} else {
			$nis = $this->input->post('p_nis');
			$kls_p = $this->input->post('opsi_s');
			$nis = implode(",", $nis);

			//var_dump($nis);die();
			$this->m_dsantri->upd_kelas($kls_p, $nis);
			echo "<script>alert('Data berhasil disimpan');location='../admin/santri_k'</script>";
		}
	}

	function upd_stats()
	{
		$st = $this->input->post('status');
		$tm = $this->input->post('tmpt');
		$pr = $this->input->post('pr');

		if ($st == 'Abituren' && $tm == '-') {
			echo "<script>alert('Input tempat dengan benar');location='../admin/santri'</script>";
		} else
		if ($st == 'Alumni' && $tm == '-') {

			$st = $this->input->post('status');
			$tm = $this->input->post('tmpt');
			$pr = $this->input->post('pr');

			$data = array(
				'status'		=>	$st,
				'tempat_abituren' => $tm,
				'code_kamar' => '-',
				'kelas' => '-',

			);

			//var_dump($nis);die();
			$where = ['nis' => $pr];
			$this->m_dsantri->ed_santri($where, $data, 'tb_dsantri');
			echo "<script>alert('Data berhasil DiUbah');location='../admin/santri'</script>";
		} else if ($st == 'Pengabdian' && $tm == '-') {
			$nama = $this->input->post('namaa');
			$alamat = $this->input->post('alamata');
			$jk = $this->input->post('jka');
			$tempat_lahir = $this->input->post('tempat_lahira');
			$tgl_lahir = $this->input->post('tgl_lahira');
			$id_ortu = $this->input->post('id_ortua');
			$foto = $this->input->post('fotoa');
			$status = $this->input->post('statusa');

			$data = array(
				'nama_pengajar'			=>	$nama,
				'alamat_pengajar'		=>	$alamat,
				'jk_pengajar'			=>	$jk,
				'tempat_lahir_pengajar'	=>	$tempat_lahir,
				'tgl_lahir_pengajar'	=>	$tgl_lahir,
				'id_ortu_pengajar'		=>	$id_ortu,
				'foto_pengajar'			=>	$foto,
				'status_pengajar'		=>	'Pengabdian',
			);
			$where = ['nis' => $this->input->post('pr')];
			$this->m_dsantri->h_santri($where, 'tb_dsantri');
			$this->m_dsantri->tb_santri($data, 'tb_pengajar');
			echo "<script>alert('Data berhasil disimpan');location='../admin/santri'</script>";
		} else {

			$st = $this->input->post('status');
			$tm = $this->input->post('tmpt');
			$pr = $this->input->post('pr');

			$data = array(
				'status'		=>	$st,
				'tempat_abituren' => $tm,

			);

			//var_dump($nis);die();
			$where = ['nis' => $pr];
			$this->m_dsantri->ed_santri($where, $data, 'tb_dsantri');
			echo "<script>alert('Data berhasil DiUbah');location='../admin/santri'</script>";
		}
	}
}