<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Obat extends CI_Controller {
  
    public function index(){
     # if ($this->session->userdata('level') == "Admin")
	#	{
        $data['data_obat']=$this->db->query('select * from data_obat where stok between 1 and 10');
        $data['data_obat']=$data['data_obat']->num_rows();
    $data['obat'] = $this->m_crud->tampil_data('data_obat')->result();
		$this->load->view('admin/obat/v_data_obat',$data);
   # }
  #else {
   #   		die("<script>alert('Silahkan Login Admin');window.location='../dashboard'</script>");
    #  	}	
    
      }

    public function do_insert(){
        $kode_obat=$this->input->post('kode_obat');
        $nama=$this->input->post('nama');
        $stok=$this->input->post('stok');
        $harga=$this->input->post('harga');

        $data = array(
            'kode_obat'=> $kode_obat,
            'nama' => $nama,
            'stok' => $stok,
            'harga' => $harga,
        );
    
    if (!empty($nama)&&!empty($stok)&&!empty($harga))
         {
        $this->m_crud->insert_data($data,'data_obat');
        $this->session->set_flashdata('msg', 
                    '<div class="alert alert-success">
                        <h4>Berhasil Insert Data</h4>
                    </div>');  
        redirect('admin/obat');
    }
    
    else {
        $this->session->set_flashdata('msg', 
                    '<div class="alert alert-danger">
                        <h4>Semua Nilai Harus Diisi</h4>
                    </div>');  
        redirect('admin/obat');
    }

    }

    function hapus($id){
        $where = array('id_obat' => $id);
        $this->m_crud->hapus_data($where,'data_obat');
        $this->session->set_flashdata('msg', 
                    '<div class="alert alert-success">
                        <h4>Berhasil Hapus Data</h4>
                    </div>');  
        redirect('admin/obat');
      }
    function edit($id){
        $data['data_obat']=$this->db->query('select * from data_obat where stok between 1 and 10');
        $data['data_obat']=$data['data_obat']->num_rows();
		$where = array('id_obat' => $id);
        $data['obat'] = $this->m_crud->edit_data($where,'data_obat')->result();
		$this->load->view('admin/obat/v_edit_obat', $data);
    }

    function update(){
        $id=$this->input->post('id');;
        $kode_obat=$this->input->post('kode_obat');
        $nama=$this->input->post('nama');
        $stok=$this->input->post('stok');
        $harga=$this->input->post('harga');

        $data = array(
            'kode_obat'=> $kode_obat,
            'nama' => $nama,
            'stok' => $stok,
            'harga' => $harga,
        );
        $where = array(
            'id_obat' => $id
        );
     
        $this->m_crud->update_data($where,$data,'data_obat');
        $this->session->set_flashdata('msg', 
                    '<div class="alert alert-success">
                        <h4>Berhasil Update Data</h4>
                    </div>');  
        redirect('admin/obat');
        }
    
}
