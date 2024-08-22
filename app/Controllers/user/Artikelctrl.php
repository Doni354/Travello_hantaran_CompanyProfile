<?php

namespace App\Controllers\user;

use App\Controllers\user\BaseController;
use App\Models\ProfilModel;
use App\Models\SliderModel;
use App\Models\ArtikelModel;

class Artikelctrl extends BaseController
{
    private $ProfilModel;
    private $SliderModel;
    private $ArtikelModel;

    public function __construct()
    {
        $this->ProfilModel = new ProfilModel();
        $this->SliderModel = new SliderModel();
        $this->ArtikelModel = new ArtikelModel();
    }

    public function index()
    {
        $data = [
            'profil' => $this->ProfilModel->findAll(),
            'tbslider' => $this->SliderModel->findAll(),
            'artikelterbaru' => $this->ArtikelModel->getArtikelTerbaru(),
        ];

        helper('text');

        // Set meta description based on session language
        $metaDescription = $this->generateMetaDescription($data);
        $data['Meta'] = character_limiter($metaDescription, 150);

        // Set default title
        $data['Title'] = 'Artikel';

        return view('user/artikel/index', $data);
    }

    public function detail($id_artikel)
    {
        $artikel = $this->ArtikelModel->getDetailArtikel($id_artikel);

        if (!$artikel) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException("Artikel dengan ID $id_artikel tidak ditemukan");
        }

        $data = [
            'profil' => $this->ProfilModel->findAll(),
            'artikel' => $artikel,
            'artikel_lain' => $this->ArtikelModel->getArtikelLainnya($id_artikel, 4),
        ];

        helper('text');

        // Set meta description based on session language
        $metaDescription = $this->generateMetaDescription($data);
        $data['Meta'] = character_limiter($metaDescription, 150);

        // Set default title
        $data['Title'] = isset($artikel->judul_artikel) ? $artikel->judul_artikel : 'Detail Artikel';

        return view('user/artikel/detail', $data);
    }

    private function generateMetaDescription($data)
    {
        $nama_perusahaan = $data['profil'][0]->nama_perusahaan;
        $deskripsi_perusahaan = session('lang') === 'in' ?
            strip_tags($data['profil'][0]->deskripsi_perusahaan_in) :
            strip_tags($data['profil'][0]->deskripsi_perusahaan_en);

        $teks = session('lang') === 'in' ?
            "Artikel dari $nama_perusahaan. $deskripsi_perusahaan" :
            "Articles of $nama_perusahaan. $deskripsi_perusahaan";

        return $teks;
    }
}
