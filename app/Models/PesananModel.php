<?php

namespace App\Models;

use CodeIgniter\Model;

class PesananModel extends Model
{
    protected $table            = 'pesanan';
    protected $primaryKey       = 'nomor_order';
    protected $useAutoIncrement = false;
    protected $returnType       = 'array';
    
    protected $allowedFields    = [
        'nomor_order', 'email_pengguna', 'tanggal_pembelian', 
        'metode_pembayaran', 'subtotal', 'coupon', 'total', 
        'catatan', 'no_rek_penerima',
        'nama_depan', 'nama_belakang', 'company', 'jalan', 
        'detail_alamat', 'kota', 'provinsi', 'kode_pos', 
        'country', 'no_telp'
    ];
}
