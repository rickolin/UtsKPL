<span style="text-align: center;">
    <h3 style="margin-top: 20px">
    Verifikasi Surat <?php foreach($perusahaan as $row){ echo $row['jenis_perusahaan'];}?> <?php foreach($perusahaan as $row){ echo $row['nama_perusahaan'];}?>     
    </h3>
</span>
<div class="container" style="margin-top: 30px; color: black">
    <form method="post">
        <div class="row" style="margin-top: 5px;">
            <div class="col-md-2">
                <label>Kode Penyedia :</label>
            </div>
            <div class="col-md-4">
                <input list=" " type="text" class="form-control" name="no_pendaftaran" id="no_pendaftaran" readonly autocomplete = "off" value="<?= $no_pendaftaran;?>">
            </div>
        </div>
        <!-- <div class="row" style="margin-top: 5px">
            <div class="col-md-2">
                <label>Nama Penyedia :</label>
            </div>
            <div class="col-md-4"> -->
                <input type="text" class="form-control"name="jenis_perusahaan" value="<?php foreach($perusahaan as $row){ echo $row['jenis_perusahaan'];}?>" readonly style="display: none;">
            <!-- </div> -->
             <!-- <div class="col-md-4" style="margin-left: -25px"> -->
                <input type="text" class="form-control" name="nama_perusahaan" id="nama_penyedia" value="<?php foreach($perusahaan as $row){ echo $row['nama_perusahaan'];}?>" readonly style="display: none;">
           <!--  </div>
        </div> -->
        <div class="row" style="margin-top: 5px;">
            <div class="col-md-2">
                <label>Nama Verifikator</label>
            </div>
            <div class="col-md-4">
                <input type="text" class="form-control" name="nama_verifikator" id="nama_verifikator" readonly value="<?= $nama_verifikator;?>">
            </div>
        </div>
        
        <hr>
        <div class="row justify-content-between" style="margin-top: 5px">
            <div class="col-md-4">
                <input type="checkbox" name="formkeikutsertaan" value="Form Keikutsertaan"<?php echo set_checkbox('formkeikutsertaan', 'Form Keikutsertaan'); ?>/>Form Keikutsertaan
            </div>
            <div class="col-md-6">
                <input type="text" class="form-control" name="keterangan_formkeikutsertaan" placeholder="Keterangan Form Keikutsertaan..." id="keterangan_formkeikutsertaan" autocomplete="off" value="<?php echo set_value('keterangan_formkeikutsertaan'); ?>">
            </div>
            <?php if (form_error('formkeikutsertaan')): ?>
                <div class="alert alert-danger" role="alert">
                    <?= form_error('formkeikutsertaan'); ?>                          
                </div>
            <?php endif; ?>
        </div>

        <div class="row justify-content-between" style="margin-top: 5px">
            <div class="col-md-4">
                <input type="checkbox" name="suratkuasa" value="Surat Kuasa"<?php echo set_checkbox('suratkuasa', 'Surat Kuasa'); ?>/>Surat Kuasa
            </div>
            <div class="col-md-6">
                <input type="text" class="form-control" name="keterangan_suratkuasa" placeholder="Keterangan Surat Kuasa..." autocomplete="off" id="keterangan_suratkuasa"value="<?php echo set_value('keterangan_suratkuasa'); ?>">
            </div>
        </div>

        <div class="row justify-content-between" style="margin-top: 5px">
            <div class="col-md-4">
                <input type="checkbox" name="printonline" value="Print Online Formulir Pendaftaran"<?php echo set_checkbox('printonline', 'Print Online Formulir Pendaftaran'); ?>/>Print Online Formulir Pendaftaran 
            </div>
            <div class="col-md-6">
                <input type="text" class="form-control" name="keterangan_printonline" id="keterangan_printonline" placeholder="Keterangan printonline Formulir Pendaftaran...." autocomplete="off" value="<?php echo set_value('keterangan_printonline'); ?>">
            </div>
        </div>

        <div class="row justify-content-between" style="margin-top: 5px">
            <div class="col-md-4">
                <input type="checkbox" name="ktpdirektur" value="KTP Direktur (Asli dan Copy)"<?php echo set_checkbox('ktpdirektur', 'KTP Direktur (Asli dan Copy)'); ?>/>KTP Direktur (Asli dan Copy)
            </div>
            <div class="col-md-6">
                <input type="text" class="form-control" name="keterangan_ktpdirektur" id="keterangan_ktpdirektur" placeholder="Keterangan Ktp Direktur..." autocomplete="off" value="<?php echo set_value('keterangan_ktpdirektur'); ?>">
            </div>
        </div>

        <div class="row justify-content-between" style="margin-top: 5px">
            <div class="col-md-4">
                <input type="checkbox" name="npwpperusahaan" value="NPWP Perusahaan (Asli dan Copy)"<?php echo set_checkbox('npwpperusahaan', 'NPWP Perusahaan (Asli dan Copy)'); ?>/>NPWP Perusahaan (Asli dan Copy) 
            </div>
            <div class="col-md-6">
                <input type="text" class="form-control" name="keterangan_npwpperusahaan" id="keterangan_npwpperusahaan" placeholder="Keterangan NPWP Perusahaan..." autocomplete="off" value="<?php echo set_value('keterangan_npwpperusahaan'); ?>">

            </div>
        </div>
        
        <div class="row justify-content-between" style="margin-top: 5px">
            <div class="col-md-4">
            <table>
                <tr>
                    <td><input type="checkbox" name="siup" value="SIUP"<?php echo set_checkbox('siup', 'SIUP'); ?>/>SIUP&nbsp;&nbsp;&nbsp;</td>
                    <td><input type="checkbox" name="siujk" value="SIUJK"<?php echo set_checkbox('siujk', 'SIUJK'); ?>/>SIUJK&nbsp;&nbsp;&nbsp;</td>
                    <td><input type="checkbox" name="sbu" value="SBU"<?php echo set_checkbox('sbu', 'SBU'); ?>/>SBU</td>
                </tr>
            </table>
            </div>
            <div class="col-md-6">
                <input type="text" class="form-control" name="keterangan_1" id="keterangan_1" placeholder="Keterangan SIUP/SIUJK/SBU..." autocomplete="off" value="<?php echo set_value('keterangan_1'); ?>">
            </div>
        </div>

        <div class="row justify-content-between" style="margin-top: 5px">
            <div class="col-md-4">
            <table>
                <tr>
                    <td><input type="checkbox" name="aktependirian" value="Akte Pendirian"<?php echo set_checkbox('aktependirian', 'Akte Pendirian'); ?>/>Akte Pendirian&nbsp;&nbsp;&nbsp;</td>
                    <td><input type="checkbox" name="akteperubahan" value="Akte Perubahan Terakhir"<?php echo set_checkbox('akteperubahan', 'Akte Perubahan Terakhir'); ?>/>Akte Perubahan Terakhir</td>
                </tr>
            </table>
            </div>
            <div class="col-md-6">
                <input type="text" class="form-control" name="keterangan_2" placeholder="Keterangan Akte Pendirian/Perubahan..." autocomplete="off" id="keterangan_2" value="<?php echo set_value('keterangan_2'); ?>">
            </div>
        </div>

        <div class="row justify-content-between" style="margin-top: 5px">
            <div class="col-md-4">
                <input type="checkbox" name="tandadaftar" value="Tanda Daftar Perusahaan (TDP)"<?php echo set_checkbox('tandadaftar', 'Tanda Daftar Perusahaan (TDP)'); ?>/>Tanda Daftar Perusahaan (TDP)
            </div>
            <div class="col-md-6">
                <input type="text" class="form-control" name="keterangan_tandadaftar" id="keterangan_tandadaftar" placeholder="Keterangan Tanda Daftar..." autocomplete="off" value="<?php echo set_value('keterangan_tandadaftar'); ?>">
            </div>
        </div>

        <div class="row justify-content-between" style="margin-top: 5px">
            <div class="col-md-4">
            <table>
                <tr>
                    <td><input type="checkbox" name="situ" value="SITU"<?php echo set_checkbox('situ', 'SITU'); ?>/>SITU &nbsp;&nbsp;&nbsp;</td>
                    <td><input type="checkbox" name="ho" value="HO"<?php echo set_checkbox('ho', 'HO'); ?>/>HO &nbsp;&nbsp;&nbsp;</td>
                    <td><input type="checkbox" name="surketdomisili" value="Surket Domisili"<?php echo set_checkbox('surketdomisili', 'Surket Domisili'); ?>/>Surket Domisili</td>
                </tr>
            </table>
            </div>
            <div class="col-md-6">
                <input type="text" class="form-control" name="keterangan_3" id="keterangan_3" placeholder="Keterangan SITU/HO/Surket Domisili..." autocomplete="off" value="<?php echo set_value('keterangan_3'); ?>">
            </div>
        </div>

        <div class="row justify-content-between" style="margin-top: 5px">
            <div class="col-md-4">
                <input type="checkbox" name="suratpengukuhan" value="Surat Pengukuhan Pengusaha Kena Pajak (PKP)"<?php echo set_checkbox('suratpengukuhan', 'Surat Pengukuhan Pengusaha Kena Pajak (PKP)'); ?>/>Surat Pengukuhan Pengusaha Kena Pajak (PKP) 
            </div>
            <div class="col-md-6">
                <input type="text" class="form-control" name="keterangan_suratpengukuhan" id="keterangan_suratpengukuhan" placeholder="Keterangan Surat Pengukuhan..." autocomplete="off" value="<?php echo set_value('keterangan_suratpengukuhan'); ?>">
            </div>
        </div>

        <div class="row justify-content-between" style="margin-top: 5px">
            <div class="col-md-5">
                <input type="checkbox" name="pengesahanmenteri" value="Pengesahan Menteri Hukum dan HAM (Asli dan Copy)"<?php echo set_checkbox('pengesahanmenteri', 'Pengesahan Menteri Hukum dan HAM (Asli dan Copy)'); ?>/>Pengesahan Menteri Hukum dan HAM (Asli dan Copy) 
            </div>
            <div class="col-md-6">
                <input type="text" class="form-control" name="keterangan_pengesahanmenteri" id="keterangan_pengesahanmenteri" placeholder="Keterangan Surat Pengesahan Menteri" autocomplete="off" value="<?php echo set_value('keterangan_pengesahanmenteri'); ?>">
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
                        <input type="text" class="form-control" name="text_wakilpjb" id="text_wakilpjb" autocomplete="off" value="<?php echo set_value('text_wakilpjb'); ?>">
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
                        <input type="text" class="form-control" name="text_jabatan" id="text_jabatan" autocomplete="off" value="<?php echo set_value('text_jabatan'); ?>">
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
                            <input type="radio" class="form-control" name="jenis_persetujuan" id="disetujui" value="DISETUJUI" checked='checked'/>DISETUJUI
                            </label>
                        </div>
                        <div class="col-md-4">
                            <label>
                            <input type="radio" class="form-control" name="jenis_persetujuan" id="ditangguhkan" value="DITANGGUHKAN"/>DITANGGUHKAN
                            </label>
                        </div>
                        <div class="col-md-4">
                            <label>
                            <input type="radio" class="form-control" name="jenis_persetujuan" id="bersyarat" value="DISETUJUI BERSYARAT"/>DISETUJUI BERSYARAT
                            </label>
                        </div>
                    </div>
                    <input type="text" class="form-control" name="keterangan_persetujuan" id="keterangan_peretujuan" placeholder="Keterangan Jenis Persetujuan..." autocomplete="off" value="<?php echo set_value('keterangan_peretujuan'); ?>">
                </fieldset>
            </div> 
        </div>
        <div class="row float-right" style="margin-bottom: 30px">
            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#verifikasiModal"><button type="button" class="btn btn-primary"><i class="far fa-check-square"></i>&nbsp;Submit</button></a>
        </div>
        <div class="modal fade" id="verifikasiModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Apakah Anda Yakin Akan Memverifikasi Surat Ini?</h5>
                  <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                  </button>
                </div>
                <div class="modal-body">Pilih "Verifikasi" Dibawah Ini Jika Anda Sudah Yakin.</div>
                <div class="modal-footer">
                  <button class="btn btn-secondary" type="button" data-dismiss="modal">Edit</button>
                  <button type="submit" class="btn btn-primary">Verifikasi</button>
                </div>
              </div>
            </div>
          </div>
            	
	</form>
</div>
<br>
<br>