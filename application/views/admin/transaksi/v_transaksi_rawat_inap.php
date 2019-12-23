<?php $this->load->view('admin/sniphets/header')?>
<body>
<?php $this->load->view('admin/sniphets/menu')?>
<!---->
<main>
<div class="container my-5">
<div class="card-body text-center">
            <h4 class="card-title">Tambah Data Transaksi Pasien OBYGN</h4>
            <!--<p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
          </div>-->
            <div class=" card col-8 offset-2 my-2 p-3">
<form action="<?php echo base_url()?>index.php/admin/transaksiinap/cetak" method="POST">
<div class="row">
    <div class="col-sm-2">
    <label>No Registrasi</label>
    </div>
    <div class="col-sm">
    <select name="reg" id="reg" class="form-control">
	                    	<option value="0">-PILIH-</option>
	                    	<?php foreach($pasien as $row):?>
	                    		<option value="<?php echo $row->reg;?>"><?php echo $row->reg;?></option>
	                    	<?php endforeach;?>
	                    </select>
    </div>
    </div>
    
    <div class="row">
    <div class="col-sm-2">
    <label>Tanggal Transaksi</label>
    </div>
    <div class="col-sm">
    <input type="text" name="tanggal" id="datepick" class="form-control"/>
    </div>
    </div>


    <div class="row">
    <div class="col-sm-2">
    <label>Nama</label>
    </div>
    <div class="col-sm">
    <select name="nama" id="nama" class="form-control">
	                    	<option value="0">-PILIH-</option>
	                    </select>
    </div>
    </div><br>

    <div class="row">
    <div class="col-sm-2">
    <label>Umur</label>
    </div>
    <div class="col-sm">
    <select name="umur" id="umur" class="form-control">
	                    	<option value="0">-PILIH-</option>
	                    </select>
    </div>
    </div><br>

    <div class="row">
    <div class="col-sm-2">
    <label>Alamat</label>
    </div>
    <div class="col-sm">
    <select name="alamat" id="alamat" class="form-control">
	                    	<option value="0">-PILIH-</option>
	                    </select>
    </div>
    </div><br>

    <div class="row">
    <div class="col-sm-2">
    <label>Nama Dokter</label>
    </div>
    <div class="col-sm">
    <select class="form-control" name="dokter">
                <option>--PILIH--</option>
                <?php foreach ($dokter as $rowdokter) { ?>
                <option value="<?php echo $rowdokter->id_dokter?>"><?php echo $rowdokter->nama?></option>
                <?php } ?>
            </select>
    </div>
    </div><br>

    <div class="row">
    <div class="col-sm-2">
    <label>Tindakan</label>
    </div>
    <div class="col-sm">
    <select class="form-control" name="inap">
                <option>--PILIH--</option>
                <?php foreach ($inap as $rowinap) { ?>
                <option value="<?php echo $rowinap->id_rawat_inap?>"><?php echo $rowinap->nama?></option>
                <?php } ?>
            </select>
    </div>
    </div><br>

    <div class="row">
    <div class="col-sm-2">
    <label>BHP</label>
    </div>
    <div class="col-sm">
    <input type="text" class="form-control" name="bhp"/>
    </div>
    </div><br>

    
    
    <table class="table">
  <thead>
    <tr>
     
      <th scope="col">Nama Obat</th>
      <th scope="col">Jumlah</th>
      <th scope="col">Kode Obat</th>
      <th scope="col">Kode Obat</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td id="nama_obat"></td>
      <td id="jumlah"></td>
      <td id="kode"></td>
      <th id="biaya"></th>
    </tr>
  </tbody>
