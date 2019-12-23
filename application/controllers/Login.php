<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
  
    public function index(){
     # if ($this->session->userdata('level') == "Admin")
	#	{
		$this->load->view('v_login');
   # }
  #else {
   #   		die("<script>alert('Silahkan Login Admin');window.location='../dashboard'</script>");
    #  	}	
    
      }

      public function form() {
          $username=$this->input->post('username');
          $password=$this->input->post('password');
          //$password=md5($password);
          //$login = $this->db->query("select username and password from users where username='$username' and password='$password'");
          //$login1 = $this->db->query("select * from users where username='$username' and password='$password'")->result(); 
          //$ceklogin = $login->num_rows();
          //foreach ($login1 as $query) {}

            if ($username=="admin" && $password=="123")
            {
              $userData=array('username'=>$username);
              $this->session->set_userdata($userData);
              redirect ('dashboard');
            }
            elseif ($username=="supervisor" && $password=="123")
            {
              $userData=array('username'=>$username);
              $this->session->set_userdata($userData);
              redirect ('supervisor/dashboard');
            
          }
          else {
            echo "<script language='javascript'>
            alert('Username atau Password Salah');
         window.location='../login';
</script>";
          }
      }

      public function logout()
  {
    //Menghapus semua session (sesi)
    $this->session->sess_destroy();
    redirect('login');
  }
}
