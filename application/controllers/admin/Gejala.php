<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Gejala extends CI_Controller
{

    function __construct()
    {
        parent::__construct();

        $this->load->model('Data_gejala');
        $this->load->model('Data_admin');

        $this->load->helper(array('file', 'url', 'form'));
        $this->load->library('form_validation');

        if (!($this->session->userdata('username'))) {
            redirect('Login');
        }
    }

    // Menampilkan Daftar Gejala
    public function index()
    {
        $data['username']   = $this->session->userdata('username');
        $data['title']      = 'Gejala | Sistem Pakar Penyakit Sinusitis ';
        $data['title_name'] = 'Daftar Gejala';
        $data['user']       = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['footer']     = ' <span class="text-muted d-none d-sm-inline-block float-right"></span>';
        $data['id']         = $this->session->userdata('id');
        $id_admin           = $data['id'];
        $data['profile']    = $this->Data_admin->show_profile($id_admin);

        $data['gejala']               = $this->Data_gejala->daftar_gejala();
        $kode_gejala                  = $this->Data_gejala->ambil_kode_gejala_terakhir();
        $data['kode_gejala_terakhir'] = $kode_gejala['kode_gejala'];

        // var_dump($data['kode_gejala_terakhir']);
        // die;
        $this->load->view('templates/header', $data);
        $this->load->view('templates/side_bar');
        $this->load->view('admin/gejala', $data);
        $this->load->view('templates/footer', $data);
    }

    // Ambil ID Gejala
    public function get($id)
    {
        $data = $this->Data_gejala->ambil_gejala($id);
        echo json_encode($data);
    }

    // Tambah Data Gejala
    public function tambah_gejala()
    {
        $data['kode_gejala']  = $this->input->post('add_kode_gejala');
        $data['nama_gejala']  = $this->input->post('add_nama_gejala');
        $data['cf_pakar']     = $this->input->post('add_cf_pakar');

        $this->Data_gejala->tambah($data);

        $this->session->flashdata(
            'message',
            '<div class="alert alert-info alert-dismissible fade show" role="alert">
                 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                 <span aria-hidden="true"><i class="mdi mdi-close"></i></span>
                 </button>
                 <strong>Selamat!</strong> Data berhasil ditambah.
                 </div>'
        );

        redirect('admin/Gejala');
    }

    // Edit Data Gejala
    public function edit_gejala()
    {
        $id['id_gejala']      = $this->input->post('ed_id_gejala');
        $data['nama_gejala']  = $this->input->post('ed_nama_gejala');
        $data['cf_pakar']     = $this->input->post('ed_cf_pakar');

        $this->Data_gejala->ubah($id, $data);

        $this->session->set_flashdata(
            'message',
            '<div class="alert alert-info alert-dismissible fade show" role="alert">
                 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                 <span aria-hidden="true"><i class="mdi mdi-close"></i></span>
                 </button>
                 <strong>Selamat!</strong> Data berhasil diubah.
                 </div>'
        );
        redirect('admin/Gejala');
    }

    // Hapus Data Gejala
    public function hapus_gejala()
    {
        $id['id_gejala']  = $this->input->post('del_id_gejala');

        $this->Data_gejala->hapus($id);

        $this->session->set_flashdata(
            'message',
            '<div class="alert alert-info alert-dismissible fade show" role="alert">
                 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                 <span aria-hidden="true"><i class="mdi mdi-close"></i></span>
                 </button>
                 <strong>Selamat!</strong> Data berhasil dihapus.
                 </div>'
        );

        redirect('admin/Gejala');
    }
}
