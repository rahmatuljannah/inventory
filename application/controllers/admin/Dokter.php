<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dokter extends CI_Controller {
  
    public function index(){
     # if ($this->session->userdata('level') == "Admin")
	#	{
        $data['data_obat']=$this->db->query('select * from data_obat where stok between 1 and 10');
        $data['data_obat']=$data['data_obat']->num_rows();
    $data['dokter'] = $this->m_crud->tampil_data('data_dokter')->result();
		$this->load->view('admin/dokter/v_data_dokter',$data);
   # }
  #else {
   #   		die("<script>alert('Silahkan Login Admin');window.location='../dashboard'</script>");
    #  	}	
    
      }

    public function do_insert(){
        $nama=$this->input->post('nama');
        $telepon=$this->input->post('telepon');;

        $data = array(
            'nama' => $nama,
            'telepon' => $telepon,
        );
    
    if (!empty($nama)&&!empty($telepon))
         {
        $this->m_crud->insert_data($data,'data_dokter');
        $this->session->set_flashdata('msg', 
                    '<div class="alert alert-success">
                        <h4>Berhasil Insert Data</h4>
                    </div>');  
        redirect('admin/dokter');
    }
    
    else {
        $this->session->set_flashdata('msg', 
                    '<div class="alert alert-danger">
                        <h4>Semua Nilai Harus Diisi</h4>
                    </div>');  
        redirect('admin/dokter');
    }

    }

    function hapus($id){
        $where = array('id_dokter' => $id);
        $this->m_crud->hapus_data($where,'data_dokter');
        $this->session->set_flashdata('msg', 
                    '<div class="alert alert-success">
                        <h4>Berhasil Hapus Data</h4>
                    </div>');  
        redirect('admin/dokter');
      }
    function edit($id){
        $data['data_obat']=$this->db->query('select * from data_obat where stok between 1 and 10');
        $data['data_obat']=$data['data_obat']->num_rows();
		$where = array('id_dokter' => $id);
        $data['dokter'] = $this->m_crud->edit_data($where,'data_dokter')->result();
		$this->load->view('admin/dokter/v_edit_dokter', $data);
    }

    function update(){
        $id=$this->input->post('id');;
        $nama=$this->input->post('nama');
        $telepon=$this->input->post('telepon');
        $data = array(
            'nama' => $nama,
            'telepon' => $telepon,
        );
        $where = array(
            'id_dokter' => $id
        );
     
        $this->m_crud->update_data($where,$data,'data_dokter');
        $this->session->set_flashdata('msg', 
                    '<div class="alert alert-success">
                        <h4>Berhasil Update Data</h4>
                    </div>');  
        redirect('admin/dokter');
        }
    
}
