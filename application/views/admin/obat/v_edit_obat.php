<?php $this->load->view('admin/sniphets/header')?>
<body>
<?php $this->load->view('admin/sniphets/menu')?>
<?php foreach ($obat as $roweditobat) {
    $kode_obat=$roweditobat->kode_obat;
    $nama=$roweditobat->nama;
    $stok=$roweditobat->stok;
    $harga=$roweditobat->harga;
    $id=$roweditobat->id_obat;

}
?>
<!---->
<main>
<div class="container my-5">
<div class=" card col-8 offset-2 my-2 p-3">
<center><b>Edit Data </b></center>
          <form action="<?php echo base_url()?>index.php/admin/obat/update" method="POST">
          <div class="form-group">
              <label for="listname">Kode Obat</label>
              <input type="hidden" value="<?php echo $id?>" class="form-control" name="id" id="nama" placeholder="">
              <input type="text" value="<?php echo $kode_obat?>" class="form-control" name="kode_obat" id="nama" placeholder="">
            </div>
          <div class="form-group">
              <label for="listname">Nama</label>
              <input type="text" value="<?php echo $nama?>" class="form-control" name="nama" id="nama" placeholder="">
            </div>
            <div class="form-group">
              <label for="datepicker">Stok</label>
              <input  type="text" value="<?php echo $stok?>" class="form-control" name="stok" id="umur" placeholder="">
            </div>
            <div class="form-group">
              <label for="listname">Harga</label>
              <input  type="text" value="<?php echo $harga?>" class="form-control" name="harga" id="umur" placeholder="">
            </div>
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
<footer >
  <div class="container bg-info p-5">

	</div>
</footer>
</body>