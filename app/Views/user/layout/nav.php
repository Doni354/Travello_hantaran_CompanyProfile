<!-- Nav Bar Start -->
<div class="nav-bar">
    <div class="container">
        <nav class="navbar navbar-expand-lg bg-dark navbar-dark">
            <?php foreach ($profil as $header) :  ?>
                <a href="#" class="navbar-brand">
                    <img data-src="<?= base_url('asset-user/images/'); ?><?= $header->logo_perusahaan ?>" alt="<?= $header->nama_perusahaan ?>" class="lazyload" style="width:100px;">
                </a>
            <?php endforeach ?>
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                <div class="navbar-nav mr-auto">
                    <a href="<?= base_url('/') ?>" class="nav-item nav-link"><?php echo lang('Blog.headerHome'); ?></a>
                    <a href="<?= base_url('about') ?>" class="nav-item nav-link"><?php echo lang('Blog.headerAbout'); ?></a>
                    <a href="<?= base_url('artikel') ?>" class="nav-item nav-link <?php if (current_url() == base_url('artikel')) echo 'active'; ?>"><?php echo lang('Blog.headerArticle'); ?></a>
                    <a href="<?= base_url('product') ?>" class="nav-item nav-link"><?php echo lang('Blog.headerProducts'); ?></a>
                    <a href="<?= base_url('activities') ?>" class="nav-item nav-link"><?php echo lang('Blog.headerActivities'); ?></a>
                    <a href="<?= base_url('contact') ?>" class="nav-item nav-link"><?php echo lang('Blog.headerContact'); ?></a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown"><?php echo lang('Blog.headerLanguage'); ?></a>
                        <div class="dropdown-menu">
                            <a href="<?= site_url('lang/in') ?>" class="dropdown-item">Indonesian</a>
                            <a href="<?= site_url('lang/en') ?>" class="dropdown-item">English</a>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </div>
</div>
<!-- Nav Bar End -->