<?php $this->load->view('sniphets/header')?>
<body>
  <?php $this->load->view('sniphets/menu')?>
  <?php foreach ($barang as $roweditbarang) {
   // $tanggal=$roweditbarang->tanggal;
    $part_no=$roweditbarang->part_no;
    $nama_barang=$roweditbarang->nama_barang;
    $total=$roweditbarang->total;
    $id=$roweditbarang->id_barang;

  }
  ?>
  <!---->
  <main>
    <div class="container my-5">
      <div class=" card col-8 offset-2 my-2 p-3">
        <center><b>Edit Data </b></center>
        <form action="<?php echo base_url()?>index.php/barang/update" method="POST">
          <div class="form-group">
           
            <label for="listname">Part. No</label>
            <input type="text" value="<?php echo $part_no?>" class="form-control" name="part_no" id="nama" placeholder="">
            <input type="hidden" value="<?php echo $id?>" class="form-control" name="id" id="nama" placeholder="">

            <label for="listname">Nama Barang</label>
            <input type="text" value="<?php echo $nama_barang?>" class="form-control" name="nama_barang" id="nama" placeholder="">

            <label for="listname">Total</label>
            <input type="text" value="<?php echo $total?>" class="form-control" name="total" id="total" placeholder="">

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
<?php $this->load->view('sniphets/footer')?>