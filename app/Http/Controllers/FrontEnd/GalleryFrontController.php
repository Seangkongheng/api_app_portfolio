<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GalleryFrontController extends Controller
{
    public function index (){
        return view('gallarys.index');
    }
}
