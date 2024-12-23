<?php

namespace App\Controllers\admin;

use App\Models\ArtikelModel;

class Artikel extends BaseController
{
    private $artikelModel;

    public function __construct()
    {
        $this->artikelModel = new ArtikelModel();
    }

    public function generateSlug($string)
    {
        // Ubah string menjadi huruf kecil
        $slug = strtolower($string);
        // Hapus semua karakter non-alfanumerik kecuali spasi
        $slug = preg_replace('/[^a-z0-9\s]/', '', $slug);
        // Ganti spasi dengan tanda hubung
        $slug = preg_replace('/\s+/', '-', $slug);
        return $slug;
    }


    public function index()
    {
        // Pengecekan apakah pengguna sudah login atau belum
        if (!session()->get('logged_in')) {
            return redirect()->to(base_url('login')); // Sesuaikan dengan halaman login Anda
        }

        $data = [
            'artikels' => $this->artikelModel->findAll(),
        ];

        return view('admin/artikel/index', $data);
    }

    public function tambah()
    {
        // Pengecekan apakah pengguna sudah login atau belum
        if (!session()->get('logged_in')) {
            return redirect()->to(base_url('login')); // Sesuaikan dengan halaman login Anda
        }

        return view('admin/artikel/tambah', [
            'validation' => $this->validator
        ]);
    }

