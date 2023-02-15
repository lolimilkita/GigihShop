<?php

namespace App\Controllers;

use App\Models\KotaModel;
use App\Models\PesananDetailModel;
use App\Models\PesananModel;

class Pesanan extends BaseController
{
    protected $kotaModel, $pesananModel, $pesananDetailModel;
    public function __construct()
    {
        $this->kotaModel = new KotaModel();
        $this->pesananModel = new PesananModel();
        $this->pesananDetailModel = new PesananDetailModel();
    }

    public function index()
    {
        $pesanan = $this->pesananModel->where('users_id', $this->userId)->findAll();
        $kota = $this->kotaModel->findAll();

        $data = [
            'title' => 'Daftar Pesanan',
            'pesanan' => $pesanan,
            'kota' => $kota
        ];

        return view('pesanan/index', $data);
    }

    public function pesanan()
    {
        $keranjang = $this->keranjangModel->where('users_id', $this->userId)->findAll();

        $kota = $this->kotaModel->findAll();

        $data = [
            'title' => 'Form Pesanan',
            'keranjang' => $keranjang,
            'kota' => $kota,
            'validation' => \Config\Services::validation()
        ];

        return view('pesanan/pesanan', $data);
    }

    public function savepesanan()
    {

        // Validasi input
        if(!$this->validate([
            'namePenerima' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama Penerima harus diisi!'
                ]
            ],
            'nomorTelp' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nomor Telepon harus diisi!'
                ]
            ],
            'alamat' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Alamat harus diisi!'
                ]
            ],
            'kota' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kota harus diisi!'
                ]
            ]
        ])) {
            return redirect()->to('/keranjang/pesanan')->withInput();
        }

        // $pesanan = $this->request->getVar();
        // var_dump($pesanan);

        $this->pesananModel->save([
            'kota_id' => $this->request->getVar('kota'),
            'users_id' => $this->userId,
            'nama_penerima' => $this->request->getVar('namePenerima'),
            'nomor_telepon' => $this->request->getVar('nomorTelp'),
            'alamat' => $this->request->getVar('alamat')
        ]);

        $kondisi = [
            'pesanan_id' => $this->pesananModel->getInsertID(),
            'users_id' => $this->userId
        ];

        $pesanan = $this->pesananModel->where($kondisi)->findAll();
    
        $keranjang = $this->keranjangModel->where('users_id', $this->userId)->findAll();

        foreach ($keranjang as $k) {
            $this->pesananDetailModel->save([
                'pesanan_id' => $pesanan[0]['pesanan_id'],
                'barang_id' => $k['barang_id'],
                'nama_barang' => $k['nama_barang'],
                'harga_dipilih' => $k['harga_dipilih']
            ]);
        }
            
        $this->keranjangModel->where('users_id', $this->userId)->delete();

        return redirect()->to('/pesanan/berhasil');
    }

    public function berhasil()
    {
        session()->set('jml_keranjang', $this->jmlKeranjang);

        return view('pesanan/berhasil');
    }

    public function detail($id)
    {
        session()->set('jml_keranjang', $this->jmlKeranjang);

        // return user_id();

        $query = array('users_id' => $this->userId, 'pesanan_id' => $id);
        
        $pesanan = $this->pesananModel->where('pesanan_id', $id)->findAll();

        if ($pesanan[0]["users_id"] != $this->userId) {
            throw new \Exception('Pesanan Bukan Punya Anda!');
        }

        $detail = $this->pesananDetailModel->where('pesanan_id', $id)->findAll();

        $data = [
            'title' => 'Detail Pesanan',
            'pesanan' => $pesanan,
            'detail' => $detail  
        ];

        // return var_dump($data['detail']);
        return view('pesanan/detail', $data);
    }

    public function delete($id)
    {
        $this->pesananDetailModel->where('pesanan_id', $id)->delete();
        $this->pesananModel->delete($id);

        return redirect()->to('/pesanan');
    }
}
