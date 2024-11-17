<?php

namespace App\Models;

use CodeIgniter\Model;

class ProdukModel extends Model
{
    protected $table = 'tb_produk';
    protected $primaryKey = 'id_produk';
    protected $returnType = 'object';
    protected $allowedFields = [
        'nama_produk_in',
        'nama_produk_en',
        'deskripsi_produk_in',
        'deskripsi_produk_en',
        'foto_produk',
        'slug_in',
        'slug_en',
        'meta_title_id',
        'meta_description_id',
        'meta_title_en',
        'meta_description_en',
    ];

    // Fetch all products with optional ordering
    public function getAllProducts()
    {
        return $this->orderBy('id_produk', 'ASC')->findAll();
    }

    // Fetch product by slug based on locale
    public function getProductBySlug($slug, $locale)
    {
        $slug_field = $locale === 'id' ? 'slug_in' : 'slug_en';
        return $this->where($slug_field, $slug)->first();
    }
}
