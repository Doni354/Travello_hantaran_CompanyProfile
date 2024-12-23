<?php

namespace App\Controllers\user;

use App\Controllers\user\BaseController;
use App\Models\ProfilModel;
use App\Models\SliderModel;
use App\Models\ProdukModel;
use App\Models\MetaModel;

class Contactctrl extends BaseController
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
        $pageName = 'Kontak'; 
        $meta = $this->MetaModel->where('nama_halaman', $pageName)->first();

        $data = [
            'profil' => $this->ProfilModel->findAll(),
            'tbslider' => $this->SliderModel->findAll(),
            'tbproduk' => $this->ProdukModel->findAll(),
            'meta' => $meta,
        ];

        $locale = session('lang') ?? 'id'; // Default to 'id' if no session language is set

        $data['Title'] = $meta ? $meta['meta_title_' . $locale] : $data['profil'][0]->title_website;
        $data['Meta'] = $meta ? $meta['meta_description_' . $locale] : '';

        helper('text');

        // Determine the language and set variables accordingly
        if (session('lang') === 'id') {
            $nama_perusahaan = $data['profil'][0]->nama_perusahaan;
            $deskripsi_perusahaan = strip_tags($data['profil'][0]->deskripsi_perusahaan_in);
            $data['Title'] = 'Kontak'; // You may also want to retrieve from a language file
            $teks = "Kontak dari $nama_perusahaan. $deskripsi_perusahaan";
        } else {
            $nama_perusahaan = $data['profil'][0]->nama_perusahaan;
            $deskripsi_perusahaan = strip_tags($data['profil'][0]->deskripsi_perusahaan_en);
            $data['Title'] = 'Contact'; // You may also want to retrieve from a language file
            $teks = "Contact of $nama_perusahaan. $deskripsi_perusahaan";
        }

        // Limit the description for meta tags
        $batasan = 150;
        $data['Meta'] = character_limiter($teks, $batasan);

        $data['locale'] = session('lang') ?? 'id';

        return view('user/contact/index', $data);
    }
}
