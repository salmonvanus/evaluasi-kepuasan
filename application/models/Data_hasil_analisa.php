<?php

class Data_hasil_analisa extends CI_Model
{
    private $table = "hasil_analisa_pasien";


    function show_hasil_analisa()
    {
        $this->db->distinct();
        $this->db->select('*');
        $this->db->from('hasil_analisa_pasien');
        $query = $this->db->get()->result_array();
        return $query;
        // return $this->db->get($this->table)->result_array();
    }
}
