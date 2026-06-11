<?php

namespace App\Models;

use CodeIgniter\Model;

class PengaturanWebModel extends Model
{
    protected $table      = 'pengaturan_web';
    protected $primaryKey = 'web_url';
    protected $returnType = 'object';
    protected $allowedFields = [
        'web_url', 'hero_title', 'hero_description', 'kontak_email', 'kontak_phone',
        'deskripsi_pendaftaran', 'keterangan_kontak', 'url_youtube', 'gambar_testimoni',
        'logo_partner', 'logo_metode_pembayaran', 'deskripsi_website', 'visi', 'misi',
        'keunggulan', 'langkah_pemesanan'
    ];
}
