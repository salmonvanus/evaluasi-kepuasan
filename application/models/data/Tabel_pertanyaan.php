<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tabel_pertanyaan extends CI_Model
{
    private $table="data_pertanyaan";

    public function __construct()
    {
        parent::__construct();
    }

    public function all()
    {
        $this->db->select('*');
        return $this->db->get($this->table)->result_array();
    }

    function get($id)
    {
        $this->db->where('id', $id);
        return $this->db->get($this->table)->row_array();
    }

    // public function create($data)
    // {
    //     $this->db->insert($this->table, $data);
    //     return $this->db->affected_rows() > 0;
    // }

    public function create($data)
    {
        // Loop through the arrays and insert data into the database
        foreach ($data['id_layanan'] as $index => $id_layanan) {
            $insert_data = array(
                'id_layanan' => $id_layanan,
                'jenis_pertanyaan' => $data['jenis_pertanyaan'][$index],
                'pertanyaan' => $data['pertanyaan'][$index]
            );

            // Insert data into the database
            $this->db->insert($this->table, $insert_data);
        }

        // Check for successful insertion
        return $this->db->affected_rows() > 0;
    }

    function edit($id, $data)
    {
        $this->db->where($id);
        $this->db->update($this->table, $data);
    }

    function get_pertanyaan_harapan_by_id_layanan($id)
    {
        $this->db->where($id);
        $this->db->where('jenis_pertanyaan', 'Pertanyaan Harapan/Pelayanan');
        return $this->db->get($this->table)->result_array();
    }

    function get_pertanyaan_persepsi_by_id_layanan($id)
    {
        $this->db->where($id);
        $this->db->where('jenis_pertanyaan', 'Pertanyaan Persepsi/Layanan');
        return $this->db->get($this->table)->result_array();
    }
}
