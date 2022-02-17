<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_consultation extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        //load model
        $this->load->model('Data_user_consultation');
        $this->load->model('Data_consultation');
        $this->load->model('Data_respon_consultation');
        $this->load->model('Data_admin');
        $this->load->model('Data_category');

        $this->load->helper(array('form', 'url', 'file'));
        if (!($this->session->userdata('username'))) {
            redirect('Login');
        }
    }

    public function index()
    {
        //userdata
        $data['username']   = $this->session->userdata('username');
        $data['title']      = 'Admin Panel | Konsultasi Hukum';
        $data['title_name'] = 'Konsultasi';
        $data['user']       = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['footer']     = 'Powered by Cleverlabs Indonesia <span class="text-muted d-none d-sm-inline-block float-right"></span>';
        $data['id']         = $this->session->userdata('id');
        $id_admin           = $data['id'];
        $data['profile']    = $this->Data_admin->show_profile($id_admin);


        $data['consultation'] = $this->Data_consultation->show_unrespon_consultation();
        // testing output

        // var_dump($data);
        // die;

        $this->load->view('templates/header', $data);
        $this->load->view('templates/side_bar');
        $this->load->view('admin/admin_consultation_unrespon', $data);
        $this->load->view('templates/footer');
    }

    public function show_consultation()
    {
        $data['username']   = $this->session->userdata('username');
        $data['title']      = 'Admin Panel | Konsultasi Hukum';
        $data['title_name'] = 'Konsultasi';
        $data['user']       = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['footer']     = 'Powered by Cleverlabs Indonesia <span class="text-muted d-none d-sm-inline-block float-right"></span>';
        $data['id']         = $this->session->userdata('id');
        $id_admin           = $data['id'];
        $data['profile']    = $this->Data_admin->show_profile($id_admin);

        $data['consultation']   = $this->Data_consultation->show_respon_consultation();

        // var_dump($data['consultation']);
        // die;

        $this->load->view('templates/header', $data);
        // $this->load->view('templates/top_bar', $data);
        $this->load->view('templates/side_bar');
        $this->load->view('admin/admin_consultation_respon', $data);
        $this->load->view('templates/footer');
    }

    public function read_consultation($id)
    {
        //userdata
        $data['username']   = $this->session->userdata('username');
        $data['title']      = 'Admin Panel | Konsultasi Hukum';
        $data['user']       = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['footer']     = 'Powered by Cleverlabs Indonesia <span class="text-muted d-none d-sm-inline-block float-right"></span>';
        $data['id']         = $this->session->userdata('id');
        $id_admin           = $data['id'];
        $data['profile']    = $this->Data_admin->show_profile($id_admin);


        $data['read_consultation'] = $this->Data_consultation->get_consultation($id);
        // var_dump($data['read_consultation']);
        // die;

        $this->load->view('templates/header', $data);
        // $this->load->view('templates/top_bar', $data);
        $this->load->view('templates/side_bar');
        $this->load->view('admin/admin_read_consultation', $data);
        $this->load->view('templates/footer');
    }

    public function detail_consultation($id)
    {
        //userdata
        $data['username']   = $this->session->userdata('username');
        $data['title']      = 'Admin Panel | Konsultasi Hukum';
        $data['user']       = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['footer']     = 'Powered by Cleverlabs Indonesia <span class="text-muted d-none d-sm-inline-block float-right"></span>';
        $data['id']         = $this->session->userdata('id');
        $id_admin           = $data['id'];
        $data['profile']    = $this->Data_admin->show_profile($id_admin);

        $data['detail_consultation']        = $this->Data_consultation->detail_consultation($id);
        $data['detail_consultation_row']    = $this->Data_consultation->detail_consultation_row($id);
        $data['category']                   = $this->Data_category->show_category();
        // var_dump($data);
        // die;

        $this->load->view('templates/header', $data);
        $this->load->view('templates/side_bar');
        $this->load->view('admin/admin_detail_consultation', $data);
        $this->load->view('templates/footer', $data);
    }

    public function get($id)
    {
        $data = $this->Data_consultation->get_consultation($id);
        //echo "<pre>";echo print_r($data);echo "</pre>";die();
        echo json_encode($data);
    }

    public function reply_consultation()
    {
        $data['consultation_id']            = $this->input->post('rep_consultation_id');
        $id['consultation_id']              = $this->input->post('rep_consultation_id');
        $status['consultation_status']      = 1;
        $data['respon_text']                = $this->input->post('rep_respon_text');
        $data['respon_date_created']        = date("Y-m-d H:i:s");

        $this->Data_respon_consultation->insert_respon($data);
        $this->Data_consultation->edit_status($id, $status);

        $this->session->set_flashdata(
            'message',
            '<div class="alert alert-info alert-dismissible fade show" role="alert">
                 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                 <span aria-hidden="true"><i class="mdi mdi-close"></i></span>
                 </button>
                 <strong>Selamat!</strong> Tanggapan anda berhasil dikirim.
                 </div>'
        );
        redirect('admin/Admin_consultation');
    }

    public function reply_wa_consultation()
    {
        $consultation = array(
            'consultation' => $this->input->post('consultation_text')
        );
        $respon_value          = array(
            'respon' => $this->input->post('respon_text')
        );
        // var_dump($respon_value);
        // die;
        $consultation_text = $consultation['consultation'];
        $respon_text = $respon_value['respon'];
        $wa_number         = $this->input->post('wa_number');
        $consultation_id   = $this->input->post('consultation_id');
        $user_id           = $this->input->post('user_id');

        // $user_consultation = $this->Data_consultation->show_reply_wa_consultation($user_id, $consultation_id);

        $link_tanggapan = 'http://localhost:8888/palakat/Reply_consultation/index/' . $consultation_id . '/' . $user_id;
        // var_dump($user_consultation);
        // die;

        header("location:https://api.whatsapp.com/send?phone=$wa_number&text=Konsultasi:%20$consultation_text%20%0DTanggapan:%20$respon_text%20%0DLink tanggapan:%20$link_tanggapan");
        // var_dump($consultation_text);
        // die;
    }
}
