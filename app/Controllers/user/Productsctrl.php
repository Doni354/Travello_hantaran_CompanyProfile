<?php

namespace App\Controllers\user;

use App\Controllers\user\BaseController;
use App\Models\ProfilModel;
use App\Models\SliderModel;
use App\Models\ProdukModel;
use App\Models\AktivitasModel;
use App\Models\MetaModel;

class Productsctrl extends BaseController
{
    private $ProfilModel;
    private $SliderModel;
    private $ProdukModel;
    private $AktivitasModel;
    private $MetaModel;

    public function __construct()
    {
        $this->ProfilModel = new ProfilModel();
        $this->SliderModel = new SliderModel();
        $this->ProdukModel = new ProdukModel();
        $this->AktivitasModel = new AktivitasModel();
        $this->MetaModel = new MetaModel();
    }

    public function index()
    {

        $pageName = 'Layanan';
        $meta = $this->MetaModel->where('nama_halaman', $pageName)->first();

        $data = [
            'profil' => $this->ProfilModel->findAll(),
            'tbslider' => $this->SliderModel->findAll(),
            'tbaktivitas' => $this->AktivitasModel->findAll(),
            'tbproduk' => $this->ProdukModel->getAllProducts(),
            'meta' => $meta,
        ];
        helper('text');

        // Get the current language and set the necessary data
        $locale = session('lang') ?? 'id';

        $data['Title'] = $meta ? $meta['meta_title_' . $locale] : $data['profil'][0]->title_website;
        $data['Meta'] = $meta ? $meta['meta_description_' . $locale] : '';

        $nama_perusahaan = $data['profil'][0]->nama_perusahaan;
        $deskripsi_perusahaan = strip_tags($locale === 'id' ? $data['profil'][0]->deskripsi_perusahaan_in : $data['profil'][0]->deskripsi_perusahaan_en);

        // Using the correct product names and descriptions based on language
        $data['Title'] = isset($data['tbproduk'][0]) ? ($locale === 'id' ? $data['tbproduk'][0]->nama_produk_in : $data['tbproduk'][0]->nama_produk_en) : 'Produk';
        $teks = ($locale === 'id' ? "Produk dari $nama_perusahaan. $deskripsi_perusahaan" : "Products of $nama_perusahaan. $deskripsi_perusahaan");

        $batasan = 150;
        $data['Meta'] = character_limiter($teks, $batasan);

        $data['locale'] = session('lang') ?? 'id';

        return view('user/products/index', $data);
    }

    public function detail($slug_produk)
    {
        // Get the current locale
        $locale = session('lang') ?? 'id';

        // Fetch the product by slug
        $produk = $this->ProdukModel->where('slug_in', $slug_produk)
        ->orWhere('slug_en', $slug_produk)
        ->first();

    if (!$produk) {
        throw new \CodeIgniter\Exceptions\PageNotFoundException("Produk dengan slug $slug_produk tidak ditemukan");
    }

    // Tentukan slug yang benar berdasarkan bahasa yang dipilih
    $slug_id = $produk->slug_in;
    $slug_en = $produk->slug_en;
    $slug_baru = ($locale === 'id') ? $slug_id : $slug_en;

    // Tentukan prefix URL berdasarkan bahasa
    $prefix_url = ($locale === 'id') ? 'produk' : 'product';

    // Jika slug di URL tidak sesuai dengan bahasa yang dipilih, redirect ke slug yang benar
    if ($slug_produk !== $slug_baru) {
        return redirect()->to(base_url($locale . '/' . $prefix_url . '/' . $slug_baru));
    }


        // Prepare the data to be passed to the view
        $data = [
            'profil' => $this->ProfilModel->findAll(),
            'tbproduk' => $produk, // Use the fetched product

        ];

        helper('text');

        // Get the product name and description based on the current language
        $nama_produk = $locale === 'id' ? $produk->nama_produk_in : $produk->nama_produk_en;
        $deskripsi_produk = strip_tags($locale === 'id' ? $produk->deskripsi_produk_in : $produk->deskripsi_produk_en);

        $data['Title'] = $nama_produk ?? 'Unknown Product';
        $teks = "$nama_produk. $deskripsi_produk";

        $batasan = 150;
        $data['Meta'] = character_limiter($teks, $batasan);
        $data['locale'] = $locale;

        return view('user/products/detail', $data);
    }
}
