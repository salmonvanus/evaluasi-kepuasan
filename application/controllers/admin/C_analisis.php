<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_analisis extends CI_Controller
{

    function __construct()
    {
        parent::__construct();

        $this->load->model('auth/tabel_pengguna');
        $this->load->model('data/tabel_responden_harapan');
        $this->load->model('data/tabel_responden_persepsi');
        $this->load->model('data/tabel_layanan');
        $this->load->model('data/tabel_biodata_responden');
        $this->load->model('data/tabel_pertanyaan');

        $this->load->helper(array('file', 'url', 'form'));
        $this->load->library('form_validation');
        $this->load->library('image_lib');


        if (!($this->session->userdata('username'))) {
            redirect('login');
        }
    }

    // Menampilkan Halaman Awal Admin
    public function index()
    {
        $data['username']   = $this->session->userdata('username');
        $data['parent']     = 'Analisis';
        $data['display']    = 'Analisis';
        $data['level'][0]   = "Menu";
        $data['href'][0]    = "";
        $data['level'][1]   = "Analisis";
        $data['href'][1]    = "";
        $data['user']       = $this->db->get_where('auth_user', ['username' => $this->session->userdata('username')])->row_array();
        $data['id']         = $this->session->userdata('id');
        $id_admin           = $data['id'];
        $data['profil']     = $this->tabel_pengguna->show_profil($id_admin);

        $data['layanan']    = $this->tabel_layanan->all();
        // var_dump($data);
        // die;

        $this->load->view('admin/analisis', $data);

    }

    public function show_hasil_analisis() 
    {
        $data['username']   = $this->session->userdata('username');
        $data['parent']     = 'Analisis';
        $data['display']    = 'Analisis';
        $data['level'][0]   = "Menu";
        $data['href'][0]    = "";
        $data['level'][1]   = "Analisis";
        $data['href'][1]    = "";
        $data['user']       = $this->db->get_where('auth_user', ['username' => $this->session->userdata('username')])->row_array();
        $data['id']         = $this->session->userdata('id');
        $id_admin           = $data['id'];
        $data['profil']     = $this->tabel_pengguna->show_profil($id_admin);

        $id_layanan['id_layanan']       = $this->input->post('layanan_id');
        $data['pertanyaan_harapan']     = $this->tabel_pertanyaan->get_pertanyaan_harapan_by_id_layanan($id_layanan);
        $data['pertanyaan_persepsi']    = $this->tabel_pertanyaan->get_pertanyaan_persepsi_by_id_layanan($id_layanan);
        $data['responden_layanan']      = $this->tabel_biodata_responden->getRespondenByIdLayanan($id_layanan);
        $data['count_responden_layanan'] = count($data['responden_layanan']);
        $data['sum_nilai_harapan']       = $this->tabel_responden_harapan->sum_nilai_harapan();
        $data['sum_nilai_persepsi']      = $this->tabel_responden_persepsi->sum_nilai_persepsi();

        // var_dump($data);
        // die;
        $this->load->view('admin/hasil_analisis', $data);
    }
}
