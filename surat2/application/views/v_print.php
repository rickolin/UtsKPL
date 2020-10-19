<!DOCTYPE html>
<html>
<head>
	<title>Print Surat</title>
	<style type="text/css">
		p{
			font-size: 12px;
		}
		#body table {
	      	border-collapse:collapse;
	    }
		#body table td {
     		word-wrap:break-word;
     		width: 1%;
     		height: 30px;
    	}
    	.center{
        	text-align: center;
    	}
	</style>
</head>
<body>
		<?php 
			foreach ($data_surat as $row):
		?>
		<p style="text-align: center; text-transform: uppercase;"><b><u>berita acara verifikasi rekanan</u></b><br>
		 Nomor : <?= $row['no_pendaftaran'];?>A / LPSE.JTG / VER / <?= $bulan_rom;?> / <?= $tahun;?> </p>
		<p style="text-align: justify;">Pada hari <?= $row['hari_terverifikasi']; ?>, <?= $hari;?>&nbsp;<?= $bulan;?>&nbsp;<?= $tahun;?>, telah diselenggarakan verifikasi terhadap Penyedia Barang / Jasa, bertempat di Gedung D Sekretariat Daerah Provinsi Jawa Tengah, dengan hasil sebagai berikut:<br><br>
		<span id="body">
		<table border="0.5" cellpadding="8" style="border-style: solid;">
			<tr>
				<th rowspan="2" style="width: 25px" class="center">No</th>
				<th rowspan="2" class="center">Uraian/Dokumen</th>
				<th colspan="2" class="center">Hasil Verifikasi</th>
				<th rowspan="2" class="center">Keterangan</th>
			</tr>
			<tr>
				<th class="center">Ada</th>
				<th class="center">Sesuai Asli</th>
			</tr>
			<tr>
				<td style="width: 25px" class="center">1</td>
				<td style="width: 300px">Print Online Formulir Keikutsertaan yang ditandatangani direktur, dicap, dan bermaterai Rp.6.000,-</td>
				<td style="width: 50px" class="center"><?php if($row['formkeikutsertaan']==NULL){
					echo "-";
				}else{
					echo "Ada";
				} ?></td>
				<td style="width: 70px" class="center"><?php if($row['formkeikutsertaan']==NULL){
					echo "-";
				}else{
					echo "Sesuai Asli";
				} ?></td>
				<td style="width: 150px"><?= $row['keterangan_formkeikutsertaan'];?></td>
			</tr>
			<tr>
				<td style="width: 25px" class="center">2</td>
				<td style="width: 300px">Membawa Surat Kuasa bagi pembawa dokumen selain direktur, dicap bermaterai Rp.6.000,-, dan ditandatangani oleh direktur</td>
				<td style="width: 50px" class="center"><?php if($row['suratkuasa']==NULL){
					echo "-";
				}else{
					echo "Ada";
				} ?></td>
				<td style="width: 70px" class="center"><?php if($row['suratkuasa']==NULL){
					echo "-";
				}else{
					echo "Sesuai Asli";
				} ?></td>
				<td style="width: 150px"><?= $row['keterangan_suratkuasa'];?></td>
			</tr>
			<tr>
				<td style="width: 25px" class="center">3</td>
				<td style="width: 300px">Print Online Formulir Pendaftaran</td>
				<td style="width: 50px" class="center"><?php if($row['printonline']==NULL){
					echo "-";
				}else{
					echo "Ada";
				} ?></td>
				<td style="width: 70px" class="center"><?php if($row['printonline']==NULL){
					echo "-";
				}else{
					echo "Sesuai Asli";
				} ?></td>
				<td style="width: 150px"><?= $row['keterangan_printonline'];?></td>
			</tr>
			<tr>
				<td style="width: 25px" class="center">4</td>
				<td style="width: 300px">Ktp Direktur (Asli dan Copy)</td>
				<td style="width: 50px" class="center"><?php if($row['ktpdirektur']==NULL){
					echo "-";
				}else{
					echo "Ada";
				} ?></td>
				<td style="width: 70px" class="center"><?php if($row['ktpdirektur']==NULL){
					echo "-";
				}else{
					echo "Sesuai Asli";
				} ?></td>
				<td style="width: 150px"><?= $row['keterangan_ktpdirektur'];?></td>
			</tr>
			<tr>
				<td style="width: 25px" class="center">5</td>
				<td style="width: 300px">NPWP Perusahaan (Asli dan Copy)</td>
				<td style="width: 50px" class="center"><?php if($row['npwpperusahaan']==NULL){
					echo "-";
				}else{
					echo "Ada";
				} ?></td>
				<td style="width: 70px" class="center"><?php if($row['npwpperusahaan']==NULL){
					echo "-";
				}else{
					echo "Sesuai Asli";
				} ?></td>
				<td style="width: 150px"><?= $row['keterangan_npwpperusahaan'];?></td>
			</tr>
			<tr>
				<td style="width: 25px" class="center">6</td>
				<td style="width: 300px"><?= $row['siup'] ?> / <?= $row['siujk'] ?> / <?= $row['sbu'] ?></td>
				<td style="width: 50px" class="center"><?php if(($row['siup']=='-')&&($row['siujk']=='-')&&($row['sbu']=='-')){
					echo "-";
				}else{
					echo "Ada";
				} ?></td>
				<td style="width: 70px" class="center"><?php if(($row['siup']=='-')&&($row['siujk']=='-')&&($row['sbu']=='-')){
					echo "-";
				}else{
					echo "Sesuai Asli";
				} ?></td>
				<td style="width: 150px"><?= $row['keterangan_1'];?></td>
			</tr>
			<tr>
				<td class="center">7</td>
				<td style="width: 300px"><?= $row['aktependirian'] ?> / <?= $row['akteperubahan'] ?></td>
				<td style="width: 50px" class="center"><?php if(($row['aktependirian']=='-')&&($row['akteperubahan']=='-')){
					echo "-";
				}else{
					echo "Ada";
				} ?></td>
				<td style="width: 70px" class="center"><?php if(($row['aktependirian']=='-')&&($row['akteperubahan']=='-')){
					echo "-";
				}else{
					echo "Sesuai Asli";
				} ?></td>
				<td style="width: 150px"><?= $row['keterangan_2'];?></td>
			</tr>
			<tr>
				<td style="width: 25px" class="center">8</td>
				<td style="width: 300px">TDP (Asli dan Copy)</td>
				<td style="width: 50px" class="center"><?php if($row['tandadaftar']==NULL){
					echo "-";
				}else{
					echo "Ada";
				} ?></td>
				<td style="width: 70px" class="center"><?php if($row['tandadaftar']==NULL){
					echo "-";
				}else{
					echo "Sesuai Asli";
				} ?></td>
				<td style="width: 150px"><?= $row['keterangan_tandadaftar'];?></td>
			</tr>
			<tr>
				<td style="width: 25px" class="center">9</td>
				<td style="width: 300px"><?= $row['situ'] ?> / <?= $row['ho'] ?> / <?= $row['surketdomisili'] ?></td>
				<td style="width: 50px" class="center"><?php if(($row['situ']=='-')&&($row['ho']=='-')&&($row['surketdomisili']=='-')){
					echo "-";
				}else{
					echo "Ada";
				} ?></td>
				<td style="width: 70px" class="center"><?php if(($row['situ']=='-')&&($row['ho']=='-')&&($row['surketdomisili']=='-')){
					echo "-";
				}else{
					echo "Sesuai Asli";
				} ?></td>
				<td style="width: 150px"><?= $row['keterangan_1'];?></td>
			</tr>
			<tr>
				<td style="width: 25px" class="center">10</td>
				<td style="width: 300px">Surat Pengukuhan Kena Pajak (Asli dan Copy)</td>
				<td style="width: 50px" class="center"><?php if($row['suratpengukuhan']==NULL){
					echo "-";
				}else{
					echo "Ada";
				} ?></td>
				<td style="width: 70px" class="center"><?php if($row['suratpengukuhan']==NULL){
					echo "-";
				}else{
					echo "Sesuai Asli";
				} ?></td>
				<td style="width: 150px"><?= $row['keterangan_suratpengukuhan'];?></td>
			</tr>
			<tr>
				<td style="width: 25px" class="center">11</td>
				<td style="width: 300px">Pengesahan Menteri Hukum dan HAM</td>
				<td style="width: 50px" class="center"><?php if($row['pengesahanmenteri']==NULL){
					echo "-";
				}else{
					echo "Ada";
				} ?></td>
				<td style="width: 70px" class="center"><?php if($row['pengesahanmenteri']==NULL){
					echo "-";
				}else{
					echo "Sesuai Asli";
				} ?></td>
				<td style="width: 150px"><?= $row['keterangan_pengesahanmenteri'];?></td>
			</tr>



		</table></span><br>
		Demikian Berita Acara Verifikasi ini dibuat untuk dipergunakan sebagaimana mestinya.<br><br>
		<table>
			<tr>
				<td style="width: 360px">Perusahaan :</td>				
				<td>Verifikator LPSE</td>
			</tr>
			<tr>
				<td style="text-transform: uppercase; width: 360px;"><?= $row['jenis_perusahaan'];?> <?= $row['nama_perusahaan'];?></td>				
				<td>LPSE Provinsi Jawa Tengah</td>
			</tr>
			<tr><td style="color: white; width: 360px;">.</td><td style="color: white">.</td></tr><tr><td style="color: white">.</td><td style="color: white">.</td></tr><tr><td style="color: white">.</td><td style="color: white">.</td></tr>
			<tr>
				<td style="text-transform: uppercase; width: 360px;"><u><?= $row['wakilpjb'];?></u></td>				
				<td style="text-transform: uppercase;"><u><?= $row['verifikator']; ?></u></td>
			</tr>
			<tr>
				<td style="text-transform: uppercase; width: 360px;"><?= $row['jabatan'];?></td>				
				<td>NIP. <?= $nip_verifikator; ?></td>
			</tr>
		</table>
		


		</p>
		


	<page>
		<p style="text-align: center; text-transform: uppercase;"><b><u>berita acara serah terima dokumen asli rekanan</u></b><br>
		 Nomor : <?= $row['no_pendaftaran'];?>B / LPSE.JTG / VER / <?= $bulan_rom;?> / <?= $tahun;?> </p>
		<p style="text-align: justify;">Pada hari <?= $row['hari_terverifikasi']; ?>, <?= $hari;?>&nbsp;<?= $bulan;?>&nbsp;<?= $tahun;?>, telah diserahkan berkas-berkas dokumen Penyedia Barang / Jasa, bertempat di Gedung D Sekretariat Daerah Provinsi Jawa Tengah, dengan hasil sebagai berikut:<br><br><br>

		a. <?php if($row['ktpdirektur']==NULL){
			echo "-";
			}else{
				echo "Asli KTP Direktur";
			} ?>
		<br><br><br>
		b. <?php if($row['npwpperusahaan']==NULL){
				echo "-";
			}else{
				echo "Asli NPWP Perusahaan";
			} ?>
		<br><br><br>
		c. <?php if(($row['siup']=='-')&&($row['siujk']=='-')&&($row['sbu']=='-')){
				echo "-";
			}else{
				echo "Asli ".$row['siup']." / ".$row['siujk']." / ".$row['sbu'];
			} ?>
		<br><br><br>
		d. <?php if(($row['aktependirian']=='-')&&($row['akteperubahan']=='-')){
				echo "-";
			}else{
				echo "Asli ".$row['aktependirian']." / ".$row['akteperubahan'];
			} ?>
		<br><br><br>
		e. <?php if($row['tandadaftar']==NULL){
				echo "-";
			}else{
				echo "Asli TDP";
			} ?>
		<br><br><br>
		f. <?php if(($row['situ']=='-')&&($row['ho']=='-')&&($row['surketdomisili']=='-')){
				echo "-";
			}else{
				echo "Asli ".$row['situ']." / ".$row['ho']." / ".$row['surketdomisili'];
			} ?>
		<br><br><br>
		g. <?php if($row['suratpengukuhan']==NULL){
				echo "-";
			}else{
				echo "Asli Surat Pengukuhan Pengusaha Kena Pajak";
			} ?>
		<br><br><br>
		h. <?php if($row['pengesahanmenteri']==NULL){
				echo "-";
			}else{
				echo "Asli Surat Pengesahan Menteri Hukum dan HAM";
			} ?>
		<br><br>

		<br>
		Demikian Berita Acara Verifikasi ini dibuat untuk dipergunakan sebagaimana mestinya.<br><br>
		<table>
			<tr>
				<td style="width: 360px; ">Yang menerima</td>				
				<td>Yang menyerahkan</td>
			</tr>
			<tr>
				<td style="width: 360px;">Perusahaan :</td>				
				<td>Verifikator LPSE</td>
			</tr>
			<tr>
				<td style="text-transform: uppercase; width: 360px;"><?= $row['jenis_perusahaan'];?> <?= $row['nama_perusahaan'];?></td>				
				<td>LPSE Provinsi Jawa Tengah</td>
			</tr>
			<tr><td style="color: white">.</td><td style="color: white">.</td></tr><tr><td style="color: white">.</td><td style="color: white">.</td></tr><tr><td style="color: white">.</td><td style="color: white">.</td></tr>
			<tr>
				<td style="text-transform: uppercase; width: 360px;"><u><?= $row['wakilpjb'];?></u></td>				
				<td style="text-transform: uppercase;"><u><?= $row['verifikator']; ?></u></td>
			</tr>
			<tr>
				<td style="text-transform: uppercase; width: 360px;"><?= $row['jabatan'];?></td>				
				<td>NIP. <?= $nip_verifikator; ?></td>
			</tr>
		</table>
	</p>
	</page>
	<?php
			endforeach;
	?>
</body>
</html>