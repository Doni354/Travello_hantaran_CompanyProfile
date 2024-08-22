<?= $this->extend('user/template/template') ?>
<?= $this->Section('content'); ?>

<?= $this->include('user/home/slider'); ?>

<div class="about-title">
    <?php foreach ($profil as $title) :  ?>
        <h1><?= $title->title_website; ?></h1>
    <?php endforeach ?>
</div>

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
                        <a class="btn btn-custom" href="<?= base_url('about') ?>"><?php echo lang('Blog.btnReadmore'); ?></a>
                    </div>
                </div>
            </div>
        <?php endforeach ?>
    </div>
</div>
<!-- About End -->

<?php
// Fungsi untuk membandingkan dua objek berdasarkan ID
function compareById($a, $b)
{
    return $b->id_produk - $a->id_produk;
}

// Mengurutkan array berdasarkan ID
usort($tbproduk, 'compareById');

// Mengambil 2 data teratas
$latestProducts = array_slice($tbproduk, 0, 2);
?>

<!-- Product Start -->
<div class="team">
    <div class="container">
        <?php foreach ($latestProducts as $index => $product) : ?>
            <div class="row align-items-center mb-4">
                <?php if ($index % 2 == 0) : ?>
                    <!-- Product on the left side -->
                    <div class="col-lg-6">
                        <div class="product-image">
                            <img src="asset-user/images/<?= $product->foto_produk; ?>" alt="<?php if (lang('Blog.Languange') == 'en') {
                                                                                                echo $product->nama_produk_en;
                                                                                            } else {
                                                                                                echo $product->nama_produk_in;
                                                                                            } ?>">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="product-description">
                            <div class="section-header ">
                                <p>
                                    <?php if (lang('Blog.Languange') == 'en') {
                                        echo $product->nama_produk_en;
                                    } elseif (lang('Blog.Languange') == 'in') {
                                        echo $product->nama_produk_in;
                                    } ?>
                                </p>
                            </div>
                            <div class="about-content">
                                <p>
                                    <?php if (lang('Blog.Languange') == 'en') {
                                        echo $product->deskripsi_produk_en;
                                    } elseif (lang('Blog.Languange') == 'in') {
                                        echo $product->deskripsi_produk_in;
                                    } ?>
                                </p>
                            </div>
                            <div class="button-group">
                                <a href="<?= base_url('product/detail/' . $product->id_produk . '/' . url_title($product->nama_produk_en) . '_' . url_title($product->nama_produk_in)) ?>" class="btn btn-custom">View Product</a>
                            </div>
                        </div>
                    </div>
                <?php else : ?>
                    <!-- Product on the right side -->
                    <div class="col-lg-6">
                        <div class="product-description">
                            <div class="section-header text-left">
                                <p>
                                        <?php if (lang('Blog.Languange') == 'en') {
                                            echo $product->nama_produk_en;
                                        } elseif (lang('Blog.Languange') == 'in') {
                                            echo $product->nama_produk_in;
                                        } ?>
                                </p>
                            </div>
                            <div class="about-content">
                                <p>
                                    <?php if (lang('Blog.Languange') == 'en') {
                                        echo $product->deskripsi_produk_en;
                                    } elseif (lang('Blog.Languange') == 'in') {
                                        echo $product->deskripsi_produk_in;
                                    } ?>
                                </p>
                            </div>
                            <div class="button-group">
                                <a href="<?= base_url('product/detail/' . $product->id_produk . '/' . url_title($product->nama_produk_en) . '_' . url_title($product->nama_produk_in)) ?>" class="btn btn-custom">View Product</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="product-image">
                            <img src="asset-user/images/<?= $product->foto_produk; ?>" alt="<?php if (lang('Blog.Languange') == 'en') {
                                                                                                echo $product->nama_produk_en;
                                                                                            } else {
                                                                                                echo $product->nama_produk_in;
                                                                                            } ?>">
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        <?php endforeach; ?>
        <div class="text-center mt-5 mb-5">
            <a href="<?= base_url('product') ?>" class="btn btn-custom">View all Product</a>
        </div>
    </div>
</div>
<!-- Product End -->

<!-- News With Sidebar Start -->
<div class="container-fluid mt-5 pt-3">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h5 class="mb-2 px-3 py-1 text-dark rounded-pill d-inline-block border border-2 border-primary">Artikel Terbaru</h5>
                </div>
            </div>
        </div>
        <br>
        <br>
        <div class="row">
            <?php
            // Limit the number of articles to 3
            $limitedArtikel = array_slice($artikelterbaru, 0, 3);
            foreach ($limitedArtikel as $row) : ?>
                <div class="col-lg-4 mb-4">
                    <div class="position-relative d-flex flex-column h-100 mb-3">
                        <a href="<?= base_url('/artikel/detail/' . $row->id_artikel) ?>">
                            <img class="img-fluid w-100" style="object-fit: cover;" src="<?= base_url('asset-user') ?>/images/<?= $row->foto_artikel; ?>" loading="lazy">
                        </a>
                        <div class="bg-white border border-top-0 p-4 flex-grow-1">
                            <div class="mb-2">
                                <a class="text-uppercase mb-3 text-body"><?= date('d F Y', strtotime($row->created_at)); ?></a>
                            </div>
                            <a class="h4 display-5" href="<?= base_url('/artikel/detail/' . $row->id_artikel) ?>"><?= substr(strip_tags($row->judul_artikel), 0, 10) ?>...</a>
                            <p><?= substr(strip_tags($row->deskripsi_artikel), 0, 30) ?>...</p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
<!-- News With Sidebar End -->


<style>
    .about-title {
        margin-top: 10px;
    }

    .small-content {
        max-width: 80%;
        /* Atur sesuai kebutuhan */
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
        /* Sesuaikan sesuai kebutuhan */
    }

    .team {
        background-color: gainsboro;
    }
</style>

<?= $this->endSection('content') ?>