<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Article extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->load->helper(array('file', 'url', 'form'));
        $this->load->library('form_validation');
        $this->load->model('Data_article');
    }

    public function index()
    {
        $data['article'] = $this->Data_article->show_u_article();
        $data['article_side_bar'] = $this->Data_article->show_u_article_left_bar();
        $data['article_populer'] = $this->Data_article->show_u_article_populer_left_bar();
        // var_dump($data);
        // die;
        $this->load->view('user/article', $data);
        $this->load->view('templates_user/footer');
    }

    public function detail_article($id)
    {
        $data['article_side_bar']   = $this->Data_article->show_u_article_left_bar();
        $data['detail_article']     = $this->Data_article->show_u_article_by_id($id);

        $get_article_number = $this->Data_article->get_article_number($id);

        foreach ($get_article_number as $nilai) {
            $count_number = $nilai['article_open_number'] + 1;
        }
        $article_number['article_open_number'] = $count_number;
        $add_number_to_db['article_open_number'] = $this->Data_article->add_number($id, $article_number);

        $data['article_populer'] = $this->Data_article->show_u_article_populer_left_bar();
        // var_dump($data);
        // die;

        $this->load->view('user/detail_article', $data);
        $this->load->view('templates_user/footer');
    }
}
