<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends CI_Controller {
    public function __construct()
	{
       parent :: __construct();
       $this->load->model('Model_buku');
       $this->load->model('Model_penerbit');
	}


	    public function index()
	{
        $this->load->view('templates/header');
		$this->load->view('beranda');
        $this->load->view('templates/footer');
	}
    public function daftarBuku()
	{
        $this->load->model('Model_buku');
        $this->load->model('Model_penerbit');

        $data['data_buku'] = $this->Model_buku->get_all_buku()->result_array();
        $data['data_penerbit'] = $this->Model_penerbit->get_all_penerbit()->result_array();
        $data['title'] = "Daftar Buku";
        $this->load->view('templates/header', $data);
		$this->load->view('daftarbuku');
        $this->load->view('templates/modal');
        $this->load->view('templates/footer');
	}
   
    // public function kepemilikan()
	// {
    //     $this->load->model('Model_buku');
    //     $data['data_buku'] = $this->Model_buku->getDataSpesific('tb_penerbit')->result_array();

    //     $data['title'] = "BookStore Jae";
    //     $this->load->view('templates/header', $data);
	// 	$this->load->view('vSpesifik', $data);
    //     $this->load->view('templates/footer');
	// }

    public function simpanBuku(){
        $data = array(
            'judul_buku' => $this-> input -> post ('judulBuku'), 
            'tahun_terbit' => $this-> input -> post ('tahunTerbit'),
            'kode_penerbit' => $this-> input -> post ('kodePenerbit')
        );
        $this->Model_buku->simpan_buku($data);

        redirect ('pages/daftarBuku');
    }



    public function viewEditBuku(){

        $kode = $this->uri->segment(3);

        $this->load->model('Model_buku');
		$this->load->model('Model_penerbit');

        $data['data_buku'] = $this->Model_buku->get_buku_by_kode($kode)->row_array();
		$data['data_penerbit'] = $this->Model_penerbit->get_all_penerbit()->result_array();

        $data['title'] = "Daftar Buku";

        $this->load->view('templates/header', $data);
		$this->load->view('edit_buku');
        $this->load->view('templates/footer');
    }

    public function editBuku(){
        $data = array(
            'judul_buku' => $this->input->post('judulbuku'),
            'tahun_terbit' => $this->input->post('tahunterbit'),
            'kode_penerbit' => $this->input->post('kodepenerbit')
        );
        $kode = $this->input->post('kodebuku');
        $this->Model_buku->update_buku($data, $kode);
        $this->session->set_flashdata('pesan',
        '<div class="alert alert-success" role="alert">
            Data telah diupdate
          </div>');

        redirect('pages/daftarbuku');

    }

    public function hapusBuku()
	{
        $this->load->model('Model_buku');
        $kode = $this-> uri -> segment(3);
        $this->Model_buku->hapus_buku($kode);

        redirect('pages/daftarBuku');
        
	}

    //PENERBIT
	public function daftarPenerbit()
	{

		$this->load->model('Model_penerbit');

		$data['data_penerbit'] = $this->Model_penerbit->get_all_penerbit()->result_array();

		$data['title'] = "Daftar Penerbit";
		$this->load->view('templates/header', $data);
		$this->load->view('daftarPenerbit', $data);
		$this->load->view('templates/modal-penerbit');
		$this->load->view('templates/footer');
	}

    // public function daftarPenerbit()
	// {
    //     $data['data_penerbit'] = $this->db->get('tb_penerbit')->result_array();
    //     $data['title'] = "Daftar Penerbit";
    //     $this->load->view('templates/header', $data);
	// 	$this->load->view('daftarpenerbit', $data);
    //     $this->load->view('templates/footer');
	// }

	public function hapus_penerbit()
	{
		$connection = mysqli_connect('localhost', 'root', '', 'db_buku');
		$kode = $this->uri->segment(3);

		if (!$connection){
			die("Databases connection failed: ". mysqli_connect_error());
		}

		$delete_query = "DELETE FROM tb_penerbit WHERE kode_penerbit = $kode";

		if (mysqli_query($connection, $delete_query)){
			$this->session->set_flashdata('pesan',
			'<div class="alert alert-success" role="alert">
				Data telah di hapus
			  </div>');

			redirect('pages/daftarpenerbit');

			exit();
		} else {
			if (mysqli_errno($connection) == 1451) {

				$this->session->set_flashdata('pesan',
				'<div class="alert alert-danger" role="alert">
					Data Gagal di Hapus Karna Constraint Data
				  </div>');

				redirect('pages/daftarpenerbit');

			}else {
				$error_message = "Error deleting data: " . mysqli_error($connection);
		}
		}
	}

	public function simpan_penerbit()
	{
		$data = array(
			'nama_penerbit' => $this->input->post('namapenerbit'),
			'alamat_penerbit' => $this->input->post('alamatpenerbit')
		);
			$this->Model_penerbit->simpan_penerbit($data);
			$this->session->set_flashdata('pesan',
			'<div class="alert alert-success" role="alert">
				Data berhasil tersimpan
		  	</div>');

			redirect('pages/daftarpenerbit');
	}

	public function show_edit_penerbit()
	{
		$kode = $this->uri->segment(3);

		$this->load->model('Model_penerbit');
		
		$data['data_penerbit'] = $this->Model_penerbit->get_penerbit_by_kode($kode)->row_array();

		$data['title'] = "Daftar Penerbit";

		$this->load->view('templates/header', $data);
		$this->load->view('edit_penerbit');
		$this->load->view('templates/footer');

	}

	public function update_penerbit()
	{
			$data = array(
				'nama_penerbit' => $this->input->post('namapenerbit'),
				'alamat_penerbit' => $this->input->post('alamatpenerbit')
			);
			$kode = $this->input->post('kodepenerbit');
			$this->Model_penerbit->update_penerbit($data, $kode);
			$this->session->set_flashdata('pesan',
			'<div class="alert alert-success" role="alert">
				Data telah diupdate
		  	</div>');
	
			redirect('pages/daftarpenerbit');
	}


}