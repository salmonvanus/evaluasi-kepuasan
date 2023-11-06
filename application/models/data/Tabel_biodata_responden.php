<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tabel_biodata_responden extends CI_Model
{
    private $table="biodata_responden";

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


    public function getData($bulan, $tahun, $layanan) {

        if (!empty($bulan)) {
            $this->db->where('MONTH(tanggal)', $bulan);
        }
        if (!empty($tahun)) {
            $this->db->where('YEAR(tanggal)', $tahun);
        }
        if (!empty($layanan)) {
            $this->db->where('id_layanan', $layanan);
        }

        return $this->db->get($this->table)->result_array();
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

    function getRespondenByKodeResponden($kode_responden)
    {
        $this->db->where('kode_responden', $kode_responden);
        return $this->db->get($this->table)->row_array();
    }
}
