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
                        <!-- <p><?php echo lang('Blog.titleAboutUs')  ?></p> -->
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
                        <a class="btn btn-custom" href="<?= base_url($lang . '/' . $aboutLink) ?>"><?php echo lang('Blog.btnReadmore'); ?></a>
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
            <div class="row justify-content-center mb-4">
                <div class="col-lg-12">
                    <div class="card product-card">
                        <div class="background-container" style="border-radius: 20px; background-image: url('asset-user/images/<?= $product->foto_produk; ?>');"></div>
                        <div class="overlay"></div> <!-- Overlay for better readability -->
                        <div class="row no-gutters align-items-center">
                            <?php if ($index % 2 == 0) : ?>
                                <!-- Image on the left side -->
                                <div class="col-lg-6 text-center">
                                    <div class="card-img">
                                        <img src="asset-user/images/<?= $product->foto_produk; ?>" class="card-img-top" alt="<?php if (lang('Blog.Languange') == 'en') {
                                                                                                                                    echo $product->nama_produk_en;
                                                                                                                                } else {
                                                                                                                                    echo $product->nama_produk_in;
                                                                                                                                } ?>" width="572" height="572">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="card-body text-center">
                                        <div class="section-header">
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
                                                <?php
                                                $desc = (lang('Blog.Languange') == 'en') ? $product->deskripsi_produk_en : $product->deskripsi_produk_in;
                                                echo strlen($desc) > 150 ? substr($desc, 0, 150) . "..." : $desc;
                                                ?>
                                            </p>
                                        </div>
                                        <div class="button-group">
                                            <a href="<?= base_url($locale . '/' . ($locale === 'en' ? 'product' : 'produk') . '/' . (($locale === 'en') ? $product->slug_en : $product->slug_in)) ?>" class="btn btn-custom"><?php echo lang('Blog.btnReadmore'); ?></a>
                                        </div>
                                    </div>
                                </div>
                            <?php else : ?>
                                <!-- Image on the right side -->
                                <div class="col-lg-6 order-lg-2 text-center">
                                    <div class="card-img">
                                        <img src="asset-user/images/<?= $product->foto_produk; ?>" class="card-img-top" alt="<?php if (lang('Blog.Languange') == 'en') {
                                                                                                                                    echo $product->nama_produk_en;
                                                                                                                                } else {
                                                                                                                                    echo $product->nama_produk_in;
                                                                                                                                } ?>" width="572" height="572">
                                    </div>
                                </div>
                                <div class="col-lg-6 order-lg-1">
                                    <div class="card-body text-center">
                                        <div class="section-header">
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
                                                <?php
                                                $desc = (lang('Blog.Languange') == 'en') ? $product->deskripsi_produk_en : $product->deskripsi_produk_in;
                                                echo strlen($desc) > 150 ? substr($desc, 0, 150) . "..." : $desc;
                                                ?>
                                            </p>
                                        </div>
                                        <div class="button-group">
                                            <a href="<?= base_url($locale . '/' . ($locale === 'en' ? 'product' : 'produk') . '/' . (($locale === 'en') ? $product->slug_en : $product->slug_in)) ?>" class="btn btn-custom"><?php echo lang('Blog.btnReadmore'); ?></a>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
        <div class="text-center mt-5 mb-5">
            <a href="<?= base_url($lang . '/' . $productLink) ?>" class="btn btn-custom"><?php echo lang('Blog.btnReadmoreProduct'); ?></a>
        </div>
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
        background-color: #E2FFF1;
    }
</style>




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
            <?php
            // Limit the number of articles to 3
            $limitedArtikel = array_slice($artikelterbaru, 0, 3);
            foreach ($limitedArtikel as $row) : ?>
                <div class="col-lg-4 mb-4">
                    <div class="position-relative d-flex flex-column h-100 article-card">
                        <a href="<?= base_url(($locale !== '' ? $locale . '/' : '') . ($locale === 'en' ? 'articles' : 'artikel') . '/' . (($locale === 'en') ? $row->slug_en : $row->slug_in)) ?>" class="article-link">
                            <img class="img-fluid w-100" style="object-fit: cover; border-top-left-radius: 8px; border-top-right-radius: 8px;" src="<?= base_url('asset-user') ?>/images/<?= $row->foto_artikel; ?>" alt="<?= base_url('asset-user') ?>/images/<?= $row->foto_artikel; ?>" loading="lazy">
                            <div class="bg-white border border-top-0 p-4 flex-grow-1 article-content">
                                <div class="mb-2">
                                    <span class="text-uppercase text-primary font-weight-bold"><?= date('d F Y', strtotime($row->created_at)); ?></span>
                                </div>
                                <h4 class="display-5 article-title"><?= session('lang') === 'id' ? strip_tags($row->judul_artikel) : strip_tags($row->judul_artikel_en); ?></h4>

                                <p class="text-muted"><?= substr(strip_tags(session('lang') === 'id' ? $row->deskripsi_artikel : $row->deskripsi_artikel_en), 0, 30) ?>...</p>
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





<?= $this->endSection('content') ?>