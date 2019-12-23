<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {

    public function index(){

      $this->load->view('laporan/l_barang');
  
  }
  public function index1(){
        
     $this->load->view('laporan/l_barang_coy');
     
 }
 public function index2(){
        
    $this->load->view('laporan/l_barang_coy1');
    
}

 public function detail($id) {

    $data['data_obat']=$this->db->query('select * from barang where stok between 1 and 10');
    $data['data_obat']=$data['data_obat']->num_rows();
    $data['query'] = $this->db->query("select id_barang, tanggal, data_pasien.reg, data_pasien.nama as nama_pasien, data_dokter.nama as nama_dokter, data_kamar.nama as nama_kamar, data_rawat_inap.biaya as biaya_rawat_inap, data_query_obat.biaya as biaya_obat, bhp, dpjp, konsultasi, visite, total from data_pasien join query on data_pasien.reg=query.reg join data_dokter on data_dokter.id_dokter=query.id_dokter join data_kamar on data_kamar.id_kamar=query.id_kamar join data_rawat_inap on data_rawat_inap.id_rawat_inap=query.id_rawat_inap join data_query_obat on data_query_obat.id_query_obat=query.id_query_obat where id_query='$id'")->result();
    $this->load->view('admin/laporan/v_data_laporaninap_detail',$data);
}  
public function do_insert(){
    $nama=$this->input->post('nama');
    $telepon=$this->input->post('telepon');;

    $data = array(
        'nama' => $nama,
        'telepon' => $telepon,
    );
    
    if (!empty($nama)&&!empty($telepon))
    {
        $this->m_crud->insert_data($data,'data_query');
        $this->session->set_flashdata('msg', 
            '<div class="alert alert-success">
            <h4>Berhasil Insert Data</h4>
            </div>');  
        redirect('admin/query');
    }
    
    else {
        $this->session->set_flashdata('msg', 
            '<div class="alert alert-danger">
            <h4>Semua Nilai Harus Diisi</h4>
            </div>');  
        redirect('admin/query');
    }

}

function hapus($id){
    $where = array('id_query' => $id);
    $this->m_crud->hapus_data($where,'query');
    $this->session->set_flashdata('msg', 
        '<div class="alert alert-success">
        <h4>Berhasil Hapus Data</h4>
        </div>');  
    redirect('admin/laporaninap');
}

public function cetak() {

 $query= $this->db->query("select  * from  barang_masuk")->result();

 $pdf = new FPDF('L','mm',array(250,297));
 $pdf->AddPage();
 $pdf->Image('https://i1.wp.com/lokerku.net/wp-content/uploads/2018/11/PT-Sanoh-Indonesia-lokerkudotnet.png',20,5,40,20);
 $pdf->SetX(120);
 $pdf->SetFont('Arial','B',12);
 $pdf->Cell(40,10,'PT. Sanoh Indonesia',0,0,'C');
 $pdf->Ln(4);
 $pdf->SetX(90);
 $pdf->SetFont('Arial','',8);
 $pdf->Cell(40,10,'Kawasan Industri Hyundai, Jl. Inti II No.10, Sukaresmi, Cikarang Selatan, Bekasi, Jawa Barat 17530');
 $pdf->SetFont('Arial','',8);
 $pdf->Ln(4);
 $pdf->SetX(125);
 $pdf->Cell(40,10,'Telp 0267 - 4041273');
 $pdf->SetFont('Arial','B',8);
 $pdf->Ln(5);
 $pdf->SetLineWidth(0);
 $pdf->Line(0,25,300,25);
 $pdf->SetX(120);
 $pdf->SetFont('Arial','B',12);
 $pdf->Cell(50,20,'Laporan Data Barang',0,0,'C');
 $pdf->Ln(4);
 $pdf->SetX(120);
 $pdf->SetFont('Arial','',8);
    //    $pdf->Cell(40,10,'Bulan : '.$bulan,0,0,'C');
 $pdf->Ln(4);
         //Table
 $pdf->SetX(120);
 $pdf->Ln(8);
 $pdf->SetX(100);
 $pdf->SetFont('Arial','',8);
 $pdf->Cell(10,6,'No',1,0);
 $pdf->Cell(20,6,'Tanggal',1,0);
 $pdf->Cell(30,6,'Part Nomor',1,0);
 $pdf->Cell(30,6,'Nama Barang',1,0);
 $pdf->Cell(20,6,'Total',1,1);
 
         //Isi Table
         //$data_obat=$this->db->query("select * from data_obat where id_obat='$obat'")->result();
 $no=1;
 foreach ($query as $rowquery) {
    $pdf->SetX(100);
    $pdf->Cell(10,6,$no++,1,0);
      $pdf->Cell(20,6,$rowquery->tanggal,1,0);
    $pdf->Cell(30,6,$rowquery->part_no,1,0);
    $pdf->Cell(30,6,$rowquery->nama_barang,1,0);
    $pdf->Cell(20,6,$rowquery->total,1,1);
  
}

$pdf->Output();
}


public function cetak1() {

    $bulan=$this->input->post('bulan');
      //  $query = $this->db->query("select  tanggal, id_query, data_pasien.reg, data_pasien.nama as nama_pasien, data_dokter.nama as nama_dokter, data_kamar.nama as nama_kamar, data_rawat_inap.biaya as biaya_rawat_inap, data_query_obat.biaya as biaya_obat, bhp, dpjp, konsultasi, visite, total from data_pasien join query on data_pasien.reg=query.reg join data_dokter on data_dokter.id_dokter=query.id_dokter join data_kamar on data_kamar.id_kamar=query.id_kamar join data_rawat_inap on data_rawat_inap.id_rawat_inap=query.id_rawat_inap join data_query_obat on data_query_obat.id_query_obat=query.id_query_obat where MONTH(tanggal)='$bulan'")->result();
    $query = $this->db->query("SELECT barang_masuk.id_brgmasuk, barang_masuk.total, barang_masuk.tanggal, barang_masuk.part_no, suplier.nama_suplier,barang.nama_barang from barang_masuk join suplier on barang_masuk.id_suplier=suplier.id_suplier JOIN barang on barang_masuk.part_no=barang.part_no where MONTH(tanggal)='$bulan'")->result();
    $query11 = $this->db->query("SELECT barang_masuk.id_brgmasuk, barang_masuk.total, barang_masuk.tanggal, barang_masuk.part_no, suplier.nama_suplier,barang.nama_barang from barang_masuk join suplier on barang_masuk.id_suplier=suplier.id_suplier JOIN barang on barang_masuk.part_no=barang.part_no where MONTH(tanggal)='$bulan'");
    if ($bulan==1){
        $bulan="Januari";
    }
    elseif ($bulan==2){
        $bulan=="Februari";
    }
    elseif ($bulan==3){
        $bulan="Maret";
    }
    elseif ($bulan==4){
        $bulan="April";
    }
    elseif ($bulan==5){
        $bulan="Mei";
    }
    elseif ($bulan==6){
        $bulan="Juni";
    }
    elseif ($bulan==7){
        $bulan="Juli";
    }
    elseif ($bulan==8){
        $bulan="Agustus";
    }
    elseif ($bulan==9){
        $bulan="September";
    }
    elseif ($bulan==10){
        $bulan="Oktober";
    }
    elseif ($bulan==11){
        $bulan="November";
    }
    elseif ($bulan==12){
        $bulan="Desember";
    }

    $cekrow=$query11->num_rows();
    if ($cekrow < 1){
        echo "<script language='javascript'>
        alert('Data Masih Kosong');
        window.location='../laporan';
        </script>";
    }
    else {
        $pdf = new FPDF('L','mm',array(250,297));
        $pdf->AddPage();
        $pdf->Image('https://i1.wp.com/lokerku.net/wp-content/uploads/2018/11/PT-Sanoh-Indonesia-lokerkudotnet.png',20,5,40,20);
        $pdf->SetX(120);
        $pdf->SetFont('Arial','B',12);
        $pdf->Cell(40,10,'PT Sanoh Indonesia',0,0,'C');
        $pdf->Ln(4);
        $pdf->SetX(90);
        $pdf->SetFont('Arial','',8);
        $pdf->Cell(40,10,'Kawasan Industri Hyundai, Jl. Inti II No.10, Sukaresmi, Cikarang Sel., Bekasi, Jawa Barat 17530');
        $pdf->SetFont('Arial','',8);
        $pdf->Ln(4);
        $pdf->SetX(125);
        $pdf->Cell(40,10,'Telp 0267 - 4041273');
        $pdf->SetFont('Arial','B',8);
        $pdf->Ln(5);
        $pdf->SetLineWidth(0);
        $pdf->Line(0,25,300,25);
        $pdf->SetX(120);
        $pdf->SetFont('Arial','B',12);
        $pdf->Cell(40,10,'Laporan Data Barang Masuk',0,0,'C');

        $pdf->Ln(4);
        $pdf->SetX(120);
        $pdf->Cell(40,10,'Bulan '.$bulan. " 2019",0,0,'C');
        $pdf->SetX(120);
        $pdf->SetFont('Arial','',8);
        //    $pdf->Cell(40,10,'Bulan : '.$bulan,0,0,'C');
        $pdf->Ln(4);
             //Table
        $pdf->SetX(120);
        $pdf->Ln(8);
        $pdf->SetX(90);
        $pdf->SetFont('Arial','',8);
        $pdf->Cell(10,6,'No',1,0);
        $pdf->Cell(20,6,'Tanggal',1,0);
        $pdf->Cell(30,6,'Part no',1,0);
        $pdf->Cell(30,6,'Nama Barang',1,0);
        $pdf->Cell(20,6,'Total',1,1);
         
      $no=1;
 foreach ($query as $rowquery) {
    $pdf->SetX(90);
    $pdf->Cell(10,6,$no++,1,0);
      $pdf->Cell(20,6,$rowquery->tanggal,1,0);
    $pdf->Cell(30,6,$rowquery->part_no,1,0);
    $pdf->Cell(30,6,$rowquery->nama_barang,1,0);
    $pdf->Cell(20,6,$rowquery->total,1,1);
}
        $pdf->Output();
    }
}

public function cetak2() {

    $bulan=$this->input->post('bulan');
      //  $query = $this->db->query("select  tanggal, id_query, data_pasien.reg, data_pasien.nama as nama_pasien, data_dokter.nama as nama_dokter, data_kamar.nama as nama_kamar, data_rawat_inap.biaya as biaya_rawat_inap, data_query_obat.biaya as biaya_obat, bhp, dpjp, konsultasi, visite, total from data_pasien join query on data_pasien.reg=query.reg join data_dokter on data_dokter.id_dokter=query.id_dokter join data_kamar on data_kamar.id_kamar=query.id_kamar join data_rawat_inap on data_rawat_inap.id_rawat_inap=query.id_rawat_inap join data_query_obat on data_query_obat.id_query_obat=query.id_query_obat where MONTH(tanggal)='$bulan'")->result();
    $query = $this->db->query("SELECT barang_keluar.id_brgkeluar, barang_keluar.total, barang_keluar.tanggal, barang_keluar.part_no, suplier.nama_suplier,barang.nama_barang from barang_keluar join suplier on barang_keluar.id_suplier=suplier.id_suplier JOIN barang on barang_keluar.part_no=barang.part_no where MONTH(tanggal)='$bulan'")->result();
    $query11 = $this->db->query("SELECT barang_keluar.id_brgkeluar, barang_keluar.total, barang_keluar.tanggal, barang_keluar.part_no, suplier.nama_suplier,barang.nama_barang from barang_keluar join suplier on barang_keluar.id_suplier=suplier.id_suplier JOIN barang on barang_keluar.part_no=barang.part_no where MONTH(tanggal)='$bulan'");
    if ($bulan==1){
        $bulan="Januari";
    }
    elseif ($bulan==2){
        $bulan=="Februari";
    }
    elseif ($bulan==3){
        $bulan="Maret";
    }
    elseif ($bulan==4){
        $bulan="April";
    }
    elseif ($bulan==5){
        $bulan="Mei";
    }
    elseif ($bulan==6){
        $bulan="Juni";
    }
    elseif ($bulan==7){
        $bulan="Juli";
    }
    elseif ($bulan==8){
        $bulan="Agustus";
    }
    elseif ($bulan==9){
        $bulan="September";
    }
    elseif ($bulan==10){
        $bulan="Oktober";
    }
    elseif ($bulan==11){
        $bulan="November";
    }
    elseif ($bulan==12){
        $bulan="Desember";
    }

    $cekrow=$query11->num_rows();
    if ($cekrow < 1){
        echo "<script language='javascript'>
        alert('Data Masih Kosong');
        window.location='../laporan';
        </script>";
    }
    else {
        $pdf = new FPDF('L','mm',array(250,297));
        $pdf->AddPage();
        $pdf->Image('https://i1.wp.com/lokerku.net/wp-content/uploads/2018/11/PT-Sanoh-Indonesia-lokerkudotnet.png',20,5,40,20);
        $pdf->SetX(120);
        $pdf->SetFont('Arial','B',12);
        $pdf->Cell(40,10,'PT Sanoh Indonesia',0,0,'C');
        $pdf->Ln(4);
        $pdf->SetX(90);
        $pdf->SetFont('Arial','',8);
        $pdf->Cell(40,10,'Kawasan Industri Hyundai, Jl. Inti II No.10, Sukaresmi, Cikarang Sel., Bekasi, Jawa Barat 17530');
        $pdf->SetFont('Arial','',8);
        $pdf->Ln(4);
        $pdf->SetX(125);
        $pdf->Cell(40,10,'Telp 0267 - 4041273');
        $pdf->SetFont('Arial','B',8);
        $pdf->Ln(5);
        $pdf->SetLineWidth(0);
        $pdf->Line(0,25,300,25);
        $pdf->SetX(120);
        $pdf->SetFont('Arial','B',12);
        $pdf->Cell(40,10,'Laporan Data Barang Keluar',0,0,'C');

        $pdf->Ln(4);
        $pdf->SetX(120);
        $pdf->Cell(40,10,'Bulan '.$bulan. " 2019",0,0,'C');
        $pdf->SetX(120);
        $pdf->SetFont('Arial','',8);
        //    $pdf->Cell(40,10,'Bulan : '.$bulan,0,0,'C');
        $pdf->Ln(4);
             //Table
        $pdf->SetX(120);
        $pdf->Ln(8);
        $pdf->SetX(90);
        $pdf->SetFont('Arial','',8);
        $pdf->Cell(10,6,'No',1,0);
        $pdf->Cell(20,6,'Tanggal',1,0);
        $pdf->Cell(30,6,'Part no',1,0);
        $pdf->Cell(30,6,'Nama Barang',1,0);
        $pdf->Cell(20,6,'Total',1,1);
         
      $no=1;
 foreach ($query as $rowquery) {
    $pdf->SetX(90);
    $pdf->Cell(10,6,$no++,1,0);
      $pdf->Cell(20,6,$rowquery->tanggal,1,0);
    $pdf->Cell(30,6,$rowquery->part_no,1,0);
    $pdf->Cell(30,6,$rowquery->nama_barang,1,0);
    $pdf->Cell(20,6,$rowquery->total,1,1);
}
        $pdf->Output();
    }
}



}


