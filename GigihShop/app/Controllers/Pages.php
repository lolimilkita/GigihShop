<?php

namespace App\Controllers;

use App\Models\KeranjangModel;
class Pages extends BaseController
{
    protected $barangModel, $keranjangModel;
    public function __construct()
    {
        $this->keranjangModel = new KeranjangModel();
    }

    public function index()
    {
        $userId = user()->id;
        $keranjang = $this->keranjangModel->where('users_id', $userId)->findAll();
        $jmlKeranjang = count($keranjang);

        if(logged_in()) :
            session()->setTempdata('jml_keranjang', $jmlKeranjang);
        endif;

        $data = [
            'title' => 'Home | Web Test'
        ];
        return view('pages/home', $data);     
    }

    public function about()
    {
        $data = [
            'title' => 'About Me'
        ];
        return view('pages/about', $data);
    }

}
