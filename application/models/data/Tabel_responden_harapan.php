<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tabel_responden_harapan extends CI_Model
{
    private $table="data_responden_harapan";

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

    function getByKodeResponden($kode_responden)
    {
        $this->db->join('data_pertanyaan','data_pertanyaan.id = data_responden_harapan.id_pertanyaan_harapan', 'left');
        $this->db->where('data_responden_harapan.responden_harapan', $kode_responden);
        return $this->db->get($this->table)->result_array();
    }

    function sum_nilai_harapan()
    {
        $this->db->select('SUM(data_responden_harapan.nilai_harapan) as nilai');
        $this->db->join('data_pertanyaan', 'data_responden_harapan.id_pertanyaan_harapan = data_pertanyaan.id');
        $this->db->group_by('data_pertanyaan.id', 'ASC');
        return $this->db->get($this->table)->result_array();
    }
}
