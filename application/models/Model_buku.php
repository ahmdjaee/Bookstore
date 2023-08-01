<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_buku extends CI_Model {

	public function get_all_buku()
	{
		// $this->load->view('welcome_message');
        $this->db->select('*');
        $this->db->from('tb_buku');
        $this->db->join('tb_penerbit', 'tb_penerbit.kode_penerbit = tb_buku.kode_penerbit');
        $query = $this->db->get();

        return $query;
	}

    public function simpan_buku($data){
        $this->db->insert('tb_buku', $data);
    }

    public function get_buku_by_kode($kode)
    {
        return $this->db->get_where('tb_buku', array('kode_buku' => $kode));

    }

    // public function getDataSpesific($kode){
    //     $query = $this->db->query("SELECT * FROM tb_buku WHERE kode_penerbit = 1");

    //     return $query;
    // }

    public function update_buku($data, $kode)
    {
        $this->db->where('kode_buku', $kode);
        $this->db->update('tb_buku', $data);
    }

    public function hapus_buku($kode){
        $this->db->where('kode_buku', $kode);
        $this->db->delete('tb_buku');
    }
}
