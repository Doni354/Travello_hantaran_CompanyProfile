<?= $this->extend('user/template/template') ?>
<?= $this->Section('content'); ?>

<!-- Page Header Start -->
<div class="page-header" style="background-image: url('asset-user/images/hero_1.jpg');">
    <div class="container-center">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2 class="text-shadow"><?php echo lang('Blog.titleAboutUs'); ?></h2>
                </div>
                <div class="col-12">
                    <p class="text-shadow">
                        <a href="<?= base_url('/') ?>"><?php echo lang('Blog.headerHome'); ?></a>
                        <a href="#"><?php echo lang('Blog.headerAbout'); ?></a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Page Header End -->
<br>
<br>

<!-- About Start -->
<div class="about">
    <div class="container">
        <?php foreach ($profil as $descper) : ?>
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="about-img">
                        <img class="lazyload" data-src="asset-user/images/<?= $descper->foto_utama; ?>" <?php foreach ($profil as $perusahaan) :  ?>alt="<?= $perusahaan->nama_perusahaan; ?>" <?php endforeach; ?>>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="section-header text-left">
                        <p><?php echo lang('Blog.titleAboutUs')  ?></p>
                        <h2><?= $descper->nama_perusahaan; ?></h2>
                    </div>
                    <div class="about-content">
                        <p>
                            <?php if (lang('Blog.Languange') == 'en') {
                                echo character_limiter($descper->deskripsi_perusahaan_en, 700);
                            } ?>
                            <?php if (lang('Blog.Languange') == 'in') {
                                echo character_limiter($descper->deskripsi_perusahaan_in, 700);
                            } ?>
                        </p>
                    </div>
                </div>
            </div>
        <?php endforeach ?>
    </div>
</div>
<!-- About End -->


<?= $this->endSection('content'); ?>