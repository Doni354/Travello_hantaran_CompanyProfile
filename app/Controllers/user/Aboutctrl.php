<?php

namespace App\Controllers\user;

use App\Controllers\user\BaseController;
use App\Models\ProfilModel;
use App\Models\SliderModel;
use App\Models\ProdukModel;
use App\Models\MetaModel;

class Aboutctrl extends BaseController
{
    private $ProfilModel;
    private $SliderModel;
    private $ProdukModel;
    private $MetaModel;

    public function __construct()
    {
        $this->ProfilModel = new ProfilModel();
        $this->SliderModel = new SliderModel();
        $this->ProdukModel = new ProdukModel();
        $this->MetaModel = new MetaModel();
    }

    public function index()
    {

        $pageName = 'Tentang Kami';
        $meta = $this->MetaModel->where('nama_halaman', $pageName)->first();

        $data = [
            'profil' => $this->ProfilModel->findAll(),
            'tbslider' => $this->SliderModel->findAll(),
            'tbproduk' => $this->ProdukModel->findAll(),
            'meta' => $meta,
        ];

        $locale = session('lang') ?? 'id'; // Default to 'id' if not set

        $data['Title'] = $meta ? $meta['meta_title_' . $locale] : $data['profil'][0]->title_website;
        $data['Meta'] = $meta ? $meta['meta_description_' . $locale] : '';

        helper('text');

        
        $data['locale'] = $locale; // Pass the locale to the view

        // Update the text based on the selected language
        if ($locale === 'id') {
            $teks = strip_tags($data['profil'][0]->deskripsi_perusahaan_in);
        } else {
            $teks = strip_tags($data['profil'][0]->deskripsi_perusahaan_en);
        }

        $batasan = 150;
        $data['Meta'] = character_limiter($teks, $batasan);

        return view('user/about/index', $data);
    }
}
