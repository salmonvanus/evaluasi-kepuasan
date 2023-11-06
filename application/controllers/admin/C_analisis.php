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
        $data['parent']     = 'Analisis';
        $data['display']    = 'Analisis';
        $data['level'][0]   = "Menu";
        $data['href'][0]    = "";
        $data['level'][1]   = "Analisis";
        $data['href'][1]    = "";
        $data['user']       = $this->db->get_where('auth_user', ['username' => $this->session->userdata('username')])->row_array();
        $data['id']         = $this->session->userdata('id');
        $id_admin           = $data['id'];
        $data['profil']    = $this->tabel_pengguna->show_profil($id_admin);


        // var_dump($data);
        // die;

        $this->load->view('admin/analisis', $data);

    }
}
