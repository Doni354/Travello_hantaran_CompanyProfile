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
                            <?php echo lang('Blog.titleOurarticle');
                            if (!empty($perusahaan)) {
                                echo ' ' . $perusahaan->nama_perusahaan;
                            } ?></h3>
                        <?php endforeach; ?>
                        </h2>
                    </div>
                    <div class="col-12">
                        <p class="text-shadow">
                            <a href="<?= base_url('/') ?>"><?php echo lang('Blog.headerHome');  ?></a>
                            <a href="#"><?php echo lang('Blog.headerArticle');  ?></a>
                        </p>
                    </div>
            </div>
        </div>
    </div>
</div>
<!-- Page Header End -->

<!-- News With Sidebar Start -->
<div class="container-fluid mt-5 pt-3">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title text-center">
                    <h5 class="mb-2 px-3 py-1  rounded-pill d-inline-block border border-2" style="color: #E81C2E; border-color: #202C45; background-color: #F8F9FA;">
                        <?php echo lang('Blog.newsArticles'); ?>
                    </h5>
                </div>

                <br><br>
            </div>
        </div>
        <div class="row">


            <?php foreach ($artikelterbaru as $row) : ?>
                <div class="col-lg-4 mb-4">
                    <div class="position-relative d-flex flex-column h-100 article-card">
                        <a href="<?= base_url('/artikel/detail/' . $row->id_artikel) ?>" class="article-link">
                            <img class="img-fluid w-100" style="object-fit: cover; border-top-left-radius: 8px; border-top-right-radius: 8px;" src="<?= base_url('asset-user') ?>/images/<?= $row->foto_artikel; ?>" loading="lazy">
                            <div class="bg-white border border-top-0 p-4 flex-grow-1 article-content">
                                <div class="mb-2">
                                    <span class="text-uppercase text-primary font-weight-bold"><?= date('d F Y', strtotime($row->created_at)); ?></span>
                                </div>
                                <h4 class="display-5 article-title"><?= strip_tags($row->judul_artikel) ?></h4>

                                <p class="text-muted"><?= substr(strip_tags($row->deskripsi_artikel), 0, 30) ?>...</p>
                            </div>
                        </a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
<!-- News With Sidebar End -->

<style>
    .section-title h5 {
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .article-card {
        transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
        border-radius: 20px;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
        overflow: hidden;
        /* Ensure content fits within the border-radius */
    }

    .article-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.3);
    }

    .article-content {
        transition: background-color 0.3s ease-in-out;
    }

    .article-card:hover .article-content {
        background-color: #202C45;
    }

    .article-title {
        transition: color 0.3s ease-in-out;
        cursor: pointer;
        /* Add pointer cursor to indicate interactivity */
    }

    .article-card:hover .article-title {
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

    .article-link {
        text-decoration: none;
        color: inherit;
        /* Maintain original text color */
    }
</style>

<?= $this->endSection('content'); ?>