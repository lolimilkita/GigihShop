<?php

namespace App\Models;

use CodeIgniter\Model;

class BarangModel extends Model
{
    protected $table = 'barang';
    protected $primaryKey = 'barang_id';
    protected $useTimestamps = true;
    protected $allowedFields = ['barang_id', 'nama_barang', 'spesifikasi', 'gambar', 'harga', 'stok'];

    public function getBarang($barang_id = false)
    {
        if($barang_id == false){
            return $this->findAll();
        }

        return $this->where(['barang_id' => $barang_id])->first();
    }

}