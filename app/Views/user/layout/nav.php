<?php
// Set default language to 'id'
$lang = session()->get('lang') ?? 'id';

// Get current URL
$current_url = uri_string();

// Extract the first segment to detect language
$lang_segment = explode('/', $current_url)[0]; // Detect 'id' or 'en'

// Define page links based on language
$homeLink = '';  // No trailing slash
$aboutLink = $lang_segment === 'en' ? 'about' : 'tentang';
$articleLink = $lang_segment === 'en' ? 'articles' : 'artikel';
$productLink = $lang_segment === 'en' ? 'product' : 'produk';
$activitiesLink = $lang_segment === 'en' ? 'activities' : 'aktivitas';
$contactLink = $lang_segment === 'en' ? 'contact' : 'kontak';

// Replace map for slugs (to be applied in dynamic content if needed)
$replace_map = [
    'tentang' => 'about',
    'artikel' => 'articles',
    'produk' => 'product',
    'aktivitas' => 'activities',
    'kontak' => 'contact'
];

// Define new language segment ('id' <-> 'en')
$new_lang_segment = ($lang_segment === 'en') ? 'id' : 'en';

// Remove language segment from current URL
$url_without_lang = substr($current_url, strlen($lang_segment) + 1);

// Only apply the translation logic if switching between different languages
if ($new_lang_segment !== $lang_segment) {
    // Switch segments based on the current language
    foreach ($replace_map as $indonesian_segment => $english_segment) {
        if ($lang_segment === 'en') {
            $url_without_lang = str_replace($english_segment, $indonesian_segment, $url_without_lang);
        } else {
            $url_without_lang = str_replace($indonesian_segment, $english_segment, $url_without_lang);
        } 
    }
}

// Rebuild the clean URL without trailing slashes
$clean_url = rtrim($new_lang_segment . '/' . ltrim($url_without_lang, '/'), '/');

// Define base URLs for the language switch
// If the language switch is the same as the current one, just return the same URL
$english_url = ($lang_segment === 'en') ? current_url() : base_url('en' . ($url_without_lang ? '/' . ltrim($url_without_lang, '/') : ''));
$indonesia_url = ($lang_segment === 'id') ? current_url() : base_url('id' . ($url_without_lang ? '/' . ltrim($url_without_lang, '/') : ''));
?>



<!-- Navbar Start -->
<?php foreach ($profil as $header) : ?>
    <div class="container-fluid sticky-top px-0">
    <nav class="navbar navbar-expand-lg navbar-dark py-1 d-flex justify-content-between" style="background-color: #0C2D57;">
        <!-- Logo -->
        <a href="<?= base_url($lang . $homeLink) ?>" class="logo d-flex align-items-center">
            <img data-src="<?= base_url('asset-user/images/'); ?><?= $header->logo_perusahaan ?>" 
                 alt="<?= $header->nama_perusahaan ?>" 
                 class="img-fluid logo-img lazyload">
        </a>

        <!-- Navbar toggle button (for small screens) -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Navigation Links -->
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto py-0">
                <a href="<?= base_url($lang . $homeLink) ?>" class="nav-item nav-link" data-page="home"><?php echo lang('Blog.headerHome'); ?></a>
                <a href="<?= base_url($lang . '/' . $aboutLink) ?>" class="nav-item nav-link" data-page="about"><?php echo lang('Blog.headerAbout'); ?></a>
                <a href="<?= base_url($lang . '/' . $articleLink) ?>" class="nav-item nav-link" data-page="artikel"><?php echo lang('Blog.headerArticle'); ?></a>
                <a href="<?= base_url($lang . '/' . $productLink) ?>" class="nav-item nav-link" data-page="product"><?php echo lang('Blog.headerProducts'); ?></a>
                <a href="<?= base_url($lang . '/' . $activitiesLink) ?>" class="nav-item nav-link" data-page="activities"><?php echo lang('Blog.headerActivities'); ?></a>
                <a href="<?= base_url($lang . '/' . $contactLink) ?>" class="nav-item nav-link" data-page="contact"><?php echo lang('Blog.headerContact'); ?></a>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><?= lang('Blog.headerLanguage') ?></a>
                    <div class="dropdown-menu m-0">
                        <a href="<?= $indonesia_url ?>" class="dropdown-item">Indonesia</a>
                        <a href="<?= $english_url ?>" class="dropdown-item">English</a>
                    </div>
                </div>
            </div>
        </div>
    </nav>
</div>

<?php endforeach; ?>
<!-- Navbar End -->

<style>
/* Styling untuk navbar */
.container-fluid {
    padding-left: 0;
    padding-right: 0;
}

.navbar {
    display: flex;
    justify-content: space-between; /* Logo di kiri, nav-links di kanan */
    align-items: center; /* Vertikal align */
    padding: 1rem 0.5rem !important; /* Mengurangi padding untuk navbar */
    background-color: #131842 !important; /* Warna latar belakang navbar disamakan dengan footer */
}

.navbar-collapse {
    flex-grow: unset; /* Membatasi ukuran kolaps */
}

.navbar-nav {
    display: flex;
    gap: 1rem; /* Spasi antara tautan navigasi */
    margin: 0; /* Hilangkan margin bawaan */
}
.navbar-nav .nav-link {
    font-size: 0.925rem !important; /* Ukuran font lebih kecil untuk tautan navigasi */
    padding: 0.4rem 0.7rem !important; /* Padding lebih kecil untuk tautan navigasi */
    margin: 0 1rem !important; /* Margin antar tautan */
    color: white; /* Warna teks tautan navigasi */
    text-transform: capitalize !important; /* Huruf kapital di awal kata */
}

.logo {
    flex-shrink: 0; /* Jangan mengecilkan ukuran logo */
}

.logo-img {
    height: 50px;
    width: auto;
    margin-left: 20px;
}


@media (max-width: 991.98px) {
    .navbar-nav .nav-link {
        font-size: 0.5rem; /* Ukuran font lebih kecil untuk layar lebih kecil */
        padding: 0.1rem 0.3rem; /* Padding lebih kecil untuk layar lebih kecil */
    }
}
</style>
