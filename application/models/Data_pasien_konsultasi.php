<?php

class Data_pasien_konsultasi extends CI_Model
{
    private $table = "pasien_konsultasi";

    function ambil_pasien($id)
    {
        $this->db->order_by('id_pasien', $id);
        return $this->db->get($this->table)->row_array();
    }

    function ambil_pasien_by_id($id)
    {
        $this->db->where('id_pasien', $id);
        return $this->db->get($this->table)->row_array();
    }
}
