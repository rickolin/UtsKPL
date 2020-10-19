<body>
<?php if($this->session->flashdata('flash')): ?>
		<div class="alert alert-light alert-dismissible fade show" role="alert">
		  Verifikator <strong> Berhasil </strong><?= $this->session->flashdata('flash'); ?>
		  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		    <span aria-hidden="true">&times;</span>
		  </button>
		</div>
	<?php endif; ?>
<div class="container">	
	<h1 style="text-align: center; text-transform: capitalize; color: black; margin-top: 15px"> Verifikator</h1>
	<hr>
	<div class="float-right" style="margin-bottom: 10px">
		<a href="<?php echo base_url().'VerifikatorController'?>"><button class="btn btn-success " type="button"><i class="fas fa-plus"></i> &nbsp; Tambah Verifikator</button></a>
	</div>

	<div class="table-responsive" style="background-color: white;">
		<table class="table table-hover table-bordered" style="color: black;">
			<thead style="background-color: #17365e; text-align: center; color: white">
			<tr>
				<th>No</th>
				<th>Tanggal Dibuat</th>
				<th>Nama</th>
				<th>NIP</th>
				<th>Action</th>
			</tr>
			</thead>

			<?php
				$i=1;
				foreach($list_verifikator as $row):
			?>

				<tr>
					<td><?= $i ?></td>
					<td><?= $row['tanggal']; ?></td>
					<td><?= $row['nama']; ?></td>
					<td><?= $row['nip']; ?></td>
					<td style="text-align: center;">
						 <a href = "<?= base_url(); ?>ListVerifikatorController/rekap/<?= $row['nip']; ?>"><button type="button" class="btn btn-primary btn-sm"><i class="far fa-address-card"></i>&nbsp;Rekap</button></a>
						 <a href="#" data-toggle="modal" data-target="#DeleteModal<?= $row['nip'];?>"><button type="button" class="btn btn-danger btn-sm"><i class="far fa-trash-alt"></i></i>&nbsp;Delete</button></a>
						 <!-- Modal untuk hapus verifikator -->
				            <div class="modal fade" id="DeleteModal<?= $row['nip'];?>" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
				              <div class="modal-dialog" role="document">
				                <div class="modal-content">
				                  <div class="modal-header">
				                    <h5 class="modal-title" id="staticBackdropLabel">Anda Yakin ingin Menghapus Helpdesk ?</h5>
				                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				                      <span aria-hidden="true">&times;</span>
				                    </button>
				                  </div>
				                  <div class="modal-body">
				                    <p>Jika anda yakin ingin menghapus data silahkan pilih delete</p>
				                  </div>
				                  <div class="modal-footer">
				                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
				                    <a href="<?= base_url(); ?>VerifikatorController/hapus/<?= $row['nip']; ?>">
				                    <button type="button" class="btn btn-primary"><i class="fas fa-trash"></i> &nbsp;Delete</button>
				                    </a>
				                  </div>
				                </div>
				              </div>
				            </div>
					</td>
				</tr>
			<?php
				$i++;
			 endforeach;
			 ?>


		</table>
		
	</div>
</div>
</body>