<?= $this->extend('user/template/template') ?>
<?= $this->Section('content'); ?>

<!-- Page Header Start -->
<div class="page-header" style="background-image: url('<?= base_url('asset-user/images/hero_1.jpg'); ?>');">
    <div class="container-center">
        <div class="container">
            <div class="row">
                <?php foreach ($profil as $perusahaan) : ?>
                    <div class="col-12">
                        <h2 class="text-shadow">
                            <?php echo lang('Blog.titleActivities');
                            if (!empty($perusahaan)) {
                                echo ' ' . $perusahaan->nama_perusahaan;
                            } ?>
                        </h2>
                    </div>
                    <div class="col-12">
                        <p class="text-shadow">
                            <a href="<?= base_url('/') ?>"><?php echo lang('Blog.headerHome');  ?></a>
                            <a href="#"><?php echo lang('Blog.titleActivities');  ?></a>
                        </p>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>
<!-- Page Header End -->
<br>
<!-- Product Start -->
<div class="blog">
    <div class="container">
        <div class="row">
            <?php foreach ($tbaktivitas as $aktivitas) : ?>
                <div class="col-lg-4">
                    <div class="blog-item">
                        <div class="blog-img">
                            <a href="<?= base_url('activities/detail/' . $aktivitas->id_aktivitas . '/' . url_title($aktivitas->nama_aktivitas_en) . '_' . url_title($aktivitas->nama_aktivitas_in)) ?>" class="img-link">
                                <img data-src="asset-user/images/<?= $aktivitas->foto_aktivitas ?>" alt="Gambar Produk" class="lazyload">
                            </a>
                        </div>
                        <div class="blog-text">
                            <h3>
                                <a href="<?= base_url('activities/detail/' . $aktivitas->id_aktivitas . '/' . url_title($aktivitas->nama_aktivitas_en) . '_' . url_title($aktivitas->nama_aktivitas_in)) ?>">
                                    <?php if (lang('Blog.Languange') == 'en') {
                                        echo $aktivitas->nama_aktivitas_en;
                                    } ?>
                                    <?php if (lang('Blog.Languange') == 'in') {
                                        echo $aktivitas->nama_aktivitas_in;
                                    } ?>
                                </a>
                            </h3>
                        </div>
                    </div>
                </div>
            <?php endforeach ?>
        </div>
    </div>
</div>
<!-- Product End -->

<?= $this->endSection('content'); ?>