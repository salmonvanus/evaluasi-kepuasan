<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_responden extends CI_Controller
{

    function __construct()
    {
        parent::__construct();

        $this->load->model('auth/tabel_pengguna');
        $this->load->model('data/tabel_responden_harapan');
        $this->load->model('data/tabel_responden_persepsi');
        $this->load->model('data/tabel_biodata_responden');
        $this->load->model('data/tabel_layanan');

        $this->load->helper(array('file', 'url', 'form'));
        $this->load->library('form_validation');

        if (!($this->session->userdata('username'))) {
            redirect('login');
        }
    }

    // Menampilkan Halaman Awal Admin
    public function index()
    {
        $data['username']   = $this->session->userdata('username');
        $data['parent']     = 'Responden';
        $data['display']    = 'Responden';
        $data['level'][0]   = "Menu";
        $data['href'][0]    = "";
        $data['level'][1]   = "Responden";
        $data['href'][1]    = "";
        $data['user']       = $this->db->get_where('auth_user', ['username' => $this->session->userdata('username')])->row_array();
        $data['id']         = $this->session->userdata('id');
        $id_admin           = $data['id'];
        $data['profil']    = $this->tabel_pengguna->show_profil($id_admin);

        $data['layanan']    = $this->tabel_layanan->all();
        // var_dump($data);
        // die;

        $this->load->view('admin/responden', $data);

    }

    public function fetchData() {
        $bulan = $this->input->post('bulan');
        $tahun = $this->input->post('tahun');
        $layanan = $this->input->post('layanan');

        $data = $this->tabel_biodata_responden->getData($bulan, $tahun, $layanan);

        echo json_encode(['data' => $data]);
    }

    public function lihatRespondenPengguna($kode_responden)
    {
        $data['username']   = $this->session->userdata('username');
        $data['parent']     = 'Responden';
        $data['display']    = 'Responden';
        $data['level'][0]   = "Menu";
        $data['href'][0]    = "";
        $data['level'][1]   = "Responden";
        $data['href'][1]    = "";

        $data['user']       = $this->db->get_where('auth_user', ['username' => $this->session->userdata('username')])->row_array();
        $data['id']         = $this->session->userdata('id');
        $id_admin           = $data['id'];
        $data['profil']    = $this->tabel_pengguna->show_profil($id_admin);

        $data['responden']                   = $this->tabel_biodata_responden->getRespondenByKodeResponden($kode_responden);
        $data['detail_responden_harapan']    = $this->tabel_responden_harapan->getByKodeResponden($kode_responden);
        $data['detail_responden_persepspi']  = $this->tabel_responden_persepsi->getByKodeResponden($kode_responden);

        // var_dump($data);
        $this->load->view('admin/detail_responden_pengguna', $data);
    }
}
