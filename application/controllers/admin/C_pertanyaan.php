<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_pertanyaan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();

        $this->load->model('auth/tabel_pengguna');
        $this->load->model('data/tabel_pertanyaan');
        $this->load->model('data/tabel_layanan');
        // load model

        $this->load->helper(array('form', 'file', 'url'));
        if (!($this->session->userdata('username'))) {
            redirect('login');
        }
    }

    public function index()
    {
        $data['username']   = $this->session->userdata('username');
        $data['parent']     = 'Daftar Pertanyaan';
        $data['display']    = 'Daftar Pertanyaan';
        $data['level'][0]   = "Menu";
        $data['href'][0]    = "";
        $data['level'][1]   = "Daftar Pertanyaan";
        $data['href'][1]    = "";
        $data['user']       = $this->db->get_where('auth_user', ['username' => $this->session->userdata('username')])->row_array();
        $data['id']         = $this->session->userdata('id');
        $id_admin           = $data['id'];
        $data['profil']     = $this->tabel_pengguna->show_profil($id_admin);
        $data['pertanyaan'] = $this->tabel_pertanyaan->all();
        $data['layanan']    = $this->tabel_layanan->all();

        // var_dump($data);
        // die;

        $this->load->view('admin/pertanyaan', $data);

    }

    public function get($id)
    {
        $data = $this->tabel_pertanyaan->get($id);
        echo json_encode($data);
    }

    public function create()
    {
        $data['id_layanan']         = $this->input->post('add_id_layanan');
        $data['jenis_pertanyaan']   = $this->input->post('add_jenis_pertanyaan');
        $data['pertanyaan']         = $this->input->post('add_pertanyaan');

        $this->tabel_pertanyaan->create($data);
        $this->session->set_flashdata('success', "Data Berhasil Ditambah!");
        redirect('admin/pertanyaan');
    }

    public function edit()
    {
        $id['id']                   = $this->input->post('ed_id');
        $data['jenis_pertanyaan']   = $this->input->post('ed_jenis_pertanyaan');
        $data['pertanyaan']         = $this->input->post('ed_pertanyaan');

        $this->tabel_pertanyaan->edit($id, $data);
        $this->session->set_flashdata('success', "Data Berhasil Diubah!");

        redirect('admin/pertanyaan');
    }

   
}
