<?php

namespace App\Controllers;

use App\Models\BarangModel;

class Admin extends BaseController
{
    protected $barangModel;
    public function __construct()
    {
        $this->barangModel = new BarangModel();
    }

    public function index()
    {
        $barang = $this->barangModel->findAll();

        $data = [
            'title' => 'Daftar Barang',
            'barang' => $barang
        ];

        return view('admin/index', $data);
    }

    public function barangdelete($id)
    {
        $barang = $this->barangModel->find($id);

        if($barang['gambar'] != 'default.jpg') {
            $gambarLama = 'img/barang/' . $barang['gambar'];
            unlink($gambarLama);
        }

        $this->barangModel->delete($id);

        session()->setFlashdata('pesan', 'Data berhasil dihapus.');

        return redirect()->to('/admin');
    }

    public function barangdetail($id)
    {
        $barang = $this->barangModel->getBarang($id);

        // var_dump($barang);

        $data = [
            'title' => 'Daftar Barang',
            'validation' => \Config\Services::validation(),
            'barang' => $barang
        ];

        return view('admin/barangDetail', $data);
    }

    public function barangupdate($id)
    {
        // var_dump($this->request->getVar());

        if (!$this->validate([
            'nama' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama barang harus diisi!'
                ]
            ],
            'kategori' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kategori barang harus dipilih!'
                ]
            ],
            'deskripsi' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Deskripsi barang harus diisi!'
                ]
            ],
            'gambar' => [
                'rules' => 'max_size[gambar,5120]|is_image[gambar]|mime_in[gambar,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Ukuran gambar tidak bisa lebih dari 5MB',
                    'is_image' => 'Yang anda pilih bukan gambar',
                    'mim_in' => 'Yang anda pilih bukan gambar'
                ]
            ]
        ])) {
            return redirect()->to('/admin/barangdetail/' . $id)->withInput();
        }

        $kategori = $this->request->getVar('kategori');
        switch ($kategori) {
            case 'batu':
                $kategoriId = 1;
                break;
            case 'pasir':
                $kategoriId = 2;
                break;
            case 'tanah':
                $kategoriId = 3;
                break;
            case 'jasa':
                $kategoriId = 4;
                break;
        }

        // // ambil gambar
        $fileGambar = $this->request->getFile('gambar');
        // // file dipindahkan ke folder img
        // $fileGambar->move('img/barang');
        // // nama file 
        // $namaGambar = $fileGambar->getName();

        // cek gambar apakah tetap gambar lama
        if ($fileGambar->getError() == 4) {
            $namaGambar = $this->request->getVar('gambarLama');
        } else {
            $namaGambar = $fileGambar->getName();
            $fileGambar->move('img/barang', $namaGambar);
            unlink('img/barang/' . $this->request->getVar('gambarLama'));
        }

        $this->barangModel->save([
            'barang_id' => $id,
            'kategori_id' => $kategoriId,
            'nama_barang' => $this->request->getVar('nama'),
            'deskripsi' => $this->request->getVar('deskripsi'),
            'harga1' => $this->request->getVar('harga1'),
            'harga2' => $this->request->getVar('harga2'),
            'harga3' => $this->request->getVar('harga3'),
            'harga4' => $this->request->getVar('harga4'),
            'harga5' => $this->request->getVar('harga5'),
            'harga6' => $this->request->getVar('harga6'),
            'harga7' => $this->request->getVar('harga7'),
            'gambar' => $namaGambar
        ]);

        session()->setFlashdata('pesan', 'Data berhasil diubah.');

        return redirect()->to('/admin');
    }

    public function barangcreate()
    {
        $data = [
            'title' => 'Form Tambah Data Barang',
            'validation' => \Config\Services::validation()
        ];

        return view('admin/barangCreate', $data);
    }

    public function barangsave()
    {
        if (!$this->validate([
            'nama' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama barang harus diisi!'
                ]
            ],
            'kategori' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kategori barang harus dipilih!'
                ]
            ],
            'deskripsi' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Deskripsi barang harus diisi!'
                ]
            ],
            'gambar' => [
                'rules' => 'max_size[gambar,5120]|is_image[gambar]|mime_in[gambar,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Ukuran gambar tidak bisa lebih dari 5MB',
                    'is_image' => 'Yang anda pilih bukan gambar',
                    'mim_in' => 'Yang anda pilih bukan gambar'
                ]
            ]
        ])) {
            return redirect()->to('/admin/barangcreate/')->withInput();
        }

        // var_dump($this->request->getVar());

        $kategori = $this->request->getVar('kategori');
        switch ($kategori) {
            case 'batu':
                $kategoriId = 1;
                break;
            case 'pasir':
                $kategoriId = 2;
                break;
            case 'tanah':
                $kategoriId = 3;
                break;
            case 'jasa':
                $kategoriId = 4;
                break;
        }

        // ambil gambar 
        // kelola gambar trus insert ke db
        $fileGambar = $this->request->getFile('gambar');
        // apakah tidak ada gambar yang diupload
        if ($fileGambar->getError() == 4) {
            $namaGambar = 'default.jpg';
        } else {
            // generate nama gambar random
            $namaGambar = $fileGambar->getRandomName();
            // pindahkan file ke folder img
            $fileGambar->move('img/barang', $namaGambar);
        }

        // var_dump($fileGambar);

        $this->barangModel->save([
            'kategori_id' => $kategoriId,
            'nama_barang' => $this->request->getVar('nama'),
            'deskripsi' => $this->request->getVar('deskripsi'),
            'gambar' => $namaGambar,
            'harga1' => $this->request->getVar('harga1'),
            'harga2' => $this->request->getVar('harga2'),
            'harga3' => $this->request->getVar('harga3'),
            'harga4' => $this->request->getVar('harga4'),
            'harga5' => $this->request->getVar('harga5'),
            'harga6' => $this->request->getVar('harga6'),
            'harga7' => $this->request->getVar('harga7'),
        ]);

        session()->setFlashdata('pesan', 'Data berhasil ditambah.');

        return redirect()->to('/admin');
    }
}
