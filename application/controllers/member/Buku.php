<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Buku extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('user_id')) {
        $this->session->set_flashdata('error', 'Anda harus login terlebih dahulu.');
        redirect('auth');
		}
		$this->load->model('Buku_model');
    }

    public function index()
    {
        $data['title'] = "Manajemen Buku | EduPrime Admin";
        $data['books'] = $this->Buku_model->get_all(); // ambil data dari model
        $this->load->view('member/buku', $data);
    }
}
