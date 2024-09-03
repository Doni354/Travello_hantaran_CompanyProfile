<!-- Carousel Start -->
<div class="carousel">
    <div class="container-fluid">
        <div class="owl-carousel">
            <?php foreach ($tbslider as $key => $slider) : ?>
                <div class="carousel-item">
                    <div class="carousel-img">
                        <img class="lazyload" data-src="asset-user/images/<?= $slider->file_foto_slider; ?>" <?php foreach ($profil as $perusahaan) : ?> alt="<?= $perusahaan->nama_perusahaan; ?>" <?php endforeach; ?>>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
<!-- Carousel End -->

<style>
    /* Menyesuaikan ukuran panjang slider */
    .carousel .container-fluid {
        max-width: 100%; /* Mengatur panjang slider sedikit lebih kecil */
    }

    /* Menjaga ukuran gambar konsisten */
    .carousel-img img {
        width: 100%;
        height: auto; /* Menjaga aspek rasio gambar */
        object-fit: cover; /* Memastikan gambar memenuhi container tanpa merusak rasio */
    }

    .carousel-item {
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .carousel-img {
        width: 100%;
        height: 600px; /* Sesuaikan dengan tinggi yang diinginkan */
        overflow: hidden;
    }
</style>
