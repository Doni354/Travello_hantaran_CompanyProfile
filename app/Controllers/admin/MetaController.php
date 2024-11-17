<?php

namespace App\Controllers\admin;

use App\Models\MetaModel;

class MetaController extends BaseController
{

    public function index()
    {
        // Pengecekan apakah pengguna sudah login atau belum
        if (!session()->get('logged_in')) {
            return redirect()->to(base_url('login')); // Ubah 'login' sesuai dengan halaman login kamu
        }
        $meta_model = new MetaModel();
        $all_data_meta = $meta_model->findAll();
        // var_dump($all_data_meta);
        // die();
        $validation = \Config\Services::validation();
        return view('admin/meta/index', [
            'all_data_meta' => $all_data_meta,
            'validation' => $validation
        ]);
    }

    public function tambah()
    {
        // Pengecekan apakah pengguna sudah login atau belum
        if (!session()->get('logged_in')) {
            return redirect()->to(base_url('login')); // Ubah 'login' sesuai dengan halaman login kamu
        }
        $meta_model = new MetaModel();
        $all_data_meta = $meta_model->findAll();
       
        $validation = \Config\Services::validation();
        return view('admin/meta/tambah', [
            'all_data_meta' => $all_data_meta,
            'validation' => $validation
        ]);
    }

    public function proses_tambah()
    {
        // Check if the user is logged in
        if (!session()->get('logged_in')) {
            return redirect()->to(base_url('login'));
        }

        // Get data from the form request
        $nama_halaman = $this->request->getVar("nama_halaman");
        $meta_title_id = $this->request->getVar("meta_title_id");
        $meta_title_en = $this->request->getVar("meta_title_en");
        $meta_description_id = $this->request->getVar("meta_description_id");
        $meta_description_en = $this->request->getVar("meta_description_en");

        // Initialize the model
        $metaModel = new MetaModel();

        // Prepare data to save
        $data = [
            'nama_halaman' => $nama_halaman,
            'meta_title_id' => $meta_title_id,
            'meta_title_en' => $meta_title_en,
            'meta_description_id' => $meta_description_id,
            'meta_description_en' => $meta_description_en,
            'deskripsi_produk_in' => $this->request->getVar("deskripsi_produk_in"),
            'deskripsi_produk_en' => $this->request->getVar("deskripsi_produk_en"),
        ];

        // Save the data
        $metaModel->save($data);

        // Set a success flash message
        session()->setFlashdata('success', 'Data berhasil disimpan');
        return redirect()->to(base_url('admin/meta/index'));
    }

    public function edit($id_seo)
    {
        // Pengecekan apakah pengguna sudah login atau belum
        if (!session()->get('logged_in')) {
            return redirect()->to(base_url('login')); // Ubah 'login' sesuai dengan halaman login kamu
        }
        $meta_model = new MetaModel();
        $meta = $meta_model->find($id_seo);
        $validation = \Config\Services::validation();

        return view('admin/meta/edit', [
            'meta' => $meta,
            'validation' => $validation
        ]);
    }

    // Produk.php (Controller)
    public function proses_edit($id)
    {
        // Check if the user is logged in
        if (!session()->get('logged_in')) {
            return redirect()->to(base_url('login'));
        }

        // Initialize the model
        $metaModel = new MetaModel();

        // Get the existing data from the database
        $metaData = $metaModel->find($id);
        if (!$metaData) {
            session()->setFlashdata('error', 'Data tidak ditemukan');
            return redirect()->to(base_url('admin/meta/index'));
        }

        // Get data from the form request
        $nama_halaman = $this->request->getVar("nama_halaman");
        $meta_title_id = $this->request->getVar("meta_title_id");
        $meta_title_en = $this->request->getVar("meta_title_en");
        $meta_description_id = $this->request->getVar("meta_description_id");
        $meta_description_en = $this->request->getVar("meta_description_en");

        // Prepare updated data
        $data = [
            'nama_halaman' => $nama_halaman,
            'meta_title_id' => $meta_title_id,
            'meta_title_en' => $meta_title_en,
            'meta_description_id' => $meta_description_id,
            'meta_description_en' => $meta_description_en,
            'deskripsi_produk_in' => $this->request->getVar("deskripsi_produk_in"),
            'deskripsi_produk_en' => $this->request->getVar("deskripsi_produk_en"),
        ];

        // Update the data
        $metaModel->update($id, $data);

        // Set a success flash message
        session()->setFlashdata('success', 'Data berhasil diperbarui');
        return redirect()->to(base_url('admin/meta/index'));
    }


    public function delete($id = false)
    {
        // Pengecekan apakah pengguna sudah login atau belum
        if (!session()->get('logged_in')) {
            return redirect()->to(base_url('login')); // Ubah 'login' sesuai dengan halaman login kamu
        }
        $metaModel = new MetaModel();

        $metaModel->delete($id);

        return redirect()->to(base_url('admin/meta/index'));
    }
}
