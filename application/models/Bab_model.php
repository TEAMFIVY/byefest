<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bab_model extends CI_Model {
    private $table = 'bab';

    // Ambil semua bab berdasarkan id_buku (FK)
    public function get_by_buku($id_buku) {
        return $this->db->where('id_buku', $id_buku)
                        ->order_by('urutan', 'ASC')
                        ->get($this->table)
                        ->result();
    }

    // Cari 1 bab
    public function find($id_bab) {
        return $this->db->get_where($this->table, ['id_bab' => $id_bab])->row();
    }

    // Insert bab
    // public function insert($data) {
    //     return $this->db->insert($this->table, $data);
    // }

    public function get_by_id($id)
    {
        return $this->db->get_where('buku', ['id' => $id])->row();
    }

    public function insert($data) {
    $this->db->insert($this->table, $data);
    if($this->db->affected_rows() > 0){
        return true;
    } else {
        log_message('error', 'Insert Bab gagal: '.json_encode($data));
        return false;
    }
}

    // Update bab
    public function update($id_bab, $data) {
        return $this->db->where('id_bab', $id_bab)->update($this->table, $data);
    }

    // Hapus bab
    public function delete($id_bab) {
        return $this->db->delete($this->table, ['id_bab' => $id_bab]);
    }
}
