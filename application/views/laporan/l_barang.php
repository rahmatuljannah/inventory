<?php $this->load->view('sniphets/header')?>
<body>
<?php $this->load->view('sniphets/menu')?>
<!---->
<main>
<div class="container my-5">
       <div class="card-body text-center">
       
       <h4 class="card-title">Laporan Barang</h4>
       <div><?php echo $this->session->flashdata('msg'); ?><div>
  </div>
    <div class="card">
    <div class="container bg-info p-5">
    <div class="form-group">
    <label>Pilih Laporan</label><br>
    <select id="dynamic_select" name="bulan" class="form-control">
        <option>--PILIH--</option>
        <option value="<?php echo base_url()?>index.php/laporan/index1">Laporan Barang Masuk</option>
        <option value="<?php echo base_url()?>index.php/laporan/index2">Laporan Barang Keluar</option>
    
    </select>
    </div>
        </form>
</div><br>
</div><br>
       
</main>
<!---->

<!----><script>
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
<?php $this->load->view('admin/sniphets/footer') ?>