    public function proses_tambah()
    {
        // Pengecekan apakah pengguna sudah login atau belum
        if (!session()->get('logged_in')) {
            return redirect()->to(base_url('login')); // Sesuaikan dengan halaman login Anda
        }

        $judul_artikel = $this->request->getVar('judul_artikel');
        $judul_artikel_en = $this->request->getVar('judul_artikel_en');
        $deskripsi_artikel = $this->request->getVar('deskripsi_artikel');
        $deskripsi_artikel_en = $this->request->getVar('deskripsi_artikel_en');
        $meta_title_id = $this->request->getVar("meta_title_id");
        $meta_title_en = $this->request->getVar("meta_title_en");
        $meta_description_id = $this->request->getVar("meta_description_id");
        $meta_description_en = $this->request->getVar("meta_description_en");

        // Buat slug_id dari judul_artikel
        $slug_id = $this->generateSlug($judul_artikel);
        $slug_en = $this->generateSlug($judul_artikel_en);

        // Validasi judul artikel dalam bahasa Indonesia
        if (!preg_match('/^[a-zA-Z0-9\s]+$/', $judul_artikel)) {
            session()->setFlashdata('error', 'Judul artikel dalam bahasa Indonesia hanya boleh berisi huruf dan angka.');
            return redirect()->back()->withInput();
        }

        // Validasi judul artikel dalam bahasa Inggris
        if (!preg_match('/^[a-zA-Z0-9\s]+$/', $judul_artikel_en)) {
            session()->setFlashdata('error', 'Judul artikel dalam bahasa Inggris hanya boleh berisi huruf dan angka.');
            return redirect()->back()->withInput();
        }

        // Validasi foto artikel
        if (!$this->validate([
            'foto_artikel' => [
                'rules' => 'uploaded[foto_artikel]|is_image[foto_artikel]|max_dims[foto_artikel,572,572]|mime_in[foto_artikel,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'uploaded' => 'Pilih foto terlebih dahulu',
                    'is_image' => 'File yang anda pilih bukan gambar',
                    'max_dims' => 'Maksimal ukuran gambar 572x572 pixels',
                    'mime_in' => 'File yang anda pilih wajib berekstensikan jpg/jpeg/png'
                ]
            ]
        ])) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        } else {
            // Simpan artikel ke dalam database
            $file_foto = $this->request->getFile('foto_artikel');
            $currentDateTime = date('dmYHis');

            // Format nama file foto
            $newFileName = str_replace(' ', '-', "{$judul_artikel}_{$currentDateTime}.{$file_foto->getExtension()}");
            $file_foto->move('asset-user/images', $newFileName);

            $data = [
                'judul_artikel' => $judul_artikel,
                'judul_artikel_en' => $judul_artikel_en,
                'deskripsi_artikel' => $deskripsi_artikel,
                'deskripsi_artikel_en' => $deskripsi_artikel_en,
                'foto_artikel' => $newFileName,
                'meta_title_id' => $meta_title_id,
                'meta_title_en' => $meta_title_en,
                'meta_description_id' => $meta_description_id,
                'meta_description_en' => $meta_description_en,
                'slug_in' => $slug_id,
                'slug_en' => $slug_en,
            ];

            $this->artikelModel->insert($data);

            return redirect()->to(base_url('admin/artikel'));
        }
    }

    public function edit($id_artikel)
    {
        // Pengecekan apakah pengguna sudah login atau belum
        if (!session()->get('logged_in')) {
            return redirect()->to(base_url('login')); // Sesuaikan dengan halaman login Anda
        }

        $artikelData = $this->artikelModel->find($id_artikel);
        $validation = \Config\Services::validation();

        return view('admin/artikel/edit', [
            'artikelData' => $artikelData,
            'validation' => $validation
        ]);
    }

    public function proses_edit($id_artikel = null)
    {
        // Pengecekan apakah pengguna sudah login atau belum
        if (!session()->get('logged_in')) {
            return redirect()->to(base_url('login')); // Sesuaikan dengan halaman login Anda
        }

        if (!$id_artikel) {
            return redirect()->back();
        }

        $judul_artikel = $this->request->getVar("judul_artikel");
        $judul_artikel_en = $this->request->getVar("judul_artikel_en");
        $deskripsi_artikel = $this->request->getVar("deskripsi_artikel");
        $deskripsi_artikel_en = $this->request->getVar("deskripsi_artikel_en");
        $meta_title_id = $this->request->getVar("meta_title_id");
        $meta_title_en = $this->request->getVar("meta_title_en");
        $meta_description_id = $this->request->getVar("meta_description_id");
        $meta_description_en = $this->request->getVar("meta_description_en");

        // Buat slug_id dari judul_artikel
        $slug_id = $this->generateSlug($judul_artikel);
        $slug_en = $this->generateSlug($judul_artikel_en);

        // Validasi judul artikel dalam bahasa Indonesia
        if (!preg_match('/^[a-zA-Z0-9\s]+$/', $judul_artikel)) {
            session()->setFlashdata('error', 'Judul artikel dalam bahasa Indonesia hanya boleh berisi huruf dan angka.');
            return redirect()->back()->withInput();
        }

        // Validasi judul artikel dalam bahasa Inggris
        if (!preg_match('/^[a-zA-Z0-9\s]+$/', $judul_artikel_en)) {
            session()->setFlashdata('error', 'Judul artikel dalam bahasa Inggris hanya boleh berisi huruf dan angka.');
            return redirect()->back()->withInput();
        }

        $file_foto = $this->request->getFile('foto_artikel');

        // Jika file foto di-upload
        if ($file_foto->isValid()) {
            // Hapus foto lama jika ada
            $artikelData = $this->artikelModel->find($id_artikel);
            $oldFilePath = 'asset-user/images/' . $artikelData->foto_artikel;
            if (file_exists($oldFilePath)) {
                unlink($oldFilePath);
            }

            // Simpan foto baru
            $newFileName = $file_foto->getRandomName();
            $file_foto->move('asset-user/images', $newFileName);
        } else {
            $artikelData = $this->artikelModel->find($id_artikel);
            $newFileName = $artikelData->foto_artikel;
        }

        // Update data artikel
        $data = [
            'judul_artikel' => $judul_artikel,
            'judul_artikel_en' => $judul_artikel_en,
            'deskripsi_artikel' => $deskripsi_artikel,
            'deskripsi_artikel_en' => $deskripsi_artikel_en,
            'foto_artikel' => $newFileName,
            'meta_title_id' => $meta_title_id,
            'meta_title_en' => $meta_title_en,
            'meta_description_id' => $meta_description_id,
            'meta_description_en' => $meta_description_en,
            'slug_in' => $slug_id,
            'slug_en' => $slug_en,
        ];

        $this->artikelModel->update($id_artikel, $data);

        return redirect()->to(base_url('admin/artikel/index'));
    }

    public function delete($id = false)
    {
        // Pengecekan apakah pengguna sudah login atau belum
        if (!session()->get('logged_in')) {
            return redirect()->to(base_url('login')); // Sesuaikan dengan halaman login Anda
        }

        $data = $this->artikelModel->find($id);
        unlink('asset-user/images/' . $data->foto_artikel);
        $this->artikelModel->delete($id);

        return redirect()->to(base_url('admin/artikel/index'));
    }
}
