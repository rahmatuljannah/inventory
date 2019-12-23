
  <header>
    <?php $this->load->view('sniphets/header')?>
    <body>
      <?php $this->load->view('sniphets/menu')?>
      <!---->
      <main>
        <div class="container my-5">
         <div class="card-body text-center">
           <h4 class="card-title">Data Barang Masuk</h4>
           <div><?php echo $this->session->flashdata('msg'); ?><div>
           </div>
           <nav class="navbar navbar-light bg-light">
            <form method="GET" action="<?php echo base_url()?>index.php/barang/" class="form-inline">
              <input name="search" class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
              <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
          </nav>
          <div class="card">
           
            <table class="table table-hover">
              <thead>
                <tr>
                  <th scope="col">No</th>
                  <th scope="col">Tanggal </th>
                  <th scope="col">Part.No </th>
                  <th scope="col">Nama Barang</th>
                  <th scope="col">Suplier</th>
                  <th scope="col">Total </th>
              
                </tr>
              </thead>
              <tbody>
                <tbody>
                  <?php if (empty($Barang)) { ?>
                    <tr> 
                      <td colspan="8">Data Belum Ada</td> 
                    </tr> 
                    <?php
                  } else {
                    $no = 0;
                    foreach ($Barang as $rowBarang) {
                      $no++;
                      ?> 
                      <tr> 
                       <td><?php echo $no ?></td>
                       <td><?php echo $rowBarang->tanggal ?></td>
                       <td><?php echo $rowBarang->part_no ?></td>
                       <td><?php echo $rowBarang->nama_barang ?></td>
                       <td><?php echo $rowBarang->nama_suplier ?></td>
                       <td><?php echo $rowBarang->total ?></td>
                       <td>
                        
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
            <form action="<?php echo base_url()?>index.php/barangmasuk/do_insert" method="POST">
              <div class="form-group">
              <label for="listname">Tanggal </label>
              <input type="text" id="datepick" class="form-control" name="tanggal" id="nama" placeholder="">
            </div>
              <div class="form-group">
                <label for="listname">Nama Barang</label>
                <select name="nama_barang" class="form-control">
                <option>--PILIH</option>
                <?php foreach ($barang as $rowbarang){
                  ?>
                  <option value="<?php echo $rowbarang->part_no?>"><?php echo $rowbarang->nama_barang?></option>
                <?php }?>
                </select>
              </div>
              <div class="form-group">
                <label for="listname">Supplier</label>
                <select name="supplier" class="form-control">
                <option>--PILIH</option>
                <?php foreach ($supplier as $rowsupplier){
                  ?>
                  <option value="<?php echo $rowsupplier->id_suplier?>"><?php echo $rowsupplier->nama_suplier?></option>
                <?php }?>
                </select>
              </div>
              <div class="form-group">
                <label for="listname">Total</label>
                <input type="text" class="form-control" name="total" id="nama" placeholder="">
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
