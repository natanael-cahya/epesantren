<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Crud_extra extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        is_logged_in();


        $this->load->library('session');
        $this->load->model('m_extra');
    }

    function tb_extra()
    {
        $uid = uniqid();
        $ex = $this->input->post('ex');
        $pe = $this->input->post('pe');


        $data = array(
            'code_extra' => $uid,
            'nama_extra' => $ex,
            'nama_pembimbing' => $pe,


        );

        $this->m_extra->tb_extra($data, 'tb_extra');
        echo "<script>alert('Data berhasil disimpan');location='../admin/extra'</script>";
    }
    function h_extra()
    {
        $where = ['code_extra' => $this->uri->segment(4)];
        $this->m_extra->h_extra($where, 'tb_extra');
        echo "<script>alert('Data berhasil disimpan');location='../../admin/extra'</script>";
    }
    function h()
    {
        $where = ['id_detaile' => $this->uri->segment(4)];
        $this->m_extra->h_extra($where, 'detaile');
        echo "<script>alert('Data berhasil disimpan');location='../../admin/extra_s'</script>";
    }
    function ed_extra()
    {

        $ex = $this->input->post('exe');
        $pe = $this->input->post('pee');


        $data = array(
            'nama_extra' => $ex,
            'nama_pembimbing' => $pe,


        );
        $where = ['code_extra' => $this->uri->segment(4)];
        $this->m_extra->ed_extra($where, $data, 'tb_extra');
        echo "<script>alert('Data berhasil disimpan');location='../../admin/extra'</script>";
    }
    function ed_ext()
    {
        $dt = $this->input->post('dt');
        $exe = $this->input->post('exe');
        $uri = $this->input->post('uri');
        $nise = $this->input->post('nise');

        $z = $this->db->query("SELECT * FROM detaile WHERE code_extra='$exe' AND nis ='$nise'")->row_array();

        if (empty($z)) {

            $dt = $this->input->post('dt');
            $exe = $this->input->post('exe');
            $uri = $this->input->post('uri');
            $nise = $this->input->post('nise');

            $data = array(
                'code_extra' => $exe,


            );
            $where = ['id_detaile' => $dt];
            $this->m_extra->ed_extra($where, $data, 'detaile');
            echo "<script>alert('Data berhasil disimpan');location='../../admin/admin/$uri'</script>";
        } else {
            echo "<script>alert('Extra Tersebut Sudah dipilih!');location='../../admin/admin/$uri'</script>";
        }
    }
    function t_extra()
    {
        $nis = $this->input->post('nise');
        $exe = $this->input->post('exe');
        $uri = $this->input->post('uri');

        $z = $this->db->query("SELECT * FROM detaile WHERE code_extra='$exe' AND nis ='$nis'")->row_array();

        if (empty($z)) {

            $data = array(
                'nis'   => $nis,
                'code_extra' => $exe
            );
            $this->m_extra->tb_extra($data, 'detaile');
            echo "<script>alert('Data berhasil disimpan');location='../../admin/admin/$uri'</script>";
        } else {
            echo "<script>alert('Extra tak boleh sama');location='../../admin/admin/$uri'</script>";
        }
    }
}