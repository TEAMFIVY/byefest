<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Latihan_soal extends CI_Controller {
    public function __construct() {
        parent::__construct();
        // cek login
        if (!$this->session->userdata('user_id')) {
            $this->session->set_flashdata('error', 'Anda harus login terlebih dahulu.');
            redirect('auth/login');
        }
    }

    public function index() {
        $data['title'] = "Latihan Soal";

        $latihan = $this->db->get('latihan_soal')->result();

        $progress = [];

        // Ambil daftar mapel unik
        $mapelList = array_unique(array_map(fn($l) => $l->mapel, $latihan));

        foreach ($mapelList as $mapel) {
            // Total bab untuk mapel tersebut
            $total_bab = $this->db
                ->where('mapel', $mapel)
                ->count_all_results('latihan_soal');

            // Hitung bab yang sudah dikerjakan user
            $bab_selesai = $this->db
                ->select('COUNT(DISTINCT latihan_soal.id_latihan) as jumlah')
                ->from('jawaban_user')
                ->join('soal', 'jawaban_user.id_soal = soal.id_soal')
                ->join('latihan_soal', 'soal.id_latihan = latihan_soal.id_latihan')
                ->where('latihan_soal.mapel', $mapel)
                ->get()
                ->row()
                ->jumlah ?? 0;

            $progress[$mapel] = [
                'icon'        => $this->getIcon($mapel),
                'bab_selesai' => $bab_selesai,
                'total_bab'   => $total_bab,
                'persentase'  => ($total_bab > 0) ? round(($bab_selesai / $total_bab) * 100) : 0
            ];
        }

        $data['progress'] = $progress;
        $data['latihan'] = $latihan;

        $this->load->view('member/latihan_soal/latihan_soal', $data);
    }

    private function getIcon($mapel) {
        $icons = [
            "Bahasa Indonesia" => "https://img.icons8.com/color/48/book-shelf.png",
            "Matematika"       => "https://img.icons8.com/color/48/calculator.png",
            "Bahasa Inggris"   => "https://img.icons8.com/color/48/literature.png",
            "Geografi"         => "https://img.icons8.com/color/48/globe.png"
        ];
        return $icons[$mapel] ?? "https://img.icons8.com/color/48/book.png";
    }

    public function soal($id_latihan)
    {
        $data['latihan'] = $this->db->get_where('latihan_soal', ['id_latihan' => $id_latihan])->row();
        $soal = $this->db->get_where('soal', ['id_latihan' => $id_latihan])->result();
        foreach ($soal as &$s) {
            $s->opsi = $this->db->get_where('opsi_soal', ['id_soal' => $s->id_soal])->result();
        }
        $data['soal'] = $soal;
        $this->load->view('member/latihan_soal/soal', $data);
    }

    public function simpan_jawaban()
    {
        $id_latihan = $this->input->post('id_latihan');
        $jawaban    = $this->input->post('jawaban'); 
        $id_user    = $this->session->userdata('id_user'); 
        $id_hasil   = time(); 

        foreach ($jawaban as $id_soal => $id_opsi) {
            $existing = $this->db
                ->from('jawaban_user')
                ->join('soal', 'jawaban_user.id_soal = soal.id_soal')
                ->where('jawaban_user.id_soal', $id_soal)
                ->where('jawaban_user.id_hasil', $id_hasil)
                ->get()
                ->row();

            if ($existing) {
                $this->db->where('id_jawaban', $existing->id_jawaban)
                        ->update('jawaban_user', [
                            'id_opsi' => $id_opsi
                        ]);
            } else {
                $data = [
                    'id_hasil' => $id_hasil,
                    'id_soal'  => $id_soal,
                    'id_opsi'  => $id_opsi
                ];
                $this->db->insert('jawaban_user', $data);
            }
        }

        $this->session->set_flashdata('success', 'Jawaban berhasil disimpan!');
        redirect('member/latihan_soal/hasil/' . $id_hasil);
    }

    public function hasil($id_hasil)
    {
        $jawaban_user = $this->db->get_where('jawaban_user', ['id_hasil' => $id_hasil])->result();

        $total_benar = 0;
        $total_salah = 0;
        $total_soal  = count($jawaban_user);

        foreach ($jawaban_user as $j) {
            $opsi = $this->db->get_where('opsi_soal', ['id_opsi' => $j->id_opsi])->row();
            if ($opsi && $opsi->jawaban_benar == 1) {
                $total_benar++;
            } else {
                $total_salah++;
            }
        }

        $nilai = ($total_soal > 0) ? round(($total_benar / $total_soal) * 100, 2) : 0;

        $data = [
            'total_benar' => $total_benar,
            'total_salah' => $total_salah,
            'total_soal'  => $total_soal,
            'nilai'       => $nilai
        ];

        $this->load->view('member/latihan_soal/hasil_jawaban', $data);
    }
}
