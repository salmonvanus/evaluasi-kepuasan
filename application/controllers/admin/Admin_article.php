<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_article extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        //load model
        $this->load->model('Data_article');
        $this->load->model('Data_admin');

        $this->load->helper(array('form', 'url', 'file'));
        if (!($this->session->userdata('username'))) {
            redirect('Login');
        }
    }

    public function show_article()
    {
        //userdata
        $data['username']   = $this->session->userdata('username');
        $data['title']      = 'Admin Panel | Artikel Hukum';
        $data['title_name'] = 'Artikel';
        $data['user']       = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['footer']     = 'Powered by Cleverlabs Indonesia <span class="text-muted d-none d-sm-inline-block float-right"></span>';
        $data['id']         = $this->session->userdata('id');
        $id_admin = $data['id'];
        $data['profile']    = $this->Data_admin->show_profile($id_admin);


        $data['article'] = $this->Data_article->show_article();
        // testing output

        // var_dump($data['article']);
        // die;

        $this->load->view('templates/header', $data);
        // $this->load->view('templates/top_bar', $data);
        $this->load->view('templates/side_bar');
        $this->load->view('admin/admin_article', $data);
        $this->load->view('templates/footer');
    }

    public function get($id)
    {
        $data = $this->Data_article->get_article($id);
        echo json_encode($data);
    }

    public function insert_article()
    {

        $data['article_title']          = $this->input->post('add_article_title');
        $data['article_content']        = $this->input->post('add_article_content');
        $data['article_status']         = $this->input->post('add_article_status');
        $data['user_id']                = $this->session->userdata('id');
        $data['article_date_publish']   = date("Y-m-d H:i:s");

        // var_dump($data);
        // die;

        $config['upload_path']          = './assets/images/artikel/';
        $config['allowed_types']        = 'jpg|png|jpeg';
        $config['overwrite']            = true;
        $config['max_size']             = 5000;

        $this->upload->initialize($config);
        // $this->load->library('upload', $config);

        if ($this->upload->do_upload('add_article_image')) {

            $file_image                         = $this->upload->data();
            $data['article_image']              = $file_image['file_name'];

            $this->Data_article->insert($data);

            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-info alert-dismissible fade show" role="alert">
                 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                 <span aria-hidden="true"><i class="mdi mdi-close"></i></span>
                 </button>
                 <strong>Selamat!</strong> Data yang anda masukkan berhasil ditambahkan.
                 </div>'
            );

            redirect('admin/Admin_article/show_article');
        } else {
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                 <span aria-hidden="true"><i class="mdi mdi-close"></i></span>
                 </button>
                 <strong>Gagal!</strong> Format foto yang anda masukkan salah.
                 </div>'
            );
            redirect('admin/Admin_article/show_article');
        }
    }

    public function edit_article()
    {
        $article_id                     = $this->input->post('ed_article_id');
        $data['article_title']          = $this->input->post('ed_article_title');
        $data['article_content']        = $this->input->post('ed_article_content');
        $data['article_status']         = $this->input->post('ed_article_status');
        $data['article_date_modified']  = date("Y-m-d H:i:s");
        $data['user_id']                = $this->input->post('ed_user_id');

        $this->Data_article->edit($article_id, $data);

        $this->session->set_flashdata(
            'message',
            '<div class="alert alert-info alert-dismissible fade show" role="alert">
                 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                 <span aria-hidden="true"><i class="mdi mdi-close"></i></span>
                 </button>
                 <strong>Selamat!</strong> Data berhasil diubah.
                 </div>'
        );

        redirect('admin/Admin_article/show_article');
    }

    public function delete_article()
    {
        $article_id         = $this->input->post('del_article_id');

        $this->Data_article->delete($article_id);

        $this->session->set_flashdata(
            'message',
            '<div class="alert alert-info alert-dismissible fade show" role="alert">
                 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                 <span aria-hidden="true"><i class="mdi mdi-close"></i></span>
                 </button>
                 <strong>Selamat!</strong> Data berhasil dihapus.
                 </div>'
        );

        redirect('admin/Admin_article/show_article');
    }
}
