<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_session_destroy extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->load->helper(array('url', 'file', 'form'));
        $this->load->library('form_validation');
    }

    public function index()
    {
        session_start();
        session_destroy();
    }
}
