<?php $this->load->view('admin/sniphets/header')?>
<body>
<?php $this->load->view('admin/sniphets/menu')?>
<!---->
<main>
<div class="container my-5">
       <div class="card-body text-center">
    <h4 class="card-title">Data Pasien</h4>
    <!--<p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
--><div><?php echo $this->session->flashdata('msg'); ?><div>
  </div>
    <div class="card">
       
        <table class="table table-hover">
            <thead>
              <tr>
                <th scope="col">No Registasi</th>
                <th scope="col">Nama</th>
                <th scope="col">Umur</th>
                <th scope="col">Alamat</th>
                <th scope="col">Edit List</th>
              </tr>
            </thead>
            <tbody>
            <?php if (empty($pasien)) { ?>
                <tr> 
                      <td colspan="8">Data Belum Ada</td> 
                </tr> 
            <?php
                } else {
                    $no = 0;
                    foreach ($pasien as $rowpasien) {
                            $no++;
            ?> 
                <tr> 
                    <td><?php echo $rowpasien->reg ?></td>
                    <td><?php echo $rowpasien->nama ?></td>
                    <td><?php echo $rowpasien->umur ?></td>
                    <td><?php echo $rowpasien->alamat ?></td>
                    <td>
                    <a class="btn btn-sm btn-primary" href="<?php echo base_url() ?>index.php/admin/pasien/edit/<?php echo $rowpasien->id_pasien ?>"><i class="fa fa-edit"></i> Edit</a>
                    <a class="btn btn-sm btn-danger" href="<?php echo base_url() ?>index.php/admin/pasien/hapus/<?php echo $rowpasien->id_pasien ?>"><i class="fa fa-trash"></i> Delete</a>    
                    </td>
                             </tr>
                <?php }} ?>
            </tbody>
          </table>
    </div>
  
</main>
<!---->

<!---->
<?php $this->load->view('admin/sniphets/footer')?>