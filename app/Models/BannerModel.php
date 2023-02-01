<?php

namespace App\Models;

use CodeIgniter\Model;

class BannerModel extends Model
{
    protected $table = 'banner';
    protected $primaryKey = 'banner_id';
    protected $allowedFields = ['banner_id', 'banner', 'gambar'];
}