<?php $this->load->view('admin/sniphets/header')?>
<body>
<?php $this->load->view('admin/sniphets/menu')?>
<?php foreach ($pasien as $roweditpasien) {
    $reg= $roweditpasien->reg;
    $nama=$roweditpasien->nama;
    $alamat=$roweditpasien->alamat;
    $umur=$roweditpasien->umur;
    $id=$roweditpasien->id_pasien;
}
?>
<!---->
<main>
<div class="container my-5">
<div class=" card col-8 offset-2 my-2 p-3">
<center><b>Edit Data </b></center>
          <form action="<?php echo base_url()?>index.php/admin/pasien/update" method="POST">
          <div class="form-group">
              <label for="listname">No Registrasi</label>
              <input type="hidden" value="<?php echo $id; ?>" class="form-control" name="id" id="reg" placeholder="">
              <input type="text" value="<?php echo $reg; ?>" class="form-control" name="reg" id="reg" placeholder="">
            </div>
            <div class="form-group">
              <label for="listname">Nama</label>
              <input type="text" value="<?php echo $nama; ?>" class="form-control" name="nama" id="nama" placeholder="">
            </div>
            <div class="form-group">
              <label for="datepicker">Umur</label>
              <input  type="text" value="<?php echo $umur; ?>" class="form-control" name="umur" id="umur" placeholder="">
            </div>
            <div class="form-group">
              <label for="listname">Alamat</label>
              <input type="text" name="alamat" class="form-control" value="<?php echo $alamat; ?>"/>             </div>
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
<?php $this->load->view('admin/sniphets/footer')?>