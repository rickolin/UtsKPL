<form action="" method="post">
        <div class="modal-body">
          <div class="container-fluid">
            <h1 class="h3 mb-0 text-gray-800">Form Verifikator</h1><br>
            
              <div class="form-group row col-md-6">
                <label for=""><h6 class="font-weight-bold">NIP</h6></label>
                <input list="data_asn" type="text" class="form-control" name="nip" id="nip" value="<?php echo set_value('nip'); ?>" autocomplete = "off">
                <?php if (form_error('nip')): ?>
                          <div class="alert alert-danger" role="alert">
                          <?= form_error('nip'); ?>              
                          </div>
                <?php endif; ?>
                    
              </div>

              <div class="form-group row col-md-6">
                <label for=""><h6 class="font-weight-bold">Nama</h6></label>
                <input type="text" class="form-control" name="nama" id="nama" value="<?php echo set_value('nama'); ?>" autocomplete="off">
                <?php if (form_error('nama')): ?>
                          <div class="alert alert-danger" role="alert">
                          <?= form_error('nama'); ?>                      
                          </div>
                <?php endif; ?>
              </div>
          
              <div class="form-group row col-md-6">
                <label for=""><h6 class="font-weight-bold">Password</h6></label>
                <input type="password" class="form-control" name="password" id="password">
                <?php if (form_error('conf_password')): ?>
                          <div class="alert alert-danger" role="alert">
                    
                          <?= form_error('password'); ?>                     
                          </div>
                <?php endif; ?>
              </div>
              
              <div class="form-group row col-md-6 ">
                <input type="password" class="form-control" name="conf_password" id="conf_password" placeholder="Konfirmasi Password">
                <?php if (form_error('conf_password')): ?>
                          <div class="alert alert-danger" role="alert">
                          <?= form_error('conf_password'); ?>                    
                          </div>
                <?php endif; ?>
              </div>
 
            
          </div>
        </div>

        <div class="row col-md-6 justify-content-end">
          <a href="#"><button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button></a> &nbsp;
          <button type="submit" class="btn btn-primary" name="tambah">Tambah Verifikator</button>
        </div>
        <div>
  </div>
</form>
