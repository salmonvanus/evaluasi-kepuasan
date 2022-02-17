<?php

class Data_search extends CI_Model
{

    private $table = "recent_search";

    function search($query_search)
    {
        $this->db->select('search_id');
        $this->db->where('search_query', $query_search);
        return $this->db->get($this->table)->row_array();
    }

    function insert($query_search)
    {
        $this->db->insert($this->table, $query_search);
    }

    function get_search()
    {
        $this->db->order_by('search_id', 'DESC');
        $this->db->limit(10);
        return $this->db->get($this->table)->result_array();
    }

    function delete_search($id)
    {
        $this->db->where('search_id', $id);
        $this->db->delete($this->table);
    }
}
