<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Crud_guru extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        is_logged_in();


        $this->load->library('session');
        $this->load->model('m_guru');
    }

    function tb_guru()
    {

        $uid = uniqid();
        $p = $this->input->post('p');



        $data = array(
            'code_pengajar' => $uid,
            'nama_pengajar' => $p,


        );

        $this->m_guru->tb_guru($data, 'tb_pengajar');
        echo "<script>alert('Data berhasil disimpan');location='../../admin/admin/pengajar'</script>";
    }
    function ed_guru()
    {


        $pe = $this->input->post('pe');
        $p = $this->input->post('par');


        $data = array(
            'nama_pengajar' => $pe,


        );
        $where = ['code_pengajar' => $p];
        $this->m_guru->ed_guru($where, $data, 'tb_pengajar');
        echo "<script>alert('Data berhasil diRubah');location='../../admin/admin/pengajar'</script>";
    }
    function h_guru()
    {
        $where = ['code_pengajar' => $this->uri->segment(4)];
        $this->m_guru->h_guru($where, 'tb_pengajar');
        echo "<script>alert('Data berhasil Dihapus');location='../../admin/pengajar'</script>";
    }
}