<?php $this->load->view('admin/sniphets/header')?>
<body>
<?php $this->load->view('admin/sniphets/menu')?>
<!---->
<main>
<div class="container my-5">
       <div class="card-body text-center">
       <h4 class="card-title">Data Rawat Jalan</h4>
    <!--<h4 class="card-title">Special title treatment</h4>
    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
    -->
    <div><?php echo $this->session->flashdata('msg'); ?><div>
  </div>
    <div class="card">
        <button id="add__new__list" type="button" class="btn btn-success position-absolute" data-toggle="modal" data-target=".bd-example-modal-lg"><i class="fa fa-plus"></i> Tambah Rawat Jalan</button>
        <table class="table table-hover">
            <thead>
              <tr>
                <th scope="col">No</th>
                <th scope="col">Nama Rawat Jalan</th>
                <th scope="col">Biaya</th>
                <th scope="col">Edit List</th>
              </tr>
            </thead>
            <tbody>
            <?php if (empty($rawat_jalan)) { ?>
                <tr> 
                      <td colspan="8">Data Belum Ada</td> 
                </tr> 
            <?php
                } else {
                    $no = 0;
                    foreach ($rawat_jalan as $rowrawat_jalan) {
                            $no++;
            ?> 
                <tr> 
                   <td><?php echo $no ?></td>
                    <td><?php echo $rowrawat_jalan->nama ?></td>
                    <td><?php echo "Rp ".number_format($rowrawat_jalan->biaya)."/rawat_jalan" ?></td>
                    <td>
                    <a class="btn btn-sm btn-primary" href="<?php echo base_url() ?>index.php/admin/jalan/edit/<?php echo $rowrawat_jalan->id_rawat_jalan ?>"><i class="fa fa-edit"></i> Edit</a>
                    <a class="btn btn-sm btn-danger" href="<?php echo base_url() ?>index.php/admin/jalan/hapus/<?php echo $rowrawat_jalan->id_rawat_jalan ?>"><i class="fa fa-trash"></i> Delete</a>    
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
           <h4 class="card-title">Tambah Rawat Inap</h4>
            <!-- <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
          </div>-->
            <div class=" card col-8 offset-2 my-2 p-3">
          <form action="<?php echo base_url()?>index.php/admin/jalan/do_insert" method="POST">
            <div class="form-group">
              <label for="listname">Nama Tindakan Rawat Jalan</label>
              <input type="text" class="form-control" name="nama" id="nama" placeholder="">
            </div>
            <div class="form-group">
              <label for="listname">Biaya</label>
              <input  type="text" class="form-control" name="biaya" id="umur" placeholder="">
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