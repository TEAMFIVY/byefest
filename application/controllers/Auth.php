<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
	public function login()
	{
		$this->load->view('login');
	}

    public function register(){
        $this->load->view('register');
    }

    public function login_aksi(){
		var_dump($this->input->post('email'));
		var_dump($this->input->post('password'));
        $email = $this->input->post('email');
		$password = $this->input->post('password');
		$user = $this->db->get_where('user', ['email' => $email])->row();
		if ($user) {
			if (password_verify($password, $user->password)) {
				$this->session->set_userdata([
					'id_user' => $user->id_user,
					'nama' => $user->nama,
					'email' => $user->email,
					'level' => $user->level,
				]);
                if($user->level == 'admin'){
                    redirect('admin/home');
                } elseif($user->level == 'member') {
                    redirect('member/home');
                } else {
					redirect('dashboard');
				}
			} else {
				$this->session->set_flashdata('error', 'Password salah');
				redirect('auth/login');
			}
		} else {
			$this->session->set_flashdata('error', 'email tidak ditemukan');
			redirect('auth/login');
		}
    }

    public function register_aksi(){
        $data = [
			'nama' => $this->input->post('nama'),
			'email' => $this->input->post('email'),
			'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
			'level' => 'user'
		];

		$this->db->insert('user', $data);
		$this->session->set_flashdata('success', 'Pendaftaran berhasil! Silakan login.');
		redirect('auth/login');
    }

    public function logout(){
        $this->session->sess_destroy();
		redirect('auth/login');
    }
}
