<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Landing extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->load->model('Data_faq');
        $this->load->model('Data_category');
        $this->load->model('Data_video');

        $this->load->helper(array('url', 'file', 'form'));
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['category']            = $this->Data_category->show_category();

        $data['faq']                 = $this->Data_faq->show_faq_for_user();
        $data['consultation_respon'] = $this->Data_faq->show_consultation_respon();
        $data['video']               = $this->Data_video->show_video_on_user();

        $data['activePage'] = basename($_SERVER['PHP_SELF'], ".php");
        // var_dump($data['activePage']);
        // die;
        $this->load->view('templates_user/header');
        $this->load->view('user/index', $data);
        $this->load->view('templates_user/footer');
    }

    public function detail_consultation_category($id)
    {
        // echo $id;
        $data['consultation_category'] = $this->Data_faq->show_detail_consultation_category($id);
        $data['category_name']         = $this->Data_category->get_category($id);
        // var_dump($data);
        // die;

        $this->load->view('user/category_faq', $data);
        $this->load->view('templates_user/footer');
    }
}
