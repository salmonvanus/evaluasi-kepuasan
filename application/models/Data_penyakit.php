<?php

class Data_penyakit extends CI_Model
{
    private $table = "penyakit";

    function daftar_penyakit()
    {
        return $this->db->get($this->table)->result_array();
    }

    function ambil_id_penyakit()
    {
        $this->db->select('id_penyakit');
        return $this->db->get($this->table)->result_array();
    }

    function ambil_kode_penyakit_terakhir()
    {
        $this->db->select('kode_penyakit');
        $this->db->order_by('id_penyakit', 'DESC');
        // $this->db->limit(1);
        return $this->db->get($this->table)->row_array();
    }

    function ambil_penyakit($id)
    {
        $this->db->where('id_penyakit', $id);
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

    function total_penyakit()
    {
        $query = $this->db->query("SELECT * FROM penyakit");
        $total = $query->num_rows();
        return $total;
    }
}
