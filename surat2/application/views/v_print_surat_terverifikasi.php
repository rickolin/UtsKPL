<html>
<head>
  <title>Cetak PDF</title>
  <style>
    table {
      border-collapse:collapse;
      table-layout:fixed;width: 630px;
    }
    table tr th{
      text-align: center;
    }
    table td {
      word-wrap:break-word;
      width: 20%;
    }
  </style>
</head>
<body>
    <?php
        header("Content-type: application/vnd-ms-excel");
        header("Content-Disposition: attachment; filename=surat_terverifikasi.xls");
    ?>

  <h2 style="text-align: center;"><b><u>SURAT TERVERIFIKASI LPSE PROVINSI JAWA TENGAH</u></b></h2>
    <?php if($ket1 != NULL) : ?>
    <h3 style="text-align: center;margin-top: -17px">Dari <?php echo $ket1; ?></h3>
    <?php endif; ?>
    <p style="text-align: left;">
    <?php if($ket2 != NULL) : ?>
    Data Diambil Berdasarkan Keyword :<b> <?php echo $ket2; ?></b><br>
    <?php endif; ?>
    </p> 
    
  <table border="1" cellpadding="8">
  <tr>
    <th>No</th>
    <th>Tanggal</th>
    <th>No Pendaftaran</th>
    <th>Jenis Perusahaan </th>
    <th>Nama Perusahaan</th>
    <th>Verifikator</th>
    <th>wakilpjb</th>
    <th>Jenis Persetujuan</th>
    <th>Keterangan</th>
  </tr>
    <?php
              $i = 1;
              if(count($tamu)>0):
                foreach ( $tamu as $p):
            ?>

            <tr>
              <td style="width: 25px"><?= $i ?></td>
              <td style="width: 80px; text-align: center"><?= $p['tanggal']; ?></td>
              <td style="width: 120px; text-align: center;"><?= $p['no_pendaftaran']; ?></td>
              <td><?= $p['jenis_perusahaan']; ?></td>
              <td style="width: 100px"><?= $p['nama_perusahaan']; ?></td>
              <td><?= $p['verifikator']; ?></td>
              <td><?= $p['wakilpjb']; ?></td>
              <td><?= $p['jenis_persetujuan']; ?></td>
              <td><?= $p['keterangan_persetujuan'];?></td>
            </tr>
            <?php
              $i++;
              endforeach;
              else:
                echo "<td>No Record Found</td>";
              endif;
      
            ?>
  </table>
</body>
</html>