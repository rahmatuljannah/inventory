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
    <h4>Pilih Transaksi Rawat Inap</h4>
<select class="form-control" id="dynamic_select">
  <option value="" selected>Pilih</option>
  <option value="<?php echo base_url()?>index.php/admin/transaksiinap/index1">Obygn</option>
  <option value="<?php echo base_url()?>index.php/admin/transaksiinap1">Non Obygn</option>
</select>
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
