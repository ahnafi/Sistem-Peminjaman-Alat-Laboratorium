<?php
defined('BASEPATH') or exit('No direct script access allowed');

function check_login()
{
	$CI =& get_instance();
	if (!$CI->session->userdata('user')) {
		redirect('auth/login');
	}
}

function check_admin()
{
	$CI =& get_instance();
	$user = $CI->session->userdata('user');
	if ($user->role != 'admin') {
		redirect(base_url());
	}
}

function check_user()
{
	$CI =& get_instance();
	$user = $CI->session->userdata('user');
	if ($user->role != 'mahasiswa') {
		redirect(base_url());
	}
}

function check_guest()
{
	$CI =& get_instance();
	if ($CI->session->userdata('user')) {
		redirect(base_url());
	}
}
