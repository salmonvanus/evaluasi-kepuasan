<?php

class Data_video extends CI_Model
{

    private $table = "video";

    function show_video()
    {
        return $this->db->get($this->table)->result_array();
    }

    function show_video_on_user()
    {
        $this->db->limit(3);
        // $this->db->order_by('video_id', 'ASC');
        return $this->db->get($this->table)->result_array();
    }

    function get_video($id)
    {
        $this->db->where('video_id', $id);
        return $this->db->get($this->table)->row_array();
    }

    function insert_video($data)
    {
        $this->db->insert($this->table, $data);
    }

    function edit_video($id, $data)
    {
        $this->db->where($id);
        $this->db->update($this->table, $data);
    }

    function delete_video($id)
    {
        $this->db->where($id);
        $this->db->delete($this->table);
    }
}
