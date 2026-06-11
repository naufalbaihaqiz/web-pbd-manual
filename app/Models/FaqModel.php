<?php

namespace App\Models;

use CodeIgniter\Model;

class FaqModel extends Model
{
    protected $table      = 'faq';
    protected $primaryKey = 'pertanyaan';
    protected $returnType = 'object';
    protected $allowedFields = ['pertanyaan', 'web_url', 'jawaban'];
}
