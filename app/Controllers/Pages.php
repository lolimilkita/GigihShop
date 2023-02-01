<?php

namespace App\Controllers;

class Pages extends BaseController
{

    public function index()
    {

        if(logged_in()) :
            session()->set('jml_keranjang', $this->jmlKeranjang);
        endif;

        $data = [
            'title' => 'Home | Gigih Shops'
        ];
        return view('pages/home', $data);     
    }

    public function about()
    {

        if(logged_in()) :
            session()->set('jml_keranjang', $this->jmlKeranjang);
        endif;
        $data = [
            'title' => 'Kontak Kami'
        ];
        return view('pages/about', $data);
    }

}
