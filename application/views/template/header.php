  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Makan Sehat</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="<?= base_url() ?>asset/corporate/assets/img/favicon.png" rel="icon">
    <link href="<?= base_url() ?>asset/corporate/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Vendor CSS Files -->
    <link href="<?= base_url() ?>asset/corporate/assets/vendor/animate.css/animate.min.css" rel="stylesheet">
    <link href="<?= base_url() ?>asset/corporate/assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="<?= base_url() ?>asset/corporate/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url() ?>asset/corporate/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="<?= base_url() ?>asset/corporate/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="<?= base_url() ?>asset/corporate/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="<?= base_url() ?>asset/corporate/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="<?= base_url() ?>asset/corporate/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="<?= base_url() ?>asset/corporate/assets/css/style.css" rel="stylesheet">

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>

    <!-- =======================================================
  * Template Name: Company - v4.7.0
  * Template URL: https://bootstrapmade.com/company-free-html-bootstrap-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
  </head>

  <body>

    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top">
      <div class="container d-flex align-items-center">

        <h1 class="logo me-auto"><a href="<?= site_url() ?>">Makan <span>Sehat</span></a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html" class="logo me-auto me-lg-0"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

        <nav id="navbar" class="navbar order-last order-lg-0">
          <ul>
            <li><a href="<?= site_url() ?>" class="">Home</a></li>
            <li><a href="<?= site_url('katering') ?>" class="">Katering</a></li>
            <li><a href="<?= site_url('menu') ?>" class="">Menu Sehat</a></li>
            <?php if ($this->session->isLogin == true) {
            ?>
              <li><a href="<?= site_url('transaksi') ?>" class="">Transaksi</a></li>
              <li class="dropdown"><a href="#"><span>Hello, <?= $this->session->nama_customer ?></span> <i class="bi bi-chevron-down"></i></a>
                <ul>
                  <li><a href="<?= site_url('profile/') ?>">Profile</a></li>
                  <li><a href="<?= site_url('login/logout') ?>">Logout</a></li>
                  </li>
                </ul>
              </li>
            <?php
            } else {
            ?>
              <li><a href="<?= site_url('login') ?>" class="">Login</a></li>
            <?php
            } ?>

          </ul>
          <i class="bi bi-list mobile-nav-toggle"></i>
        </nav><!-- .navbar -->

        <div class="header-social-links d-flex">
          <a href="#" class="twitter"><i class="bu bi-twitter"></i></a>
          <a href="#" class="facebook"><i class="bu bi-facebook"></i></a>
          <a href="#" class="instagram"><i class="bu bi-instagram"></i></a>
          <a href="#" class="linkedin"><i class="bu bi-linkedin"></i></i></a>
        </div>

      </div>
    </header><!-- End Header -->