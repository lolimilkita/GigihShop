<?php

namespace App\Controllers;

use App\Models\BannerModel;
use App\Models\BarangModel;
use App\Models\KotaModel;
use App\Models\PesananDetailModel;
use App\Models\PesananModel;
use CodeIgniter\Router\Exceptions\RedirectException;

class Admin extends BaseController
{
    protected $barangModel, $kotaModel, $bannerModel, $pesananModel, $pesananDetailModel;
    public function __construct()
    {
        $this->barangModel = new BarangModel();
        $this->kotaModel = new KotaModel();
        $this->bannerModel = new BannerModel();
        $this->pesananModel = new PesananModel();
        $this->pesananDetailModel = new PesananDetailModel();
    }

    public function index()
    {

        $currentPage = $this->request->getVar('page_barang') ? $this->request->getVar('page_barang') : 1;

        $keyword = $this->request->getVar('keyword');
        if($keyword) {
            $barang = $this->barangModel->search($keyword);
        } else {
            $barang = $this->barangModel;
        }

        $data = [
            'title' => 'Daftar Barang',
            // 'barang' => $barang
            'barang' => $barang->paginate(4, 'barang'),
            'pager' => $this->barangModel->pager,
            'currentPage' => $currentPage
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

    public function kota()
    {
        $kota = $this->kotaModel->findAll();

        $data = [
            'title' => 'Daftar Kota',
            'kota' => $kota,
            'validation' => \Config\Services::validation()
        ];

        return view('admin/kota', $data);
    }

    public function kotasave()
    {
        if (!$this->validate([
            'nama' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama kota harus diisi!'
                ]
            ]
        ])) {
            return redirect()->to('/admin/kota')->withInput();
        }
        
        // var_dump($this->request->getVar());

        $this->kotaModel->save([
            'kota' => $this->request->getVar('nama')
        ]);

        session()->setFlashdata('pesan', 'Data berhasil ditambah.');

        return redirect()->to('/admin/kota');
    }

    public function kotadelete($id)
    {
        $this->kotaModel->delete($id);

        session()->setFlashdata('pesan', 'Data berhasil dihapus.');

        return redirect()->to('/admin/kota');
    }

    public function kotaedit($id)
    {
        $kota = $this->kotaModel->find($id);

        $data = [
            'title' => 'Mengubah Data Kota',
            'validation' => \Config\Services::validation(),
            'kota' => $kota
        ];

        return view('admin/kotaEdit', $data);
    }

    public function kotaupdate($id)
    {
        if (!$this->validate([
            'nama' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama kota harus diisi!'
                ]
            ]
        ])) {
            return redirect()->to('/admin/kota')->withInput();
        }
        
        // var_dump($this->request->getVar());

        $this->kotaModel->save([
            'kota_id' => $id,
            'kota' => $this->request->getVar('nama')
        ]);

        session()->setFlashdata('pesan', 'Data berhasil dirubah.');

        return redirect()->to('/admin/kota');
    }

    public function banner()
    {
        $banner = $this->bannerModel->findAll();

        $data = [
            'title' => 'Daftar Banner',
            'banner' => $banner,
            'validation' => \Config\Services::validation()
        ];

        return view('admin/banner', $data);
    }

    public function bannersave()
    {
        if (!$this->validate([
            'gambar' => [
                'rules' => 'max_size[gambar,5120]|is_image[gambar]|mime_in[gambar,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Ukuran gambar tidak bisa lebih dari 5MB',
                    'is_image' => 'Yang anda pilih bukan gambar',
                    'mim_in' => 'Yang anda pilih bukan gambar'
                ]
            ],
            'nama' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama banner harus diisi!'
                ]
            ]
        ])) {
            return redirect()->to('/admin/banner')->withInput();
        }

        $fileGambar = $this->request->getFile('gambar');
        $namaGambar = $fileGambar->getRandomName();
        $fileGambar->move('img', $namaGambar);

        $this->bannerModel->save([
            'banner' => $this->request->getVar('nama'),
            'gambar' => $namaGambar
        ]);

        session()->setFlashdata('pesan', 'Data berhasil ditambah.');

        return redirect()->to('/admin/banner');

    }

    public function bannerdelete($id)
    {
        $banner = $this->bannerModel->find($id);

        $gambar = $banner['gambar'];

        $gambarLama = 'img/' . $gambar;

        unlink($gambarLama);

        $this->bannerModel->delete($id);

        session()->setFlashdata('pesan', 'Data berhasil dihapus.');

        return redirect()->to('/admin/banner');
    }

    public function banneredit($id)
    {
        $banner = $this->bannerModel->find($id);

        $data = [
            'title' => 'Mengubah Data Banner',
            'validation' => \Config\Services::validation(),
            'banner' => $banner
        ];

        return view('admin/bannerEdit', $data);
    }

    public function bannerupdate($id)
    {
        if (!$this->validate([
            'gambar' => [
                'rules' => 'max_size[gambar,5120]|is_image[gambar]|mime_in[gambar,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Ukuran gambar tidak bisa lebih dari 5MB',
                    'is_image' => 'Yang anda pilih bukan gambar',
                    'mim_in' => 'Yang anda pilih bukan gambar'
                ]
            ],
            'nama' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama banner harus diisi!'
                ]
            ]
        ])) {
            return redirect()->to('/admin/banner')->withInput();
        }

        $fileGambar = $this->request->getFile('gambar');
        if ($fileGambar->getError() == 4) {
            $namaGambar = $this->request->getVar('gambarLama');
        } else {
            $namaGambar = $fileGambar->getRandomName();
            $fileGambar->move('img', $namaGambar);
            unlink('img/' . $this->request->getVar('gambarLama'));
        }

        $this->bannerModel->save([
            'banner_id' => $id,
            'banner' => $this->request->getVar('nama'),
            'gambar' => $namaGambar
        ]);

        session()->setFlashdata('pesan', 'Data berhasil diubah.');

        return redirect()->to('/admin/banner');

    }

    public function pesanan()
    {
        $pesanan = $this->pesananModel->findAll();

        $data = [
            'title' => 'Daftar Banner',
            'pesanan' => $pesanan,
            'validation' => \Config\Services::validation()
        ];

        return view('/admin/pesanan', $data);
    }

    public function pesananedit($id)
    {
        $pesanan = $this->pesananModel->find($id);

        $data = [
            'title' => 'Update Status',
            'pesanan' => $pesanan,
            'validation' => \Config\Services::validation()
        ];

        return view('/admin/pesananEdit', $data);
    }

    public function pesananupdate($id)
    {
        // var_dump($this->request->getVar());

        $this->pesananModel->save([
            'pesanan_id' => $id,
            'status' => $this->request->getVar('status')
        ]);

        session()->setFlashdata('pesan', 'Data berhasil diubah.');

        return redirect()->to('/admin/pesanan');
    }

    public function pesanandetail($id)
    {
        $pesanan = $this->pesananModel->find($id);
        $detail = $this->pesananDetailModel->where('pesanan_id', $id)->findAll();
        
        // var_dump($detail);

        $data = [
            'title' => 'Pesanan Detail',
            'pesanan' => $pesanan,
            'detail' => $detail
        ];

        return view('/admin/pesanandetail', $data);
    }
}
