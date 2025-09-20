<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bab extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Bab_model', 'bab');
    }

    // ✅ ambil semua bab milik 1 buku
    public function getBabByBuku($id_buku)
    {
        $bab = $this->bab->get_by_buku($id_buku);
        echo json_encode($bab);
    }

    // ✅ ambil detail bab berdasarkan id_bab
    public function getBab($id_bab)
    {
        $bab = $this->bab->find($id_bab);
        echo json_encode($bab);
    }

    // ✅ insert / update bab
//     public function store()
// {
//     $id_bab = $this->input->post('id_bab');
//     $data = [
//         'id_buku'   => $this->input->post('id_buku'),  // harus sama dengan DB
//         'judul_bab' => $this->input->post('judul_bab'),
//         'urutan'    => $this->input->post('urutan'),
//         'isi'       => $this->input->post('isi')
//     ];
    

//     if ($id_bab) {
//         $ok = $this->bab->update($id_bab, $data);
//     } else {
//         $ok = $this->bab->insert($data);
//     }

//     if ($ok) {
//         echo json_encode(['status' => 'success']);
//     } else {
//         http_response_code(500);
//         echo json_encode(['status' => 'error', 'message' => 'Insert/update gagal']);
//     }
// }


    // public function store()
    // {
    //     // Ambil POST
    //     $id_bab = $this->input->post('id_bab');
    //     $id_buku = $this->input->post('id_buku');
    //     $judul_bab = $this->input->post('judul_bab');
    //     $urutan = $this->input->post('urutan');
    //     $isi = $this->input->post('isi');

        

    //     // Validasi minimal
    //     if (!$id_buku || !$judul_bab || !$urutan) {
    //         echo json_encode([
    //             'status' => 'error',
    //             'message' => 'id_buku, judul_bab, dan urutan wajib diisi!'
    //         ]);
    //         return;
    //     }

    //     // Cek id_buku ada di table buku
    //     $this->load->model('Buku_model', 'buku');
    //     $bukuExist = $this->buku->find($id_buku);
    //     if (!$bukuExist) {
    //         echo json_encode([
    //             'status' => 'error',
    //             'message' => 'Buku dengan id '.$id_buku.' tidak ditemukan!'
    //         ]);
    //         return;
    //     }

    //     // Siapkan data
    //     $data = [
    //         'id_buku'   => $id_buku,
    //         'judul_bab' => $judul_bab,
    //         'urutan'    => $urutan,
    //         'isi'       => $isi
    //     ];

    //     log_message('debug', 'Data Bab: '.print_r($data,true));
    //     // Insert / Update
    //     if ($id_bab) {
    //         $ok = $this->bab->update($id_bab, $data);
    //     } else {
    //         $ok = $this->bab->insert($data);
    //     }

    //     if ($ok) {
    //         echo json_encode(['status' => 'success']);
    //     } else {
    //         echo json_encode([
    //             'status' => 'error',
    //             'message' => 'Gagal menyimpan ke database!'
    //         ]);
    //     }
    // }

    public function store()
{
    $id_bab = $this->input->post('id_bab');
    $data = [
        'id_buku'   => $this->input->post('id_buku'),
        'judul_bab' => $this->input->post('judul_bab'),
        'urutan'    => $this->input->post('urutan'),
        'isi'       => $this->input->post('isi')
    ];

    // Debug: lihat data yang diterima
    log_message('debug', 'Data Bab diterima: '.print_r($data,true));

    if ($id_bab) {
        $ok = $this->bab->update($id_bab, $data);
    } else {
        $ok = $this->bab->insert($data);
    }

    if ($ok) {
        echo json_encode(['status' => 'success']);
    } else {
        // Ambil error dari database
        $db_error = $this->db->error();
        log_message('error', 'Insert/Update Bab gagal: '.print_r($db_error,true));
        http_response_code(500);
        echo json_encode([
            'status' => 'error',
            'message' => $db_error
        ]);
    }
}


    // ✅ hapus bab
    public function delete($id_bab)
    {
        $this->bab->delete($id_bab);
        echo json_encode(['status' => 'success']);
    }
}
