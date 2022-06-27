<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Rw extends CI_Controller
{
    var $judul_page = 'Data RW';
    function __construct()
    {
        parent::__construct();
        $this->load->model('Rw_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $rw = $this->Rw_model->get_all();

        $data = array(
            'rw_data' => $rw,
            'judul_page' => $this->judul_page,
            'konten' => 'rw/rw_list',
        );
        $this->load->view('v_index', $data);
    }

    

    public function create() 
    {
        $data = array(
            'judul_page' => $this->judul_page,
            'konten' => 'rw/rw_form',
            'judul_form' => 'Tambah '.$this->judul_page,
            'button' => 'Simpan',
            'action' => site_url('rw/create_action'),
	    'id_rw' => set_value('id_rw'),
	    'rw' => set_value('rw'),
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
		'rw' => $this->input->post('rw',TRUE),
	    );

            $this->Rw_model->insert($data);
            $this->session->set_flashdata('message', message('success','Data berhasil disimpan'));
            redirect(site_url('rw'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Rw_model->get_by_id($id);

        if ($row) {
            $data = array(
                'judul_page' => $this->judul_page,
                'konten' => 'rw/rw_form',
                'judul_form' => 'Ubah '.$this->judul_page,
                'button' => 'Update',
                'action' => site_url('rw/update_action'),
		'id_rw' => set_value('id_rw', $row->id_rw),
		'rw' => set_value('rw', $row->rw),
	    );
            $this->load->view('v_index', $data);
        } else {
            $this->session->set_flashdata('message', message('danger','Data tidak ditemukan'));
            redirect(site_url('rw'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_rw', TRUE));
        } else {
            $data = array(
		'rw' => $this->input->post('rw',TRUE),
	    );

            $this->Rw_model->update($this->input->post('id_rw', TRUE), $data);
            $this->session->set_flashdata('message', message('success','Data berhasil diupdate'));
            redirect(site_url('rw'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Rw_model->get_by_id($id);

        if ($row) {
            $this->Rw_model->delete($id);
            $this->session->set_flashdata('message', message('success','Data berhasil dihapus'));
            redirect(site_url('rw'));
        } else {
            $this->session->set_flashdata('message', message('danger','Data tidak ditemukan'));
            redirect(site_url('rw'));
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
        $config['file_name'] = 'import_rw';

        $this->upload->initialize($config); // Load konfigurasi uploadnya
        if($this->upload->do_upload('file_excel')){ // Lakukan upload dan Cek jika proses upload berhasil
            // Jika berhasil :
            $return = array('result' => 'success', 'file' => $this->upload->data(), 'error' => '');
        }else{
            // Jika gagal :
            $return = array('result' => 'failed', 'file' => '', 'error' => $this->upload->display_errors());

            $this->session->set_flashdata('message',message($return['error'],'error'));
            redirect('rw','refresh');
        }

		include APPPATH.'third_party/PHPExcel/PHPExcel.php';

		$filename = 'import_rw.xlsx';
					
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
		'rw' => $rw['A'],
	);

				$this->db->insert('rw', $data);
			}
			
		}

		if ($this->db->trans_status() === FALSE)
		{
	        $this->db->trans_rollback();
	        $this->session->set_flashdata('message', message('gagal server,silahkan ulangi','error'));
			redirect('rw','refresh');
		}
		else
		{
	        $this->db->trans_commit();
	        $this->session->set_flashdata('message', message('data berhasil diimport','success'));
			redirect('rw','refresh');
		}

    }

    public function _rules() 
    {
	$this->form_validation->set_rules('rw', 'rw', 'trim|required');

	$this->form_validation->set_rules('id_rw', 'id_rw', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Rw.php */
/* Location: ./application/controllers/Rw.php */
/* Please DO NOT modify this information : */
/* Generated by Boy Kurniawan 2022-05-25 08:08:12 */
/* https://jualkoding.com */