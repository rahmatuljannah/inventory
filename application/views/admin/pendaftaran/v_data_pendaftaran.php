<?php $this->load->view('admin/sniphets/header')?>
<body>
<?php $this->load->view('admin/sniphets/menu')?>
<!---->
<main>
<div class="container my-5">
<div class="card-body text-center">
<div><?php echo $this->session->flashdata('msg'); ?></div>
            <h4 class="card-title">Tambah Data Pasien</h4>
            <!--<p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
         --> </div>
            <div class=" card col-8 offset-2 my-2 p-3">
            <form action="<?php echo base_url()?>index.php/admin/pendaftaran/do_insert" method="POST">
            <div class="form-group">
              <label for="listname">Type Pendaftaran</label>
              <select class="form-control" name="type">
              <option value="1">Pertama Kali</option>
              <option value="2">Bukan Pertama Kali</option>
              </select>
            </div>
          <div class="form-group">
              <label for="listname">No Registrasi</label>
              <input type="text" class="form-control" value="<?php echo $newid?>" name="reg" id="reg" placeholder="">
            </div>
            <div class="form-group">
              <label for="listname">Nama</label>
              <input type="text" class="form-control" name="nama" id="nama" placeholder="">
            </div>
            <div class="form-group">
              <label for="datepicker">Umur</label>
              <input  type="text" class="form-control" name="umur" id="umur" placeholder="">
            </div>
            <div class="form-group">
              <label for="datepicker">Pendidikan</label>
              <input  type="text" class="form-control" name="pendidikan" id="umur" placeholder="">
            </div>
            <div class="form-group">
              <label for="datepicker">Nama Suami</label>
              <input  type="text" class="form-control" name="suami" id="umur" placeholder="">
            </div>
            <div class="form-group">
              <label for="datepicker">Pekerjaan</label>
              <input  type="text" class="form-control" name="pekerjaan" id="umur" placeholder="">
            </div>
            <div class="form-group">
              <label for="listname">Alamat</label>
              <textarea name="alamat" class="form-control"></textarea>
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
</main>
<!---->

<!---->
<?php $this->load->view('admin/sniphets/footer')?>