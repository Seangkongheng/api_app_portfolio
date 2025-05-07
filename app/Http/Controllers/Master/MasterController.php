<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Models\Brand\Brand;
use Illuminate\Http\Request;

class MasterController extends Controller
{
    public function master(){
        $brands=Brand::all();
        return view('layouts.master',compact('brands'));
    }
}
