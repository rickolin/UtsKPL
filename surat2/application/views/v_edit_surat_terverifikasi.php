
<?php foreach ($data_surat as $row): ?>
<span style="text-align: center;">
    <h3 style="margin-top: 20px">
    Verifikasi Surat <?php echo html_escape($row['jenis_perusahaan']); ?> <?php echo html_escape($row['nama_perusahaan']);?>     
    </h3>
</span>
<div class="container" style="margin-top: 30px; color: black">
    <form method="post" action="<?=base_url()?>SuratTerverifikasiController/edit/<?= $no_pendaftaran; ?>">
        <div class="row" style="margin-top: 5px;">
            <div class="col-md-2">
                <label>Kode Penyedia :</label>
            </div>
            <div class="col-md-4">
                <input list=" " type="text" class="form-control" name="no_pendaftaran" id="no_pendaftaran" readonly autocomplete = "off" value="<?= $no_pendaftaran;?>">
            </div>
        </div>
        <input type="text" class="form-control"name="jenis_perusahaan" value="<?php echo $row['jenis_perusahaan'];?>" readonly style="display: none;">
        <input type="text" class="form-control" name="nama_perusahaan" id="nama_penyedia" value="<?php echo $row['nama_perusahaan'];?>" readonly style="display: none;">
<?php endforeach; ?>

