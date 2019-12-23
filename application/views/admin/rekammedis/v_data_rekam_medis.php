<?php $this->load->view('admin/sniphets/header')?>
<body>
<?php $this->load->view('admin/sniphets/menu')?>
<!---->
<main>
<div class="container my-5">
       <div class="card-body text-center">
       <h4 class="card-title">Data Rekam Medis</h4>
       <div><?php echo $this->session->flashdata('msg'); ?></div>
  </div>
    <div class="card">
        <button id="add__new__list" type="button" class="btn btn-success position-absolute" data-toggle="modal" data-target=".bd-example-modal-lg"><i class="fa fa-plus"></i> Tambah Rekam Medis</button>
        <table class="table table-hover">
            <thead>
              <tr>
                <th scope="col">No</th>
                <th scope="col">No Reg </th>
                <th scope="col">Nama Pasien</th>
                <th scope="col">Umur</th>
                <th scope="col">Alamat</th>
                <th scope="col">Riwayat Alergi</th>
                <th scope="col">Edit List</th>
                <th scope="col">Details</th>
              </tr>
            </thead>
            <tbody>
            <?php if (empty($rekam_medis)) { ?>
                <tr> 
                      <td colspan="8">Data Belum Ada</td> 
                </tr> 
            <?php
                } else {
                    $no = 0;
                    foreach ($rekam_medis as $rowrekam_medis) {
                            $no++;
            ?> 
                <tr> 
                   <td><?php echo $no ?></td>
                    <td><?php echo $rowrekam_medis->reg ?></td>
                    <td><?php echo $rowrekam_medis->nama ?></td>
                    <td><?php echo $rowrekam_medis->umur ?></td>
                    <td><?php echo $rowrekam_medis->alamat ?></td>
                    <td><?php echo $rowrekam_medis->riwayat_alergi ?></td>
                    <td>
                    <a class="btn btn-sm btn-primary" href="<?php echo base_url() ?>index.php/admin/rekammedis/edit/<?php echo $rowrekam_medis->id_rekam_medis ?>"><i class="fa fa-edit"></i> Edit</a>
                    <a class="btn btn-sm btn-danger" href="<?php echo base_url() ?>index.php/admin/rekammedis/hapus/<?php echo $rowrekam_medis->id_rekam_medis ?>"><i class="fa fa-trash"></i> Delete</a>    
                    </td>
                    <td><a class="btn btn-sm btn-info" href="<?php echo base_url() ?>index.php/admin/rekammedis/detail/<?php echo $rowrekam_medis->id_rekam_medis ?>"><i class="fa fa-info-circle"></i> Details</a> </td>
                </tr>
                <?php }} ?>
            </tbody>
          </table>
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
          <form action="<?php echo base_url()?>index.php/admin/rekammedis/do_insert" method="POST">
            <div class="form-group">
              <label for="listname">No Registrasi</label>
            <select name="reg" class="form-control">
                <option>--PILIH--</option>
                <?php foreach ($pasien as $rowpasien){ ?>
                  <option value="<?php echo $rowpasien->reg?>"><?php echo $rowpasien->reg?></option>
               <?php } ?>
               </select>
             </div>
            <div class="form-group">
              <label for="datepicker">Riwayat Alergi</label>
              <input  type="text" class="form-control" name="alergi" id="umur" placeholder="">
            </div>
            <div class="form-group">
              <label for="datepicker">Diagnosa</label>
              <input  type="text" class="form-control" name="diagnosa" id="umur" placeholder="">
            </div>
            <div class="form-group">
              <label >Tanggal</label>
              <input id="datepick" type="text" class="form-control" name="tanggal" id="umur" placeholder="">
            </div>
            <div class="form-group">
              <label for="datepicker">Pengobatan</label>
              <input  type="text" class="form-control" name="pengobatan" id="umur" placeholder="">
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
<script>
        $('#datepick').datepicker({format: 'yyyy-mm-dd'});
    </script>
<!---->
<?php $this->load->view('admin/sniphets/footer') ?>