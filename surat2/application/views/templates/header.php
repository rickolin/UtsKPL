<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="<?php /* @noEscape */ echo base_url().'assets/css/styles.css'?>" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" />
    <link href="<?php /* @noEscape */ echo base_url().'assets/css/sb-admin-2.min.css'?>" rel="stylesheet">
    <link href="<?php /* @noEscape */ echo base_url().'assets/vendor/fontawesome-free/css/all.min.css'?>" rel="stylesheet">
    <link href="<?php /* @noEscape */ echo base_url().'assets/css/css/bootstrap-datepicker3.css'?>" rel="stylesheet">
    <title><?= $judul ?></title>
    <link rel="shortcut icon" type="image/png" href="assets/gambar/jt.png">
  </head>
<body style="background-color:#d3f3c8 ">
<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #032d38">
  <a class="navbar-brand" data-toggle="tooltip" data-placement="bottom" title="Registrasi" href="<?php /* @noEscape */ echo base_url().'FormInputSuratController'?>">Surat</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <?php if($this->session->userdata('akses')=='admin'):?>
        <?php if($where == 'DashboardAdminController' ): ?>
        <li class="nav-item active">
        <?php else: ?>
          <li class="nav-item">
        <?php endif; ?>
        <a class="nav-link" href="<?php /* @noEscape */ echo base_url().'DashboardAdminController'?>">Home <span class="sr-only">(current)</span></a>
        </li>
        <?php if($where == 'ListVerifikatorController' ): ?>
        <li class="nav-item active">
        <?php else: ?>
          <li class="nav-item">
        <?php endif; ?>
        <a class="nav-link" href="<?php /* @noEscape */ echo base_url().'ListVerifikatorController'?>">Verifikator <span class="sr-only">(current)</span></a>
        </li>
      <?php endif; ?>

      <?php if($where == 'SuratMasukController' ): ?>
        <li class="nav-item active">
      <?php else: ?>
        <li class="nav-item">
      <?php endif; ?>
      <a class="nav-link" href="<?php /* @noEscape */ echo base_url().'SuratMasukController'?>">Registrasi&nbsp;
        <?php if($where != 'SuratMasukController' && $surat_masuk >0): ?>
          <span class="badge badge-danger badge-counter">
            <?php if($surat_masuk <= 5){
              /* @noEscape */ echo $surat_masuk;
              }else{
                /* @noEscape */ echo "5+";
              }
            ?> 
          </span>
        <?php endif; ?>
      </a>
      </li>

      <?php if($where == 'SuratTerverifikasiController'):?>
      <li class="nav-item active">
        <?php else: ?>
        <li class="nav-item">
      <?php endif; ?>
      <a class="nav-link" href="<?php /* @noEscape */ echo base_url().'SuratTerverifikasiController'?>">Surat Terverifikasi</a>
      </li>   

      <?php if($where == 'verifikasi'): ?>
        <li class="nav-item active">
        <a class="nav-link" href="#">Form Verifikasi Surat</a>
        </li>
      <?php elseif($where=='edit') : ?>
        <li class="nav-item active">
        <a class="nav-link" href="#">Edit</a>
        </li>
      <?php elseif($where=='TambahVerifikatorController') : ?>
        <li class="nav-item active">
        <a class="nav-link" href="#">Tambah Verifikator</a>
        </li>
      <?php elseif($where=='rekap') : ?>
        <li class="nav-item active">
        <a class="nav-link" href="#">Rekap Verifikator</a>
        </li>
      <?php endif; ?>
    </ul>
    <?php if ($this->session->userdata('masuk') != TRUE) : ?>
    <form class="form-inline my-2 my-lg-0" action="<?php /* @noEscape */ echo base_url().'index.php/LoginController/auth'?>" method="post">
      <?php if($this->session->flashdata('harus_login')): ?>
      <input type="text" id="username" name="username" class="form-control mr-sm-2" placeholder="Username" required autofocus>
      <?php else: ?>
      <input type="text" id="username" name="username" class="form-control mr-sm-2" placeholder="Username" required>
      <?php endif; ?>
      <input type="password" id="password" name="password" class="form-control mr-sm-2" placeholder="Password" required>
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit" style="width: 100px;">Login</button>
    </form>
    <?php else : ?>
      <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <span class="mr-2 d-none d-lg-inline font-weight-bold text-monospace"><?= $this->session->userdata('ses_nama'); ?> ||</span>
          <i class="fas fa-user-shield"></i>
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="<?php /* @noEscape */ echo base_url().'GantiPassController'?>">
            <i class="fas fa-key fa-sm fa-fw mr-2 text-gray-400"></i>
            Ganti Password
            </a>
            <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
              </a>
        </div>
      </li>
      </ul>
    <?php endif; ?>
  </div>
  <ul class="navbar-nav">
      <li class="nav-item dropdown no-arrow">
        <button onclick="window.history.back()" class="btn" data-toggle="tooltip" data-placement="bottom" title=" Kembali"><i class="fas fa-backward fa-2x" style="color: white"></i></button>
      </li>
  </ul>
</nav>
<?php if($this->session->flashdata('msg')): ?>
  <div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong> <?= $this->session->flashdata('msg'); ?></strong>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
<?php endif; ?>

<?php if($this->session->flashdata('harus_login')): ?>
  <div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong> <?= $this->session->flashdata('harus_login'); ?></strong>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
<?php endif; ?>


<!-- Ini untuk Logout Modal -->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Anda Yakin Untuk Logout?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Pilih "Logout" Dibawah Ini Untuk Mengakhiri Session Anda.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a href="<?php /* @noEscape */ echo base_url().'index.php/LogoutController'?>" class="btn btn-primary">Logout</a>
        </div>
      </div>
    </div>
</div>