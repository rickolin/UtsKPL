<?php if($this->session->flashdata('flash')): ?>
		<div class="alert alert-success alert-dismissible fade show" role="alert">
		  Surat <strong> Berhasil </strong><?= $this->session->flashdata('flash'); ?>
		  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		    <span aria-hidden="true">&times;</span>
		  </button>
		</div>
	<?php endif; ?>
<div class="container">	
	<h1 style="text-align: center; text-transform: capitalize; color: black; margin-top: 15px"> Surat Masuk</h1>
	<hr>


	<div class="row" style="margin-left: 10px;">
			<form method="post" action="<?=base_url()?>SuratMasukController">
				<div class="row">
					<div class="input-group">
						<input type="text" class="form-control bg-light border-1 small" placeholder="Cari....." name="keyword_cari" id="keyword_cari" autofocus value="<?php echo set_value('keyword_cari'); ?>">
						<div class="input-group-append">
			                <button class="btn btn-primary" type="submit" style="margin-left: 5px" name="submit">
			                    <i class="fas fa-search fa-sm">Cari</i>
			                </button>
			                <a href="<?=base_url()?>SuratMasukController/refresh">
			                  <button class="btn btn-info" type="button" style="margin-left: 5px" name="refresh">
			                      <i class="fas fa-retweet "></i>&nbsp;Refresh
			                  </button>
			                </a>
			             </div>
					</div>
				</div>
				<div class="row" style="margin-top: 10px">
					<div class="input-group">
						 <input type="text" name="tanggal_mulai" autocomplete="off" class="tanggal form-control bg-light border-1 small" placeholder="Dari Tanggal..." id="tanggal_mulai" value="<?php echo set_value('tanggal_mulai'); ?>">&nbsp;&nbsp;
                  		<input type="text" name="tanggal_selesai" autocomplete="off" class="tanggal form-control bg-light border-1 small" placeholder="Sampai Tanggal..." id="tanggal_selesai" value="<?php echo set_value('tanggal_selesai');?>" >
					</div>
				</div>
			</form>
	</div>
	<div style="margin-top: 10px;">
        <h4 style="text-align: center; color: black"><?php if($this->session->userdata('ket')){
                echo $ket;
              }
            ?>
        </h4>

      </div>
      <?php if($this->session->userdata('ket2')): ?>
        <div class="row" style="margin-top: 10px;">
          <span class="float-right" style="margin-left: 15px">Keyword : <strong><?= $ket2; ?></strong> </span>
        </div>
      <?php endif; ?>
	<div class="row" style="margin-top: 10px">
        <span class="float-right" style="margin-left: 15px">TOTAL : <strong><?= $total_rows; ?></strong> </span>
    </div>
	<div class="table-responsive" style="background-color: white; margin-top:10px">
		<table class="table table-hover table-bordered" style="color: black;">
			<thead style="background-color: #17365e; text-align: center; color: white">
			<tr>
				<th>No</th>
				<th>Tanggal Masuk</th>
				<th>No Pendaftaran</th>
				<th>Jenis Perusahaan</th>
				<th>Nama Perusahaan</th>
				<th>Status</th>
				<th>Action</th>
			</tr>
			</thead>

			<?php
				foreach($surat_masuk as $row):
			?>

				<tr>
					<td><?= ++$start ?></td>
					<td><?= $row['tanggal']; ?></td>
					<td><?= $row['no_pendaftaran']; ?></td>
					<td><?= $row['jenis_perusahaan']; ?></td>
					<td><?= $row['nama_perusahaan']; ?></td>
					<td><?= $row['status']; ?></td>
					<td style="text-align: center;">
						 <a href="<?= base_url(); ?>SuratMasukController/verifikasi/<?= $row['no_pendaftaran']; ?>"><button type="button" class="btn btn-danger btn-sm"><i class="fas fa-calendar-check "></i>&nbsp;Verifikasi</button></a>
					</td>
				</tr>
			<?php
			 endforeach;
			 ?>


		</table>
		<?php
        	if ($total_rows == 0):
      	?>

	        <div class="row" style="justify-content: center;">
	          <span class="float-center"><i class="fas fa-smile fa-4x"></i></span>
	        </div>
	        <div class="row" style="justify-content: center;">
	          <h1 class="h3 mb-0 text-gray-800">No Record Found!</h1>
	        </div>

	    <?php
		    endif;
	    ?>	
	</div>
	
	<div class="float-right"><?= $this->pagination->create_links(); ?></div>
	<hr>
</div>