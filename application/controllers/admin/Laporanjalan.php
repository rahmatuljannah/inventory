<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporanjalan extends CI_Controller {
  
    public function index(){
     # if ($this->session->userdata('level') == "Admin")
	#	{
    //$data['transaksi'] = $this->db->query("select id_transaksi, data_pasien.reg, data_pasien.nama as nama_pasien, data_dokter.nama as nama_dokter, data_rawat_jalan.biaya as biaya_rawat_jalan, data_transaksi_obat.biaya as biaya_obat, total from data_pasien join transaksi on data_pasien.reg=transaksi.reg join data_dokter on data_dokter.id_dokter=transaksi.id_dokter join data_rawat_jalan on data_rawat_jalan.id_rawat_jalan=transaksi.id_rawat_jalan join data_transaksi_obat on data_transaksi_obat.id_transaksi_obat=transaksi.id_transaksi_obat where id_transaksi")->result();
    $data['data_obat']=$this->db->query('select * from data_obat where stok between 1 and 10');
    $data['data_obat']=$data['data_obat']->num_rows();
    $data['transaksi']=$this->db->query("select id_transaksi, data_pasien.reg, data_pasien.nama as nama_pasien, data_dokter.nama as nama_dokter, data_rawat_jalan.biaya as biaya_rawat_jalan,  total from data_pasien join transaksi on data_pasien.reg=transaksi.reg join data_dokter on data_dokter.id_dokter=transaksi.id_dokter join data_rawat_jalan on data_rawat_jalan.id_rawat_jalan=transaksi.id_rawat_jalan")->result();  
    $this->load->view('admin/laporan/v_data_laporanjalan',$data);
    }  

    public function detail($id) {
        $data['data_obat']=$this->db->query('select * from data_obat where stok between 1 and 10');
        $data['data_obat']=$data['data_obat']->num_rows();
        $transaksi_obat=$this->db->query("select * from data_transaksi_obat where reg='$id'");
        $cekrow=$transaksi_obat->num_rows();
       
        $data['transaksi'] = $this->db->query("select id_transaksi, data_pasien.reg, data_pasien.nama as nama_pasien, data_dokter.nama as nama_dokter, data_rawat_jalan.biaya as biaya_rawat_jalan, data_transaksi_obat.biaya as biaya_obat, total from data_pasien join transaksi on data_pasien.reg=transaksi.reg join data_dokter on data_dokter.id_dokter=transaksi.id_dokter join data_rawat_jalan on data_rawat_jalan.id_rawat_jalan=transaksi.id_rawat_jalan join data_transaksi_obat on data_transaksi_obat.id_transaksi_obat=transaksi.id_transaksi_obat where data_pasien.reg='$id'")->result();
        $data['transaksi1']=$this->db->query("select id_transaksi, data_pasien.reg, data_pasien.nama as nama_pasien, data_dokter.nama as nama_dokter, data_rawat_jalan.biaya as biaya_rawat_jalan,  total from data_pasien join transaksi on data_pasien.reg=transaksi.reg join data_dokter on data_dokter.id_dokter=transaksi.id_dokter join data_rawat_jalan on data_rawat_jalan.id_rawat_jalan=transaksi.id_rawat_jalan where data_pasien.reg='$id'")->result();  
        if ($cekrow>0){
        $this->load->view('admin/laporan/v_data_laporanjalan_detail',$data);
        }
        else {
            $this->load->view('admin/laporan/v_data_laporanjalan_detail1',$data);
        }
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
        $this->m_crud->insert_data($data,'data_transaksi');
        $this->session->set_flashdata('msg', 
                    '<div class="alert alert-success">
                        <h4>Berhasil Insert Data</h4>
                    </div>');  
        redirect('admin/transaksi');
    }
    
    else {
        $this->session->set_flashdata('msg', 
                    '<div class="alert alert-danger">
                        <h4>Semua Nilai Harus Diisi</h4>
                    </div>');  
        redirect('admin/transaksi');
    }

    }

    function hapus($id){
        $where = array('id_transaksi' => $id);
        $this->m_crud->hapus_data($where,'transaksi');
        $this->session->set_flashdata('msg', 
                    '<div class="alert alert-success">
                        <h4>Berhasil Hapus Data</h4>
                    </div>');  
        redirect('admin/laporanjalan');
      }

      public function cetak() {
        
        $bulan=$this->input->post('bulan');
       // $transaksi = $this->db->query("select  tanggal, id_transaksi, data_pasien.reg, data_pasien.nama as nama_pasien, data_dokter.nama as nama_dokter, data_kamar.nama as nama_kamar, data_rawat_inap.biaya as biaya_rawat_inap, data_transaksi_obat.biaya as biaya_obat, bhp, dpjp, konsultasi, visite, total from data_pasien join transaksi on data_pasien.reg=transaksi.reg join data_dokter on data_dokter.id_dokter=transaksi.id_dokter join data_kamar on data_kamar.id_kamar=transaksi.id_kamar join data_rawat_inap on data_rawat_inap.id_rawat_inap=transaksi.id_rawat_inap join data_transaksi_obat on data_transaksi_obat.id_transaksi_obat=transaksi.id_transaksi_obat where MONTH(tanggal)='$bulan'")->result();
        $transaksi1=$this->db->query("select tanggal, id_transaksi, data_pasien.reg, data_pasien.nama as nama_pasien, data_dokter.nama as nama_dokter, data_rawat_jalan.biaya as biaya_rawat_jalan,  total from data_pasien join transaksi on data_pasien.reg=transaksi.reg join data_dokter on data_dokter.id_dokter=transaksi.id_dokter join data_rawat_jalan on data_rawat_jalan.id_rawat_jalan=transaksi.id_rawat_jalan where MONTH(tanggal)='$bulan'")->result();  
        $transaksi2=$this->db->query("select id_transaksi, data_pasien.reg, data_pasien.nama as nama_pasien, data_dokter.nama as nama_dokter, data_rawat_jalan.biaya as biaya_rawat_jalan,  total from data_pasien join transaksi on data_pasien.reg=transaksi.reg join data_dokter on data_dokter.id_dokter=transaksi.id_dokter join data_rawat_jalan on data_rawat_jalan.id_rawat_jalan=transaksi.id_rawat_jalan where MONTH(tanggal)='$bulan'");  
       

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
 
        $cekrow=$transaksi2->num_rows();
        if ($cekrow < 1){
            echo "<script language='javascript'>
            alert('Data Masih Kosong');
         window.location='../laporanjalan';
</script>";
        }
        else {
        $pdf = new FPDF('L','mm',array(250,297));
        $pdf->AddPage();
        $pdf->Image('https://lh3.googleusercontent.com/-1YlxDD41PEk/XJyTgopBl6I/AAAAAAAAC5o/A1Mg_gj4iIMOaO4WgzJ39Yqnd12cUKbPQCLcBGAs/h120/Screenshot%2Bfrom%2B2019-03-28%2B16.26.40.png',20,5,40,20);
        $pdf->SetX(120);
        $pdf->SetFont('Arial','B',12);
        $pdf->Cell(40,10,'RUMAH BERSALIN DELIMA WALUYA',0,0,'C');
        $pdf->Ln(4);
        $pdf->SetX(103);
        $pdf->SetFont('Arial','',8);
        $pdf->Cell(40,10,'Jln. Proklamasi No 1, Karawang, Jawa Barat - Indonesia');
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
        $pdf->Cell(40,10,'Laporan Data Rawat Jalan',0,0,'C');
        $pdf->Ln(4);
        $pdf->SetX(120);
        $pdf->SetFont('Arial','',8);
        $pdf->Cell(40,10,'Bulan : '.$bulan,0,0,'C');
        $pdf->Ln(4);
         //Table
        
         $pdf->Ln(8);
         $pdf->SetFont('Arial','',8);
         $pdf->Cell(10,6,'No',1,0);
         $pdf->Cell(30,6,'No Reg',1,0);
         $pdf->Cell(50,6,'Tanggal',1,0);
         $pdf->Cell(50,6,'Nama Pasien',1,0);
         $pdf->Cell(50,6,'Nama Dokter',1,0);
         $pdf->Cell(50,6,'Biaya Rawat Jalan',1,0);
         $pdf->Cell(20,6,'Total',1,1);
         //Isi Table
         //$data_obat=$this->db->query("select * from data_obat where id_obat='$obat'")->result();
         $no=1;
         foreach ($transaksi1 as $rowtransaksi) {
           $pdf->Cell(10,6,$no++,1,0);
           $pdf->Cell(30,6,$rowtransaksi->reg,1,0);
           $pdf->Cell(50,6,$rowtransaksi->tanggal,1,0);
           $pdf->Cell(50,6,$rowtransaksi->nama_pasien,1,0);
           $pdf->Cell(50,6,$rowtransaksi->nama_dokter,1,0);
           $pdf->Cell(50,6,"Rp. ".number_format($rowtransaksi->biaya_rawat_jalan),1,0);
           $pdf->Cell(20,6,"Rp. ".number_format($rowtransaksi->total),1,1);
         }
         if ($bulan=="Januari"){
            $bulan="1";
        }
        elseif ($bulan=="Februari"){
            $bulan=="2";
        }
        elseif ($bulan=="Maret"){
            $bulan="3";
        }
        elseif ($bulan=="April"){
            $bulan="4";
        }
        elseif ($bulan=="Mei"){
            $bulan="5";
        }
        elseif ($bulan=="Juni"){
            $bulan="6";
        }
        elseif ($bulan=="Juli"){
            $bulan="7";
        }
        elseif ($bulan=="Agustus"){
            $bulan="8";
        }
        elseif ($bulan=="September"){
            $bulan="9";
        }
        elseif ($bulan=="Oktober"){
            $bulan="10";
        }
        elseif ($bulan=="November"){
            $bulan="11";
        }
        elseif ($bulan=="Desember"){
            $bulan="12";
        }
         $sum=$this->db->query("select tanggal, id_transaksi, data_pasien.reg, data_pasien.nama as nama_pasien, data_dokter.nama as nama_dokter, data_rawat_jalan.biaya as biaya_rawat_jalan, sum(total) as total from data_pasien join transaksi on data_pasien.reg=transaksi.reg join data_dokter on data_dokter.id_dokter=transaksi.id_dokter join data_rawat_jalan on data_rawat_jalan.id_rawat_jalan=transaksi.id_rawat_jalan where MONTH(tanggal)='$bulan'")->result();
         foreach ($sum as $sumtotal){}
         $pdf->SetX(235);
         $pdf->SetFont('Arial','',8);
         $pdf->Cell(40,10,'Total Rp. '.number_format($sumtotal->total),0,0,'C');
        
        $pdf->Output();
      }
    }
    
}
