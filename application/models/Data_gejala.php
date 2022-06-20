<?php

class Data_gejala extends CI_Model
{
    private $table = "gejala";

    function daftar_gejala()
    {
        $this->db->order_by('id_gejala', 'ASC');
        return $this->db->get($this->table)->result_array();
    }

    function ambil_kode_gejala_terakhir()
    {
        $this->db->select('kode_gejala');
        $this->db->order_by('id_gejala', 'DESC');
        return $this->db->get($this->table)->row_array();
    }

    function ambil_inisial_gejala_terakhir()
    {
        $this->db->select('inisial_gejala');
        $this->db->order_by('inisial_gejala', 'DESC');
        $this->db->limit(1);
        return $this->db->get($this->table)->row_array();
    }

    function ambil_gejala($id)
    {
        $this->db->where('id_gejala', $id);
        return $this->db->get($this->table)->row_array();
    }

    function tambah($data)
    {
        $this->db->insert($this->table, $data);
    }

    function ubah($id, $data)
    {
        $this->db->where($id);
        $this->db->update($this->table, $data);
    }

    function hapus($id)
    {
        $this->db->where($id);
        $this->db->delete($this->table);
    }
}
