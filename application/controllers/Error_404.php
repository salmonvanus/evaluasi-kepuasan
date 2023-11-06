<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Error_404 extends CI_Controller {

	function __construct(){
        parent::__construct();
        
        
    }

	public function index()
	{
		$this->load->view('errors/html/error_404');
	}
}
