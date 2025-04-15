<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tool extends CI_Controller
{
	private $title = 'Alat';
	private $page = "tool";

	function __construct()
	{
		parent::__construct();
		check_login();
		$this->load->model("Tool_model");
	}

	private function validateId($id)
	{
		if (!isset($id)) {
			$this->session->set_flashdata('error', 'Data tidak ditemukan');
			redirect($this->page);
		}

		$data = $this->Tool_model->getById($id);

		if (!$data) {
			$this->session->set_flashdata('error', 'Data tidak ditemukan');
			redirect($this->page);
		}

		return $data;
	}

	public function index()
	{
		$data = [
			"title" => "Data $this->title",
			"page" => "$this->page/index",
			"tools" => $this->Tool_model->getAll()
		];

		$this->load->view('layouts/default', $data);
	}

	public function add()
	{
		$data = [
			"title" => "Tambah $this->title Baru",
			"page" => "$this->page/create",
		];

		$this->load->view('layouts/default', $data);
	}

	public function store()
	{
		$this->form_validation->set_rules('nama_alat', 'Nama Alat', 'required');
		$this->form_validation->set_rules('stok', 'Stok', 'required|numeric');
		$this->form_validation->set_rules('deskripsi', 'Deskripsi', 'trim');

		if ($this->form_validation->run() === FALSE) {
			$this->add();
		} else {
			$data = [
				'nama_alat' => $this->input->post('nama_alat', true),
				'stok' => $this->input->post('stok', true),
				'deskripsi' => $this->input->post('deskripsi', true),
			];

			$this->Tool_model->insert($data);
			$this->session->set_flashdata('success', "Data $this->title berhasil ditambahkan");
			redirect($this->page);
		}
	}


	public function edit($id)
	{

		$field = $this->validateId($id);

		$data = [
			"title" => "Edit $this->title " . $field->nama_matakuliah,
			"page" => "$this->page/edit",
			"matakuliah" => $field
		];

		$this->load->view('layouts/default', $data);
	}

	public function update($id)
	{
		$this->validateId($id);

		$data = [
			'nama_matakuliah' => $this->input->post('nama'),
		];

		$update = $this->Tool_model->update($id, $data);

		if ($update) {
			$this->session->set_flashdata('success', "Data $this->title berhasil diperbarui");
		} else {
			$this->session->set_flashdata('error', "Gagal memperbarui data $this->title");
		}

		redirect($this->page);
	}

	public function delete($id)
	{
		$this->validateId($id);

		$delete = $this->Tool_model->delete($id);

		if ($delete) {
			$this->session->set_flashdata('success', "Data $this->title berhasil dihapus");
		} else {
			$this->session->set_flashdata('error', "Gagal menghapus data $this->title");
		}

		redirect($this->page);
	}
}
