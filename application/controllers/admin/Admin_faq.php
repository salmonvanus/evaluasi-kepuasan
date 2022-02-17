<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_faq extends CI_Controller
{

    function __construct()
    {
        parent::__construct();

        //load Model
        $this->load->model('Data_faq');
        $this->load->model('Data_admin');
        $this->load->model('Data_category');
        $this->load->model('Data_consultation');

        $this->load->helper(array('form', 'url', 'file'));
        $this->load->library('form_validation');

        $this->load->helper(array('form', 'url', 'file'));
        if (!($this->session->userdata('username'))) {
            redirect('Login');
        }
    }

    public function index()
    {
        $data['username']   = $this->session->userdata('username');
        $data['title']      = 'Admin Panel | Daftar FAQ';
        $data['title_name'] = 'FAQ';
        $data['user']       = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['footer']     = 'Powered by Cleverlabs Indonesia <span class="text-muted d-none d-sm-inline-block float-right"></span>';
        $data['id']         = $this->session->userdata('id');
        $id_admin = $data['id'];
        $data['profile']    = $this->Data_admin->show_profile($id_admin);

        $count_faq = $data['faq']        = $this->Data_faq->show_faq();



        // var_dump($data);
        // die;

        $this->load->view('templates/header', $data);
        $this->load->view('templates/side_bar', $data);
        $this->load->view('admin/admin_faq', $data, $count_faq);
        $this->load->view('templates/footer', $data);
    }

    public function get($id)
    {
        $data = $this->Data_faq->get_faq($id);
        echo json_encode($data);
    }

    public function add_faq()
    {
        $data['faq_consultation']           = $this->input->post('add_consultation_text');
        $data['faq_respon']                 = $this->input->post('add_respon_text');
        $data['faq_consultation_id']        = $this->input->post('add_consultation_id');
        $data['faq_respon_id']              = $this->input->post('add_respon_id');
        $data['faq_category_consultation_id']  = $this->input->post('add_category_id');

        $consultation_id = $data['faq_consultation_id'];
        $cek_consultation_id    = $this->Data_faq->cek_consultation_id($consultation_id);

        if ($cek_consultation_id != null) {
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                 <span aria-hidden="true"><i class="mdi mdi-close"></i></span>
                 </button>
                 <strong>Gagal!</strong> Konsultasi sudah pernah di masukkan di FAQ.
                 </div>'
            );
            redirect('admin/Admin_faq');
        } else {
            $id['consultation_id'] = $data['faq_consultation_id'];
            $status_faq['consultation_status_faq'] = 1;

            $this->Data_faq->insert_faq($data);
            $this->Data_consultation->edit_consultation_status_faq($id, $status_faq);

            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-info alert-dismissible fade show" role="alert">
                 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                 <span aria-hidden="true"><i class="mdi mdi-close"></i></span>
                 </button>
                 <strong>Selamat!</strong> Konsultasi berhasil di masukkan ke FAQ.
                 </div>'
            );
            redirect('admin/Admin_faq');
        }
    }

    public function edit_faq()
    {

        $faq_id['faq_id']           = $this->input->post('ed_faq_id');
        $data['faq_consultation']   = $this->input->post('ed_faq_consultation');
        $data['faq_respon']         = $this->input->post('ed_faq_respon');

        // var_dump($faq_id, $data);
        // die;

        $this->Data_faq->edit_faq($faq_id, $data);

        $this->session->set_flashdata(
            'message',
            '<div class="alert alert-info alert-dismissible fade show" role="alert">
                 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                 <span aria-hidden="true"><i class="mdi mdi-close"></i></span>
                 </button>
                 <strong>Selamat!</strong> Data FAQ berhasil diubah.
                 </div>'
        );
        redirect('admin/Admin_faq');
    }

    public function delete_faq()
    {
        $faq_id['faq_id']           = $this->input->post('del_faq_id');

        $this->Data_faq->delete_faq($faq_id);

        $this->session->set_flashdata(
            'message',
            '<div class="alert alert-info alert-dismissible fade show" role="alert">
                 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                 <span aria-hidden="true"><i class="mdi mdi-close"></i></span>
                 </button>
                 <strong>Selamat!</strong> Data FAQ berhasil dihapus.
                 </div>'
        );
        redirect('admin/Admin_faq');
    }
}
