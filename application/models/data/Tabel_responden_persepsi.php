<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tabel_responden_persepsi extends CI_Model
{
    private $table="data_responden_persepsi";

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
        $this->db->where('responden_persepsi', $kode_responden);
        return $this->db->get($this->table)->result_array();
    }
}
