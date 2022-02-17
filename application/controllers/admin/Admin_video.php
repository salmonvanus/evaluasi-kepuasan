<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Admin_video extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->load->model('Data_video');
        $this->load->model('Data_admin');

        $this->load->helper(array('url', 'file', 'form'));
        $this->load->library('form_validation');

        $this->load->helper(array('form', 'url', 'file'));
        if (!($this->session->userdata('username'))) {
            redirect('Login');
        }
    }

    public function index()
    {
        $data['username']   = $this->session->userdata('username');
        $data['title']      = 'Admin Panel | Artikel Hukum';
        $data['title_name'] = 'Video';
        $data['user']       = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['footer']     = 'Powered by Cleverlabs Indonesia <span class="text-muted d-none d-sm-inline-block float-right"></span>';
        $data['id']         = $this->session->userdata('id');
        $id_admin = $data['id'];
        $data['profile']    = $this->Data_admin->show_profile($id_admin);

        $data['video']  = $this->Data_video->show_video();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/side_bar');
        $this->load->view('admin/admin_video', $data);
        $this->load->view('templates/footer');
    }

    public function get($id)
    {
        $data = $this->Data_video->get_video($id);
        echo json_encode($data);
    }

    public function insert_video()
    {
        $data['video_link'] = $this->input->post('add_video_link');

        $this->Data_video->insert_video($data);

        $this->session->flashdata(
            'message',
            '<div class="alert alert-info alert-dismissible fade show" role="alert">
                 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                 <span aria-hidden="true"><i class="mdi mdi-close"></i></span>
                 </button>
                 <strong>Selamat!</strong> Data berhasil ditambah.
                 </div>'
        );

        redirect('admin/Admin_video/');
    }

    public function edit_video()
    {
        $id['video_id']     = $this->input->post('ed_video_id');
        $data['video_link'] = $this->input->post('ed_video_link');

        $this->Data_video->edit_video($id, $data);

        $this->session->flashdata(
            'message',
            '<div class="alert alert-info alert-dismissible fade show" role="alert">
                 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                 <span aria-hidden="true"><i class="mdi mdi-close"></i></span>
                 </button>
                 <strong>Selamat!</strong> Data berhasil ditambah.
                 </div>'
        );

        redirect('admin/Admin_video/');
    }

    public function delete_video()
    {
        $id['video_id'] = $this->input->post('del_video_id');

        $this->Data_video->delete_video($id);

        $this->session->flashdata(
            'message',
            '<div class="alert alert-info alert-dismissible fade show" role="alert">
                 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                 <span aria-hidden="true"><i class="mdi mdi-close"></i></span>
                 </button>
                 <strong>Selamat!</strong> Data berhasil ditambah.
                 </div>'
        );

        redirect('admin/Admin_video/');
    }
}
