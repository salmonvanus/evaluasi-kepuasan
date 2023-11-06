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

    public function create($data)
    {
        $this->db->insert($this->table, $data);
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
