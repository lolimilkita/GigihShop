<?php

namespace App\Models;

use CodeIgniter\Model;

class PesananModel extends Model
{
    protected $table = 'pesanan';
    protected $primaryKey = 'pesanan_id';
    protected $useTimestamps = true;
    protected $allowedFields = ['kota_id', 'users_id', 'nama_penerima', 'nomor_telepon', 'alamat', 'status'];
}