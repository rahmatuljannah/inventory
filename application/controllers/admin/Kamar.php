<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kamar extends CI_Controller {
  
    public function index(){
     # if ($this->session->userdata('level') == "Admin")
	#	{
        $data['data_obat']=$this->db->query('select * from data_obat where stok between 1 and 10');
        $data['data_obat']=$data['data_obat']->num_rows();
    $data['kamar'] = $this->m_crud->tampil_data('data_kamar')->result();
		$this->load->view('admin/kamar/v_data_kamar',$data);
   # }
  #else {
   #   		die("<script>alert('Silahkan Login Admin');window.location='../dashboard'</script>");
    #  	}	
    
      }

    public function do_insert(){
        $nama=$this->input->post('nama');
        $biaya=$this->input->post('biaya');

        $data = array(
            'nama' => $nama,
            'biaya' => $biaya,
        );
    
    if (!empty($nama)&&!empty($biaya))
         {
        $this->m_crud->insert_data($data,'data_kamar');
        $this->session->set_flashdata('msg', 
                    '<div class="alert alert-success">
                        <h4>Berhasil Insert Data</h4>
                    </div>');  
        redirect('admin/kamar');
    }
    
    else {
        $this->session->set_flashdata('msg', 
                    '<div class="alert alert-danger">
                        <h4>Semua Nilai Harus Diisi</h4>
                    </div>');  
        redirect('admin/kamar');
    }

    }

    function hapus($id){
        $where = array('id_kamar' => $id);
        $this->m_crud->hapus_data($where,'data_kamar');
        $this->session->set_flashdata('msg', 
                    '<div class="alert alert-success">
                        <h4>Berhasil Hapus Data</h4>
                    </div>');  
        redirect('admin/kamar');
      }
    function edit($id){
        $where = array('id_kamar' => $id);
        $data['data_obat']=$this->db->query('select * from data_obat where stok between 1 and 10');
        $data['data_obat']=$data['data_obat']->num_rows();
        $data['kamar'] = $this->m_crud->edit_data($where,'data_kamar')->result();
		$this->load->view('admin/kamar/v_edit_kamar', $data);
    }

    function update(){
        $id=$this->input->post('id');;
        $nama=$this->input->post('nama');
        $biaya=$this->input->post('biaya');

        $data = array(
            'nama' => $nama,
            'biaya' => $biaya,
        );
        $where = array(
            'id_kamar' => $id
        );
     
        $this->m_crud->update_data($where,$data,'data_kamar');
        $this->session->set_flashdata('msg', 
                    '<div class="alert alert-success">
                        <h4>Berhasil Update Data</h4>
                    </div>');  
        redirect('admin/kamar');
        }
    
}
