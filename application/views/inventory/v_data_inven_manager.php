<?php $this->load->view('sniphets/header')?>
<body>
<?php $this->load->view('sniphets/menu')?>
<!---->
<main>
<div class="container my-5">
       <div class="card-body text-center">
       <h4 class="card-title">Data Inventory</h4>
       <div><?php echo $this->session->flashdata('msg'); ?><div>
  </div>
  <nav class="navbar navbar-light bg-light">
  <form method="GET" action="<?php echo base_url()?>index.php/inventory/" class="form-inline">
    <input name="search" class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
  </form>
  <br>

</nav>
<!--
<nav class="navbar navbar-light bg-light">
<form method="GET" action="<?php echo base_url()?>index.php/inventory/" class="form-inline">
<div class="form-group">
    <select name="bulan" class="form-control">
        <option>--PILIH--</option>
        <option value="01">Januari</option>
        <option value="02">Februari</option>
        <option value="03">Maret</option>
        <option value="04">April</option>
        <option value="05">Mei</option>
        <option value="06">Juni</option>
        <option value="07">Juli</option>
        <option value="08">Agustus</option>
        <option value="09">September</option>
        <option value="10">Oktober</option>
        <option value="11">November</option>
        <option value="12">Desember</option>
    </select><br>
    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </div>
        </form>
</div>

</nav>-->

    <div class="card">
       
        <table class="table table-hover">
            <thead>
              <tr>
                <th scope="col">No</th>
                <th scope="col">Part No </th>
                <th scope="col">Nama Barang </th>
                <th scope="col">Actual </th>
                <th scope="col">Jumlah </th>
                <th scope="col">Tanggal </th>
               
              </tr>
            </thead>
            <tbody>
            <tbody>
            <?php if (empty($inventory)) { ?>
                <tr> 
                      <td colspan="8">Data Belum Ada</td> 
                </tr> 
            <?php
                } else {
                    $no = 0;
                    foreach ($inventory as $rowinventory) {
                            $no++;
            ?> 
                <tr> 
                   <td><?php echo $no ?></td>
                    <td><?php echo $rowinventory->part_no ?></td>
                    <td><?php echo $rowinventory->nama_barang ?></td>
                    <td><?php echo $rowinventory->actual ?></td>
                    <td><?php echo $rowinventory->jumlah ?></td>
                    <td><?php echo $rowinventory->tanggal ?></td>
                    
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
          <form action="<?php echo base_url()?>index.php/inventory/do_insert" method="POST">
            <div class="form-group">
              <label for="listname">Part No</label>
              <select name="part_no" class="form-control">

                      <option>--Pilih--</option>
                      <?php foreach ($barang as $rowbarang) {
                ?>
                      <option value="<?php echo $rowbarang->part_no?>"><?php echo $rowbarang->part_no?></option>
               <?php   }?>
              </select>
                  </div>
            <div class="form-group">
              <label for="datepicker">Actual</label>
              <select name="actual" class="form-control">
                      <option value="in">IN</option>
                      <option value="out">OUT</option>
              </select>
                </div>
                <div class="form-group">
              <label for="listname">Jumlah </label>
              <input type="text" class="form-control" name="jumlah" id="nama" placeholder="">
            </div>
            <div class="form-group">
              <label for="listname">Tanggal </label>
              <input type="text" id="datepick" class="form-control" name="tanggal" id="nama" placeholder="">
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
<script>
        $('#datepick').datepicker({format: 'yyyy-mm-dd'});
    </script>
</main>
<!---->

<!---->
<?php $this->load->view('sniphets/footer') ?>