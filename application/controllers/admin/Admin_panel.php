<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_panel extends CI_Controller
{

    function __construct()
    {
        parent::__construct();

        $this->load->model('Data_consultation');
        $this->load->model('Data_article');
        $this->load->model('Data_admin');

        $this->load->helper(array('form', 'file', 'url'));
        if (!($this->session->userdata('username'))) {
            redirect('Login');
        }
    }

    public function index()
    {
        //userdata
        $data['username']   = $this->session->userdata('username');
        $data['title']      = 'Admin Panel | Dashboard';
        $data['title_name'] = 'Dashboard';
        $data['user']       = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['footer']     = 'Powered by Cleverlabs Indonesia <span class="text-muted d-none d-sm-inline-block float-right"></span>';
        $data['id']         = $this->session->userdata('id');
        $id_admin           = $data['id'];
        $data['profile']    = $this->Data_admin->show_profile($id_admin);


        $data['consultation_total']             = $this->Data_consultation->consultation_total();
        $data['unrespon_total']                 = $this->Data_consultation->unrespon_total();
        $data['respon_total']                   = $this->Data_consultation->respon_total();
        $data['article_total']                  = $this->Data_article->article_total();
        $data['respon_consultation']            = $this->Data_consultation->respon_consultation();
        $data['unrespon_consultation']          = $this->Data_consultation->unrespon_consultation();
        $data['article']                        = $this->Data_article->show_article_dashboard();

        // var_dump($data);
        // die;

        $this->load->view('templates/header', $data);
        $this->load->view('templates/side_bar');
        $this->load->view('admin/admin_dashboard', $data);
        $this->load->view('templates/footer');
    }
}
