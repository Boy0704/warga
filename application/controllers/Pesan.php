<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Pesan extends CI_Controller {

	public function index()
	{
		$data = array(
		   'judul_page' => "Pesan",
		   'konten' => "pesan/view",
		);
		$this->load->view('v_index', $data);
	}

	public function simpan()
	{
		if ($this->session->userdata('level') == 'admin') {
			$ke = $this->input->post('penerima');
			$pesan = $this->input->post('pesan');

			$data = array(
				'ke' => $ke,
				'dari' => 'admin',
				'pesan' => $pesan,
				'created_at' => get_waktu()
	 		);
		} else {
			$pesan = $this->input->post('pesan');

			$data = array(
				'ke' => 'admin',
				'dari' => $this->session->userdata('username'),
				'pesan' => $pesan,
				'created_at' => get_waktu()
	 		);
		}
		
 		$this->db->insert('pesan', $data);
 		$this->session->set_flashdata('message', message('success','Pesan berhasil dikirim'));
            redirect(site_url('pesan'));
	}

	public function add()
	{
		$data = array(
		   'judul_page' => "Pesan",
		   'judul_form' => 'Tambah Pesan',
		   'konten' => "pesan/add",
		);
		$this->load->view('v_index', $data);
	}

	public function lihat()
	{
		$data = array(
		   'judul_page' => "Pesan",
		   'judul_form' => 'Detail Pesan',
		   'konten' => "pesan/detail",
		);
		$this->load->view('v_index', $data);
	}

}

/* End of file Pesan.php */
/* Location: ./application/controllers/Pesan.php */