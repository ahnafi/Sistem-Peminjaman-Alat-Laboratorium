<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Main extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		check_login();
		$this->load->model('Booking_model');
	}

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 *        http://example.com/index.php/welcome
	 *    - or -
	 *        http://example.com/index.php/welcome/index
	 *    - or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */
	public function index()
	{
		$data = [
			'title' => 'Welcome',
			'page' => 'home',
			'user' => $this->session->userdata("user"),
		];

		if ($data['user']->role == "mahasiswa") {
			$data["booking"] = $this->Booking_model->getByUserId($data['user']->id);
		} else {
			$data["pending_count"] = $this->Booking_model->countPending();
		}

		$this->load->view('layouts/default', $data);
	}

}
