<?php

namespace App\Controllers;

use App\Models\BarangModel;

class Barang2 extends BaseController
{
    protected $barangModel;
    public function __construct()
    {
        $this->barangModel = new BarangModel();
    }

    public function index()
    {
        
        $kategori1 = $this->barangModel->where('kategori_id', 1)->findAll();
        $kategori2 = $this->barangModel->where('kategori_id', 2)->findAll();
        $kategori3 = $this->barangModel->where('kategori_id', 3)->findAll();

        $data = [
            'title' => 'Daftar Barang',
            'kategori1' => $kategori1,
            'kategori2' => $kategori2,
            'kategori3' => $kategori3
        ];

        return view('barang2/index', $data);
    }
}