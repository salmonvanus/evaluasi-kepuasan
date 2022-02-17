<?php

class Data_respon_consultation extends CI_Model
{
    private $table = "respon_consultation";

    function insert_respon($data)
    {
        $this->db->insert($this->table, $data);
    }

    function get_respon($id)
    {
        $this->db->where('respon_id', $id);
        return $this->db->get($this->table)->row_array();
    }

    function edit_respon($id, $data)
    {
        $this->db->where('respon_id', $id);
        $this->db->update($this->table, $data);
    }

    function delete_respon($id)
    {
        $this->db->where('respon_id', $id);
        $this->db->delete($this->table);
    }
}
