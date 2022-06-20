<?php

class Data_gejala_pasien extends CI_Model
{
    private $table = "gejala_pasien";


    function insert($data)
    {
        $this->db->insert($this->table, $data);
    }
}
