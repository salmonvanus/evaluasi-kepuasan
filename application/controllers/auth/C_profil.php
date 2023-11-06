<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_profil extends CI_Controller
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
        $data['name']       = $this->session->userdata('name');
        $data['parent']     = 'Profil';
        $data['display']    = 'Profil';
        $data['level'][0]   = "Menu";
        $data['href'][0]    = "";
        $data['level'][1]   = "Profil";
        $data['href'][1]    = "";
        $data['user']       = $this->db->get_where('auth_user', ['username' => $this->session->userdata('username')])->row_array();
        $data['id']         = $this->session->userdata('id');
        $id_admin           = $data['id'];
        $data['profil']    = $this->tabel_pengguna->show_profil($id_admin);

        // var_dump($data);
        // die;

        $this->load->view('auth/profil', $data);
    }

    public function get($id)
    {
        $data = $this->tabel_pengguna->get_profil($id);
        echo json_encode($data);
    }

    public function edit_profil()
    {
        $id['id']               = $this->input->post('ed_id');
        $data['name']           = $this->input->post('ed_name');
        $data_img['image']      = $this->input->post('add_images');
        $image                  = $data_img['image'];

        if ($image != " ") {
            $config['upload_path']          = './assets/uploads/images/';
            $config['allowed_types']        = 'jpg|png|jpeg';
            $config['overwrite']            = true;
            $config['max_size']             = 10000;

            $this->upload->initialize($config);

            if ($this->upload->do_upload('add_images')) {
                $file_image         = $this->upload->data();
                $images['image']    = $file_image['file_name'];

                // var_dump($id, $data, $image);
                // die;

                $this->tabel_pengguna->edit_image($id, $images);
                $this->tabel_pengguna->edit_profil($id, $data);
                $this->session->set_flashdata('success', "Data Berhasil Diubah!");
                redirect('admin/profil');
            } else {
                $this->tabel_pengguna->edit_profil($id, $data);
                $this->session->set_flashdata('success', "Data Berhasil Diubah!");
                redirect('admin/profil');
            }
        } else if ($image == " ") {
            $this->tabel_pengguna->edit_profil($id, $data);
            $this->session->set_flashdata('success', "Data Berhasil Diubah!");
            redirect('admin/profil');
        }
    }

    public function changepassword()
    {

        //userdata
        $data['username']   = $this->session->userdata('username');
        $data['parent']     = 'Profil';
        $data['display']    = 'Profil';
        $data['level'][0]   = "Menu";
        $data['href'][0]    = "";
        $data['level'][1]   = "Profil";
        $data['href'][1]    = "";
        $data['user']       = $this->db->get_where('auth_user', ['username' => $this->session->userdata('username')])->row_array();
        $data['id']         = $this->session->userdata('id');
        $id_admin           = $data['id'];
        $data['profil']     = $this->tabel_pengguna->show_profil($id_admin);

        $id_user            = $this->input->post('ed_id');
        $current_password   = $this->input->post('ed_current_password');

        $cek_id = $this->tabel_pengguna->get_profil($id_user);

        // var_dump($cek_id);
        // die;

        if ($cek_id != " ") {
            if (password_verify($current_password, $cek_id['password'])) {

                $new_password       = $this->input->post('ed_new_password');
                $id['id']           = $this->input->post('ed_id');
                $new_password_hash  = password_hash($new_password, PASSWORD_DEFAULT);
                $pass['password']   = $new_password_hash;

                $this->tabel_pengguna->edit_profil($id, $pass);
                $this->session->set_flashdata('success', "Data Berhasil Diubah!");
                redirect('admin/profil');
            } else {
				$this->session->set_flashdata('error', "Gagal! Kata sandi lama tidak sesuai");
                redirect('admin/profil');
            }
        } else {
            $this->session->set_flashdata('error', "Gagal!");
            redirect('admin/profil');
        }
    }
}
