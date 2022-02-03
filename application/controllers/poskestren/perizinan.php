<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Perizinan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        poskestren_check();
        $tgl = date('Y-m-d H:i:s');
        $this->db->query("UPDATE `perizinan` SET stat='1' where tgl_selesai < ?", $tgl);
        $this->data = $this->db->query("SELECT code_perizinan,nis_perizinan,nis,nama,tgl_selesai FROM perizinan,tb_dsantri where perizinan.nis_perizinan = tb_dsantri.nis AND tgl_selesai < ?", $tgl)->result();



        $this->load->library('session');
        $this->load->model('M_perizinan');
        $this->load->model('m_dsantri');
    }

    function index()
    {
        $data['judul'] = "Perizinan Santri";
        $data['admin'] = $this->db->get_where('auth', ['nama' => $this->session->userdata('nama')])->row_array();
        $data['pp'] = $this->M_perizinan->get_perizinan();

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar_s4', $data);
        $this->load->view('poskestren/perizinan/index', $data);
        $this->load->view('template/footer', $data);
    }
    function verif()
    {

        $data = array(

            'verif'        => 1
        );

        $where = array('code_perizinan'    => $this->uri->segment(4));
        $this->M_perizinan->edit($where, $data, 'perizinan');
        echo "<script>alert('data berhasil diubah');location='../../perizinan'</script>";
    }
    function tb_data()
    {
        $nis = $this->input->post('nis');
        $stat = $this->input->post('stat');
        $tm = $this->input->post('tm');
        $ts = $this->input->post('ts');
        $ket = $this->input->post('ket');

        $data = array(
            'code_perizinan'   => uniqid(),
            'nis_perizinan'    => $nis,
            'status_perizinan' => $stat,
            'tgl_mulai'              => $tm,
            'tgl_selesai'       => $ts,
            'keterangan_izin'  => $ket,
            'pencatat'              => 5,
            'verif'             => 1

        );

        $this->M_perizinan->tb_data($data, 'perizinan');
        echo "<script>alert('data berhasil disimpan');location='../perizinan'</script>";
    }
    function edit()
    {
        $kd = $this->input->post('idx');
        $nise = $this->input->post('nise');
        $stats = $this->input->post('stats');
        $tgl_selesai = $this->input->post('tgl_selesai');
        $ket = $this->input->post('ket');

        $data = array(
            'nis_perizinan'            => $nise,
            'status_perizinan'        => $stats,
            'tgl_selesai'            => $tgl_selesai,
            'keterangan_izin'        => $ket,
            'pencatat'  => 5
        );

        $where = array('code_perizinan'    => $kd);
        $this->M_perizinan->edit($where, $data, 'perizinan');
        echo "<script>alert('data berhasil diubah');location='../perizinan'</script>";
    }
    function delete()
    {


        $where = ['code_perizinan' => $this->uri->segment(4)];
        $this->M_perizinan->delete($where, 'perizinan');
        echo "<script>alert('Data berhasil dihapus');location='../../perizinan'</script>";
    }
    function t_santri_konsulat()
    {
        $data['judul'] = "Data Santri";

        $data['admin'] = $this->db->get_where('auth', ['nama' => $this->session->userdata('nama')])->row_array();
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar_s4', $data);
        $data['tsantrikonsulat'] = $this->m_dsantri->get_santri();
        $this->load->view('poskestren/perizinan/t_santri_konsulat', $data);
        $this->load->view('template/footer', $data);
    }
}