<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	public function index()
	{
		$data['title'] = "Home Admin | ByeFest";
		$this->template->load('layout/mazer','admin/home', $data);
		if (!$this->session->userdata('id_user')) {
            $this->session->set_flashdata('error', 'Anda harus login terlebih dahulu.');
            redirect('auth/login');
        }
	}
}
