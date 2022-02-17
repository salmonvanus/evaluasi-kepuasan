<?php

class Data_consultation extends CI_Model
{

    private $table = "consultation";

    function respon_consultation()
    {
        $this->db->join('user_consultation', 'consultation.user_id = user_consultation.user_id');
        $this->db->join('respon_consultation', 'respon_consultation.consultation_id=consultation.consultation_id');
        $this->db->where('consultation.consultation_status', 1);
        $this->db->limit(5);
        return $this->db->get($this->table)->result_array();
    }

    function unrespon_consultation()
    {
        $this->db->join('user_consultation', 'consultation.user_id = user_consultation.user_id');
        $this->db->where('consultation.consultation_status', 0);
        $this->db->limit(5);
        return $this->db->get($this->table)->result_array();
    }

    function get_consultation($id)
    {
        $this->db->join('user_consultation', 'consultation.user_id = user_consultation.user_id');
        $this->db->where('consultation_id', $id);
        return $this->db->get($this->table)->row_array();
    }

    function show_unrespon_consultation()
    {
        $this->db->join('user_consultation', 'consultation.user_id = user_consultation.user_id');
        $this->db->where('consultation.consultation_status', 0);
        return $this->db->get($this->table)->result_array();
    }

    function show_respon_consultation()
    {
        $this->db->join('user_consultation', 'consultation.user_id = user_consultation.user_id');
        $this->db->where('consultation.consultation_status', 1);
        return $this->db->get_where($this->table)->result_array();
    }

    function detail_consultation($id)
    {
        $this->db->join('respon_consultation', 'consultation.consultation_id = respon_consultation.consultation_id');
        $this->db->join('user_consultation', 'consultation.user_id=user_consultation.user_id');
        $this->db->where('consultation.consultation_id', $id);
        return $this->db->get($this->table)->result_array();
    }

    function detail_consultation_row($id)
    {
        $this->db->join('respon_consultation', 'consultation.consultation_id = respon_consultation.consultation_id');
        $this->db->join('user_consultation', 'consultation.user_id=user_consultation.user_id');
        $this->db->where('consultation.consultation_id', $id);
        return $this->db->get($this->table)->row_array();
    }

    function edit_status($id, $status)
    {
        $this->db->where($id);
        // $this->db->edit('consultation_status', $consultation_status);
        $this->db->update($this->table, $status);
    }

    function edit_consultation_status_faq($id, $status)
    {
        $this->db->where($id);
        $this->db->update($this->table, $status);
    }

    function consultation_total()
    {
        return $this->db->count_all_results($this->table);
    }

    function unrespon_total()
    {
        $this->db->join('user_consultation', 'consultation.user_id = user_consultation.user_id');
        $this->db->where('consultation.consultation_status', 0);
        return $this->db->count_all_results($this->table);
    }

    function respon_total()
    {
        $this->db->join('user_consultation', 'consultation.user_id = user_consultation.user_id');
        $this->db->where('consultation.consultation_status', 1);
        return $this->db->count_all_results($this->table);
    }

    function insert_consultation($data)
    {
        $this->db->insert($this->table, $data);
    }

    function show_reply_wa_consultation($user_id, $consultation_id)
    {
        $this->db->join('user_consultation', 'consultation.user_id = user_consultation.user_id');
        $this->db->join('respon_consultation', 'consultation.consultation_id = respon_consultation.consultation_id');
        $this->db->where('consultation.consultation_id', $consultation_id);
        return $this->db->get($this->table)->result_array();
    }

    function get_consultation_user($id)
    {
        $this->db->where('consultation_id', $id);
        return $this->db->get($this->table)->row_array();
    }
}
