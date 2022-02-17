<?php

class Data_admin extends CI_Model
{

    private $table = "user";


    function show_profile($id)
    {
        $this->db->where('id', $id);
        return $this->db->get($this->table)->row_array();
    }

    function get_image($id)
    {
        $this->db->where('id', $id);
        return $this->db->get($this->table, 'image')->row_array();
    }

    function get_profile($id)
    {
        $this->db->where('id', $id);
        return $this->db->get($this->table)->row_array();
    }

    function edit_profile($id, $data)
    {
        $this->db->where($id);
        $this->db->update($this->table, $data);
    }

    function edit_image($id, $images)
    {
        $this->db->where($id);
        $this->db->update($this->table, $images);
    }
}
