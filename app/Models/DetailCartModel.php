<?php

namespace App\Models;

use CodeIgniter\Model;

class DetailCartModel extends Model
{
    protected $table            = 'detail_cart';
    protected $primaryKey       = 'id_detail';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['id_cart', 'nama_produk', 'gambar_produk', 'jumlah_produk_cart', 'harga_jual_cart'];

    protected $useTimestamps = false;
}
