<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_login extends CI_Controller
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
			redirect('admin/beranda');
		}

		$this->form_validation->set_rules('username', 'Username', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');

		if ($this->form_validation->run() == false) {
			$data['title'] = 'login Page';
			$this->load->view('auth/login', $data);
		} else {
			//validasinya sukses
			$this->cek_login();
		}
	}

	public function cek_login()
	{
		$username	= $this->input->post('username');
		$password	= $this->input->post('password');

		$user = $this->db->get_where('auth_user', ['username' => $username])->row_array();

		if ($user != " ") {
			if (password_verify($password, $user['password'])) {
				$data = [
					'id'  	   => $user['id'],
					'username' => $user['username'],
					'password' => $user['password'],
					'image'	   => $user['image']
				];
				$this->session->set_userdata($data);
            	$this->session->set_flashdata('success', "Selamat Datang!");
				redirect('admin/beranda', $data);
			} else {
				$this->session->set_flashdata('error', "Masuk Gagal! anda belum terdaftar atau username/kata sandi anda salah");
				redirect('login');
			}
		}
	}

	public function logout()
	{
		$this->session->unset_userdata('username');
		$this->session->set_flashdata('success', "Logged out!");
		$this->session->sess_destroy();
		redirect('login');
	}
}
