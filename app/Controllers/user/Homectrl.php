<?php

namespace App\Controllers\user;

use App\Controllers\user\BaseController;
use App\Models\ProfilModel;
use App\Models\SliderModel;
use App\Models\ProdukModel;
use App\Models\ArtikelModel;
use App\Models\AktivitasModel;
use App\Models\MetaModel;

class Homectrl extends BaseController
{
    private $ProfilModel;
    private $SliderModel;
    private $ProdukModel;
    private $ArtikelModel;
    private $AktivitasModel;
    private $MetaModel;

    public function __construct()
    {
        $this->ProfilModel = new ProfilModel();
        $this->SliderModel = new SliderModel();
        $this->ProdukModel = new ProdukModel();
        $this->ArtikelModel = new ArtikelModel();
        $this->AktivitasModel = new AktivitasModel();
        $this->MetaModel = new MetaModel();
    }

    public function index()
    {


        // Existing code to fetch data, including meta data for the page
        $pageName = 'Beranda';
        $meta = $this->MetaModel->where('nama_halaman', $pageName)->first();

        // Fetch other required data
        $data = [
            'profil' => $this->ProfilModel->findAll(),
            'tbslider' => $this->SliderModel->findAll(),
            'tbproduk' => $this->ProdukModel->findAll(),
            'artikelterbaru' => $this->ArtikelModel->getArtikelTerbaru(),
            'meta' => $meta,  // Pass the meta data to the view
        ];

        $locale = session('lang') ?? 'id';
        $data['locale'] = $locale;

        // Set page title and description based on locale


        helper('text');

        // Set locale-based description
        $teks = strip_tags($locale === 'id' ? $data['profil'][0]->deskripsi_perusahaan_in : $data['profil'][0]->deskripsi_perusahaan_en);
        $data['Meta'] = character_limiter($teks, 150);

        // Load the view
        return view('user/home/index', $data);
    }

    public function redirectToHome()
    {
        return redirect()->to('user/home');
    }

    public function language($locale)
    {
        $session = session();

        // Validasi bahasa yang diterima
        if ($locale === 'id' || $locale === 'en') {
            // Mengatur sesi bahasa ke bahasa yang dipilih
            $session->set('lang', $locale);
        }

        // Redirect kembali ke halaman sebelumnya
        return redirect()->back();
    }
}
