<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Buku extends CI_Controller {
    public function __construct() {
        parent::__construct();
        // if (!$this->session->userdata('user_id')) {
        //     $this->session->set_flashdata('error', 'Anda harus login terlebih dahulu.');
        //     redirect('auth');
        // }
    }

    public function index()
    {
        $data['title'] = "Aplikasi Perpustakaan | Manajemen Buku";
        $data['books'] = $this->db->get('buku')->result();
        $this->template->load('layout/mazer','admin/buku/buku',$data);
    }

    public function simpan()
    {
        $namafoto = date('YmdHis').'.jpg';
        $config['upload_path']   = './assets/uploads/buku/'; 
        $config['allowed_types'] = 'jpg|jpeg|png';    
        $config['max_size']      = 2048;               
        $config['file_name']     = $namafoto;
        $this->load->library('upload', $config);
        if (!empty($_FILES['cover']['name'])) {
            if (!$this->upload->do_upload('cover')) {
                $this->session->set_flashdata('error',$this->upload->display_errors());
                redirect('admin/buku');
            } else {
                $namafoto = $this->upload->data('file_name');
            }
        } else {
            $namafoto = 'default.png'; 
        }

        $data = [
            'judul' => $this->input->post('judul'),
            'mapel' => $this->input->post('mapel'),
            'kelas' => $this->input->post('kelas'),
            'cover' => $namafoto,
        ];

        $this->db->insert('buku', $data);
        $this->session->set_flashdata('success','Buku berhasil ditambah');
        redirect('admin/buku');
    }

    public function update() {
        $id = $this->input->post('id');
        $buku = $this->db->get_where('buku', ['id' => $id])->row();

        $namafoto = $buku->cover;
        $config['upload_path']   = './assets/uploads/buku/';
        $config['allowed_types'] = 'jpg|jpeg|png';
        $config['max_size']      = 500;
        $config['file_name']     = time()."_cover";
        $this->load->library('upload', $config);

        if (!empty($_FILES['cover']['name'])) {
            if (!$this->upload->do_upload('cover')) {
                $this->session->set_flashdata('error', $this->upload->display_errors());
                redirect('admin/buku');
                return;
            } else {
                if ($buku->cover && $buku->cover != 'default.png' && file_exists('./assets/uploads/buku/'.$buku->cover)) {
                    unlink('./assets/uploads/buku/'.$buku->cover);
                }
                $namafoto = $this->upload->data('file_name');
            }
        }

        $data = [
            'judul' => $this->input->post('judul'),
            'mapel' => $this->input->post('mapel'),
            'kelas' => $this->input->post('kelas'),
            'cover' => $namafoto,
        ];

        $this->db->where('id', $id)->update('buku', $data);
        $this->session->set_flashdata('success', 'Buku berhasil diupdate.');
        redirect('admin/buku');
    }

    public function delete() {
        $id = $this->input->post('id');
        $buku = $this->db->get_where('buku', ['id' => $id])->row();

        // hapus file cover kalau bukan default
        if ($buku && $buku->cover != 'default.png' && file_exists('./assets/uploads/buku/'.$buku->cover)) {
            unlink('./assets/uploads/buku/'.$buku->cover);
        }

        $this->db->where('id', $id)->delete('buku');
        $this->session->set_flashdata('success', 'Buku berhasil dihapus.');
        redirect('admin/buku');
    }
}
