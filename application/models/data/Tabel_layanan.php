<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tabel_layanan extends CI_Model
{
    private $table="data_layanan";

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
        $this->db->where($id);
        return $this->db->get($this->table)->row_array();
    }
}
