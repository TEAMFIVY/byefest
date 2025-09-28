<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Member extends CI_Controller {

	public function index()
	{
		$data['title'] 	= "Daftar Member | ByeFest";
		$data['member'] = $this->db
							->select('user.*, member.paket, member.tanggal_mulai, member.tanggal_berakhir, member.status')
							->from('user')
							->join('member', 'member.id_user = user.id_user', 'left')
							->where('user.level', 'member')
							->get()
							->result();

		// ✅ load ke view member, bukan user
		$this->template->load('layout/mazer','admin/member', $data);
	}

	public function simpan()
	{
		$this->db->trans_start();

		// Insert ke tabel user
		$data_user = [
			'nama'     => $this->input->post('nama'),
			'email'    => $this->input->post('email'),
			'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
			'level'    => $this->input->post('level'),
		];
		$this->db->insert('user', $data_user);
		$id_user = $this->db->insert_id();

		// Insert ke tabel member
		$data_member = [
			'id_user'         => $id_user,
			'paket'           => $this->input->post('paket', TRUE),
			'tanggal_mulai'   => date('Y-m-d'), // default hari ini
			'tanggal_berakhir'=> date('Y-m-d', strtotime('+1 month')), // default 1 bulan
			'status'          => 'aktif'
		];
		
		$this->db->insert('member', $data_member);

		$this->db->trans_complete();

		$this->session->set_flashdata('success', 'Member berhasil ditambahkan!');
		redirect('admin/member'); // ✅ balik ke halaman member
	}
	
	public function hapus($id)
	{
		$this->db->trans_start();

		// Hapus member dulu
		$this->db->delete('member', ['id_user' => $id]);

		// Baru hapus user
		$this->db->delete('user', ['id_user' => $id]);

		$this->db->trans_complete();

		$this->session->set_flashdata('notif', 'Member berhasil dihapus!');
		redirect('admin/member');
	}

	public function update()
	{
		$id_user = $this->input->post('id_user');

		// Update tabel user
		$data_user = [
			'nama'	=> $this->input->post('nama'),
			'level'	=> $this->input->post('level'),

		];	
		$this->db->where('id_user', $id_user)->update('user', $data_user);

		$data_member = [
			'paket' => $this->input->post('paket', TRUE)
		];
		$this->db->where('id_user', $this->input->post('id_user'));
		$this->db->update('member', $data_member);
		

		// Update tabel member
		if ($this->input->post('paket')) {
			$data_member = [
				'paket'            => $this->input->post('paket'),
				'tanggal_mulai'    => $this->input->post('tanggal_mulai'),
				'tanggal_berakhir' => $this->input->post('tanggal_berakhir'),
				'status'           => $this->input->post('status'),
			];
			$this->db->where('id_user', $id_user)->update('member', $data_member);
		}

		$this->session->set_flashdata('success', 'Data berhasil diupdate!');
		redirect('admin/member');
	}
}
