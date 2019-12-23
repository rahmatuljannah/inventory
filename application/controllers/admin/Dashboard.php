<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
  
    public function index(){
     # if ($this->session->userdata('level') == "Admin")
	#	{
   // $data['data_obat']=$this->db->query('select * from data_obat where stok between 1 and 10');
   // $data['data_obat']=$data['data_obat']->num_rows();
    $this->load->view('v_dashboard');
   
   # }
  #else {
   #   		die("<script>alert('Silahkan Login Admin');window.location='../dashboard'</script>");
    #  	}	
    
      }
}