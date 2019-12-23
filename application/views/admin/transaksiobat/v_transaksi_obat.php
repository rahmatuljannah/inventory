<?php $this->load->view('admin/sniphets/header')?>
<body>
<?php $this->load->view('admin/sniphets/menu')?>
<!---->

<main>
<div class="container my-5">
       <div class="card-body text-center">
    <!--<h4 class="card-title">Special title treatment</h4>
    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
   --> <div><?php echo $this->session->flashdata('msg'); ?><div>
  </div>
    <div class="card">
        <button id="add__new__list" type="button" class="btn btn-success position-absolute" data-toggle="modal" data-target=".bd-example-modal-lg"><i class="fa fa-plus"></i> Tambah Transaksi Obat</button>
        <table class="table table-hover">
            <thead>
              <tr>
                <th scope="col">No</th>
                <th scope="col">No Registrasi </th>
                <th scope="col">Nama </th>
                <th scope="col">Obat</th>
                <th scope="col">Jumlah</th>
                <th scpe="col">Biaya</th>
                <th scope="col">Delete List</th>
                <th scope="col">Detail List</th>
              </tr>
            </thead>
            <tbody>
            <?php if (empty($transaksi_obat)) { ?>
                <tr> 
                      <td colspan="8">Data Belum Ada</td> 
                </tr> 
            <?php
                } else {
                    $no = 0;
                    foreach ($transaksi_obat as $rowtransaksi_obat) {
                            $no++;
            ?> 
                <tr> 
                   <td><?php echo $no ?></td>
                   <td><?php echo $rowtransaksi_obat->reg ?></td>
                    <td><?php echo $rowtransaksi_obat->nama_pasien ?></td>
                    <td><?php echo $rowtransaksi_obat->nama_obat ?></td>
                    <td><?php echo $rowtransaksi_obat->jumlah ?></td>
                    <td><?php echo "Rp. ".number_format($rowtransaksi_obat->biaya) ?></td>
                    <td>
          
                    <a class="btn btn-sm btn-danger" href="<?php echo base_url() ?>index.php/admin/transaksiobat/hapus/<?php echo $rowtransaksi_obat->id_transaksi_obat ?>"><i class="fa fa-trash"></i> Delete</a>    
                    </td>
                    <td><a class="btn btn-sm btn-info" href="<?php echo base_url() ?>index.php/admin/transaksiobat/detail/<?php echo $rowtransaksi_obat->id_transaksi_obat?>"><i class="fa fa-info-circle"></i> Details</a> </td>
                </tr>
                <?php }} ?>
            </tbody>
          </table>
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