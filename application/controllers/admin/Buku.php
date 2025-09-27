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
    }


    public function delete($id)
    {
        $this->buku->delete($id);
    }
    
    public function find($id) {
    return $this->db->get_where('buku', ['id' => $id])->row();
    }
}
