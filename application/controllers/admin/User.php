<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class User extends CI_Controller {
	public function index()
	{
		$data['title'] 	= "Data User | ByeFest";
		$data['users']	= $this->db->get('user')->result();
		$this->template->load('layout/main','admin/user', $data);
	}

	public function simpan()
	{
		$this->db->where('nama', $this->input->post('nama'));
		$cek = $this->db->get('user')->row();
		if($cek==NULL){
			$data= [
			'nama'			=> $this->input->post('nama'),
			'email'			=> $this->input->post('email'),
			'password'		=> md5($this->input->post('password')),
			'level'			=> $this->input->post('level')
		];
		$this->db->insert('user', $data);
		$this->session->set_flashdata('success', 'Data berhasil ditambahkan!');
	} else {
		$this->session->set_flashdata('failed', 'Data sudah digunakan!');
	}
		redirect('admin/user');
	}

	public function hapus($id)
	{
		$where = [
			'id_user'	=> $id
		];
		$this->db->delete('user', $where);
		$this->session->set_flashdata('notif', 'Data berhasil dihapus!');
		redirect('admin/user');
	}

	public function edit($id){
		
	}
}
