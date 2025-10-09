<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Guru extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->helper(['url','form']);
        $this->load->library(['form_validation','session']);
		if (!$this->session->userdata('user_id')) {
            $this->session->set_flashdata('error', 'Anda harus login terlebih dahulu.');
            redirect('auth');
        }
    }

    // 🔹 List guru
    public function index() {
        $data['title'] = 'Daftar Guru | Byefest';
        // join ke tabel user kalau mau nampilin nama/email
        $data['guru'] = $this->db->select('guru.*, user.nama, user.email')
                                 ->from('guru')
                                 ->join('user','user.id_user = guru.id_user','left')
                                 ->get()
                                 ->result();
		$data['users'] = $this->db->where_in('level', ['guru'])->get('user')->result();
        $this->template->load('layout/mazer', 'admin/guru', $data);
    }

    // 🔹 Simpan guru baru
	public function simpan() {
		$this->form_validation->set_rules('nama', 'Nama', 'required|max_length[255]');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[user.email]');
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');
		$this->form_validation->set_rules('nip', 'NIP', 'required|max_length[50]|is_unique[guru.nip]');
		$this->form_validation->set_rules('mapel', 'Mata Pelajaran', 'required|max_length[100]');
	
		if ($this->form_validation->run() == FALSE) {
			$this->index();
		} else {
			// 🔹 Insert ke tabel user
			$userData = [
				'nama'     => $this->input->post('nama'),
				'email'    => $this->input->post('email'),
				'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
				'level'    => 'guru'
			];
			$this->db->insert('user', $userData);
			$id_user = $this->db->insert_id(); // ambil id user baru
	
			// 🔹 Insert ke tabel guru
			$guruData = [
				'id_user' => $id_user,
				'nip'     => $this->input->post('nip'),
				'mapel'   => $this->input->post('mapel'),
			];
			$this->db->insert('guru', $guruData);
	
			$this->session->set_flashdata('success', 'Data guru berhasil ditambahkan ke tabel guru & user!');
			redirect('admin/guru');
		}
	}

    // 🔹 Update guru
    public function update() {
		$id_guru = $this->input->post('id_guru');
		$current_guru = $this->db->get_where('guru', ['id_guru' => $id_guru])->row();
	
		if (!$current_guru) {
			show_404();
		}
	
		// validasi unik NIP
		$is_unique = ($this->input->post('nip') != $current_guru->nip) ? '|is_unique[guru.nip]' : '';
		$this->form_validation->set_rules('nama', 'Nama', 'required|max_length[255]');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		$this->form_validation->set_rules('nip', 'NIP', 'required|max_length[50]'.$is_unique);
		$this->form_validation->set_rules('mapel', 'Mata Pelajaran', 'required|max_length[100]');
		if ($this->form_validation->run() == FALSE) {
			$this->index();
		} else { 
			// 🔹 Update tabel user
			$userData = [
				'nama'  => $this->input->post('nama'),
				'email' => $this->input->post('email'),
			];
			// kalau password diisi, update juga
			if (!empty($this->input->post('password'))) {
				$userData['password'] = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
			}
			$this->db->where('id_user', $current_guru->id_user)->update('user', $userData);
			// 🔹 Update tabel guru
			$guruData = [
				'nip'   => $this->input->post('nip'),
				'mapel' => $this->input->post('mapel'),
			];
			$this->db->where('id_guru', $id_guru)->update('guru', $guruData);
			$this->session->set_flashdata('success', 'Data guru & user berhasil diperbarui!');
			redirect('admin/guru');
		}
	}

    // 🔹 Hapus guru
    public function delete($id_guru) {
		$guru = $this->db->get_where('guru', ['id_guru' => $id_guru])->row();
		if (!$guru) {
			show_404();
		}
		// 🔹 hapus guru
		$this->db->delete('guru', ['id_guru' => $id_guru]);
		// 🔹 hapus user terkait
		$this->db->delete('user', ['id_user' => $guru->id_user]);
		$this->session->set_flashdata('success', 'Data guru & user berhasil dihapus!');
		redirect('admin/guru');
	}
	
}
