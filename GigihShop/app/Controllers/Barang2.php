<?php

namespace App\Controllers;

use App\Models\BarangModel;
use CodeIgniter\Router\Exceptions\RedirectException;

class Barang2 extends BaseController
{
    protected $barangModel;
    public function __construct()
    {
        $this->barangModel = new BarangModel();
    }

    public function index()
    {
        
        $kategori1 = $this->barangModel->where('kategori_id', 1)->paginate(6, 'barang');

        session()->setFlashdata('not_login', 'Silahkan login terlebih dahulu');

        $data = [
            'title' => 'Daftar Barang',
            'kategori1' => $kategori1,
            'pager' => $this->barangModel->pager
        ];

        return view('barang2/index', $data);
    }

    public function kategori2(){
        $kategori2 = $this->barangModel->where('kategori_id', 2)->paginate(6, 'barang');

        $data = [
            'title' => 'Kategori 2',
            'kategori2' => $kategori2,
            'pager' => $this->barangModel->pager
        ];
        return view('barang2/kategori2', $data);
    }

    public function kategori3(){
        $kategori3 = $this->barangModel->where('kategori_id', 3)->paginate(6, 'barang');

        $data = [
            'title' => 'Kategori 2',
            'kategori3' => $kategori3,
            'pager' => $this->barangModel->pager
        ];
        return view('barang2/kategori3', $data);
    }
}