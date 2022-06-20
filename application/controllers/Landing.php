<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Landing extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->load->helper(array('url', 'file', 'form'));
        $this->load->library('form_validation');
    }

    public function index()
    {
        $this->load->view('templates_landing/header');
        $this->load->view('user/index');
        $this->load->view('templates_landing/footer');
    }
}
