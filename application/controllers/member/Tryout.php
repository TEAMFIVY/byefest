<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tryout extends CI_Controller {
    public function __construct() {
        parent::__construct();
        // Uncomment jika perlu proteksi login
        if (!$this->session->userdata('id_user')) {
            $this->session->set_flashdata('error','Silakan login terlebih dahulu.');
            redirect('auth');
        }
    }

    // Halaman daftar tryout (siswa)
    public function index() {
        $id_user = $this->session->userdata('id_user') ?? 0;

        // Ambil semua tryout
        $tryouts = $this->db->order_by('mapel, judul')->get('tryout')->result();

        // Hitung progress per mapel (total tryout per mapel & yg sudah dikerjakan user)
        $progress = [];
        $mapelList = [];
        foreach ($tryouts as $t) $mapelList[$t->mapel] = $t->mapel;

        foreach ($mapelList as $mapel) {
            $total_tryout = $this->db->where('mapel', $mapel)->count_all_results('tryout');

            // jumlah tryout yang sudah ada hasil_tryout oleh user untuk mapel tersebut
            $completed = $this->db
                ->select('COUNT(DISTINCT hasil_tryout.id_tryout) as jumlah')
                ->from('hasil_tryout')
                ->join('tryout','hasil_tryout.id_tryout = tryout.id_tryout')
                ->where('tryout.mapel', $mapel)
                ->where('hasil_tryout.id_user', $id_user)
                ->get()
                ->row()
                ->jumlah ?? 0;

            $percent = ($total_tryout > 0) ? round(($completed / $total_tryout) * 100) : 0;

            $progress[$mapel] = [
                'total' => (int)$total_tryout,
                'completed' => (int)$completed,
                'percent' => (int)$percent,
                'icon' => $this->getIcon($mapel)
            ];
        }

        $data['title'] = 'Daftar Tryout';
        $data['tryouts'] = $tryouts;
        $data['progress'] = $progress;

        $this->load->view('member/tryout/tryout', $data);
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

    // Halaman kerjakan tryout (soal)
    public function soal($id_tryout) {
        $data['tryout'] = $this->db->get_where('tryout',['id_tryout'=>$id_tryout])->row();
        if (!$data['tryout']) show_404();

        $soal = $this->db->get_where('soal_tryout',['id_tryout'=>$id_tryout])->result();
        foreach ($soal as &$s) {
            $s->opsi = $this->db->get_where('opsi_tryout',['id_soal'=>$s->id_soal])->result();
        }
        $data['soal'] = $soal;

        $this->load->view('member/tryout/soal', $data);
    }

    // Simpan jawaban siswa -> buat record di hasil_tryout + jawaban_user_tryout -> hitung nilai
    public function simpan_jawaban() {
        $id_tryout = $this->input->post('id_tryout');
        $jawaban = $this->input->post('jawaban'); // array id_soal => id_opsi
        $id_user = $this->session->userdata('id_user') ?? 0;

        if (!$id_tryout || !$jawaban || !$id_user) {
            $this->session->set_flashdata('error','Data tidak lengkap.');
            redirect('member/tryout');
        }

        // mulai simpan hasil_tryout
        $data_hasil = [
            'id_user' => $id_user,
            'id_tryout' => $id_tryout,
            'nilai' => null,
            'tanggal' => date('Y-m-d H:i:s')
        ];
        $this->db->insert('hasil_tryout', $data_hasil);
        $id_hasil = $this->db->insert_id();

        $total_soal = 0;
        $total_benar = 0;

        foreach ($jawaban as $id_soal => $id_opsi) {
            $total_soal++;

            // simpan jawaban_user_tryout
            $this->db->insert('jawaban_user_tryout', [
                'id_hasil' => $id_hasil,
                'id_soal'  => $id_soal,
                'id_opsi'  => $id_opsi
            ]);

            // cek kebenaran
            $opsi = $this->db->get_where('opsi_tryout',['id_opsi'=>$id_opsi])->row();
            if ($opsi && ((int)$opsi->jawaban_benar === 1)) {
                $total_benar++;
            }
        }

        // hitung nilai (persentase)
        $nilai = ($total_soal > 0) ? round(($total_benar / $total_soal) * 100, 2) : 0;

        // update nilai pada hasil_tryout
        $this->db->where('id_hasil_tryout',$id_hasil)->update('hasil_tryout',['nilai'=>$nilai]);

        $this->session->set_flashdata('success','Jawaban berhasil disimpan.');
        redirect('member/tryout/hasil/'.$id_hasil);
    }

    // Tampilkan hasil
    public function hasil($id_hasil) {
        $row = $this->db->get_where('hasil_tryout',['id_hasil_tryout'=>$id_hasil])->row();
        if (!$row) show_404();

        // hitung benar/salah lewat jawaban_user_tryout
        $jawaban = $this->db->get_where('jawaban_user_tryout',['id_hasil'=>$id_hasil])->result();

        $total_benar = 0;
        $total_salah = 0;
        $total_soal = count($jawaban);

        foreach ($jawaban as $j) {
            $opsi = $this->db->get_where('opsi_tryout',['id_opsi'=>$j->id_opsi])->row();
            if ($opsi && (int)$opsi->jawaban_benar === 1) $total_benar++;
            else $total_salah++;
        }

        $nilai = $row->nilai ?? (($total_soal>0) ? round(($total_benar/$total_soal)*100,2) : 0);

        $data = [
            'total_benar' => $total_benar,
            'total_salah' => $total_salah,
            'total_soal'  => $total_soal,
            'nilai'       => $nilai
        ];

        $this->load->view('member/tryout/hasil_jawaban', $data);
    }
}
