<?php $this->load->view('admin/sniphets/header')?>
<body>
<?php $this->load->view('admin/sniphets/menu')?>
<?php foreach ($rawat_inap as $roweditrawat_inap) {
    $nama=$roweditrawat_inap->nama;
    $biaya=$roweditrawat_inap->biaya;
    $id=$roweditrawat_inap->id_rawat_inap;

}
?>
<!---->
<main>
<div class="container my-5">
<div class=" card col-8 offset-2 my-2 p-3">
<center><b>Edit Data </b></center>
          <form action="<?php echo base_url()?>index.php/admin/inap/update" method="POST">
          <div class="form-group">
              <label for="listname">Nama</label>
              <input type="hidden" value="<?php echo $id?>" class="form-control" name="id" id="nama" placeholder="">
              <input type="text" value="<?php echo $nama?>" class="form-control" name="nama" id="nama" placeholder="">
            </div>
            <div class="form-group">
              <label for="listname">Biaya</label>
              <input  type="text" value="<?php echo $biaya?>" class="form-control" name="biaya" id="umur" placeholder="">
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