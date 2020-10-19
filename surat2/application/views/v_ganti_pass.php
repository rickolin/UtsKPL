
<?php if($this->session->flashdata('flash')): ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
      <strong><?= $this->session->flashdata('flash'); ?></strong>      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
  <?php endif; ?>
<form action="" method="post">
        <div class="modal-body">
          <div class="container-fluid">
            <h1 class="h3 mb-0 text-gray-800">Ganti Password</h1><br>
            

              <div class="form-group row col-md-6">
                <label for=""><h6 class="font-weight-bold">Password Lama</h6></label>
                <input type="password" class="form-control" name="pass_lama" id="pass_lama" autocomplete="off">
                <?php if (form_error('pass_lama')): ?>
                          <div class="alert alert-danger" role="alert">
                          <?= form_error('pass_lama'); ?>                      
                          </div>
                <?php endif; ?>
              </div>
          
              <div class="form-group row col-md-6">
                <label for=""><h6 class="font-weight-bold">Password Baru</h6></label>
                <input type="password" class="form-control" name="pass_baru" id="pass_baru">
                <?php if (form_error('pass_baru')): ?>
                          <div class="alert alert-danger" role="alert">
                    
                          <?= form_error('pass_baru'); ?>                     
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
          <a href="<?= base_url(); ?>DashboardAdminController"><button type="button" class="btn btn-secondary">Cancel</button></a> &nbsp;
          <button type="submit" class="btn btn-primary" name="tambah">Ganti Password</button>
        </div>
        <div>
  </div>
</form>
