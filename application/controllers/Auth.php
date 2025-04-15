<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model("User_model");
	}

	public function login(): void
	{
		check_guest();

		$data = [
			"title" => "Login",
			"page" => "auth/login",
		];

		if ($this->input->method() == 'post') {
			$email = $this->input->post('email');
			$password = $this->input->post('password');

			$user = $this->User_model->login($email, $password);
			if ($user) {
				$this->session->set_userdata('user', $user);
				redirect(base_url());
			} else {
				$data['error'] = 'Email atau password salah';
			}
		}

		$this->load->view('layouts/auth', $data);
	}

//	public function register()
//	{
//		check_guest();
//
//		$data = [
//			"title" => "Register",
//			"page" => "auth/register",
//		];
//
//		if ($this->input->method() == 'post') {
//			$email = $this->input->post('email');
//			$password = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
//
//			$this->User_model->register([
//				'email' => $email,
//				'password' => $password,
//				"name"=> "admin",
//				"role"=> "admin"
//			]);
//
//			$this->session->set_flashdata('success', 'Registrasi berhasil!, Silahkan Login');
//			redirect('auth/login');
//		}
//		$this->load->view('layouts/auth', $data);
//	}

	public function logout()
	{
		check_login();

		$this->session->sess_destroy();
		redirect('auth/login');
	}
}
