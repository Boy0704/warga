<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Warga extends CI_Controller
{
    var $judul_page = 'Data Warga';
    function __construct()
    {
        parent::__construct();
        $this->load->model('Warga_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $warga = $this->Warga_model->get_all();

        $data = array(
            'warga_data' => $warga,
            'judul_page' => $this->judul_page,
            'konten' => 'warga/warga_list',
        );
        $this->load->view('v_index', $data);
    }

    

    public function create() 
    {
        $data = array(
            'judul_page' => $this->judul_page,
            'konten' => 'warga/warga_form',
            'judul_form' => 'Tambah '.$this->judul_page,
            'button' => 'Simpan',
            'action' => site_url('warga/create_action'),
	    'id_warga' => set_value('id_warga'),
	    'nik' => set_value('nik'),
	    'nama' => set_value('nama'),
	    'tempat_lahir' => set_value('tempat_lahir'),
	    'tgl_lahir' => set_value('tgl_lahir'),
	    'jk' => set_value('jk'),
	    'usia' => set_value('usia'),
	    'id_agama' => set_value('id_agama'),
	    'kewarganegaraan' => set_value('kewarganegaraan'),
	    'no_telp' => set_value('no_telp'),
	    'email' => set_value('email'),
	);
        $this->load->view('v_index', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'nik' => $this->input->post('nik',TRUE),
		'nama' => $this->input->post('nama',TRUE),
		'tempat_lahir' => $this->input->post('tempat_lahir',TRUE),
		'tgl_lahir' => $this->input->post('tgl_lahir',TRUE),
		'jk' => $this->input->post('jk',TRUE),
		'usia' => $this->input->post('usia',TRUE),
		'id_agama' => $this->input->post('id_agama',TRUE),
		'kewarganegaraan' => $this->input->post('kewarganegaraan',TRUE),
		'no_telp' => $this->input->post('no_telp',TRUE),
		'email' => $this->input->post('email',TRUE),
	    );

            $this->Warga_model->insert($data);
            $this->db->insert('app_user', array(
            	'nama_lengkap' => $this->input->post('nama'),
            	'username' => $this->input->post('nik'),
            	'password' => md5( $this->input->post('password') ),
            	'level' => 'user',
            	'foto' => 'no_image.png'
            ));
            $this->session->set_flashdata('message', message('success','Data berhasil disimpan'));
            redirect(site_url('warga'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Warga_model->get_by_id($id);

        if ($row) {
            $data = array(
                'judul_page' => $this->judul_page,
                'konten' => 'warga/warga_form',
                'judul_form' => 'Ubah '.$this->judul_page,
                'button' => 'Update',
                'action' => site_url('warga/update_action'),
		'id_warga' => set_value('id_warga', $row->id_warga),
		'nik' => set_value('nik', $row->nik),
		'nama' => set_value('nama', $row->nama),
		'tempat_lahir' => set_value('tempat_lahir', $row->tempat_lahir),
		'tgl_lahir' => set_value('tgl_lahir', $row->tgl_lahir),
		'jk' => set_value('jk', $row->jk),
		'usia' => set_value('usia', $row->usia),
		'id_agama' => set_value('id_agama', $row->id_agama),
		'kewarganegaraan' => set_value('kewarganegaraan', $row->kewarganegaraan),
		'no_telp' => set_value('no_telp', $row->no_telp),
		'email' => set_value('email', $row->email),
	    );
            $this->load->view('v_index', $data);
        } else {
            $this->session->set_flashdata('message', message('danger','Data tidak ditemukan'));
            redirect(site_url('warga'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_warga', TRUE));
        } else {
            $data = array(
		'nik' => $this->input->post('nik',TRUE),
		'nama' => $this->input->post('nama',TRUE),
		'tempat_lahir' => $this->input->post('tempat_lahir',TRUE),
		'tgl_lahir' => $this->input->post('tgl_lahir',TRUE),
		'jk' => $this->input->post('jk',TRUE),
		'usia' => $this->input->post('usia',TRUE),
		'id_agama' => $this->input->post('id_agama',TRUE),
		'kewarganegaraan' => $this->input->post('kewarganegaraan',TRUE),
		'no_telp' => $this->input->post('no_telp',TRUE),
		'email' => $this->input->post('email',TRUE),
	    );

            $this->Warga_model->update($this->input->post('id_warga', TRUE), $data);
            $this->session->set_flashdata('message', message('success','Data berhasil diupdate'));
            redirect(site_url('warga'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Warga_model->get_by_id($id);

        if ($row) {
            $this->Warga_model->delete($id);
            $this->db->where('username', $row->nik);
            $this->db->delete('app_user');
            $this->session->set_flashdata('message', message('success','Data berhasil dihapus'));
            redirect(site_url('warga'));
        } else {
            $this->session->set_flashdata('message', message('danger','Data tidak ditemukan'));
            redirect(site_url('warga'));
        }
    }

    public function import_excel()
    {
        // Fungsi untuk melakukan proses upload file
        $return = array();
        $this->load->library('upload'); // Load librari upload

        $config['upload_path'] = './files/excel/';
        $config['allowed_types'] = 'xlsx';
        $config['max_size'] = '2048';
        $config['overwrite'] = true;
        $config['file_name'] = 'import_warga';

        $this->upload->initialize($config); // Load konfigurasi uploadnya
        if($this->upload->do_upload('file_excel')){ // Lakukan upload dan Cek jika proses upload berhasil
            // Jika berhasil :
            $return = array('result' => 'success', 'file' => $this->upload->data(), 'error' => '');
        }else{
            // Jika gagal :
            $return = array('result' => 'failed', 'file' => '', 'error' => $this->upload->display_errors());

            $this->session->set_flashdata('message',message($return['error'],'error'));
            redirect('warga','refresh');
        }

		include APPPATH.'third_party/PHPExcel/PHPExcel.php';

		$filename = 'import_warga.xlsx';
					
		$excelreader = new PHPExcel_Reader_Excel2007();
		$loadexcel = $excelreader->load('files/excel/'.$filename.''); // Load file yang tadi diupload ke folder excel
		$sheet = $loadexcel->getActiveSheet()->toArray(null, true, true ,true);
		
        //skip untuk header
		unset($sheet[1]);

        $this->db->trans_begin();

		foreach ($sheet as $rw) {
			if (empty($rw['A'])) {
				// code...
			} else {
				$data = array(
		'nik' => $rw['A'],
		'nama' => $rw['B'],
		'tempat_lahir' => $rw['C'],
		'tgl_lahir' => $rw['D'],
		'jk' => $rw['E'],
		'usia' => $rw['F'],
		'id_agama' => $rw['G'],
		'kewarganegaraan' => $rw['H'],
		'no_telp' => $rw['I'],
		'email' => $rw['J'],
	);

				$this->db->insert('warga', $data);
			}
			
		}

		if ($this->db->trans_status() === FALSE)
		{
	        $this->db->trans_rollback();
	        $this->session->set_flashdata('message', message('gagal server,silahkan ulangi','error'));
			redirect('warga','refresh');
		}
		else
		{
	        $this->db->trans_commit();
	        $this->session->set_flashdata('message', message('data berhasil diimport','success'));
			redirect('warga','refresh');
		}

    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nik', 'nik', 'trim|required');
	$this->form_validation->set_rules('nama', 'nama', 'trim|required');
	$this->form_validation->set_rules('tempat_lahir', 'tempat lahir', 'trim|required');
	$this->form_validation->set_rules('tgl_lahir', 'tgl lahir', 'trim|required');
	$this->form_validation->set_rules('jk', 'jk', 'trim|required');
	$this->form_validation->set_rules('usia', 'usia', 'trim|required');
	$this->form_validation->set_rules('id_agama', 'id agama', 'trim|required');
	$this->form_validation->set_rules('kewarganegaraan', 'kewarganegaraan', 'trim|required');
	$this->form_validation->set_rules('no_telp', 'no telp', 'trim|required');
	$this->form_validation->set_rules('email', 'email', 'trim|required');

	$this->form_validation->set_rules('id_warga', 'id_warga', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Warga.php */
/* Location: ./application/controllers/Warga.php */
/* Please DO NOT modify this information : */
/* Generated by Boy Kurniawan 2022-05-25 08:08:28 */
/* https://jualkoding.com */