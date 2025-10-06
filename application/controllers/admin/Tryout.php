<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tryout extends CI_Controller {
    public function __construct() {
        parent::__construct();
        // if (!$this->session->userdata('user_id')) redirect('auth');
    }

    public function index() {
        $data['title'] = "Manajemen Try Out";
        $data['tryout'] = $this->db->get('tryout')->result();
        $this->template->load('layout/mazer','admin/tryout/index',$data);
    }

    public function simpan() {
        $data = [
            'judul'         => $this->input->post('judul'),
            'mapel'         => $this->input->post('mapel'),
            'tingkat_kelas' => $this->input->post('tingkat_kelas'),
        ];
        $this->db->insert('tryout', $data);
        $id = $this->db->insert_id();

        $this->session->set_flashdata('success', 'Tryout berhasil ditambahkan.');
        redirect('admin/tryout/detail/'.$id);
    }

    public function update() {
        $id = $this->input->post('id_tryout');
        $data = [
            'judul'         => $this->input->post('judul'),
            'mapel'         => $this->input->post('mapel'),
            'tingkat_kelas' => $this->input->post('tingkat_kelas'),
        ];
        $this->db->where('id_tryout', $id)->update('tryout', $data);
        $this->session->set_flashdata('success', 'Tryout berhasil diupdate.');
        redirect('admin/tryout');
    }

    public function delete($id) {
        $soal = $this->db->get_where('soal_tryout', ['id_tryout' => $id])->result();
        foreach ($soal as $s) {
            $this->db->where('id_soal', $s->id_soal)->delete('opsi_tryout');
        }
        $this->db->where('id_tryout', $id)->delete('soal_tryout');
        $this->db->where('id_tryout', $id)->delete('tryout');

        $this->session->set_flashdata('success', 'Tryout dan semua soal terkait berhasil dihapus.');
        redirect('admin/tryout');
    }

    public function detail($id) {
        $data['title'] = "Detail Tryout";
        $data['tryout'] = $this->db->get_where('tryout',['id_tryout'=>$id])->row();
        $data['soal'] = $this->db->get_where('soal_tryout',['id_tryout'=>$id])->result();
        $this->template->load('layout/mazer','admin/tryout/detail',$data);
    }

    public function simpan_soal() {
        $data = [
            'id_tryout' => $this->input->post('id_tryout'),
            'pertanyaan' => $this->input->post('pertanyaan'),
        ];
        $this->db->insert('soal_tryout',$data);
        $id_soal = $this->db->insert_id();

        $opsi = $this->input->post('opsi');
        $jawaban_benar = $this->input->post('jawaban_benar'); 
        foreach ($opsi as $i => $teks) {
            $this->db->insert('opsi_tryout', [
                'id_soal' => $id_soal,
                'teks_opsi' => $teks,
                'jawaban_benar' => ($jawaban_benar == $i ? 1 : 0)
            ]);
        }

        $this->session->set_flashdata('success','Soal berhasil ditambahkan.');
        redirect('admin/tryout/detail/'.$this->input->post('id_tryout'));
    }

    public function update_soal() {
        $id_soal = $this->input->post('id_soal');
        $id_tryout = $this->input->post('id_tryout');
        $this->db->where('id_soal', $id_soal)->update('soal_tryout', [
            'pertanyaan' => $this->input->post('pertanyaan')
        ]);
        $this->db->where('id_soal', $id_soal)->delete('opsi_tryout');
        $opsi = $this->input->post('opsi');
        $jawaban_benar = $this->input->post('jawaban_benar');
        foreach ($opsi as $i => $teks) {
            $this->db->insert('opsi_tryout', [
                'id_soal' => $id_soal,
                'teks_opsi' => $teks,
                'jawaban_benar' => ($jawaban_benar == $i ? 1 : 0)
            ]);
        }
        $this->session->set_flashdata('success','Soal berhasil diupdate.');
        redirect('admin/tryout/detail/'.$id_tryout);
    }

    public function simpan_massal() {
        $id_tryout = $this->input->post('id_tryout');
        $pertanyaan = $this->input->post('pertanyaan');
        $opsi = $this->input->post('opsi');
        $jawaban_benar = $this->input->post('jawaban_benar');

        foreach($pertanyaan as $i => $p) {
            $this->db->insert('soal_tryout', [
                'id_tryout' => $id_tryout,
                'pertanyaan' => $p
            ]);
            $id_soal = $this->db->insert_id();

            foreach($opsi[$i] as $j => $o) {
                $this->db->insert('opsi_tryout', [
                    'id_soal' => $id_soal,
                    'teks_opsi' => $o,
                    'jawaban_benar' => ($jawaban_benar[$i] == $j ? 1 : 0)
                ]);
            }
        }
        $this->session->set_flashdata('success', 'Semua soal berhasil disimpan.');
        redirect('admin/tryout/detail/'.$id_tryout);
    }

    public function delete_soal($id_soal, $id_tryout)
    {
        $this->db->where('id_soal', $id_soal)->delete('opsi_tryout');
        $this->db->where('id_soal', $id_soal)->delete('soal_tryout');
        $this->session->set_flashdata('success', 'Soal berhasil dihapus.');
        redirect('admin/tryout/detail/'.$id_tryout);
    }
}
