<?php $this->load->view('admin/sniphets/header')?>
<body>
<?php $this->load->view('admin/sniphets/menu')?>
<!---->
<main>
<div class="container my-5">
       <div class="card-body text-center">
       <h4 class="card-title">Data Kamar</h4>
   <!-- <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
    -->
    <div><?php echo $this->session->flashdata('msg'); ?><div>
  </div>
    <div class="card">
        <button id="add__new__list" type="button" class="btn btn-success position-absolute" data-toggle="modal" data-target=".bd-example-modal-lg"><i class="fa fa-plus"></i> Tambah Kamar</button>
        <table class="table table-hover">
            <thead>
              <tr>
                <th scope="col">No</th>
                <th scope="col">Nama Kamar</th>
                <th scope="col">Biaya</th>
                <th scope="col">Edit List</th>
              </tr>
            </thead>
            <tbody>
            <?php if (empty($kamar)) { ?>
                <tr> 
                      <td colspan="8">Data Belum Ada</td> 
                </tr> 
            <?php
                } else {
                    $no = 0;
                    foreach ($kamar as $rowkamar) {
                            $no++;
            ?> 
                <tr> 
                   <td><?php echo $no ?></td>
                    <td><?php echo $rowkamar->nama ?></td>
                    <td><?php echo "Rp ".number_format($rowkamar->biaya)."/kamar" ?></td>
                    <td>
                    <a class="btn btn-sm btn-primary" href="<?php echo base_url() ?>index.php/admin/kamar/edit/<?php echo $rowkamar->id_kamar ?>"><i class="fa fa-edit"></i> Edit</a>
                    <a class="btn btn-sm btn-danger" href="<?php echo base_url() ?>index.php/admin/kamar/hapus/<?php echo $rowkamar->id_kamar ?>"><i class="fa fa-trash"></i> Delete</a>    
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
           <h4 class="card-title">Tambah Kamar</h4>
            <!-- <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
          </div>-->
            <div class=" card col-8 offset-2 my-2 p-3">
          <form action="<?php echo base_url()?>index.php/admin/kamar/do_insert" method="POST">
            <div class="form-group">
              <label for="listname">Nama</label>
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