<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="Free Website Template" name="keywords">
  <meta content="<?php echo $Meta; ?>" name="description">
  <title><?php echo $Title; ?> | <?php foreach ($profil as $header) :  ?><?= $header->nama_perusahaan ?><?php endforeach;  ?></title>

  <!-- Favicon -->
  <?php foreach ($profil as $perusahaan) : ?>
    <link href="<?= base_url('asset-user/images/'. $perusahaan->favicon_website) ?>" <?= $perusahaan->favicon_website ?> rel="icon">
  <?php endforeach; ?>

  <!-- Google Font -->
  <link href="https://fonts.googleapis.com/css2?family=Barlow:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">

  <!-- CSS Libraries -->
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
  <link href="<?= base_url('asset-user') ?>/lib/flaticon/font/flaticon.css" rel="stylesheet">
  <link href="<?= base_url('asset-user') ?>/lib/animate/animate.min.css" rel="stylesheet">
  <link href="<?= base_url('asset-user') ?>/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

  <!-- Template Stylesheet -->
  <link href="<?= base_url('asset-user') ?>/css/style.css" rel="stylesheet">
</head>

<body>
  <?= $this->include('user/layout/header'); ?>

  <!-- render halaman konten -->
  <?= $this->renderSection('content'); ?>

  <!-- footer -->
  <?= $this->include('user/layout/footer');  ?>

  <!-- Back to top button -->
  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

  <!-- icon wa -->
  <?php foreach ($profil as $iconwa) : ?>
    <a class="whats-app" href="<?= $iconwa->link_whatsapp ?>" target="_blank">
      <img src="<?= base_url('asset-user/images/whatsapp.png'); ?>" alt="Whatsapp" width="44" height="44">
    </a>
  <?php endforeach; ?>


  <!-- Pre Loader -->
  <div id="loader" class="show">
    <div class="loader"></div>
  </div>

  <!-- JavaScript Libraries -->
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
  <script src="<?= base_url('asset-user') ?>/lib/easing/easing.min.js"></script>
  <script src="<?= base_url('asset-user') ?>/lib/owlcarousel/owl.carousel.min.js"></script>
  <script src="<?= base_url('asset-user') ?>/lib/waypoints/waypoints.min.js"></script>
  <script src="<?= base_url('asset-user') ?>/lib/counterup/counterup.min.js"></script>

  <!-- Contact Javascript File -->
  <script src="<?= base_url('asset-user') ?>/mail/jqBootstrapValidation.min.js"></script>
  <script src="<?= base_url('asset-user') ?>/mail/contact.js"></script>

  <!-- Template Javascript -->
  <script src="<?= base_url('asset-user') ?>/js/main.js"></script>
  <script src="<?= base_url('asset-user') ?>/js/lazysizes.min.js"></script>

  <!-- membuat halaman aktif -->
  <script>
    // Ambil URL halaman saat ini
    var currentURL = window.location.href;

    // Dapatkan daftar semua elemen <a> di dalam navbar
    var menuLinks = document.querySelectorAll(".navbar-nav a.nav-link");

    // Loop melalui setiap tautan menu untuk menandai halaman aktif
    for (var i = 0; i < menuLinks.length; i++) {
      var menuLink = menuLinks[i];

      // Normalisasi URL untuk memastikan kecocokan yang akurat
      var normalizedMenuURL = menuLink.href.split("?")[0]; // Hilangkan parameter query
      if (currentURL === normalizedMenuURL) {
        menuLink.classList.add("active");
        break;
      }
    }
  </script>

  <!-- ikon WhatsApp otomatis menghilang saat halaman digulir ke atas -->
  <script>
    // Ambil elemen ikon WhatsApp
    var whatsAppIcon = document.querySelector('.whats-app');

    // Tambahkan event listener ke peristiwa scroll
    window.addEventListener('scroll', function() {
      // Tentukan aturan kapan ikon harus ditampilkan atau disembunyikan
      if (window.scrollY > 100) { // Ganti angka 100 dengan posisi scroll yang sesuai
        // Tampilkan ikon WhatsApp
        whatsAppIcon.style.display = 'block';
      } else {
        // Sembunyikan ikon WhatsApp
        whatsAppIcon.style.display = 'none';
      }
    });
  </script>
</body>

</html>