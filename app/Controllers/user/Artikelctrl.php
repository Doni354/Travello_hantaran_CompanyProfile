<?php

namespace App\Controllers\user;

use App\Controllers\user\BaseController;
use App\Models\ProfilModel;
use App\Models\SliderModel;
use App\Models\ArtikelModel;
use App\Models\MetaModel;

class Artikelctrl extends BaseController
{
    private $ProfilModel;
    private $SliderModel;
    private $ArtikelModel;
    private $MetaModel;

    public function __construct()
    {
        $this->ProfilModel = new ProfilModel();
        $this->SliderModel = new SliderModel();
        $this->ArtikelModel = new ArtikelModel();
        $this->MetaModel = new MetaModel();
    }

    public function index()
    {

        $pageName = 'Artikel';
        $meta = $this->MetaModel->where('nama_halaman', $pageName)->first();

        $data = [
            'profil' => $this->ProfilModel->findAll(),
            'tbslider' => $this->SliderModel->findAll(),
            'artikelterbaru' => $this->ArtikelModel->getArtikelTerbaru(),
            'meta' => $meta,
        ];

        helper('text');

        $locale = session('lang') ?? 'id';

        // Set meta description based on session language
        $locale = session('lang') ?? 'id'; // Default to 'id' if no session language is set

        $data['Title'] = $meta ? $meta['meta_title_' . $locale] : $data['profil'][0]->title_website;
        $data['Meta'] = $meta ? $meta['meta_description_' . $locale] : '';

        $data['locale'] = session('lang') ?? 'id';

        return view('user/artikel/index', $data);
    }

    // Update the detail method to search by slug
    public function detail($slug)
    {
        $locale = session('lang') ?? 'id';
        $artikel = $this->ArtikelModel->where('slug_in', $slug)
            ->orWhere('slug_en', $slug)
            ->first();

        if (!$artikel) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException("Artikel dengan slug $slug tidak ditemukan");
        }

        // Tentukan slug yang benar berdasarkan bahasa yang dipilih
        $slug_id = $artikel->slug_in;
        $slug_en = $artikel->slug_en;
        $slug_baru = ($locale === 'id') ? $slug_id : $slug_en;

        // Tentukan prefix URL berdasarkan bahasa
        $prefix_url = ($locale === 'id') ? 'artikel' : 'articles';

        // Jika slug di URL tidak sesuai dengan bahasa yang dipilih, redirect ke slug yang benar
        if ($slug !== $slug_baru) {
            return redirect()->to(base_url($locale . '/' . $prefix_url . '/' . $slug_baru));
        }

        $data = [
            'profil' => $this->ProfilModel->findAll(),
            'artikel' => $artikel,
            'artikel_lain' => $this->ArtikelModel->getArtikelLainnya($artikel->id_artikel, 4),
            'locale' => $locale,
        ];

        helper('text');

        // Set meta description based on session language
        $metaDescription = $this->generateMetaDescription($data);
        $data['Meta'] = character_limiter($metaDescription, 150);

        // Set title based on session language
        if ($locale === 'id') {
            $data['Title'] = $artikel->judul_artikel ?? lang('Blog.detailArtikel');
        } else {
            $data['Title'] = $artikel->judul_artikel_en ?? lang('Blog.detailArtikel');
        }

        return view('user/artikel/detail', $data);
    }

    private function generateMetaDescription($data)
    {
        $nama_perusahaan = $data['profil'][0]->nama_perusahaan;
        $deskripsi_perusahaan = $data['locale'] === 'id' ?
            strip_tags($data['profil'][0]->deskripsi_perusahaan_in) :
            strip_tags($data['profil'][0]->deskripsi_perusahaan_en);

        $teks = $data['locale'] === 'id' ?
            "Artikel dari $nama_perusahaan. $deskripsi_perusahaan" :
            "Articles of $nama_perusahaan. $deskripsi_perusahaan";

        return $teks;
    }
}
