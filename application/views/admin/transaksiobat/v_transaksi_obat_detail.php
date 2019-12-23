<?php $this->load->view('admin/sniphets/header')?>
<body>
<?php $this->load->view('admin/sniphets/menu')?>
<!---->
<?php foreach ($transaksi_obat as $rowtransaksi_obat){
  $reg=$rowtransaksi_obat->reg;
  $nama=$rowtransaksi_obat->nama_pasien;
  $alamat=$rowtransaksi_obat->alamat;
  $umur=$rowtransaksi_obat->umur;
  $obat=$rowtransaksi_obat->nama_obat;
  $jumlah=$rowtransaksi_obat->jumlah;
  $total=$rowtransaksi_obat->biaya;
}
  ?>
<main>
<div class="container my-5">
       <div class="card-body text-center">
    <h4 class="card-title">Transaksi Obat Details</h4>
  </div>
    <div class="card">
    <div class=" card col-8 offset-2 my-2 p-3">
    <div class="form-group">
       <label for="listname">No Registrasi</label>
            <input value="<?php echo $reg?>" type="text" class="form-control"/>     
        </div>
        <div class="form-group">
       <label for="listname">Nama</label>
            <input value="<?php echo $nama?>" type="text" class="form-control"/>     
        </div>
        <div class="form-group">
       <label for="listname">Alamat</label>
            <input value="<?php echo $alamat?>" type="text" class="form-control"/>     
        </div>
        <div class="form-group">
       <label for="listname">Umur</label>
            <input value="<?php echo $umur?>" type="text" class="form-control"/>     
        </div>
        <div class="form-group">
       <label for="listname">Nama Obat</label>
            <input value="<?php echo $obat?>" type="text" class="form-control"/>     
        </div>
        <div class="form-group">
       <label for="listname">Jumlah Beli</label>
            <input value="<?php echo $jumlah?>" type="text" class="form-control"/>     
        </div>
        <div class="form-group">
       <label for="listname">Total Biaya </label>
            <input value="<?php echo "Rp. ".number_format($total)?>" type="text" class="form-control"/>     
        </div>
        </div>
        </div>
    </div>
    <!-- Large modal -->

<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
          <div class="card-body text-center">
           <!-- <h4 class="card-title">Special title treatment</h4>
            <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
          </div>-->
            <div class=" card col-8 offset-2 my-2 p-3">
          <form action="<?php echo base_url()?>index.php/admin/transaksiobat/do_insert" method="POST">
            <div class="form-group">
              <label for="listname">No Registrasi</label>
              <select class="form-control" name="reg">
                  <?php foreach ($pasien as $rowpasien) {?>
                  <option value="<?php echo $rowpasien->reg?>"><?php echo $rowpasien->reg?></option>
                  <?php } ?>
                  </select>
            </div>

            <div class="form-group">
              <label for="listname">Obat</label>
              <select class="form-control" name="obat">
                  <?php foreach ($obat as $rowobat) {?>
                  <option value="<?php echo $rowobat->id_obat?>"><?php echo $rowobat->nama?></option>
                  <?php } ?>
                  </select>
            </div>

            <div class="form-group">
              <label for="datepicker">Jumlah</label>
              <input type="text" name="jumlah" class="form-control"/>
            </div><br>
           <div class="form-group text-center">
             <button type="submit" class="btn btn-block btn-primary">Submit</button>
          </div>
        </form>
    </div>
    </div>
  </div>
</div>
</div>
</main>
<!---->

<!---->
<?php $this->load->view('admin/sniphets/footer') ?>