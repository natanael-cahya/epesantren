<?php
class M_group extends CI_Model
{

    function get_lembaga()
    {
        $this->db->select('*');
        $this->db->from('tb_lembaga');

        $query = $this->db->get();
        return $query->result();
    }


    function get_marhalah($id)
    {
        $this->db->select('*');
        $this->db->from('tb_marhalah');
        $this->db->where('id_lembaga=', $id);

        $hasil = $this->db->get();
        return $hasil->result();
    }
    function get_kls($idk)
    {
        $this->db->select('*');
        $this->db->from('tb_kls');
        $this->db->where('id_marhalah=', $idk);

        $hasil2 = $this->db->get();
        return $hasil2->result();
    }
}
