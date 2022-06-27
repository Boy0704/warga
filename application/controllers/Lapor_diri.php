<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Lapor_diri extends CI_Controller
{
    var $judul_page = 'Lapor Diri';
    function __construct()
    {
        parent::__construct();
        $this->load->model('Lapor_diri_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $lapor_diri = $this->Lapor_diri_model->get_all();

        $data = array(
            'lapor_diri_data' => $lapor_diri,
            'judul_page' => $this->judul_page,
            'konten' => 'lapor_diri/lapor_diri_list',
        );
        $this->load->view('v_index', $data);
    }

    

    public function create() 
    {
        $data = array(
            'judul_page' => $this->judul_page,
            'konten' => 'lapor_diri/lapor_diri_form',
            'judul_form' => 'Tambah '.$this->judul_page,
            'button' => 'Simpan',
            'action' => site_url('lapor_diri/create_action'),
	    'id_lapor' => set_value('id_lapor'),
	    'nik' => set_value('nik'),
	    'rt' => set_value('rt'),
	    'rw' => set_value('rw'),
	    'alamat' => set_value('alamat'),
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
		'rt' => $this->input->post('rt',TRUE),
		'rw' => $this->input->post('rw',TRUE),
		'alamat' => $this->input->post('alamat',TRUE),
	    );

            $this->Lapor_diri_model->insert($data);
            $id_simpan = $this->db->insert_id();

             // Count total files
            $countfiles = count($_FILES['files']['name']);

            // Looping all files
            for($i=0;$i<$countfiles;$i++){

                if(!empty($_FILES['files']['name'][$i])){

                  // Define new $_FILES array - $_FILES['file']
                  $_FILES['file']['name'] = $_FILES['files']['name'][$i];
                  $_FILES['file']['type'] = $_FILES['files']['type'][$i];
                  $_FILES['file']['tmp_name'] = $_FILES['files']['tmp_name'][$i];
                  $_FILES['file']['error'] = $_FILES['files']['error'][$i];
                  $_FILES['file']['size'] = $_FILES['files']['size'][$i];

                  // Set preference
                  $config1['upload_path'] = 'image/file/'; 
                  $config1['allowed_types'] = 'jpg|jpeg|png|gif|pdf';
                  $config1['max_size'] = '20000'; // max_size in kb
                  $config1['file_name'] = 'doc_'.time();

                  //Load upload library
                  $this->load->library('upload',$config1); 
                  $this->upload->initialize($config1);

                  // File upload
                  if($this->upload->do_upload('file')){
                    // Get data about the file
                    $uploadData = $this->upload->data();
                    $filename = $uploadData['file_name'];
                    // Initialize array
                    $this->db->insert('dokumen', array(
                        'id_lapor' => $id_simpan,
                        'files' => $filename,
                        'ket' => $_POST['label'][$i]
                    ));

                  } else {
                    //log_data($_FILES);
                    //log_r($this->upload->display_errors());
                    ?>
                    <script type="text/javascript">
                        alert("ERROR : <?php echo $this->upload->display_errors(); ?>");
                        window.location="<?php echo base_url() ?>lapor_diri/create"
                    </script>
                    <?php
                    exit;
                  }
                }

            }
            $this->session->set_flashdata('message', message('success','Data berhasil disimpan'));
            redirect(site_url('lapor_diri'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Lapor_diri_model->get_by_id($id);

        if ($row) {
            $data = array(
                'judul_page' => $this->judul_page,
                'konten' => 'lapor_diri/lapor_diri_form',
                'judul_form' => 'Ubah '.$this->judul_page,
                'button' => 'Update',
                'action' => site_url('lapor_diri/update_action'),
		'id_lapor' => set_value('id_lapor', $row->id_lapor),
		'nik' => set_value('nik', $row->nik),
		'rt' => set_value('rt', $row->rt),
		'rw' => set_value('rw', $row->rw),
		'alamat' => set_value('alamat', $row->alamat),
	    );
            $this->load->view('v_index', $data);
        } else {
            $this->session->set_flashdata('message', message('danger','Data tidak ditemukan'));
            redirect(site_url('lapor_diri'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_lapor', TRUE));
        } else {
            $data = array(
		'nik' => $this->input->post('nik',TRUE),
		'rt' => $this->input->post('rt',TRUE),
		'rw' => $this->input->post('rw',TRUE),
		'alamat' => $this->input->post('alamat',TRUE),
	    );

            $this->Lapor_diri_model->update($this->input->post('id_lapor', TRUE), $data);
            $this->session->set_flashdata('message', message('success','Data berhasil diupdate'));
            redirect(site_url('lapor_diri'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Lapor_diri_model->get_by_id($id);

        if ($row) {
            $this->Lapor_diri_model->delete($id);
            $this->session->set_flashdata('message', message('success','Data berhasil dihapus'));
            redirect(site_url('lapor_diri'));
        } else {
            $this->session->set_flashdata('message', message('danger','Data tidak ditemukan'));
            redirect(site_url('lapor_diri'));
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
        $config['file_name'] = 'import_lapor_diri';

        $this->upload->initialize($config); // Load konfigurasi uploadnya
        if($this->upload->do_upload('file_excel')){ // Lakukan upload dan Cek jika proses upload berhasil
            // Jika berhasil :
            $return = array('result' => 'success', 'file' => $this->upload->data(), 'error' => '');
        }else{
            // Jika gagal :
            $return = array('result' => 'failed', 'file' => '', 'error' => $this->upload->display_errors());

            $this->session->set_flashdata('message',message($return['error'],'error'));
            redirect('lapor_diri','refresh');
        }

		include APPPATH.'third_party/PHPExcel/PHPExcel.php';

		$filename = 'import_lapor_diri.xlsx';
					
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
		'rt' => $rw['B'],
		'rw' => $rw['C'],
		'alamat' => $rw['D'],
	);

				$this->db->insert('lapor_diri', $data);
			}
			
		}

		if ($this->db->trans_status() === FALSE)
		{
	        $this->db->trans_rollback();
	        $this->session->set_flashdata('message', message('gagal server,silahkan ulangi','error'));
			redirect('lapor_diri','refresh');
		}
		else
		{
	        $this->db->trans_commit();
	        $this->session->set_flashdata('message', message('data berhasil diimport','success'));
			redirect('lapor_diri','refresh');
		}

    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nik', 'nik', 'trim|required');
	$this->form_validation->set_rules('rt', 'rt', 'trim|required');
	$this->form_validation->set_rules('rw', 'rw', 'trim|required');
	$this->form_validation->set_rules('alamat', 'alamat', 'trim|required');

	$this->form_validation->set_rules('id_lapor', 'id_lapor', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Lapor_diri.php */
/* Location: ./application/controllers/Lapor_diri.php */
/* Please DO NOT modify this information : */
/* Generated by Boy Kurniawan 2022-06-27 15:00:30 */
/* https://jualkoding.com */