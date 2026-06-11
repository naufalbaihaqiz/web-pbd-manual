<?php

namespace App\Models;

use CodeIgniter\Model;

class BlogModel extends Model
{
    protected $table      = 'blog';
    protected $primaryKey = 'judul_blog';
    protected $returnType = 'object';
    protected $allowedFields = ['judul_blog', 'kategori_produk', 'gambar_blog'];
}
