<?php

namespace App\Models;

use CodeIgniter\Model;

class BarangModel extends Model
{
    protected $table = 'barang';
    protected $primaryKey = 'barang_id';
    protected $useTimestamps = true;
    protected $allowedFields = ['barang_id','kategori_id', 'nama_barang', 'deskripsi', 'gambar', 'harga1', 'harga2', 'harga3', 'harga4', 'harga5', 'harga6', 'harga7'];

    public function getBarang($barang_id = false)
    {
        if($barang_id == false){
            return $this->findAll();
        }

        return $this->where(['barang_id' => $barang_id])->first();
    }

    public function search($keyword)
    {
        // $builder = $this->table('orang');
        // $builder->like('nama', $keyword);
        // return $builder;

        return $this->table('barang')->like('nama_barang', $keyword);
    }

}