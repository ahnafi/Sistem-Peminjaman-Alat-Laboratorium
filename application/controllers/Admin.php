<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    private $title = 'Admin';
    private $page = "admin";

    function __construct()
    {
        parent::__construct();
        check_login();
        check_admin();
    }

    public function index()
    {
        $data = [
            "title" => "Welcome $this->title",
            "page" => "home",
            'user' => $this->session->userdata("user")
        ];

        $this->load->view('layouts/default', $data);
    }


}
