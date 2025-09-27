<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Latihan extends CI_Controller {
    public function __construct() {
        parent::__construct();
        // if (!$this->session->userdata('user_id')) {
        //     $this->session->set_flashdata('error', 'Anda harus login terlebih dahulu.');
        //     redirect('auth');
        // }
    }

    public function index() {
        $data['title'] = "Manajemen Latihan Soal";
        $data['latihan'] = $this->db->get('latihan_soal')->result();
        $this->template->load('layout/mazer','admin/latihan/index',$data);
    }

    public function simpan() {
        $data = [
            'judul'         => $this->input->post('judul'),
            'tingkat_kelas' => $this->input->post('tingkat_kelas'),
            'mapel' => $this->input->post('mapel'),
        ];
        $this->db->insert('latihan_soal', $data);
        $id = $this->db->insert_id();

        $this->session->set_flashdata('success', 'Latihan soal berhasil ditambahkan, silakan tambah soal.');
        redirect('admin/latihan/detail/'.$id);
    }

    public function update() {
        $id = $this->input->post('id_latihan');
        $data = [
            'judul'         => $this->input->post('judul'),
            'tingkat_kelas' => $this->input->post('tingkat_kelas'),
            'mapel' => $this->input->post('mapel'),
        ];
        $this->db->where('id_latihan', $id)->update('latihan_soal', $data);
        $this->session->set_flashdata('success', 'Latihan soal berhasil diupdate.');
        redirect('admin/latihan');
    }

    public function delete($id) 
    {
        $soal_list = $this->db->get_where('soal', ['id_latihan' => $id])->result();
        foreach ($soal_list as $soal) {
            $this->db->where('id_soal', $soal->id_soal)->delete('opsi_soal');
        }
        $this->db->where('id_latihan', $id)->delete('soal');
        $this->db->where('id_latihan', $id)->delete('latihan_soal');
        $this->session->set_flashdata('success', 'Latihan soal beserta soal dan opsi terkait berhasil dihapus.');
        redirect('admin/latihan');
    }

    public function detail($id) {
        $data['title'] = "Detail Latihan Soal";
        $data['latihan'] = $this->db->get_where('latihan_soal',['id_latihan'=>$id])->row();
        $data['soal'] = $this->db->get_where('soal',['id_latihan'=>$id])->result();
        $this->template->load('layout/mazer','admin/latihan/detail',$data);
    }

    public function simpan_soal() {
        $data = [
            'id_latihan' => $this->input->post('id_latihan'),
            'pertanyaan' => $this->input->post('pertanyaan'),
        ];
        $this->db->insert('soal',$data);
        $id_soal = $this->db->insert_id();

        $opsi = $this->input->post('opsi');
        $jawaban_benar = $this->input->post('jawaban_benar'); 
        foreach ($opsi as $i => $teks) {
            $this->db->insert('opsi_soal', [
                'id_soal' => $id_soal,
                'teks_opsi' => $teks,
                'jawaban_benar' => ($jawaban_benar == $i ? 1 : 0)
            ]);
        }

        $this->session->set_flashdata('success','Soal berhasil ditambahkan.');
        redirect('admin/latihan/detail/'.$this->input->post('id_latihan'));
    }

    public function update_soal() {
        $id_soal = $this->input->post('id_soal');
        $id_latihan = $this->input->post('id_latihan');
        $this->db->where('id_soal', $id_soal)->update('soal', [
            'pertanyaan' => $this->input->post('pertanyaan')
        ]);
        $this->db->where('id_soal', $id_soal)->delete('opsi_soal');
        $opsi = $this->input->post('opsi');
        $jawaban_benar = $this->input->post('jawaban_benar');
        foreach ($opsi as $i => $teks) {
            $this->db->insert('opsi_soal', [
                'id_soal' => $id_soal,
                'teks_opsi' => $teks,
                'jawaban_benar' => ($jawaban_benar == $i ? 1 : 0)
            ]);
        }
        $this->session->set_flashdata('success','Soal berhasil diupdate.');
        redirect('admin/latihan/detail/'.$id_latihan);
    }

    public function simpan_massal() 
    {
        $id_latihan = $this->input->post('id_latihan');
        $pertanyaan = $this->input->post('pertanyaan');
        $opsi = $this->input->post('opsi');
        $jawaban_benar = $this->input->post('jawaban_benar');

        foreach($pertanyaan as $i => $p) {
            $this->db->insert('soal', [
                'id_latihan' => $id_latihan,
                'pertanyaan' => $p
            ]);
            $id_soal = $this->db->insert_id();

            foreach($opsi[$i] as $j => $o) {
                $this->db->insert('opsi_soal', [
                    'id_soal' => $id_soal,
                    'teks_opsi' => $o,
                    'jawaban_benar' => ($jawaban_benar[$i] == $j ? 1 : 0)
                ]);
            }
        }
        $this->session->set_flashdata('success', 'Semua soal berhasil disimpan.');
        redirect('admin/latihan/detail/'.$id_latihan);
    }

    public function delete_soal($id_soal, $id_latihan)
    {
        $this->db->where('id_soal', $id_soal)->delete('opsi_soal');
        $this->db->where('id_soal', $id_soal)->delete('soal');
        $this->session->set_flashdata('success', 'Soal berhasil dihapus.');
        redirect('admin/latihan/detail/'.$id_latihan);
    }
}
