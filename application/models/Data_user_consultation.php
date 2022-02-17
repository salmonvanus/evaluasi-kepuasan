<?php

class Data_user_consultation extends CI_Model
{

    private $table = "user_consultation";

    function show_consultation()
    {
        $this->db->join('consultation', 'consultation.user_id = user_consultation.user_id');
        return $this->db->get($this->table)->result_array();
    }

    function insert_user($data)
    {
        $this->db->insert($this->table, $data);
        $id = $this->db->insert_id();
        $data['user_id'] = $id;
        return $data;
    }

    function get_user($id)
    {
        $this->db->where('user_id', $id);
        return $this->db->get($this->table)->row_array();
    }
}
