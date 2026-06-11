<?php

namespace App\Models;

use CodeIgniter\Model;

class PenggunaModel extends Model
{
    protected $table            = 'Pengguna';
    protected $primaryKey       = 'email_pengguna';
    protected $useAutoIncrement = false; // False karena Primary Key adalah email (string)
    protected $returnType       = 'array';
    
    // Semua kolom yang ada di tabel Pengguna agar bisa diisi nanti saat checkout
    protected $allowedFields    = [
        'email_pengguna', 'password', 'nama_depan', 'nama_belakang', 
        'company', 'country', 'jalan', 'detail_alamat', 'kota', 'provinsi', 'kode_pos', 'no_telp'
    ];
}