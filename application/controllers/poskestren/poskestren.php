<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Poskestren extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        poskestren_check();
        $tgl = date('Y-m-d H:i:s');
        $this->db->query("UPDATE `perizinan` SET stat='1' where tgl_selesai < ?", $tgl);
        $this->data = $this->db->query("SELECT code_perizinan,nis_perizinan,nis,nama,tgl_selesai FROM perizinan,tb_dsantri where perizinan.nis_perizinan = tb_dsantri.nis AND tgl_selesai < ?", $tgl)->result();



        $this->load->library('session');

        $this->load->model('m_dsantri');
    }
    function index()
    {
        $data['judul'] = "Dashboard";

        $data['admin'] = $this->db->get_where('auth', ['nama' => $this->session->userdata('nama')])->row_array();

        $data['akun'] = $this->db->get('auth')->result_array();

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar_s4', $data);
        $this->load->view('poskestren/index', $data);
        $this->load->view('template/footer', $data);
    }
}