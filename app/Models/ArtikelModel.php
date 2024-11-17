<?php

namespace App\Models;

use CodeIgniter\Model;

class ArtikelModel extends Model
{
    protected $table = "tb_artikel";
    protected $primaryKey = "id_artikel";
    protected $returnType = "object";
    protected $allowedFields = [
        'id_artikel',
        'judul_artikel',
        'judul_artikel_en',
        'foto_artikel',
        'deskripsi_artikel',
        'deskripsi_artikel_en',
        'slug_in',
        'slug_en',
        'meta_title_id',
        'meta_description_id',
        'meta_title_en',
        'meta_description_en',
    ];

    public function getArtikelTerbaru()
    {
        return $this->orderBy('id_artikel', 'desc')
            ->findAll();
    }

    public function getDetailArtikel($id_artikel)
    {
        return $this->find($id_artikel);
    }

    // New method to get article by slug
    public function getDetailArtikelBySlug($slug, $locale)
    {
        $slugField = $locale === 'id' ? 'slug_in' : 'slug_en';
        return $this->where($slugField, $slug)->first();
    }

    public function getArtikelLainnya($id_artikel, $limit = 4)
    {
        return $this->where('id_artikel !=', $id_artikel)
            ->orderBy('id_artikel', 'ASC')
            ->limit($limit)
            ->findAll();
    }
}
