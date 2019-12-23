<?php $this->load->view('admin/sniphets/header')?>
<body>
<?php $this->load->view('admin/sniphets/menu')?>
<!---->
<main>
<div class="container my-5">
       <div class="card-body text-center">
       <h4 class="card-title">Data Dokter</h4>
       <div><?php echo $this->session->flashdata('msg'); ?><div>
  </div>
    <div class="card">
        <button id="add__new__list" type="button" class="btn btn-success position-absolute" data-toggle="modal" data-target=".bd-example-modal-lg"><i class="fa fa-plus"></i> Tambah dokter</button>
        <table class="table table-hover">
            <thead>
              <tr>
                <th scope="col">No</th>
                <th scope="col">Nama </th>
                <th scope="col">Telepon</th>
                <th scope="col">Edit List</th>
              </tr>
            </thead>
            <tbody>
            <?php if (empty($dokter)) { ?>
                <tr> 
                      <td colspan="8">Data Belum Ada</td> 
                </tr> 
            <?php
                } else {
                    $no = 0;
                    foreach ($dokter as $rowdokter) {
                            $no++;
            ?> 
                <tr> 
                   <td><?php echo $no ?></td>
                    <td><?php echo $rowdokter->nama ?></td>
                    <td><?php echo $rowdokter->telepon ?></td>
                    <td>
                    <a class="btn btn-sm btn-primary" href="<?php echo base_url() ?>index.php/admin/dokter/edit/<?php echo $rowdokter->id_dokter ?>"><i class="fa fa-edit"></i> Edit</a>
                    <a class="btn btn-sm btn-danger" href="<?php echo base_url() ?>index.php/admin/dokter/hapus/<?php echo $rowdokter->id_dokter ?>"><i class="fa fa-trash"></i> Delete</a>    
                    </td>
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
          <form action="<?php echo base_url()?>index.php/admin/dokter/do_insert" method="POST">
            <div class="form-group">
              <label for="listname">Nama</label>
              <input type="text" class="form-control" name="nama" id="nama" placeholder="">
            </div>
            <div class="form-group">
              <label for="datepicker">No Telepon</label>
              <input  type="text" class="form-control" name="telepon" id="umur" placeholder="">
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
<?php $this->load->view('admin/sniphets/footer') ?>