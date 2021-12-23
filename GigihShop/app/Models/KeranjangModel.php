<?php

namespace App\Models;

use CodeIgniter\Model;

class KeranjangModel extends Model
{
    protected $table = 'keranjang';
    protected $useTimestamps = true;
    protected $allowedFields = ['users_id', 'barang_id', 'nama_barang', 'spesifikasi', 'gambar', 'harga_barang'];
    
}