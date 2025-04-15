<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profile extends CI_Controller
{
	private $title = 'Profile';
	private $page = "profile";

	function __construct()
	{
		parent::__construct();
		check_login();
		$this->load->model("User_model");
	}

	private function validateId($id)
	{
		if (!isset($id)) {
			$this->session->set_flashdata('error', 'Data tidak ditemukan');
			redirect($this->page);
		}

		$data = $this->User_model->getById($id);

		if (!$data) {
			$this->session->set_flashdata('error', 'Data tidak ditemukan');
			redirect($this->page);
		}

		return $data;
	}

	public function index()
	{
		$data = [
			"title" => "Edit $this->title",
			"page" => "$this->page/index",
			"user" => $this->session->userdata("user")
		];

		$this->load->view('layouts/default', $data);
	}

	public function update($id): void
	{
		$field = $this->validateId($id);

		$this->form_validation->set_rules('name', 'Nama', 'required');

		if ($this->form_validation->run() === false) {
			$this->index();
		} else {
			$data = [
				'name' => $this->input->post('name'),
			];

			$update = $this->User_model->update($field->id, $data);

			if ($update) {
				$updated_user = $this->User_model->getById($field->id);

				$this->session->set_userdata('user', $updated_user);

				$this->session->set_flashdata('success', "Data $this->title berhasil diperbarui");
			} else {
				$this->session->set_flashdata('error', "Gagal memperbarui data $this->title");
			}

			redirect($this->page);
		}
	}


	public function update_password($id): void
	{
		$field = $this->validateId($id);

		$this->form_validation->set_rules('password', 'Password Baru', 'required|min_length[6]');
		$this->form_validation->set_rules('password_confirm', 'Konfirmasi Password', 'required|matches[password]');

		if ($this->form_validation->run() === false) {
			$this->edit($id);
		} else {
			$data = [
				'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT)
			];

			$update = $this->User_model->update($id, $data);

			if ($update) {
				$this->session->set_flashdata('success', "Password mahasiswa $field->name berhasil diubah");
			} else {
				$this->session->set_flashdata('error', 'Gagal mengubah password');
			}

			redirect($this->page);
		}
	}

}
