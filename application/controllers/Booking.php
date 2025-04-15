<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Booking extends CI_Controller
{
	private $title = 'Booking';
	private $page = "booking";

	function __construct()
	{
		parent::__construct();
		check_login();
		$this->load->model("Booking_model");
		$this->load->model("User_model");
		$this->load->model("Tool_model");
	}

	private function validateId($id)
	{
		if (!isset($id)) {
			$this->session->set_flashdata('error', 'Data tidak ditemukan');
			redirect($this->page);
		}

		$data = $this->Booking_model->getById($id);

		if (!$data) {
			$this->session->set_flashdata('error', 'Data tidak ditemukan');
			redirect($this->page);
		}

		return $data;
	}

	private function isAlatAvailable($alat_id, $tanggal)
	{
		$this->load->model("Tool_model");

		// Cek stok alat
		$alat = $this->Tool_model->getById($alat_id);
		if (!$alat || $alat->stok <= 0) {
			return ['status' => false, 'message' => 'Stok alat tidak tersedia.'];
		}

		$booking = $this->Booking_model->checkAccepted($alat_id, $tanggal);

		// Jika jumlah booking yang sudah disetujui >= stok alat, tidak bisa dipinjam
		if ($booking && $booking->total_booking >= $alat->stok) {
			return ['status' => false, 'message' => 'Alat sudah terbooking maksimal pada tanggal tersebut.'];
		}

		// Jika masih tersedia, izinkan untuk booking
		return ['status' => true];
	}


	public function index()
	{
		$data = [
			"title" => "Data $this->title",
			"page" => "$this->page/index",
			"booking" => $this->Booking_model->getAll(),
			"user" => $this->session->userdata("user")
		];

		$this->load->view('layouts/default', $data);
	}

	public function add()
	{
		$data = [
			"title" => "Ajukan Peminjaman Baru",
			"page" => "$this->page/create",
			"users" => $this->User_model->getAllMahasiswa(),
			"alat" => $this->Tool_model->getAll(),
			"user" => $this->session->userdata("user")
		];

		$this->load->view('layouts/default', $data);
	}

	public function store()
	{
		$this->form_validation->set_rules('user_id', 'Nama Pengguna', 'required|numeric');
		$this->form_validation->set_rules('alat_id', 'Nama Alat', 'required|numeric');
		$this->form_validation->set_rules('tanggal', 'Tanggal Booking', 'required');
		$this->form_validation->set_rules('keterangan', 'Keterangan', 'max_length[255]');

		if ($this->form_validation->run() === FALSE) {
			$this->add();
		} else {
			$user_id = $this->input->post('user_id');
			$alat_id = $this->input->post('alat_id');
			$tanggal = $this->input->post('tanggal');

			$existing_booking = $this->Booking_model->checkUserBooking($alat_id, $user_id);

			if ($existing_booking) {
				$this->session->set_flashdata('error', 'Anda sudah meminjam alat ini pada tanggal tersebut.');
				redirect($this->page . '/add');
			}

			// Pengecekan ketersediaan alat
			$check = $this->isAlatAvailable($alat_id, $tanggal);
			if (!$check['status']) {
				$this->session->set_flashdata('error', $check['message']);
				redirect($this->page . '/add');
			}

			// Jika alat tersedia dan mahasiswa belum meminjam alat tersebut
			$data = [
				'user_id' => $user_id,
				'alat_id' => $alat_id,
				'tanggal' => $tanggal,
				'status' => 'pending',
				'keterangan' => $this->input->post('keterangan'),
			];

			$this->Booking_model->insert($data);
			$this->session->set_flashdata('success', "Peminjaman berhasil diajukan.");
			redirect($this->page);
		}
	}

	public function edit($id)
	{

		$field = $this->validateId($id);

		$data = [
			"title" => "Edit $this->title ",
			"page" => "$this->page/edit",
			"booking" => $field,
			"users" => $this->User_model->getAllMahasiswa(),
			"alat" => $this->Tool_model->getAll(),
		];

		$this->load->view('layouts/default', $data);
	}

	public function update($id)
	{
		$this->validateId($id);

		$this->form_validation->set_rules('user_id', 'Mahasiswa', 'required');
		$this->form_validation->set_rules('alat_id', 'Alat', 'required');
		$this->form_validation->set_rules('tanggal', 'Tanggal', 'required');

		if ($this->form_validation->run() === FALSE) {
			$this->edit($id);
		} else {
			$data = [
				'user_id' => $this->input->post('user_id'),
				'alat_id' => $this->input->post('alat_id'),
				'tanggal' => $this->input->post('tanggal'),
				'keterangan' => $this->input->post('keterangan'),
			];

			$update = $this->Booking_model->update($id, $data);

			if ($update) {
				$this->session->set_flashdata('success', "Data $this->title berhasil diperbarui");
			} else {
				$this->session->set_flashdata('error', "Gagal memperbarui data $this->title");
			}

			redirect($this->page);
		}
	}

	public function accept($id)
	{
		$booking = $this->validateId($id);

		// Pengecekan ketersediaan alat sebelum disetujui
		$check = $this->isAlatAvailable($booking->alat_id, $booking->tanggal);

		if (!$check['status']) {
			$this->session->set_flashdata('error', "Tidak bisa menyetujui peminjaman: " . $check['message']);
		} else {
			$update = $this->Booking_model->update($id, ['status' => 'disetujui']);

			if ($update) {
				$this->session->set_flashdata('success', "Peminjaman telah disetujui.");
			} else {
				$this->session->set_flashdata('error', "Gagal menyetujui peminjaman.");
			}
		}

		redirect($this->page);
	}

	public function reject($id)
	{
		$booking = $this->validateId($id);

		$update = $this->Booking_model->update($id, ['status' => 'ditolak']);

		if ($update) {
			$this->session->set_flashdata('success', "Peminjaman telah ditolak.");
		} else {
			$this->session->set_flashdata('error', "Gagal menolak peminjaman.");
		}

		redirect($this->page);
	}


	public function delete($id)
	{
		$this->validateId($id);

		$delete = $this->Booking_model->delete($id);

		if ($delete) {
			$this->session->set_flashdata('success', "Data $this->title berhasil dihapus");
		} else {
			$this->session->set_flashdata('error', "Gagal menghapus data $this->title");
		}

		redirect($this->page);
	}
}
