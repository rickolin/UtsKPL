<?php if($this->session->flashdata('flash')): ?>
    <div class="alert alert-light alert-dismissible fade show" role="alert">
      Password Berhasil <strong><?= $this->session->flashdata('flash'); ?></strong>!<button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
  <?php endif; ?>
<div style="margin-top: 20px; margin-left: 40px">
	<h1 style="color: black;">
		DASHBOARD ADMIN
	</h1>
</div>
<div style="margin: 40px">
	<div class="row" style="margin-top: 30px;">
		<div class="col-md-4">
			<div class="row">
				<div class="col-md-12">
					<div class="card border-left-danger shadow h-100 py-2" data-toggle="tooltip" data-placement="bottom" title="Jumlah Semua Registrasi Penyedia
					                    <?php
				                            if ( function_exists( 'date_default_timezone_set' ) ){
				                                date_default_timezone_set('Asia/Jakarta');
				                              $tahun = date("Y");
				                            }
				                            echo $tahun;
				                        ?>
					">
		                <div class="card-body">
		                    <div class="row no-gutters align-items-center">
		                        <div class="col mr-2">
		                            <div class="h6 font-weight-bold text-danger text-uppercase mb-1">Jumlah Registrasi Penyedia Tahun
		                            	<?php
				                            if ( function_exists( 'date_default_timezone_set' ) ){
				                                date_default_timezone_set('Asia/Jakarta');
				                              $tahun = date("Y");
				                            }
				                            echo $tahun;
				                        ?>

		                            </div>
		                            <div class="h6 mb-0 font-weight-bold text-gray-800">
		                                <?= $semua_surat; ?>
		                            </div>
                        		</div>
                        		<div class="col-auto">
			                        <i class="far fa-envelope fa-2x text-gray-300"></i>
			                    </div>
                        	</div>
                        </div>
                    </div>	
                </div>
            </div>

			<div class="row"style="margin-top: 20px">
				<div class="col-md-12">
					<div class="card border-left-danger shadow h-100 py-2" data-toggle="tooltip" data-placement="bottom" title="Jumlah Penyedia Belum Diverifkasi 
					                    <?php
				                            if ( function_exists('date_default_timezone_set' ) ){
				                                date_default_timezone_set('Asia/Jakarta');
				                              $tahun = date("Y");
				                            }
				                            echo $tahun;
				                        ?>
					">
		                <div class="card-body">
		                    <div class="row no-gutters align-items-center">
		                        <div class="col mr-2">
		                            <div class="h6 font-weight-bold text-danger text-uppercase mb-1">Penyedia Belum Diverifikasi Tahun
		                            	<?php
				                            if ( function_exists( 'date_default_timezone_set' ) ){
				                                date_default_timezone_set('Asia/Jakarta');
				                              $tahun = date("Y");
				                            }
				                            echo $tahun;
				                        ?>

		                            </div>
		                            <div class="h6 mb-0 font-weight-bold text-gray-800">
		                                <?= $belum_diverifikasi; ?>
		                            </div>
                        		</div>
                        		<div class="col-auto">
			                        <i class="far fa-envelope fa-2x text-gray-300"></i>
			                    </div>
                        	</div>
                        </div>
                    </div>	
                </div>
            </div>

            <div class="row" style="margin-top: 20px">
				<div class="col-md-12">
					<a href="<?= base_url(); ?>SuratTerverifikasiController">
						<div class="card border-left-info shadow h-100 py-2" data-toggle="tooltip" data-placement="bottom" title=" Klik untuk Melihat Semua Surat Terverifikasi">
			                <div class="card-body">
			                    <div class="row no-gutters align-items-center">
			                        <div class="col mr-2">
			                            <div class="h6 font-weight-bold text-info text-uppercase mb-1">Surat Terverifikasi Tahun 
			                            	<?php
					                            if ( function_exists( 'date_default_timezone_set' ) ){
					                                date_default_timezone_set('Asia/Jakarta');
					                              $tahun = date("Y");
					                            }
					                            echo $tahun;
					                        ?>
	                         	
	                         			</div>
			                            <div class=" mb-0 font-weight-bold text-gray-800" style="text-align: left;">	<table>
			                              		<tr>
			                              			<td width="160">Disetujui</td>
			                              			<td>: <?= $disetujui; ?></td>
			                              		</tr>
			                              	</table>
			                            </div>
			                            <div class=" mb-0 font-weight-bold text-gray-800" style="text-align: left;">
			                              	<table>
			                              		<tr>
			                              			<td width="160">Disetujui Bersyarat</td>
			                              			<td>: <?= $disetujui_bersyarat; ?></td>
			                              		</tr>
			                              	</table>
			                            </div>
			                            <div class=" mb-0 font-weight-bold text-gray-800" style="text-align: left;">	<table>
			                              		<tr>
			                              			<td width="160">Ditangguhkan</td>
			                              			<td>: <?= $ditangguhkan ;?></td>
			                              		</tr>
			                              	</table>
			                            </div>
	                        		</div>
	                        		<div class="col-auto">
				                        <i class="fas fa-envelope-open-text fa-2x text-gray-300"></i>
				                    </div>
	                        	</div>
	                        </div>
	                    </div>
                    </a> 
                </div>
            </div>

            <div class="row" style="margin-top: 20px">
				<div class="col-md-12">
					<a href="<?= base_url(); ?>ListVerifikatorController">
						<div class="card border-left-success shadow h-100 py-2" data-toggle="tooltip" data-placement="bottom" title=" Klik untuk Melihat Semua Verifikator">
			                <div class="card-body">
			                    <div class="row no-gutters align-items-center">
			                        <div class="col mr-2">
			                            <div class="h6 font-weight-bold text-success text-uppercase mb-1">Jumlah Verifikator</div>
			                            <div class="h6 mb-0 font-weight-bold text-gray-800">
			                                <?= $verifikator; ?>
			                            </div>
	                        		</div>
	                        		 <div class="col-auto">
				                        <i class="fas fa-user-friends fa-2x text-gray-300"></i>
				                    </div>
	                        	</div>
	                        </div>
	                    </div>	
	                </a>
                </div>
            </div>
			
		</div>
		<div class="col-md-8">
			<div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-chart-bar"></i> &nbsp;Grafik Data Surat Pengadaan Barang dan Jasa Tahun 
                        <?php
                            if ( function_exists( 'date_default_timezone_set' ) ){
                                date_default_timezone_set('Asia/Jakarta');
                              $tahun = date("Y");
                            }
                            echo $tahun;
                         ?>
                         
                     </h6> 
                </div>
                <div class="card-body" style="margin-top: -35px">
                    <div class="chart-area">
                        <canvas id="chart"></canvas>
                    </div>
                </div>
            </div>
		</div>


	</div>

</div>