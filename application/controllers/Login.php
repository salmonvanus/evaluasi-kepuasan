<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();

		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
	}

	public function index()
	{

		if ($this->session->userdata('username')) {
			redirect('admin/Admin_panel');
		}

		$this->form_validation->set_rules('username', 'Username', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');

		if ($this->form_validation->run() == false) {
			$data['title'] = 'Login Page';
			$this->load->view('login', $data);
		} else {
			//validasinya sukses
			$this->cek_login();
		}
	}

	public function cek_login()
	{
		$username	= $this->input->post('username');
		$password	= $this->input->post('password');

		$user = $this->db->get_where('user', ['username' => $username])->row_array();
		// var_dump($user);
		// die;

		if ($user != " ") {
			if (password_verify($password, $user['password'])) {
				$data = [
					'id'  	   => $user['id'],
					'username' => $user['username'],
					'password' => $user['password'],
					'image'	   => $user['image']
				];
				$this->session->set_userdata($data);
				redirect('admin/Admin_panel', $data);
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                Nama akun dan Kata Sandi Salah!
                </div>');
				redirect('Login');
			}
		}
	}

	public function logout()
	{
		$this->session->unset_userdata('username');
		$this->session->sess_destroy();

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Anda berhasil keluar
            </div>');
		redirect('Login');
	}
}
