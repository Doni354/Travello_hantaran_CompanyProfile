<?php

namespace App\Models;

use CodeIgniter\Model;

class AktivitasModel extends Model
{
    protected $table = 'tb_aktivitas';
    protected $primaryKey = 'id_aktivitas';
    protected $returnType = 'object';
    protected $allowedFields = [
        'nama_aktivitas_in',
        'nama_aktivitas_en',
        'deskripsi_aktivitas_in',
        'deskripsi_aktivitas_en',
        'slug_in',
        'slug_en',
        'meta_title_id',
        'meta_description_id',
        'meta_title_en',
        'meta_description_en',
    ];

    public function findBySlug($slug, $locale = 'en')
    {
        if ($locale === 'id') {
            return $this->where('slug_in', $slug)->first();
        } else {
            return $this->where('slug_en', $slug)->first();
        }
    }

    public function getAktivitasBySlug($slug, $locale)
    {
        $slugField = $locale === 'id' ? 'slug_in' : 'slug_en';
        return $this->where($slugField, $slug)->first();
    }
}
