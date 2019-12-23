<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inventory extends CI_Controller {
  
    public function index(){
     # if ($this->session->userdata('level') == "Admin")
	#	{ 
        $data['search'] = $this->input->get('search');
        $data['bulan'] = $this->input->get('bulan');
        $data['inventory']=$this->db->query("select * from inventory where part_no like '%".$data['search']."%' or tanggal like '%".$data['search']."%' ")->result();
        $data['barang']=$this->db->query('select * from barang')->result();
        
     //   $data['data_obat']=$data['data_obat']->num_rows();
   // $data['barang'] = $this->m_crud->tampil_data('data_barang')->result();
		$this->load->view('inventory/v_data_inven',$data);
   # }
  #else {
   #   		die("<script>alert('Silahkan Login Admin');window.location='../dashboard'</script>");
    #  	}	
  
}

    public function do_insert(){
        $part_no=$this->input->post('part_no');
        $nama_barang=$this->input->post('nama_barang');
        $actual=$this->input->post('actual');

        $jumlah=$this->input->post('jumlah');
        $tanggal=$this->input->post('tanggal');

        $data=$this->db->query("select * from barang where part_no='$part_no'")->result();
        foreach ($data as $a) {
            $total= $a->total;
        }

        if ($actual == "in") {
            $total = $total+$jumlah;
            $data = array(
                'total' => $total,
            );
            $where = array(
                'part_no' => $part_no,
            );
         
            $this->m_crud->update_data($where,$data,'barang');
        }
        elseif ($actual == "out") {
            $total = $total-$jumlah;
            $data = array(
                'total' => $total,
            );
            $where = array(
                'part_no' => $part_no,
            );
         
            $this->m_crud->update_data($where,$data,'barang');
        }

        $data = array(
            'part_no' => $part_no,
            'nama_barang' => $nama_barang,
            'actual' => $actual,
            'jumlah' => $jumlah,
            'tanggal' => $tanggal,
        );
    
    if (!empty($part_no)&&!empty($actual)&&!empty($jumlah))
         {
        $this->m_crud->insert_data($data,'inventory');
        $this->session->set_flashdata('msg', 
                    '<div class="alert alert-success">
                        <h4>Berhasil Insert Data</h4>
                    </div>');  
        redirect('inventory');
    }
    
    else {
        $this->session->set_flashdata('msg', 
                    '<div class="alert alert-danger">
                        <h4>Semua Nilai Harus Diisi</h4>
                    </div>');  
        redirect('inventory');
    }

    }

    function hapus($id){
        $where = array('id_inven' => $id);
        $this->m_crud->hapus_data($where,'inventory');
        $this->session->set_flashdata('msg', 
                    '<div class="alert alert-success">
                        <h4>Berhasil Hapus Data</h4>
                    </div>');  
        redirect('inventory');
      }

}
