<?php $this->load->view('admin/sniphets/header')?>
<body>
<?php $this->load->view('admin/sniphets/menu')?>
<!---->
<main>
<div class="container my-5">
<div class="card-body text-center">


<!---->
<script type="text/javascript" src="<?php echo base_url().'assets/js/jquery-2.2.3.min.js'?>"></script>
<script type="text/javascript" src="<?php echo base_url().'assets/js/bootstrap.js'?>"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js" type="text/javascript"></script>

<div class="container bg-info p-5">
    <h4>Cetak Kartu Pendaftaran</h4>
   
    <form action="<?php echo base_url()?>index.php/admin/pendaftaran/cetak" method="POST">
<input name="nama" type="hidden" value=" <?php echo $nama ?>"/>
<input name="reg" type="hidden" value=" <?php echo $reg ?>"/>
<input name="alamat" type="hidden" value=" <?php echo $alamat ?>"/>
<input name="telepon" type="hidden" value=" <?php echo $telepon ?>"/>
<input name="umur" type="hidden" value=" <?php echo $umur ?>"/>
<button class="btn btn-warning" type="submit">Cetak Kartu</button>
</form>
</div>
<script>
    $(function(){
      // bind change event to select
      $('#dynamic_select').on('change', function () {
          var url = $(this).val(); // get selected value
          if (url) { // require a URL
              window.location = url; // redirect
          }
          return false;
      });
    });
   </script>
