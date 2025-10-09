<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	public function index()
	{
		$data['title'] = "Home Admin | ByeFest";
		$data['jumlah_buku']     = $this->db->count_all('buku');
        $data['jumlah_member']   = $this->db->where('level', 'member')->from('user')->count_all_results();
        $data['jumlah_latihan']  = $this->db->count_all('latihan_soal');
        $data['jumlah_tryout']   = $this->db->count_all('tryout');
		$this->template->load('layout/mazer','admin/home', $data);
		if (!$this->session->userdata('id_user')) {
            $this->session->set_flashdata('error', 'Anda harus login terlebih dahulu.');
            redirect('auth/login');
        }
	}
}
