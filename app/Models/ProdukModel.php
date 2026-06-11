<?php

namespace App\Models;

use CodeIgniter\Model;

class ProdukModel extends Model
{
    protected $table      = 'produk';
    protected $primaryKey = 'nama_produk';
    protected $returnType = 'object';
    protected $allowedFields = ['nama_produk', 'nama_kategori', 'gambar_produk', 'harga_normal', 'harga_jual', 'discount', 'status_produk'];
}
