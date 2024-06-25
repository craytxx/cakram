<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        $data = ['judul' => 'Home'];
        return view('pages/home', $data);
    }

    public function about(): string
    {
        $data = ['judul' => 'About'];
        return view('pages/about', $data);
    }

    public function contact(): string
    {
        $data = ['judul' => 'Contact'];
        return view('pages/contact', $data);
    }
}
