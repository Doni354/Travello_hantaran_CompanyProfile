<!-- Top Bar Start -->
<!-- <?php foreach ($profil as $header) :  ?>
    <div class="top-bar">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-4 col-md-12">
                    <div class="logo">
                        <a href="<?= base_url('/') ?>">
                            <img data-src="<?= base_url('asset-user/images/'); ?><?= $header->logo_perusahaan ?>" alt="<?= $header->nama_perusahaan ?>" class="lazyload" style="height: 80px; width:150px;">
                        </a>
                    </div>
                </div>
                <div class="col-lg-8 col-md-7 d-none d-lg-block">
                    <div class="row">
                        <div class="col-7">
                            <div class="top-bar-item">
                                <div class="top-bar-icon">
                                    <i class="fa fa-phone-alt"></i>
                                </div>
                                <div class="top-bar-text">
                                    <h3><?php echo lang('Blog.notelp'); ?></h3>
                                    <p><?= $header->no_hp; ?></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-5">
                            <div class="top-bar-item">
                                <div class="top-bar-icon">
                                    <i class="far fa-envelope"></i>
                                </div>
                                <div class="top-bar-text">
                                    <h3><?php echo lang('Blog.email'); ?></h3>
                                    <p><?= $header->email; ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?= $this->include('user/layout/nav'); ?>
<?php endforeach ?> 
<!-- Top Bar End -->