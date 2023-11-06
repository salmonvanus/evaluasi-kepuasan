<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_pengguna extends CI_Controller
{
    function __construct()
    {
        parent::__construct();

        $this->load->model('auth/tabel_pengguna');
        // load model

        $this->load->helper(array('form', 'file', 'url'));
        if (!($this->session->userdata('username'))) {
            redirect('login');
        }
    }

    public function index()
    {
        //userdata
        $data['username']   = $this->session->userdata('username');
        $data['parent']     = 'Pengguna';
        $data['display']    = 'Pengguna';
        $data['level'][0]   = "Menu";
        $data['href'][0]    = "";
        $data['level'][1]   = "Pengguna";
        $data['href'][1]    = "";
        $data['user']       = $this->db->get_where('auth_user', ['username' => $this->session->userdata('username')])->row_array();
        $data['id']         = $this->session->userdata('id');
        $id_admin           = $data['id'];
        $data['profil']    = $this->tabel_pengguna->show_profil($id_admin);
        
        $data['pengguna']   = $this->tabel_pengguna->show_all();
        // var_dump($data);
        // die;

        $this->load->view('auth/pengguna', $data);
    }

    public function get($id)
    {
        $data = $this->tabel_pengguna->get_profil($id);
        echo json_encode($data);
    }

}
