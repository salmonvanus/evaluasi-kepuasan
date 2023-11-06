<?php

class Tabel_pengguna extends CI_Model
{

    private $table = "auth_user";

    function show_all()
    {
        return $this->db->get($this->table)->result_array();
    }

    function show_profil($id)
    {
        $this->db->where('id', $id);
        return $this->db->get($this->table)->row_array();
    }

    function get_image($id)
    {
        $this->db->where('id', $id);
        return $this->db->get($this->table, 'image')->row_array();
    }

    function get_profil($id)
    {
        $this->db->where('id', $id);
        return $this->db->get($this->table)->row_array();
    }

    function edit_profil($id, $data)
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
