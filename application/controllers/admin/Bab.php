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
        $config['upload_path']   = './assets/materi/';
        $config['allowed_types'] = 'jpg|jpeg|png|gif';
        $config['max_size']      = 2048; // 2 MB
        $config['encrypt_name']  = TRUE; // supaya nama file unik

        $this->load->library('upload', $config);

        $files = $_FILES;
        $foto_nama = [];

        $count = count($_FILES['isi']['name']);
        for ($i = 0; $i < $count; $i++) {
            if (!empty($files['isi']['name'][$i])) {
                $_FILES['file']['name']     = $files['isi']['name'][$i];
                $_FILES['file']['type']     = $files['isi']['type'][$i];
                $_FILES['file']['tmp_name'] = $files['isi']['tmp_name'][$i];
                $_FILES['file']['error']    = $files['isi']['error'][$i];
                $_FILES['file']['size']     = $files['isi']['size'][$i];

                if ($this->upload->do_upload('file')) {
                    $data = $this->upload->data();
                    $foto_nama[] = $data['file_name'];
                }
            }
        }

        // Simpan nama file sebagai JSON
        $data = [
            'id_buku'   => $this->input->post('id_buku'),
            'judul_bab' => $this->input->post('judul_bab'),
            'urutan'    => $this->input->post('urutan'),
            'isi'       => json_encode($foto_nama), // simpan sebagai JSON
        ];

        $this->bab->insert($data);

        $this->session->set_flashdata('success', 'Bab dan foto berhasil ditambahkan.');
        return redirect('admin/buku');
    }



    // ✅ update bab
    public function update()
    {
        $id_bab = $this->input->post('id_bab');

        $data = [
            'judul_bab' => $this->input->post('judul_bab'),
            'urutan'    => $this->input->post('urutan'),
            'isi'       => $this->input->post('isi')
        ];

        $this->bab->update($id_bab, $data);

        $this->session->set_flashdata('success', 'Bab berhasil diperbarui.');
        redirect('admin/buku'); // balik ke daftar buku
    }

    // ✅ hapus bab
    public function delete()
    {
        $id_bab = $this->input->post('id');
        $this->bab->delete($id_bab);
        echo json_encode(['status' => 'success']);
        redirect('admin/buku');
    }

}
