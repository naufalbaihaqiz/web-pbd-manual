<?php

namespace App\Models;

use CodeIgniter\Model;

class KategoriModel extends Model
{
    protected $table      = 'kategori';
    protected $primaryKey = 'nama_kategori';
    protected $returnType = 'object';
    protected $allowedFields = ['nama_kategori', 'web_url', 'gambar_kategori', 'jumlah_produk'];
}
