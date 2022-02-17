<?php

class Data_faq extends CI_Model
{

    private $table = "faq";
    private $_faqID;
    private $_faqConsultation;

    function show_faq()
    {
        $this->db->join('category_consultation', 'category_consultation.category_id=faq.faq_category_consultation_id');
        return $this->db->get($this->table)->result_array();
    }

    function show_faq_dom()
    {
        // $this->db->select('faq_id');
        $this->db->select('*');
        return $this->db->get($this->table)->result_array();
    }

    function show_all_faq()
    {
        return $this->db->get($this->table)->result_array();
    }

    function show_consultation_respon()
    {
        $this->db->join('category_consultation', 'category_consultation.category_id=faq.faq_category_consultation_id');
        $this->db->order_by('faq.faq_id', 'DESC');
        $this->db->limit(6);
        return $this->db->get($this->table)->result_array();
    }

    function show_category_faq_for_user()
    {
        $this->db->select('category_consultation.category_name', 'faq_category_consultation_id');
        $this->db->join('category_consultation', 'faq.faq_category_consultation_id=category_consultation.category_id');
        $this->db->group_by('category_consultation.category_name', 'ASC');
        return $this->db->get($this->table)->result_array();
    }

    function show_faq_for_user()
    {
        $this->db->join('category_consultation', 'faq.faq_category_consultation_id=category_consultation.category_id');
        $this->db->order_by('faq.faq_open_number', 'DESC');
        // $this->db->where('category_consultation.category_id', $category_id);
        // $this->db->group_by('category_consultation.category_name', 'ASC');
        return $this->db->get($this->table)->result_array();
    }

    function show_faq_by_id($id)
    {
        $this->db->join('category_consultation', 'faq.faq_category_consultation_id=category_consultation.category_id');
        $this->db->where('faq.faq_id', $id);
        return $this->db->get($this->table)->result_array();
    }

    function show_detail_consultation_category($id)
    {
        $this->db->join('category_consultation', 'category_consultation.category_id=faq.faq_category_consultation_id');
        $this->db->where('faq.faq_category_consultation_id', $id);
        return $this->db->get($this->table)->result_array();
    }

    function get_faq($id)
    {
        $this->db->join('category_consultation', 'category_consultation.category_id=faq.faq_category_consultation_id');
        $this->db->where('faq.faq_id', $id);
        return $this->db->get($this->table)->row_array();
    }

    function insert_faq($data)
    {
        $this->db->insert($this->table, $data);
    }

    function edit_faq($faq_id, $data)
    {
        $this->db->where($faq_id);
        $this->db->update($this->table, $data);
    }

    function delete_faq($faq_id)
    {
        $this->db->where($faq_id);
        $this->db->delete($this->table);
    }

    function cek_consultation_id($id)
    {
        $this->db->where('faq_consultation_id', $id);
        return $this->db->get($this->table)->row_array();
    }

    function get_faq_number($id)
    {
        $this->db->select('faq_open_number');
        $this->db->where('faq_id', $id);
        return $this->db->get($this->table)->row_array();
    }

    function add_number($id, $faq_number)
    {
        $this->db->where('faq_id', $id);
        $this->db->update($this->table, $faq_number);
    }

    // function show_faq_search($query)
    // {
    //     $this->db->like('faq_consultation', $query);
    //     $this->db->or_like('faq_respon', $query);
    //     return $this->db->get($this->table)->result_array();
    // }

    function show_faq_search($query)
    {
        $this->db->select("*");
        $this->db->from("faq");
        if ($query != '') {
            $this->db->like('Faq_consultation', $query);
            $this->db->or_like('Faq_respon', $query);
        }
        $this->db->order_by('Faq_id', 'DESC');
        return $this->db->get();
    }

    function search($condition)
    {
        // $this->db->select('faq_consultation');
        $this->db->like('faq_consultation', $condition);
        $this->db->or_like('faq_respon', $condition);
        $this->db->order_by('faq_id', 'DESC');
        $this->db->limit(10);
        return $this->db->get($this->table)->result_array();
    }

    public function setFaqID($faqID)
    {
        return $this->_faqID = $faqID;
    }
    // set country Name
    public function setFaqConsultation($faqConsultation)
    {
        return $this->_faqConsultation = $faqConsultation;
    }
    // get All Countries
    public function getAllFaq()
    {
        // $this->db->select("*");
        // $this->db->from('faq as c');
        $this->db->like('faq_consultation', $this->_faqConsultation, 'both');
        return $this->db->get($this->table)->result_array();
    }
}
