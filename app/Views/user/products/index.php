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
<div class="team">
    <div class="container">
    <div class="section-header text-center">
            <p class="display-4 font-weight-bold"><?php echo lang('Blog.btnOurproducts') ?></p>
        </div>
        <?php foreach ($tbproduk as $index => $produk) : ?>
            <div class="row justify-content-center mb-4">
                <div class="col-lg-12">
                    <div class="card product-card">
                        <div class="background-container" style="border-radius: 20px; background-image: url('asset-user/images/<?= $produk->foto_produk; ?>');"></div>
                        <div class="overlay"></div> <!-- Overlay for better readability -->
                        <div class="row no-gutters align-items-center">
                            <?php if ($index % 2 == 0) : ?>
                                <!-- Image on the left side -->
                                <div class="col-lg-6 text-center">
                                    <div class="card-img">
                                        <img src="/asset-user/images/<?= $produk->foto_produk; ?>" class="card-img-top" alt="<?php if (lang('Blog.Languange') == 'en') {
                                                                                                                                    echo $produk->nama_produk_en;
                                                                                                                                } else {
                                                                                                                                    echo $produk->nama_produk_in;
                                                                                                                                } ?>" width="572" height="572">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="card-body text-center">
                                        <div class="section-header">
                                            <p>
                                                <?php if (lang('Blog.Languange') == 'en') {
                                                    echo $produk->nama_produk_en;
                                                } elseif (lang('Blog.Languange') == 'in') {
                                                    echo $produk->nama_produk_in;
                                                } ?>
                                            </p>
                                        </div>
                                        <div class="about-content">
                                            <p>
                                                <?php
                                                $desc = (lang('Blog.Languange') == 'en') ? $produk->deskripsi_produk_en : $produk->deskripsi_produk_in;
                                                echo strlen($desc) > 150 ? substr($desc, 0, 150) . "..." : $desc;
                                                ?>
                                            </p>
                                        </div>
                                        <div class="button-group">
                                            <a href="<?= base_url($locale . '/' . ($locale === 'en' ? 'product' : 'produk') . '/' . (($locale === 'en') ? $produk->slug_en : $produk->slug_in)) ?>" class="btn btn-custom"><?php echo lang('Blog.btnReadmore'); ?></a>
                                        </div>
                                    </div>
                                </div>
                            <?php else : ?>
                                <!-- Image on the right side -->
                                <div class="col-lg-6 order-lg-2 text-center">
                                    <div class="card-img">
                                        <img src="/asset-user/images/<?= $produk->foto_produk; ?>" class="card-img-top" alt="<?php if (lang('Blog.Languange') == 'en') {
                                                                                                                                    echo $produk->nama_produk_en;
                                                                                                                                } else {
                                                                                                                                    echo $produk->nama_produk_in;
                                                                                                                                } ?>" width="572" height="572">
                                    </div>
                                </div>
                                <div class="col-lg-6 order-lg-1">
                                    <div class="card-body text-center">
                                        <div class="section-header">
                                            <p>
                                                <?php if (lang('Blog.Languange') == 'en') {
                                                    echo $produk->nama_produk_en;
                                                } elseif (lang('Blog.Languange') == 'in') {
                                                    echo $produk->nama_produk_in;
                                                } ?>
                                            </p>
                                        </div>
                                        <div class="about-content">
                                            <p>
                                                <?php
                                                $desc = (lang('Blog.Languange') == 'en') ? $produk->deskripsi_produk_en : $produk->deskripsi_produk_in;
                                                echo strlen($desc) > 150 ? substr($desc, 0, 150) . "..." : $desc;
                                                ?>
                                            </p>
                                        </div>
                                        <div class="button-group">
                                            <a href="<?= base_url($locale . '/' . ($locale === 'en' ? 'product' : 'produk') . '/' . (($locale === 'en') ? $produk->slug_en : $produk->slug_in)) ?>" class="btn btn-custom"><?php echo lang('Blog.btnReadmore'); ?></a>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
<!-- Product End -->

<!-- Add your custom CSS -->
<style>
    .product-card {
        border: none;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
        overflow: hidden;
        position: relative;
        color: white;
        padding: 0 30px;
        border-radius: 20px;
    }

    .product-card .background-container {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-size: cover;
        background-position: center;
        z-index: 0;
    }

    .product-card .overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(255, 255, 255, 0.85);
        z-index: 1;
        border-radius: 20px;
    }

    .product-card .card-body {
        padding: 30px;
        z-index: 2;
        position: relative;
        text-align: center;
    }

    .product-card .card-img-top {
        width: 100%;
        max-width: 572px;
        height: auto;
        object-fit: cover;
        border-radius: 20px;
        position: relative;
        z-index: 2;
    }

    .section-header p {
        font-size: 28px;
        font-weight: bold;
        margin-bottom: 20px;
        position: relative;
        z-index: 2;
    }

    .about-content p {
        font-size: 18px;
        margin-bottom: 25px;
        color: #333;
        position: relative;
        z-index: 2;
    }

    .btn-custom {
        background-color: #007bff;
        color: white;
        padding: 12px 25px;
        text-transform: uppercase;
        font-weight: bold;
        border: none;
        cursor: pointer;
        display: inline-block;

        position: relative;
        z-index: 2;
    }

    .btn-custom:hover {
        background-color: #0056b3;
    }

    .about-title {
        margin-top: 10px;
    }

    .small-content {
        max-width: 80%;
        margin: 0 auto;
    }

    .product-image img {
        max-width: 100%;
        height: auto;
    }

    .row {
        display: flex;
        flex-wrap: wrap;
    }

    .col-lg-6 {
        flex: 1;
        padding: 30px;
    }

    .product-image,
    .product-description {
        max-width: 90%;
    }

    
</style>




<?= $this->endSection('content'); ?>