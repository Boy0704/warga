<?php 


defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

     public function index()
     {
          $this->load->view('login');
          
     }

     public function auth()
     {
          $username = $this->input->post('username');
          $password = md5($this->input->post('password'));
          $cek = $this->db->query("SELECT * FROM app_user WHERE username='$username' and password='$password' ");
          
          if ($cek->num_rows() > 0) {
               $user = $cek->row();
               $sess_data['id_user'] = $user->id_user;
               $sess_data['username'] = $user->username;
               $sess_data['nama'] = $user->nama_lengkap;
               $sess_data['foto'] = $user->foto;
               $sess_data['level'] = $user->level;
               $this->session->set_userdata($sess_data);
               redirect('app','refresh');
               
          } else {
               $this->session->set_flashdata('pesan', alert_biasa('Username dan passwor salah !','warning'));
                    redirect("login");
          }
          
     }

     public function logout()
     {
          $this->session->unset_userdata('username');
          $this->session->unset_userdata('nama');
          $this->session->unset_userdata('foto');
          $this->session->unset_userdata('level');
          session_destroy();
          redirect('login','refresh');
     }

}

/* End of file Login.php */