</table>

    <div class="row">
    <div class="col-sm-2">
    <label>Kamar</label>
    </div>
    <div class="col-sm">
    <select class="form-control" name="kamar">
    <option>--PILIH--</option>
                <?php foreach ($kamar as $rowkamar) { ?>
                <option value="<?php echo $rowkamar->id_kamar?>"><?php echo $rowkamar->nama?></option>
                <?php } ?>
            </select>
    </div>
    </div><br>

    <div class="row">
    <div class="col-sm-2">
    <label>DPJP</label>
    </div>
    <div class="col-sm">
    <input type="text" class="form-control" name="dpjp"/>
    </div>
    </div><br>

    <div class="row">
    <div class="col-sm-2">
    <label>Visite</label>
    </div>
    <div class="col-sm">
    <input type="text" class="form-control" name="visite"/>
    </div>
    </div><br>
    <div class="row">
    <div class="col-sm-2">
    <label>Kebersihan</label>
    </div>
    <div class="col-sm">
    <input type="text" class="form-control" name="kebersihan"/>
    </div>
    </div><br>

    <div class="row">
    <div class="col-sm-2">
    <label>Konsultasi</label>
    </div>
    <div class="col-sm">
    <input type="text" class="form-control" name="konsultasi"/>
    </div>
    </div><br>

    <div class="row">
    <div class="col-sm-2">
    <input type="submit" class="btn btn-primary" value="Cetak"/>
    </div>
    <div class="col-sm">
    <input type="reset" class="btn btn-primary" value="Cancel"/>
    </div>
    </div><br>
   </form>

  </div>
    </div>
    </div>
    </div>
</main>
<script>
        $('#datepick').datepicker({format: 'yyyy-mm-dd'});
    </script>
<script type="text/javascript" src="<?php echo base_url().'assets/js/jquery-2.2.3.min.js'?>"></script>
<script type="text/javascript" src="<?php echo base_url().'assets/js/bootstrap.js'?>"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js" type="text/javascript"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$('#reg').change(function(){
			var reg=$(this).val();
			$.ajax({
				url : "<?php echo base_url();?>index.php/admin/transaksiinap/tes5",
				method : "POST",
				data : {reg: reg},
				async : false,
		        dataType : 'json',
				success: function(data){
					var html = '';
		            var i;
		            for(i=0; i<data.length; i++){
		                html += '<option>'+data[i].nama_pasien+'</option>';
		            }
		            $('#nama').html(html);

                var alamat = '';
		            var i1;
		            for(i1=0; i1<data.length; i1++){
		                alamat += '<option>'+data[i1].alamat+'</option>';
		            }
		            $('#alamat').html(alamat);

                var umur = '';
		            var i12;
		            for(i12=0; i12<data.length; i12++){
		                umur += '<option>'+data[i12].umur+'</option>';
		            }
		            $('#umur').html(umur)

                
                    var nama_obat = '';
		            var i123;
		            for(i123=0; i123<data.length; i123++){
		                nama_obat += '<option>'+data[i123].nama_obat+'</option>';
		            }
		            $('#nama_obat').html(nama_obat)

                    var jumlah = '';
		            var i1234;
		            for(i1234=0; i1234<data.length; i1234++){
		                jumlah += '<option>'+data[i1234].jumlah+'</option>';
		            }
		            $('#jumlah').html(jumlah)

                    var kode = '';
		            var i12345;
		            for(i12345=0; i12345<data.length; i12345++){
		                kode += '<option>'+data[i12345].kode_obat+'</option>';
		            }
		            $('#kode').html(kode)

                    var total = '';
		            var i123456;
		            for(i123456=0; i123456<data.length; i123456++){
		                total += '<option>'+data[i123456].biaya+'</option>';
		            }
		            $('#biaya').html(total)
					
				}
			});
		});
	});
</script>




<script type="text/javascript">
	$(document).ready(function(){
		$('#jumlah_obat').change(function(){
			var jumlah_obat=$(this).val();
			$.ajax({
				url : "<?php echo base_url();?>index.php/admin/transaksiinap/tes2",
				method : "POST",
				async : false,
		        dataType : 'json',
				success: function(data){
                    var jumlah = '';
		            var i1;
		            for(i1=0; i1<data.length; i1++){
		                jumlah += '<option>'+data[i1].item+'</option>';
		            }
		            $('.jumlah').html(jumlah);
				}
			});
		});
	});
</script>


<!---->
<?php $this->load->view('admin/sniphets/footer')?>
