<?php $this->load->view('admin/sniphets/header')?>
<body>
<?php $this->load->view('admin/sniphets/menu')?>
<?php foreach ($rekam_medis as $rowmedis){
  $reg=$rowmedis->reg;
  $nama=$rowmedis->nama;
  $alamat=$rowmedis->alamat;
  $umur=$rowmedis->umur;
  $riwayat_alergi=$rowmedis->riwayat_alergi;
  $tanggal=$rowmedis->tanggal;
  $diagnosa=$rowmedis->diagnosa;
  $pengobatan=$rowmedis->pengobatan;

}?>
<!---->
<main>
<div class="container my-5">
       <div class="card-body text-center">
       <h4 class="card-title">Data Rekam Medis Detail</h4>
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
       <label for="listname">Riwayat Alergi</label>
            <input value="<?php echo $riwayat_alergi?>" type="text" class="form-control"/>     
        </div>
        <table class="table table-hover">
            <thead>
              <tr>
                <th scope="col">Tanggal</th>
                <th scope="col">Diagnosa </th>
                <th scope="col">Pengobatan</th>
              </tr>
              <tbody>
              <tr>
              <td><?php echo $tanggal?></td>
              <td><?php echo $diagnosa?></td>
              <td><?php echo $pengobatan?></td>


              </tr>
              </tbody>
            </thead>
</table>
      </div>  
    </div>
  </div>
 
</main>
<!---->
<script>
        $('#datepick').datepicker({format: 'yyyy-mm-dd'});
    </script>
<!---->
<?php $this->load->view('admin/sniphets/footer') ?>