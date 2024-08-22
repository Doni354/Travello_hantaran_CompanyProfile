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
                            <?php echo lang('Blog.titleOurContact');
                            if (!empty($perusahaan)) {
                                echo ' ' . $perusahaan->nama_perusahaan;
                            } ?>
                        </h2>
                    </div>
                    <div class="col-12">
                        <p class="text-shadow">
                            <a href="<?= base_url('/') ?>"><?php echo lang('Blog.headerHome');  ?></a>
                            <a href="#"><?php echo lang('Blog.headerContact'); ?></a>
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
                <div class="col-lg">
                    <div class="about-img">
                        <div class="embed-responsive embed-responsive-16by9" style="width: 100%;">
                            <?php foreach ($profil as $maps) :  ?>
                                <?= $maps->link_maps ?>
                            <?php endforeach;  ?>
                        </div>
                    </div>

                </div>
                <div class="col-lg">
                    <div class="about-content">
                        <?php foreach ($profil as $desc) : ?>
                            <div class="testimonial">
                                <blockquote>
                                    <h3>
                                        <?php if (lang('Blog.Languange') == 'en') {
                                            echo $desc->deskripsi_kontak_en;
                                        } ?>
                                        <?php if (lang('Blog.Languange') == 'in') {
                                            echo $desc->deskripsi_kontak_in;
                                        } ?>
                                    </h3>
                                </blockquote>
                                <!-- <img src="images/person_2.jpg" alt="">
                                <p class="client-name">Ben Anderson</p> -->
                            </div>
                        <?php endforeach;  ?>
                    </div>
                </div>
            </div>
        <?php endforeach ?>
    </div>
</div>

<?= $this->endSection('content'); ?>