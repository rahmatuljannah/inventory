<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksijalan extends CI_Controller {
  
    public function index(){
     # if ($this->session->userdata('level') == "Admin")
	#	{
       // $data['rawat_jalan'] = $this->m_crud->tampil_data('data_rawat_jalan')->result();
    $data['pasien'] = $this->m_crud->tampil_data('data_pasien')->result();
    $data['transaksiobat'] = $this->db->query("select id_transaksi_obat,jumlah, data_pasien.reg, data_pasien.nama as nama_pasien, data_obat.nama as nama_obat, data_transaksi_obat.biaya from data_pasien join data_transaksi_obat on data_pasien.reg=data_transaksi_obat.reg join data_obat on data_obat.id_obat=data_transaksi_obat.id_obat")->result(); 
    $data['obat'] = $this->m_crud->tampil_data('data_obat')->result();
    $data['jalan'] = $this->m_crud->tampil_data('data_rawat_jalan')->result();
    $data['dokter'] = $this->m_crud->tampil_data('data_dokter')->result();
    $data['data_obat']=$this->db->query('select * from data_obat where stok between 1 and 10');
            $data['data_obat']=$data['data_obat']->num_rows();
		$this->load->view('admin/transaksi/v_transaksi_rawat_jalan',$data);
   # }
  #else {
   #   		die("<script>alert('Silahkan Login Admin');window.location='../dashboard'</script>");
    #  	}	
    
      }
      
  
      
      public function cetak() {
        $reg=$this->input->post('reg');
        $hasil=$this->db->query("select id_transaksi_obat,jumlah, data_pasien.umur, data_pasien.alamat, data_pasien.reg, data_pasien.nama as nama_pasien, data_obat.nama as nama_obat, data_obat.kode_obat, data_transaksi_obat.biaya from data_pasien join data_transaksi_obat on data_pasien.reg=data_transaksi_obat.reg join data_obat on data_obat.id_obat=data_transaksi_obat.id_obat where data_pasien.reg='$reg'")->result();
        $hasil2=$this->db->query("select id_transaksi_obat,jumlah, data_pasien.umur, data_pasien.alamat, data_pasien.reg, data_pasien.nama as nama_pasien, data_obat.nama as nama_obat, data_obat.kode_obat, data_transaksi_obat.biaya from data_pasien join data_transaksi_obat on data_pasien.reg=data_transaksi_obat.reg join data_obat on data_obat.id_obat=data_transaksi_obat.id_obat where data_pasien.reg='$reg'");
        $cekrow=$hasil2->num_rows();
        $hasil1=$this->db->query("select id_transaksi_obat,jumlah, data_pasien.umur, data_pasien.alamat, data_pasien.reg, data_pasien.nama as nama_pasien, data_obat.nama as nama_obat, data_obat.kode_obat, sum(data_transaksi_obat.biaya) as biaya from data_pasien join data_transaksi_obat on data_pasien.reg=data_transaksi_obat.reg join data_obat on data_obat.id_obat=data_transaksi_obat.id_obat where data_pasien.reg='$reg'")->result();
      
        foreach ($hasil as $row) {}
        foreach ($hasil1 as $row1) {}
        
        $dokter=$this->input->post('dokter');
        $nama_dokter=$this->db->query("select * from data_dokter where id_dokter='$dokter'")->result();
        foreach ($nama_dokter as $rowdokter){}

        $nama=$this->input->post('nama');
        $umur=$this->input->post('umur');
        $alamat=$this->input->post('alamat');
        $jalan=$this->input->post('jalan');
        $harga_jalan=$this->db->query("select * from data_rawat_jalan where id_rawat_jalan='$jalan'")->result();
        foreach ($harga_jalan as $rowjalan){}
        $infus=$this->input->post('infus');
        $tanggal=$this->input->post('tanggal');
        //Kamar Harga
        $kamar=$this->input->post('kamar');
        $harga_kamar=$this->db->query("select * from data_kamar where id_kamar='$kamar'")->result();
        foreach ($harga_kamar as $rowkamar){}

        if ($cekrow>0){
        $total_harga=$rowjalan->biaya+$row1->biaya;
      }
      else {
      $total_harga=$rowjalan->biaya;
      }
        if ($cekrow>0){
        $data = array(
            'reg' => $reg,
            'id_dokter' => $dokter,
            'id_kamar' => $kamar,
            'id_rawat_jalan' =>$jalan,
            'id_transaksi_obat'=>$row->id_transaksi_obat,
            'total'=>$total_harga,
            'tanggal'=>$tanggal,

        );
      }
      else {
        $data = array(
          'reg' => $reg,
          'id_dokter' => $dokter,
          'id_kamar' => $kamar,
          'id_rawat_jalan' =>$jalan,
          'total'=>$total_harga,
          'tanggal'=>$tanggal,
      );
      }
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
        redirect('admin/transaksijalan');
    }
    

        $pdf = new FPDF('P','mm',array(100,180));
        
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
        $pdf->Cell(40,10,'BUKTI PEMBAYARAN RAWAT JALAN');
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
        $pdf->Cell(40,10,'Dokter: '.$rowdokter->nama);
        $pdf->SetFont('Arial','B',8);
        $pdf->Ln(5);        
$pdf->SetX(40);
        $pdf->Cell(40,10,'Rincian');
        $pdf->SetFont('Arial','',8);
        $pdf->Ln(5);
        $pdf->Cell(40,10,'Tindakan: Rp. '.number_format($rowjalan->biaya));
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
        if ($cekrow>0){
        $pdf->Ln(2);
        $pdf->Cell(40,10,'Total Obat    : Rp. '.number_format($row1->biaya));
        $pdf->SetFont('Arial','',8);
      }
      else {
        $pdf->Ln(2);
        $pdf->Cell(40,10,'Total Obat    : Rp. '.number_format(0));
        $pdf->SetFont('Arial','',8);
      }
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
      public function a(){
        $arr = array(array('a' => 1, 'b' => 2, 'c' => 3, 'd' => 4, 'e' => 5));
        $arr [5] = array('d'=>5);
        echo json_encode($arr);
      }

      public function tes5() {
        $reg=$this->input->post('reg');
        $hasil=$this->db->query("select id_transaksi_obat,jumlah, data_pasien.umur, data_pasien.alamat, data_pasien.reg, data_pasien.nama as nama_pasien, data_obat.nama as nama_obat, data_obat.kode_obat, data_transaksi_obat.biaya from data_pasien join data_transaksi_obat on data_pasien.reg=data_transaksi_obat.reg join data_obat on data_obat.id_obat=data_transaksi_obat.id_obat where data_pasien.reg='$reg'");
        $cekrow=$hasil->num_rows();
        $hasil1=$this->db->query("SELECT reg, nama as nama_pasien, umur, alamat FROM data_pasien WHERE reg='$reg'");
        if ($cekrow>0){
        echo json_encode($hasil->result());
      }
      else {
        echo json_encode($hasil1->result());
      }
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
