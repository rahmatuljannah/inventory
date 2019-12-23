<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pasien extends CI_Controller {
  
    public function index(){
     # if ($this->session->userdata('level') == "Admin")
	#	{
        $data['data_obat']=$this->db->query('select * from data_obat where stok between 1 and 10');
        $data['data_obat']=$data['data_obat']->num_rows();
    $data['pasien'] = $this->m_crud->tampil_data('data_pasien')->result();
		$this->load->view('admin/pasien/v_data_pasien',$data);
   # }
  #else {
   #   		die("<script>alert('Silahkan Login Admin');window.location='../dashboard'</script>");
    #  	}	
    
      }

    public function do_insert(){
        $reg=$this->input->post('reg');
        $nama=$this->input->post('nama');
        $umur=$this->input->post('umur');
        $alamat=$this->input->post('alamat');

        $data = array(
            'nama' => $nama,
            'reg' => $reg,
            'alamat' => $alamat,
            'umur' => $umur,
        );
    
    if (!empty($reg)&&!empty($nama)&&!empty($alamat)&&!empty($umur))
         {
        $this->m_crud->insert_data($data,'data_pasien');
        $this->session->set_flashdata('msg', 
                    '<div class="alert alert-success">
                        <h4>Berhasil Insert Data</h4>
                    </div>');  
        redirect('admin/pasien');
    }
    
    else {
        $this->session->set_flashdata('msg', 
                    '<div class="alert alert-danger">
                        <h4>Semua Nilai Harus Diisi</h4>
                    </div>');  
        redirect('admin/pasien');
    }

    }

    function hapus($id){
        $where = array('id_pasien' => $id);
        $this->m_crud->hapus_data($where,'data_pasien');
        $this->session->set_flashdata('msg', 
                    '<div class="alert alert-success">
                        <h4>Berhasil Hapus Data</h4>
                    </div>');  
        redirect('admin/pasien');
      }
    function edit($id){
        $data['data_obat']=$this->db->query('select * from data_obat where stok between 1 and 10');
        $data['data_obat']=$data['data_obat']->num_rows();
		$where = array('id_pasien' => $id);
        $data['pasien'] = $this->m_crud->edit_data($where,'data_pasien')->result();
       # $data['jabatan'] = $this->m_crud->tampil_data_jabatan()->result();
		$this->load->view('admin/pasien/v_edit_pasien', $data);
    }

    function update(){
        $id=$this->input->post('id');
        $reg=$this->input->post('reg');
        $nama=$this->input->post('nama');
        $umur=$this->input->post('umur');
        $alamat=$this->input->post('alamat');

        $data = array(
            'nama' => $nama,
            'reg' => $reg,
            'alamat' => $alamat,
            'umur' => $umur,
        );
        $where = array(
            'id_pasien' => $id
        );
     
        $this->m_crud->update_data($where,$data,'data_pasien');
        $this->session->set_flashdata('msg', 
                    '<div class="alert alert-success">
                        <h4>Berhasil Update Data</h4>
                    </div>');  
        redirect('admin/pasien');
        }
    
}