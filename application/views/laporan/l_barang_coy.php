<?php $this->load->view('sniphets/header')?>
<body>
<?php $this->load->view('sniphets/menu')?>
<!---->
<main>
<div class="container my-5">
       <div class="card-body text-center">
       
       <h4 class="card-title">Laporan Barang Masuk</h4>
       <div><?php echo $this->session->flashdata('msg'); ?><div>
  </div>
    <div class="card">
    <div class="container bg-info p-5">
    <form action="<?php echo base_url()?>index.php/laporan/cetak1" method="post"> 
    <div class="form-group">
    <label>Pilih Bulan</label><br>
    <select name="bulan" class="form-control">
        <option>--PILIH--</option>
        <option value="1">Januari</option>
        <option value="2">Februari</option>
        <option value="3">Maret</option>
        <option value="4">April</option>
        <option value="5">Mei</option>
        <option value="6">Juni</option>
        <option value="7">Juli</option>
        <option value="8">Agustus</option>
        <option value="9">September</option>
        <option value="10">Oktober</option>
        <option value="11">November</option>
        <option value="12">Desember</option>
    </select>
  <p>Klik Print untuk mencetak laporan barang</p>
    <button type="submit" class="btn btn-success">Print</button>
    </div>
        </form>
</div><br>
       
</main>
<!---->

<!---->
<?php $this->load->view('admin/sniphets/footer') ?>