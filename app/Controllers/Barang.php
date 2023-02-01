<?php

namespace App\Controllers;

use App\Models\BannerModel;
use App\Models\BarangModel;
use CodeIgniter\Router\Exceptions\RedirectException;

class Barang extends BaseController
{
    protected $barangModel, $bannerModel;
    public function __construct()
    {
        $this->barangModel = new BarangModel();
        $this->bannerModel = new BannerModel();
    }

    public function index()
    {
        $banner = $this->bannerModel->findAll();

        if(logged_in()) :
            session()->set('jml_keranjang', $this->jmlKeranjang);
        endif;

        $kategori1 = $this->barangModel->where('kategori_id', 1)->paginate(6, 'barang');

        session()->setFlashdata('not_login', 'Silahkan login terlebih dahulu');

        $data = [
            'title' => 'Daftar Barang',
            'banner' => $banner,
            'kategori1' => $kategori1,
            'pager' => $this->barangModel->pager
        ];

        return view('/barang/index', $data);
    }

    public function kategori2()
    {
        $banner = $this->bannerModel->findAll();

        $kategori2 = $this->barangModel->where('kategori_id', 2)->paginate(6, 'barang');
        
        session()->setFlashdata('not_login', 'Silahkan login terlebih dahulu');

        $data = [
            'title' => 'Kategori 2',
            'banner' => $banner,
            'kategori2' => $kategori2,
            'pager' => $this->barangModel->pager
        ];
        return view('/barang/kategori2', $data);
    }

    public function kategori3()
    {
        $banner = $this->bannerModel->findAll();

        $kategori3 = $this->barangModel->where('kategori_id', 3)->paginate(6, 'barang');

        $data = [
            'title' => 'Kategori 2',
            'banner' => $banner,
            'kategori3' => $kategori3,
            'pager' => $this->barangModel->pager
        ];
        return view('/barang/kategori3', $data);
    }

    public function detail($id)
    {
        $barang = $this->barangModel->getBarang($id);

        $data = [
            'title' => $barang['nama_barang'],
            'barang' => $barang
        ];

        session()->setFlashdata('not_login', 'Silahkan login terlebih dahulu');

        return view('/barang/detail', $data);
    }
}