<?php

namespace Config;

use CodeIgniter\Router\RouteCollection;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('user\Homectrl');  // Default controller
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// ADMIN ROUTES
$routes->get('login', 'Login::index');
$routes->post('login/process', 'Login::process');
$routes->get('logout', 'Login::logout');

// ADMIN DASHBOARD
$routes->get('admin/dashboard', 'admin\Dashboardctrl::index');

// ADMIN PROFILE
$routes->get('admin/profil/edit', 'admin\Profil::edit');
$routes->post('admin/profil/proses_edit', 'admin\Profil::edit');

// ADMIN PRODUCTS
$routes->get('admin/produk/index', 'admin\Produk::index');
$routes->get('admin/produk/tambah', 'admin\Produk::tambah');
$routes->post('admin/produk/proses_tambah', 'admin\Produk::proses_tambah');
$routes->get('admin/produk/edit/(:num)', 'admin\Produk::edit/$1');
$routes->post('admin/produk/proses_edit/(:num)', 'admin\Produk::proses_edit/$1');
$routes->get('admin/produk/delete/(:any)', 'admin\Produk::delete/$1');

// ADMIN SLIDER
$routes->get('admin/slider/index', 'admin\Slider::index');
$routes->get('admin/slider/tambah', 'admin\Slider::tambah');
$routes->post('admin/slider/proses_tambah', 'admin\Slider::proses_tambah');
$routes->get('admin/slider/edit/(:num)', 'admin\Slider::edit/$1');
$routes->post('admin/slider/proses_edit/(:num)', 'admin\Slider::proses_edit/$1');
$routes->get('admin/slider/delete/(:any)', 'admin\Slider::delete/$1');

// ADMIN ACTIVITIES
$routes->get('admin/aktivitas/index', 'admin\Aktivitas::index');
$routes->get('admin/aktivitas/tambah', 'admin\Aktivitas::tambah');
$routes->post('admin/aktivitas/proses_tambah', 'admin\Aktivitas::proses_tambah');
$routes->get('admin/aktivitas/edit/(:num)', 'admin\Aktivitas::edit/$1');
$routes->post('admin/aktivitas/proses_edit/(:num)', 'admin\Aktivitas::proses_edit/$1');
$routes->get('admin/aktivitas/delete/(:any)', 'admin\Aktivitas::delete/$1');

// ADMIN ARTICLES
$routes->get('admin/artikel/index', 'admin\Artikel::index');
$routes->get('admin/artikel/tambah', 'admin\Artikel::tambah');
$routes->post('admin/artikel/proses_tambah', 'admin\Artikel::proses_tambah');
$routes->get('admin/artikel/edit/(:num)', 'admin\Artikel::edit/$1');
$routes->post('admin/artikel/proses_edit/(:num)', 'admin\Artikel::proses_edit/$1');
$routes->get('admin/artikel/delete/(:any)', 'admin\Artikel::delete/$1');

$routes->get('admin/meta/index', 'admin\MetaController::index');
$routes->get('admin/meta/tambah', 'admin\MetaController::tambah');
$routes->post('admin/meta/proses_tambah', 'admin\MetaController::proses_tambah');
$routes->get('admin/meta/edit/(:num)', 'admin\MetaController::edit/$1');
$routes->post('admin/meta/proses_edit/(:num)', 'admin\MetaController::proses_edit/$1');
$routes->get('admin/meta/delete/(:any)', 'admin\MetaController::delete/$1');


// Front-end routes with LanguageFilter applied
$routes->get('/', function () {
    return redirect()->to('/id/home'); // Default redirect ke /en/home
});

// Redirect to the default language homepage if the root URL is accessed

// Language-based routes
$routes->group('id', function ($routes) {
    $routes->get('', 'user\Homectrl::index'); // Homepage for ID
    $routes->get('tentang', 'user\Aboutctrl::index'); // About page in ID
    $routes->get('produk', 'user\Productsctrl::index'); // Service topics in ID
    $routes->get('produk/(:segment)', 'user\Productsctrl::detail/$1'); // Service detail
    $routes->get('aktivitas', 'user\Aktivitasctrl::index'); // Activities in ID
    $routes->get('aktivitas/(:segment)', 'user\Aktivitasctrl::detail/$1'); // Activity detail
    $routes->get('artikel', 'user\Artikelctrl::index'); // Articles in ID
    $routes->get('artikel/(:segment)', 'user\Artikelctrl::detail/$1'); // Article detail
    $routes->get('kontak', 'user\Contactctrl::index'); // Contact in ID
});

$routes->group('en', function ($routes) {
    $routes->get('', 'user\Homectrl::index'); // Homepage for EN
    $routes->get('about', 'user\Aboutctrl::index'); // About page in EN
    $routes->get('product', 'user\Productsctrl::index'); // Service in EN
    $routes->get('product/(:segment)', 'user\Productsctrl::detail/$1'); // Service detail
    $routes->get('activities', 'user\Aktivitasctrl::index'); // Activities in EN
    $routes->get('activities/(:segment)', 'user\Aktivitasctrl::detail/$1'); // Activity detail
    $routes->get('articles', 'user\Artikelctrl::index'); // Articles in EN
    $routes->get('articles/(:segment)', 'user\Artikelctrl::detail/$1'); // Article detail
    $routes->get('contact', 'user\Contactctrl::index'); // Contact in EN
});

/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 * Place for environment-based or additional routes
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
