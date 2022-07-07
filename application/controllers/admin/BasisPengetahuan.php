<?php

class BasisPengetahuan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();

        $this->load->model('Data_penyakit');
        $this->load->model('Data_gejala');
        $this->load->model('Data_basis_pengetahuan');
        $this->load->model('Data_admin');

        $this->load->helper(array('file', 'url', 'form'));
        $this->load->library('form_validation');

        if (!($this->session->userdata('username'))) {
            redirect('Login');
        }
    }

    // Menampilkan Daftar Basis Pengetahuan
    public function index()
    {
        $data['username']   = $this->session->userdata('username');
        $data['title']      = 'Basis Pengetahuan | Sistem Pakar Penyakit Sinusitis ';
        $data['title_name'] = 'Daftar Basis Pengetahuan';
        $data['user']       = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['footer']     = ' <span class="text-muted d-none d-sm-inline-block float-right"></span>';
        $data['id']         = $this->session->userdata('id');
        $id_admin           = $data['id'];
        $data['profile']    = $this->Data_admin->show_profile($id_admin);

        $data['basis_pengetahuan']  = $this->Data_basis_pengetahuan->daftar_basis_pengetahuan();
        $data['penyakit']           = $this->Data_penyakit->daftar_penyakit();
        $data['gejala']             = $this->Data_gejala->daftar_gejala();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/side_bar');
        $this->load->view('admin/basispengetahuan', $data);
        $this->load->view('templates/footer', $data);
    }

    // Ambil ID Basis Pengetahuan
    public function get($id)
    {
        $data = $this->Data_basis_pengetahuan->ambil_basis_pengetahuan($id);
        echo json_encode($data);
    }

    // Tambah Data Basis Pengetahuan
    public function tambah_basis_pengetahuan()
    {
        $data['id_penyakit']  = $this->input->post('add_id_penyakit');
        $data['id_gejala']    = $this->input->post('add_id_gejala');
        $data['cf_pakar_basis_pengetahuan']    = $this->input->post('add_cf_pakar_basis_pengetahuan');

        $this->Data_basis_pengetahuan->tambah($data);

        $this->session->flashdata(
            'message',
            '<div class="alert alert-info alert-dismissible fade show" role="alert">
                 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                 <span aria-hidden="true"><i class="mdi mdi-close"></i></span>
                 </button>
                 <strong>Selamat!</strong> Data berhasil ditambah.
                 </div>'
        );

        redirect('admin/BasisPengetahuan');
    }

    // Edit Data Basis Pengetahuan
    public function edit_basis_pengetahuan()
    {
        $id['id_basis_pengetahuan']         = $this->input->post('ed_id_basis_pengetahuan');
        $data['id_penyakit']                = $this->input->post('ed_id_penyakit');
        $data['id_gejala']                  = $this->input->post('ed_id_gejala');
        $data['cf_pakar_basis_pengetahuan'] = $this->input->post('ed_cf_pakar_basis_pengetahuan');

        $this->Data_basis_pengetahuan->ubah($id, $data);

        $this->session->set_flashdata(
            'message',
            '<div class="alert alert-info alert-dismissible fade show" role="alert">
                 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                 <span aria-hidden="true"><i class="mdi mdi-close"></i></span>
                 </button>
                 <strong>Selamat!</strong> Data berhasil diubah.
                 </div>'
        );

        redirect('admin/BasisPengetahuan');
    }

    // Hapus Data Basis Pengetahuan
    public function hapus_basis_pengetahuan()
    {
        $id['id_basis_pengetahuan']  = $this->input->post('del_id_basis_pengetahuan');

        $this->Data_basis_pengetahuan->hapus($id);

        $this->session->set_flashdata(
            'message',
            '<div class="alert alert-info alert-dismissible fade show" role="alert">
                 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                 <span aria-hidden="true"><i class="mdi mdi-close"></i></span>
                 </button>
                 <strong>Selamat!</strong> Data berhasil dihapus.
                 </div>'
        );

        redirect('admin/BasisPengetahuan');
    }
}
