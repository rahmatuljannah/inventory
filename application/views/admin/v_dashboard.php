<?php $this->load->view('admin/sniphets/header')?>
<body>
<?php $this->load->view('admin/sniphets/menu')?>
<!---->

<main>
<div class="container my-5">
    <div class="card">
        <div class="jumbotron">
  <center><h1 >Selamat Datang Di</h1></center>
  <center><h1 class="display-4">Di Sistem Inventory PT Sanoh Indonesia</h1></center>
  <center>Hi <?php echo $this->session->userdata('username')?></center>
  
  

</div>
</div>
</div>

<!---->
</main>
<?php $this->load->view('admin/sniphets/footer') ?>
