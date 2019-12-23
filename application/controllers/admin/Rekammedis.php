<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rekammedis extends CI_Controller {
  
    public function index(){
     # if ($this->session->userdata('level') == "Admin")
	#	{
        $data['pasien']=$this->m_crud->tampil_data('data_pasien')->result();
    $data['rekam_medis'] = $this->db->query("select data_pasien.reg, data_pasien.alamat, data_pasien.umur, data_pasien.nama, riwayat_alergi, id_rekam_medis, diagnosa, pengobatan, tanggal from data_pasien join data_rekam_medis on data_pasien.reg=data_rekam_medis.reg")->result();
    $data['data_obat']=$this->db->query('select * from data_obat where stok between 1 and 10');
            $data['data_obat']=$data['data_obat']->num_rows();
    $this->load->view('admin/rekammedis/v_data_rekam_medis',$data);
   # }
  #else {
   #   		die("<script>alert('Silahkan Login Admin');window.location='../dashboard'</script>");
    #  	}	
    
      }

      public function detail($id){
        $data['data_obat']=$this->db->query('select * from data_obat where stok between 1 and 10');
        $data['data_obat']=$data['data_obat']->num_rows();
        $data['rekam_medis'] = $this->db->query("select data_pasien.reg, data_pasien.alamat, data_pasien.umur, data_pasien.nama, riwayat_alergi, id_rekam_medis, diagnosa, pengobatan, tanggal from data_pasien join data_rekam_medis on data_pasien.reg=data_rekam_medis.reg where id_rekam_medis='$id'")->result();
        $this->load->view('admin/rekammedis/v_data_rekam_medis_detail',$data);
    }

    public function do_insert(){
        $reg=$this->input->post('reg');
        $alergi=$this->input->post('alergi');
        $diagnosa=$this->input->post('diagnosa');
        $tanggal=$this->input->post('tanggal');
        $pengobatan=$this->input->post('pengobatan');
        
        $data = array(
            'reg' => $reg,
            'riwayat_alergi'=> $alergi,
            'diagnosa'=>$diagnosa,
            'tanggal'=>$tanggal,
            'pengobatan'=>$pengobatan,
        );
    
    if (!empty($reg)&&!empty($alergi)&&!empty($diagnosa)&&!empty($tanggal)&&!empty($pengobatan))
         {
        $this->m_crud->insert_data($data,'data_rekam_medis');
        $this->session->set_flashdata('msg', 
                    '<div class="alert alert-success">
                        <h4>Berhasil Insert Data</h4>
                    </div>');  
        redirect('admin/rekammedis');
    }
    
    else {
        $this->session->set_flashdata('msg', 
                    '<div class="alert alert-danger">
                        <h4>Semua Nilai Harus Diisi</h4>
                    </div>');  
        redirect('admin/rekammedis');
    }

    }

    function hapus($id){
        $where = array('id_rekam_medis' => $id);
        $this->m_crud->hapus_data($where,'data_rekam_medis');
        $this->session->set_flashdata('msg', 
                    '<div class="alert alert-success">
                        <h4>Berhasil Hapus Data</h4>
                    </div>');  
        redirect('admin/rekammedis');
      }
    function edit($id){
        $where = array('id_rekam_medis' => $id);
        $data['data_obat']=$this->db->query('select * from data_obat where stok between 1 and 10');
            $data['data_obat']=$data['data_obat']->num_rows();
        $data['rekam_medis'] = $this->m_crud->edit_data($where,'data_rekam_medis')->result();
		$this->load->view('admin/rekammedis/v_edit_rekam_medis', $data);
    }

    function update(){
        $id=$this->input->post('id');;
        $reg=$this->input->post('reg');
        $alergi=$this->input->post('alergi');
        $diagnosa=$this->input->post('diagnosa');
        $tanggal=$this->input->post('tanggal');
        $pengobatan=$this->input->post('pengobatan');
        
        $data = array(
            'reg' => $reg,
            'riwayat_alergi'=> $alergi,
            'diagnosa'=>$diagnosa,
            'tanggal'=>$tanggal,
            'pengobatan'=>$pengobatan,
        );
        $where = array(
            'id_rekam_medis' => $id
        );
     
        $this->m_crud->update_data($where,$data,'data_rekam_medis');
        $this->session->set_flashdata('msg', 
                    '<div class="alert alert-success">
                        <h4>Berhasil Update Data</h4>
                    </div>');  
        redirect('admin/rekammedis');
        }
    
}
