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
            'title' => 'Home | Web Test'
        ];
        return view('pages/home', $data);     
    }

    public function about()
    {

        if(logged_in()) :
            session()->set('jml_keranjang', $this->jmlKeranjang);
        endif;
        $data = [
            'title' => 'About Me'
        ];
        return view('pages/about', $data);
    }

}
