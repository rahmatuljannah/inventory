<?php $this->load->view('admin/sniphets/header')?>
<body>
<?php $this->load->view('admin/sniphets/menu')?>
<?php foreach ($rekam_medis as $roweditrekam_medis) {
    $reg=$roweditrekam_medis->reg;
    $alergi=$roweditrekam_medis->riwayat_alergi;
    $diagnosa=$roweditrekam_medis->diagnosa;
    $tanggal=$roweditrekam_medis->tanggal;
    $pengobatan=$roweditrekam_medis->pengobatan;
    $id=$roweditrekam_medis->id_rekam_medis;

}
?>
<!---->
<main>
<div class="container my-5">
<div class=" card col-8 offset-2 my-2 p-3">
<center><b>Edit Data </b></center>
          <form action="<?php echo base_url()?>index.php/admin/rekammedis/update" method="POST">
          <div class="form-group">
              <label for="listname">No Registrasi</label>
              <input  type="hidden" class="form-control" name="id" value="<?php echo $id?>" id="umur" placeholder="">
              <input  type="text" class="form-control" name="reg" id="umur" value="<?php echo $reg?>" placeholder="">
             </div>
            <div class="form-group">
              <label for="datepicker">Riwayat Alergi</label>
              <input  type="text" value="<?php echo $alergi?>" class="form-control" name="alergi" id="umur" placeholder="">
            </div>
            <div class="form-group">
              <label for="datepicker">Diagnosa</label>
              <input  type="text" value="<?php echo $diagnosa?>" class="form-control" name="diagnosa" id="umur" placeholder="">
            </div>
            <div class="form-group">
              <label >Tanggal</label>
              <input value="<?php echo $tanggal?>" id="datepick" type="text" class="form-control" name="tanggal" id="umur" placeholder="">
            </div>
            <div class="form-group">
              <label for="datepicker">Pengobatan</label>
              <input value="<?php echo $pengobatan?>" type="text" class="form-control" name="pengobatan" id="umur" placeholder="">
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