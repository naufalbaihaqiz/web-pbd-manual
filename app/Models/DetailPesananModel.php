<?php

namespace App\Models;

use CodeIgniter\Model;

class DetailPesananModel extends Model
{
    protected $table            = 'detail_pesanan';
    protected $primaryKey       = 'nomor_order'; // actually composite key in logic, but CI4 doesn't strictly need it for inserts
    protected $useAutoIncrement = false;
    protected $returnType       = 'array';
    
    protected $allowedFields    = [
        'nomor_order', 'nama_produk', 'jumlah'
    ];
}
