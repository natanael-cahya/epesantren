<?php
defined('BASEPATH') or exit('No direct script access allowed');


class M_extra extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->helper('url');
        $this->load->library('session');
    }

    function get_extra()
    {
        $this->db->select('*');
        $this->db->from('tb_extra');

        $query = $this->db->get();
        return $query->result();
    }
    function get_Aextra()
    {
        $this->db->select('*');
        $this->db->from('detaile');
        $this->db->from('tb_dsantri');
        $this->db->from('tb_extra');
        $this->db->where('tb_dsantri.nis=detaile.nis');
        $this->db->where('tb_extra.code_extra=detaile.code_extra');

        $query = $this->db->get();
        return $query->result();
    }
    function get_Aextra2()
    {
        $this->db->select('*');
        $this->db->from('detaile');
        $this->db->from('tb_dsantri');
        $this->db->from('tb_extra');
        $this->db->where('tb_dsantri.nis=detaile.nis');
        $this->db->where('tb_extra.code_extra=detaile.code_extra');
        $query = $this->db->get();
        return $query->result();
    }
    function h_extra($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }
    function tb_extra($data, $table)
    {
        $this->db->insert($table, $data);
    }
    function ed_extra($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }




    function edit_data($where, $table)
    {
        return $this->db->get_where($table, $where);
    }





    function te()
    {
        $this->db->select('*');
        $this->db->from('detaile');
        $this->db->join('tb_dsantri', 'tb_dsantri.nis=detaile.nis', 'left');
        $this->db->join('tb_extra', 'tb_extra.code_extra=detaile.code_extra', 'left');
        $this->db->order_by("nama", "asc");

        $query = $this->db->get();
        return $query->result();
    }
    function no_extra()
    {
        $q = $this->db->query("SELECT tb_dsantri.nis,tb_dsantri.jk,tb_dsantri.alamat,tb_dsantri.nama,count(detaile.nis) as jumlah_extra FROM tb_dsantri LEFT JOIN detaile ON tb_dsantri.nis = detaile.nis GROUP BY tb_dsantri.nis HAVING jumlah_extra < 3");
        return $q->result();
    }
}