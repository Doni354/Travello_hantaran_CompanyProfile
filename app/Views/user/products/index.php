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
                            <?php echo lang('Blog.titleOurproducts');
                            if (!empty($perusahaan)) {
                                echo ' ' . $perusahaan->nama_perusahaan;
                            } ?>
                        </h2>
                    </div>
                    <div class="col-12">
                        <p class="text-shadow">
                            <a href="<?= base_url('/') ?>"><?php echo lang('Blog.headerHome');  ?></a>
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

<!-- Product Start -->
<div class="blog">
    <div class="container">
        <div class="row">
            <?php foreach ($tbproduk as $produk) : ?>
                <div class="col-lg-4">
                    <div class="blog-item">
                        <div class="blog-img">
                            <a href="<?= base_url('product/detail/' . $produk->id_produk . '/' . url_title($produk->nama_produk_en) . '_' . url_title($produk->nama_produk_in)) ?>">
                                <img data-src="asset-user/images/<?= $produk->foto_produk ?>" alt="<?php if (lang('Blog.Languange') == 'en') {
                                                                                                        echo $produk->nama_produk_en;
                                                                                                    } ?>
                                    <?php if (lang('Blog.Languange') == 'in') {
                                        echo $produk->nama_produk_in;
                                    } ?>" class="lazyload">
                            </a>
                        </div>
                        <div class="blog-text">
                            <h3>
                                <a href="<?= base_url('product/detail/' . $produk->id_produk . '/' . url_title($produk->nama_produk_en) . '_' . url_title($produk->nama_produk_in)) ?>">
                                    <?php if (lang('Blog.Languange') == 'en') {
                                        echo $produk->nama_produk_en;
                                    } ?>
                                    <?php if (lang('Blog.Languange') == 'in') {
                                        echo $produk->nama_produk_in;
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