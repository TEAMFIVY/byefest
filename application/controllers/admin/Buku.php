<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Buku extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Buku_model', 'buku'); 
    }

    public function index()
    {
        $data['title'] = "Manajemen Buku | Byefest Admin";
        $data['books'] = $this->buku->get_all(); 
        $this->template->load('layout/mazer', 'admin/buku/buku', $data);
    }

    public function store()
    {
        $data = [
            'judul' => $this->input->post('judul'),
            'mapel' => $this->input->post('mapel'),
            'kelas' => $this->input->post('kelas'),
            'cover' => $this->input->post('cover')
        ];
        $this->buku->insert($data);
        $this->session->set_flashdata('success', 'Buku berhasil ditambahkan.');
        redirect('buku');
    }

    public function edit($id)
    {
        $book = $this->buku->find($id);
        if (!$book) {
            show_404();
        }

        $data['title'] = "Edit Buku | Byefest Admin";
        $data['book'] = $book;
        $this->template->load('layout/mazer', 'admin/buku/edit', $data);
    }

    public function update($id)
    {
        $data = [
            'judul' => $this->input->post('judul'),
            'mapel' => $this->input->post('mapel'),
            'kelas' => $this->input->post('kelas'),
            'cover' => $this->input->post('cover')
        ];

        $this->buku->update($id, $data);
        $this->session->set_flashdata('success', 'Buku berhasil diperbarui.');
        redirect('buku');
    }

    public function delete($id)
    {
        $this->buku->delete($id);
        $this->session->set_flashdata('success', 'Buku berhasil dihapus.');
        redirect('buku');
    }
}
