<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Detail_buku extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Buku_model');
        $this->load->model('Bab_model');
    }

    public function index($id = null)
    {   
        if (!$id) show_404();

        $data['book'] = $this->Buku_model->get_by_id($id);
        $data['babs'] = $this->Bab_model->get_by_buku($id);
        $data['title'] = $data['book']->judul ?? 'Detail Buku';

        $this->load->view('member/detail_buku', $data);
    }
}
