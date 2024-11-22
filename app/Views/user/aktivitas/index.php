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
<!-- Aktivitas Start -->
<div class="container-fluid mt-5 pt-3">
    <div class="container">
    <div class="section-header text-center">
            <p class="display-4 font-weight-bold"><?php echo lang('Blog.newsActivities') ?></p>
        </div>
        <div class="row">
            <?php foreach ($tbaktivitas as $aktivitas) : ?>
                <div class="col-lg-4 mb-4">
                    <div class="position-relative d-flex flex-column h-100 produk-card">
                        <a href="<?= base_url('activities/detail/' . $aktivitas->id_aktivitas . '/' . url_title($aktivitas->nama_aktivitas_en) . '_' . url_title($aktivitas->nama_aktivitas_in)) ?>" class="produk-link">
                            <img class="img-fluid w-100" style="object-fit: cover; border-top-left-radius: 20px; border-top-right-radius: 20px;" src="/asset-user/images/<?= $aktivitas->foto_aktivitas ?>" alt="<?php if (lang('Blog.Languange') == 'en') {
                                                                                                                                                                                echo $aktivitas->nama_aktivitas_en;
                                                                                                                                                                            } else if (lang('Blog.Languange') == 'in') {
                                                                                                                                                                                echo $aktivitas->nama_aktivitas_in;
                                                                                                                                                                            } ?>" loading="lazy">
                            <div class="bg-white border border-top-0 p-4 flex-grow-1 produk-content">
                                <h4 class="display-5 produk-title">
                                    <?php if (lang('Blog.Languange') == 'en') {
                                        echo strip_tags($aktivitas->nama_aktivitas_en);
                                    } ?>
                                    <?php if (lang('Blog.Languange') == 'in') {
                                        echo strip_tags($aktivitas->nama_aktivitas_in);
                                    } ?>
                                </h4>
                            </div>
                        </a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
<!-- Aktivitas End -->

<style>
    .section-title h5 {
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .produk-card {
        transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
        border-radius: 20px;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
        overflow: hidden;
        /* Ensure content fits within the border-radius */
    }

    .produk-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.3);
    }

    .produk-content {
        transition: background-color 0.3s ease-in-out;
    }

    .produk-card:hover .produk-content {
        background-color: #202C45;
    }

    .produk-title {
        transition: color 0.3s ease-in-out;
        cursor: pointer;
        /* Add pointer cursor to indicate interactivity */
    }

    .produk-card:hover .produk-title {
        color: #202C45;
        /* Change color on hover */
        text-decoration: underline;
        /* Optional: add underline on hover */
    }

    .text-primary {
        color: #6c757d !important;
    }

    .text-muted {
        color: #6c757d !important;
    }

    .produk-link {
        text-decoration: none;
        color: inherit;
        /* Maintain original text color */
    }
</style>

<!-- Product End -->

<?= $this->endSection('content'); ?>