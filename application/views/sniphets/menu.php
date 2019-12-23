<?php if  ($this->session->userdata('username')=='admin') {

?>
<header>
  <div class="container bg-info p-5 ">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <a class="navbar-brand" href="#">PT. Sanoh Indonesia</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
          <a class="nav-item nav-link active" href="<?php echo base_url()?>index.php/dashboard"><i class="fa fa-globe"></i> Beranda <span class="sr-only">(current)</span></a>
          <div class="dropdown">
            <a class="nav-item nav-link dropdown-toggle"  id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fa fa-database"></i> Data
            </a>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
              <a class="dropdown-item" href="<?php echo base_url()?>index.php/barang"><i class="fa fa-database"></i> Data Barang</a>
              <a class="dropdown-item" href="<?php echo base_url()?>index.php/barangmasuk"><i class="fa fa-database"></i> Data Barang Masuk</a>
              <a class="dropdown-item" href="<?php echo base_url()?>index.php/barangkeluar"><i class="fa fa-database"></i> Data Barang Keluar</a>
            </div>
          </div>
          <div class="dropdown">
            <a class="nav-item nav-link dropdown-toggle"  id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fa fa-database"></i> Laporan
            </a>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
              <a class="dropdown-item" href="<?php echo base_url()?>index.php/laporan"><i class="fa fa-database"></i> Laporan Data Barang</a>
              
            </div>
          </div>
          <a class="nav-item nav-link active" href="<?php echo base_url()?>index.php/login/logout"><i class="fa fa-file-sign-out"></i>Logout<span class="sr-only">(current)</span></a>
        </nav>
      </div>
    </header>
<?php } ?>

<?php if  ($this->session->userdata('username')=='supervisor') {

?>
<header>
  <div class="container bg-info p-5 ">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <a class="navbar-brand" href="#">PT. Sanoh Indonesia</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
          <a class="nav-item nav-link active" href="<?php echo base_url()?>index.php/supervisor/dashboard"><i class="fa fa-globe"></i> Beranda <span class="sr-only">(current)</span></a>
          <div class="dropdown">
            <a class="nav-item nav-link dropdown-toggle"  id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fa fa-database"></i> Data
            </a>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
              <a class="dropdown-item" href="<?php echo base_url()?>index.php/supervisor/barang"><i class="fa fa-database"></i> Data Barang</a>
              <a class="dropdown-item" href="<?php echo base_url()?>index.php/supervisor/barangmasuk"><i class="fa fa-database"></i> Data Barang Masuk</a>
              <a class="dropdown-item" href="<?php echo base_url()?>index.php/supervisor/barangkeluar"><i class="fa fa-database"></i> Data Barang Keluar</a>
            </div>
          </div>
          <div class="dropdown">
            <a class="nav-item nav-link dropdown-toggle"  id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fa fa-database"></i> Laporan
            </a>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
              <a class="dropdown-item" href="<?php echo base_url()?>index.php/laporan"><i class="fa fa-database"></i> Laporan Data Barang</a>
              
            </div>
          </div>
          <a class="nav-item nav-link active" href="<?php echo base_url()?>index.php/login/logout"><i class="fa fa-file-sign-out"></i>Logout<span class="sr-only">(current)</span></a>
        </nav>
      </div>
    </header>
<?php } ?>