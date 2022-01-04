<?php

namespace App\Models;

use CodeIgniter\Model;

class PesananDetailModel extends Model
{
    protected $table = 'pesanan_detail';
    protected $primaryKey = 'id';
    protected $allowedFields = ['pesanan_id', 'barang_id', 'nama_barang', 'harga_dipilih'];
}