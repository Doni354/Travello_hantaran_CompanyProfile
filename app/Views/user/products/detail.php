<?= $this->extend('user/template/template') ?>
<?= $this->Section('content'); ?>

<!-- Page Header Start -->
<div class="page-header" style="background-image: url(<?= base_url('asset-user/images/hero_1.jpg'); ?>);">
    <div class="container-center">
        <div class="container">
            <div class="row">
                <?php foreach ($profil as $perusahaan) : ?>
                    <div class="col-12">
                        <h2 class="text-shadow">
                            <?php echo lang('Blog.titleOurproducts');
                            if (!empty($perusahaan)) {
                                echo ' ' . $perusahaan->nama_perusahaan;
                            } ?>
                        </h2>
                    </div>
                    <div class="col-12">
                        <p class="text-shadow">
                            <a href="<?= base_url('user/home') ?>"><?php echo lang('Blog.headerHome');  ?></a>
                            <a href="#"><?php echo lang('Blog.headerProducts'); ?></a>
                        </p>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>
<!-- Page Header End -->
<br>

<div class="about">
    <div class="container">
        <?php foreach ($profil as $descper) : ?>
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="about-img">
                        <img class="lazyload" data-src="/asset-user/images/<?= $tbproduk->foto_produk ?>" alt="<?php if (lang('Blog.Languange') == 'en') {
                                                                                                                    echo $tbproduk->nama_produk_en;
                                                                                                                } ?>
                                    <?php if (lang('Blog.Languange') == 'in') {
                                        echo $tbproduk->nama_produk_in;
                                    } ?>">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="section-header text-left">
                        <p><b>
                                <?php if (lang('Blog.Languange') == 'en') {
                                    echo $tbproduk->nama_produk_en;
                                } elseif (lang('Blog.Languange') == 'in') {
                                    echo $tbproduk->nama_produk_in;
                                } ?>
                            </b></p>
                    </div>
                    <div class="about-content">
                        <p>
                            <?php if (lang('Blog.Languange') == 'en') {
                                echo $tbproduk->deskripsi_produk_en;
                            } elseif (lang('Blog.Languange') == 'in') {
                                echo $tbproduk->deskripsi_produk_in;
                            } ?>
                        </p>
                    </div>
                </div>
            </div>
        <?php endforeach ?>
    </div>
</div>

<?= $this->endSection('content'); ?>