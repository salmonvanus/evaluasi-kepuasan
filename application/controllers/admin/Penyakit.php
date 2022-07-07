<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Penyakit extends CI_Controller
{

    function __construct()
    {
        parent::__construct();

        $this->load->model('Data_penyakit');
        $this->load->model('Data_admin');

        $this->load->helper(array('file', 'url', 'form'));
        $this->load->library('form_validation');

        if (!($this->session->userdata('username'))) {
            redirect('Login');
        }
    }

    // Menampilkan daftar penyakit
    public function index()
    {
        $data['username']   = $this->session->userdata('username');
        $data['title']      = 'Penyakit | Sistem Pakar Penyakit Sinusitis ';
        $data['title_name'] = 'Daftar Penyakit';
        $data['user']       = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['footer']     = ' <span class="text-muted d-none d-sm-inline-block float-right"></span>';
        $data['id']         = $this->session->userdata('id');
        $id_admin           = $data['id'];
        $data['profile']    = $this->Data_admin->show_profile($id_admin);

        $data['penyakit']               = $this->Data_penyakit->daftar_penyakit();
        $kode_penyakit                  = $this->Data_penyakit->ambil_kode_penyakit_terakhir();
        $data['kode_penyakit_terakhir'] = $kode_penyakit['kode_penyakit'];
        // var_dump($data);
        // die;
        $this->load->view('templates/header', $data);
        $this->load->view('templates/side_bar');
        $this->load->view('admin/penyakit', $data);
        $this->load->view('templates/footer', $data);
    }

    // Ambil ID Penyakit
    public function get($id)
    {
        $data = $this->Data_penyakit->ambil_penyakit($id);
        echo json_encode($data);
    }

    // Tambah Data Penyakit
    public function tambah_penyakit()
    {
        $data['kode_penyakit']  = $this->input->post('add_kode_penyakit');
        $data['nama_penyakit']  = $this->input->post('add_nama_penyakit');

        $this->Data_penyakit->tambah($data);

        $this->session->flashdata(
            'message',
            '<div class="alert alert-info alert-dismissible fade show" role="alert">
                 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                 <span aria-hidden="true"><i class="mdi mdi-close"></i></span>
                 </button>
                 <strong>Selamat!</strong> Data berhasil ditambah.
                 </div>'
        );

        redirect('admin/Penyakit');
    }

    // Edit Data Penyakit
    public function edit_penyakit()
    {
        $id['id_penyakit']      = $this->input->post('ed_id_penyakit');
        $data['nama_penyakit']  = $this->input->post('ed_nama_penyakit');

        $this->Data_penyakit->ubah($id, $data);

        $this->session->set_flashdata(
            'message',
            '<div class="alert alert-info alert-dismissible fade show" role="alert">
                 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                 <span aria-hidden="true"><i class="mdi mdi-close"></i></span>
                 </button>
                 <strong>Selamat!</strong> Data berhasil diubah.
                 </div>'
        );

        redirect('admin/Penyakit');
    }

    // Hapus Data Penyakit
    public function hapus_penyakit()
    {
        $id['id_penyakit']  = $this->input->post('del_id_penyakit');

        $this->Data_penyakit->hapus($id);

        $this->session->set_flashdata(
            'message',
            '<div class="alert alert-info alert-dismissible fade show" role="alert">
                 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                 <span aria-hidden="true"><i class="mdi mdi-close"></i></span>
                 </button>
                 <strong>Selamat!</strong> Data berhasil dihapus.
                 </div>'
        );

        redirect('admin/Penyakit');
    }
}
