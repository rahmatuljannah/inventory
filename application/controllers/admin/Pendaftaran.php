<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pendaftaran extends CI_Controller {
  
    public function index(){
        $no=$this->db->query("select max(reg) as no from data_pasien")->result();
        foreach ($no as $no1){};
       $nourut=(int)substr($no1->no,4,3);
       $nourut++;
       $char="REG-";
       $data['newid']=$char.sprintf("%03s", $nourut);
       $data['data_obat']=$this->db->query('select * from data_obat where stok between 1 and 10');
       $data['data_obat']=$data['data_obat']->num_rows();
      // echo $newid;
     # if ($this->session->userdata('level') == "Admin")
	#	{
   // $data['pasien'] = $this->m_crud->tampil_data('data_pasien')->result();
       
        $this->load->view('admin/pendaftaran/v_data_pendaftaran',$data);
   # }
  #else {
   #   		die("<script>alert('Silahkan Login Admin');window.location='../dashboard'</script>");
    #  	}	
    
      }

    public function cetak() {
        $reg=$this->input->post('reg');
        $nama=$this->input->post('nama');
        $umur=$this->input->post('umur');
        $alamat=$this->input->post('alamat');
        $telepon=$this->input->post('telepon');

        $pdf = new FPDF('L','mm',array(85,100));
        
        $pdf->AddPage();
        $pdf->SetLineWidth(0);
        $pdf->Line(0,25,129,24);
        $pdf->SetLineWidth(0);
        $pdf->Line(0,12,145,11);
        $pdf->SetFont('Arial','B',12);
        $pdf->Cell(40,10,'RUMAH BERSALIN DELIMA WALUYA');
        $pdf->Ln(4);
        $pdf->SetFont('Arial','',8);
        $pdf->Cell(40,10,'Jln. Proklamasi No 1, Karawang, Jawa Barat - Indonesia');
        $pdf->Ln(10);
        $pdf->SetFont('Arial','',8);
        $pdf->Cell(40,10,'No Registrasi : '.$reg);
        $pdf->Ln(5);
        $pdf->SetFont('Arial','',8);
        $pdf->Cell(40,10,'Nama             : '.$nama);
        $pdf->Ln(5);
        $pdf->SetFont('Arial','',8);
        $pdf->Cell(40,10,'Umur              : '.$umur);
        $pdf->Ln(5);
        $pdf->SetFont('Arial','',8);
        $pdf->Cell(40,10,'Alamat            : '.$alamat);
        $pdf->Ln(5);
        $pdf->SetFont('Arial','',8);
        $pdf->Cell(40,10,'Telepon          : '.$telepon);
        $pdf->Ln(8);
        $pdf->SetFont('Arial','B',12);
        $pdf->Cell(40,10,'KARTU HARAP DIBAWA SAAT BEROBAT');
       // $pdf->Ln(8);
        $pdf->SetY(0);
        $pdf->SetX(37);
        $pdf->SetFont('Arial','B',12);
        $pdf->Cell(40,10,'Kartu Pasien');


        $pdf->Output();
    }
    
    public function do_insert(){
        $data['data_obat']=$this->db->query('select * from data_obat where stok between 1 and 10');
        $da['data_obat']=$data['data_obat']->num_rows();
        $reg=$this->input->post('reg');

        $nama=$this->input->post('nama');
        $umur=$this->input->post('umur');
        $pendidikan=$this->input->post('pendidikan');
        $suami=$this->input->post('suami');
        $pekerjaan=$this->input->post('pekerjaan');
        $telepon=$this->input->post('telepon');
        $alamat=$this->input->post('alamat');
        $type=$this->input->post('type');
       // $da['pasien']=$this->db->query("select * from data_pasien where id_pasien='8'")->result();
       $da['reg']=$reg;
       $da['nama']=$nama;
       $da['alamat']=$alamat;
       $da['telepon']=$telepon;
       $da['umur']=$umur;

       $data = array(
            'nama' => $nama,
            'reg' => $reg,
            'alamat' => $alamat,
            'umur' => $umur,
            'pendidikan'=>$pendidikan,
            'suami'=>$suami,
            'pekerjaan'=>$pekerjaan,
        );

    if ($type=="1"){
        $this->load->view('admin/pendaftaran/v_cetak_kartu',$da);
        $this->m_crud->insert_data($data,'data_pasien');
    }
    
    elseif (!empty($reg)&&!empty($nama)&&!empty($alamat)&&!empty($umur)&&!empty($pendidikan)&&!empty($suami)&&!empty($pekerjaan&&!empty($telepon)))
         {
        $this->m_crud->insert_data($data,'data_pasien');
        $this->session->set_flashdata('msg', 
                    '<div class="alert alert-success">
                        <h4>Berhasil Insert Data</h4>
                    </div>');  
        redirect('admin/pendaftaran');
    }
    
    else {
        $this->session->set_flashdata('msg', 
                    '<div class="alert alert-danger">
                        <h4>Semua Nilai Harus Diisi</h4>
                    </div>');  
        redirect('admin/pendaftaran');
    }

    }
    
}