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
}
