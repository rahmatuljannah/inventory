<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barang extends CI_Controller {
  
    public function index(){
     # if ($this->session->userdata('level') == "Admin")
	#	{
        $data['search'] = $this->input->get('search');
        $data['Barang']=$this->db->query("select * from barang where part_no like '%".$data['search']."%'")->result();
     //   $data['data_obat']=$data['data_obat']->num_rows();
   // $data['barang'] = $this->m_crud->tampil_data('data_barang')->result();
		$this->load->view('barang/v_data_barang_supervisor',$data);
   # }
  #else {
   #   		die("<script>alert('Silahkan Login Admin');window.location='../dashboard'</script>");
    #  	}	
    
      }
    public function do_insert(){
        $tanggal=$this->input->post('tanggal');
        $part_no=$this->input->post('part_no');
        $nama_barang=$this->input->post('nama_barang');
        $total=$this->input->post('total');
        $data = array(
            'tanggal' => $tanggal,
            'part_no' => $part_no,
            'nama_barang'=>$nama_barang,
            'total'=>$total,
            );
    
    if (!empty($part_no))
         {
        $this->m_crud->insert_data($data,'barang');
        $this->session->set_flashdata('msg', 
                    '<div class="alert alert-success">
                        <h4>Berhasil Insert Data</h4>
                    </div>');  
        redirect('barang');
    }
    
    else {
        $this->session->set_flashdata('msg', 
                    '<div class="alert alert-danger">
                        <h4>Semua Nilai Harus Diisi</h4>
                    </div>');  
        redirect('barang');
    }

    }

    function hapus($id){
        $where = array('id_barang' => $id);
        $this->m_crud->hapus_data($where,'barang');
        $this->session->set_flashdata('msg', 
                    '<div class="alert alert-success">
                        <h4>Berhasil Hapus Data</h4>
                    </div>');  
        redirect('barang');
      }
    function edit($id){
		$where = array('id_barang' => $id);
        $data['barang'] = $this->m_crud->edit_data($where,'barang')->result();
		$this->load->view('barang/v_edit_barang', $data);

    }

    function update(){
        $id=$this->input->post('id');;
        $tanggal=$this->input->post('tanggal');
        $part_no=$this->input->post('part_no');
        $nama_barang=$this->input->post('nama_barang');
        $total=$this->input->post('total');

        $data = array(
        
            'tanggal' => $tanggal,
            'part_no' => $part_no,
            'nama_barang' => $nama_barang,
            'total' => $total,
        );
        $where = array(
            'id_barang' => $id
        );
     
        $this->m_crud->update_data($where,$data,'barang');
        $this->session->set_flashdata('msg', 
                    '<div class="alert alert-success">
                        <h4>Berhasil Update Data</h4>
                    </div>');  
        redirect('barang');
        }
    
}
