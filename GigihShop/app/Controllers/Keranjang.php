<?php

namespace App\Controllers;

use App\Models\BarangModel;
use App\Models\KeranjangModel;

class Keranjang extends BaseController
{

    protected $barangModel, $keranjangModel;
    public function __construct()
    {
        $this->barangModel = new BarangModel();
        $this->keranjangModel = new KeranjangModel();
    }

    public function index()
    {
    
        $data = [
            'title' => 'Daftar Keranjang',
        ];

        return view('keranjang/index', $data);
    }

    public function tambah($barang_id)
    {

        $barang = $this->barangModel->getBarang($barang_id);

        $userId = user()->id;

        $this->keranjangModel->save([
            'users_id' => $userId,
            'barang_id' => $barang['barang_id'],
            'nama_barang' => $barang['nama_barang'],
            'spesifikasi' => $barang['spesifikasi'],
            'gambar' => $barang['gambar'],
            'harga_barang' => $barang['harga']
        ]);

        $userId = user()->id;
        $keranjang = $this->keranjangModel->where('users_id', $userId)->findAll();
        $jmlKeranjang = count($keranjang);

        if(logged_in()) :
            session()->setTempdata('jml_keranjang', $jmlKeranjang);
        endif;

        // $db = \Config\Database::connect();

        // $db->query("INSERT INTO keranjang (users_id, barang_id, nama_barang) VALUES ('$userId', '$barangId', '$barangNama')");
        session()->setFlashdata('keranjang_tambah', 'Data berhasil ditambahkan ke keranjang, periksa keranjang anda pada menu diatas.');

        return redirect()->to('barang2/index');
        // return view('/');
    }

}