<?php $this->load->view('admin/sniphets/header')?>
<body>
<?php $this->load->view('admin/sniphets/menu')?>
<?php foreach ($transaksi as $rowtransaksi){
    $reg=$rowtransaksi->reg;
    $nama_pasien=$rowtransaksi->nama_pasien;
    $nama_dokter=$rowtransaksi->nama_dokter;
    $biaya_rawat_jalan=$rowtransaksi->biaya_rawat_jalan;
    $biaya_obat=$rowtransaksi->biaya_obat;
  
    $total=$rowtransaksi->total;
    
}
?>
<!---->
<main>
<div class="container my-5">
       <div class="card-body text-center">
       <h4 class="card-title">Laporan Rawat jalan</h4>
       <div class=" card col-8 offset-2 my-2 p-3">
       <div class="form-group">
       <label for="listname">No Registrasi</label>
            <input value="<?php echo $reg?>" type="text" class="form-control"/>     
        </div>
        <div class="form-group">
       <label for="listname">Nama Pasien</label>
            <input value="<?php echo $nama_pasien?>" type="text" class="form-control"/>     
        </div>
        <div class="form-group">
       <label for="listname">Nama Dokter</label>
            <input value="<?php echo $nama_dokter?>" type="text" class="form-control"/>     
        </div>
        <div class="form-group">
       <label for="listname">Biaya Rawat Jalan</label>
            <input value="<?php echo "Rp. ".number_format($biaya_rawat_jalan)?>" type="text" class="form-control"/>     
        </div>
        <div class="form-group">
       <label for="listname">Biaya Obat</label>
            <input value="<?php echo "Rp. ".number_format($biaya_obat)?>" type="text" class="form-control"/>     
        </div>
        <div class="form-group">
       <label for="listname">Total Biaya</label>
            <input value="<?php echo "Rp. ".number_format($total)?>" type="text" class="form-control"/>     
        </div>
    </div>
  </div>
</main>
<!---->

<!---->
<?php $this->load->view('admin/sniphets/footer') ?>