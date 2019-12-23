<?php $this->load->view('admin/sniphets/header')?>
<body>
<?php $this->load->view('admin/sniphets/menu')?>
<!---->
<main>
<div class="container my-5">
       <div class="card-body text-center">
       
       <h4 class="card-title">Laporan Rawat Inap</h4>
       <div><?php echo $this->session->flashdata('msg'); ?><div>
  </div>
    <div class="card">
    <div class="container bg-info p-5">
    <form action="<?php echo base_url()?>index.php/admin/laporaninap/cetak" method="post">
    <div class="form-group">
    <label>Pilih Bulan</label><br>
    <select name="bulan" class="form-control">
        <option>--PILIH--</option>
        <option value="1">Januari</option>
        <option value="2">Februari</option>
        <option value="3">Maret</option>
        <option value="4">April</option>
        <option value="5">Mei</option>
        <option value="6">Juni</option>
        <option value="7">Juli</option>
        <option value="8">Agustus</option>
        <option value="9">September</option>
        <option value="10">Oktober</option>
        <option value="11">November</option>
        <option value="12">Desember</option>
    </select>
    <button type="submit" class="btn btn-success">Print</button>
    </div>
        </form>
</div><br>
        <table class="table table-hover">
            <thead>
              <tr>
                <th scope="col">No</th>
                <th scope="col">Reg </th>
                <th scope="col">Nama Pasien</th>
                <th scope="col">Nama Dokter</th>
                <th scope="col">Nama Kamar</th>
                <th scope="col">Biaya Rawat Inap</th>
                <th scope="col">Total</th>
                <th scope="col">Edit List</th>
              </tr>
            </thead>
            <tbody>
            <?php if (empty($transaksi)) { ?>
                <tr> 
                      <td colspan="8">Data Belum Ada</td> 
                </tr> 
            <?php
                } else {
                    $no = 0;
                    foreach ($transaksi as $rowtransaksi) {
                            $no++;
            ?> 
                <tr> 
                   <td><?php echo $no ?></td>
                    <td><?php echo $rowtransaksi->reg ?></td>
                    <td><?php echo $rowtransaksi->nama_pasien ?></td>
                    <td><?php echo $rowtransaksi->nama_dokter ?></td>
                    <td><?php echo $rowtransaksi->nama_kamar ?></td>
                    <td><?php echo "Rp. ".number_format($rowtransaksi->biaya_rawat_inap) ?></td>
                    <td><?php echo "Rp. ".number_format($rowtransaksi->total) ?></td>
                    <td>
                    <a class="btn btn-sm btn-danger" href="<?php echo base_url() ?>index.php/admin/laporaninap/hapus/<?php echo $rowtransaksi->id_transaksi ?>"><i class="fa fa-trash"></i> Delete</a>    
                    <td><a class="btn btn-sm btn-info" href="<?php echo base_url() ?>index.php/admin/laporaninap/detail/<?php echo $rowtransaksi->id_transaksi ?>"><i class="fa fa-info-circle"></i> Details</a> </td>
                    </td>
                </tr>
                <?php }} ?>
            </tbody>
          </table>
    </div>
  </div>
</main>
<!---->

<!---->
<?php $this->load->view('admin/sniphets/footer') ?>