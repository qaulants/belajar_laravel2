<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LatihanController extends Controller
{
    //method/function : kebisaan
    //visibilisasi bisa dilihat: public, privat, static

    public function index()
    {
        return "Halo kami sedang belajar laravel";
    }

    public function edit($id)
    {
        return "Ini adalah form edit dengan nama params:" .$id;
    }

    public function delete($id)
    {
        return "Ini adalah form delete dengan id:" .$id;
    }
     
}
