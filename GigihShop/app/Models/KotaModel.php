<?php

namespace App\Models;

use CodeIgniter\Model;

class KotaModel extends Model
{
    protected $table = 'kota';
    protected $primaryKey = 'kota_id';
    protected $allowedFields = ['kota_id', 'kota'];
}