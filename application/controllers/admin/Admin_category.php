<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_category extends CI_Controller
{

    function __construct()
    {
        parent::__construct();

        $this->load->model('Data_category');
        $this->load->model('Data_admin');

        $this->load->helper(array('file', 'url', 'form'));
        $this->load->library('form_validation');

        if (!($this->session->userdata('username'))) {
            redirect('Login');
        }
    }

    public function index()
    {
        $data['username']   = $this->session->userdata('username');
        $data['title']      = 'Admin Panel | Topik Hukum ';
        $data['title_name'] = 'Topik Hukum';
        $data['user']       = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['footer']     = 'Powered by Cleverlabs Indonesia <span class="text-muted d-none d-sm-inline-block float-right"></span>';
        $data['id']         = $this->session->userdata('id');
        $id_admin           = $data['id'];
        $data['profile']    = $this->Data_admin->show_profile($id_admin);

        $data['category'] = $this->Data_category->show_category();

        // var_dump($data);
        // die;

        $this->load->view('templates/header', $data);
        $this->load->view('templates/side_bar');
        $this->load->view('admin/admin_category', $data);
        $this->load->view('templates/footer', $data);
    }

    public function get($id)
    {
        $data = $this->Data_category->get_category($id);
        echo json_encode($data);
    }

    public function insert_category()
    {
        $data['category_name']  = $this->input->post('add_category_name');

        // $cek_category = $this->Data_category->cek_category($data);

        // var_dump($cek_category);
        // die;

        $this->Data_category->insert($data);

        $this->session->flashdata(
            'message',
            '<div class="alert alert-info alert-dismissible fade show" role="alert">
                 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                 <span aria-hidden="true"><i class="mdi mdi-close"></i></span>
                 </button>
                 <strong>Selamat!</strong> Data berhasil ditambah.
                 </div>'
        );

        redirect('admin/Admin_category/');
    }

    public function edit_category()
    {
        $id['category_id']      = $this->input->post('ed_category_id');
        $data['category_name']  = $this->input->post('ed_category_name');

        $this->Data_category->edit($id, $data);

        $this->session->set_flashdata(
            'message',
            '<div class="alert alert-info alert-dismissible fade show" role="alert">
                 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                 <span aria-hidden="true"><i class="mdi mdi-close"></i></span>
                 </button>
                 <strong>Selamat!</strong> Data berhasil diubah.
                 </div>'
        );

        redirect('admin/Admin_category/');
    }

    public function delete_category()
    {
        $id['category_id']  = $this->input->post('del_category_id');

        $this->Data_category->delete($id);

        $this->session->set_flashdata(
            'message',
            '<div class="alert alert-info alert-dismissible fade show" role="alert">
                 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                 <span aria-hidden="true"><i class="mdi mdi-close"></i></span>
                 </button>
                 <strong>Selamat!</strong> Data berhasil dihapus.
                 </div>'
        );

        redirect('admin/Admin_category/');
    }
}
