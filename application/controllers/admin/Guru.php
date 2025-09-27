<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Guru extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->helper(['url','form']);
        $this->load->library(['form_validation','session']);
    }

    // 🔹 List guru
    public function index() {
        $data['title'] = 'Data Guru';
        $data['guru'] = $this->db->get('guru')->result();
        $this->template->load('layout/main', 'admin/guru', $data);
    }

    // 🔹 Form tambah
    public function simpan() {
        
    }

    // 🔹 Store guru
    public function store() {
        $this->form_validation->set_rules('nama', 'Nama', 'required|max_length[100]');
        $this->form_validation->set_rules('nip', 'NIP', 'required|is_unique[guru.nip]');
        $this->form_validation->set_rules('mapel', 'Mata Pelajaran', 'required|max_length[100]');

        if ($this->form_validation->run() == FALSE) {
            $this->simpan();
        } else {
            $data = [
                'nama'  => $this->input->post('nama'),
                'nip'   => $this->input->post('nip'),
                'mapel' => $this->input->post('mapel')
            ];
            $this->db->insert('guru', $data);
            $this->session->set_flashdata('success', 'Data guru berhasil ditambahkan!');
            redirect('admin/guru');
        }
    }

    // 🔹 Form edit
    public function edit($id) {
        $data['title'] = 'Edit Data Guru';
        $data['guru']  = $this->db->get_where('guru', ['id_guru' => $id])->row();
        if (!$data['guru']) show_404();
        $this->template->load('layout/main', 'admin/guru_edit', $data);
    }

    // 🔹 Update guru
    public function update($id) {
        $current_guru = $this->db->get_where('guru', ['id_guru' => $id])->row();
        $is_unique = ($this->input->post('nip') != $current_guru->nip) ? '|is_unique[guru.nip]' : '';

        $this->form_validation->set_rules('nama', 'Nama', 'required|max_length[100]');
        $this->form_validation->set_rules('nip', 'NIP', 'required|max_length[50]'.$is_unique);
        $this->form_validation->set_rules('mapel', 'Mata Pelajaran', 'required|max_length[100]');

        if ($this->form_validation->run() == FALSE) {
            $this->edit($id);
        } else {
            $data = [
                'nama'  => $this->input->post('nama'),
                'nip'   => $this->input->post('nip'),
                'mapel' => $this->input->post('mapel')
            ];
            $this->db->where('id_guru', $id)->update('guru', $data);
            $this->session->set_flashdata('success', 'Data guru berhasil diperbarui!');
            redirect('admin/guru');
        }
    }

    // 🔹 Hapus guru
    public function delete($id) {
        $this->db->delete('guru', ['id_guru' => $id]);
        $this->session->set_flashdata('success', 'Data guru berhasil dihapus!');
        redirect('admin/guru');
    }
}
