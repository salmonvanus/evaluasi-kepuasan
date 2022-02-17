<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_respon extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        //load model
        $this->load->model('Data_respon_consultation');

        $this->load->helper(array('form', 'url', 'file'));
        if (!($this->session->userdata('username'))) {
            redirect('Login');
        }
    }

    public function get($id)
    {
        $data = $this->Data_respon_consultation->get_respon($id);
        echo json_encode($data);
    }

    public function add_respon()
    {
        $id                         = $this->input->post('add_consultation_id');
        $data['consultation_id']    = $this->input->post('add_consultation_id');
        $data['respon_text']        = $this->input->post('add_respon_text');
        $data['respon_date_created'] = date("Y-m-d H:i:s");

        // var_dump($data, $id);
        // die;

        $this->Data_respon_consultation->insert_respon($data);

        $this->session->set_flashdata(
            'message',
            '<div class="alert alert-info alert-dismissible fade show" role="alert">
                 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                 <span aria-hidden="true"><i class="mdi mdi-close"></i></span>
                 </button>
                 <strong>Selamat!</strong> Tanggapan anda berhasil dikirim.
                 </div>'
        );

        redirect(base_url('admin/Admin_consultation/detail_consultation/' . $id));
    }

    public function edit_respon()
    {
        $consultation_id        = $this->input->post('consultation_id');
        $respon_id = $this->input->post('ed_respon_id');
        $data['respon_text']    = $this->input->post('ed_respon_text');

        // var_dump($respon_id, $data);
        // die;

        $this->Data_respon_consultation->edit_respon($respon_id, $data);

        $this->session->set_flashdata(
            'message_respon',
            '<div class="alert alert-info alert-dismissible fade show" role="alert">
                 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                 <span aria-hidden="true"><i class="mdi mdi-close"></i></span>
                 </button>
                 <strong>Selamat!</strong> Tanggapan anda berhasil diubah.
                 </div>'
        );

        redirect(base_url('admin/Admin_consultation/detail_consultation/' . $consultation_id));
    }

    public function delete_respon()
    {
        $consultation_id             = $this->input->post('del_consultation_id');
        $respon_id                   = $this->input->post('del_respon_id');
        $this->Data_respon_consultation->delete_respon($respon_id);

        $this->session->set_flashdata(
            'message_respon',
            '<div class="alert alert-info alert-dismissible fade show" role="alert">
                 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                 <span aria-hidden="true"><i class="mdi mdi-close"></i></span>
                 </button>
                 <strong>Selamat!</strong> Tanggapan anda berhasil dihapus.
                 </div>'
        );

        redirect(base_url('admin/Admin_consultation/detail_consultation/' . $consultation_id));
    }
}
