<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mahasiswa extends CI_Controller
{
    private $title = 'Mahasiswa';
    private $page = "mahasiswa";

    function __construct()
    {
        parent::__construct();
        check_login();
        $this->load->model("User_model");
        check_admin();
    }

    private function validateId($id)
    {
        if (!isset($id)) {
            $this->session->set_flashdata('error', 'Data tidak ditemukan');
            redirect($this->page);
        }

        $data = $this->User_model->getById($id);

        if ($data->role != "mahasiswa") {
            $this->session->set_flashdata('error', 'Data tidak ditemukan');
            redirect($this->page);
        }

        return $data;
    }

    public function index(): void
    {
        $data = [
            "title" => "Data $this->title",
            "page" => "$this->page/index",
            "mahasiswa" => $this->User_model->getAllMahasiswa()
        ];

        $this->load->view('layouts/default', $data);
    }

    public function add(): void
    {
        $data = [
            "title" => "Tambah $this->title Baru",
            "page" => "$this->page/create",
        ];

        $this->load->view('layouts/default', $data);
    }

    public function store(): void
    {
        $this->form_validation->set_rules('name', 'Nama', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[users.email]');
        $this->form_validation->set_rules('nim', 'NIM', 'required|is_unique[users.nim]');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');
        $this->form_validation->set_rules('password_confirm', 'Konfirmasi Password', 'required|matches[password]');


        if ($this->form_validation->run() === FALSE) {
            $this->add();
        } else {
            $data = [
                'name' => $this->input->post('name'),
                'email' => $this->input->post('email'),
                'nim' => $this->input->post('nim'),
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'role' => 'mahasiswa'
            ];

            $this->User_model->insert($data);
            $this->session->set_flashdata('success', "Data mahasiswa berhasil ditambahkan");
            redirect($this->page);
        }
    }


    public function edit($id): void
    {

        $field = $this->validateId($id);

        $data = [
            "title" => "Edit $this->title " . $field->name,
            "page" => "$this->page/edit",
            "mahasiswa" => $field
        ];

        $this->load->view('layouts/default', $data);
    }

    public function update($id): void
    {
        $this->validateId($id);

        $this->form_validation->set_rules('name', 'Nama', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');

        if ($this->form_validation->run() === false) {
            $this->edit($id);
        } else {
            $data = [
                'name' => $this->input->post('name'),
                'email' => $this->input->post('email')
            ];

            $update = $this->User_model->update($id, $data);

            if ($update) {
                $this->session->set_flashdata('success', "Data $this->title berhasil diperbarui");
            } else {
                $this->session->set_flashdata('error', "Gagal memperbarui data $this->title");
            }

            redirect($this->page . "/edit/$id");
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

            redirect($this->page . "/edit/$id");
        }
    }

    public function delete($id): void
    {
        $field = $this->validateId($id);

        $delete = $this->User_model->delete($id);

        if ($delete) {
            $this->session->set_flashdata('success', "Data $this->title $field->name berhasil dihapus");
        } else {
            $this->session->set_flashdata('error', "Gagal menghapus data $this->title $field->name");
        }

        redirect($this->page);
    }
}
