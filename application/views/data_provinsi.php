<!DOCTYPE html>
<html>
<head>
	<title>Data Daerah</title>
  <script src="<?=base_url()?>assets/js/jquery.min.js"></script>
 	<link rel="stylesheet" href="<?=base_url()?>assets/css/bootstrap.min.css" />
 	<script src="<?=base_url()?>assets/js/bootstrap.min.js"></script>
	<style>
	.box {
		width:100%;
		max-width: 650px;
		margin:0 auto;
	}
	</style>
</head>
<body>
<div class="container box">
  <br />
  <br />
  <h3 align="center">Data Provinsi, Kabupaten, Kecamatan di Indonesia Codeigniter & Jquery</h3>
  <br />
  <div class="form-group">
   <select name="nama" id="provinsi" class="form-control input-lg">
    <option value="">Select Provinsi</option>
    <?php
    foreach($provinsi as $row)
    {
     echo '<option value="'.$row->id_prov.'">'.$row->nama.'</option>';
    }
    ?>
   </select>
  </div>
  <br />
  <div class="form-group">
   <select name="nama" id="kabupaten" class="form-control input-lg">
    <option value="">Select Kota/Kabupaten</option>
   </select>
  </div>
  <br />
  <div class="form-group">
   <select name="nama" id="kecamatan" class="form-control input-lg">
    <option value="">Select Kecamatan</option>
   </select>
  </div>
  <br />
  <div class="form-group">
   <select name="nama" id="kelurahan" class="form-control input-lg">
    <option value="">Select Kelurahan</option>
   </select>
  </div>
 </div>
</body>
</html>
<script type="text/javascript">
$(document).ready(function(){
	$('#provinsi').change(function(){
		var id_prov = $('#provinsi').val();
		if (id_prov != '') {
			$.ajax({
				url:"<?=base_url()?>index.php/provinsi/fetch_kabupaten",
				method:"POST",
				data:{id_prov:id_prov},
				success:function(data){
          console.log(data);
					$('#kabupaten').html(data);
          $('#kecamatan').html('<option value"">Select Kecamatan</option>');
				}
			});
		} else {
      $('#kabupaten').html('<option value"">Select Kota/Kabupaten</option>');
      $('#kecamatan').html('<option value"">Select Kecamatan</option>');
    }
	});

  $('#kabupaten').change(function(){
    var id_kab = $('#kabupaten').val();
    if (id_kab != '') {
      $.ajax({
        url:'<?=base_url()?>index.php/provinsi/fetch_kecamatan',
        method:'POST',
        data:{id_kab:id_kab},
        success:function(data){
          $('#kecamatan').html(data);
        }
      });
    } else {
      $('#kecamatan').html('<option value="">Select Kecamatan</option>');
    }
  });

  $('#kecamatan').change(function(){
    var id_kec = $('#kecamatan').val();
    if (id_kec != '') {
      $.ajax({
        url:'<?=base_url()?>index.php/provinsi/fetch_kelurahan',
        method:'POST',
        data:{id_kec:id_kec},
        success:function(data){
          $('#kelurahan').html(data);
        }
      });
    } else {
      $('#kelurahan').html('<option value="">Select Kelurahan</option>');
    }
  });

});
</script>