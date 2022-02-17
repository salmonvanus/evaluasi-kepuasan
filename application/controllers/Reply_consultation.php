<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Reply_consultation extends CI_Controller
{

    function __construct()
    {
        parent::__construct();

        $this->load->model('Data_consultation');
        $this->load->model('Data_user_consultation');
        //Load model


        $this->load->helper(array('file', 'url', 'form'));
        $this->load->library('form_validation');
    }

    public function index($user_id, $consultation_id)
    {
        // echo $user_id;
        // echo $consultation_id;
        // die;
        $data['user']               = $this->Data_user_consultation->get_user($user_id);
        $data['consultation_title'] = $this->Data_consultation->get_consultation($consultation_id);
        $data['consultation']       = $this->Data_consultation->show_reply_wa_consultation($user_id, $consultation_id);

        $this->load->view('user/reply_consultation', $data);
        $this->load->view('templates_user/footer');
    }
}
