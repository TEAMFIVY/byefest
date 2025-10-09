<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class User extends CI_Controller {
	public function __construct(){
		if (!$this->session->userdata('user_id')) {
            $this->session->set_flashdata('error', 'Anda harus login terlebih dahulu.');
            redirect('auth/login');
        }
	}
	public function index()
	{
		$data['title'] 	= "Daftar User | ByeFest";
		$data['users'] = $this->db->where_in('level', ['admin','user'])->get('user')->result();
		$this->template->load('layout/mazer','admin/user', $data);
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

	public function update(){
		$id_user = $this->input->post('id_user');
		$data =[
			'nama'	=> $this->input->post('nama'),
			'level'	=> $this->input->post('level'),
		];	
		$this->db->where('id_user', $id_user);
		$this->db->update('user', $data);
		$this->session->set_flashdata('success', 'Data berhsail di Update');
		redirect('admin/user');
	}
}
