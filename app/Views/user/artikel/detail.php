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

<style>
    .article-title {
        white-space: normal;
        word-wrap: break-word;
        overflow-wrap: break-word;
        width: 100%;
    }

    .article-item {
        display: flex;
        width: 900px; /* Set a fixed width for the card */
        height: 110px;
        overflow: hidden;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        margin: 0 auto; /* Center the article item */
    }

    .article-image {
        width: 110px;
        height: 110px;
        object-fit: cover;
    }

    .article-content {
        display: flex;
        flex-direction: column;
        justify-content: center;
        flex: 1;
        padding: 0 1rem;
        white-space: normal;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .article-item:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 15px rgba(0, 0, 0, 0.2);
    }

    .article-detail {
        display: flex;
        gap: 20px;
    }

    .article-detail img {
        max-width: 50%;
        height: auto;
        object-fit: cover;
    }

    .article-text {
        flex: 1;
    }

    @media (max-width: 768px) {
        .article-item {
            width: 100%; /* Adjust width to fit smaller screens */
        }

        .article-detail {
            flex-direction: column;
        }

        .article-detail img {
            max-width: 100%;
            margin-bottom: 20px;
        }
    }
</style>

<!-- News With Sidebar Start -->
<div class="container-fluid pt-5 mb-3">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <!-- News Detail Start -->
                <div class="position-relative mb-3">
                    <div class="article-detail">
                        <img class="img-fluid" src="<?= base_url('asset-user/images/' . $artikel->foto_artikel); ?>" alt="<?= $artikel->judul_artikel; ?>">
                        <div class="article-text bg-white border border-top-0 p-4">
                            <div class="mb-3">
                                <a class="text-uppercase mb-3 text-body"><?= date('d F Y', strtotime($artikel->created_at)); ?></a>
                            </div>
                            <h1 class="display-5 mb-2 article-title"><?= $locale === 'id' ? strip_tags($artikel->judul_artikel) : strip_tags($artikel->judul_artikel_en) ?></h1>
                            <p class="fs-5"><?php if (lang('Blog.Languange') == 'en') {
                                echo $artikel->deskripsi_artikel_en;
                            } else {
                                echo $artikel->deskripsi_artikel;
                            } ?></p>
                        </div>
                    </div>
                </div>
                <!-- News Detail End -->

                <!-- Popular News Start -->
                <div class="mb-3">
                    <div class="section-title mb-0 text-center">
                        <h5 class="mb-1 mt-4 px-3 py-1 text-dark rounded-pill d-inline-block border border-2 border-primary">Baca Juga</h5>
                    </div>
                    <br>
                    <div class="bg-white border border-top-0 p-3">
                        <?php foreach ($artikel_lain as $artikel_item) : ?>
                            <div class="d-flex align-items-center bg-white mb-3 article-item">
                                <img class="img-fluid article-image" src="<?= base_url('asset-user/images/' . $artikel_item->foto_artikel); ?>" alt="">
                                <div class="w-100 h-100 d-flex flex-column justify-content-center border border-left-0 article-content">
                                    <div class="mb-2">
                                        <a class="text-body" href="<?= base_url($locale . '/' . ($locale === 'en' ? 'articles' : 'artikel') . '/' . ($locale === 'id' ? $artikel_item->slug_in : $artikel_item->slug_en)) ?>"><small><?= date('d F Y', strtotime($artikel_item->created_at)); ?></small></a>
                                    </div>
                                    <a class="h6 m-0 display-7" href="<?= base_url('/artikel/detail/' . $artikel_item->id_artikel) ?>"><?= htmlspecialchars(substr($artikel_item->judul_artikel, 0, 2000)); ?></a>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
                <!-- Popular News End -->
            </div>
        </div>
    </div>
</div>
<!-- News With Sidebar End -->



<?= $this->endSection('content'); ?>