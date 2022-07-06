<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class App extends CI_Controller {


     public function index()
     {
          if ($this->session->userdata('level') == '') {
               redirect('login');
          }
          $level = $this->session->userdata('level');
          if ($level == 'admin' || $level == 'superadmin') {
               $konten = 'home/view';
          } else {
               $konten = 'home/view';
          }

          $data = array(
               'judul_page' => "Dashboard",
               'konten' => $konten,
          );
          $this->load->view('v_index', $data);
     }

     public function pencarian()
     {
          if ($this->session->userdata('level') == '') {
               redirect('login');
          }
          $level = $this->session->userdata('level');
          if ($level == 'admin' || $level == 'superadmin') {
               $konten = 'pencarian';
          } else {
               $konten = 'pencarian';
          }

          $data = array(
               'judul_page' => "Pencarian",
               'konten' => $konten,
          );
          $this->load->view('v_index', $data);
     }


     public function update_foto($id_member)
     {
          $foto = upload_gambar_biasa('user', 'image/user/', 'jpg|png|jpeg', 10000, 'foto');
          $foto_identitas = upload_gambar_biasa('identitas', 'image/ktp/', 'jpg|png|jpeg', 10000, 'foto_indentitas');

          $this->db->where('id_member', $id_member);
          $this->db->update('member', array(
               'foto' => $foto,
               'foto_identitas' => $foto_identitas
          ));
          $this->session->set_flashdata('pesan', alert_biasa('Foto berhasil diupdate','success'));
          redirect("app/profil");
     }

     public function profil_admin($id_user)
     {
          if ($this->session->userdata('level') == '') {
               redirect('login');
          }
          if ($_POST) {
               $this->db->where('id_user', $id_user);
               $this->db->update('app_user', array(
                    'password' => $retVal = ($this->input->post('password') == '') ? $_POST['password_old'] : md5($this->input->post('password',TRUE)),
                    'foto' => $retVal = ($_FILES['foto']['name'] == '') ? $_POST['foto_old'] : upload_gambar_biasa('user', 'image/user/', 'jpeg|png|jpg|gif', 10000, 'foto')
               ));
               $this->session->set_flashdata('pesan', alert_biasa('Profil Berhasil diubah, silahkan login kembali','success'));
               redirect("login");
          } else {
               $data = array(
                    'judul_page' => "Update Profil",
                    'konten' => 'profil',
               );
               $this->load->view('v_index', $data);
          }
     }

     public function update_profil($id_member) 
     {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_member', TRUE));
        } else {
            $data = array(
          'kode_member' => $this->input->post('kode_member',TRUE),
          'nama_lengkap' => $this->input->post('nama_lengkap',TRUE),
          'email' => $this->input->post('email',TRUE),
          'no_telp' => $this->input->post('no_telp',TRUE),
          'instagram' => $this->input->post('instagram',TRUE),
          'facebook' => $this->input->post('facebook',TRUE),
          'shopee' => $this->input->post('shopee',TRUE),
          'tokopedia' => $this->input->post('tokopedia',TRUE),
          'bukalapak' => $this->input->post('bukalapak',TRUE),
          'lazada' => $this->input->post('lazada',TRUE),
          'jenis_identitas' => $this->input->post('jenis_identitas',TRUE),
          'no_identitas' => $this->input->post('no_identitas',TRUE),
          'nama_bank' => $this->input->post('nama_bank',TRUE),
          'no_rekening' => $this->input->post('no_rekening',TRUE),
          'atas_nama' => $this->input->post('atas_nama',TRUE),
          'alamat' => $this->input->post('alamat',TRUE),
          'id_kabupaten' => $this->input->post('id_kabupaten',TRUE),
          'username' => $this->input->post('username',TRUE),
          'password' => $this->input->post('password',TRUE),
          'level' => $this->input->post('level',TRUE),
          'updated_at' => get_waktu(),
         );

            $this->Member_model->update($id_member, $data);
            $this->session->set_flashdata('pesan', alert_biasa('Profil Berhasil diubah','success'));
               redirect("app/profil");
        }
     }

     public function dev()
     {
          $this->session->set_flashdata('pesan', alert_biasa('Sedang dalam pengembangan','info'));
          redirect("app");
     }

     



}

/* End of file App.php */
