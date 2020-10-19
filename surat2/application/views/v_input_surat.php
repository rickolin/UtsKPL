<!DOCTYPE html>
<html>
<head>
	<title>Form Penyedia</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="">
	<link href="<?php echo base_url().'assets/css/capture_styles.css'?>" rel="stylesheet">
	<link href="<?php echo base_url().'assets/vendor/fontawesome-free/css/all.min.css'?>" rel="stylesheet">
</head>
<body>

	<?php if($this->session->userdata('akses')=='admin'):?>
	<div class="d-flex justify-content-end">
		<a href="<?php echo base_url().'DashboardAdminController'?>"><button class="btn btn-success " type="button" style="margin-top: 20px; margin-right: 20px"><i class="fas fa-arrow-circle-left"></i> &nbsp; Kembali</button></a>
	</div>
	<?php elseif($this->session->userdata('akses')=='verifikator'):?>
		<div class="d-flex justify-content-end">
		<a href="<?php echo base_url().'SuratMasukController'?>"><button class="btn btn-success " type="button" style="margin-top: 20px; margin-right: 20px"><i class="fas fa-arrow-circle-left"></i> &nbsp; Kembali</button></a>
	</div>
	<?php else:?>
		<div class="d-flex justify-content-end">
		<a href="<?php echo base_url().'LandingPageController'?>"><button class="btn btn-success " type="button" style="margin-top: 20px; margin-right: 20px"><i class="fas fa-arrow-circle-left"></i> &nbsp; Kembali</button></a>
	</div>
	<?php endif?>

<br>
<br>
	<div class="text-center">
		<h1 style="color: black"><img src="<?php echo base_url().'assets/gambar/jt.png'?>"> &nbsp; Form Pendataan  Penyedia Barang/Jasa</h1>
	</div>
	<hr >
	<?php if($this->session->flashdata('flash')): ?>
		<div class="alert alert-success alert-dismissible fade show" role="alert">
		  Data Tamu<strong> Berhasil </strong><?= $this->session->flashdata('flash'); ?>
		  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		    <span aria-hidden="true">&times;</span>
		  </button>
		</div>
	<?php endif; ?>
	<br>
	<div class="container">
		<form action="" id="register" method="post">
			<div class="row">
				<div class="col-md-6">
					<div class="">
							<div class="form-group">
								<label for=""><h6 class="font-weight-bold">No Pendaftaran</h6></label>
								<input type="text" class="form-control" name="no_pendaftaran" id="no_pendaftaran" value="<?php echo set_value('no_pendaftaran'); ?>" autocomplete="off">
								<?php if (form_error('no_pendaftaran')): ?>
				                  <div class="alert alert-danger" role="alert">
				                  <?= form_error('no_pendaftaran'); ?>		                  	
				                  </div>
		                 		 <?php endif; ?>			
							</div>
							
                            <div class="form-group">
								<label for=""><h6 class="font-weight-bold">Jenis Perusahaan</h6></label>
								<select class="form-control custom-select" name="jenis_perusahaan" id="jenis_perusahaan" onchange="isiJenisPerusahaan(this.value);">
								  <option value="<?php echo set_value('jenis_perusahaan'); ?>"><?php echo set_value('jenis_perusahaan'); ?></option>
								  <?php 
				                      $i = 1;
				                      foreach ( $jenis_perusahaan as $row): 
				                    ?>

				                    <option value="<?= $row['jenis_perusahaan']; ?>"><?= $row['jenis_perusahaan']; ?></option>

				                    <?php
				                      $i++;
				                    endforeach;
				                    ?>
								</select>
							</div>

							<div class="form-group">
								<input type="text" class="form-control" name="jenisperusahaan_lainnya" id="jenisperusahaan_lainnya"  value="<?php echo set_value('jenisperusahaan_lainnya'); ?>" autofocus style='display:none ;'>
								<?php if (form_error('jenisperusahaan_lainnya')): ?>
				                  <div class="alert alert-danger" role="alert">
				                  <?= form_error('jenisperusahaan_lainnya'); ?>	                  	
				                  </div>
		                 		 <?php endif; ?>
							</div>

							<div class="form-group">
								<label for=""><h6 class="font-weight-bold">Nama Perusahaan</h6></label>
								<input type="text" class="form-control" name="nama_perusahaan" id="nama_perusahaan" value="<?php echo set_value('nama_perusahaan'); ?>" autocomplete="off">
								<?php if (form_error('nama_perusahaan')): ?>
				                  <div class="alert alert-danger" role="alert">
				                  <?= form_error('nama_perusahaan'); ?>	                  	
				                  </div>
		                 		 <?php endif; ?>
							</div>

                            <div class="form-group">
								<label for="alamat"><h6 class="font-weight-bold">Alamat</h6></label><br>
								<textarea class="form-control" name="alamat" id="alamat" form="register"><?php echo set_value('alamat'); ?>
								</textarea>
								<?php if (form_error('alamat')): ?>
				                  <div class="alert alert-danger" role="alert">
				                  <?= form_error('alamat'); ?>	                  	
				                  </div>
		                 		 <?php endif; ?>
							</div>
					</div>
							
				</div>
				<div class="col-md-6">

                            <div class="form-group">
								<label for=""><h6 class="font-weight-bold">Kota</h6></label>
								<input type="text" class="form-control" name="kota" id="kota" value="<?php echo set_value('kota'); ?>" autocomplete="off">
								<?php if (form_error('kota')): ?>
				                  <div class="alert alert-danger" role="alert">
				                  <?= form_error('kota'); ?>	                  	
				                  </div>
		                 		 <?php endif; ?>
							</div>

							<div class="form-group">
								<label for=""><h6 class="font-weight-bold">No Telepon</h6></label>
								<input type="text" class="form-control" name="telepon" id="telepon" value="<?php echo set_value('telepon'); ?>" autocomplete="off">
								<?php if (form_error('telepon')): ?>
				                  <div class="alert alert-danger" role="alert">
				                  <?= form_error('telepon'); ?>	                  	
				                  </div>
		                 		 <?php endif; ?>
							</div>
							
								
							<a href="#" ><button type="submit" class="btn btn-success" > Submit </button></a>
							<br>
							
							<br>
					
				</div>
			</div>
		</form>
	</div>
<br>
<hr>
<br><br>


	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.25/webcam.js"></script>


	

	

	<!-- INI unutuk keperluan lainnya -->
	<script type="text/javascript">
		function isiJenisPerusahaan(val){
		 var element=document.getElementById('jenisperusahaan_lainnya');
		 var tes = "";
		 if(val=='Jenis Perusahaan Lainnya'){
		   element.style.display='block';
			element.placeholder= tes;
		 }else{
		   element.style.display='none';
			element.value= val;
		}}

	</script>



</body>
</html>