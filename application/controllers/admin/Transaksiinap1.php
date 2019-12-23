<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksiinap1 extends CI_Controller {
  
    public function index(){
     # if ($this->session->userdata('level') == "Admin")
	#	{
       // $data['rawat_inap'] = $this->m_crud->tampil_data('data_rawat_inap')->result();
    $data['pasien'] = $this->m_crud->tampil_data('data_pasien')->result();
    $data['transaksiobat'] = $this->db->query("select id_transaksi_obat,jumlah, data_pasien.reg, data_pasien.nama as nama_pasien, data_obat.nama as nama_obat, data_transaksi_obat.biaya from data_pasien join data_transaksi_obat on data_pasien.reg=data_transaksi_obat.reg join data_obat on data_obat.id_obat=data_transaksi_obat.id_obat")->result(); 
    $data['obat'] = $this->m_crud->tampil_data('data_obat')->result();
    $data['inap'] = $this->m_crud->tampil_data('data_rawat_inap')->result();
    $data['kamar'] = $this->m_crud->tampil_data('data_kamar')->result();
    $data['dokter'] = $this->m_crud->tampil_data('data_dokter')->result();
    $data['data_obat']=$this->db->query('select * from data_obat where stok between 1 and 10');
            $data['data_obat']=$data['data_obat']->num_rows();
		$this->load->view('admin/transaksi/v_transaksi_rawat_inap1',$data);
   # }
  #else {
   #   		die("<script>alert('Silahkan Login Admin');window.location='../dashboard'</script>");
    #  	}	
    
      }
      
  
      
      public function cetak() {
        $reg=$this->input->post('reg');
        $hasil=$this->db->query("select id_transaksi_obat,jumlah, data_pasien.umur, data_pasien.alamat, data_pasien.reg, data_pasien.nama as nama_pasien, data_obat.nama as nama_obat, data_obat.kode_obat, data_transaksi_obat.biaya from data_pasien join data_transaksi_obat on data_pasien.reg=data_transaksi_obat.reg join data_obat on data_obat.id_obat=data_transaksi_obat.id_obat where data_pasien.reg='$reg'")->result();
        $hasil1=$this->db->query("select id_transaksi_obat,jumlah, data_pasien.umur, data_pasien.alamat, data_pasien.reg, data_pasien.nama as nama_pasien, data_obat.nama as nama_obat, data_obat.kode_obat, sum(data_transaksi_obat.biaya) as biaya from data_pasien join data_transaksi_obat on data_pasien.reg=data_transaksi_obat.reg join data_obat on data_obat.id_obat=data_transaksi_obat.id_obat where data_pasien.reg='$reg'")->result();
      
        foreach ($hasil as $row) {}
        foreach ($hasil1 as $row1) {}
        
        $dokter=$this->input->post('dokter');
        $nama=$this->input->post('nama');
        $umur=$this->input->post('umur');
        $alamat=$this->input->post('alamat');
        $inap=$this->input->post('inap');
        $harga_inap=$this->db->query("select * from data_rawat_inap where id_rawat_inap='$inap'")->result();
        foreach ($harga_inap as $rowinap){}
          
        $infus=$this->input->post('infus');
        //Kamar Harga
        $kamar=$this->input->post('kamar');
        $harga_kamar=$this->db->query("select * from data_kamar where id_kamar='$kamar'")->result();
        foreach ($harga_kamar as $rowkamar){}

        $dpjp=$this->input->post('dpjp');
        
        $kebersihan=$this->input->post('kebersihan');
       
        $total_harga=$infus+$row1->biaya+$rowkamar->biaya+$dpjp+$kebersihan+$rowinap->biaya;
        $tanggal=$this->input->post('tanggal');
        $data = array(
          'reg' => $reg,
          'id_dokter' => $dokter,
          'id_kamar' => $kamar,
          'id_transaksi_obat'=>$row->id_transaksi_obat,
          'infus'=>$infus,
          'kebersihan'=>$kebersihan,
          'dpjp'=>$dpjp,
          'total'=>$total_harga,
          'id_rawat_inap'=>$inap,
          'tanggal'=>$tanggal,
      );
      if (!empty($reg))
       {
      $this->m_crud->insert_data($data,'transaksi');
      $this->session->set_flashdata('msg', 
                  '<div class="alert alert-success">
                      <h4>Berhasil Insert Data</h4>
                  </div>');  
      
  }
  
  else {
      $this->session->set_flashdata('msg', 
                  '<div class="alert alert-danger">
                      <h4>Semua Nilai Harus Diisi</h4>
                  </div>');  
      redirect('admin/transaksiinap');
  }
        
        $pdf = new FPDF('P','mm',array(100,160));
        
        $pdf->AddPage();
        
        $pdf->Image('https://lh3.googleusercontent.com/-1YlxDD41PEk/XJyTgopBl6I/AAAAAAAAC5o/A1Mg_gj4iIMOaO4WgzJ39Yqnd12cUKbPQCLcBGAs/h120/Screenshot%2Bfrom%2B2019-03-28%2B16.26.40.png',0,2,20,22);
        $pdf->SetX(20);
        $pdf->SetFont('Arial','B',12);
        $pdf->Cell(40,10,'RUMAH BERSALIN DELIMA WALUYA');
        $pdf->Ln(4);
        $pdf->SetX(20);
        $pdf->SetFont('Arial','',8);
        $pdf->Cell(40,10,'Jln. Proklamasi No 1, Karawang, Jawa Barat - Indonesia');
        $pdf->SetX(20);
        $pdf->SetFont('Arial','',8);
        $pdf->Ln(4);
        $pdf->SetX(20);
        $pdf->Cell(40,10,'Telp 0267 - 4041273');
        $pdf->SetFont('Arial','B',8);
        $pdf->Ln(5);
        $pdf->SetLineWidth(0);
        $pdf->Line(0,25,129,24);
        //$pdf->Line(10,36,138,36);
        //$pdf->SetLineWidth(0);
        //$pdf->Line(10,37,138,37);
        //$pdf->SetX(20);
        $pdf->SetX(25);

     //   $pdf->Cell(20,10,'Title',1,1,'C');
        $pdf->Cell(40,10,'BUKTI PEMBAYARAN RAWAT INAP');
        $pdf->SetFont('Arial','',8);
        $pdf->Ln(5);
        $pdf->Cell(40,10,'NO REG: '.$reg);
        $pdf->SetFont('Arial','',8);
        $pdf->Ln(5);
        $pdf->Cell(40,10,'Nama: '.$nama);
        $pdf->SetFont('Arial','',8);
        $pdf->Ln(5);
        $pdf->Cell(40,10,'Umur: '.$umur);
        $pdf->SetFont('Arial','',8);
        $pdf->Ln(5);
        $pdf->Cell(40,10,'Alamat: '.$alamat);
        $pdf->SetFont('Arial','',8);
        $pdf->Ln(5);
        $pdf->Cell(40,10,'Dokter: '.$dokter);
        $pdf->SetFont('Arial','B',8);
        $pdf->Ln(5);        
$pdf->SetX(40);
        $pdf->Cell(40,10,'Rincian');
        $pdf->SetFont('Arial','',8);
        $pdf->Ln(5);
        $pdf->Cell(40,10,'Tindakan: Rp. '.number_format($rowinap->biaya));
        $pdf->SetFont('Arial','',8);
        $pdf->Ln(5);
        $pdf->Cell(40,10,'Infus: Rp. '.number_format($infus));
        $pdf->SetFont('Arial','',8);
        $pdf->Ln(5);
        $pdf->Cell(40,10,'Obat:');
        //Table
        $pdf->Ln(8);
        $pdf->SetFont('Arial','',8);
        $pdf->Cell(10,6,'No',1,0);
        $pdf->Cell(30,6,'Nama Obat',1,0);
        $pdf->Cell(20,6,'Jumlah',1,0);
        $pdf->Cell(20,6,'Kode Obat',1,1);
        //Isi Table
        //$data_obat=$this->db->query("select * from data_obat where id_obat='$obat'")->result();
        $no=1;
        foreach ($hasil as $rowobat) {
          $pdf->Cell(10,6,$no++,1,0);
          $pdf->Cell(30,6,$rowobat->nama_obat,1,0);
          $pdf->Cell(20,6,$rowobat->jumlah,1,0);
          $pdf->Cell(20,6,$rowobat->kode_obat,1,1);
        }

        $pdf->Ln(2);
        $pdf->Cell(40,10,'Total Obat    : Rp. '.number_format($row1->biaya));
        $pdf->SetFont('Arial','',8);
        $pdf->Ln(5);
        $pdf->Cell(40,10,'Kamar          : Rp. '.number_format($rowkamar->biaya));
        $pdf->SetFont('Arial','',8);
        $pdf->Ln(5);
        $pdf->Cell(40,10,'DPJP           : Rp. '.number_format($dpjp));
        $pdf->SetFont('Arial','',8);
        $pdf->Ln(5);
        $pdf->Cell(40,10,'Kebersihan  : Rp. '.number_format($kebersihan));
        $pdf->SetFont('Arial','',8);
        $pdf->Ln(5);
        $pdf->Cell(40,10,'Total Biaya   : Rp. '.number_format($total_harga));
        $pdf->SetFont('Arial','',8);

        $pdf->Output();
      }

      public function tes() {
        $reg=$this->input->post('reg');
        $hasil=$this->db->query("SELECT * FROM data_pasien WHERE reg='$reg'");
        echo json_encode($hasil->result());
      }

      public function tes5() {
        $reg=$this->input->post('reg');
        $hasil=$this->db->query("select id_transaksi_obat,jumlah, data_pasien.umur, data_pasien.alamat, data_pasien.reg, data_pasien.nama as nama_pasien, data_obat.nama as nama_obat, data_obat.kode_obat, data_transaksi_obat.biaya from data_pasien join data_transaksi_obat on data_pasien.reg=data_transaksi_obat.reg join data_obat on data_obat.id_obat=data_transaksi_obat.id_obat where data_pasien.reg='$reg'");
        echo json_encode($hasil->result());
      }

      public function tes1() {
        $obat=$this->input->post('obat');
        $hasil=$this->db->query("SELECT * FROM data_obat WHERE id_obat='$obat'");
        echo json_encode($hasil->result());
      }

      public function tes2() {
      $jumlah_obat=$this->input->post('jumlah_obat');
      echo json_encode(array(array('item' => 5)));

      }

    
}
