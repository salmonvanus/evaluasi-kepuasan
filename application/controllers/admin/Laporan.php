<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Laporan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();

        $this->load->model('Data_hasil_analisa');
        $this->load->model('Data_admin');

        $this->load->helper(array('file', 'url', 'form'));
        $this->load->library('form_validation');

        if (!($this->session->userdata('username'))) {
            redirect('Login');
        }
    }

    public function index()
    {
        $data['username']   = $this->session->userdata('username');
        $data['title']      = 'Beranda | Sistem Pakar Penyakit Sinusitis ';
        $data['title_name'] = 'Beranda';
        $data['user']       = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['footer']     = ' <span class="text-muted d-none d-sm-inline-block float-right"></span>';
        $data['id']         = $this->session->userdata('id');
        $id_admin           = $data['id'];
        $data['profile']    = $this->Data_admin->show_profile($id_admin);

        // $data['hasil_analisa'] = $this->Data_hasil_analisa->show_hasil_analisa();
        // $id_pasien = $data['hasil_analisa'][0]['id_pasien'];

        // var_dump($data);
        // die;

        $this->load->view('templates/header', $data);
        $this->load->view('templates/side_bar');
        $this->load->view('admin/laporan', $data);
        $this->load->view('templates/footer', $data);
    }
}
