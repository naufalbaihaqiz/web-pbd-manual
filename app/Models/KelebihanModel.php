<?php

namespace App\Models;

use CodeIgniter\Model;

class KelebihanModel extends Model
{
    protected $table      = 'kelebihan';
    protected $primaryKey = 'id_kelebihan';
    protected $returnType = 'object';
    protected $allowedFields = ['web_url', 'judul_kelebihan', 'deskripsi_kelebihan'];
}
