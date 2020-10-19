<!DOCTYPE html>
<html lang="en">

<head>
    <!--- Basic Page Needs  -->
    <meta charset="utf-8">
    <title>Halaman Utama</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Mobile Specific Meta  -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <!-- CSS -->
    <link rel="stylesheet" href="assets/css/css1/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/css1/landing_page.css">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/png" href="assets/gambar/jt.png">
</head>

<body style="margin-left:40px; margin-right:40px;">
    <div class="row" style="text-align: center;">
    <h1 style="color: black"><img src="<?php echo base_url().'assets/gambar/jt.png'?>"> &nbsp; Sistem Informasi Pendataan Penyediaan Barang/Jasa Jawa Tengah</h1>
    </div>
    <hr style="background-color: black">
    <div class="row">
    <div class="col-md-5">
            <div class="col-md-12 col-sm-12 col-xs-12" style="justify-content: center;">
                <div class="service-single1" style="min-height: 500px">
                    <?php if ($this->session->userdata('masuk')!=TRUE) : ?>
                        <img src="assets/service/4.png" width="200" height="150" alt="service image">
                        <h2>Login Akun</h2>
                        <p style="color: black">Masukkan Username dan Password untuk Login</p>  
                            <form class="form-signin" action="<?php echo base_url().'index.php/LoginController/auth'?>" method="post">
                                <span style="color:red;"><?php echo $this->session->flashdata('msg');?></span>
                                <span style="color:red;"><?php echo $this->session->flashdata('msg1');?></span>
                                <span style="color:red;"><?php echo $this->session->flashdata('msg2');?></span>
                                <div class="col-md-12 col-sm-12 col-xs-12" style="justify-content: center; z-index: 1;">
                                <label for="username" class="sr-only">NIP</label>
                                <input style="margin-top:10px;" type="text" id="username" name="username" class="form-control" placeholder="Username" required autofocus>
                                <label for="password" class="sr-only">Password</label>
                                <input style="margin-top:10px;" type="password" id="password" name="password" class="form-control" placeholder="Password" required>
                                <button class="btn btn-lg btn-success btn-block btn-sm" type="submit" style="width: 100px; margin-top:10px; ">Login</button>
                                </div>
                            </form>
                    <?php else : ?>
                        <img src="assets/service/4.png" width="200" height="150" alt="service image">
                        <h2>Selamat Datang, <strong><?= $this->session->userdata('ses_nama'); ?></strong></h2>
                    <?php endif ; ?>           
                </div>
            </div>
        </div>
        
        <div class="col-md-7">
            <div class="row" style="text-align: center;">
                <h3 style="color: black"> Pendataan Penyedia Barang / Jasa</h3>
            </div>
           <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="service-single" style="min-height: 370px">
                    <a href="<?php echo base_url().'FormInputSuratController'?>">
                    <img src="assets/service/1.png" width="200" height="150" alt="service image">
                    <h2>Input Data Penyedia Barang/Jasa</h2>
                    <p>Form Registrasi Penyedia untuk Pengajuan Penyediaan Barang dan Jasa</p>
                    </a>                    
                </div>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="service-single" style="min-height: 370px">
                    <?php if($this->session->userdata('akses')=='admin'):?>
                        <a href="<?php echo base_url().'DashboardAdminController'?>">
                    <?php else: ?>
                        <a href="<?php echo base_url().'SuratMasukController'?>">
                    <?php endif; ?>
                    <img src="assets/service/2.png" width="200" height="150" alt="service image">
                    <h2>Pendataan  Penyedia Barang/Jasa</h2>
                    <p>Daftar Registrasi Penyedia untuk Pengajuan Penyediaan Barang dan Jasa</p>
                    </a>
                </div>
            </div>
        </div>
    </div>
        
    
    <!-- Scripts -->
    <script src="assets/js/jquery-3.2.0.min.js"></script>
    <script src="assets/js/jquery-ui.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery.slicknav.min.js"></script>
    <script src="assets/js/owl.carousel.min.js"></script>
    <script src="assets/js/magnific-popup.min.js"></script>
    <script src="assets/js/counterup.js"></script>
    <script src="assets/js/jquery.waypoints.min.js"></script>
    <script src="assets/js/jquery.mb.YTPlayer.min.js"></script>
    <script src="assets/js/warm-canvas.js"></script>
    <script src="assets/js/theme.js"></script>
</body>

</html>