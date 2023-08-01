<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_penerbit extends CI_Model {

	public function get_all_penerbit()
	{
		// $this->load->view('welcome_message');

        // // $this->db->join('tb_penerbit', 'tb_penerbit.kode_penerbit = tb_buku.kode_penerbit');
        // $query = $this->db->get();

        $this->db->select('*');
        $this->db->from('tb_penerbit');
        $query = $this->db->get();
        // $query = $this->db->get('tb_penerbit');
        return $query;
	}

    public function hapus_penerbit($kode)
    {
        $this->db->where('kode_penerbit',$kode);
        $this->db->delete('tb_penerbit');
    }

    public function simpan_penerbit($data)
    {
        $this->db->insert('tb_penerbit', $data);
    }

    public function update_penerbit($data, $kode)
    {
        $this->db->where('kode_penerbit', $kode);
        $this->db->update('tb_penerbit', $data);
    }

    public function get_penerbit_by_kode($kode)
    {
        return $this->db->get_where('tb_penerbit', array('kode_penerbit' => $kode));

    }
}