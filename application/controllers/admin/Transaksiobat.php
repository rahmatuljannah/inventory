<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksiobat extends CI_Controller {
  
    public function index(){
        
            $data['data_obat']=$this->db->query('select * from data_obat where stok between 1 and 10');
            $data['data_obat']=$data['data_obat']->num_rows();
    $data['pasien'] = $this->m_crud->tampil_data('data_pasien')->result();
    $data['obat'] = $this->m_crud->tampil_data('data_obat')->result();
    $data['transaksi_obat'] = $this->db->query("select id_transaksi_obat,jumlah, data_pasien.reg, data_pasien.nama as nama_pasien, data_obat.nama as nama_obat, data_transaksi_obat.biaya from data_pasien join data_transaksi_obat on data_pasien.reg=data_transaksi_obat.reg join data_obat on data_obat.id_obat=data_transaksi_obat.id_obat")->result(); 
    $this->load->view('admin/transaksiobat/v_transaksi_obat',$data);
      }
    
    public function detail($id){
        $data['data_obat']=$this->db->query('select * from data_obat where stok between 1 and 10');
            $data['data_obat']=$data['data_obat']->num_rows();
    $data['transaksi_obat'] = $this->db->query("select id_transaksi_obat,jumlah, data_pasien.reg, data_pasien.nama as nama_pasien, data_pasien.umur, data_pasien.alamat, data_obat.nama as nama_obat, data_transaksi_obat.biaya from data_pasien join data_transaksi_obat on data_pasien.reg=data_transaksi_obat.reg join data_obat on data_obat.id_obat=data_transaksi_obat.id_obat where id_transaksi_obat='$id'")->result(); 
    $this->load->view('admin/transaksiobat/v_transaksi_obat_detail',$data);
     
    }

      public function do_insert(){
        $reg=$this->input->post('reg');
        $obat=$this->input->post('obat');
        $jumlah=$this->input->post('jumlah');
        $harga_obat = $this->db->query("select * from data_obat where id_obat ='$obat'")->result();
        foreach ($harga_obat as $rowobat) {}
        $biaya = $rowobat->harga * $jumlah;
        $data = array(
            'reg' => $reg,
            'id_obat' => $obat,
            'jumlah' => $jumlah,
            'biaya' =>$biaya,

        );
    
    if (!empty($reg)&&!empty($obat)&&!empty($jumlah))
         {
        $this->m_crud->insert_data($data,'data_transaksi_obat');
        $this->session->set_flashdata('msg', 
                    '<div class="alert alert-success">
                        <h4>Berhasil Insert Data</h4>
                    </div>');  
        redirect('admin/transaksiobat');
    }
    
    else {
        $this->session->set_flashdata('msg', 
                    '<div class="alert alert-danger">
                        <h4>Semua Nilai Harus Diisi</h4>
                    </div>');  
        redirect('admin/transaksiobat');
    }

    }

    function hapus($id){
        $where = array('id_transaksi_obat' => $id);
        $this->m_crud->hapus_data($where,'data_transaksi_obat');
        $this->session->set_flashdata('msg', 
                    '<div class="alert alert-success">
                        <h4>Berhasil Hapus Data</h4>
                    </div>');  
        redirect('admin/transaksiobat');
      }

    
}
