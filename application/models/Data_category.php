<?php

class Data_category extends CI_Model
{

    private $table = "category_consultation";

    function show_category()
    {
        return $this->db->get($this->table)->result_array();
    }

    function show_category_for_user()
    {
        $this->db->order_by('category_id', 'ASC');
        return $this->db->get($this->table)->result_array();
    }

    function get_category($id)
    {
        $this->db->where('category_id', $id);
        return $this->db->get($this->table)->row_array();
    }

    function insert($data)
    {
        $this->db->insert($this->table, $data);
    }

    function edit($id, $data)
    {
        $this->db->where($id);
        $this->db->update($this->table, $data);
    }

    function delete($id)
    {
        $this->db->where($id);
        $this->db->delete($this->table);
    }

    function cek_category($data)
    {
        $this->db->where('category_name', $data);
        return $this->db->get($this->table)->row_array();
    }
}
