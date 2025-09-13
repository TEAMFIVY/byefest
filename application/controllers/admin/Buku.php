<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Buku extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Buku_model', 'buku'); // panggil model
    }

    public function index()
    {
        $data['title'] = "Manajemen Buku | EduPrime Admin";
        $this->template->load('layout/main', 'admin/buku/buku', $data);
    }

    // ✅ ambil semua data buku (untuk Ajax loadBooks)
    public function getBooks()
    {
        $books = $this->buku->get_all();
        echo json_encode($books);
    }

    // ✅ ambil 1 buku (untuk Ajax editBook)
    public function getBook($id)
    {
        $book = $this->buku->find($id);
        echo json_encode($book);
    }

    // ✅ insert / update buku (untuk Ajax form submit)
   public function store()
{
    $id = $this->input->post('id');
    $data = [
        'judul' => $this->input->post('judul'),
        'mapel' => $this->input->post('mapel'),
        'kelas' => $this->input->post('kelas'),
        'cover' => $this->input->post('cover')
    ];

    if ($id) {
        $ok = $this->buku->update($id, $data);
    } else {
        $ok = $this->buku->insert($data);
    }

    if ($ok) {
        echo json_encode(['status' => 'success']);
    } else {
        http_response_code(500); // bikin Ajax masuk ke error
        echo json_encode(['status' => 'error']);
    }
}


    // ✅ hapus buku (untuk Ajax delete)
    public function delete($id)
    {
        $this->buku->delete($id);
        echo json_encode(['status' => 'success']);
    }
}
