<?php

namespace App\Controllers\user;

use App\Controllers\user\BaseController;
use App\Models\ProfilModel;
use App\Models\SliderModel;
use App\Models\ProdukModel;
use App\Models\AktivitasModel;
use App\Models\MetaModel;

class Aktivitasctrl extends BaseController
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

        $pageName = 'Aktivitas';
        $meta = $this->MetaModel->where('nama_halaman', $pageName)->first();

        $data = [
            'profil' => $this->ProfilModel->findAll(),
            'tbslider' => $this->SliderModel->findAll(),
            'tbproduk' => $this->ProdukModel->findAll(),
            'tbaktivitas' => $this->AktivitasModel->findAll(),
            'meta' => $meta,
        ];

        helper('text');

        // Use locale to set titles and descriptions
        $locale = session('lang') ?? 'id'; // Default to 'id' if no session language is set

        $data['Title'] = $meta ? $meta['meta_title_' . $locale] : $data['profil'][0]->title_website;
        $data['Meta'] = $meta ? $meta['meta_description_' . $locale] : '';

        $nama_perusahaan = $data['profil'][0]->nama_perusahaan;
        $deskripsi_perusahaan = strip_tags($locale === 'id' ? $data['profil'][0]->deskripsi_perusahaan_in : $data['profil'][0]->deskripsi_perusahaan_en);

        // Set Title based on locale
        $data['Title'] = 'Aktivitas'; // Default Title
        if (isset($data['tbproduk'][0])) {
            $data['Title'] = $locale === 'id' ? $data['tbproduk'][0]->nama_produk_in : $data['tbproduk'][0]->nama_produk_en;
        }

        // Prepare the meta description
        $teks = $locale === 'id' ? "Aktivitas dari $nama_perusahaan. $deskripsi_perusahaan" : "Activities of $nama_perusahaan. $deskripsi_perusahaan";

        $batasan = 150;
        $data['Meta'] = character_limiter($teks, $batasan);

        $data['locale'] = session('lang') ?? 'id';

        return view('user/aktivitas/index', $data);
    }

    public function detail($slug)
    {
        $locale = session('lang') ?? 'id'; // Default to 'id' if no session language is set

        $aktivitas = $this->AktivitasModel->where('slug_in', $slug)
            ->orWhere('slug_en', $slug)
            ->first();

        if (!$aktivitas) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException("Aktivitas dengan slug $slug tidak ditemukan");
        }

        // Tentukan slug yang benar berdasarkan bahasa yang dipilih
        $slug_id = $aktivitas->slug_in;
        $slug_en = $aktivitas->slug_en;
        $slug_baru = ($locale === 'id') ? $slug_id : $slug_en;

         // Tentukan prefix URL berdasarkan bahasa
         $prefix_url = ($locale === 'id') ? 'aktivitas' : 'activities';

         // Jika slug di URL tidak sesuai dengan bahasa yang dipilih, redirect ke slug yang benar
         if ($slug !== $slug_baru) {
             return redirect()->to(base_url($locale . '/' . $prefix_url . '/' . $slug_baru));
         }
 

        $data = [
            'profil' => $this->ProfilModel->findAll(),
            'tbaktivitas' => $this->AktivitasModel->findBySlug($slug, $locale),
        ];

        if (!$data['tbaktivitas']) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        helper('text');

        // Set Title based on locale
        $data['Title'] = $locale === 'id' ? $data['tbaktivitas']->nama_aktivitas_in : $data['tbaktivitas']->nama_aktivitas_en;

        // Prepare the activity description
        $nama_aktivitas = $locale === 'id' ? $data['tbaktivitas']->nama_aktivitas_in : $data['tbaktivitas']->nama_aktivitas_en;
        $deskripsi_aktivitas = strip_tags($locale === 'id' ? $data['tbaktivitas']->deskripsi_aktivitas_in : $data['tbaktivitas']->deskripsi_aktivitas_en);

        $teks = "$nama_aktivitas. $deskripsi_aktivitas";

        $batasan = 150;
        $data['Meta'] = character_limiter($teks, $batasan);

        $data['locale'] = $locale;

        return view('user/aktivitas/detail', $data);
    }
}
