<?php

class Aturan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();

        $this->load->model('Data_admin');
        $this->load->model('Data_penyakit');
        $this->load->model('Data_basis_pengetahuan');

        $this->load->helper(array('file', 'url', 'form'));
        $this->load->library('form_validation');

        if (!($this->session->userdata('username'))) {
            redirect('Login');
        }
    }

    // Menampilkan Daftar Aturan
    public function index()
    {
        $data['username']   = $this->session->userdata('username');
        $data['title']      = 'Aturan | Sistem Pakar Penyakit Sinusitis ';
        $data['title_name'] = 'Aturan Dari Metode Foward Chaining';
        $data['user']       = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['footer']     = ' <span class="text-muted d-none d-sm-inline-block float-right"></span>';
        $data['id']         = $this->session->userdata('id');
        $id_admin           = $data['id'];
        $data['profile']    = $this->Data_admin->show_profile($id_admin);

        $data['hitung_penyakit'] = $this->Data_penyakit->total_penyakit();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/side_bar');
        $this->load->view('admin/aturan', $data);
        $this->load->view('templates/footer', $data);
    }
}
