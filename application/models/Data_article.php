<?php

class Data_article extends CI_Model
{

    private $table = "article";

    function show_article()
    {
        $this->db->join('user', 'user.id=article.user_id');
        return $this->db->get($this->table)->result_array();
    }

    function get_article($id)
    {
        $this->db->join('user', 'user.id=article.user_id');
        $this->db->where('article_id', $id);
        return $this->db->get($this->table)->row_array();
    }

    function article_total()
    {
        return $this->db->count_all_results($this->table);
    }

    function show_article_dashboard()
    {
        $this->db->limit(3);
        $this->db->order_by('article_id', 'DESC');
        return $this->db->get($this->table)->result_array();
    }

    function insert($data)
    {
        $this->db->insert($this->table, $data);
    }

    function edit($article_id, $data)
    {
        $this->db->where('article_id', $article_id);
        $this->db->update($this->table, $data);
    }

    function delete($article_id)
    {
        $this->db->where('article_id', $article_id);
        $this->db->delete($this->table);
    }

    function show_u_article()
    {
        $this->db->join('user', 'user.id=article.user_id');
        return $this->db->get($this->table)->result_array();
    }

    function show_u_article_by_id($id)
    {
        $this->db->join('user', 'user.id=article.user_id');
        $this->db->where('article.article_id', $id);
        return $this->db->get($this->table)->result_array();
    }

    function show_u_article_left_bar()
    {
        $this->db->limit(10);
        $this->db->order_by('article_id', 'DESC');
        return $this->db->get($this->table)->result_array();
    }

    function get_article_number($id)
    {
        $this->db->select('article_open_number');
        $this->db->where('article_id', $id);
        return $this->db->get($this->table)->row_array();
    }

    function add_number($id, $article_number)
    {
        $this->db->where('article_id', $id);
        $this->db->update($this->table, $article_number);
    }

    function show_u_article_populer_left_bar()
    {
        $this->db->limit(10);
        $this->db->order_by('article_open_number', 'DESC');
        return $this->db->get($this->table)->result_array();
    }
}
