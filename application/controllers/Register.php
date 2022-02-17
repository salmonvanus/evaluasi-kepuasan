<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {

	function __construct(){
        parent::__construct();
				$this->load->model('Data_user');
				$this->load->helper(array('form'));
				//load model

    }
		public function index(){
			$this->load->view('register');
		}

		public function insert_user(){
			// echo "Sukses";
			$user_name 					= $this->input->post('username');
			$data['user_name']			= $this->input->post('username');
			$data['user_full_name']		= $this->input->post('full_name');
			$data['user_nik']			= $this->input->post('nik');
			$data['user_npwp']			= $this->input->post('npwp');
			$data['user_phone_number']	= $this->input->post('phone_number');
			$data['user_password']		= $this->input->post('password');
			$data['user_level']			= 'pengusaha';
				
			// echo "<pre>";
			// echo print_r($data);
			// echo "</pre>";
			// (die);
			
			$check=0;
			$check_username = $this->Data_user->check_username_tambah($user_name);
			
			foreach ($check_username as $row) {
				$check++;
			}
			if ($check>0) {
				// $this->session->set_flashdata("welcome", "info");
				$this->session->set_flashdata("fail_regist", "Gagal");
				redirect('register');
			}
			else {
				$this->Data_user->insert($data);
				$this->session->set_flashdata("insert_regist","Berhasil");
				redirect('register');
			}
		}
	}