<?php foreach ($atribut_surat as $row): ?>
        <div class="row" style="margin-top: 5px;">
            <div class="col-md-2">
                <label>Nama Verifikator</label>
            </div>
            <div class="col-md-4">
                <input type="text" class="form-control" name="verifikator" id="verifikator" readonly value="<?= $verifikator;?>">
            </div>
        </div>
        
        <hr>
        <div class="row justify-content-between" style="margin-top: 5px">
            <div class="col-md-4">
                <input type="checkbox" name="formkeikutsertaan" value="Form Keikutsertaan" 
                    <?php 
                        if($row['formkeikutsertaan']=='Form Keikutsertaan'){
                            echo "checked";
                        }else{
                            echo "";
                        }
                    ?>
                >
                    Form Keikutsertaan
            </div>
            <div class="col-md-6">
                <input type="text" class="form-control" name="keterangan_formkeikutsertaan" placeholder="Keterangan Form Keikutsertaan..." id="keterangan_formkeikutsertaan" autocomplete="off" value="<?= $row['keterangan_formkeikutsertaan']; ?>">
            </div>
        </div>

        <div class="row justify-content-between" style="margin-top: 5px">
            <div class="col-md-4">
                <input type="checkbox" name="suratkuasa" value="Surat Kuasa"
                <?php 
                        if($row['suratkuasa']=='Surat Kuasa'){
                            echo "checked";
                        }else{
                            echo "";
                        }
                ?>
                >Surat Kuasa
            </div>
            <div class="col-md-6">
                <input type="text" class="form-control" name="keterangan_suratkuasa" placeholder="Keterangan Surat Kuasa..." autocomplete="off" id="keterangan_suratkuasa" value="<?= $row['keterangan_suratkuasa']; ?>">
            </div>
        </div>

        <div class="row justify-content-between" style="margin-top: 5px">
            <div class="col-md-4">
                <input type="checkbox" name="printonline" value="Print Online Formulir Pendaftaran"
                    <?php 
                        if($row['printonline']=='Print Online Formulir Pendaftaran'){
                            echo "checked";
                        }else{
                            echo "";
                        }
                    ?>
                >Print Online Formulir Pendaftaran 
            </div>
            <div class="col-md-6">
                <input type="text" class="form-control" name="keterangan_printonline" id="keterangan_printonline" placeholder="Keterangan printonline Formulir Pendaftaran...." autocomplete="off" value="<?= $row['keterangan_printonline']; ?>">
            </div>
        </div>

        <div class="row justify-content-between" style="margin-top: 5px">
            <div class="col-md-4">
                <input type="checkbox" name="ktpdirektur" value="KTP Direktur (Asli dan Copy)"
                    <?php 
                        if($row['ktpdirektur']=='KTP Direktur (Asli dan Copy)'){
                            echo "checked";
                        }else{
                            echo "";
                        }
                    ?>
                >KTP Direktur (Asli dan Copy)
            </div>
            <div class="col-md-6">
                <input type="text" class="form-control" name="keterangan_ktpdirektur" id="keterangan_ktpdirektur" placeholder="Keterangan Ktp Direktur..." autocomplete="off" value="<?= $row['keterangan_ktpdirektur']; ?>">
            </div>
        </div>

        <div class="row justify-content-between" style="margin-top: 5px">
            <div class="col-md-4">
                <input type="checkbox" name="npwpperusahaan" value="NPWP Perusahaan (Asli dan Copy)"
                    <?php 
                        if($row['npwpperusahaan']=='NPWP Perusahaan (Asli dan Copy)'){
                            echo "checked";
                        }else{
                            echo "";
                        }
                    ?>
                >NPWP Perusahaan (Asli dan Copy) 
            </div>
            <div class="col-md-6">
                <input type="text" class="form-control" name="keterangan_npwpperusahaan" id="keterangan_npwpperusahaan" placeholder="Keterangan NPWP Perusahaan..." autocomplete="off" value="<?= $row['keterangan_npwpperusahaan']; ?>">

            </div>
        </div>
        
        <div class="row justify-content-between" style="margin-top: 5px">
            <div class="col-md-4">
            <table>
                <tr>
                    <td><input type="checkbox" name="siup" value="SIUP"
                            <?php 
                                if($row['siup']=='SIUP'){
                                    echo "checked";
                                }else{
                                    echo "";
                                }
                            ?>
                        >SIUP&nbsp;&nbsp;&nbsp;
                    </td>
                    <td><input type="checkbox" name="siujk" value="SIUJK"
                            <?php 
                                if($row['siujk']=='SIUJK'){
                                    echo "checked";
                                }else{
                                    echo "";
                                }
                            ?>
                        >SIUJK&nbsp;&nbsp;&nbsp;
                    </td>
                    <td><input type="checkbox" name="sbu" value="SBU"
                            <?php 
                                if($row['sbu']=='SBU'){
                                    echo "checked";
                                }else{
                                    echo "";
                                }
                            ?>
                        >SBU
                    </td>
                </tr>
            </table>
            </div>
            <div class="col-md-6">
                <input type="text" class="form-control" name="keterangan_1" id="keterangan_1" placeholder="Keterangan SIUP/SIUJK/SBU..." autocomplete="off" value="<?= $row['keterangan_1']; ?>">
            </div>
        </div>

        <div class="row justify-content-between" style="margin-top: 5px">
            <div class="col-md-4">
            <table>
                <tr>
                    <td><input type="checkbox" name="aktependirian" value="Akte Pendirian"
                            <?php 
                                if($row['aktependirian']=='Akte Pendirian'){
                                    echo "checked";
                                }else{
                                    echo "";
                                }
                            ?>
                        >Akte Pendirian&nbsp;&nbsp;&nbsp;
                    </td>
                    <td><input type="checkbox" name="akteperubahan" value="Akte Perubahan Terakhir"
                            <?php 
                                if($row['akteperubahan']=='Akte Perubahan Terakhir'){
                                    echo "checked";
                                }else{
                                    echo "";
                                }
                            ?>
                        >Akte Perubahan Terakhir
                    </td>
                </tr>
            </table>
            </div>
            <div class="col-md-6">
                <input type="text" class="form-control" name="keterangan_2" placeholder="Keterangan Akte Pendirian/Perubahan..." autocomplete="off" id="keterangan_2" value="<?= $row['keterangan_2']; ?>">
            </div>
        </div>

        <div class="row justify-content-between" style="margin-top: 5px">
            <div class="col-md-4">
                <input type="checkbox" name="tandadaftar" value="Tanda Daftar Perusahaan (TDP)"
                    <?php 
                        if($row['tandadaftar']=='Tanda Daftar Perusahaan (TDP)'){
                            echo "checked";
                        }else{
                            echo "";
                        }
                    ?>
                >Tanda Daftar Perusahaan (TDP)
            </div>
            <div class="col-md-6">
                <input type="text" class="form-control" name="keterangan_tandadaftar" id="keterangan_tandadaftar" placeholder="Keterangan Tanda Daftar..." autocomplete="off" value="<?= $row['keterangan_tandadaftar']; ?>">
            </div>
        </div>

        <div class="row justify-content-between" style="margin-top: 5px">
            <div class="col-md-4">
            <table>
                <tr>
                    <td><input type="checkbox" name="situ" value="SITU"
                            <?php 
                                if($row['situ']=='SITU'){
                                    echo "checked";
                                }else{
                                    echo "";
                                }
                            ?>
                        >SITU &nbsp;&nbsp;&nbsp;
                    </td>
                    <td><input type="checkbox" name="ho" value="HO"
                            <?php 
                                if($row['ho']=='HO'){
                                    echo "checked";
                                }else{
                                    echo "";
                                }
                            ?>
                        >HO &nbsp;&nbsp;&nbsp;
                    </td>
                    <td><input type="checkbox" name="surketdomisili" value="Surket Domisili"
                            <?php 
                                if($row['surketdomisili']=='Surket Domisili'){
                                    echo "checked";
                                }else{
                                    echo "";
                                }
                            ?>
                        >Surket Domisili
                    </td>
                </tr>
            </table>
            </div>
            <div class="col-md-6">
                <input type="text" class="form-control" name="keterangan_3" id="keterangan_3" placeholder="Keterangan SITU/HO/Surket Domisili..." autocomplete="off" value="<?= $row['keterangan_3']; ?>">
            </div>
        </div>

        <div class="row justify-content-between" style="margin-top: 5px">
            <div class="col-md-4">
                <input type="checkbox" name="suratpengukuhan" value="Surat Pengukuhan Pengusaha Kena Pajak (PKP)"
                    <?php 
                        if($row['suratpengukuhan']=='Surat Pengukuhan Pengusaha Kena Pajak (PKP)'){
                            echo "checked";
                        }else{
                            echo "";
                        }
                    ?>
                >Surat Pengukuhan Pengusaha Kena Pajak (PKP) 
            </div>
            <div class="col-md-6">
                <input type="text" class="form-control" name="keterangan_suratpengukuhan" id="keterangan_suratpengukuhan" placeholder="Keterangan Surat Pengukuhan..." autocomplete="off" value="<?= $row['keterangan_suratpengukuhan']; ?>">
            </div>
        </div>

        <div class="row justify-content-between" style="margin-top: 5px">
            <div class="col-md-5">
                <input type="checkbox" name="pengesahanmenteri" value="Pengesahan Menteri Hukum dan HAM (Asli dan Copy)"
                    <?php 
                        if($row['pengesahanmenteri']=='Pengesahan Menteri Hukum dan HAM (Asli dan Copy)'){
                            echo "checked";
                        }else{
                            echo "";
                        }
                    ?>
                >Pengesahan Menteri Hukum dan HAM (Asli dan Copy) 
            </div>
            <div class="col-md-6">
                <input type="text" class="form-control" name="keterangan_pengesahanmenteri" id="keterangan_pengesahanmenteri" placeholder="Keterangan Surat Pengesahan Menteri" autocomplete="off" value="<?= $row['keterangan_pengesahanmenteri']; ?>">
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-md-6"><br>
                <div class="row" style="margin-top: 5px">
                    <div class="col-md-4">
                        <label>Nama Wakil PJB :</label>
                    </div>
                    <div class="col-md-8">
                        <input type="text" class="form-control" name="text_wakilpjb" id="text_wakilpjb" autocomplete="off" value="<?php echo $row['wakilpjb']; ?>">
                            <?php if (form_error('text_wakilpjb')): ?>
                                    <div class="alert alert-danger" role="alert">
                                        <?= form_error('text_wakilpjb'); ?>                         
                                    </div>
                                <?php endif; ?>
                    </div>                 
                </div> 
                <br>
                <div class="row" style="margin-top: 5px">
                    <div class="col-md-4">
                        <label>Jabatan : </label>
                    </div>
                    <div class="col-md-8">
                        <input type="text" class="form-control" name="text_jabatan" id="text_jabatan" autocomplete="off" value="<?php echo $row['jabatan']; ?>">
                            <?php if (form_error('text_jabatan')): ?>
                                <div class="alert alert-danger" role="alert">
                                    <?= form_error('text_jabatan'); ?>                          
                                </div>
                            <?php endif; ?>
                    </div>                 
                </div>
            </div>
            <div class="col-md-6">
                <fieldset>
                    <h5>Jenis Persetujuan:</h5>
                    <div class="row">
                        <div class="col-md-4">
                            <label>
                            <input type="radio" class="form-control" name="jenis_persetujuan" id="disetujui" value="DISETUJUI" 
                                <?php 
                                    if($row['jenis_persetujuan']=='DISETUJUI'){
                                        echo "checked";
                                    }else{
                                        echo "";
                                    }
                                ?>
                            />DISETUJUI
                            </label>
                        </div>
                        <div class="col-md-4">
                            <label>
                            <input type="radio" class="form-control" name="jenis_persetujuan" id="ditangguhkan" value="DITANGGUHKAN"
                                <?php 
                                    if($row['jenis_persetujuan']=='DITANGGUHKAN'){
                                        echo "checked";
                                    }else{
                                        echo "";
                                    }
                                ?>
                            />DITANGGUHKAN
                            </label>
                        </div>
                        <div class="col-md-4">
                            <label>
                            <input type="radio" class="form-control" name="jenis_persetujuan" id="bersyarat" value="DISETUJUI BERSYARAT"
                                <?php 
                                    if($row['jenis_persetujuan']=='DISETUJUI BERSYARAT'){
                                        echo "checked";
                                    }else{
                                        echo "";
                                    }
                                ?>
                            />DISETUJUI BERSYARAT
                            </label>
                        </div>
                    </div>
                    <input type="text" class="form-control" name="keterangan_persetujuan" id="keterangan_peretujuan" placeholder="Keterangan Jenis Persetujuan..." autocomplete="off" value="<?= $row['keterangan_persetujuan']; ?>">
                </fieldset>
            </div> 
        </div>
        <div class="row float-right" style="margin-bottom: 30px">
            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#verifikasiModal"><button type="button" class="btn btn-primary"><i class="far fa-check-square"></i>&nbsp;Simpan</button></a>
        </div>
        <div class="modal fade" id="verifikasiModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Apakah Anda Yakin Akan Menyimpan Surat Ini?</h5>
                  <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                  </button>
                </div>
                <div class="modal-body">Pilih "Simpan" Dibawah Ini Jika Anda Sudah Yakin.</div>
                <div class="modal-footer">
                  <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                  <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
              </div>
            </div>
          </div>
            	
	</form>
</div>
<?php endforeach; ?>
<br>
<br>