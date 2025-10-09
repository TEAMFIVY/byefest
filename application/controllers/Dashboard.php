<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	public function index()
	{
		$this->load->view('dashboard');
	}
    
    public function bacaan(){
        $data['buku'] = $this->db->get('buku')->result();
        $this->load->view('bacaan',$data);
    }

    public function daftar(){
        $this->load->view('pilih_paket');
    }

    public function simpan() {
        $id_user = $this->session->userdata('id_user');
		$paket   = $this->input->post('paket');
		$tanggal_mulai = date('Y-m-d');

		switch ($paket) {
			case 'mingguan':
				$tanggal_berakhir = date('Y-m-d', strtotime('+7 days'));
				break;
			case 'bulanan':
				$tanggal_berakhir = date('Y-m-d', strtotime('+1 month'));
				break;
			case 'tahunan':
				$tanggal_berakhir = date('Y-m-d', strtotime('+1 year'));
				break;
			default:
				$tanggal_berakhir = $tanggal_mulai;
				break;
		}

		// Cek apakah user sudah terdaftar di member
		$cek_member = $this->db->get_where('member', ['id_user' => $id_user])->row();

		if (!$cek_member) {
			// Tambahkan data member baru
			$data_member = [
				'id_user'          => $id_user,
				'paket'            => $paket,
				'tanggal_mulai'    => $tanggal_mulai,
				'tanggal_berakhir' => $tanggal_berakhir,
				'status'           => 'aktif'
			];
			$this->db->insert('member', $data_member);
		} else {
			// Update data lama
			$update = [
				'paket'            => $paket,
				'tanggal_mulai'    => $tanggal_mulai,
				'tanggal_berakhir' => $tanggal_berakhir,
				'status'           => 'aktif'
			];
			$this->db->where('id_user', $id_user);
			$this->db->update('member', $update);
		}

		// Ubah level user menjadi member
		$this->db->where('id_user', $id_user);
		$this->db->update('user', ['level' => 'member']);

		redirect('dashboard/pembayaran');
    }

    public function pembayaran() {
		$id_user = $this->session->userdata('id_user');

		// Ambil data user & member
		$user = $this->db->get_where('user', ['id_user' => $id_user])->row();
		$member = $this->db->get_where('member', ['id_user' => $id_user, 'status' => 'aktif'])->row();

		if (!$member) {
			redirect('dashboard/daftar');
		}

		
		$harga = 0;
		switch ($member->paket) {
			case 'mingguan': $harga = 30000; break;
			case 'bulanan':  $harga = 120000; break;
			case 'tahunan':  $harga = 1000000; break;
		}

		$data = [
			'user' => $user,
			'member' => $member,
			'harga' => $harga
		];

		$this->load->view('pembayaran', $data);
	}
}
