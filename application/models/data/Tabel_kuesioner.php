<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tabel_kuesioner extends CI_Model
{
    private $table="data_kuesioner";

    public function __construct()
    {
        parent::__construct();
    }

     public function all()
    {
        $this->db->select('*');
        return $this->db->get($this->table)->result_array();
    }

    public function get_by_layanan_id($id)
    {
        $this->db->where($id);
        return $this->db->get($this->table)->result_array();
    }
}
