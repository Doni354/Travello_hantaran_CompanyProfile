<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>
    <?=
      session()->get('lang') === 'id'
      ? ($tbproduk->meta_title_id ?? $tbaktivitas->meta_title_id ?? $artikel->meta_title_id ?? $meta['meta_title_id'] ?? 'Judul Standar Bahasa Indonesia')
      : ($tbproduk->meta_title_en ?? $tbaktivitas->meta_title_en ?? $artikel->meta_title_en ?? $meta['meta_title_en'] ?? 'Default English Title');
    ?>
  </title>

  <!-- Meta Tags -->
  <meta name="title" content="<?= 
        session()->get('lang') === 'id' 
        ? ($tbproduk->meta_title_id ?? $tbaktivitas->meta_title_id ?? $artikel->meta_title_id ?? $meta['meta_title_id'] ?? 'Judul Standar Bahasa Indonesia') 
        : ($tbproduk->meta_title_en ?? $tbaktivitas->meta_title_en ?? $artikel->meta_title_en ?? $meta['meta_title_en'] ?? 'Default English Title'); 
    ?>">
  <meta name="description" content="<?= 
        session()->get('lang') === 'id' 
        ? ($tbproduk->meta_description_id ?? $tbaktivitas->meta_description_id ?? $artikel->meta_description_id ?? $meta['meta_description_id'] ?? 'Deskripsi Standar Bahasa Indonesia') 
        : ($tbproduk->meta_description_en ?? $tbaktivitas->meta_description_en ?? $artikel->meta_description_en ?? $meta['meta_description_en'] ?? 'Default English Description'); 
  ?>">

    <!-- Favicon -->
    <?php foreach ($profil as $perusahaan) : ?>
        <link rel="shortcut icon" href="<?= base_url('asset-user/images/') ?><?= $perusahaan->favicon_website ?>">
    <?php endforeach; ?>

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Playfair+Display:wght@700;900&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="<?= base_url('asset-user') ?>/lib/animate/animate.min.css" rel="stylesheet">
    <link href="<?= base_url('asset-user') ?>/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="<?= base_url('asset-user') ?>/css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="<?= base_url('asset-user') ?>/css/style.css" rel="stylesheet">
</head>

<body>
    <!-- Header -->
    <?= $this->include('user/layout/header'); ?>

    <!-- Navbar -->
    <?= $this->include('user/layout/nav'); ?>



    <!-- render halaman konten -->
    <?= $this->renderSection('content'); ?>

    <!-- Footer -->
    <?= $this->include('user/layout/footer'); ?>

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

    <style>
        .whats-app:hover {
            transform: scale(1.1);
        }
    </style>

    <!-- JavaScript Libraries -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url('asset-user') ?>/lib/wow/wow.min.js"></script>
    <script src="<?= base_url('asset-user') ?>/lib/easing/easing.min.js"></script>
    <script src="<?= base_url('asset-user') ?>/lib/waypoints/waypoints.min.js"></script>
    <script src="<?= base_url('asset-user') ?>/lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="<?= base_url('asset-user') ?>/js/jquery-3.3.1.min.js"></script>
    <script src="<?= base_url('asset-user') ?>/js/jquery-migrate-3.0.1.min.js"></script>
    <script src="<?= base_url('asset-user') ?>/js/jquery-ui.js"></script>
    <script src="<?= base_url('asset-user') ?>/js/popper.min.js"></script>
    <script src="<?= base_url('asset-user') ?>/js/bootstrap.min.js"></script>
    <script src="<?= base_url('asset-user') ?>/js/owl.carousel.min.js"></script>
    <script src="<?= base_url('asset-user') ?>/js/jquery.stellar.min.js"></script>
    <script src="<?= base_url('asset-user') ?>/js/jquery.countdown.min.js"></script>
    <script src="<?= base_url('asset-user') ?>/js/bootstrap-datepicker.min.js"></script>
    <script src="<?= base_url('asset-user') ?>/js/jquery.easing.1.3.js"></script>
    <script src="<?= base_url('asset-user') ?>/js/aos.js"></script>
    <script src="<?= base_url('asset-user') ?>/js/jquery.fancybox.min.js"></script>
    <script src="<?= base_url('asset-user') ?>/js/jquery.sticky.js"></script>
    <script src="<?= base_url('asset-user') ?>/js/jquery.mb.YTPlayer.min.js"></script>
    <script src="<?= base_url('asset-user') ?>/js/lazysizes.min.js"></script>

    <!-- Template Javascript -->
    <script src="<?= base_url('asset-user') ?>/js/main.js"></script>
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

