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
                $this->db->insert('dokumen_pesan', array(
                    'id_pesan' => $id_simpan,
                    'files' => $filename,
                    'ket' => $_POST['label'][$i]
                ));

              } else {
                //log_data($_FILES);
                //log_r($this->upload->display_errors());
                ?>
                <script type="text/javascript">
                    alert("ERROR : <?php echo $this->upload->display_errors(); ?>");
                    window.location="<?php echo base_url() ?>pesan/add"
                </script>
                <?php
                exit;
              }
            }

        }
		
 		
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